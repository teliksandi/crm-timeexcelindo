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

            // foreach ($auth_dep as $key) {
            //     if ($jabatan_karyawan == $key) {
            //         $this->smarty->assign("status", "1");
            //         break;
            //     }elseif($jabatan_karyawan == 1){
            //         $this->smarty->assign("status", "1");
            //     }
            //     else{
            //         $this->smarty->assign("status", "0");
            //     }
            // }

            $search         = $this->tsession->userdata('search_execution');
            $this->smarty->assign('search', $search);
            $keyword        = !empty($search['keyword']) ? '%'. $search['keyword'] .'%' : "%";
            $filter         = !empty($search['filter']) ? '%'. $search['filter'] .'%' : "%";
            $params         =  array($keyword);

            $list_dp = $this->m_planning->list_department();
            if ($list_dp !== NULL) {
                foreach ($list_dp as $ls) {
                    $list = $ls['id_department'];
                    $arr_list[] = $list;
                }

                $val_dep = implode(",", $arr_list);
                $this->smarty->assign("auth_dep", explode(",", $val_dep));    
            }else{
                $this->smarty->assign("auth_dep", "0");    
            }

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
            
            $dpt            = '%'. $department_karyawan .'%';
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
            $config['total_rows'] = $this->m_execution->search_execution($filter, $ttl_rows, $dpt);
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

            $this->smarty->assign("get", $this->m_execution->get_list_execution($filter, $params, $dpt));

            // get list data
            //$this->smarty->assign("planning_project", $this->m_planning->get_data_planning());
            
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
            $this->tsession->set_userdata('search_execution', $params);
        } else {
            // unset
            $this->tsession->unset_userdata('search_execution');
        }
        //--
        redirect('execution/execution');
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

            $id_e = $this->db->insert_id();
            
            $ls_id_in = $this->m_execution->get_initiation_by_id($id_e);

            $id_ini = $ls_id_in['id_initiation'];
            $id_p = $ls_id_in['id_planning'];


            $as = $this->m_planning->get_file($id_p);

            foreach ($as as $l) {
            $kk = $l['file'];
            $la[] = $kk;
            }

            $hitung_file = count($la);

            $hasil = $this->SpasiKeAnd($la);          

            $user = $this->com_user['user_id'];

            $tgl = date('d-m-Y h:i:sa');
                for($x=0;$x<$hitung_file;$x++){
                    $sql = "INSERT INTO file values('','','', '$id_e','','$hasil[$x]', '$user', '$tgl')";
                    $this->db->query($sql);
                }

                redirect("planning/planning/index");
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

        $gf = $this->m_execution->get_file($params);

        foreach ($gf as $fl) {        
        $fle = $fl['file'];
        $la[] = $fle;
        $this->smarty->assign("ef", $la);
        }

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

            $fls = $this->input->post("files");
            $hitung_file = count($fls);

            if($this->tnotification->run() !== FALSE){
                $params = array(
                    'id_department'     => $dep,
                    'id_karyawan'       => $kar,
                    );
                $where = array(
                    'id_execution' => $this->input->post('id_execution', TRUE),
                );

                $user = $this->com_user['user_id'];
                $id_exe = $this->input->post('id_execution');
                $hasil = $this->SpasiKeAnd($fls);

                if ($this->m_execution->update_execution($params, $where)) {

                    $tgl = date('d-m-Y h:i:sa');
                    for($x=0;$x<$hitung_file;$x++){
                        $sql = "INSERT INTO file values('','','','$id_exe','','$hasil[$x]','$user','$tgl')";
                        $this->db->query($sql);
                    }
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

        function delete_file($judul){
            // set page rules
            $this->_set_page_rule("U");

            // cek input
            $this->tnotification->set_rules($judul, 'Judul', 'trim|required');
            $get_fl = $this->m_planning->get_id_file($judul);

            foreach ($get_fl as $i) {
                $id_fl      = $i['id_file'];
                $id_plan    = $i['id_planning'];
                $id_exe     = $i['id_execution'];
            }

            $nm_fl = $this->m_planning->nm_file($id_fl);


            if($this->tnotification->run() == FALSE){
                
                if ($this->m_execution->delete_file($judul, $id_exe)){
                    unlink('resource/doc/pdf/'.$judul);
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
            redirect("execution/execution/edit/".$id_exe);
        }

        public function upload_f(){
            sleep(3);
          if($_FILES["files"]["name"] != '')
          {
           $output = '';

           $config["upload_path"] = 'resource/doc/pdf';
           $config["allowed_types"] = 'png|jpg|jpeg|docx|pdf|xlsx|ppt|rar|zip';
           $this->load->library('upload', $config);
           $this->upload->initialize($config);
           for($count = 0; $count<count($_FILES["files"]["name"]); $count++)
           {
            $_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
            $_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
            $_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
            $_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
            $_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
            if($this->upload->do_upload('file'))
            {
             $data = $this->upload->data();
             $output .= '
             <div class="col-md-3">
              <img src="'.base_url().'upload/'.$data["file_name"].'" class="img-responsive img-thumbnail" />
             </div>
             ';
            }
           }
           echo $output;   
          }
        }

        function add_komentar($where){
            // set page rules
            $this->_set_page_rule("C");

            $this->smarty->assign("template_content", "execution/detail.html");
            $this->smarty->assign("execution_detail",$this->m_execution->execution_get($where));      
            $this->smarty->assign("join", $this->m_execution->initiation_detail($where));
            $this->smarty->assign("join_planning", $this->m_execution->planning_detail($where));
            $kk = $this->m_execution->get_department_by_id($where);

            $this->smarty->assign("dprt", explode(",", $kk['department']));
            $this->smarty->assign("datadepartment",$this->m_initiation->get_list_department());
            $this->smarty->assign("kry", explode(",", $kk['karyawan']));
            $this->smarty->assign("marketing_kar",$this->m_karyawan->get_market_karyawan());
            $this->smarty->assign("monitoring", $this->m_execution->get_list_monitoring($where));
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


            $ls_id_in = $this->m_execution->get_initiation_by_id($where);
            $id_ini = $ls_id_in['id_initiation'];
            $id_plan    = $ls_id_in['id_planning'];

            $this->smarty->assign("komen", $this->m_initiation->initiation_komen($id_ini)); 
            $this->smarty->assign("komen_plan", $this->m_planning->planning_komen($id_plan));   
            $this->smarty->assign("komen_exe", $this->m_execution->execution_komen($where));

////////////////////////////////file punya execution//////////////////////////////////////////////
            $gf = $this->m_execution->get_file($where);

            foreach ($gf as $fl) {        
                $fle = $fl['file'];
                $la[] = $fle;
                $this->smarty->assign("ef", $la);
            }
///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////file punya riwayat initiation//////////////////////////////////////
            $gf_i = $this->m_initiation->get_file($id_ini);

            foreach ($gf_i as $fl_i) {        
                $fle_i = $fl_i['file'];
                $la_i[] = $fle_i;
                $this->smarty->assign("ef_i", $la_i);
            }

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////file punya riwayat initiation//////////////////////////////////////
            $gf_p = $this->m_planning->get_file($id_plan);

            foreach ($gf_p as $fl_p) {        
                $fle_p = $fl_p['file'];
                $la_p[] = $fle_p;
                $this->smarty->assign("ef_p", $la_p);
            }

///////////////////////////////////////////////////////////////////////////////////////////////////


        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();

       
        // cek input

        // cek input
        parent::display();
    }

    function komentar_process(){

        $this->_set_page_rule("C");

        $this->tnotification->set_rules('komentarin', 'komentar', 'trim|required');
 
        if($this->tnotification->run() !== FALSE){

            $params = array(
                'komentar'          => $this->input->post("komentarin"),
                'tgl_komentar'      => $this->input->post("tgl_komentar"),   
                'id_execution'      => $this->input->post("id_execution_komentar"),
                'user_id'           => $this->com_user['user_id']
   
            );


            if ($this->m_execution->insert_komentar($params)) {

                //$this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Telah dikomentari");
            }else{
                // default error
                $this->tnotification->sent_notification("error", "Gagal menuliskan komentar");
            }
        }else{
            // default error
            $this->tnotification->sent_notification("error", "Gagal mengirim komentar");
        }
        // default redirect
        redirect("execution/execution/add_komentar/".$this->input->post('id_execution_komentar', TRUE));

    }

        function detail($where){
            $this->_set_page_rule("U");
            // set template content
            $this->smarty->assign("template_content", "execution/detail.html");  
            $this->smarty->assign("execution_detail",$this->m_execution->execution_get($where));      
            $this->smarty->assign("join", $this->m_execution->initiation_detail($where));
            $this->smarty->assign("join_planning", $this->m_execution->planning_detail($where));
            $this->smarty->assign("monitoring", $this->m_execution->get_list_monitoring($where));
            $kk = $this->m_execution->get_department_by_id($where);

            $this->smarty->assign("dprt", explode(",", $kk['department']));
            $this->smarty->assign("datadepartment",$this->m_initiation->get_list_department());
            $this->smarty->assign("kry", explode(",", $kk['karyawan']));
            $this->smarty->assign("marketing_kar",$this->m_karyawan->get_market_karyawan());
            $this->smarty->assign("monitoring", $this->m_execution->get_list_monitoring($where));
            
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

            $ls_id_in = $this->m_execution->get_initiation_by_id($where);
            $id_ini     = $ls_id_in['id_initiation'];
            $id_plan    = $ls_id_in['id_planning'];

            $this->smarty->assign("komen", $this->m_initiation->initiation_komen($id_ini)); 
            $this->smarty->assign("komen_plan", $this->m_planning->planning_komen($id_plan));   
            $this->smarty->assign("komen_exe", $this->m_execution->execution_komen($where));

            ////////////////////////////////file punya execution//////////////////////////////////////////////
            $gf = $this->m_execution->get_file($where);

            foreach ($gf as $fl) {        
                $fle = $fl['file'];
                $la[] = $fle;
                $this->smarty->assign("ef", $la);
            }
///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////file punya riwayat initiation//////////////////////////////////////
            $gf_i = $this->m_initiation->get_file($id_ini);

            foreach ($gf_i as $fl_i) {        
                $fle_i = $fl_i['file'];
                $la_i[] = $fle_i;
                $this->smarty->assign("ef_i", $la_i);
            }

///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////file punya riwayat initiation//////////////////////////////////////
            $gf_p = $this->m_planning->get_file($id_plan);

            foreach ($gf_p as $fl_p) {        
                $fle_p = $fl_p['file'];
                $la_p[] = $fle_p;
                $this->smarty->assign("ef_p", $la_p);
            }

///////////////////////////////////////////////////////////////////////////////////////////////////

            // $get_in = $this->m_execution->initiation_detail($where);
            // $this->smarty->assign("komen", $this->m_initiation->initiation_komen($get_in['id_initiation']));

            $this->tnotification->display_notification();
            $this->tnotification->display_last_field();

            // output
            parent::display();

        }
    }