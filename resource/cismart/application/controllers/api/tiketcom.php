<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );
require_once( BASEPATH.'plugins/tiketcom/Auth/TiketAuth.php' );

use Mtasuandi\Tiket\Auth\TiketAuth;
use Mtasuandi\Tiket\Exceptions\AuthException;

class tiketcom extends ApplicationBase {
      // constructor
      public function __construct() {
            parent::__construct();
            // load model
            // load library
            $this->load->library('tnotification');

      }

      // welcome operator
      public function index() {
            // set page rules
            $this->_set_page_rule("R");
            // set template content
            $this->smarty->assign("template_content", "api/tiketcom/index.html");

            try {
                  $auth = new TiketAuth( '2eb307129c04347f315aba808fb70ad6 ' );
                  $access_token = $auth->getToken();
                  var_dump( $access_token );
            } catch (AuthException $e) {
                  var_dump($e);
            }
            exit();
            // output
            parent::display();
      }
}
?>
