<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		
	}

    public function config() { 
        $url = 'http://localhost/apiballet/konfigurasi/view/';
		$data = array(
			"username" => "SSM",
			"password" => "1234",
		);     
		$json = json_encode($data); 
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => $json, 
				'timeout' => 10.0,
				'ignore_errors' => true,
			)
		);
		$context  = stream_context_create($options);
		$json = file_get_contents($url, false, $context);
		$data = json_decode($json, true);
		return $data;
    }
}
