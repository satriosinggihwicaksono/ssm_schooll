<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi_Pengajar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status_login') == false){
			redirect("", "refresh");
		}
		$this->load->model('konfigurasi_model');
		$this->load->library('user_agent');
	}

	public function index($bulan = null,$tahun = null)
	{
		if($bulan == null && $tahun == null){
			$bulan = date('m');
			$tahun = date('Y');
		}

		$data["tahun"] = $tahun;
		$data["bulan"] = $bulan;
		$data["data"] = $this->getAll($bulan,$tahun);
		$data["menu"] = 'Presensi Pengajar';
		$data["konfigurasi"] = $this->konfigurasi_model->config();
 		$this->template->load('template', 'pengajar/absensi-guru', $data);
	}

	public function detail_presesi($bulan,$tahun,$kode)
	{
		$data["teacher"] = $this->get_teachername();
		$data["absen"] = $this->getPresesi($bulan,$tahun,$kode)['data'];
		$data["tahun"] = $tahun;
		$data["bulan"] = $bulan;
		$data["kode"] = $kode;
		$data["konfigurasi"] = $this->konfigurasi_model->config();
		$data["menu"] = 'Detail Presensi Pengajar';
 		$this->template->load('template', 'pengajar/presesi_guru', $data);
	}


	public function getAll($bulan,$tahun)
	{
		$url = 'http://localhost/apiballet/pengajar/viewpresensi/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $tahun,
			"CMD2" => $bulan,
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

	public function getPresesi($bulan,$tahun,$kode)
	{
		$url = 'http://localhost/apiballet/pengajar/viewdetailpresensi/';
		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $tahun,
			"CMD2" => $bulan,
			"CMD3" => $kode,
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

	public function get_teachername()
	{

		$url = 'http://localhost/apiballet/master/getteachers/';

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
	
	public function tambah_gaji()
	{

		$url = 'http://localhost/apiballet/pengajar/tambah_gaji/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('kode_salary'),
			"CMD2" => $this->input->post('total_salary'),
			"CMD3" => $this->input->post('tgl_penarikan_salary'),
			"CMD4" => $this->input->post('penambahan_salary'),
			"CMD5" => $this->input->post('pengurangan_salary'),
			"CMD6" => $this->input->post('catatan_salary'),
			"CMD7" => $this->input->post('total_gaji_salary'),
			"CMD8" => $this->input->post('bulan_salary'),
			"CMD9" => $this->input->post('tahun_salary'),
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
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Penarikan Gaji Berhasil</div>');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Gagal diekskusi</div>');
		}

		redirect($this->agent->referrer());
	}

	public function check_gaji()
	{

		$url = 'http://localhost/apiballet/pengajar/check_gaji/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('kode'),
			"CMD2" => $this->input->post('bulan'),
			"CMD3" => $this->input->post('tahun'),
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

		echo json_encode($data);
	}
}