<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class Initiation extends ApplicationBase {

 public function __construct() {
        parent::__construct();
        // load model
        $this->load->model("initiation/m_initiation");
        $this->load->model("master/m_karyawan");
        $this->load->model("master/m_client");
        // load library
        $this->load->library('tnotification');
        $this->load->library('datetimemanipulation');
        $this->load->library('pagination');


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
        $this->smarty->assign("template_content", "initiation/index.html");
        //$this->smarty->assign('user', $this->com_user['user_id']);
    
// session
        $search = $this->tsession->userdata('search_initiation');
        $this->smarty->assign('search', $search);

        // params
        $project_title  = !empty($search['project_title']) ? '%'. $search['project_title'] . '%' : "%";
        $filter         = !empty($search['filter']) ? $search['filter'] : "%";
        $params         =  array($project_title);

        $ttl_rows = "";
        if ($filter == "client_id") {
            $nm_client = !empty($search['project_title']) ? '%'. $search['project_title'] . '%' : "%";
            $ttl_rows = $project_title;
            $filter = "client.client_name";
        }elseif ($filter == "start_date") {
            $project_title = !empty($search['project_title']) ? '%'. $search['project_title'] . '%' : "%";
            $ttl_rows = $project_title;
            $filter = "initiation.due_date";
        }elseif ($filter == "project_title") {
            $project_title = !empty($search['project_title']) ? '%'. $search['project_title'] . '%' : "%";
            $ttl_rows = $project_title;
            $filter = "initiation.project_title";
        }else{
            $filter = "initiation.project_title";
            $ttl_rows = "";
        }


        $config['base_url'] = site_url("initiation/initiation/index/");
        $config['total_rows'] = $this->m_initiation->search_initiation($filter, $ttl_rows);
        $this->smarty->assign("k", $this->m_initiation->search_initiation($filter, $ttl_rows));
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
        $params = array($project_title, ($start - 1), $config['per_page']);
        // $this->smarty->assign("initiation_client", $this->m_initiation->get_list_initiation($params));
        $this->smarty->assign("komen", $this->m_initiation->initiation_komen_get());
        $this->smarty->assign("get", $this->m_initiation->get_list_initiation($filter, $params));

        
        // output

    
        parent::display();       
    }

    function search_process(){
        // set page rules
        $this->_set_page_rule("R");
        //--
        if ($this->input->post('save') == 'Cari') {
            $params = array(
                "project_title" => $this->input->post('project_title'),
                "filter"        => $this->input->post('filter')
            );
            // set
            $this->tsession->set_userdata('search_initiation', $params);
        } else {
            // unset
            $this->tsession->unset_userdata('search_initiation');
        }
        //--
        redirect('initiation/initiation');
    }

    function detail($where){
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "initiation/detail.html");
        $this->smarty->assign("result", $this->m_initiation->get_initiation_by_id($where));
        //var_dump($this->m_initiation->initiation_detail());
        $this->smarty->assign("join", $this->m_initiation->initiation_detail($where));
        $this->smarty->assign("komen", $this->m_initiation->initiation_komen($where));
        $kk = $this->m_initiation->get_initiation_by_id($where);
        $this->smarty->assign("ex", explode(",", $kk['id_department']));
        $this->smarty->assign("datadepartment",$this->m_initiation->get_list_department());
        $this->smarty->assign("exs", explode(",", $kk['id_karyawan']));
        $this->smarty->assign("marketing_kar",$this->m_karyawan->get_market_karyawan());

        
        $as = $this->m_initiation->get_file($where);

        foreach ($as as $l) {        
        $kk = $l['file'];
        $la[] = $kk;
        $this->smarty->assign("ef", $la);
        }

        $this->smarty->assign("let", $this->m_initiation->list_department_where($where));
       
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
            $this->m_initiation->delete_file($params);
            $this->m_initiation->delete_komentar($params);
            if ($this->m_initiation->delete_initiation($params)) {
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
        redirect("initiation/initiation");
    }


    function delete_file($judul){
        // set page rules
        $this->_set_page_rule("U");

        // cek input
        $this->tnotification->set_rules($judul, 'Judul', 'trim|required');
        $get_fl = $this->m_initiation->get_id_file($judul);

        foreach ($get_fl as $i) {
            $id_fl = $i['id_file'];
            $id_ini = $i['id_initiation'];
        }


        $nm_fl = $this->m_initiation->nm_file($id_fl);

        foreach ($nm_fl as $l) {
            $fl = $l['file'];
        }


        if($this->tnotification->run() == FALSE){
            $where = $fl;
            
            if ($this->m_initiation->delete_file($where, $id_ini)){
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
        redirect("initiation/initiation/edit/".$id_ini);
    }

    function judulTojudul($judul, $nm_fl) {
        
         $search = [
                
                $judul
            ];

            $replace = [
                ''
            ];

        return $currToIn = str_ireplace($search, $replace, $nm_fl);
    }


   function add_initiation(){
        // set page rules
        $this->_set_page_rule("C");

        $this->smarty->assign("template_content", "initiation/add_initiation.html");

        
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();

        $this->smarty->assign("dataclient",$this->m_initiation->get_list_client());
        // $this->smarty->assign("karyawan",$this->m_karyawan->get_all());
        $this->smarty->assign("datadepartment",$this->m_initiation->get_list_department());

        $get_dept = $this->input->post('id_department');
        $this->smarty->assign("karyawandept",$this->m_karyawan->get_dept_karyawan($get_dept));

        $this->smarty->assign("marketing_kar",$this->m_karyawan->get_market_karyawan());
        // cek input

        // cek input
        parent::display();
    }


 function add_komentar($where){
        // set page rules
        $this->_set_page_rule("C");

        $this->smarty->assign("template_content", "initiation/detail.html");
        $this->smarty->assign("result", $this->m_initiation->get_initiation_by_id($where));
        //var_dump($this->m_initiation->initiation_detail());
        $this->smarty->assign("join", $this->m_initiation->initiation_detail($where));
        $this->smarty->assign("komen", $this->m_initiation->initiation_komen($where));
         $kk = $this->m_initiation->get_initiation_by_id($where);
        $this->smarty->assign("ex", explode(",", $kk['id_department']));
        $this->smarty->assign("datadepartment",$this->m_initiation->get_list_department());
        $this->smarty->assign("exs", explode(",", $kk['id_karyawan']));
        $this->smarty->assign("marketing_kar",$this->m_karyawan->get_market_karyawan());


        $as = $this->m_initiation->get_file($where);

        foreach ($as as $l) {        
        $kk = $l['file'];
        $la[] = $kk;
        $this->smarty->assign("ef", $la);
        }
        
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

        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();

       
        // cek input

        // cek input
        parent::display();
    }

     function komentar_process(){

        $this->_set_page_rule("C");

        $this->tnotification->set_rules('isi_komentar', 'komentar', 'trim|required');

        if($this->tnotification->run() == FALSE){
            $params = array(
                'komentar'          => $this->input->post("komentarin"),
                'tgl_komentar'      => $this->input->post("tgl_komentar"),   
                'id_initiation'     => $this->input->post("id_initiation_komentar")   
            );

            if ($this->m_initiation->insert_komentar($params)) {

                //$this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Telah dikomentari");
            }else{
                // default error

                $this->tnotification->sent_notification("error", "Gagal menuliskan komentar");
            }
        }else{
            // default error
            $this->tnotification->sent_notification("error", "Data Gagal Dikirim");
        }
        // default redirect
        redirect("initiation/initiation/add_komentar/".$this->input->post('id_initiation_komentar', TRUE));

    }



    function idrToInt($idr) {
        $search = [
                
                '.',
                ','
            ];

            $replace = [
                ''
            ];

        return $currToIn = str_ireplace($search, $replace, $idr);
    }

    function ajax_karyawan($id_karyawan) {
        $idDepartment = $id_karyawan;
        
        $karyawan = $this->m_karyawan->get_dept_karyawan($idDepartment);
        $karyawans = [];

        foreach ($karyawan as $value) {
            array_push($karyawans, $value['id_karyawan']);
        }

        echo implode(", ", $karyawans);
        
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

    function add_process(){

        $this->_set_page_rule("C");

        $this->tnotification->set_rules('judul_project', 'Data Initiation', 'trim|required');
        $dep = implode(",", $this->input->post("department"));
        $kar = implode(",", $this->input->post("karyawan"));
        $fl = implode(",", $this->input->post("files"));
        // $ex = explode("[","]", $ll);
        // var_dump($ll);
        // var_dump($this->input->post("files"));
        // exit();

        // $list_file = $this->input->post("files");
        // foreach ($list_file as $k) {
        //     $hsl_f = $k;
        // }
        $fls = $this->input->post("files");

        $hitung_file = count($fls);

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'project_title'     => $this->input->post("judul_project"),
                'id_karyawan'       => $kar,
                'id_client'         => $this->input->post("client"),
                'id_department'     => $dep,
                'project_desc'      => $this->input->post("deskripsi"),
                'project_just'      => $this->input->post("justifikasi"),
                'budget'            => $this->idrToInt($this->input->post('money')),
                'not_in_project'    => $this->input->post("not_in"),
                'start_date'        => $this->input->post("tanggal_start"),
                'due_date'          => $this->input->post("tanggal_due"),
                
            );

            if ($this->m_initiation->insert_initiation($params)) {

// *****************************************ini yang baru ***************************
                $id = $this->db->insert_id();
                $tgl = date('d-m-Y h:i:sa');
                for($x=0;$x<$hitung_file;$x++){
                    $sql = "INSERT INTO file values('','$id','$fls[$x]', '', '$tgl')";
                    $this->db->query($sql);
                }

// ********************************************************************************                
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
        redirect("initiation/initiation/add_initiation/");

    }


        function edit_komen($where){
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "initiation/detail.html");
        // $this->smarty->assign("result", $this->m_initiation->get_initiation_by_id($params));
        $this->smarty->assign("join", $this->m_initiation->initiation_detail($where));
        $this->smarty->assign("komen", $this->m_initiation->initiation_komen($where));
                                                              
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    function edit_process_komen(){
        // set page rules
        $this->_set_page_rule("U");

        // cek input
        $this->tnotification->set_rules('id_komentar', 'Identitas komentar', 'trim|required');
        $this->tnotification->set_rules('komentar', 'komentar', 'trim|required');

        if($this->tnotification->run() == FALSE){
                 $params = array(
                'komentar'          => $this->input->post("komentar"),
                'tgl_komentar'      => $this->input->post("tgl_komentar"),   
                'id_initiation'     => $this->input->post("id_initiation")   
            );

            $where = array(
                'id_komentar' => $this->input->post('id_komentar', TRUE),
            );

            if ($this->m_initiation->update_komentar($params)) {
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
        redirect("initiation/initiation/edit_komen/".$this->input->post('id_initiation', TRUE));
    }

    function pdf_view($judul){
        $this->_set_page_rule("U");
          // set template content
        if(preg_match("/.pdf/i", $judul)) {
            $this->smarty->assign("template_content", "tambahan/pdf.html");
            $this->smarty->assign("judul", $judul);
            $this->smarty->assign("val",  $judul);
        } else {
            $this->smarty->assign("template_content", "tambahan/pdf.html");
            $this->smarty->assign("judul", $judul);
            $this->smarty->assign("val",  "");
        }

        parent::display();
    }



    function edit($params){
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "initiation/edit.html");
        $this->smarty->assign("result", $this->m_initiation->get_initiation_by_id($params));
        $kk = $this->m_initiation->get_initiation_by_id($params);
        $this->smarty->assign("ex", explode(",", $kk['id_department']));
        $this->smarty->assign("datadepartment",$this->m_initiation->get_list_department());
        $this->smarty->assign("exs", explode(",", $kk['id_karyawan']));
        $this->smarty->assign("marketing_kar",$this->m_karyawan->get_market_karyawan());             
        $this->smarty->assign("clientedit",$this->m_initiation->get_list_client());

        $as = $this->m_initiation->get_file($params);

        foreach ($as as $l) {        
        $kk = $l['file'];
        $la[] = $kk;
        $this->smarty->assign("ef", $la);
        }        

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    function edit_process(){
        // set page rules
        $this->_set_page_rule("U");


        $dep = implode(",", $this->input->post("department"));
        $kar = implode(",", $this->input->post("karyawan"));
        // cek input
        $this->tnotification->set_rules('id_initiation', 'Nomor Identitas Initiation', 'trim|required');
        $this->tnotification->set_rules('judul_project', 'Nama Project', 'trim|required');

        $fls = $this->input->post("files");

        $hitung_file = count($fls);

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'project_title'     => $this->input->post("judul_project"),
                'id_karyawan'       => $kar,
                'id_client'         => $this->input->post("client"),
                'id_department'     => $dep,
                'project_desc'      => $this->input->post("deskripsi"),
                'project_just'      => $this->input->post("justifikasi"),
                'budget'            => $this->idrToInt($this->input->post('money')),
                'not_in_project'    => $this->input->post("not_in"),
                'start_date'        => $this->input->post("tanggal_start"),
                'due_date'          => $this->input->post("tanggal_due"),
                
            );
            $where = array(
                'id_initiation' => $this->input->post('id_initiation', TRUE),
            );

            if ($this->m_initiation->update_initiation($params,$where)) {

                $id = $this->input->post('id_initiation');
                $tgl = date('d-m-Y h:i:sa');
                for($x=0;$x<$hitung_file;$x++){
                    $sql = "INSERT INTO file values('','$id','$fls[$x]', '', '$tgl')";
                    $this->db->query($sql, $params);
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
        redirect("initiation/initiation/edit/".$this->input->post('id_initiation', TRUE));
    }

}
