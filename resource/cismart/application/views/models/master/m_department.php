<?php

class m_department extends CI_Model{
    
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
    
    function get_data_department() {
       
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('department', 'karyawan.id_department = department.id_department', 'inner'); 
        $query = $this->db->get();
        return $query->result_array();
        
    }
}

