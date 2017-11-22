<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_planning extends CI_Model{

    function get_list_planning($filter, $params, $id_department, $id_k){
        if ($id_department == '%10%') {
            $dp = '%';
            $id = '%';
        }
        else{
            $dp = $id_department;
            $id = $id_k;
        }
        $sql = "SELECT planning.id_planning AS 'id_planning', initiation.project_title, planning.due_date, initiation.id_initiation,  planning.start_date, client.client_name
                        From planning left join initiation on initiation.id_initiation = planning.id_initiation
                        left join client on initiation.id_client = client.id_client 
                        left join execution on execution.id_planning = planning.id_planning                       
                        where execution.id_planning is NULL and planning.id_planning is not NULL
                        and $filter LIKE ? and planning.id_department like '$dp' and planning.id_karyawan like '$id' LIMIT ?,?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function list_department(){
        $sql = "SELECT *  from planning";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }
    }
     
    function get_file($where){                              
        $this->db->select('*');
        $this->db->from('file');
        $this->db->where('id_planning', $where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }
    }

    function get_id_file($judul){
        $sql = "SELECT a.*, b.id_planning as 'planning' FROM file a 
                left JOIN planning b on b.id_planning = a.id_planning
                WHERE  a.file = ? and a.id_initiation = 0";
        $query = $this->db->query($sql, $judul);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function nm_file($id){
        $this->db->select('*');
        $this->db->from('file');
        $this->db->like('id_file', $id);
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
        $sql = "DELETE FROM file WHERE id_planning = ? and file = '$judul'";
        return $this->db->query($sql, $id);
    }

    function search_planning($filter, $params, $id_department, $id_k){
        if ($id_department == '%10%') {
            $dp = '%';
            $id = '%';
        }
        else{
            $dp = $id_department;
            $id = $id_k;
        }
        $sql = "SELECT COUNT(*) as 'total', client.client_name, initiation.project_title From planning left join initiation on initiation.id_initiation = planning.id_initiation left join client on initiation.id_client = client.id_client where planning.id_initiation is NOT NULL and $filter like ? and planning.id_department like '$dp' and planning.id_karyawan like '$id'";
        $query = $this->db->query($sql,$params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return NULl;
        }
    }

    function get_total_planning($params){
        $sql = "SELECT COUNT(*) as 'total' FROM initiation WHERE project_title LIKE ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return NULl;
        }
    }

    function get_initiation_by_id($params){
        $sql = "SELECT * FROM planning left join initiation on initiation.id_initiation = planning.id_initiation WHERE id_planning = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }
    }

    function get_data_planning() {
        $this->db->select('*');
        $this->db->from('planning');
        $this->db->join('initiation', 'planning.id_initiation = initiation.id_initiation', 'left');
        $this->db->join('client', 'initiation.id_client = client.id_client', 'left');        
        $query = $this->db->get();
        return $query->result_array();
        
    }

    function planning_komen($where) {  
        $this->db->select('*');
        $this->db->from('komentar');
        $this->db->join('users', 'komentar.user_id = users.user_id', 'left');
        $this->db->where('id_planning', $where);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getComment_Planning($id_planning) {
        $sql = "SELECT tgl_komentar from komentar KM1 INNER JOIN( SELECT max(id_komentar)as id_kom from komentar where id_planning =" . $id_planning . " ) KM2 on KM2.id_kom=KM1.id_komentar ";
        return $query = $this->db->query($sql)->result_array();
    }

    function get_planning_by_id($where){
        $this->db->select("planning.start_date AS 'mulai'");
        $this->db->select("planning.due_date AS 'akhir'");
        $this->db->select('planning.*');
        $this->db->select('initiation.*');
        $this->db->from('planning');
        $this->db->join('initiation', 'initiation.id_initiation = planning.id_initiation', 'left'); 
        $this->db->where('planning.id_planning', $where);
        $query = $this->db->get();
        return $query->result_array();
         
    }
    
    function initiation_detail($where){
        $sql = "SELECT a.id_initiation, b.start_date as 'mulai', b.due_date as 'akhir', b.*, c.*, d.*, e.* FROM planning a 
                left JOIN initiation b on a.id_initiation = b.id_initiation
                left JOIN client c on b.id_client = c.id_client 
                left JOIN karyawan d on b.id_karyawan = d.id_karyawan
                left JOIN department e on b.id_department = e.id_department
                WHERE  a.id_planning = ?";
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
        $sql = "SELECT a.id_department as 'department', a.id_karyawan as 'karyawan', b.id_department as 'department_plan', b.id_karyawan as 'karyawan_plan', b.id_planning FROM initiation a left join planning b on a.id_initiation = b.id_initiation WHERE b.id_planning = ?";
        $query = $this->db->query($sql, $where);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }
    }

    function get_list_execution($where){
        $sql = "SELECT * FROM planning where id_planning = ?";
        $query = $this->db->query($sql,$where);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function update_planning($params, $where){
        return $this->db->update('planning', $params, $where);
    }

    function update_planning_b($params, $where){
        return $this->db->update('planning', $params, $where);
    }

    function insert_planning($params){
        return $this->db->insert('planning', $params);
    }

    function insert_komentar($params){
        return $this->db->insert('komentar', $params);
    }

    function delete_planning($params){
        $sql = "DELETE FROM planning WHERE id_planning= ?";
        return $this->db->query($sql, $params);
    }

}