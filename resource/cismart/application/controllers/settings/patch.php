<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/AdminBase.php' );

// --

class patch extends ApplicationBase {
      // constructor
      public function __construct() {
          // parent constructor
          parent::__construct();
          // load model
          $this->load->model('m_settings');
          // load library
          $this->load->library('encrypt');
          $this->load->library('tnotification');
          $this->load->library('pagination');
          // global assign
          $this->smarty->assign("encrypt", $this->encrypt);
      }

      public function index(){
            $this->_set_page_rule("R");
            // set template
            $this->smarty->assign("template_content","settings/patch/list.html");
            $this->tnotification->display_notification();
            parent::display();
      }

      public function process_patch(){
            $this->_set_page_rule("C");
            $this->_set_page_rule("U");
            $this->load->library("unzip");
            $this->load->library("tupload");
            if (!empty($_FILES['patch_file']['tmp_name'])) {
                  $config['upload_path'] = 'resource/doc/patch/';
                  $config['allowed_types'] = '*';
                  $this->tupload->initialize($config);
                  // process upload images
                  if ($this->tupload->do_upload('patch_file')) {
                        $data = $this->tupload->data();
                        //load lib
                        $this->load->library("unzip");
                        $this->unzip->extract($config['upload_path'].$data['orig_name']);
                        //read config
                        $xml = simplexml_load_file($config['upload_path'].$data['raw_name']."/cismartupdater.xml");
                        $modulelist = $xml->modulelist->moduledetail;
                        foreach ($modulelist as $module) {
                              $controllerpath = (string)$module->controllerpath;
                              $portalid = $module->portalid;
                              $parentmenuid = $module->parentmenuid;
                              $modulename = (string)$module->modulename;
                              $moduledesc = (string)$module->moduledesc;
                              $menuorder = $module->menuorder;
                              //insert menu
                              $params = array($portalid, $parentmenuid, $modulename,
                                  $moduledesc, $controllerpath, $menuorder,
                                  "1", "1", $this->com_user['user_id']);
                              // insert
                              if ($this->m_settings->insert_menu($params)) {
                                    //copy file to path
                                    //copy models
                                    $this->load->helper("directory");
                                    //copy models
                                    $map_models = directory_map($config['upload_path'].$data['raw_name']."/models", 1);
                                    foreach ($map_models as $models) {
                                          copy($config['upload_path'].$data['raw_name']."/models/".$models, APPPATH."/models/".$models);
                                    }
                                    //copy views
                                    $map_views = directory_map($config['upload_path'].$data['raw_name']."/views", 1);
                                    foreach ($map_views as $views) {
                                          copy($config['upload_path'].$data['raw_name']."/views/".$views, APPPATH."/views/".$views);
                                    }
                                    //copy controllers
                                    $map_controllers = directory_map($config['upload_path'].$data['raw_name']."/controllers/", 1);
                                    $folder = explode($controllerpath,"/");
                                    foreach ($map_controllers as $controllers) {
                                          if(file_exists(APPPATH."/controllers/".$folder[1]) ){
                                                mkdir(APPPATH."/controllers/".$folder[1]);
                                          }
                                          copy($config['upload_path'].$data['raw_name']."/controllers/".$controllers, APPPATH."/controllers/".$folder[1]."/".$controllers);
                                    }
                              }
                        }

                        //file_name
                        $this->tnotification->sent_notification("success","Patch berhasil diupload");
                  } else {
                      // jika gagal
                      $this->tnotification->set_error_message($this->tupload->display_errors());
                  }
                  redirect("settings/patch/index");
            }
            //get config file

      }

}
 ?>
