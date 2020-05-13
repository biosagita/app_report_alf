<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Graph extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
			redirect('login', 'refresh');
        }
        $this->load->model('graph_model');
    }

    public function index($id_report = '')
    {
        $this->load->view('graph_view');
    }
    public function create($id_report = '')
    {
        $data = array(
            'id_report' => $id_report,
            'tanggal_report' => date("Y-m-d"),
        );
        $this->load->view('graph_view', $data);
    }
}