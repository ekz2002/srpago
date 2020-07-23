<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller {

    public function __construct() {
        parent::__construct();
		
        $this->load->database();
        $this->load->helper('url');
    }

    // se accede con http://miservidor/restserver/users?format=json
public function users_get() {
    //$this->load->model('Users');
    $this-> load->model("codigospostalesModel");
    $this->response($this->codigospostalesModel>findAll());
}
}
?>