<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tieba extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("tieba_model");
        $this->load->helper('cookie');

        // $this->output->enable_profiler();
    }

    public function index()
    {
        $client_id      = "";
        $response_type  = "code";
        $redirect_uri   = "http://tieba.richard1993.com/index.php/tieba/login";
        $redirect_uri   = rawurlencode($redirect_uri);
        //$redirect_uri   = "oob";

        $url    = "https://openapi.baidu.com/oauth/2.0/authorize?client_id=$client_id&response_type=$response_type&redirect_uri=$redirect_uri";
        // echo $url;
        header("Location: $url");
        //重定向到百度服务器获取账号的认证权限
    }

    public function login()
    {
        if ($this->input->get('code') !== FALSE) 
        {
            $grant_type     = 'authorization_code';
            $code           = $this->input->get("code");
            $client_id      = "";
            $client_serect  = "";
            $redirect_uri   = "http://tieba.richard1993.com/index.php/tieba/login";
            $redirect_uri   = rawurlencode($redirect_uri);
            $url            = "https://openapi.baidu.com/oauth/2.0/token?grant_type=$grant_type&code=$code&client_id=$client_id&client_secret=$client_serect&redirect_uri=$redirect_uri";
            $content        = file_get_contents($url);
            $content        = json_decode($content);
            //获取百度返回的code，并使用API登陆，获取access token 与refresh token
            if (isset($content->error) || !isset($content->access_token))
            {
                echo '<meta http-equiv="Content-Type" CONTENT="text/html; charset=UTF-8"/>';
                echo '认证失败，请与贴吧的Richard1122联系，或直接发送邮件至 richard9372@gmail.com，谢谢！<br />';
                exit;
                //认证失败（我也不知道这里会不会在正常情况下失败)
            }
            set_cookie(array(
                'name' => 'token',
                'value' => $content->access_token,
                'expire' => '1000000',
                'domain' => 'tieba.richard1993.com',
                'path' => '/'
                ));
            //认证成功，将access token 计入cookie，这样就不需要使用数据库来维护了
            header('Location: data');
            exit;
        }
        //未认证就访问这个页面，这不科学
        header('Location: http://tieba.richard1993.com');
    }

    public function data()
    {
        $token  = get_cookie('token');
        if (!$this->check_token($token))
        {
            header('Location: http://tieba.richard1993.com');
        }
        
        $content    = $this->get_user_data($token);
        if (!isset($content->userid) || !isset($content->username))
        {
            echo '<meta http-equiv="Content-Type" CONTENT="text/html; charset=UTF-8"/>';
            echo '认证失败，请与贴吧的Richard1122联系，或直接发送邮件至 richard9372@gmail.com，谢谢！<br />';
            exit;
        }
        $this->tieba_model->add_user($content);
        $is_post    = false;
        
        if ($this->input->post())
        {
            $is_post = true;
            $phone  = $this->input->post('phone');
            $email  = $this->input->post('email');
            $name   = $this->input->post('name');
            $major  = $this->input->post('major');
            $this->tieba_model->update_user($content->userid, $email, $phone, $name, $major);
            $mail   = new SaeMail();
            $mail->quickSend(
                $email,
                "浙江大学吧预科生迎新会报名通知",
                "亲爱的吧友 ". $content->username . ":\n" ."欢迎您参加浙江大学吧2013年预科生迎新会，目前你的报名信息为：\n" . "用户名：" . $content->username . "\n姓名：" . $name . "\n电话：" . $phone . "\n专业大类：" . $major . "\n请仔细核对以上信息，每次数据修改后你会收到此邮件。本邮件由系统自动发送，有疑问可以直接回复，谢谢！\n -----Richard",
                    '',
                    ''
                );
        }
        $content    = $this->tieba_model->get_user($content->userid);
        $data   = array(
            "content"   => $content,
            "post"      => $is_post
            );
        $this->load->view('data.php', $data);
    }

    public function analytics()
    {
        $data = $this->tieba_model->get_all_valid_user();
        echo '<meta http-equiv="Content-Type" CONTENT="text/html; charset=UTF-8"/>';
        echo "有效的注册用户<br />\n";
        $i = 0;
        foreach ($data as $row)
        {
            ++$i;
            echo '@' . $row->username . ' ';
            if ($i == 10) 
            {
                echo "<br />\n";
                $i = 0;
            }
            
            $content    = $row;
            $email  = $content->email;
            $mail   = new SaeMail();
        }
    }

    public function logout()
    {
        $token  = get_cookie('token');
        delete_cookie('token');
        $url = "https://openapi.baidu.com/rest/2.0/passport/auth/revokeAuthorization?access_token=$token";
        file_get_contents($url);
        header("Location: http://tieba.baidu.com/浙江大学");
    }

    private function get_user_data($token)
    {
        $url    = "https://openapi.baidu.com/rest/2.0/passport/users/getInfo?access_token=$token";
        $content    = file_get_contents($url);
        $content    = json_decode($content);
        return $content;
    }

    private function check_token($token)
    {
        $url    = "https://openapi.baidu.com/rest/2.0/passport/users/isAppUser?access_token=$token";
        $content    = file_get_contents($url);
        $content    = json_decode($content);
        if (isset($content->result) && $content->result == 1)
            return TRUE;
        return FALSE;
    }

}

/* End of file tieba.php */
/* Location: ./application/controllers/tieba.php */
