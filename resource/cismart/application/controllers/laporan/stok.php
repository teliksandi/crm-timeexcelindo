<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class stok extends ApplicationBase {
    //put your code here
    
    public function __construct(){
        parent::__construct();
        // load Model
        $this->load->model('master/m_stok');
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
    }
    
    function index(){
        $this->smarty->load_javascript("resource/js/fusioncharts/fusioncharts.js");
        // set page rules (ngecek rule)
        $this->_set_page_rule("R");
        
        // set template content
        $this->smarty->assign("template_content", "laporan/stok/index.html");

        // session (nyimpen keyword, saat tambah keyword yg dicari ga ilang)
        $search = $this->tsession->userdata('search_stok_obat');
        $this->smarty->assign('search', $search);

        // params
        $nm_obat = !empty($search['nama_obat']) ? '%'. $search['nama_obat'] . '%' : "%";
        $params = array($nm_obat);

        $config['base_url'] = site_url("laporan/stok/index/");
        $config['total_rows'] = $this->m_stok->get_total_stok($params);
        $config['uri_segment'] = 5;
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $pagination['data'] = $this->pagination->create_links();

        // pagination attribute
        $start = $this->uri->segment(5, 0) + 1;
        $end = $this->uri->segment(5, 0) + $config['per_page'];
        $end = (($end > $config['total_rows']) ? $config['total_rows'] : $end);
        $pagination['start'] = ($config['total_rows'] == 0) ? 0 : $start;
        $pagination['end'] = $end;
        $pagination['total'] = $config['total_rows'];

        // pagination assign value
        $this->smarty->assign("pagination", $pagination);
        $this->smarty->assign("no", $start);

        // /* end of pagination ---------------------- */
        // get list data
        $params = array($nm_obat, ($start - 1), $config['per_page']);
        $this->smarty->assign("stok", $this->m_stok->get_list_stok($params));

        // output
        parent::display();
    }
    
    function pdf(){
        
        $this->load->library('tcpdf');
        $params = $this->m_stok->get_stok();
        //print_r($params); die();
        
        // write html
        $html = '<h3 align="center">Data Stok Obat</h3>';
        $html .= '<h4 align="center">Tanggal : '.date("d-m-y").'</h4><br><table width="100%" border="1" padding="10px" align="center">
                      <tr>
                        <th width="10%">No</th>
                        <th width="10%">ID Stok</th>
                        <th>Nama Obat</th>
                        <th>Tanggal Entry</th>
                        <th>Jumlah</th>
                      </tr>';
        $no=1; $total=0;
        foreach ($params as $result){
            $html .='<tr>
                        <td>'.$no.'</td>
                        <td>'.$result['stok_id'].'</td>
                        <td>'.$result['nama_obat'].'</td>
                        <td>'.date("d-m-y", strtotime($result['tgl_entry'])).'</td>
                        <td>'.$result['jml'].'</td>
                     </tr>';
        
            $no++;
            $total= $total + $result['jml'];
        }
        $html .='<tr>
                    <td colspan="4">TOTAL</td>
                    <td>'.$total.'</td>
                 </tr></table>';
        
        // config
        
        $this->tcpdf->SetHeaderData('', '', 'Data Stok Obat', '');
        //$this->tcpdf->SetPrintHeader(false);
        //$this->tcpdf->SetPrintFooter(false);
        $this->tcpdf->SetDisplayMode('real');
       
        // add a page
        $this->tcpdf->AddPage();
        $this->tcpdf->writeHTML($html, true, false, true, false, '');
        // output (D : download, I : view)
        $name = 'Data Obat '.date('d-m-y');
        $this->tcpdf->Output($name.".pdf", 'I');
    }
	
    function excel(){
        $this->load->library('phpexcel');
        $params = $this->m_stok->get_stok();
        // write
        
        $this->phpexcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Stok ID')
                ->setCellValue('B1', 'Nama Obat')
                ->setCellValue('C1', 'Jumlah')
                ->setCellValue('D1', 'Tanggal Entry');
       
        $rowCount = 2;                
        $columnlenght = 0;
        
        foreach($params as $row) {
        $this->phpexcel->setActiveSheetIndex(0);
                $this->phpexcel->getActiveSheet()->SetCellValue('A' . $rowCount, $row['stok_id']);
                $this->phpexcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['nama_obat']);
                $this->phpexcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['jml']);
                $this->phpexcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['tgl_entry']);
            $rowCount++;
        }
        $this->phpexcel->setActiveSheetIndex(0);      
        // download
        header("Content-type: application/vnd-ms-excel");
        $namafile ="DataObat".date('dmy')."";
        header("Content-Disposition: inline; filename=".$namafile.".xls");
        header("Cache-Control: max-age=0");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);
       
    }
    
    // data for chart
    public function  data_xml () {
        
        header("Content-type: text/xml");
        echo "<graph caption='Data Stok Obat' subcaption='Tahun 2016' xAxisName='Obat' yAxisMaxValue='20' yAxisMinValue='0' yAxisName='Jumlah' numberPrefix='' decimalPrecision='0'>";
        $params = $this->m_stok->get_stok();
        foreach($params as $result){
            echo "<set name='".$result['nama_obat']."' value='".$result['jml']."' />";
        }
        echo  "</graph> ";
    }
}

?>
