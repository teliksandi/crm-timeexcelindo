<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class execution extends ApplicationBase {

    // constructor
    public function __construct() {
        parent::__construct();
        // load model

        $this->load->model('planning/m_planning');
        $this->load->model('initiation/m_initiation');
        $this->load->model('master/m_karyawan');
        $this->load->model('master/m_client');
        $this->load->model('execution/m_execution');

        // load library
        $this->load->library('tnotification');
        $this->load->library('datetimemanipulation');
    }

    
    public function index() {
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "execution/index.html");

        $search = $this->tsession->userdata('search_execution');
        $this->smarty->assign('search', $search);
        $keyword  = !empty($search['keyword']) ? $search['keyword'] : "%";
        $filter         = !empty($search['filter']) ? $search['filter'] : "%";
        $params         =  array($keyword);

        $ttl_rows = "";
        if ($filter == "client_name") {
            $nm_client = !empty($search['keyword']) ? '%'. $search['keyword'] . '%' : "%";
            $ttl_rows = $nm_client;
            $filter = "client.client_name";
        }elseif ($filter == "due_date") {
            $keyword = !empty($search['keyword']) ? '%'. $search['keyword'] . '%' : "%";
            $ttl_rows = $keyword;
            $filter = "execution.due_date";
        }elseif ($filter == "project_title") {
            $keyword = !empty($search['keyword']) ? '%'. $search['keyword'] . '%' : "%";
            $ttl_rows = $keyword;
            $filter = "initiation.project_title";
        }else{
            $filter = "initiation.project_title";
            $ttl_rows = "";
        }

        $config['base_url'] = site_url("execution/execution/index/");
        $config['total_rows'] = $this->m_execution->search_execution($filter, $ttl_rows);
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
        // get list data
        $params = array($keyword, ($start - 1), $config['per_page']);

        $this->smarty->assign("get", $this->m_execution->get_list_execution($filter, $params));

        // get list data
        //$this->smarty->assign("planning_project", $this->m_planning->get_data_planning());
        
        // output
        parent::display();
    }

    function execution_process(){
       
        $this->_set_page_rule("C");
        $dep = implode(",", $this->input->post("department_planning"));
        $kar = implode(",", $this->input->post("karyawan_planning"));
       
            $params = array(
                'id_planning'       => $this->input->post('plan_execution'),
                'start_date'        => $this->input->post('start_execution'),
                'due_date'          => $this->input->post('due_execution'),
                'id_karyawan'       => $kar,
                'id_department'     => $dep,
                
            );
            $this->m_execution->insert_execution($params);
            redirect("planning/planning/index");
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



    function detail($where){
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "planning/detail.html");
        
       
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();

        // output
        parent::display();

    }
}
