<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class planning extends ApplicationBase {

    // constructor
    public function __construct() {
        parent::__construct();
        // load model
        $this->load->model('planning/m_planning');
        $this->load->model('initiation/m_initiation');
        $this->load->model('master/m_karyawan');
        $this->load->model('master/m_client');
        
        // load library
        $this->load->library('tnotification');
        $this->load->library('datetimemanipulation');
    }

    
    public function index() {
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "planning/index.html");
        $this->smarty->assign('user', $this->com_user['user_id']);
        $start = $this->uri->segment(4, 0) + 1;
        $this->smarty->assign("no", $start);


        // get list data
        $this->smarty->assign("planning_project", $this->m_planning->get_data_planning());
        
        // output
        parent::display();
    }

    function planning_process(){

        $this->_set_page_rule("C");
 
       
            $params = array(
                'id_initiation'     => $this->input->post('init_planning')
                
            );
            $this->m_planning->insert_planning($params);
            redirect("initiation/initiation/index");
    }


    function edit($params){
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "planning/edit.html");
        $this->smarty->assign("result", $this->m_planning->get_planning_by_id($params));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    function edit_process(){
        // set page rules
        $this->_set_page_rule("U");

        // cek input
        $this->tnotification->set_rules('id_planning', 'Nomor Identitas Planning', 'trim|required');
        $this->tnotification->set_rules('project_title', 'Nama Project', 'trim|required');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'id_department'     => $dep,
                );
            $where = array(
                'id_planning' => $this->input->post('id_planning', TRUE),
            );

            if ($this->m_initiation->update_planning($params)) {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            }else{
                // default error
                $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
        }else{
            // default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        // default redirect
        redirect("planning/planning/edit/".$this->input->post('id_planning', TRUE));
    }
}
