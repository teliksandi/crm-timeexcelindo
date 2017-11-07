<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_execution extends CI_Model{

    // function __construct(){
    //     parent::__construct();
    //     $this->load->library('datetimemanipulation');
    //     $this->smarty->assign("dtm", $this->datetimemanipulation);
    // }

    function search_execution($filter, $params){

        $sql = "SELECT COUNT(*) as 'total', client.client_name, initiation.project_title, execution.due_date From execution left join planning on execution.id_planning = planning.id_planning left join initiation on initiation.id_initiation = planning.id_initiation left join client on initiation.id_client = client.id_client where execution.id_planning is NOT NULL and $filter like ?";
        $query = $this->db->query($sql,$params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return NULl;
        }
    }

    function get_planning_by_id($where){
        $sql = "SELECT b.id_department as 'department', b.id_karyawan as 'karyawan', b.* FROM execution a left JOIN planning b on a.id_planning = b.id_planning
                left JOIN initiation c on c.id_initiation = b.id_initiation
                 WHERE a.id_execution = ?";
        $query = $this->db->query($sql, $where);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }

    }

    function initiation_detail($where){
        $sql = "SELECT a.id_initiation, a.*, b.start_date as 'mulai', b.due_date as 'akhir', b.*, c.*, d.*, e.* FROM planning a 
                left JOIN initiation b on a.id_initiation = b.id_initiation
                left JOIN client c on b.id_client = c.id_client 
                left JOIN karyawan d on b.id_karyawan = d.id_karyawan
                left JOIN department e on b.id_department = e.id_department
                left JOIN execution f on f.id_planning = a.id_planning
                WHERE f.id_execution = ?";
        $query = $this->db->query($sql, $where);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }

    }

    function planning_detail($where){
        $sql = "SELECT a.id_initiation, a.start_date as 'mulai', a.due_date as 'akhir', a.*, b.*, c.*, d.*, e.* FROM planning a 
                left JOIN initiation b on a.id_initiation = b.id_initiation
                left JOIN client c on b.id_client = c.id_client 
                left JOIN karyawan d on b.id_karyawan = d.id_karyawan
                left JOIN department e on b.id_department = e.id_department
                left JOIN execution f on f.id_planning = a.id_planning
                WHERE f.id_execution = ?";
        $query = $this->db->query($sql, $where);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }

    }

    function get_department_by_id($where){
        $sql = "SELECT c.id_department as 'department', c.id_karyawan as 'karyawan' FROM execution a left JOIN planning b on a.id_planning = b.id_planning
                left JOIN initiation c on c.id_initiation = b.id_initiation
                 WHERE a.id_execution = ?";
        $query = $this->db->query($sql, $where);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }

    }

    function get_list_execution($filter, $params){
        $sql = "SELECT execution.id_execution AS 'id_execution', initiation.project_title, execution.due_date, initiation.id_initiation, execution.start_date, client.client_name
                        From execution left join planning on execution.id_planning = planning.id_planning
                        left join initiation on initiation.id_initiation = planning.id_initiation
                        left join client on initiation.id_client = client.id_client                    
                        where execution.id_planning is NOT NULL
                        and $filter LIKE ? LIMIT ?,?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function insert_execution($params){
        return $this->db->insert('execution', $params);
    }

}
