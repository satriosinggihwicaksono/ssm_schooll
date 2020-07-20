<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Private_page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status_login') == false){
			redirect("", "refresh");
		}
		$this->load->model('konfigurasi_model');
	}

	public function index($tanggal_awal = null,$tanggal_akhir = null,$kelas = null,$tipe = null)
	{
		if($tipe == null){
			$tipe = 0;
		}
		if($tanggal_awal == null && $tanggal_akhir == null){
			$tanggal_awal = date('d-m-Y');
			$tanggal_akhir = date('d-m-Y');
		}

		$data["tanggal_awal"] = $tanggal_awal;
		$data["tanggal_akhir"] = $tanggal_akhir;
		$data["data"] = $this->getspp($tanggal_awal,$tanggal_akhir,$kelas,$tipe);
		$data["class"] = $this->getclass();
		$data["kelas"] = $kelas;
		$data["tipe"] = $tipe;
		$data["menu"] = 'Pembayaran Private';
		$data["konfigurasi"] = $this->konfigurasi_model->config();
		$this->template->load('template', 'pembayaran/private_v', $data);
	}

	public function getspp($tanggal_awal,$tanggal_akhir,$kelas,$tipe)
	{
		$url = 'http://localhost/apiballet/private_page/view';
		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $tanggal_awal,
			"CMD2" => $tanggal_akhir,
			"CMD3" => $kelas,
			"CMD4" => $tipe,
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
		
		return $data;
	}

	public function getclass()
	{
		$url = 'http://localhost/apiballet/master/getclassPrivate';
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
		
		return $data['data'];
	}
}