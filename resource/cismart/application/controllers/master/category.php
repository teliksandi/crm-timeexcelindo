<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class category extends ApplicationBase{

    public function __construct(){
        parent::__construct();
        // load Model
        $this->load->model('master/m_category');
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
        $this->load->library('datetimemanipulation');
    }
function tombol_client(){
$this->load->view('master/category/add_client.html');
}

    function index(){
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "master/category/index.html");

        // session
        $search = $this->tsession->userdata('search_category');
        $this->smarty->assign('search', $search);

        // params
        $category_nm = !empty($search['category_nm']) ? '%'. $search['category_nm'] . '%' : "%";
        $params = array($category_nm);

        $config['base_url'] = site_url("master/category/index/");
        $config['total_rows'] = $this->m_category->get_total_category($params);
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
        $params = array($category_nm, ($start - 1), $config['per_page']);
        $this->smarty->assign("rs_id", $this->m_category->get_list_category($params));

        // output
        parent::display();
    }

    function search_process(){
        // set page rules
        $this->_set_page_rule("R");
        //--
        if ($this->input->post('save') == 'Cari') {
            $params = array(
                "category_nm" => $this->input->post('category_nm'),
            );
            // set
            $this->tsession->set_userdata('search_category', $params);
        } else {
            // unset
            $this->tsession->unset_userdata('search_category');
        }
        //--
        redirect('master/category');
    }

    function add(){
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "master/category/add.html");
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
        $this->tnotification->set_rules('category_nm', 'Nama Kategori', 'trim|required');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'category_nm' => $this->input->post('category_nm', TRUE),
                'mdb' => $this->com_user['user_id'],
                'mdd' => date('Y-m-d')
            );
            if ($this->m_category->insert_category($params)) {
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
        redirect("master/category/add/");
    }

    function add_inisiasi(){
        // set page rules
        $this->_set_page_rule("C");

        // cek input
        $this->tnotification->set_rules('karyawan', 'Data Inisiasi', 'trim|required');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'karyawan' => $this->input->post('karyawan'),
                'client' => $this->input->post('client'),
                'judul_project' => $this->input->post('judul_project'),
                'desc_project' => $this->input->post('deskripsi_project'),
                'project_manage_depart' => $this->input->post('manager_department'),
                'BSSD' => $this->input->post('BSSD'),
                'kebutuhan_kerja' => $this->input->post('kebutuhan_kerja'),
                'justifi_project' => $this->input->post('justifikasi'),
                'SDM' => $this->input->post('kebutuhan_sdm'),
                'product_desc' => $this->input->post('product_deskripsi'),
                'not_in_project' => $this->input->post('not_in'),
                'role' => $this->input->post('role1 & role2 & role3 & role4'),
                'dampak' => $this->input->post('dampak1 & dampak2 & dampak3 & dampak4'),
                'risk_tolerance' => $this->input->post('risk1'),
                'start_date' => $this->input->post('tanggal_start'),
                'due_date' => $this->input->post('tanggal_due'),
                'file' => $this->input->post('file'),
            );
            if ($this->m_category->insert_inisiasi($params)) {
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
        redirect("master/category/add/");
    }


    function edit($params){
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "master/category/edit.html");
        $this->smarty->assign("result", $this->m_category->get_category_by_id($params));
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
        $this->tnotification->set_rules('category_id', 'ID Kategori', 'trim|required');
        $this->tnotification->set_rules('category_nm', 'Nama Kategori', 'trim|required');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'category_nm' => $this->input->post('category_nm', TRUE),
                'mdb' => $this->com_user['user_id'],
                'mdd' => date('Y-m-d')
            );
            $where = array(
                'category_id' => $this->input->post('category_id', TRUE),
            );

            if ($this->m_category->update_category($params)) {
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
        redirect("master/category/edit/".$this->input->post('category_id', TRUE));
    }

    function delete($params){
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "master/category/delete.html");
        $this->smarty->assign("result", $this->m_category->get_category_by_id($params));
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
        $this->tnotification->set_rules('category_id', 'ID Kategori', 'trim|required');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'category_id' => $this->input->post('category_id', TRUE),
            );

            if ($this->m_category->delete_category($params)) {
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
        redirect("master/category/");
    }


}