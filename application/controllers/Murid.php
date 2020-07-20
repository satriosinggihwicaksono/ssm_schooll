<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Murid extends CI_Controller {

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
		$data["konfigurasi"] = $this->konfigurasi_model->config();
		$data["menu"] = 'Presensi Murid';
		$this->template->load('template', 'murid/murid', $data);
	}

	public function allstudent()
	{
		
		$keaktifan = $this->input->post('statuskeaktifanmurid');

        $payment = $this->input->post('statuspembayaranmurid');

		
		//isi URL-------------------------------------------------------------------------------------------
		$url = 'http://10.213.214.2:5758';

		//buat data json------------------------------------------------------------------------------------
		$data = array
				(
						"TBID" => "-",
						"DEVICETYPE" => "WEB",
						"REQTYPE" => "SSMWEB_STUDENT",
						"USERNAME" => "SSM",
						"PASSWORD" => "1234",
						"CMD1" => $keaktifan,
						"CMD2" => "-",
						"CMD3" => $payment,
						"CMD4" => "-",
						"CMD5" => "-"

				);     
		$REQUEST_SSMWEB_TEACHER_PRESENCE = json_encode($data); 

		//set & kirim request ke API------------------------------------------------------------------------
		$options = array
				(
					'http' => array
							(
								'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
								'method'  => 'POST',
								'content' => $REQUEST_SSMWEB_TEACHER_PRESENCE,
								'timeout' => 10.0,
								'ignore_errors' => true,
							)
				);
		$context  = stream_context_create($options);
		$RESPONSE_SSMWEB_TEACHER_PRESENCE = file_get_contents($url, false, $context);

		//------------------------------ OLAH KE DALAM BENTUK TABEL --------------------------------------


		$data = json_decode($RESPONSE_SSMWEB_TEACHER_PRESENCE, true);
		$arr["data"] = $data["msg_response"];
		echo json_encode($arr);
		// print_r($data["pengajar"]);
		// die();
	}
}