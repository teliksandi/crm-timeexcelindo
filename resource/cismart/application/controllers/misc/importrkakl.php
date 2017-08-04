<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

/**
 * 
 */
class importrkakl extends ApplicationBase {

    function __construct() {
        parent::__construct();
        // load library
        $this->load->library('tnotification');
        $this->load->library('datetimemanipulation');
    }

    // welcome operator
    public function index() {
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "misc/rkakl/import.html");
        $this->tnotification->display_notification();
        // output
        parent::display();
    }

    public function import_process() {
        $this->_set_page_rule("C");
        $this->load->library("tupload");
        $this->tnotification->set_rules("file_ext", "File backup extension", "trim|required");
        if ($this->tnotification->run() !== FALSE) {
            if (!empty($_FILES['file_nm']['tmp_name'])) {
                //get file ext
                $file_ext = $this->input->post("file_ext");

                // upload config
                $config['upload_path'] = 'resource/doc/rkakl/';
                $config['allowed_types'] = "*";
                $config['file_ext_tolower'] = TRUE;
                $config['file_name'] = pathinfo($_FILES['file_nm']['name'], PATHINFO_FILENAME) . '.rar';

                $this->tupload->initialize($config);
                if ($this->tupload->do_upload("file_nm")) {
                    $data = $this->tupload->data();
                    //extract rar file
                    // B197512251996021001081560967811040VQ - password enkripsi
                    $rar_file = rar_open($data["full_path"], "B197512251996021001081560967811040VQ");
                    $entries = rar_list($rar_file);
                    foreach ($entries as $entry) {
                        //extract file
                        $entry->extract('resource/doc/rkakl/' . $data["raw_name"]);
                        //listing file di dlm folder
                        $folder_content = scandir("resource/doc/rkakl/" . $data["raw_name"]);
                        foreach ($folder_content as $file) {
                            /*
                             * Filter Tabel RKAKL
                             * -------------------- 
                              Output - d_output
                              Sub-output - d_soutput
                              Komponen - d_kmpnen
                              Sub-komponen - d_skmpnen
                              Akun - d_akun
                              Item - d_item
                             * 
                             */
                            if (substr($file, 0, 8) == "d_output") {
                                 //rename file ke extension .dbf
                                rename("resource/doc/rkakl/" . $data["raw_name"] . "/" . $file, "resource/doc/rkakl/" . $data["raw_name"] . "/" . "d_output.dbf");
                            } elseif (substr($file, 0, 9) == "d_soutput") {
                                //rename file ke extension .dbf
                                rename("resource/doc/rkakl/" . $data["raw_name"] . "/" . $file, "resource/doc/rkakl/" . $data["raw_name"] . "/" . "d_soutput.dbf");
                            } elseif (substr($file, 0, 8) == "d_kmpnen") {
                                //rename file ke extension .dbf
                                rename("resource/doc/rkakl/" . $data["raw_name"] . "/" . $file, "resource/doc/rkakl/" . $data["raw_name"] . "/" . "d_kmpnen.dbf");
                            } elseif (substr($file, 0, 9) == "d_skmpnen") {
                                //rename file ke extension .dbf
                                rename("resource/doc/rkakl/" . $data["raw_name"] . "/" . $file, "resource/doc/rkakl/" . $data["raw_name"] . "/" . "d_skmpnen.dbf");
                            } elseif (substr($file, 0, 6) == "d_akun") {
                                //rename file ke extension .dbf
                                rename("resource/doc/rkakl/" . $data["raw_name"] . "/" . $file, "resource/doc/rkakl/" . $data["raw_name"] . "/" . "d_akun.dbf");
                            } elseif (substr($file, 0, 6) == "d_item") {
                                //rename file ke extension .dbf
                                rename("resource/doc/rkakl/" . $data["raw_name"] . "/" . $file, "resource/doc/rkakl/" . $data["raw_name"] . "/" . "d_item.dbf");
                            }
                        }
                    }
                    // close file
                    rar_close($rar_file);
                    //load lib
                    $this->load->library("dbfreader");
                    // result read file
                    $rs_out = $this->dbfreader->read_out("resource/doc/rkakl/" . $data["raw_name"] . "/" . "d_output.dbf");
                    $rs_sout = $this->dbfreader->read_sout("resource/doc/rkakl/" . $data["raw_name"] . "/" . "d_soutput.dbf");
                    $rs_kmp = $this->dbfreader->read_kmp("resource/doc/rkakl/" . $data["raw_name"] . "/" . "d_kmpnen.dbf");
                    $rs_skmp = $this->dbfreader->read_skmp("resource/doc/rkakl/" . $data["raw_name"] . "/" . "d_skmpnen.dbf");
                    $rs_akun = $this->dbfreader->read_akun("resource/doc/rkakl/" . $data["raw_name"] . "/" . "d_akun.dbf");
                    $rs_item = $this->dbfreader->read_item("resource/doc/rkakl/" . $data["raw_name"] . "/" . "d_item.dbf");
                } else {
                    $this->tnotification->sent_notification("error", "Gagal melakukan import data RKAKL karena : " . $this->tupload->display_errors());
                    redirect('misc/importrkakl/index');
                }
            } else {
                $this->tnotification->sent_notification("error", "Gagal melakukan import data RKAKL");
                redirect('misc/importrkakl/index');
            }
        } else {
            $this->tnotification->sent_notification("error", "Gagal melakukan import data RKAKL");
        }
        redirect('misc/importrkakl/index');
    }

}

?>