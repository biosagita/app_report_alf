<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {


	public function m_register() {

        $data = array('nama' =>$this->input->post('nama'),
                      'email'=>$this->input->post('email'),
                      'password'=>get_hash($this->input->post('password')));

        return $this->db->insert('user',$data);

	}

     public function m_cek_user() {

     return $this->db->get_where('user',array('nama' => $this->input->post('user')));

     }	

}