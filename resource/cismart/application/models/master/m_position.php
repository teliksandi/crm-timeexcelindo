<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class m_position extends CI_Model{

		function get_list_position(){
	        $sql = "SELECT * FROM position";
	        $query = $this->db->query($sql);
	        if ($query->num_rows() > 0) {
	            $result = $query->result_array();
	            $query->free_result();
	            return $result;
	        } else {
	            return array();
	        }
	    }
    

		function get_position(){

			$this->db->select('*');
			$this->db->from('karyawan');
			$this->db->join('position','karyawan.id_position = position.id_position', 'inner');
			$query = $this->db->get();
			return $query->result_array();
		}
	}