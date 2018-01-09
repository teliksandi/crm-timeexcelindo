<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class welcome extends ApplicationBase {

    // constructor
    public function __construct() {
        parent::__construct();
        // load model
        // load library
        $this->load->library('tnotification');
        $this->load->library('datetimemanipulation');
        $this->load->model('operator/m_operator');

        $this->smarty->load_javascript("resource/themes/adminlte/plugins/jquery/highcharts.js");        
        $this->smarty->load_javascript("resource/themes/adminlte/plugins/jquery/drilldown.src.js");

    }
    

    // welcome operator
    public function index() {
       
       
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "operator/welcome/index.html");
        $this->smarty->assign('user', $this->com_user['user_id']);

        $this->smarty->assign("year", $this->m_operator->year());

        $in     = $this->m_operator->project_masuk();        
        foreach ($in as $bg) {
           $total_masuk[]= $bg['total_masuk'];
           
        } 

         $data_total_masuk = implode(",", $total_masuk);
         $this->smarty->assign("in", $data_total_masuk);

        $finish = $this->m_operator->project_kerjakan();
        foreach ($finish as $bg) {
           $total_kerjakan[]= $bg['total_kerjakan'];
           
        } 

         $data_total_kerja = implode(",", $total_kerjakan);
         $this->smarty->assign("finish", $data_total_kerja);

        $reject = $this->m_operator->project_reject();
        foreach ($reject as $bg) {
           $total_reject[]= $bg['total_reject'];
           
        } 

         $data_total_reject = implode(",", $total_reject);
         $this->smarty->assign("reject", $data_total_reject);



        //CHART BATANG
        $bdc0 = $this->m_operator->batang_bdc();
        if ($bdc0 == NULL) {
            $this->smarty->assign("bdc4", 0);
        } else {        
        foreach ($bdc0 as $bdc1) {
            $bdc2 = $bdc1['total'] ;
            $bdc3 = $bdc2[0];
            $this->smarty->assign("bdc4", $bdc3);

        } }

        $infastruktur0 = $this->m_operator->batang_infastruktur();
        if ($infastruktur0 == NULL) {
            $this->smarty->assign("infastruktur4", 0);
        } else {        
        foreach ($infastruktur0 as $infastruktur1) {
            $infastruktur2 = $infastruktur1['total'] ;
            $infastruktur3 = $infastruktur2[0];
            $this->smarty->assign("infastruktur4", $infastruktur3);

        } }
        
        $isp0 = $this->m_operator->batang_isp();
        if ($isp0 == NULL) {
            $this->smarty->assign("isp4", 0);
        } else {        
        foreach ($isp0 as $isp1) {
            $isp2 = $isp1['total'] ;
            $isp3 = $isp2[0];
            $this->smarty->assign("isp4", $isp3);

        } }

        $softdev0 = $this->m_operator->batang_softdev();
        if ($softdev0 == NULL) {
            $this->smarty->assign("softdev4", 0);
        } else {        
        foreach ($softdev0 as $softdev1) {
            $softdev2 = $softdev1['total'] ;
            $softdev3 = $softdev2[0];
            $this->smarty->assign("softdev4", $softdev3);

        } }

        //LINGKARAN CHART
        $lingkaran = $this->m_operator->lingkaran();
        foreach ($lingkaran as $jenis_lingkaran) {

            $budget = $jenis_lingkaran['anggaran'];
            $this->smarty->assign("budget", $budget);

            $ppn    = $jenis_lingkaran['ppn'];
            $this->smarty->assign("ppn", $ppn);

            $pph    = $jenis_lingkaran['pph'];
            $this->smarty->assign("pph", $pph);

            $administrasi    = $jenis_lingkaran['administrasi'];
            $this->smarty->assign("administrasi", $administrasi);

            $produksi    = $jenis_lingkaran['produksi'];
            $this->smarty->assign("produksi", $produksi);

            $hardware    = $jenis_lingkaran['hardware'];
            $this->smarty->assign("hardware", $hardware);

            $perawatan    = $jenis_lingkaran['perawatan'];
            $this->smarty->assign("perawatan", $perawatan);

            $lain_lain    = $jenis_lingkaran['lain_lain'];
            $this->smarty->assign("lain_lain", $lain_lain);

            $entertaint    = $jenis_lingkaran['entertaint'];
            $this->smarty->assign("entertaint", $entertaint);

            $perkiraan    = $jenis_lingkaran['perkiraan'];
            $this->smarty->assign("perkiraan", $perkiraan);
        }


        parent::display();
    }

    function get_datalist_budget(){
       $sql = "SELECT project_title, budget FROM initiation";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            header('Content-Type: application/json');
            echo json_encode($result);
        } else {
            return array();
        }
    }
}
