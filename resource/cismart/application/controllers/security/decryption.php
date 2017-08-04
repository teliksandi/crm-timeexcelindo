<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );
require_once( BASEPATH . 'plugins/aes-crypt/AESCryptFileLib.php' );
require_once( BASEPATH . 'plugins/aes-crypt/aes256/MCryptAES256Implementation.php' );

class decryption extends ApplicationBase {
     function __construct() {
		parent::__construct();
		//load lib
		$this->load->library("tnotification");
        //load model
        $this->load->model("pengaturan/m_preferences");
	}

    public function index() {
        //set rule 
        $this->_set_page_rule("R");
        $this->smarty->assign("template_content","security/decryption/list.html");
        $this->tnotification->display_notification();
        parent::display();
    }

    public function decrypt_process() {
        //set rule 
        $this->_set_page_rule("C");
        //upload file 
        $this->load->library("tupload");
         if (!empty($_FILES['file_nm']['tmp_name'])) {
            //get encryption config
            $rs_encrypt_key = $this->m_preferences->get_preferences_by_group_name(array("encryption","key"));
            $rs_encrypt_ext = $this->m_preferences->get_preferences_by_group_name(array("encryption","file_ext"));
            // upload config
            $config['upload_path'] = 'resource/doc/decrypt/';
            $config['allowed_types'] = "*";
            $config['file_ext_tolower'] = TRUE;
            //$config['max_size'] = 1024 ;
            
            $this->tupload->initialize($config);
            if($this->tupload->do_upload("file_nm")){
                $data = $this->tupload->data();
                //encrypt file 
                //Construct the implementation
                $mcrypt = new MCryptAES256Implementation();
                //Use this to instantiate the encryption library class
                $lib = new AESCryptFileLib($mcrypt);
                $encrypted_file = FCPATH."resource/doc/decrypt/".$data["orig_name"];
                $decrypted_file = FCPATH."resource/doc/decrypt/".str_replace($rs_encrypt_ext["pref_value"],"",$data["orig_name"]);
                //Ensure target file does not exist
                @unlink($decrypted_file);
                //Encrypt a file
                $lib->decryptFile($encrypted_file, $rs_encrypt_key["pref_value"], $decrypted_file);
                $this->tnotification->sent_notification("success","file berhasil di-enkripsi periksa : ".$decrypted_file);
                redirect('security/decryption/index');
            }else{
                $this->tnotification->sent_notification("error", "Gagal melakukan enkripsi ".$this->tupload->display_errors()." silakan ulangi beberapa saat lagi");
                redirect('security/decryption/index');
            }
            
         }
       
    }
}

?>