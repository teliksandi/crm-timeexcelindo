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

    function get_list_initiation($filter, $params){
        $sql = "SELECT initiation.id_initiation AS 'id_inisiasi',initiation.project_title, initiation.due_date, closing.id_closing, planning.id_planning, client.client_name, initiation.start_date
                From initiation left join closing on initiation.id_initiation = closing.id_initiation 
                left join planning on initiation.id_initiation = planning.id_initiation 
                left join client on initiation.id_client = client.id_client
                where closing.id_initiation is NULL and planning.id_initiation is NULL
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

    function get_id_file($judul){
        $this->db->select('*');
        $this->db->from('file');
        $this->db->join('initiation', 'file.id_initiation = initiation.id_initiation', 'left'); 
        $this->db->like('file.file', $judul);
        $query = $this->db->get();
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
        $this->db->where('id_initiation', $where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
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

    function get_list_file($where){
        $this->db->select('*');
        $this->db->from('file');
        $this->db->where('id_file', $where);
        $query = $this->db->get();
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
        $this->db->select('*');
        $this->db->from('komentar');
        $this->db->join('users', 'komentar.user_id = users.user_id', 'left');
        $this->db->where('id_initiation', $where);
        $query = $this->db->get();
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
        $sql = "SELECT initiation.id_initiation AS 'id_inisiasi',initiation.project_title, initiation.due_date, closing.id_closing, planning.id_planning, client.client_name, initiation.start_date
                From initiation left join closing on initiation.id_initiation = closing.id_initiation 
                left join planning on initiation.id_initiation = planning.id_initiation 
                left join client on initiation.id_client = client.id_client
                where closing.id_initiation is NULL and planning.id_initiation is NULL
                ORDER BY initiation.id_initiation DESC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function search_initiation($filter, $params){
        $sql = "SELECT  COUNT(*) as 'total', client.client_name
                From initiation left join closing on initiation.id_initiation = closing.id_initiation 
                left join planning on initiation.id_initiation = planning.id_initiation 
                left join client on initiation.id_client = client.id_client
                where closing.id_initiation is NULL and planning.id_initiation is NULL and $filter like ? ";
        $query = $this->db->query($sql,$params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return NULl;
        }
    }


    function getComment($id_initiation) {
        $sql = "SELECT tgl_komentar from komentar KM1 INNER JOIN( SELECT max(id_komentar)as id_kom from komentar where id_initiation =" . $id_initiation . " ) KM2 on KM2.id_kom=KM1.id_komentar ";
        return $query = $this->db->query($sql)->result_array();
    }
   
    function tambah($params) {

        $data = array (
                'file'          =>  $params,
                'tgl_upload'    =>  date('d-m-Y h:i:sa'),
                'id_initiation' =>  $this->db->insert_id()
        );  
        $this->db->insert('file',$data);
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

    function delete_initiation($params){
        $sql = "DELETE FROM initiation WHERE id_initiation= ?";
        return $this->db->query($sql, $params);
    }

    function delete_file($judul, $id){
        $sql = "DELETE FROM file WHERE id_initiation = $id and file = '$judul'";
        return $this->db->query($sql);
    }

    function delete_file_cuy($params){

        $sql = "DELETE FROM file where id_initiation = ? ";
        return $this->db->query($sql,$params);

    }

    function delete_komentar($params){
        $sql = "DELETE FROM komentar WHERE id_initiation= ?";
        return $this->db->query($sql, $params);
    }

}