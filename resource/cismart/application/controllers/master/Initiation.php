<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class Initiation extends ApplicationBase {

 public function __construct() {
        parent::__construct();
        // load model
        $this->load->model("master/m_initiation");

        $this->load->model("master/m_karyawan");
        $this->load->model("master/m_client");
        // load library
        $this->load->library('tnotification');
        $this->load->library('datetimemanipulation');
        $this->load->library('pagination');
    }


public function index() {
        // set page rules
        
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "master/initiation/index.html");
        //$this->smarty->assign('user', $this->com_user['user_id']);
        //$this->smarty->assign("data",$this->m_client->get_list_client());
    
// session
        $search = $this->tsession->userdata('search_initiation');
        $this->smarty->assign('search', $search);

        // params
        $project_name = !empty($search['project_name']) ? '%'. $search['project_name'] . '%' : "%";
        $params = array($project_name);

        $config['base_url'] = site_url("master/Initiation/index/");
        $config['total_rows'] = $this->m_initiation->get_total_initiation($params);
        $config['uri_segment'] = 4;
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $pagination['data'] = $this->pagination->create_links();

        // pagination attribute
        $start = $this->uri->segment(4, 0) + 1;
        $end = $this->uri->segment(4, 0) + $config['per_page'];
        $end = (($end > $config['total_rows']) ? $config['total_rows'] : $end);
        $pagination['start'] = ($config['total_rows'] == 0) ? 0 : $start;
        $pagination['end'] = $end;
        $pagination['total'] = $config['total_rows'];

        // pagination assign value
        $this->smarty->assign("pagination", $pagination);
        $this->smarty->assign("no", $start);

        // /* end of pagination ---------------------- */
        // get list data
        $params = array($project_name, ($start - 1), $config['per_page']);
        $this->smarty->assign("rs_id", $this->m_initiation->get_all_initiation($params));

        // output
    
        parent::display();       
    }


     function delete($params){
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "master/initiation/delete.html");
        $this->smarty->assign("result", $this->m_client->get_initiation_by_id($params));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

     function delete_process(){
        // set page rules
        $this->_set_page_rule("U");

        // cek input
        $this->tnotification->set_rules('id_initiation', 'ID Initiation', 'trim|required');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'id_initiation' => $this->input->post('id_initiation', TRUE),
            );

            if ($this->m_initiation->delete_client($params)) {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            }else{
                // default error
                $this->tnotification->sent_notification("error", "Data gagal dihapus");
            }
        }else{
            // default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }
        // default redirect
        redirect("master/inititiation/");
    }



  function search_process(){
        // set page rules
        $this->_set_page_rule("R");
        //--
        if ($this->input->post('save') == 'Cari') {
            $params = array(
                "project_name" => $this->input->post('project_name'),
            );
            // set
            $this->tsession->set_userdata('search_initiation', $params);
        } else {
            // unset
            $this->tsession->unset_userdata('search_initiation');
        }
        //--
        redirect('master/initiation');
    }

    function add_initiation(){
        // set page rules
        $this->_set_page_rule("C");

         $this->smarty->assign("template_content", "master/initiation/add_initiation.html");

        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();

        $this->smarty->assign("dataclient",$this->m_initiation->get_list_client());
        $this->smarty->assign("datakaryawan",$this->m_initiation->get_list_karyawan());
        $this->smarty->assign("datadepartment",$this->m_initiation->get_list_department());

        // cek input
        parent::display();
    }


    function add_process(){

        $this->_set_page_rule("C");

        $this->tnotification->set_rules('project_name', 'Data Initiation', 'trim|required');

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
            if ($this->m_initiation->insert_initiation($params)) {
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
        redirect("master/initiation/add_initiation/");

    }

     function edit($params){
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "master/initiation/edit.html");
        $this->smarty->assign("result", $this->m_initiation->get_initiation_by_id($params));
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
        $this->tnotification->set_rules('id_initiation', 'Nomor Identitas Initiation', 'trim|required');
        $this->tnotification->set_rules('project_name', 'Nama Project', 'trim|required');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'project_name' => $this->input->post('project_name', TRUE),
                //'mdb' => $this->com_user['user_id'],
                //'mdd' => date('Y-m-d')
                'alias_name'               => $this->input->post('alias_name'),
                'client_name'        => $this->input->post('client_name'),
                'client_address'           => $this->input->post('client_address'),

                'person_name'      => $this->input->post('person_name'),
                'job_position'         => $this->input->post('job_position'),
                'telp'       => $this->input->post('telp'),
                'email'   => $this->input->post('email')
            );
            $where = array(
                'id_initiation' => $this->input->post('id_initiation', TRUE),
            );

            if ($this->m_initiation->update_initiation($params)) {
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
        redirect("master/initiation/edit/".$this->input->post('id_initiation', TRUE));
    }

}
