<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class mhs extends ApplicationBase {
	function __construct() {
		parent::__construct();
		//load lib
		$this->load->library("tnotification");
	}
	
	public function index() {
		//set template
		$this->smarty->assign("template_content","pddikti/mhs/list.html");
		$this->tnotification->display_notification();
		parent::display();
	}
	
	public function syncmhs() {	
		$this->_set_page_rule("R");
		$username = $this->config->item("pddikti_ws_username");
		$password = $this->config->item("pddikti_ws_password");
		$endpoint = $this->config->item("pddikti_ws_url_sandbox");
		$client = new SoapClient($endpoint);
		$token = $client->GetToken($username, $password);
		
		//contoh select isi table
		$struktur = $client->GetRecordset($token,"jenis_pendaftaran");
		       
		//push data mhs
		$mhs = array(
                "nm_pd"=> "DAMAR SANTOSA",
                "tgl_lahir"=> "1988-06-19",
                "id_agama"=>"1",
                "kewarganegaraan"=>"ID",
                "jk"=> "L",
                "nik"=>"34574584857999",
                "ds_kel"=>"Karangmojo",
                "id_kebutuhan_khusus_ayah"=>0,
                "id_kebutuhan_khusus_ibu"=>0,
                "nm_ibu_kandung"=>"Suparmi",
                "id_kk"=>0,
                "a_terima_kps"=>"0",
                "id_wil"=>"040000",
                "jalan" => "Jln Perintis Kemerdekaan");
		
		$response_mhs =  $client->InsertRecord($token, 'mahasiswa', json_encode($mhs));
		if($response_mhs->result->error_code == "0"){
            //push data mhs pt
            $id_pd = $response_mhs->result->id_pd;
			$data_mhs_pt = array(
                "id_pd" => $id_pd, 
                "id_sp" => $this->_get_id_sp(),
                "id_sms" => $this->_get_id_sms("55401"), 
                "nipd" => "08030031", 
                "mulai_smt"=>"20151",
                "id_jns_daftar"=>"1",
                "tgl_masuk_sp" => "2017-03-10");
            $response_mhs_pt = $client->InsertRecord($token, 'mahasiswa_pt', json_encode($data_mhs_pt));
            if($response_mhs_pt->result->error_code=="0"){
			    $this->tnotification->sent_notification("success","CODE : ".$response_mhs_pt->result->error_code." - ID PD :".$response_mhs->result->id_pd);
            }else{
                $this->tnotification->sent_notification("error","Sinkronisasi gagal diproses");
            }
			redirect('syncpddikti/mhs/index');
		}
	}
	
	
	private function _get_id_sp(){
		$username = $this->config->item("pddikti_ws_username");
		$password = $this->config->item("pddikti_ws_password");
		$endpoint = $this->config->item("pddikti_ws_url_sandbox");
		$client = new SoapClient($endpoint);
		$token = $client->GetToken($username, $password);
		$satuan_pendidikan =  $client->GetRecord($token,"satuan_pendidikan", "npsn='".$username."'");
		$id_sp = $satuan_pendidikan->result->id_sp;
		return $id_sp;
	}

    private function _get_id_sms($kode_prodi = ""){
        $username = $this->config->item("pddikti_ws_username");
		$password = $this->config->item("pddikti_ws_password");
		$endpoint = $this->config->item("pddikti_ws_url_sandbox");
		$client = new SoapClient($endpoint);
		$token = $client->GetToken($username, $password);
        $filter_sms = "id_sp='".$this->_get_id_sp()."' and kode_prodi ilike '%".$kode_prodi."%'";
		$response_sms = $client->GetRecord($token,'sms',$filter_sms);
		$id_sms = $response_sms->result->id_sms;
        return $id_sms;
		
    }
	
}



?>