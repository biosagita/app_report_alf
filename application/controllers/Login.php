<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		//$this->load->helper('resize_image');
        $this->load->model('login_model');
	//	$this->load->helper(array('form', 'url'));
	//	$this->load->library('form_validation');
	
    }

	public function index(){
        
        if($this->session->userdata('is_login')==TRUE)
          {
			  echo "login";
          redirect('report','refresh');
          }
		//$this->load->view('header');
		$data=array('warning' => '');
		//$this->load->view('backend/login',$data);
		echo "gagal";
        $this->load->view('login_view', $data);
	}

	public function gagal($id=''){
	
		$data=array('warning' => 'Nama atau Kata Kunci tidak sesuai'.$id,);
		$this->load->view('login_view',$data);
	}
	public function login_proses() {
	

	$this->form_validation->set_rules('user', 'Nama Pengguna', 'required');
	$this->form_validation->set_rules('password', 'Kata Kunci', 'required');

    if ($this->form_validation->run() == TRUE) {
    	
          if($this->login_model->m_cek_user()->num_rows()==1) {
          
             $db=$this->login_model->m_cek_user()->row();
             if($this->hash_verified($this->input->post('password'),$db->password)) {
					//echo "ok";
                     $data_login=array('is_login'=>TRUE,
                             'email'  =>$db->email,
                             'nama'   =>$db->nama);
             
                     $this->session->set_userdata($data_login);
                     redirect('report','refresh');

                        } else {
							$this->gagal(1);
							echo "gagal1";

                        }

          } else { // jika nama tidak terdaftar!
			
			$this->gagal(2);
			echo "gagal2";
         
          }

    } else { 
		$this->gagal(3);
			echo "gagal3";
    }
	}


	public function logout() {

		$this->session->unset_userdata('is_login');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('email');

		session_destroy();
		//$this->session->set_flashdata('pesan', 'Sign Out Berhasil!');
		redirect('login','refresh');
	}

	function get_hash($PlainPassword)
    {

    	$option=[
                'cost'=>5,// proses hash sebanyak: 2^5 = 32x
    	        ];
    	return password_hash($PlainPassword, PASSWORD_DEFAULT, $option);

   	}
	
 	function hash_verified($PlainPassword,$HashPassword)
   	{

	   return password_verify($PlainPassword,$HashPassword) ? true : false;

   	}

	

}