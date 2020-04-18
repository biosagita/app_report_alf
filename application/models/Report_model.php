<?php
Class Report_model extends CI_Model
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
    
    private function _get_datatables_query()
    {        
        $this->db->from($this->table);
        $i = 0;
    
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                $value = $_POST['search']['value'];
                if($i===0) // first loop
                {
                //  $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                 //   $this->db->like($item, $_POST['search']['value']);
                 $where  = "($item LIKE '%$value%'";
                    
                }
                else
                {
                  //  $this->db->or_like($item, $_POST['search']['value']);
                 $where  .= "OR $item  LIKE '%$value%'";
                }

                if(count($this->column_search) - 1 == $i) //last loop
                {
                    //  $this->db->group_end(); //close bracket
                    $where  .=")";
                    $this->db->where($where);
                }
               
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
       
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->select('id_report,nama_report,tanggal_report');
        $this->db->from($this->table);
        $this->db->where('id_report',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        //$tabel='tabel';
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_report', $id);
        $this->db->delete($this->table);
    }



}