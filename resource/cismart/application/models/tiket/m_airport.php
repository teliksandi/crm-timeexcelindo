<?php

class m_airport extends CI_Model{
    
    function get_all_airport(){
        $sql = "SELECT * FROM airport ORDER BY airport_nm";
        $query = $this->db->query($sql);
        if ($query->num_rows > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        }else{
            return array();
        }
    }
    
}