<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class stok extends ApplicationBase {
    //put your code here
    
    public function __construct(){
        parent::__construct();
        // load Model
        $this->load->model('master/m_stok');
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
        $this->load->library('datetimemanipulation');
        $this->load->library('tupload');
    }
    
    function index(){
        // set page rules (ngecek rule)
        $this->_set_page_rule("R");
        
        // set template content
        $this->smarty->assign("template_content", "master/stok/index.html");

        // session (nyimpen keyword, saat tambah keyword yg dicari ga ilang)
        $search = $this->tsession->userdata('search_stok_obat');
        $this->smarty->assign('search', $search);

        // params
        $nm_obat = !empty($search['nama_obat']) ? '%'. $search['nama_obat'] . '%' : "%";
        $params = array($nm_obat);

        $config['base_url'] = site_url("master/stok/index/");
        $config['total_rows'] = $this->m_stok->get_total_stok($params);
        $config['uri_segment'] = 5;
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $pagination['data'] = $this->pagination->create_links();

        // pagination attribute
        $start = $this->uri->segment(5, 0) + 1;
        $end = $this->uri->segment(5, 0) + $config['per_page'];
        $end = (($end > $config['total_rows']) ? $config['total_rows'] : $end);
        $pagination['start'] = ($config['total_rows'] == 0) ? 0 : $start;
        $pagination['end'] = $end;
        $pagination['total'] = $config['total_rows'];

        // pagination assign value
        $this->smarty->assign("pagination", $pagination);
        $this->smarty->assign("no", $start);

        // /* end of pagination ---------------------- */
        // get list data
        $params = array($nm_obat, ($start - 1), $config['per_page']);
        $this->smarty->assign("stok", $this->m_stok->get_list_stok($params));

        // output
        parent::display();
    }
    
    function add(){
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "master/stok/add.html");
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
    
    function add_process(){
        // set page rules
        $this->_set_page_rule("C");

        // cek input
        $this->tnotification->set_rules('nama_obat', 'Nama Obat', 'trim|required');
        $this->tnotification->set_rules('jml', 'Jumlah Stok', 'trim|required');
        $this->tnotification->set_rules('tgl_entry', 'Tanggal Entry', 'trim|required');
        
        
        if($this->tnotification->run() !== FALSE){
            
            if(empty($_FILES['gambar']['tmp_name'])){
                $params = array(
                        'nama_obat' => $this->input->post('nama_obat', TRUE),
                        'jml' => $this->input->post('jml', TRUE),
                        'mdd' => date('Y-m-d'),
                        'tgl_entry' => date ("Y-m-d", strtotime($this->input->post('tgl_entry'))),
                    );
            }else{
                $config['upload_path'] = 'resource/doc/';
                $config['allowed_types'] = 'jpeg|png|jpg';
                $this->tupload->initialize($config);

                if($this->tupload->do_upload('gambar')){
                        $params = array(
                            'nama_obat' => $this->input->post('nama_obat', TRUE),
                            'jml' => $this->input->post('jml', TRUE),
                            'mdd' => date('Y-m-d'),
                            'tgl_entry' => date ("Y-m-d", strtotime($this->input->post('tgl_entry'))),
                            'gambar' => $_FILES['gambar']['name'],
                        );
                }
            }
                    //print_r($params); die();
                if ($this->m_stok->insert_stok($params)) {
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
              redirect("master/stok/add/");
            }
    
    function search_process(){
        // set page rules
        $this->_set_page_rule("R");
        //--
        if ($this->input->post('save') == 'Cari') {
            $params = array(
                "nama_obat" => $this->input->post('nama_obat'),
            );
            // set
            $this->tsession->set_userdata('search_stok_obat', $params);
        } else {
            // unset
            $this->tsession->unset_userdata('search_stok_obat');
        }
        //--
        redirect('master/stok');
    }
    
    function edit($params){
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "master/stok/edit.html");
        $this->smarty->assign("result", $this->m_stok->get_stok_by_id($params));
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
        $this->tnotification->set_rules('nama_obat', 'Nama Obat', 'trim|required');
        $this->tnotification->set_rules('jml', 'Jumlah Stok', 'trim|required');
        $this->tnotification->set_rules('tgl_entry', 'Tanggal Entry', 'trim|required');
        
        
        if($this->tnotification->run() !== FALSE){
            
            if(empty($_FILES['gambar']['tmp_name'])){
                $params = array(
                        'nama_obat' => $this->input->post('nama_obat', TRUE),
                        'jml' => $this->input->post('jml', TRUE),
                        'mdd' => date('Y-m-d'),
                        'tgl_entry' => date ("Y-m-d", strtotime($this->input->post('tgl_entry'))),
                    );
                $where = array(
                             'stok_id' => $this->input->post('stok_id', TRUE),
                         );
            }else{
                $config['upload_path'] = 'resource/doc/';
                $config['allowed_types'] = 'jpeg|png|jpg';
                $this->tupload->initialize($config);

                if($this->tupload->do_upload('gambar')){
                        $params = array(
                            'nama_obat' => $this->input->post('nama_obat', TRUE),
                            'jml' => $this->input->post('jml', TRUE),
                            'mdd' => date('Y-m-d'),
                            'tgl_entry' => date ("Y-m-d", strtotime($this->input->post('tgl_entry'))),
                            'gambar' => $_FILES['gambar']['name'],
                        );
                        $where = array(
                             'stok_id' => $this->input->post('stok_id', TRUE),
                         );
                }
            }
                    //print_r($params); die();
                if ($this->m_stok->update_stok($params,$where)) {
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
        redirect("master/stok/edit/".$this->input->post('stok_id',TRUE));
    }
    
    function delete($params){
        // set page rules
        $this->_set_page_rule("D");
        // set template content
        $this->smarty->assign("template_content", "master/stok/delete.html");
        $this->smarty->assign("result", $this->m_stok->get_stok_by_id($params));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
    
    function delete_process(){
        // set page rules
        $this->_set_page_rule("D");

        // cek input
        $this->tnotification->set_rules('stok_id', 'Stok ID', 'trim|required');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'stok_id' => $this->input->post('stok_id', TRUE),
            );
            
            if ($this->m_stok->delete_stok($params)) {
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
        redirect("master/stok/");
    }
}

?>
