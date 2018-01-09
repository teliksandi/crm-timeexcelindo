<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class finishing extends ApplicationBase {

    // constructor
    public function __construct() {
        parent::__construct();
        // load model
        $this->load->model("closing/m_closing");
        $this->load->model("closing/m_finishing");
        $this->load->model("master/m_karyawan");
        $this->load->model("master/m_client");
        $this->load->model("initiation/m_initiation");
        // load library
        $this->load->library('tnotification');
        $this->load->library('datetimemanipulation');

        //load plugin
        $this->smarty->load_style("adminlte/plugins/select2/dist/css/select2.min.css");

        // load Javascript
        $this->smarty->load_javascript("resource/themes/adminlte/plugins/select2/dist/js/select2.full.min.js");
        $this->smarty->load_javascript("resource/themes/adminlte/plugins/inputmask/inputmask.min.js");
        $this->smarty->load_javascript("resource/themes/adminlte/plugins/inputmask/jquery.inputmask.bundle.min.js");
        $this->smarty->load_javascript("resource/themes/adminlte/plugins/inputmask/inputmask.extensions.min.js");
        $this->smarty->load_javascript("resource/themes/adminlte/plugins/inputmask/inputmask.date.extensions.min.js");
        $this->smarty->load_javascript("resource/themes/adminlte/plugins/inputmask/inputmask.numeric.extensions.min.js");
        $this->smarty->load_javascript("resource/themes/adminlte/plugins/inputmask/inputmask.phone.extensions.min.js");
        $this->smarty->load_javascript("resource/custom/js/custom.js");
    }

    
    public function index() {

        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "closing/finishing/index.html");

        $search = $this->tsession->userdata('search_closing');
        $this->smarty->assign('search', $search);
        $keyword  = !empty($search['keyword']) ? $search['keyword'] : "%";
        $filter         = !empty($search['filter']) ? $search['filter'] : "%";
        $params         =  array($keyword);

        $ttl_rows = "";
        if ($filter == "client_name") {
            $nm_client = !empty($search['keyword']) ? '%'. $search['keyword'] . '%' : "%";
            $ttl_rows = $nm_client;
            $filter = "client.client_name";
        }elseif ($filter == "project_title") {
            $keyword = !empty($search['keyword']) ? '%'. $search['keyword'] . '%' : "%";
            $ttl_rows = $keyword;
            $filter = "initiation.project_title";
        }else{
            $filter = "initiation.project_title";
            $ttl_rows = "";
        }

        $config['base_url'] = site_url("closing/finishing/index/");
        $config['total_rows'] = $this->m_finishing->search_closing($filter, $ttl_rows);
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
        $this->smarty->assign("closing", $this->m_finishing->get_list_closing($filter, $params));
        // get list data
        // get list data
        $this->smarty->assign("komen", $this->m_closing->get_koment());
        
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
            $this->tsession->set_userdata('search_closing', $params);
        } else {
            // unset
            $this->tsession->unset_userdata('search_closing');
        }
        //--
        redirect('closing/finishing');
    }

    function closing_process($where){
        // set page rules
        $this->_set_page_rule("C");
       
            $params = array(
                'id_monitoring'     => $where,
                // 'id_karyawan'       => $this->input->post('init_closing'),
                // 'id_department'     => $this->input->post('init_closing'),
                'year'              => $this->input->post('taun')

            );
            $this->m_closing->insert_closing($params);
            redirect("monitoring/monitoring/index");
   
    }

    function detail($where){
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "closing/detail.html");

        $this->smarty->assign("join", $this->m_closing->initiation_detail($where));

        $kk = $this->m_closing->get_department_by_id($where);
        $this->smarty->assign("komen", $this->m_initiation->initiation_komen($where));
        $this->smarty->assign("dprt", explode(",", $kk['department']));
        $this->smarty->assign("datadepartment",$this->m_initiation->get_list_department());
        $this->smarty->assign("kry", explode(",", $kk['karyawan']));
        $this->smarty->assign("marketing_kar",$this->m_karyawan->get_market_karyawan());

        $get_in = $this->m_closing->initiation_detail($where);

        foreach ($get_in as $f) {
           // $this->smarty->assign("ef",  explode(",", $f['file']));
            $id_ini = $f['id_initiation'];
        }

        $this->smarty->assign("komen", $this->m_initiation->initiation_komen($id_ini));

        $vfls = $this->m_initiation->get_file($id_ini);

        foreach ($vfls as $f) {
           // $this->smarty->assign("ef",  explode(",", $f['file']));
            $ls = $f['id_file'];
        }

        $list = $this->m_initiation->get_list_file($ls);

        foreach ($list as $l) {
           $this->smarty->assign("ef",  explode(",", $l['file']));
        }

        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();

        // output
        parent::display();

    }
}
