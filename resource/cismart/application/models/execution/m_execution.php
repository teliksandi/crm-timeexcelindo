<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_execution extends CI_Model{

    function execution_komen($where) {  
        $this->db->select('*');
        $this->db->from('komentar');
        $this->db->join('users', 'komentar.user_id = users.user_id', 'left');
        $this->db->where('id_execution', $where);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_id_file($judul){
        $sql = "SELECT a.*, c.*, b.id_execution as 'execution' FROM file a 
                left JOIN execution b on b.id_execution = a.id_execution
                left JOIN planning c on b.id_planning = a.id_planning
                WHERE  a.file = ? and a.id_initiation = 0 and c.id_planning = 0";
        $query = $this->db->query($sql, $judul);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_file($where){                              
        $this->db->select('*');
        $this->db->from('file');
        $this->db->where('id_execution', $where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function delete_file($judul, $id){
        $sql = "DELETE FROM file WHERE id_execution = ? and file = '$judul'";
        return $this->db->query($sql, $id);
    }

    function get_initiation_by_id($params){
        $sql = "SELECT * FROM execution left join planning on execution.id_planning = planning.id_planning WHERE id_execution = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }
    }

    function list_department(){
        $sql = "SELECT *  from execution";
        return $query = $this->db->query($sql)->result_array();
    }

    function execution_get($params){
        $sql = "SELECT a.start_date as 'mulai', a.due_date as 'akhir', a.*, b.*, c.*, d.* from execution a left JOIN planning b on a.id_planning = b.id_planning
                left JOIN initiation c on c.id_initiation = b.id_initiation
                left JOIN client d on d.id_client = c.id_client
                WHERE a.id_execution = ? ";
        $query = $this->db->query($sql,$params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }

    }

    function get_list_monitoring($where){
        $sql = "SELECT * FROM execution where id_execution = ?";
        $query = $this->db->query($sql,$where);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function search_execution($filter, $params, $id_department){
        $sql = "SELECT COUNT(*) as 'total', client.client_name, initiation.project_title, execution.due_date From execution left join planning on execution.id_planning = planning.id_planning left join initiation on initiation.id_initiation = planning.id_initiation left join client on initiation.id_client = client.id_client where execution.id_planning is NOT NULL and $filter like ? and execution.id_department like '$id_department'";
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
        $sql = "SELECT a.id_department as 'department_exe', a.id_karyawan as 'karyawan_exe', b.id_department as 'department', b.id_karyawan as 'karyawan', b.*, c.* FROM execution a left JOIN planning b on a.id_planning = b.id_planning
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
        $sql = "SELECT c.id_department as 'department', c.id_karyawan as 'karyawan', a.id_department as 'department_exe', a.id_karyawan as 'karyawan_exe' FROM execution a left JOIN planning b on a.id_planning = b.id_planning
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

    function get_execution_by_id($where){
        $sql = "SELECT * from execution a WHERE a.id_execution = ?  
        ";
        $query = $this->db->query($sql, $where);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }

    }

    function get_list_execution($filter, $params, $id_department){
        $sql = "SELECT execution.id_execution AS 'id_execution', initiation.project_title, execution.due_date, initiation.id_initiation, execution.start_date, client.client_name, monitoring.id_monitoring
                        From execution left join planning on execution.id_planning = planning.id_planning
                        left join initiation on initiation.id_initiation = planning.id_initiation
                        left join monitoring on execution.id_execution = monitoring.id_execution
                        left join client on initiation.id_client = client.id_client                    
                        where execution.id_execution is NOT NULL and monitoring.id_execution is NULL
                        and $filter LIKE ? and execution.id_department like '$id_department' LIMIT ?,?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function getComment_Execution($id_execution){
         $sql = "SELECT tgl_komentar from komentar KM1 INNER JOIN( SELECT max(id_komentar)as id_kom from komentar where id_execution =" . $id_execution . " ) KM2 on KM2.id_kom=KM1.id_komentar ";
        return $query = $this->db->query($sql)->result_array();
    }

    function insert_execution($params){
        return $this->db->insert('execution', $params);
    }

    function insert_komentar($params){
        return $this->db->insert('komentar', $params);
    }

    function update_execution($params, $where){
        return $this->db->update('execution', $params, $where);
    }

}