<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends CI_Controller {
	function __construct() {
		parent::__construct();
	
       $this->load->model('graph_model');

    }

	public function index($id=''){
    
        $this->load->view('result_view');
    }
}