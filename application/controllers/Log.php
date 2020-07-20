<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		if($this->session->userdata('status_login') == false){
			redirect("", "refresh");
		}
		$this->load->model('konfigurasi_model');
	}

	public function pengajar()
	{
		$data["menu"] = 'Log Login Pengajar';
		$data["konfigurasi"] = $this->konfigurasi_model->config();
 		$this->template->load('template', 'log/log', $data);
	}

	public function murid()
	{
		$data["menu"] = 'Log Login Murid';
		$data["konfigurasi"] = $this->konfigurasi_model->config();
 		$this->template->load('template', 'log/log', $data);
	}

	public function get_teacher()
	{
		$url = 'http://localhost/apiballet/log/viewteacher/';

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
		
		$arr["data"] = $data['data'];

		echo json_encode($arr);
	}

	public function get_student()
	{
		$url = 'http://localhost/apiballet/log/viewstudent/';

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
		
		$arr["data"] = $data['data'];

		echo json_encode($arr);
	}

}