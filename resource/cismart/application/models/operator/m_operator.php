<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_operator extends CI_Model{  

    function tahun(){
        $sql ="SELECT due_date from monitoring where id_monitoring = 11 ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    
    function project_masuk(){
        $sql = "SELECT count(id_initiation) as total_masuk from initiation ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function project_kerjakan(){
        $sql = "SELECT count(a.id_monitoring) as total_kerjakan from  closing b left join monitoring a on a.id_monitoring = b.id_monitoring where b.id_monitoring is NOT null GROUP BY b.year=2017 DESC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function project_reject(){
        $sql = "SELECT count(id_closing) as total_reject from closing left JOIN initiation on closing.id_initiation = initiation.id_initiation where id_monitoring is NULL";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function year(){
        $sql = " SELECT year from closing GROUP BY year ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }

    }

     function batang_bdc(){
        $sql = " SELECT COUNT(a.id_execution) AS total FROM monitoring a left JOIN closing b on a.id_monitoring = b.id_monitoring where a.id_department = 2 GROUP BY b.year = 2017";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function batang_infastruktur(){
        $sql = " SELECT COUNT(a.id_execution) AS total FROM monitoring a left JOIN closing b on a.id_monitoring = b.id_monitoring where a.id_department = 5 GROUP BY b.year = 2017";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }
    }

     function batang_isp(){
        $sql = " SELECT COUNT(a.id_execution) AS total FROM monitoring a left JOIN closing b on a.id_monitoring = b.id_monitoring where a.id_department = 6 GROUP BY b.year = 2017";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

     function batang_softdev(){
        $sql = "SELECT COUNT(a.id_execution) AS total FROM monitoring a left JOIN closing b on a.id_monitoring = b.id_monitoring where a.id_department = 9 GROUP BY b.year = 2017";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function lingkaran(){
        $sql = " SELECT SUM(planning.budget) AS anggaran, 
                        SUM(planning.PPN) AS ppn, 
                        SUM(planning.PPH) AS pph, 
                        SUM(planning.b_administrasi) AS administrasi, 
                        SUM(planning.b_produksi_dan_operasional) AS produksi, 
                        SUM(planning.b_hardware_dan_infrastruktur) AS hardware, 
                        SUM(planning.b_perawatan) AS perawatan, 
                        SUM(planning.b_lain_lain) AS lain_lain, 
                        SUM(planning.b_entertaint) AS entertaint,
                        SUM(planning.perkiraan_rugi_laba) AS perkiraan FROM monitoring 
                        left JOIN execution on monitoring.id_execution = execution.id_execution
                        left JOIN planning on planning.id_planning = execution.id_planning 
                        left join closing on monitoring.id_monitoring = closing.id_monitoring group by closing.year = 2017 ";
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