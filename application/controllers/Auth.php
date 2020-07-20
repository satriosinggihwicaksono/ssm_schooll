<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
	}


	public function index()
	{
		$data["konfigurasi"] = $this->konfigurasi_model->config();
		$this->load->view('login',$data);
	}

	public function post_login()
	{
		$url = 'http://localhost/apiballet/auth/login/';
		$data = array
				(
					"username" => "SSM",
					"password" => "1234",
					"code" => $this->input->post("username"),
					"pwd" => $this->input->post("pass"),
				);     
		$REQUEST_SSMWEB_LOGIN = json_encode($data); 

		$options = array(
			'http' => array
				(
					'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
					'method'  => 'POST',
					'content' => $REQUEST_SSMWEB_LOGIN, 
					'timeout' => 3.0,
					'ignore_errors' => true,
				)
		);
		$context  = stream_context_create($options);
		$REQUEST_SSMWEB_LOGIN = file_get_contents($url, false, $context);
		
		$data = json_decode($REQUEST_SSMWEB_LOGIN, true);
		
		if($data['status'] == "login") {
			$this->session->set_userdata('status_login', true);
			redirect("Dashboard");
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			<b>Login Gagal</b><br>Cek Kembali Username dan Password atau Koneksi Internet Anda
			</div>');
			redirect();
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('','refresh');
	}
}