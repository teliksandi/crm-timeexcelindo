<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class closing extends ApplicationBase {

    // constructor
    public function __construct() {
        parent::__construct();
        // load model
        $this->load->model("closing/m_closing");
        $this->load->model("master/m_karyawan");
        $this->load->model("master/m_client");
        $this->load->model("initiation/m_initiation");
        // load library
        $this->load->library('tnotification');
        $this->load->library('datetimemanipulation');
    }

    
    public function index() {

        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "closing/index.html");
        $this->smarty->assign('user', $this->com_user['user_id']);
        $start = $this->uri->segment(4, 0) + 1;


        // pagination assign value 
        $this->smarty->assign("no", $start);


        // get list data
        $this->smarty->assign("komen", $this->m_closing->get_koment());
        $this->smarty->assign("closing", $this->m_closing->get_list_closing());
        // output
    
        parent::display(); 
    }

    function closing_process(){
        // set page rules
        $this->_set_page_rule("C");
       
            $params = array(
                'id_initiation'     => $this->input->post('init_closing'),
                'id_client'         => $this->input->post('id_client')
                // 'id_karyawan'       => $this->input->post('init_closing'),
                // 'id_department'     => $this->input->post('init_closing'),

            );
            $this->m_closing->insert_closing($params);
            redirect("initiation/initiation/index");
   
    }
}
