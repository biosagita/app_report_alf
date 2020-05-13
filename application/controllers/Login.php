<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('is_login') == true) {
            echo "login";
            redirect('report', 'refresh');
        }
        $data = array('warning' => '');
        $this->load->view('login_view', $data);
    }

    public function gagal($id = '')
    {
        $data = array('warning' => 'Nama atau Kata Kunci tidak sesuai' . $id);
        $this->load->view('login_view', $data);
	}
	
    public function login_proses()
    {
        $this->form_validation->set_rules('user', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('password', 'Kata Kunci', 'required');
        if ($this->form_validation->run() == true) {
			$result = $this->login_model->m_cek_user()->result();
            if (!empty($result)) {
				$data_login = array('is_login' => true,
					'email' => $result[0]->email,
					'nama' => $result[0]->nama);
				$this->session->set_userdata($data_login);
				redirect('report', 'refresh');
            }
		}
		$this->gagal();
    }

    public function logout()
    {
        $this->session->unset_userdata('is_login');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        session_destroy();
        redirect('login', 'refresh');
    }
}