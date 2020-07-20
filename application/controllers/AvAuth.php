<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class AvAuth extends REST_Controller {

	function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('avauth_model','avauth');
	}
	

    function avlogin_post() {
        $json_str = file_get_contents('php://input');
        $data = json_decode($json_str);
        $username = $data->username;
        $password = $data->password;
        
        $checking = $this->avauth->avchecking($username,$password);
        if($checking == true){
            $user = $data->CMD1;
            $imei = $data->CMD2;
            $this->db->where('email',$user);
            $this->db->where('IMEI',$imei);
			$this->db->where('active','Y');
            $check = $this->db->get('member')->row_array();
            if(!empty($check)){
                $this->response(array(
                    'status' => 'login',
                    'message' => 'Berhasil login' 
                ));
            } else {
                $this->response(array(
                    'status' => 'gagal',
                    'message' => 'Gagal login' 
                ));
            }
        } else {
            $this->response(array(
                'status' => $checking,
                'message' => 'Who are you?' 
            ));
        }
        
	}
}
