<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class gmap extends ApplicationBase {

    // constructor
    public function __construct() {
        parent::__construct();
        // load model
        // load library
        $this->load->library('tnotification');
        $this->load->library('datetimemanipulation');
        $this->load->library('geodetic');
    }

    // welcome operator
    public function index() {
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "api/gmap/index.html");
        $this->smarty->assign('user', $this->com_user['user_id']);
        // output
        parent::display();
    }

    public function convertutm(){
          $lat = $this->input->post("lat");
          $lon = $this->input->post("lng");
          $height = 0.0;
          $latLong = new \Geodetic\LatLong(
              new \Geodetic\LatLong\CoordinateValues(
                  $lat,
                  $lon,
                  \Geodetic\Angle::DEGREES,
                  $height,
                  \Geodetic\Distance::METRES
              )
          );

          $datum = new \Geodetic\Datum(\Geodetic\Datum::WGS84);
          $utm = $latLong->toUTM($datum);
          $result = array();
          $result["northing"] = $utm->getNorthing();
          $result["easting"] = $utm->getEasting();
          $result["lon_zone"] = $utm->getLongitudeZone();
          $result["lat_zone"] = $utm->getLatitudeZone();
          echo json_encode($result);
   }
}
