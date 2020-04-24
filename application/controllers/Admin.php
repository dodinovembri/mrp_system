<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("welcome"));
		}
		$this->load->model('User');
	}

	public function index()
	{
        $this->load->view('templates/admin/header');        
        $this->load->view('templates/admin/head');        
        $this->load->view('templates/admin/sidebar');        
        $this->load->view('dashboard/index');
        $this->load->view('templates/admin/foot');
        $this->load->view('templates/admin/footer');
	}

 	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('welcome'));
	}

	public function user()
	{
		$data['user'] = $this->User->get_user()->result();		
        $this->load->view('templates/admin/header');        
        $this->load->view('templates/admin/head');        
        $this->load->view('templates/admin/sidebar');        
        $this->load->view('user/index', $data);
        $this->load->view('templates/admin/foot');
        $this->load->view('templates/admin/footer');
	}

	public function create_user()
	{
		$data['role'] = $this->User->get_role()->result();		
        $this->load->view('templates/admin/header');        
        $this->load->view('templates/admin/head');        
        $this->load->view('templates/admin/sidebar');        
        $this->load->view('user/create', $data);
        $this->load->view('templates/admin/foot');
        $this->load->view('templates/admin/footer');
	}

	public function store_user()
	{
		$username = $this->input->post('username');
		$role_akses = $this->input->post('role_akses');
		$password = $this->input->post('password');
		$password_confirm = $this->input->post('password_confirm');

		if ($password != $password_confirm) {			 
			$this->session->set_flashdata('warning', 'Your password doesnt match.');
			redirect(base_url('admin/create_user'));		
		}else{
			$data = array(
			'username' => $username,
			'id_role' => $role_akses,
			'password' => md5($password),
			'created_by' => $this->session->set_userdata('nama'),        
			'created_at' => date('Y-m-d h:m:s')
			);

			$insert = $this->User->input_data($data,'user');
			$this->session->set_flashdata('success', 'Success add new user.');
			redirect(base_url('admin/user'));		
		}
	}
}
