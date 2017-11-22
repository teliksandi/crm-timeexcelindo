<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class client extends ApplicationBase {
  public function __construct() {
        parent::__construct();
        // load model
        $this->load->model("master/m_client");
        $this->load->model("master/m_karyawan");
        $this->load->model('master/m_position');
        // load library
        $this->load->library('tnotification');
        $this->load->library('datetimemanipulation');
        $this->load->library('pagination');
    }

  	public function index() {
        // set page rules
        
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "master/client/index.html");
        //$this->smarty->assign('user', $this->com_user['user_id']);
        //$this->smarty->assign("data",$this->m_client->get_list_client());
    
// session
        $search = $this->tsession->userdata('search_client');
        $this->smarty->assign('search', $search);

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

        // params
        $client_name = !empty($search['client_name']) ? '%'. $search['client_name'] . '%' : "%";
        $params = array($client_name);

        $config['base_url'] = site_url("master/client/index/");
        $config['total_rows'] = $this->m_client->get_total_client($params);
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
        $params = array($client_name, ($start - 1), $config['per_page']);
        $this->smarty->assign("rs_id", $this->m_client->get_list_client($params));

         $this->smarty->assign("data",$this->m_client->get_all_client());

        // output
    
        parent::display();       
    }
    
    function delete_process(){
        // set page rules
        $this->_set_page_rule("U");

        // cek input
        $this->tnotification->set_rules('id_client', 'ID Client', 'trim|required');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'id_client' => $this->input->post('id_client', TRUE),
            );

            if ($this->m_client->delete_client($params)) {
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
        redirect("master/client/");
    }

    function search_process(){
        // set page rules
        $this->_set_page_rule("R");
        //--
        if ($this->input->post('save') == 'Cari') {
            $params = array(
                "client_name" => $this->input->post('client_name'),
            );
            // set
            $this->tsession->set_userdata('search_client', $params);
        } else {
            // unset
            $this->tsession->unset_userdata('search_client');
        }
        //--
        redirect('master/client');
    }

    function add_client(){
        // set page rules
        $this->_set_page_rule("C");

        $this->smarty->assign("template_content", "master/client/add_client.html");

//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^21 november 2017^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
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

        
        if ($department_karyawan != 10 and $department_karyawan != 1) {
            echo '<script language="javascript">';
            echo 'alert("anda tidak berhak mengakses halaman ini")';
            echo '</script>';
            echo '<script language="javascript">window.location = "index"</script>';
        }
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^


        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();

        // cek input
        parent::display();
    }


    function add_process(){

        $this->_set_page_rule("C");

        $this->tnotification->set_rules('client_name', 'Data Client', 'trim|required');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'client_name' => $this->input->post('client_name'),
                'client_address' => $this->input->post('client_address'),
                'person_name' => $this->input->post('person_name'),
                'job_position' => $this->input->post('job_position'),
                'telp' => $this->input->post('hsl_telp'),
                'email' => $this->input->post('email')
            );
            if ($this->m_client->insert_client($params)) {
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
        redirect("master/client/add_client/");

    }

    function edit($params){
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "master/client/edit.html");
        $this->smarty->assign("result", $this->m_client->get_client_by_id($params));

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

        
        if ($department_karyawan != 10 and $department_karyawan != 1) {
            echo '<script language="javascript">';
            echo 'alert("anda tidak berhak mengakses halaman ini")';
            echo '</script>';
            echo '<script language="javascript">window.location = "index"</script>';
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

        // cek input
        $this->tnotification->set_rules('id_client', 'Nomor Identitas Client', 'trim|required');
        $this->tnotification->set_rules('client_name', 'Nama Client', 'trim|required');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                //'mdb' => $this->com_user['user_id'],
                //'mdd' => date('Y-m-d')
                'client_name'        => $this->input->post('client_name'),
                'client_address'           => $this->input->post('client_address'),

                'person_name'      => $this->input->post('person_name'),
                'job_position'         => $this->input->post('job_position'),
                'telp'       => $this->input->post('telp'),
                'email'   => $this->input->post('email')
            );
            $where = array(
                'id_client' => $this->input->post('id_client', TRUE),
            );

            if ($this->m_client->update_client($params, $where)) {
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
        redirect("master/client/edit/".$this->input->post('id_client', TRUE));
    }


}