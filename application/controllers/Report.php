<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	function __construct() {
		parent::__construct();
		//$this->load->helper('resize_image');
       $this->load->model('report_model');
	//	$this->load->helper(array('form', 'url'));
	//	$this->load->library('form_validation');
	
    }

	public function index(){
    
        $this->load->view('report_view');
	}
	
	public function ajax_list()
	{
		$list = $this->report_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $report) {
			$no++;
            $row = array();
			$row[] = $no;
			$row[] = $report->id_report;
			$row[] = $report->nama_report;
			$row[] = $report->tanggal_report;
			
			
			
			//add html for action
			$row[] = '<a class="btn btn-success" href="javascript:void(0)" title="Result" onclick="result_report('."'".$report->id_report."'".')"><i class="glyph-icon icon-linecons-eye"></i></a>';
			$row[] = '<a class="btn btn-blue-alt" href="javascript:void(0)" title="Graph" onclick="graph_report('."'".$report->id_report."'".')"><i class="glyph-icon icon-bar-chart"></i></a>';
			$row[] = '<a class="btn btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_report('."'".$report->id_report."'".')"><i class="glyph-icon icon-linecons-pencil"></i></a>';
			$row[] = '<a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_report('."'".$report->id_report."'".')"><i class="glyph-icon icon-linecons-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->report_model->count_all(),
						"recordsFiltered" => $this->report_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->report_model->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_delete($id)
	{
		$this->report_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_add()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data = array(
				'nama_report' => $this->input->post('nama_report'),
				'tanggal_report'=> date("Y-m-d")
		);
		
		//$data['tanggal_report'] = date("Y-m-d");
		$insert = $this->report_model->save($data);
		echo json_encode(array("status" => TRUE));
			
		
	}
	public function ajax_update()
	{
		$data = array(
			'nama_report' => $this->input->post('nama_report'),
			
		);
		$this->report_model->update(array('id_report' => $this->input->post('id_report')), $data);
		echo json_encode(array("status" => TRUE));
	}
	
}