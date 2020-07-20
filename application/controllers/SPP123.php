<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SPP extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		if($this->session->userdata('status_login') == false){
			redirect("", "refresh");
		}
	}

	public function index()
	{
		// check_not_login();
		$data["menu"] = 'Data SPP';
		$this->template->load('template', 'pembayaran/spp_v', $data);
	}

	public function getspp()
	{

		$date1 = $this->input->post('startdate');
		$startdate = date("Y-m-d", strtotime($date1));

		$date2 = $this->input->post('enddate');
		$enddate = date("Y-m-d", strtotime($date2));

		$url = 'http://103.215.177.234:5758';

		//buat data json------------------------------------------------------------------------------------
		$data = array
				(
					"TBID" => "-",
					"DEVICETYPE" => "WEB",
					"REQTYPE" => "SSMWEB_MONTHLYPAYMENTHISTORY",
					"USERNAME" => "SSM",
					"PASSWORD" => "1234",
					"CMD1" => $startdate,
					"CMD2" => $enddate,
					"CMD3" => $this->input->post('namamurid'),
					"CMD4" => "-",
					"CMD5" => "-"
				);     
		$REQUEST_SSMWEB_SPP = json_encode($data); 

		// echo "result : ". $REQUEST_SSMWEB_SPP;
		// die();
	
		//set & kirim request ke API------------------------------------------------------------------------
		$options = array
				(
					'http' => array
							(
								'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
								'method'  => 'POST',
								'content' =>  str_replace("\/","/", $REQUEST_SSMWEB_SPP), 
								'timeout' => 3.0,
								'ignore_errors' => true,
							)
				);
		$context  = stream_context_create($options);
		$REQUEST_SSMWEB_SPP_OK = file_get_contents($url, false, $context);
		
		$data = json_decode($REQUEST_SSMWEB_SPP_OK, true);
		$arr["data"] = $data["msg_response"];

		echo json_encode($arr);
	}

	public function getnama()
	{

		$url = 'http://103.215.177.234:5758';

		//buat data json------------------------------------------------------------------------------------
		$data = array
				(
					"TBID" => "-",
					"DEVICETYPE" => "WEB",
					"REQTYPE" => "SSMWEB_STUDENTNAME",
					"USERNAME" => "SSM",
					"PASSWORD" => "1234",
					"CMD1" => "-",
					"CMD2" => "-",
					"CMD3" => "-",
					"CMD4" => "-",
					"CMD5" => "-"
				);     
		$REQUEST_SSMWEB_NAMAMURID = json_encode($data); 
	
		//set & kirim request ke API------------------------------------------------------------------------
		$options = array
				(
					'http' => array
							(
								'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
								'method'  => 'POST',
								'content' =>  $REQUEST_SSMWEB_NAMAMURID, 
								'timeout' => 3.0,
								'ignore_errors' => true,
							)
				);
		$context  = stream_context_create($options);
		$REQUEST_SSMWEB_NAMAMURID = file_get_contents($url, false, $context);

		// echo "akjdahjdadlha : " . $REQUEST_SSMWEB_SPP_OK;
		// die();
		
		$data = json_decode($REQUEST_SSMWEB_NAMAMURID, true);
		$arr["data"] = $data["msg_response"];
		echo json_encode($arr);
	}
	
}