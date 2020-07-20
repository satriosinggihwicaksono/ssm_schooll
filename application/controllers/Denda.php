<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Denda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		if($this->session->userdata('status_login') == false){
			redirect("", "refresh");
		}
		$this->load->model('konfigurasi_model');
	}

	public function index($tanggal_awal = null,$tanggal_akhir = null, $status = null)
	{
		if($tanggal_awal == null && $tanggal_akhir == null){
			$tanggal_awal = date('d-m-Y');
			$tanggal_akhir = date('d-m-Y');
		}
		$data["data"] = $this->getdenda($tanggal_awal,$tanggal_akhir,$status);
		$data['tanggal_awal'] = $tanggal_awal;
		$data['tanggal_akhir'] = $tanggal_akhir;
		$data['status'] = $status;
		$data["menu"] = 'Denda';
		$data["konfigurasi"] = $this->konfigurasi_model->config();
 		$this->template->load('template', 'pembayaran/denda_v', $data);
	}

	public function getdenda($tanggal_awal,$tanggal_akhir,$status)
	{
		$url = 'http://localhost/apiballet/denda/view';
		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $tanggal_awal,
			"CMD2" => $tanggal_akhir,
			"CMD3" => $status
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
}