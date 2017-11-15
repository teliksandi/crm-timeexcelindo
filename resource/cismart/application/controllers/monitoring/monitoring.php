<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class monitoring extends ApplicationBase {

    // constructor
    public function __construct() {
        parent::__construct();
        // load model
        $this->load->model('planning/m_planning');
        $this->load->model('initiation/m_initiation');
        $this->load->model('master/m_karyawan');
        $this->load->model('master/m_client');
        $this->load->model('monitoring/m_monitoring');
        // load library
        $this->load->library('tnotification');
        $this->load->library('datetimemanipulation');
    }

    
    public function index() {
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "monitoring/index.html");

        $pengguna = $this->com_user['user_id'];
        $s = $this->m_karyawan->identitas_karyawan($pengguna);
            foreach ($s as $key) {
                $id_k = $key['id_karyawan'];
            }
            
        $list_kar = $this->m_karyawan->get_karyawan_by_id($id_k);        
        $nama_karyawan = $list_kar['nama_karyawan'];
        $department_karyawan = $list_kar['id_department'];
        $jabatan_karyawan = $list_kar['id_position'];
        $this->smarty->assign("nama_karyawan", $nama_karyawan);
        $this->smarty->assign("department", $department_karyawan);
        $this->smarty->assign("jabatan", $jabatan_karyawan);
        
        $search = $this->tsession->userdata('search_monitoring');
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
            $filter = "monitoring.due_date";
        }elseif ($filter == "project_title") {
            $keyword = !empty($search['keyword']) ? '%'. $search['keyword'] . '%' : "%";
            $ttl_rows = $keyword;
            $filter = "initiation.project_title";
        }else{
            $filter = "initiation.project_title";
            $ttl_rows = "";
        }


        $config['base_url'] = site_url("monitoring/monitoring/index/");
        $config['total_rows'] = $this->m_monitoring->search_monitoring($filter, $ttl_rows);
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


        $this->smarty->assign("pagination", $pagination);
        $this->smarty->assign("no", $start);

        $params = array($keyword, ($start - 1), $config['per_page']);

        $this->smarty->assign("monitoring", $this->m_monitoring->get_list_monitoring($filter, $params));


        // $start = $this->uri->segment(4, 0) + 1;
        // $this->smarty->assign("no", $start);
        // output
        parent::display();
    }

    function search_process(){
        // set page rules
        $this->_set_page_rule("R");
        //--
        if ($this->input->post('save') == 'Cari') {
            $params = array(
                "keyword"       => $this->input->post('keyword'),
                "filter"        => $this->input->post('filter')
            );
            // set
            $this->tsession->set_userdata('search_monitoring', $params);
        } else {
            // unset
            $this->tsession->unset_userdata('search_monitoring');
        }
        //--
        redirect('monitoring/monitoring');
    }

    function monitoring_process(){

        $this->_set_page_rule("C");
 
            $dep = implode(",", $this->input->post("department_monitoring"));
            $kar = implode(",", $this->input->post("karyawan_monitoring"));
       
            $params = array(
                'id_execution'      => $this->input->post('init_execution'),
                'start_date'        => $this->input->post('start_monitoring'),
                'due_date'          => $this->input->post('due_monitoring'),
                'id_karyawan'       => $kar,
                'id_department'     => $dep
                
            );

            $this->m_monitoring->insert_monitoring($params);
            redirect("execution/execution/index");
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
        $this->smarty->assign("template_content", "monitoring/detail.html");
        
       
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();

        // output
        parent::display();

    }

}
