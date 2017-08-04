<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once( BASEPATH.'plugins/geodetic/Bootstrap.php' );
require_once( BASEPATH.'plugins/geodetic/Autoloader.php' );

class CI_Geodetic extends \Geodetic\Autoloader {

    function CI_Geodetic() {
        // Bootstrap constructor
       \Geodetic\Autoloader::Register();

    }
}
