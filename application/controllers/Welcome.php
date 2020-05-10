<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();		
		$this->load->model('LoginModel');
 
	}

	public function index()
	{
        $this->load->view('templates/login/header');        
        $this->load->view('login/index');
        $this->load->view('templates/login/footer');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->LoginModel->cek_login("user", $where)->num_rows();
		$role = $this->LoginModel->cek_login("user", $where)->row();		
		if($cek > 0){

 			if ($role->id_role == 1) { 				
 				$data_session = array(
					'nama' => $username,
					'status' => "login",
					'role' => 1
					);
				$this->session->set_userdata($data_session);
				redirect(base_url("admin"));
 			}elseif ($role->id_role == 2) {
				$data_session = array(
					'nama' => $username,
					'status' => "login",
					'role' => 2
					);
				$this->session->set_userdata($data_session); 				
				redirect(base_url("pimpinan")); 				
 			}elseif ($role->id_role == 3) {
				$data_session = array(
					'nama' => $username,
					'status' => "login",
					'role' => 3
					);
				$this->session->set_userdata($data_session);	 				
				redirect(base_url("kepala_gudang")); 				 				
 			}else{
 				redirect(base_url());
 			}
 
		}else{
			redirect(base_url("admin"));
		}
	}	
}
