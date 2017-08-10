<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class data_initiation extends ApplicationBase {

 public function __construct() {
        parent::__construct();
        // load model
        $this->load->model("master/m_initiation");
        $this->load->model("master/m_karyawan");
        // load library
        $this->load->library('tnotification');
        $this->load->library('datetimemanipulation');
    }


	function index(){
		       $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "master/initiation/add_initiation.html");
        $this->smarty->assign('user', $this->com_user['user_id']);

        // output

        //ambil data client
        $this->smarty->assign("data",$this->m_initiation->get_list_client());

        //ambil data karyawan
        $this->smarty->assign("data_kar",$this->m_karyawan->get_all_karyawan());
       
        parent::display(); 
	}
}
