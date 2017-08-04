<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class pdfmerge extends ApplicationBase {
      public function __construct() {
            parent::__construct();
            // load model
            // load library
            $this->load->library('pdfmerger');
      }

      public function index() {
            //set rules
            $this->_set_page_rule("R");
            $this->smarty->assign("template_content","lib/pdfmerger/list.html");
            parent::display();
      }

      public function mergepdfdoc(){
            $pdf = new PDFMerger;
            $pdf->addPDF('resource/doc/pdf/satu.pdf', '1')
            ->addPDF('resource/doc/pdf/dua.pdf', '1')
            ->merge('download', 'tiga.pdf');
      }

}
?>
