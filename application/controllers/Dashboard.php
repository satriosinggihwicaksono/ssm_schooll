<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status_login') == false){
			redirect("", "refresh");
		}
		$this->load->model('konfigurasi_model');
	}

	public function index()
	{
		$data["konfigurasi"] = $this->konfigurasi_model->config();
		$data["menu"] = 'Dashboard';
		$data['laporan1'] = $this->get_laporan1();
		$data['laporan2'] = $this->get_laporan2();
		$data['laporan3'] = $this->get_laporan3();
		$data['card'] = $this->get_card();
		$data['jadwal'] = $this->get_jadwal();
		$data['private'] = $this->get_private();
		$this->template->load('template', 'dashboard/dashboard', $data);
	}

	public function get_card()
	{
		$url = 'http://localhost/apiballet/dashboard/dashboard/';
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

	public function get_laporan1()
	{
		$url = 'http://localhost/apiballet/dashboard/laporan1/';
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

	public function get_laporan2()
	{
		$url = 'http://localhost/apiballet/dashboard/laporan2/';
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

	public function get_laporan3()
	{
		$url = 'http://localhost/apiballet/dashboard/laporan3/';
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

	public function get_jadwal()
	{
		$url = 'http://localhost/apiballet/dashboard/jadwal/';
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

		return $data['data'];
	}

	public function get_private()
	{
		$url = 'http://localhost/apiballet/dashboard/private/';
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