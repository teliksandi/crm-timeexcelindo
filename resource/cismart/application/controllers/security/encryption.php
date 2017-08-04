<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );
require_once( BASEPATH . 'plugins/aes-crypt/AESCryptFileLib.php' );
require_once( BASEPATH . 'plugins/aes-crypt/aes256/MCryptAES256Implementation.php' );

class encryption extends ApplicationBase {
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
        $this->smarty->assign("template_content","security/encryption/list.html");
        $this->tnotification->display_notification();
        parent::display();
    }

    public function encrypt_process() {
        //set rule 
        $this->_set_page_rule("C");
        //upload file 
        $this->load->library("tupload");
         if (!empty($_FILES['file_nm']['tmp_name'])) {
            //get encryption config
            $rs_encrypt_key = $this->m_preferences->get_preferences_by_group_name(array("encryption","key"));
            $rs_encrypt_ext = $this->m_preferences->get_preferences_by_group_name(array("encryption","file_ext"));
            // upload config
            $config['upload_path'] = 'resource/doc/encrypt/';
            $config['allowed_types'] = '*';
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
                $encrypted_file = FCPATH."resource/doc/encrypt/".$data["orig_name"].$rs_encrypt_ext["pref_value"];
                //Ensure target file does not exist
                @unlink($encrypted_file);
                //Encrypt a file
                $lib->encryptFile($data["full_path"], $rs_encrypt_key["pref_value"], $encrypted_file);
                $this->tnotification->sent_notification("success","file berhasil di-enkripsi periksa : ".$encrypted_file);
                redirect('security/encryption/index');
            }else{
                $this->tnotification->sent_notification("error", "Gagal melakukan enkripsi ".$this->tupload->display_errors()." silakan ulangi beberapa saat lagi");
                redirect('security/encryption/index');
            }
            
         }
       
    }
}

?>