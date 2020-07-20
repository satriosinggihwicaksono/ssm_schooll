<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Murid extends CI_Controller {

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
		$awal = $this->input->post('startdate');
		$murid = $this->input->post('classesname');
		$akhir = $this->input->post('enddate');
		
		$konfigurasi = $this->konfigurasi();

		if(!empty($awal)){
			$data["startdate"] = $awal;
			$data["enddate"] = $akhir;
			$data["classesname"] = $murid;
		}
		$data["konfigurasi"] = $this->konfigurasi_model->config();
		$data["class"] = $this->get_class();
		$data["menu"] = 'Data Murid';
		$data["konfigurasi"] = $konfigurasi;
		$this->template->load('template', 'murid/data_murid', $data);
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


	public function get_data_murid()
	{
		$awal = $this->input->post('startdate');
		$akhir = $this->input->post('status_bayar');
		$murid = $this->input->post('classesname');
		$url = 'http://localhost/apiballet/murid/view/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $awal,
			"CMD2" => $murid,
			"CMD3" => $akhir,
			"CMD4" => $this->input->post('st_kategori'),
			"CMD5" => $this->input->post('st_program'),

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
		
		$arr["data"] = $data['data'];

		echo json_encode($arr);
	}


	public function get_datamurid($cmd1)
	{
		$url = 'http://localhost/apiballet/submurid/view';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $cmd1,
			"CMD2" => $this->input->post('sb_program'),
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
		
		$arr["data"] = $data['data'];

		echo json_encode($arr);
	}

	public function tambahmurid()
	{	
		$date = $this->input->post('tgllahir');
		$startdate = date("d/m/Y", strtotime($date));

		$url = 'http://localhost/apiballet/murid/tambah/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('kodemurid'),
			"CMD2" => $this->input->post('namamurid'),
			"CMD3" => $this->input->post('namapanggilan'),
			"CMD4" => $date,
			"CMD5" => $this->input->post('alamat'),
			"CMD6" => $this->input->post('hportu'),
			"CMD7" => $this->input->post('hpmurid'),
			"CMD8" => $this->input->post('hpwalimurid'),
			"CMD9" => $this->input->post('instagram'),
			"CMD10" => $this->input->post('email'),
			"CMD11" => $this->input->post('facebook'),
			"CMD12" => $this->input->post('catatan'),
			"CMD13" => $this->input->post('keaktifan'),
			"CMD14" => $this->input->post('pwd'),
			"CMD15" => $this->input->post('status_cost'),
			"CMD16" => $this->input->post('atasnama_cost'),
			"CMD17" => $this->input->post('bayar_cost'),
			"CMD18" => $this->input->post('catatan_cost'),
			"CMD19" => $this->input->post('jenis_cost'),
			"CMD20" => $this->input->post('potongan_cost'),
			"CMD21" => $this->input->post('tempatlahir'),
			"CMD22" => $this->input->post('awal')
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

	public function editmurid()
	{	
		$date = $this->input->post('tgllahir');
		$startdate = date("d/m/Y", strtotime($date));

		$url = 'http://localhost/apiballet/murid/edit/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('kodemurid'),
			"CMD2" => $this->input->post('namamurid'),
			"CMD3" => $this->input->post('namapanggilan'),
			"CMD4" => $date,
			"CMD5" => $this->input->post('alamat'),
			"CMD6" => $this->input->post('hportu'),
			"CMD7" => $this->input->post('hpmurid'),
			"CMD8" => $this->input->post('hpwalimurid'),
			"CMD9" => $this->input->post('instagram'),
			"CMD10" => $this->input->post('email'),
			"CMD11" => $this->input->post('facebook'),
			"CMD12" => $this->input->post('catatan'),
			"CMD13" => $this->input->post('keaktifan'),
			"CMD14" => $this->input->post('pwd'),
			"CMD15" => $this->input->post('tmplahir'),
			"CMD16" => $this->input->post('awal')
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

	public function hapusmurid()
	{

		$url = 'http://localhost/apiballet/murid/hapus/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('hdatamurid'),
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

	public function checktambahkelas()
	{

        $tmasuk = $this->input->post('tglmasuk1');
		$tgl = date("Y-m-d H:i:s", strtotime($tmasuk));

		$url = 'http://localhost/apiballet/submurid/check/';

		$data = array(
				"username" => "SSM",
				"password" => "1234",
				"CMD1" => $this->input->post('kodemurid'),
				"CMD2" => $this->input->post('subclasscode_add'),
				"CMD3" => $this->input->post('tahapan'),
				"CMD4" => $this->input->post('price_class2'),
				"CMD5" => $this->input->post('type2'),
				"CMD6" => $tmasuk,
				"CMD7" => $this->input->post('namamurid2'),
				"CMD8" => $this->input->post('price_class_type2'),
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
			echo json_encode(array("status" => TRUE,"data" => $data['data'],"step" => $data['step']));
		} else {
			echo json_encode(array("status" => FALSE, "alert" => $data['information'], "data" => $data));
		}
	}

	public function checktambahkelas2()
	{

        $tmasuk = $this->input->post('tglmasuk1');
		$tgl = date("Y-m-d H:i:s", strtotime($tmasuk));

		$url = 'http://localhost/apiballet/submurid/check/';

		$data = array(
				"username" => "SSM",
				"password" => "1234",
				"CMD1" => $this->input->post('kodemurid10'),
				"CMD2" => $this->input->post('subclasscode_add10'),
				"CMD3" => $this->input->post('tahapan10'),
				"CMD4" => $this->input->post('price_class10'),
				"CMD5" => $this->input->post('type10'),
				"CMD6" => $tmasuk,
				"CMD7" => $this->input->post('namamurid10'),
				"CMD8" => $this->input->post('price_class_type10')
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
			echo json_encode(array("status" => TRUE,"data" => $data['data'],"step" => $data['step']));
		} else {
			echo json_encode(array("status" => FALSE, "alert" => $data['information'], "data" => $data));
		}
	}

	public function tambahkelas()
	{

		$url = 'http://localhost/apiballet/submurid/tambahkelas/';

		$data = array(
				"username" => "SSM",
				"password" => "1234",
				"CMD1" => $this->input->post('kodemurid2'),
				"CMD2" => $this->input->post('namasubkelas3'),
				"CMD3" => $this->input->post('tahapan'),
				"CMD4" => $this->input->post('price_class_type2'),
				"CMD5" => $this->input->post('type'),
				"CMD6" => $this->input->post('tglmasuk3'),
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
			echo json_encode(array("status" => TRUE,"data" => $data['data']));
		} else {
			echo json_encode(array("status" => FALSE, "alert" => $data['information'], "data" => $data));
		}
	}

	public function hapuskelasmurid()
	{

		$url = 'http://localhost/apiballet/submurid/hapus/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('kodesubkelas'),
			"CMD2" => $this->input->post('kodemurid'),
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

	public function list_class_murid()
	{		

		$url = 'http://localhost/apiballet/submurid/subviewnonexamp/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('kodemurid'),
			"CMD2" => '0',
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
		$arr["data"] = $data['data'];

		echo json_encode($arr);
	}

	public function exam_list()
	{		

		$url = 'http://localhost/apiballet/submurid/subviewexamp/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('kodemurid'),
			"CMD2" => '1',
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
		$arr["data"] = $data['data'];

		echo json_encode($arr);
	}

	public function editstatusmurid()
	{		

		$url = 'http://localhost/apiballet/submurid/editstatusmurid/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('kodesubkelas'),
			"CMD2" => $this->input->post('kodemurid'),
			"CMD3" => $this->input->post('statusprogram'),
			"CMD4" => $this->input->post('statuspayment')
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

	public function sub_list($kodeklas,$kodemurid,$subclasscode)
	{		

		$url = 'http://localhost/apiballet/submurid/viewsubclass/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $kodeklas, 
			"CMD2" => $kodemurid,
			"CMD3" => $subclasscode
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

		$arr["data"] = $data['data'];

		echo json_encode($arr);
	}

	public function ubahsubkelas()
	{		
		$url = 'http://localhost/apiballet/submurid/ubahsubkelas/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('subclasscode_old'),
			"CMD2" => $this->input->post('subclasscode_new'),
			"CMD3" => $this->input->post('kodemurid'),
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

	public function ubahhargakelas()
	{		

		$url = 'http://localhost/apiballet/submurid/ubahhargakelas/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('subclasscode_pricecheck'),
			"CMD2" => $this->input->post('kodemurid_pricecheck'),
			"CMD3" => $this->input->post('hargabaru_pricecheck'),
			"CMD4" => $this->input->post('type_price'),
		
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


	public function bayarspp()
	{		
		$url = 'http://localhost/apiballet/submurid/tambahspp/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('cek_pembayaran'), 
			"CMD2" => $this->input->post('kodemurid3'),
			"CMD3" => $this->input->post('kodekelas'),
			"CMD4" => $this->input->post('kodeskelas'),
			"CMD5" => $this->input->post('biaya'),
			"CMD6" => $this->input->post('catatan'),
			"CMD7" => $this->input->post('biaya'),
			"CMD8" => $this->input->post('jenis'),
			"CMD9" => $this->input->post('an'),
			"CMD10" => $this->input->post('tgl_pembayaran'),
			"CMD11" => $this->input->post('pwf'),
			"CMD12" => $this->input->post('biayadenda'),
			"CMD13" => $this->input->post('pd'),
			"CMD14" => $this->input->post('terlambat')
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
	
	public function bayarujian()
	{		

		$url = 'http://localhost/apiballet/submurid/bayarujian/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('tpu'),
			"CMD2" => $this->input->post('kodekelas'),
			"CMD3" => $this->input->post('kodemurid99'),
			"CMD4" => $this->input->post('kodesubkelas'),
			"CMD5" => $this->input->post('biaya'),
			"CMD6" => $this->input->post('keterangan_pembayaran'),
			"CMD7" => $this->input->post('pembayaran_ujian'),
			"CMD8" => $this->input->post('jenis_pem_ujian'),
			"CMD9" => $this->input->post('a_nama'),
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

	public function bayarprivate()
	{		
		$url = 'http://localhost/apiballet/submurid/bayarprivate/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('tpu_private'),
			"CMD2" => $this->input->post('kodekelas_private'),
			"CMD3" => $this->input->post('kodemurid99_private'),
			"CMD4" => $this->input->post('kodesubkelas_private'),
			"CMD5" => $this->input->post('biaya_private'),
			"CMD6" => $this->input->post('keterangan_pembayaran_private'),
			"CMD7" => $this->input->post('pembayaran_ujian_private'),
			"CMD8" => $this->input->post('jenis_pem_ujian_private'),
			"CMD9" => $this->input->post('a_nama_private'),
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

	public function listbayar_ujian($kodemurid, $kodekelas, $kodesubkelas)
	{		

		$total = $this->input->post('biaya10');
		$url = 'http://localhost/apiballet/submurid/history_payment/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $kodemurid,
			"CMD2" => $kodekelas,
			"CMD3" => $kodesubkelas,
			"CMD4" => $total

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
		$arr["data"] = $data['data'];

		echo json_encode($arr);
	}

	public function listbayar_private($kodemurid, $kodekelas, $kodesubkelas)
	{		

		$url = 'http://localhost/apiballet/submurid/history_payment_private/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $kodemurid,
			"CMD2" => $kodekelas,
			"CMD3" => $kodesubkelas,

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
		$arr["data"] = $data['data'];

		echo json_encode($arr);
	}

	public function konfigurasi()
	{
		$url = 'http://localhost/apiballet/konfigurasi/view/';

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
		return $data;
	}

	public function data_pembayaran($classcode,$subclasscode,$codestudent)
	{
		$url = 'http://localhost/apiballet/submurid/pembayaran/';

		//buat data json------------------------------------------------------------------------------------
		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $classcode,
			"CMD2" => $subclasscode,
			"CMD3" =>$codestudent,
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

	public function tanggal(){
		
		$tanggal = $this->konfigurasi_model->config();
		$due = $tanggal['data']['duedate'];
		$tanggal = strtotime($this->input->get('tanggal'));
		$classcode = $this->input->get('classcode');
		$subclasscode = $this->input->get('subclasscode');
		$codestudent = $this->input->get('codestudent');

		$data_pembayaran = array();
		$pembayaran = $this->data_pembayaran($classcode,$subclasscode,$codestudent);
		if(!empty($pembayaran)){
			foreach($pembayaran['data'] as $b){
				$data_pembayaran[] = date('Y-m-d',strtotime($b['dtm_payment']));
			}
		}
		$bulan2 = array(
			'',
			'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'July',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember',	
		);
		$bulan = (int)date('m',$tanggal);
		$tahun = date('Y',$tanggal);
	    for($x=$bulan; $x<=12; $x++){
			$cek1 = strtotime($tahun.'-'.$x.'-01');
			if(in_array(date('Y-m-d',$cek1),$data_pembayaran,TRUE)){
				echo '';
			} else {
				if($tahun != 2019){
					echo '<input type="checkbox" data-id="'.$tahun.'-0'.$x.'-'.$due.'" onclick="checkbox2('.$x.$tahun.')" id="'.$x.$tahun.'" name="cek_pembayaran[]" value="'.$tahun.'-'.$x.'-'.'01"> '.$bulan2[$x].' '.$tahun.' <b><span id="c'.$x.$tahun.'"></span></b><br>';
				}
			}
		}
		$tahun = $tahun + 1;
		for($x=1; $x<=12; $x++){
			$cek1 = strtotime($tahun.'-'.$x.'-01');
			if(in_array(date('Y-m-d',$cek1),$data_pembayaran,TRUE)){
				echo '';
			} else {
				echo '<input type="checkbox" data-id="'.$tahun.'-0'.$x.'-'.$due.'" onclick="checkbox2('.$x.$tahun.')" id="'.$x.$tahun.'" name="cek_pembayaran[]" value="'.$tahun.'-'.$x.'-'.'01"> '.$bulan2[$x].' '.$tahun.' <b><span id="c'.$x.$tahun.'"></span></b> <br>';
			}
		}
		$tahun = $tahun + 1;
		for($x=1; $x<=$bulan; $x++){
			$cek1 = strtotime($tahun.'-'.$x.'-01');
			if(in_array(date('Y-m-d',$cek1),$data_pembayaran,TRUE)){
				echo '';
			} else {
				echo '<input type="checkbox" data-id="'.$tahun.'-0'.$x.'-'.$due.'" onclick="checkbox2('.$x.$tahun.')" id="'.$x.$tahun.'" name="cek_pembayaran[]" value="'.$tahun.'-'.$x.'-'.'01"> '.$bulan2[$x].' '.$tahun.' <b><span id="c'.$x.$tahun.'"></span></b> <br>';
			}
		}
	}
	
	public function tanggal_cuti(){
		
		$tanggal = $this->konfigurasi_model->config();
		$due = $tanggal['data']['duedate'];
		$tanggal = strtotime($this->input->get('tanggal'));
		$classcode = $this->input->get('classcode');
		$subclasscode = $this->input->get('subclasscode');
		$codestudent = $this->input->get('codestudent');

		$data_pembayaran = array();
		$pembayaran = $this->data_pembayaran($classcode,$subclasscode,$codestudent);
		if(!empty($pembayaran)){
			foreach($pembayaran['data'] as $b){
				$data_pembayaran[] = date('Y-m-d',strtotime($b['dtm_payment']));
			}
		}
		$bulan2 = array(
			'',
			'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'July',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember',	
		);
		$bulan = (int)date('m',$tanggal);
		$tahun = date('Y',$tanggal);
		$x = 1;
	    for($x=$bulan; $x<=12; $x++){
			$cek1 = strtotime($tahun.'-'.$x.'-01');
			if(in_array(date('Y-m-d',$cek1),$data_pembayaran,TRUE)){
				echo '';
			} else {
				echo '<input type="checkbox" data-id="'.$tahun.'-0'.$x.'-'.$due.'" id="'.$x.$tahun.'" name="cuti_pembayaran[]" value="'.$tahun.'-'.$x.'-'.'01"> '.$bulan2[$x].' '.$tahun.'<br>';
			}
		}
		$tahun = $tahun + 1;
		for($x=1; $x<=12; $x++){
			$cek1 = strtotime($tahun.'-'.$x.'-01');
			if(in_array(date('Y-m-d',$cek1),$data_pembayaran,TRUE)){
				echo '';
			} else {
				echo '<input type="checkbox" data-id="'.$tahun.'-0'.$x.'-'.$due.'" id="'.$x.$tahun.'" name="cuti_pembayaran[]" value="'.$tahun.'-'.$x.'-'.'01"> '.$bulan2[$x].' '.$tahun.'<br>';
			}
		}
		$tahun = $tahun + 1;
		for($x=1; $x<=$bulan; $x++){
			$cek1 = strtotime($tahun.'-'.$x.'-01');
			if(in_array(date('Y-m-d',$cek1),$data_pembayaran,TRUE)){
				echo '';
			} else {
				echo '<input type="checkbox" data-id="'.$tahun.'-0'.$x.'-'.$due.'" id="'.$x.$tahun.'" name="cuti_pembayaran[]" value="'.$tahun.'-'.$x.'-'.'01"> '.$bulan2[$x].' '.$tahun.'<br>';
			}
		}
	}

	public function getDenda($kodemurid)
	{
		$url = 'http://localhost/apiballet/submurid/getdenda/'.$kodemurid;

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
		$data = $data['data'];
		echo json_encode($data);
	}
	
	public function bayarcuti()
	{		
		$url = 'http://localhost/apiballet/submurid/tambahcuti/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $this->input->post('cuti_pembayaran'), 
			"CMD2" => $this->input->post('kodenama15'),
			"CMD3" => $this->input->post('kodekelas5'),
			"CMD4" => $this->input->post('kodeskelas5'),
			"CMD5" => $this->input->post('tgl_pembayaran5'),
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

	public function listcuti(){
		
		$cuti = $this->input->post('cuti_pembayaran');
		$bulan2 = array(
			'',
			'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'July',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember',	
		);

		foreach($cuti as $c){
			$date = strtotime($c);
			$number = (int)date('m',$date);
			$bulan = $bulan2[$number];
			$tahun = date('Y',$date);
			echo '<b>'.$bulan.' '.$tahun.'</b><br>';
		}
	}
	public function checkingkode()
	{

		$kodehuruf = strtoupper($this->input->post('kode'));
		$url = 'http://localhost/apiballet/murid/checkingkode/';

		$data = array(
			"username" => "SSM",
			"password" => "1234",
			"CMD1" => $kodehuruf,
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
		
		$arr = $data['kode'];

		echo json_encode($arr);
	}
}