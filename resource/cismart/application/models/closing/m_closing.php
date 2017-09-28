<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_closing extends CI_Model{

   function get_list_closing(){
        $sql = "SELECT * FROM closing";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_total_closing($params){
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
   function get_koment(){
        $sql   = "SELECT a.id_closing, a.id_initiation, b.id_initiation, b.komentar AS 'komenb', b.tgl_komentar, c.*, d.*
                    FROM closing a left join initiation c on a.id_initiation = c.id_initiation
                    left join client d on c.id_client = d.id_client
                    join(
                        SELECT b1.* from komentar b1
                        join(
                            SELECT id_initiation, min(tgl_komentar) AS maxDate
                            FROM komentar
                            GROUP BY id_initiation
                            ) b2 
                            ON b1.id_initiation = b2.id_initiation
                            AND b1.tgl_komentar = b2.maxDate                          
                        ) b ON  a.id_initiation = b.id_initiation
                        ";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function insert_closing($params){
        return $this->db->insert('closing', $params);
    }

    function update_closing($params, $where){
        return $this->db->update('closing', $params, $where);
    }

    function delete_closing($params){
        $sql = "DELETE FROM initiation WHERE id_initiation= ?";
        return $this->db->query($sql, $params);
    }

}