<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Kelas extends CI_Controller {

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
		$teacher = json_decode($this->get_teachername(),true);
		$data["studio"] = $this->studio();
		$data["menu"] = 'Data Kelas';
		$data["teacher"] = $teacher;
		$this->template->load('template', 'kelas/data_kelas', $data);
	}

	public function get_kelas()
	{
		$url = 'http://localhost/apiballet/kelas/view/';

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
		
		$arr["data"] = $data['data'];

		echo json_encode($arr);
	}

	public function tambahkelas()
	{

		$url = 'http://localhost/apiballet/kelas/tambah/';

		//buat data json------------------------------------------------------------------------------------
		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('kodekelas'), //"DIISI ClassCode",
			"CMD2" => $this->input->post('namakelas'), //"ClassName",
			"CMD3" => $this->input->post('kategori'), //"ClassStep",
			"CMD4" => $this->input->post('hargakelas1'), //"ClassPrice",
			"CMD5" => $this->input->post('hargakelas2'), //"ClassPrice_B",
			"CMD6" => $this->input->post('leotard'), //"UniLeotard",
			"CMD7" => $this->input->post('stocking'), //"UniStocking",
			"CMD8" => $this->input->post('skirt'), //"UniSkirt",
			"CMD9" => $this->input->post('shoes'), //"UniShoes",
			"CMD10" => $this->input->post('cskirt'), //"UniCSkirt",
			"CMD11" => $this->input->post('cshoes'), //"UniCShoes" 
			"CMD12" => $this->input->post('status_reward'),
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
			echo json_encode(array("status" => TRUE));
		} else {
			echo json_encode(array("status" => FALSE, "alert" => $data['information']));
		}
	}

	public function editkelas()
	{
		$k_kelas = $this->input->post('kodekelas');
		$n_kelas = $this->input->post('namakelas');
		$kategori = $this->input->post('kategori');
		$h_k1 = $this->input->post('hargakelas1');
		$h_k2 = $this->input->post('hargakelas2');
		$leotard = $this->input->post('leotard');
		$stocking = $this->input->post('stocking');
		$skirt = $this->input->post('skirt');
		$shoes = $this->input->post('shoes');
		$sckirt = $this->input->post('cskirt');
		$cshoes = $this->input->post('cshoes');

		$url = 'http://localhost/apiballet/kelas/edit/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $k_kelas, //"DIISI ClassCode",
			"CMD2" => $n_kelas, //"ClassName",
			"CMD3" => $kategori, //"ClassStep",
			"CMD4" => $h_k1, //"ClassPrice",
			"CMD5" => $h_k2, //"ClassPrice_B",
			"CMD6" => $leotard, //"UniLeotard",
			"CMD7" => $stocking, //"UniStocking",
			"CMD8" => $skirt, //"UniSkirt",
			"CMD9" => $shoes, //"UniShoes",
			"CMD10" => $sckirt, //"UniCSkirt",
			"CMD11" => $cshoes, //"UniCShoes" 
			"CMD12" => $this->input->post('status_reward'),
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
			echo json_encode(array("status" => TRUE));
		} else {
			echo json_encode(array("status" => FALSE, "alert" => $data['information']));
		}
	}

	public function hapuskelas()
	{
		$url = 'http://localhost/apiballet/kelas/hapus/';

		$data = array(
				"username" => "SSM",
				"password" => "1234",
				"CMD1" => $this->input->post('hkodekelas')
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
			echo json_encode(array("status" => TRUE));
		} else {
			echo json_encode(array("status" => FALSE, "alert" => $data['information']));
		}
	}

	public function get_sub_kelas($cmd1)
	{		
		$url = 'http://localhost/apiballet/subkelas/view/';

		//buat data json------------------------------------------------------------------------------------
		$data = array(
				"username" => "SSM",
				"password" => "1234",
				"CMD1" => $cmd1,
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
		
		$arr["data"] = $data['data'];

		echo json_encode($arr);
	}
	
	public function get_murid_kelas($cmd1)
	{		
		$url = 'http://localhost/apiballet/kelas/getmuridkelas/';

		//buat data json------------------------------------------------------------------------------------
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

	public function tambahsubkelas()
	{

		$sampleDate = $this->input->post('jam');
		$datetime = date("Y-m-d H:i:s", strtotime($sampleDate));

		$url = 'http://localhost/apiballet/subkelas/tambah/';
			
		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('kodekelas'),
			"CMD2" => $this->input->post('guru'),
			"CMD3" => $this->input->post('asisten1'),
			"CMD4" => $this->input->post('asisten2'),
			"CMD5" => $this->input->post('kodesubkelas'),
			"CMD6" => $this->input->post('namasubkelas'),
			"CMD7" => $this->input->post('hari'),
			"CMD8" => $datetime,
			"CMD9" => $this->input->post('studio'),
			"CMD10" => $this->input->post('status')
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
			echo json_encode(array("status" => TRUE,"kode" => $this->input->post('kodekelas')));
		} else {
			echo json_encode(array("status" => FALSE, "alert" => $data['information']));
		}
		
	}

	public function editsubkelas()
	{

		$sampleDate = date('Y-m-d').' '.$this->input->post('jam').':00';
		$url = 'http://localhost/apiballet/subkelas/edit/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('kodekelas'),
			"CMD2" => $this->input->post('guru'),
			"CMD3" => $this->input->post('asisten1'),
			"CMD4" => $this->input->post('asisten2'),
			"CMD5" => $this->input->post('kodesubkelas'),
			"CMD6" => $this->input->post('namasubkelas'),
			"CMD7" => $this->input->post('hari'),
			"CMD8" => $sampleDate,
			"CMD9" => $this->input->post('studio'),
			"CMD10" => $this->input->post('status')
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
			echo json_encode(array("status" => TRUE,"kode" => $this->input->post('kodekelas')));
		} else {
			echo json_encode(array("status" => FALSE, "alert" => $data['information']));
		}
	}

	public function hapussubkelas()
	{
		$url = 'http://localhost/apiballet/Subkelas/hapus/';

		$data = array(
				"username" => "SSM",
				"password" => "1234",
				"CMD1" => $this->input->post('hsub')
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
			echo json_encode(array("status" => TRUE, "kode" => $this->input->post('kodekelas')));
		} else {
			echo json_encode(array("status" => FALSE, "alert" => $data['information']));
		}
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

		return json_encode($arr);
	}
	
	public function studio()
	{
		$url = 'http://localhost/apiballet/master/studio/';

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


