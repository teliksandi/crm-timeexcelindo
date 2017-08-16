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

function insert_initiation($params){
        return $this->db->insert('initiation', $params);
    }

       function update_initiation($params, $where){
        return $this->db->update('initiation', $params, $where);
    }

        function delete_initation($params){
        $sql = "DELETE FROM initiation WHERE id_initiation= ?";
        return $this->db->query($sql, $params);
    }

}