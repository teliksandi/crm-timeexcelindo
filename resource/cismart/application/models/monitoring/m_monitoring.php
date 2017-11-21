<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_monitoring extends CI_Model{

    function get_all_monitoring(){
        $sql = "SELECT monitoring.id_monitoring AS 'id_monitoring', initiation.project_title, monitoring.due_date, execution.id_execution, planning.id_planning, initiation.id_initiation, monitoring.start_date, client.client_name
                        From monitoring left join execution on monitoring.id_execution = execution.id_execution
                        left join planning on planning.id_planning = execution.id_planning 
                        left join initiation on initiation.id_initiation = planning.id_initiation
                        left join client on initiation.id_client = client.id_client                    
                        where monitoring.id_execution is NOT NULL";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function monitoring_komen($where) {  
        $this->db->select('*');
        $this->db->from('komentar');
        $this->db->join('users', 'komentar.user_id = users.user_id', 'left');
        $this->db->where('id_monitoring', $where);
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
            return NULL;
        }
    }

    function delete_file($judul, $id){
        $sql = "DELETE FROM file WHERE id_execution = ? and file = '$judul'";
        return $this->db->query($sql, $id);
    }

    function get_initiation_by_id($params){
        $sql = "SELECT * FROM monitoring left join execution on execution.id_execution = monitoring.id_execution left join planning on execution.id_planning = planning.id_planning WHERE id_monitoring = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }
    }

    function monitoring_get($params){
        $sql = "SELECT a.start_date as 'mulai', a.due_date as 'akhir', a.*, b.*, c.*, e.*, d.* from monitoring a left JOIN execution b on a.id_execution = b.id_execution
                left JOIN planning c on b.id_planning = c.id_planning
                left JOIN initiation d on d.id_initiation = c.id_initiation
                left JOIN client e on e.id_client = d.id_client
                WHERE a.id_monitoring = ? ";
        $query = $this->db->query($sql,$params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }

    }

    function search_monitoring($filter, $params, $id_department, $id_k){
        if ($id_department == '%10%') {
            $dp = '%';
            $id = '%';
        }
        else{
            $dp = $id_department;
            $id = $id_k;
        }
        $sql = "SELECT COUNT(*) as 'total', client.client_name, initiation.project_title From monitoring left join execution on execution.id_execution = monitoring.id_execution left join planning on execution.id_planning = planning.id_planning left join initiation on initiation.id_initiation = planning.id_initiation left join client on initiation.id_client = client.id_client where monitoring.id_execution is NOT NULL and $filter like ? and monitoring.id_department like '$dp' and monitoring.id_karyawan like '$id'";
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
        $sql = "SELECT a.id_department as 'department_exe', a.id_karyawan as 'karyawan_exe', b.id_department as 'department', b.id_karyawan as 'karyawan', b.*,d.*, c.* FROM monitoring a left JOIN execution d on d.id_execution = a.id_execution left JOIN planning b on d.id_planning = b.id_planning
                left JOIN initiation c on c.id_initiation = b.id_initiation 
                 WHERE a.id_monitoring = ?";
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
                left JOIN monitoring g on g.id_execution = f.id_execution
                WHERE g.id_monitoring = ?";
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
                left JOIN monitoring g on g.id_execution = f.id_execution
                WHERE g.id_monitoring = ?";
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
        $sql = "SELECT d.id_department, d.id_karyawan FROM monitoring a left JOIN execution b on a.id_execution = b.id_execution
            left JOIN planning c on c.id_planning = b.id_planning
            left JOIN initiation d on d.id_initiation = c.id_initiation
            WHERE a.id_monitoring = ?";
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
        $sql = "SELECT a.id_department as 'dep_exe', a.id_karyawan as 'kar_exe' from execution a left join monitoring b on a.id_execution = b.id_execution WHERE b.id_monitoring = ?  
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

     function execution_get($where){
        $sql = "SELECT a.start_date as 'mulai', a.due_date as 'akhir', a.*, b.*, c.*, d.*, e.* from execution a left JOIN planning b on a.id_planning = b.id_planning
                left JOIN initiation c on c.id_initiation = b.id_initiation
                left JOIN client d on d.id_client = c.id_client
                left join monitoring e on e.id_execution = a.id_execution
                WHERE e.id_monitoring = ? ";
        $query = $this->db->query($sql,$where);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }

    }

    

    function get_list_monitoring($filter, $params, $id_department, $id_k){
        if ($id_department == '%10%') {
            $dp = '%';
            $id = '%';
        }
        else{
            $dp = $id_department;
            $id = $id_k;
        }
        $sql = "SELECT monitoring.id_monitoring AS 'id_monitoring', initiation.project_title, monitoring.due_date, initiation.id_initiation, monitoring.start_date, client.client_name
                        From monitoring left join execution on monitoring.id_execution = execution.id_execution
                        left join planning on execution.id_planning = planning.id_planning
                        left join initiation on initiation.id_initiation = planning.id_initiation
                        left join client on initiation.id_client = client.id_client                    
                        where monitoring.id_execution is NOT NULL
                        and $filter LIKE ? and monitoring.id_department like '$dp' and monitoring.id_karyawan like '$id' LIMIT ?,?";
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

    function insert_monitoring($params){
        return $this->db->insert('monitoring', $params);
    }

    function insert_komentar($params){
        return $this->db->insert('komentar', $params);
    }

    function update_execution($params, $where){
        return $this->db->update('execution', $params, $where);
    }

}