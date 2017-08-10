<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class welcome extends ApplicationBase {

    // constructor
    public function __construct() {
        parent::__construct();
        // load model
        $this->load->model("master/m_client");
                $this->load->model("master/m_category");
        $this->load->model("master/m_karyawan");
        // load library
        $this->load->library('tnotification');
        $this->load->library('datetimemanipulation');
    }

    // welcome operator
    public function index() {
        // set page rules
        
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "operator/welcome/index.html");
        $this->smarty->assign('user', $this->com_user['user_id']);

      //  $this->smarty->assign("data",$this->m_category->get_list_client());

        // output
        

        parent::display();

                
    }


     function add_client(){
        // set page rules
        $this->_set_page_rule("C");

        // cek input
        $this->tnotification->set_rules('alias_name', 'Data Client', 'trim|required');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'alias_name' => $this->input->post('alias_name'),
                'client_name' => $this->input->post('client_name'),
                'client_address' => $this->input->post('client_address'),
                'person_name' => $this->input->post('person_name'),
                'job_position' => $this->input->post('job_position'),
                'telp' => $this->input->post('telp'),
                'email' => $this->input->post('email')
            );
            if ($this->m_category->insert_client($params)) {
                //$this->tnotification->delete_last_field();
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
        redirect("master/category/add/");
    }
}
