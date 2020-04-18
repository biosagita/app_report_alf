<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Graph extends CI_Controller {
	function __construct() {
		parent::__construct();
	
       $this->load->model('graph_model');

    }

	public function index($id_report=''){
       
    }
    public function create($id_report=''){
        $data = array(
            'id_report' => $id_report,
            'tanggal_report'=> date("Y-m-d")
    );
    
        $this->load->view('graph_view', $data);
    }
}