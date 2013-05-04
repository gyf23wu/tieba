<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
//$s = new SaeStorage();
//$ret = $s->getList("S001", "*", 100 ) ;
//foreach($ret as $file) {
//            echo "{$file}<br>";
//}

//            $config['source_image'] = 'S001/001.png';
     //       $config['wm_overlay_path'] = 'S001/002.jpg';
    //        $config['dynamic_output'] = TRUE;
  //          $config['create_thumb'] = TRUE;
  //       $config['wm_text'] = 'Copyright 2006 - John Doe';
//            $config['wm_type'] = 'overlay';
//            $config['wm_x_transp'] = 10;
//            $config['wm_y_transp'] = 10;
//            
  //         $config['new_image'] = '00022.jpg';
            
//            $config['x_axis'] = '100';
//$config['y_axis'] = '60';
 
            
//            
//$config['wm_type'] = 'overlay';
//$config['wm_overlay_path'] = 'S001/1329406319.0162.jpg';
//
//
//            $this->load->library('image_lib'); 
//
//            $this->image_lib->initialize($config); 
//            
// echo   $this->image_lib->crop();
            
            
//
//           $this->image_lib->watermark();
//         echo $this->image_lib->display_errors();
  
  
 //           echo function_exists('getimagesize')?'Y':"N";
            
//            $this->load->helper('captcha');
//            $vals = array(
//                'word' => 'Random word',
//                'img_path' => 'S001',
//                'img_url' => ''
//                );
//
//            $cap = create_captcha($vals);
//            echo  $cap['image'] ;

            
            
            
//            $this->load->database();
            
 //          $sql = "INSERT INTO test_tb (name) VALUES ('name_02')";
 //          $this->db->query($sql);
            
//            $query = $this->db->query('SELECT * FROM test_tb');
 //           $query = $this->db->get('test_tb');
//
//            echo $query->num_rows() ;

            

//
//echo $kv->get('abc');
            
//            $mysql = new SaeMysql();
//            $sql = "SELECT * FROM `test_tb`";
//            $data = $mysql->getData( $sql );
//            print_r($data);
            
            
 //               $this->output->cache(10);
            
            
//                $this->load->driver('cache');
//                $this->cache->kvdb->save('001','0011');
//                print_r(  $this->cache->kvdb->get('001') );
                //print_r( $this->cache->kvdb->get('system_cache_f54033a89258de76b07eeb05fe2c4877') );           
            
//               $this->load->driver('cache');
//                $this->cache->memcached->save('001','0011');
//                echo $this->cache->memcached->get('system_cache_f54033a89258de76b07eeb05fe2c4877');
                


		$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */