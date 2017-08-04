<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class flight extends ApplicationBase{

	public function __construct(){
		 parent::__construct();
		// load Model
		$this->load->model('master/m_category');
		$this->load->model('tiket/m_airport');
		
		// load library
		$this->load->library('tnotification');
		$this->load->library('pagination');
		$this->load->library('datetimemanipulation');
		$this->load->library('tiketcom');
	}

	function index(){
		// set page rules
		$this->_set_page_rule("R");
		
		// set template content
		$this->smarty->assign("template_content", "tiket/flight/index.html");
		
		// session
        $search = $this->tsession->userdata('search_flight');
        $this->smarty->assign('search', $search);
		
		// data airport
		$this->smarty->assign("rs_airport", $this->m_airport->get_all_airport());
		if (!empty($search)) {
			$response = $this->tiketcom->search_flight($search);
        	$this->smarty->assign('rs_flight', $response);
		}
		
		parent::display();
	}
	
	function search_process(){
		// set page rules
		$this->_set_page_rule("R");
		 //--
        if ($this->input->post('save') == 'Cari') {
            $params = array(
                "d" => $this->input->post('departure'),
                "a" => $this->input->post('arrival'),
                "date" => $this->input->post('depart_date'),
                "ret_date" => $this->input->post('ret_date'),
                "adult" => $this->input->post('adult'),
                "child" => $this->input->post('child'),
                "infant" => $this->input->post('infant'),
                "v" => 1,
            );
            // set
            $this->tsession->set_userdata('search_flight', $params);
        } else {
            // unset
            $this->tsession->unset_userdata('search_flight');
        }
        //--
        redirect('tiket/flight');
		
	}
	
}