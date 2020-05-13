<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Result extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
			redirect('login', 'refresh');
        }
        $this->load->model('graph_model');
    }

    public function index($id = '')
    {
        $this->load->view('result_view');
    }
}