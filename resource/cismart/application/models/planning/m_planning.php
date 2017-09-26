<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_planning extends CI_Model{

	function get_list_planning(){
        $sql = "SELECT * FROM planning";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_total_planning($params){
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
    function get_data_planning() {
        $this->db->select('*');
        $this->db->from('planning');
        $this->db->join('initiation', 'planning.id_initiation = initiation.id_initiation', 'left');
        $this->db->join('client', 'initiation.id_client = client.id_client', 'left');        
        $query = $this->db->get();
        return $query->result_array();
        
    }

        function get_planning_by_id($where){

        $this->db->select('*');
        $this->db->from('planning');
        $this->db->join('initiation', 'initiation.id_initiation = planning.id_initiation', 'left'); 
        $this->db->where('planning.id_planning', $where);
        $query = $this->db->get();
        return $query->result_array();
         
    }


    function insert_planning($params){
        return $this->db->insert('planning', $params);
    }




}