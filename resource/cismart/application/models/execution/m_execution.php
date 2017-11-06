<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_execution extends CI_Model{

    // function __construct(){
    //     parent::__construct();
    //     $this->load->library('datetimemanipulation');
    //     $this->smarty->assign("dtm", $this->datetimemanipulation);
    // }

    function search_execution($filter, $params){

        $sql = "SELECT COUNT(*) as 'total', client.client_name, initiation.project_title, execution.due_date From execution left join planning on execution.id_planning = planning.id_planning left join initiation on initiation.id_initiation = planning.id_initiation left join client on initiation.id_client = client.id_client where execution.id_planning is NOT NULL and $filter like ?";
        $query = $this->db->query($sql,$params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return NULl;
        }
    }

    function get_list_execution($filter, $params){
        $sql = "SELECT execution.id_execution AS 'id_execution', initiation.project_title, execution.due_date, initiation.id_initiation, execution.start_date, client.client_name
                        From execution left join planning on execution.id_planning = planning.id_planning
                        left join initiation on initiation.id_initiation = planning.id_initiation
                        left join client on initiation.id_client = client.id_client                    
                        where execution.id_planning is NOT NULL
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


    function insert_execution($params){
        return $this->db->insert('execution', $params);
    }

}
