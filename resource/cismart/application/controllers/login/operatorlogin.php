<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorLoginBase.php' );

// --

class operatorlogin extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load global
        $this->load->library('tnotification');
    }

    // view
    public function index($status = "") {
        // set template content
        $this->smarty->assign("template_content", "login/operator/form.html");
        // bisnis proses
        if (!empty($this->com_user)) {
            // still login
/*
        $role = $this->login_process('$role');

            $sql = "SELECT * FROM
                (
                        SELECT b.*, user_mail, d.role_nm, login_date, ip_address, user_name, d.role_id
                        FROM com_user a
                        INNER JOIN users b ON a.user_id = b.user_id
                        INNER JOIN com_role_user c ON b.user_id = c.user_id
                        INNER JOIN com_role d ON c.role_id = d.role_id
                        LEFT JOIN com_user_login e ON b.user_id = e.user_id
                        WHERE b.user_id = ? AND c.role_id = ?
                        ORDER BY login_date DESC
                ) result
                GROUP BY user_id";
            $bio = $this->db->query($sql, $role);
                foreach ($get_id->result() as $cth) {
                    $id =  $cth->user_id.'<br>';
                }
*/

            redirect('operator/welcome', 'refresh');
        } else {
            $this->smarty->assign("login_st", $status);
        }
        // output
        parent::display();
    }

    // login process
    public function login_process() {
        // set rules
        $this->tnotification->set_rules('username', 'Username', 'trim|required|max_length[30]');
        $this->tnotification->set_rules('pass', 'Password', 'trim|required|max_length[30]');
        // process
        if ($this->tnotification->run() !== FALSE) {
            // params
            $username = trim($this->input->post('username'));
            $password = trim($this->input->post('pass'));
            // get user detail

                $get_id = $this->db->query("select user_id from com_user where user_name = '".$username."'");
                foreach ($get_id->result() as $cth) {
                    $id =  $cth->user_id.'<br>';
                }

            $role = $this->db->query("select role_id from com_role_user where user_id = '".$id."'");
                foreach ($role->result() as $rl) {
                    $role_user =  $rl->role_id.'<br>';
                }


            $result = $this->m_account->get_user_login($username, $password,  /*Ini yang jadi identitas admin atau sebagai user biasa*/ $role_user , $this->portal_id);
            // check
            if (!empty($result)) {
                // cek lock status
                if ($result['lock_st'] == '1') {
                    // output
                    redirect('login/operatorlogin/index/locked');
                }
                // set session
                $this->tsession->set_userdata('session_operator', $result);
                // insert login time
                $this->m_account->save_user_login($result['user_id'], $_SERVER['REMOTE_ADDR']);
                // redirect
                redirect($result['default_page']);
            } else {
                // output
                redirect('login/operatorlogin/index/error');
            }
        } else {
            // default error
            redirect('login/operatorlogin/index/error');
        }
        // output
        redirect('login/operatorlogin');
    }

    // logout process
    public function logout_process() {
        // user id
        $user_id = $this->tsession->userdata('session_operator');
        // insert logout time
        $this->m_account->update_user_logout($user_id);
        // unset session
        $this->tsession->unset_userdata('session_operator');
        // output
        redirect('login/operatorlogin');
    }

}
