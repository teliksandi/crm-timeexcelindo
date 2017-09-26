<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_initiation extends CI_Model{

 function get_list_client(){
       $sql = "SELECT * FROM client";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

        function get_id_karyawan($where){
            $sql = "SELECT * FROM initiation WHERE id_initiation = ?";
            $query = $this->db->query($sql, $where);
            if ($query->num_rows() > 0) {
                $result = $query->result_array();
                $query->free_result();
                return $result;
            } else {
                return array();
            }
        }


    function get_list_karyawan(){
       $sql = "SELECT * FROM karyawan";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_list_department(){
       $sql = "SELECT * FROM department";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function list_department_where($where){
       $sql = "SELECT id_department FROM initiation where id_initiation = ?";
        $query = $this->db->query($sql, $where);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function ini_department_where($where){
       $sql = "SELECT nama_department FROM department where id_department = ?";
        $query = $this->db->query($sql, $where);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_all_initiation(){
        $sql = "SELECT * FROM initiation";
        $query = $this->db->query($sql);
          if ($query->num_rows() > 0) {
              $result = $query->result_array();
              $query->free_result();
              return $result;
          } else {
              return array();
        }
    }


    function get_initiation_by_id($params){
        $sql = "SELECT * FROM initiation WHERE id_initiation = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }
    }

    function get_total_initiation($params){
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

    function initiation_detail($where) {
       
        $this->db->select('*');
        $this->db->from('initiation');
        $this->db->join('client', 'initiation.id_client = client.id_client', 'left'); 
        $this->db->join('karyawan', 'initiation.id_karyawan = karyawan.id_karyawan', 'left');
        $this->db->join('department', 'initiation.id_department = department.id_department', 'left'); 
        $this->db->where('initiation.id_initiation', $where);
        $query = $this->db->get();
        return $query->result_array();
        
    }

    function initiation_komen($where) {  
        $sql = "SELECT * FROM komentar WHERE id_initiation = ?";
        $query = $this->db->query($sql, $where);
        return $query->result_array();
    }

    function initiation_client_get() {
       
        $this->db->select('*');
        $this->db->from('initiation');
        $this->db->join('client', 'initiation.id_client = client.id_client'); 
        $query = $this->db->get();
        return $query->result_array();
        
    }

    function initiation_komen_get() {
        $this->db->select('*');
        $this->db->from('komentar');
        $this->db->join('initiation', 'komentar.id_initiation = initiation.id_initiation', 'left'); 
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_list_dept($where) {
       
        $this->db->select('*');
        $this->db->from('initiation');
        $this->db->join('department', 'initiation.id_department = department.id_department', 'left'); 
        $this->db->where('initiation.id_initiation', $where);
        $query = $this->db->get();
        return $query->result_array();

    }

    function like_list_dept($where, $like) {
       
        $this->db->select('*');
        $this->db->from('initiation');
        $this->db->join('department', 'initiation.id_department = department.id_department', 'left'); 
        $this->db->where('initiation.id_initiation', $where);
        $this->db->like('id_department', $like);
        $query = $this->db->get();
        return $query->result_array();
        
    }

    function all_index_initiation(){
        $sql = "SELECT initiation.id_initiation AS 'id_inisiasi',initiation.*, closing.*, planning.*, client.*
                From initiation left join closing on initiation.id_initiation = closing.id_initiation 
                left join planning on initiation.id_initiation = planning.id_initiation 
                left join client on initiation.id_client = client.id_client 
                where closing.id_initiation is NULL and planning.id_initiation is NULL ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function insert_komentar($params){
        return $this->db->insert('komentar', $params);
    }

    function insert_initiation($params){
        return $this->db->insert('initiation', $params);
    }

     function update_komentar($params, $where){
        return $this->db->update('komentar', $params, $where);
    }

       function update_initiation($params, $where){
        return $this->db->update('initiation', $params, $where);
    }

        function delete_initation($params){
        $sql = "DELETE FROM initiation WHERE id_initiation= ?";
        return $this->db->query($sql, $params);
    }

}