<?php

class m_date extends CI_Model{
    
    function get_date_karyawan(){
        $sql = "SELECT tgl_lahir FROM karyawan";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
  
}

