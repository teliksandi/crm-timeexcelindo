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
}