<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		if($this->session->userdata('status_login') == false){
			redirect("", "refresh");
		}
		$this->load->model('konfigurasi_model');
	}

	public function index()
	{
		$data["menu"] = 'Data Kas';
		$data["konfigurasi"] = $this->konfigurasi_model->config();
		$this->template->load('template', 'keuangan/kas', $data);
	}

	public function get_kas()
	{
		$url = 'http://localhost/apiballet/kas/view/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" =>$this->input->post('tanggal_awal'),
			"CMD2" =>$this->input->post('tanggal_akhir'),
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

	public function get_refid()
	{
		$url = 'http://localhost/apiballet/kas/getrefid/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->get('tipe')
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

		echo $data['data'];
	}

	public function tambahkas(){
		$url = 'http://localhost/apiballet/kas/tambah/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('tanggal'),
			"CMD2" => $this->input->post('tipe'),
			"CMD3" => $this->input->post('keperluan'),
			"CMD4" => $this->input->post('keterangan'),
			"CMD5" => $this->input->post('besar'),
			"CMD6" => $this->input->post('refid'),
			"CMD7" => $this->input->post('tipe')
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

	public function editkas(){
		$url = 'http://localhost/apiballet/kas/edit/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('tanggal2'),
			"CMD2" => $this->input->post('tipe2'),
			"CMD3" => $this->input->post('keperluan2'),
			"CMD4" => $this->input->post('keterangan2'),
			"CMD5" => $this->input->post('besar2'),
			"CMD6" => $this->input->post('refid2'),
			"CMD7" => $this->input->post('tipe2')
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

	public function hapuskas()
	{
		$url = 'http://localhost/apiballet/kas/hapus/';

		$data = array(
				"username" => "SSM",
				"password" => "1234",
				"CMD1" => $this->input->post('refid3'),
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

	
}