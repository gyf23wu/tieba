<?php

class Upload extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function index() {
        $this->load->view('upload_form', array('error' => ' '));
    }

    function do_upload() {
    	  //必须建立名为 ”S001“ 的storage. "a001",'b001'为存储文件夹。
        $config['upload_path'] = 'S001/a001/b001';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = true;
 //       $config['file_name'] = '0001.png';
        
//        $config['max_size'] = '100';
//        $config['max_width'] = '1024';
//        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            
            print_r($this->upload->display_errors());
            
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success', $data);
        }
    }

}