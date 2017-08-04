<?php
require_once( BASEPATH . 'libraries/tiketcom-api/vendor/autoload.php' );

use Mtasuandi\Tiket\Tiket;
use Mtasuandi\Tiket\Auth\TiketAuth;
use Mtasuandi\Tiket\Exceptions\AuthException;
use Mtasuandi\Tiket\Services\FlightService;
use Mtasuandi\Tiket\Util\Config;

class CI_Tiketcom extends Tiket{

    private $api_key;
    private $token;

    public function __construct(){
        
        $CI =& get_instance();
        $this->api_key = $CI->config->item('tiket_com_key');
        $token = $CI->tsession->userdata("tiket_com_token");
        if (empty($token)) {
            $this->token = $this->get_access_token();
            $CI->tsession->set_userdata("tiket_com_token", $this->token);  
        }
        parent::__construct($this->token);
    }

    public function get_access_token(){
        $auth = new TiketAuth($this->api_key);
        try {
            $access_token = $auth->getToken();
            return $access_token;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function search_flight($params){
        $service = new FlightService($this->token);
        $params['secretkey'] = $this->api_key;
        $response = $service->searchFlight($params);
        $response = json_decode($response);
		return $response;
    }
}
