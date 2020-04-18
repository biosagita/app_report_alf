<?php
Class Result_model extends CI_Model
{
    var $table = 'report';
    var $column_order = array('nama_report','tanggal_report'); //set column field database for datatable orderable
    var $column_search = array('nama_report'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id_report' => 'desc'); // default order 

    public function __construct()
	{
        parent::__construct();
		$this->load->database();
    }
    
}