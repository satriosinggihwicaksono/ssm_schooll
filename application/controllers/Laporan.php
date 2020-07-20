<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status_login') == false){
			redirect("", "refresh");
		}
		$this->load->model('konfigurasi_model');
	}

	public function index($tanggal_awal = null,$tanggal_akhir = null)
	{
		if($tanggal_awal == null && $tanggal_akhir == null){
			$tanggal_awal = date('01-m-Y');
			$tanggal_akhir = date('d-m-Y');
		}
		$data["konfigurasi"] = $this->konfigurasi_model->config();
		$data["menu"] = 'Laporan';
		$data["hasil"] = $this->get_laporan($tanggal_awal,$tanggal_akhir);
		$data["tanggal_awal"] = $tanggal_awal;
		$data["tanggal_akhir"] = $tanggal_akhir;
		$this->template->load('template', 'keuangan/laporan', $data);
	}

	public function get_laporan($tanggal_awal,$tanggal_akhir)
	{
		$url = 'http://localhost/apiballet/laporan/view/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" =>$tanggal_awal,
			"CMD2" =>$tanggal_akhir,
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