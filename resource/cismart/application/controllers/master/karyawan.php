<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class karyawan extends ApplicationBase{

    public function __construct(){
        parent::__construct();
        // load Model
        $this->load->model('master/m_department');
        $this->load->model('master/m_karyawan');
        $this->load->model('date/m_date');
        $this->load->model('master/m_position');
        $this->load->library('tnotification');
        $this->load->library('pagination');
        $this->load->library('datetimemanipulation');
    }

    function index(){
       
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "master/karyawan/index.html");
                
        // session
        $search = $this->tsession->userdata('search_karyawan');
        $this->smarty->assign('search', $search);

        // params
        $nama_karyawan = !empty($search['nama_karyawan']) ? '%'. $search['nama_karyawan'] . '%' : "%";
        $params = array($nama_karyawan);

        $config['base_url'] = site_url("master/karyawan/index/");
        $config['total_rows'] = $this->m_karyawan->get_total_karyawan($params);
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
        $params = array($nama_karyawan, ($start - 1), $config['per_page']);
        $this->smarty->assign("rs_id", $this->m_karyawan->get_list_karyawan($params));
        $this->smarty->assign("dpt_id", $this->m_department->get_data_department());
        parent::display();
    }

    function search_process(){
        // set page rules
        $this->_set_page_rule("R");
        //--
        if ($this->input->post('save') == 'Cari') {
            $params = array(
                "nama_karyawan" => $this->input->post('nama_karyawan'),
            );
            // set
            $this->tsession->set_userdata('search_karyawan', $params);
        } else {
            // unset
            $this->tsession->unset_userdata('search_karyawan');
        }
        //--
        redirect('master/karyawan');
    }

    function add(){
        // set page rules
        $this->_set_page_rule("C");
        
        // set template content
        $this->smarty->assign("template_content", "master/karyawan/add.html");    
        $this->smarty->assign("data_department",$this->m_department->get_list_department());
        $this->smarty->assign("data_position", $this->m_position->get_list_position());
        
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    function send_email($args) {
        $mail = $this->email;

        if (isset($args['to'])) {
            $mail->to($args['to']);
        }

        if (isset($args['from'])) {
            $mail->to($args['from']);    
        }

        if (isset($args['bcc'])) {
            $mail->to($args['bcc']);
        }

        if (isset($args['subject'])) {
            $mail->to($args['subject']);
        }

        if (isset($args['message'])) {
            $mail->to($args['message']);
        }

        $mail->send();

    }


    function add_process(){
        // set page rules
        $this->_set_page_rule("C");

        // cek input
        $this->tnotification->set_rules('nama_karyawan', 'Nama Karyawan', 'trim|required');
 
        if($this->tnotification->run() !== FALSE){
            $params = array(
                'nama_karyawan' => $this->input->post('nama_karyawan', TRUE),
                //'mdb' => $this->com_user['user_id'],
               // 'mdd' => date('Y-m-d')
                'username'          => $this->input->post('username'),
                'password'          => md5 ($this->input->post('password')),
                'nik'               => $this->input->post('nik'),
                'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                'tempat_lahir'      => $this->input->post('tempat_lahir'),
                'tgl_lahir'         => $this->input->post('tgl_lahir'),
                'email'             => $this->input->post('email'),
                'telp'              => $this->input->post('telp'),
                'id_position'       => $this->input->post('id_position'),
                'id_department'     => $this->input->post('department'),               
                'status'            => $this->input->post('status')
            );

            if ($this->m_karyawan->insert_karyawan($params)) {
                
                $args = [
                    'to'      => $this->input->post('email'),
                    'from'    => 'info@coba.com',
                    'subject' => 'Registrasi',
                    'message' => 'Apa baelah'
                ];

                $this->send_email($args);

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
        redirect("master/karyawan/add/");
    }

    function edit($params){
        // set page rules
        $this->_set_page_rule("U");

        // set template content
        $this->smarty->assign("template_content", "master/karyawan/edit.html");
        $this->smarty->assign("result", $this->m_karyawan->get_karyawan_by_id($params));
        $this->smarty->assign("data_department",$this->m_department->get_list_department());
        $this->smarty->assign("data_position", $this->m_position->get_list_position());

        //tanggal setting coba
        
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
        $this->tnotification->set_rules('id_karyawan', 'Nomor Identitas', 'trim|required');
        $this->tnotification->set_rules('nama_karyawan', 'Nama Karyawan', 'trim|required');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'nama_karyawan' => $this->input->post('nama_karyawan', TRUE),
                //'mdb' => $this->com_user['user_id'],
                //'mdd' => date('Y-m-d')
                'username'          => $this->input->post('username'),
                'password'          => md5($this->input->post('password')),
                'nik'               => $this->input->post('nik'),
                'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                'tempat_lahir'      => $this->input->post('tempat_lahir'),
                'tgl_lahir'         => $this->input->post('tgl_lahir'),
                'email'             => $this->input->post('email'),
                'telp'              => $this->input->post('telp'),
                'id_position'       => $this->input->post('id_position'),
                'id_department'     => $this->input->post('department'),
                'status'            => $this->input->post('status')
            );
            
            $where = array(
                'id_karyawan' => $this->input->post('id_karyawan', TRUE),
            );

            if ($this->m_karyawan->update_karyawan($params, $where)) {
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
        redirect("master/karyawan/edit/".$this->input->post('id_karyawan', TRUE));
    }

    function delete_process(){
        // set page rules
        $this->_set_page_rule("U");

        // cek input
        $this->tnotification->set_rules('id_karyawan', 'ID Karyawan', 'trim|required');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'id_karyawan' => $this->input->post('id_karyawan', TRUE),
                
            );

            if ($this->m_karyawan->delete_karyawan($params)) {
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
        redirect("master/karyawan/");
    }


}
