<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

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
		$data["menu"] = 'Pengaturan';
		$data["konfigurasi"] = $this->konfigurasi_model->config();
		$this->template->load('template', 'setting/setting', $data);
	}

	public function edit(){
		$url = 'http://localhost/apiballet/konfigurasi/edit/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('nama'),
			"CMD2" => $this->input->post('subnama'),
			"CMD3" => $this->input->post('tempo'),
			"CMD4" => $this->input->post('denda'),
			"CMD5" => $this->input->post('registrasi'),
			"CMD6" => $this->input->post('autosubclass'),
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
		$result = file_get_contents($url, false, $context);
		$data = json_decode($result, true);

		if($data["status"] == 'TRUE'){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Gagal diubah</div>');
		}
		redirect('Setting');	
	}
	
	public function update(){
		$url = 'http://localhost/apiballet/spp/update_pembayaran';

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
		$result = file_get_contents($url, false, $context);
		$data = json_decode($result, true);

		if($data["status"] == 'TRUE'){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Status Pembayaran Berhasi Diubah</div>');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Gagal diubah</div>');
		}
		redirect('Setting');	
	}
}