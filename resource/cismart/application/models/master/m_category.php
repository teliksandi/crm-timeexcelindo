<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_category extends CI_Model{

    function get_list_category($params){
        $sql = "SELECT * FROM category WHERE category_nm LIKE ? LIMIT ?,?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_total_category($params){
        $sql = "SELECT COUNT(*) as 'total' FROM category WHERE category_nm LIKE ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return NULl;
        }
    }

    function get_category_by_id($params){
        $sql = "SELECT * FROM category WHERE category_id = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }
    }

    function insert_category($params){
        return $this->db->insert('category', $params);
    }

    function update_category($params, $where){
        return $this->db->update('category', $params, $where);
    }

    function delete_category($params){
        $sql = "DELETE FROM category WHERE category_id = ?";
        return $this->db->query($sql, $params);
    }

}
