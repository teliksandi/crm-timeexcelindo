<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_closing extends CI_Model{

   function get_list_closing(){
        $this->db->select('*');
        $this->db->from('closing');
        $this->db->join('initiation', 'initiation.id_initiation = closing.id_initiation', 'left'); 
        $this->db->join('client', 'client.id_client = initiation.id_client', 'left'); 
        $query = $this->db->get();
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
        $sql   = "SELECT  a.id_initiation,b.komentar AS 'komenb', c.project_title, d.client_name
                    FROM closing a left join initiation c on a.id_initiation = c.id_initiation
                    left join client d on c.id_client = d.id_client
                    join(
                        SELECT b1.* from komentar b1
                        join(
                            SELECT id_initiation, max(tgl_komentar) AS maxDate
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
    
    function initiation_detail($where){
        $sql = "SELECT a.id_initiation, b.start_date as 'mulai', b.due_date as 'akhir', b.*, c.*, d.*, e.* FROM closing a 
                left JOIN initiation b on a.id_initiation = b.id_initiation
                left JOIN client c on b.id_client = c.id_client 
                left JOIN karyawan d on b.id_karyawan = d.id_karyawan
                left JOIN department e on b.id_department = e.id_department
                WHERE  b.id_initiation = ?";
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
        $sql = "SELECT a.id_department as 'department', a.id_karyawan as 'karyawan', b.id_closing FROM initiation a left join closing b on a.id_initiation = b.id_initiation WHERE a.id_initiation = ?";
        $query = $this->db->query($sql, $where);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
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