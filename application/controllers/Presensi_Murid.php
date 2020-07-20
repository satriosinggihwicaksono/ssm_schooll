<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi_Murid extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status_login') == false){
			redirect("", "refresh");
		}
		$this->load->model('konfigurasi_model');
	}

	public function index($bulan = null,$tahun = null,$kelas = null)
	{
		if($bulan == null && $tahun == null){
			$bulan = date('m');
			$tahun = date('Y');
		}
		
		$data["tahun"] = $tahun;
		$data["bulan"] = $bulan;
		$data["kelas"] = $kelas;
		$data["data"] = $this->getAll($bulan,$tahun,$kelas);
		$data["subclass"] = $this->get_subclass();
		$data["class"] = $this->get_class();
		$data["menu"] = 'Presensi Murid';
		$data["konfigurasi"] = $this->konfigurasi_model->config();
		$this->template->load('template', 'murid/presensi_murid', $data);
	}

	public function getAll($bulan,$tahun,$kelas)
	{
		$url = 'http://localhost/apiballet/murid/viewpresensi/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $tahun,
			"CMD2" => $bulan,
			"CMD3" => $kelas,
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

	public function get_class()
	{

		$url = 'http://localhost/apiballet/master/getclass/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
		);     
		$REQUEST_SSMWEB_KELAS = json_encode($data); 

		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => $REQUEST_SSMWEB_KELAS, 
				'timeout' => 10.0,
				'ignore_errors' => true,
			)
		);
		$context  = stream_context_create($options);
		$REQUEST_SSMWEB_KELAS = file_get_contents($url, false, $context);

		$data = json_decode($REQUEST_SSMWEB_KELAS, true);
		
		$arr = $data['data'];

		return $arr;
	}
	
	public function get_subclass()
	{

		$url = 'http://localhost/apiballet/master/getsubclass/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
		);     
		$REQUEST_SSMWEB_KELAS = json_encode($data); 

		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => $REQUEST_SSMWEB_KELAS, 
				'timeout' => 10.0,
				'ignore_errors' => true,
			)
		);
		$context  = stream_context_create($options);
		$REQUEST_SSMWEB_KELAS = file_get_contents($url, false, $context);

		$data = json_decode($REQUEST_SSMWEB_KELAS, true);
		
		$arr = $data['data'];

		return $arr;
	}

	public function get_cekabsen()
	{		
		$url = 'http://localhost/apiballet/murid/cekabsen';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('tanggal'),
			"CMD2" => $this->input->post('subkelas'),
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