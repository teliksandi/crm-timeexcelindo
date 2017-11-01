<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_planning extends CI_Model{

    function get_list_planning($filter, $params){
        $sql = "SELECT planning.id_planning AS 'id_planning', initiation.project_title, planning.due_date, initiation.id_initiation, client.client_name, planning.start_date
                        From planning left join initiation on initiation.id_initiation = planning.id_initiation 
                        left join client on planning.id_client = client.id_client
                        where planning.id_initiation is NOT NULL
                        and $filter LIKE ? LIMIT ?,?";
        $query = $this->db->query($sql, $params);
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
    function get_initiation_by_id($params){
        $sql = "SELECT * FROM planning left join initiation on initiation.id_initiation = planning.id_initiation WHERE id_planning = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }
    }

    function search_planning($filter, $params){

        $sql = "SELECT COUNT(*) as 'total', client.client_name, initiation.project_title From planning left join initiation on initiation.id_initiation = planning.id_initiation left join client on initiation.id_client = client.id_client where planning.id_initiation is NOT NULL and $filter like ?";
        $query = $this->db->query($sql,$params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return NULl;
        }
    }


    function initiation_detail($where){
        $sql = "SELECT a.id_initiation, b.*, c.*, d.*, e.* FROM planning a 
                left JOIN initiation b on a.id_initiation = b.id_initiation
                left JOIN client c on b.id_client = c.id_client 
                left JOIN karyawan d on b.id_karyawan = d.id_karyawan
                left JOIN department e on b.id_department = e.id_department
                WHERE  a.id_planning = ?";
        $query = $this->db->query($sql, $where);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function planning_komen($where) {  
        $sql = "SELECT * FROM komentar WHERE id_planning = ?";
        $query = $this->db->query($sql, $where);
        return $query->result_array();
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

    function get_department_by_id($where){
        $sql = "SELECT * FROM initiation left join planning on initiation.id_initiation = planning.id_initiation WHERE planning.id_planning = ?";
        $query = $this->db->query($sql, $where);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }
    }

    function update_planning_b($params, $where){
        return $this->db->update('planning', $params, $where);
    }

    function insert_planning($params){
        return $this->db->insert('planning', $params);
    }

    function delete_planning($params){
        $sql = "DELETE FROM planning WHERE id_planning= ?";
        return $this->db->query($sql, $params);
    }


}