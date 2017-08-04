<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'rest-client/vendor/autoload.php';

class CI_restclient {

    protected $CI;
    protected $host = "";
    protected $username = "";
    protected $password = "";

    function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->library("nonce");
        $rest_server    = $this->CI->config->item('rest_server');
        $this->host     = $rest_server['host'];
        $this->username = $rest_server['username'];
        $this->password = $rest_server['password'];
    }


    public function request($method, $uri, $param_request, $auth_type, $nc = 1){

        switch ($method) {
            case 'GET':
            $response = \Httpful\Request::get($this->host.$uri)
            ->sendsJson()
            ->expectsJson()
            ->body(json_encode($param_request))
            ->send();
            break;

            case 'POST':
            $response = \Httpful\Request::post($this->host.$uri)
            ->expectsJson()
            ->send();
            break;

            case 'PUT':
            $response = \Httpful\Request::put($this->host.$uri)
            ->expectsJson()
            ->send();
            break;

            case 'DELETE':
            $response = \Httpful\Request::delete($this->host.$uri)
            ->expectsJson()
            ->send();
            break;

        }

        if ((stripos($response->headers["www-authenticate"], $auth_type) === FALSE) && $response->headers["www-authenticate"] != "") {
            echo "Auth method that you specified in the method doesn't match with the server";
            die();
        }
        if ($response->code == 401) {

            if ($auth_type == "digest") {

                $string_header = $this->_get_auth_digest_string($response, $method, $uri, $nc);
            }elseif($auth_type == "basic"){
                $string_header = $this->_get_auth_basic_string($response, $method, $uri, $nc);
            }else{
                $string_header = "";
            }


            switch ($method) {
                case 'value':
                    # code...
                    break;

                default:
                    # code...
                    break;
            }
            $response = \Httpful\Request::get($this->host.$uri)
            ->addHeader('Authorization', $string_header)
            ->expectsJson()
            ->send();

            if ($response->code == 401) {
                if ($nc > 100) {
                    die("request time out");
                }
                $this->request($method, $uri, $param_request, $auth_type, ($nc+1));
            } elseif($response->code == 200){
                return $response->body;
            } else {
                echo "server error";
                print_r($response->body);
                die();
            }
        } elseif($response->code == 200){
            return $response->body;
        } else {
            echo "server error";
            print_r($response->body);
            die();
        }
    }

    private function _get_auth_digest_string($response, $method, $uri, $nc){
        $digest_element = array();
        $authenticate_header = explode(",", str_replace("Digest", "", $response->headers["www-authenticate"]));
        foreach ($authenticate_header as $key => $header) {
            $arr_header = explode("\"", $header);
            $digest_element[trim(str_replace("=", "", strtolower($arr_header[0])))] = $arr_header[1];
        }

        $digest_element["cnonce"] = $this->CI->nonce->ft_nonce_create_query_string($uri, "website");
        $digest_element["username"] = $this->username;
        $digest_element["nc"] = $nc;

        $HA1 = md5($digest_element["username"].":".$digest_element["realm"].":".$this->password);

        $HA2 = md5($method.":".$uri);

        $digest_element["response"] = md5($HA1.":".$digest_element["nonce"].":".$digest_element["nc"].":".$digest_element["cnonce"].":".$digest_element["qop"].":".$HA2);

        $string_header = 'Digest username="'.$digest_element['username'].'", realm="'.$digest_element['realm'].'", nonce="'.$digest_element['nonce'].'", uri="'.$uri.'", qop="'.$digest_element['qop'].'", nc="'.$digest_element['nc'].'", cnonce="'.$digest_element['cnonce'].'", response="'.$digest_element['response'].'", opaque="'.$digest_element['opaque'].'",';

        return $string_header;
    }

    private function _get_auth_basic_string(){
        $encoded_string = base64_encode($this->username.":".$this->password);
        return "Basic ".$encoded_string;
    }

}
