<?php

class m_account extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    // get user profil
    function get_user_profil($params) {
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
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // get user detail
    function get_user_detail_by_username($params) {
        $sql = "SELECT a.*, c.role_id, c.role_nm, c.default_page
                FROM com_user a
                LEFT JOIN com_role_user b ON a.user_id = b.user_id
                LEFT JOIN com_role c ON b.role_id = c.role_id
                WHERE user_name = ? AND c.portal_id = ?
                AND c.role_id = ?
                LIMIT 0, 1";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return false;
        }
    }

    // get login
    function get_user_login($username, $password, $role_id, $portal) {
        // load encrypt
        $this->load->library('encrypt');
        // process
        // get hash key
        $result = $this->get_user_detail_by_username(array($username, $portal, $role_id));
        if (!empty($result)) {
            $password_decode = $this->encrypt->decode($result['user_pass'], $result['user_key']);

            // get user
            if ($password_decode === $password) {
                // cek authority then return id
                return $result;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    // save user login
    function save_user_login($user_id, $remote_address) {
        // get today login
        $sql = "SELECT * FROM com_user_login WHERE user_id = ? AND DATE(login_date) = CURRENT_DATE";
        $query = $this->db->query($sql, array($user_id));
        if ($query->num_rows() > 0) {
            // tidak perlu diinputkan lagi
            return false;
        } else {
            $sql = "INSERT INTO com_user_login (user_id, login_date, ip_address) VALUES (?, NOW(), ?)";
            return $this->db->query($sql, array($user_id, $remote_address));
        }
    }

    // save user logout
    function update_user_logout($user_id) {
        // update by this date
        $sql = "UPDATE com_user_login SET logout_date = NOW() WHERE user_id = ? AND DATE(login_date) = CURRENT_DATE";
        return $this->db->query($sql, $user_id);
    }

}
