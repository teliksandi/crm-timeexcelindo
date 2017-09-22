<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_karyawan extends CI_Model{

    // function __construct(){
    //     parent::__construct();
    //     $this->load->library('datetimemanipulation');
    //     $this->smarty->assign("dtm", $this->datetimemanipulation);
    // }

    function get_list_karyawan($params){

        $sql = "SELECT * FROM karyawan WHERE nama_karyawan LIKE ? LIMIT ?,?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_market_karyawan(){
        $sql = "SELECT * FROM karyawan WHERE id_department = '8' OR id_department = '2'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_dept_karyawan($dept){

        //$query = $this->db->get_where('karyawan', array('id_department'=>$dept));
        // $sql = "SELECT * FROM karyawan WHERE id_department = ?";
        // $query = $this->db->query($sql, $dept);
        
        $query = $this->db
                         ->where_in('id_department',$dept)
                         ->get('karyawan');
                        
        if ($query->num_rows() > 0) {

            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_total_karyawan($params){
        $sql = "SELECT COUNT(*) as 'total' FROM karyawan WHERE nama_karyawan LIKE ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return NULl;
        }
    }

    function get_karyawan_by_id($params){
        $sql = "SELECT * FROM karyawan WHERE id_karyawan = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }
    }

    function insert_karyawan($params){
        return $this->db->insert('karyawan', $params);
    }

    function update_karyawan($params, $where){
        return $this->db->update('karyawan', $params, $where);
    }

    function delete_karyawan($params){
        $sql = "DELETE FROM karyawan WHERE id_karyawan = ?";
        return $this->db->query($sql, $params);
    }

    function get_all() {
        return $this->db->get('karyawan')->result_array();
    }


}
