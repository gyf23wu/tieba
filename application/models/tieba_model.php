<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tieba_model extends CI_Model {

    public $variable;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function update_user($uid, $email, $phone, $name, $major)
    {
        $this->db->set('name', $name)->set('email', $email)->set('phone', $phone)->where('uid', $uid)->set('major', $major)->update('baju');
    }
    public function get_user($uid)
    {
        $data  = $this->db->where('uid', $uid)->get('baju');
        return $data->row();
    }
    public function add_user($content)
    {
        $query = $this->db->where('uid', $content->userid)->get('baju');
        if ($query->num_rows != 0)
            return ;
        $this->db->set('uid', $content->userid)->set('username', $content->username)->insert('baju');
    }
    public function get_all_valid_user()
    {
        $sql = "SELECT * FROM `baju` WHERE phone is not null and email is not null and name is not null ";
        $result = $this->db->query($sql);
        return $result->result();
    }

}

/* End of file tieba_model.php */
/* Location: ./application/models/tieba_model.php */