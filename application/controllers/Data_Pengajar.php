<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Pengajar extends CI_Controller {

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
		$data["menu"] = 'Data Pengajar';
		$data["konfigurasi"] = $this->konfigurasi_model->config();
		$this->template->load('template', 'pengajar/data_pengajar', $data);
	}

	public function get_pengajar_by_kelas()
	{
		$url = 'http://localhost/apiballet/pengajar/view/';

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

	public function get_data_kelas_yang_diajar($cmd1 = 0)
	{
		$url = 'http://localhost/apiballet/pengajar/viewdetail/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $cmd1,		
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

	public function tambahpengajar()
	{
		$date = $this->input->post('tgllahir');
		$startdate = date("d/m/Y", strtotime($date));
	
		$url = 'http://localhost/apiballet/pengajar/tambah/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('kodeguru'), 
			"CMD2" => $this->input->post('namaguru'), 
			"CMD3" => $this->input->post('hpguru'),  
			"CMD4" => $date,
			"CMD5" => $this->input->post('alamat'),
			"CMD6" => $this->input->post('skill'), 
			"CMD7" => $this->input->post('feeguru'), 
			"CMD8" => $this->input->post('feeasistance1'), 
			"CMD9" => $this->input->post('feeasistance2'), 
			"CMD10" => $this->input->post('keterangan'),
			"CMD11" => $this->input->post('aktif'),
			"CMD12" => $this->input->post('password'),
			"CMD13" => $this->input->post('tempatlahir'),
			"CMD14" => $this->input->post('fullname'),
			"CMD15" => $this->input->post('awal'),
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
			echo json_encode(array("status" => TRUE,"kode" => $this->input->post('kodeguru')));
		} else {
			echo json_encode(array("status" => FALSE, "alert" => $data['information']));
		}
	}

	public function editpengajar()
	{
		$origDate = $this->input->post('tgllahir');
		$newDate = date("d/m/Y", strtotime($origDate));
		$url = 'http://localhost/apiballet/pengajar/edit/';

		$data = array
				(
					"username" => "SSM",
					"password" => "1234",
					"CMD1" => $this->input->post('kodeguru'), 
					"CMD2" => $this->input->post('namaguru'), 
					"CMD3" => $this->input->post('hpguru'),  
					"CMD4" => $origDate,
					"CMD5" => $this->input->post('alamat'),
					"CMD6" => $this->input->post('skill'), 
					"CMD7" => $this->input->post('feeguru'), 
					"CMD8" => $this->input->post('feeasistance1'), 
					"CMD9" => $this->input->post('feeasistance2'), 
					"CMD10" => $this->input->post('keterangan'),
					"CMD11" => $this->input->post('aktif'),
					"CMD12" => $this->input->post('password'),
					"CMD13" => $this->input->post('tmptlahir'),
					"CMD14" => $this->input->post('fullname'),
					"CMD15" => $this->input->post('awal'),
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
			echo json_encode(array("status" => TRUE,"kode" => $this->input->post('kodeguru')));
		} else {
			echo json_encode(array("status" => FALSE, "alert" => $data['information']));
		}
	}

	public function hapuspengajar()
	{

		$url = 'http://localhost/apiballet/pengajar/hapus/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('hdatapengajar'),
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
			echo json_encode(array("status" => TRUE,"kode" => $this->input->post('kodeguru')));
		} else {
			echo json_encode(array("status" => FALSE, "alert" => $data['information']));
		}
	}
}