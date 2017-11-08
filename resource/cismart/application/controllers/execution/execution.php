    <?php

    if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    // load base class if needed
    require_once( APPPATH . 'controllers/base/OperatorBase.php' );

    class execution extends ApplicationBase {// constructor
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

        function edit($params){
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "execution/edit.html");
        $this->smarty->assign("result",$this->m_execution->execution_get($params));
        $kk = $this->m_execution->get_department_by_id($params);
        $this->smarty->assign("ex", explode(",", $kk['department_exe']));
        $this->smarty->assign("datadepartment",$this->m_initiation->get_list_department());
        $this->smarty->assign("exs", explode(",", $kk['karyawan_exe']));
        $this->smarty->assign("marketing_kar",$this->m_karyawan->get_market_karyawan());
        $this->smarty->assign("clientedit",$this->m_initiation->get_list_client());
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
            $this->tnotification->set_rules('id_execution', 'Nomor Identitas Execution', 'trim|required');
            $dep = implode(",", $this->input->post("depart_edit"));
            $kar = implode(",", $this->input->post("kary_edit"));

            if($this->tnotification->run() !== FALSE){
                $params = array(
                    'id_department'     => $dep,
                    'id_karyawan'       => $kar,
                    );
                $where = array(
                    'id_execution' => $this->input->post('id_execution', TRUE),
                );

                if ($this->m_execution->update_execution($params, $where)) {
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
            redirect("execution/execution/edit/".$this->input->post('id_execution', TRUE));
        }



        function detail($where){
            $this->_set_page_rule("U");
            // set template content
            $this->smarty->assign("template_content", "execution/detail.html");  
            $this->smarty->assign("execution_detail",$this->m_execution->execution_get($where));      
            $this->smarty->assign("join", $this->m_execution->initiation_detail($where));
           $this->smarty->assign("join_planning", $this->m_execution->planning_detail($where));
            $kk = $this->m_execution->get_department_by_id($where);
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $this->smarty->assign("komen_plan", $this->m_planning->planning_komen($where));
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $this->smarty->assign("dprt", explode(",", $kk['department']));
            $this->smarty->assign("datadepartment",$this->m_initiation->get_list_department());
            $this->smarty->assign("kry", explode(",", $kk['karyawan']));
            $this->smarty->assign("marketing_kar",$this->m_karyawan->get_market_karyawan());
            //planning history
            $rr = $this->m_execution->get_planning_by_id($where);
            $this->smarty->assign("dprt_plan", explode(",", $rr['department']));
            $this->smarty->assign("datadepartment_plan",$this->m_initiation->get_list_department());
            $this->smarty->assign("kry_plan", explode(",", $rr['karyawan']));
            $this->smarty->assign("marketing_kar_plan",$this->m_karyawan->get_market_karyawan());

            $ss = $this->m_execution->get_execution_by_id($where);
            $this->smarty->assign("dprt_exet", explode(",", $ss['id_department']));
            $this->smarty->assign("datadepartment_exet",$this->m_initiation->get_list_department());
            $this->smarty->assign("kry_exet", explode(",", $ss['id_karyawan']));
            $this->smarty->assign("marketing_kar_exet",$this->m_karyawan->get_market_karyawan());
            $this->smarty->assign("");
            $this->tnotification->display_notification();
            $this->tnotification->display_last_field();

            // output
            parent::display();

        }
    }
