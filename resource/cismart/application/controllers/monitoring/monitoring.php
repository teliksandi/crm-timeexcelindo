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
        $this->load->model('execution/m_execution');
        $this->load->model('master/m_department');
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

        $nm            = '%'. $id_k .'%';
        $dpt            = '%'. $department_karyawan .'%';
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
        $config['total_rows'] = $this->m_monitoring->search_monitoring($filter, $ttl_rows, $dpt, $nm);
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

        $this->smarty->assign("monitoring", $this->m_monitoring->get_list_monitoring($filter, $params, $dpt, $nm));


        // $start = $this->uri->segment(4, 0) + 1;
        // $this->smarty->assign("no", $start);
        // output
        parent::display();
    }

    function SpasiKeAnd($idr) {
        $search = [
                
                ' ',
            ];

            $replace = [
                '_'
            ];

        return $currToIn = str_ireplace($search, $replace, $idr);
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

            $id_m = $this->db->insert_id();
            
            $ls_id_in = $this->m_monitoring->get_initiation_by_id($id_m);

            $id_ini = $ls_id_in['id_initiation'];
            $id_p   = $ls_id_in['id_planning'];
            $id_e   = $ls_id_in['id_execution'];


            $as = $this->m_execution->get_file($id_p);

            foreach ($as as $l) {
            $kk = $l['file'];
            $la[] = $kk;
            }

            $hitung_file = count($la);

            $hasil = $this->SpasiKeAnd($la);          

            $user = $this->com_user['user_id'];

            $tgl = date('d-m-Y h:i:sa');
                for($x=0;$x<$hitung_file;$x++){
                    $sql = "INSERT INTO file values('','','', '','$id_m','$hasil[$x]', '$user', '$tgl')";
                    $this->db->query($sql);
                }

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
            $this->smarty->assign("monitoring_detail",$this->m_monitoring->monitoring_get($where));

            $this->smarty->assign("execution_detail",$this->m_monitoring->execution_get($where));  
            // var_dump($this->m_monitoring->monitoring_get($where));
            // exit();      


            $this->smarty->assign("join", $this->m_monitoring->initiation_detail($where));
            $this->smarty->assign("join_planning", $this->m_monitoring->planning_detail($where));

            $this->smarty->assign("monitoring", $this->m_execution->get_list_monitoring($where));
            
            $kk = $this->m_monitoring->get_department_by_id($where);
         
            $this->smarty->assign("dprt", explode(",", $kk['id_department']));
            $this->smarty->assign("datadepartment",$this->m_initiation->get_list_department());
            $this->smarty->assign("kry", explode(",", $kk['id_karyawan']));
            $this->smarty->assign("marketing_kar",$this->m_karyawan->get_market_karyawan());
        
            // $this->smarty->assign("monitoring", $this->m_execution->get_list_monitoring($where));
        
            //planning history
            $rr = $this->m_monitoring->get_planning_by_id($where);
            $this->smarty->assign("dprt_plan", explode(",", $rr['department']));
            $this->smarty->assign("datadepartment_plan",$this->m_initiation->get_list_department());
            $this->smarty->assign("kry_plan", explode(",", $rr['karyawan']));
            $this->smarty->assign("marketing_kar_plan",$this->m_karyawan->get_market_karyawan());

            $ss = $this->m_monitoring->get_execution_by_id($where);
            $this->smarty->assign("dprt_exet", explode(",", $ss['dep_exe']));
            $this->smarty->assign("datadepartment_exet",$this->m_initiation->get_list_department());
            $this->smarty->assign("kry_exet", explode(",", $ss['kar_exe']));
            $this->smarty->assign("marketing_kar_exet",$this->m_karyawan->get_market_karyawan());
            $this->smarty->assign("");

            $ls_id_in     = $this->m_monitoring->get_initiation_by_id($where);
            $id_ini       = $ls_id_in['id_initiation'];
            $id_plan      = $ls_id_in['id_planning'];
            $id_exe       = $ls_id_in['id_execution'];

            $this->smarty->assign("komen", $this->m_initiation->initiation_komen($id_ini));
            $this->smarty->assign("komen_plan", $this->m_planning->planning_komen($id_plan));   
            $this->smarty->assign("komen_exe", $this->m_execution->execution_komen($id_exe));
            $this->smarty->assign("komen_moni", $this->m_monitoring->monitoring_komen($where));

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

            ////////////////////////////////file punya monitoring//////////////////////////////////////////////
            $gf = $this->m_monitoring->get_file($where);
            if ($gf === NULL) {
                $this->smarty->assign("ef_m", "");
            }else{
                foreach ($gf as $l) {        
                    $kk = $l['file'];
                    $la[] = $kk;
                $this->smarty->assign("ef_m", $la);
                }
            }

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////file punya riwayat initiation//////////////////////////////////////
            $gf_i = $this->m_initiation->get_file($id_ini);

            if ($gf_i === NULL) {
                $this->smarty->assign("ef_i", "");
            }else{
                foreach ($gf_i as $l) {        
                    $kk = $l['file'];
                    $la[] = $kk;
                $this->smarty->assign("ef_i", $la);
                }
            }

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////file punya riwayat planning//////////////////////////////////////
            $gf_p = $this->m_planning->get_file($id_plan);

            if ($gf_p === NULL) {
                    $this->smarty->assign("ef_p", "");
            }else{
                  foreach ($gf_p as $fl_p) {        
                    $fle_p = $fl_p['file'];
                    $la_p[] = $fle_p;
                    $this->smarty->assign("ef_p", $la_p);
                  }   
            }

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////file punya execution//////////////////////////////////////////////
            $gf = $this->m_execution->get_file($id_exe);
            if ($gf === NULL) {
                $this->smarty->assign("ef_e", "");
            }else{
                foreach ($gf as $l) {        
                    $kk = $l['file'];
                    $la[] = $kk;
                $this->smarty->assign("ef_e", $la);
                }
            }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // $get_in = $this->m_execution->initiation_detail($where);
            // $this->smarty->assign("komen", $this->m_initiation->initiation_komen($get_in['id_initiation']));

            $this->tnotification->display_notification();
            $this->tnotification->display_last_field();

            // output
            parent::display();
    }

}
