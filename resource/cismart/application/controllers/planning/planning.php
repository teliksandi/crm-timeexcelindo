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
        $dep = implode(",", $this->input->post("department_planning"));
        $kar = implode(",", $this->input->post("karyawan_planning"));
       
            $params = array(
                'id_initiation'     => $this->input->post('init_planning'),
                'start_date'        => $this->input->post('start_planning'),
                'due_date'          => $this->input->post('due_planning'),
                'id_karyawan'       => $kar,
                'id_department'     => $dep,
                'DPP'                           => "0",
                'PPN'                           => "0",
                'PPH'                           => "0",
                'pendapatan_stlh_pajak'         => "0",
                'b_administrasi'                => "0",
                'b_produksi_dan_operasional'    => "0",
                'b_hardware_dan_infrastruktur'  => "0",
                'b_perawatan'                   => "0",
                'b_lain_lain'                   => "0",
                'b_entertaint'                  => "0",
                'total_biaya'                   => "0",
                'perkiraan_rugi_laba'           => "0",
                'p_b_administrasi'              => "0",
                'p_b_produksi_dan_operasional'  => "0",
                'p_b_hardware_dan_infrastruktur'=> "0",
                'p_b_perawatan'                 => "0",
                'p_b_lain_lain'                 => "0",
                'p_b_entertaint'                => "0",
                'p_perkiraan_rugi_laba'         => "0",
                              
            );
            $this->m_planning->insert_planning($params);
            redirect("initiation/initiation/index");
    }


     function add_planning(){
        // set page rules
        $this->_set_page_rule("C");

        $this->smarty->assign("template_content", "planning/detail.html");

        
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();


        // cek input
        parent::display();
    }

    function detail($where){
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "planning/detail.html");
        $this->smarty->assign("result", $this->m_planning->get_planning_by_id($where));

        $this->smarty->assign("join", $this->m_planning->initiation_detail($where));
        $this->smarty->assign("komen", $this->m_initiation->initiation_komen($where));
        $kk = $this->m_planning->get_department_by_id($where);
        $this->smarty->assign("dprt", explode(",", $kk['id_department']));
        $this->smarty->assign("datadepartment",$this->m_initiation->get_list_department());
        $this->smarty->assign("kry", explode(",", $kk['id_karyawan']));
        $this->smarty->assign("marketing_kar",$this->m_karyawan->get_market_karyawan());

        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();

        // output
        parent::display();

    }


    function add_process(){

        $this->_set_page_rule("U"); 

        $this->tnotification->set_rules('id_planning', 'DPP', 'trim|required');


        if($this->tnotification->run() !== FALSE){
            $params = array(
                'DPP'                           => $this->idrToInt($this->input->post("DPP")),
                'PPN'                           => $this->idrToInt($this->input->post("PPN")),
                'PPH'                           => $this->idrToInt($this->input->post("PPH")),
                'pendapatan_stlh_pajak'         => $this->idrToInt($this->input->post("Pendapatan")),
                'b_administrasi'                => $this->idrToInt($this->input->post("Adm")),
                'b_produksi_dan_operasional'    => $this->idrToInt($this->input->post("Produksi")),
                'b_hardware_dan_infrastruktur'  => $this->idrToInt($this->input->post("Hardware")),
                'b_perawatan'                   => $this->idrToInt($this->input->post("Perawatan")),
                'b_lain_lain'                   => $this->idrToInt($this->input->post("Lain")),
                'b_entertaint'                  => $this->idrToInt($this->input->post("Entertaint")),
                'total_biaya'                   => $this->idrToInt($this->input->post("Total")),
                'perkiraan_rugi_laba'           => $this->idrToInt($this->input->post("laba")),
                'p_b_administrasi'              => $this->idrToInt($this->input->post("persen_biaya_administrasi")),
                'p_b_produksi_dan_operasional'  => $this->idrToInt($this->input->post("persen_biaya_produksi")),
                'p_b_hardware_dan_infrastruktur'=> $this->idrToInt($this->input->post("persen_biaya_hardware")),
                'p_b_perawatan'                 => $this->idrToInt($this->input->post("persen_biaya_perawatan")),
                'p_b_lain_lain'                 => $this->idrToInt($this->input->post("persen_biaya_lain")),
                'p_b_entertaint'                => $this->idrToInt($this->input->post("persen_biaya_entertaint")),
                'p_perkiraan_rugi_laba'         => $this->idrToInt($this->input->post("persen_rugi_laba")),
                'Catatan'                       => $this->input->post("Ket")
                
            );

            $where = array(
                'id_planning' => $this->input->post('id_planning', TRUE),
            );

            if ($this->m_planning->update_planning_b($params, $where)) {
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
        redirect("planning/planning/detail/".$this->input->post('id_planning', TRUE));

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


    function edit($params){
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "planning/edit.html");
        $this->smarty->assign("result", $this->m_planning->get_planning_by_id($params));

        $kk = $this->m_planning->get_planning_by_id($params);
        foreach ($kk as $k) {
            $this->smarty->assign("ex", explode(",", $k['id_department']));
        }
        $this->smarty->assign("datadepartment",$this->m_initiation->get_list_department());

        $kks = $this->m_planning->get_planning_by_id($params);
        foreach ($kks as $ks) {
            $this->smarty->assign("exs", explode(",", $ks['id_karyawan']));
        }
        $this->smarty->assign("kar",$this->m_karyawan->get_all());
        $this->smarty->assign("clientedit",$this->m_initiation->get_list_client());

        
        

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

    function delete($params){
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "planning/delete.html");
        $this->smarty->assign("result", $this->m_planning->get_initiation_by_id($params));
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
        $this->tnotification->set_rules('id_planning', 'ID Planning', 'trim|required');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'id_planning' => $this->input->post('id_planning', TRUE),
            );

            if ($this->m_planning->delete_planning($params)) {
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
        redirect("planning/planning");
    }

    
}