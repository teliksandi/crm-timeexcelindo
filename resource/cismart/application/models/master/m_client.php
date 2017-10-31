<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_client extends CI_Model{
    function get_list_client($params){
        $sql = "SELECT * FROM client WHERE client_name LIKE ? LIMIT ?,?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_id($nm_client){
        $sql = "SELECT id_client as client, client_name FROM client where client_name LIKE ?";
        $query = $this->db->query($sql, $nm_client);
          if ($query->num_rows() > 0) {
              $result = $query->result();
              $query->free_result();
              return $result;
          } else {
              return array();
        }
    }

     function get_id_client_name($name){
        $sql = "SELECT * FROM client where client_name = ?";
        $query = $this->db->query($sql, $name);
          if ($query->num_rows() > 0) {
              $result = $query->result();
              $query->free_result();
              return $result;
          } else {
              return array();
        }
    }

    function get_all_client(){
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

    function get_client_by_id($params){
        $sql = "SELECT * FROM client WHERE id_client = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }
    }


    function get_total_client($params){
        $sql = "SELECT COUNT(*) as 'total' FROM client WHERE client_name LIKE ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return NULl;
        }
    }

    function insert_client($params){
        return $this->db->insert('client', $params);
    }

       function update_client($params, $where){
        return $this->db->update('client', $params, $where);
    }

        function delete_client($params){
        $sql = "DELETE FROM client WHERE id_client= ?";
        return $this->db->query($sql, $params);
    }

}