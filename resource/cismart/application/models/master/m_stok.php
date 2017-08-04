<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_stok extends CI_Model {
    
    function get_list_stok($params){
        $sql = "SELECT * FROM stok_obat WHERE nama_obat LIKE ? LIMIT ?,?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_stok(){
        $sql = "SELECT * FROM stok_obat group by nama_obat";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_total_stok($params){
        $sql = "SELECT COUNT(*) as 'total' from stok_obat WHERE nama_obat LIKE ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return NULl;
        }
    }

    function get_stok_by_id($params){
        $sql = "SELECT * FROM stok_obat WHERE stok_id = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }
    }

    function insert_stok($params){
        return $this->db->insert('stok_obat', $params);
    }

    function update_stok($params, $where){
        return $this->db->update('stok_obat', $params, $where);
    }

    function delete_stok($params){
        $sql = "DELETE FROM stok_obat WHERE stok_id = ?";
        return $this->db->query($sql, $params);
    }
}

?>
