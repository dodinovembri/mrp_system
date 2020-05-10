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
		$this->load->model(array('User', 'Komposisi', 'Product', 'Product_detail'));
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

	public function delete_user($id)
	{
		$this->User->delete($id);	
		$this->session->set_flashdata('success', 'Success delete user.');
		redirect(base_url('admin/user'));				
	}

	public function detail_user($id)
	{
		$data['user'] = $this->User->getDataById($id);

        $this->load->view('templates/admin/header');        
        $this->load->view('templates/admin/head');        
        $this->load->view('templates/admin/sidebar');        
        $this->load->view('user/detail', $data);
        $this->load->view('templates/admin/foot');
        $this->load->view('templates/admin/footer');		
	}

	public function edit_user($id)
	{
		$data['user'] = $this->User->getDataById($id);
		$data['role'] = $this->User->get_role()->result();		
		
        $this->load->view('templates/admin/header');        
        $this->load->view('templates/admin/head');        
        $this->load->view('templates/admin/sidebar');        
        $this->load->view('user/edit', $data);
        $this->load->view('templates/admin/foot');
        $this->load->view('templates/admin/footer');		
	}

	public function store_update_user($id)
	{
		$username = $this->input->post('username');
		$role_akses = $this->input->post('role_akses');
		$password = $this->input->post('password');
		$password_confirm = $this->input->post('password_confirm');

		if ($password != $password_confirm) {			 
			$this->session->set_flashdata('warning', 'Your password doesnt match.');
			redirect(base_url('admin/edit_user'));		
		}else{
			$data = array(
			'username' => $username,
			'id_role' => $role_akses,
			'password' => md5($password),
			'created_by' => $this->session->set_userdata('nama'),        
			'created_at' => date('Y-m-d h:m:s')
			);

			$insert = $this->User->update_data($data, $id);
			$this->session->set_flashdata('success', 'Success update user.');
			redirect(base_url('admin/user'));		
		}		
	}

	// for komposisi
	public function komposisi()
	{
		$data['komposisi'] = $this->Komposisi->get_data();		

        $this->load->view('templates/admin/header');        
        $this->load->view('templates/admin/head');        
        $this->load->view('templates/admin/sidebar');        
        $this->load->view('komposisi/index', $data);
        $this->load->view('templates/admin/foot');
        $this->load->view('templates/admin/footer');
	}

	public function create_komposisi()
	{		
        $this->load->view('templates/admin/header');        
        $this->load->view('templates/admin/head');        
        $this->load->view('templates/admin/sidebar');        
        $this->load->view('komposisi/create');
        $this->load->view('templates/admin/foot');
        $this->load->view('templates/admin/footer');
	}	

	public function store_komposisi()
	{
		$komposisi_name = $this->input->post('komposisi_name');
		$satuan = $this->input->post('satuan');		

		$data = array(
		'komposisi_name' => $komposisi_name,
		'satuan' => $satuan,			
		'created_by' => $this->session->set_userdata('nama'),        
		'created_at' => date('Y-m-d h:m:s')
		);

		$insert = $this->Komposisi->input_data($data);
		$this->session->set_flashdata('success', 'Success add new komposisi.');
		redirect(base_url('admin/komposisi'));		
		
	}

	public function detail_komposisi($id)
	{
		$data['komposisi'] = $this->Komposisi->getDataById($id);

        $this->load->view('templates/admin/header');        
        $this->load->view('templates/admin/head');        
        $this->load->view('templates/admin/sidebar');        
        $this->load->view('komposisi/detail', $data);
        $this->load->view('templates/admin/foot');
        $this->load->view('templates/admin/footer');		
	}		

	public function edit_komposisi($id)
	{
		$data['komposisi'] = $this->Komposisi->getDataById($id);		
		
        $this->load->view('templates/admin/header');        
        $this->load->view('templates/admin/head');        
        $this->load->view('templates/admin/sidebar');        
        $this->load->view('komposisi/edit', $data);
        $this->load->view('templates/admin/foot');
        $this->load->view('templates/admin/footer');		
	}

	public function store_update_komposisi($id)
	{
		$komposisi_name = $this->input->post('komposisi_name');
		$satuan = $this->input->post('satuan');

		$data = array(
		'komposisi_name' => $komposisi_name,
		'satuan' => $satuan,		
		'updated_by' => $this->session->set_userdata('nama'),        
		'updated_at' => date('Y-m-d h:m:s')
		);

		$insert = $this->Komposisi->update_data($data, $id);
		$this->session->set_flashdata('success', 'Success update komposisi.');
		redirect(base_url('admin/komposisi'));				
	}

	public function delete_komposisi($id)
	{
		$this->Komposisi->delete($id);	
		$this->session->set_flashdata('success', 'Success delete komposisi.');
		redirect(base_url('admin/komposisi'));				
	}

	// for product
	public function product()
	{
		$data['product'] = $this->Product->get_data();		

        $this->load->view('templates/admin/header');        
        $this->load->view('templates/admin/head');        
        $this->load->view('templates/admin/sidebar');        
        $this->load->view('product/index', $data);
        $this->load->view('templates/admin/foot');
        $this->load->view('templates/admin/footer');
	}

	public function create_product()
	{		
        $this->load->view('templates/admin/header');        
        $this->load->view('templates/admin/head');        
        $this->load->view('templates/admin/sidebar');        
        $this->load->view('product/create');
        $this->load->view('templates/admin/foot');
        $this->load->view('templates/admin/footer');
	}	

	public function store_product()
	{
		$product_name = $this->input->post('product_name');
		$description = $this->input->post('description');		

		$data = array(
		'product_name' => $product_name,
		'description' => $description,			
		'created_by' => $this->session->set_userdata('nama'),        
		'created_at' => date('Y-m-d h:m:s')
		);

		$insert = $this->Product->input_data($data);
		$this->session->set_flashdata('success', 'Success add new product.');
		redirect(base_url('admin/product'));		
		
	}

	public function detail_product($id)
	{
		$data['product'] = $this->Product->getDataById($id);

        $this->load->view('templates/admin/header');        
        $this->load->view('templates/admin/head');        
        $this->load->view('templates/admin/sidebar');        
        $this->load->view('product/detail', $data);
        $this->load->view('templates/admin/foot');
        $this->load->view('templates/admin/footer');		
	}		

	public function edit_product($id)
	{
		$data['product'] = $this->Product->getDataById($id);		
		
        $this->load->view('templates/admin/header');        
        $this->load->view('templates/admin/head');        
        $this->load->view('templates/admin/sidebar');        
        $this->load->view('product/edit', $data);
        $this->load->view('templates/admin/foot');
        $this->load->view('templates/admin/footer');		
	}

	public function store_update_product($id)
	{
		$product_name = $this->input->post('product_name');
		$description = $this->input->post('description');

		$data = array(
		'product_name' => $product_name,
		'description' => $description,		
		'updated_by' => $this->session->set_userdata('nama'),        
		'updated_at' => date('Y-m-d h:m:s')
		);

		$insert = $this->Product->update_data($data, $id);
		$this->session->set_flashdata('success', 'Success update product.');
		redirect(base_url('admin/product'));				
	}

	public function delete_product($id)
	{
		$this->Product->delete($id);	
		$this->session->set_flashdata('success', 'Success delete product.');
		redirect(base_url('admin/product'));				
	}


	// for product detail
	public function product_detail($id){
		$data['product_detail'] = $this->Product_detail->getDataByIdAllDetail($id);		
		$data['product'] = $this->Product->getDataById($id);

        $this->load->view('templates/admin/header');        
        $this->load->view('templates/admin/head');        
        $this->load->view('templates/admin/sidebar');        
        $this->load->view('product_detail/index', $data);
        $this->load->view('templates/admin/foot');
        $this->load->view('templates/admin/footer');
	}

	public function create_product_detail($id)
	{		
		$data['komposisi'] = $this->Komposisi->get_data();
		$data['id_product'] = $id;

        $this->load->view('templates/admin/header');        
        $this->load->view('templates/admin/head');        
        $this->load->view('templates/admin/sidebar');        
        $this->load->view('product_detail/create', $data);
        $this->load->view('templates/admin/foot');
        $this->load->view('templates/admin/footer');
	}	

	public function store_product_detail($id)
	{
		$id_komposisi = $this->input->post('id_komposisi');
		$jumlah = $this->input->post('jumlah');		

		$data = array(
		'id_product' =>	$id,
		'id_komposisi' => $id_komposisi,
		'jumlah' => $jumlah,			
		'created_by' => $this->session->set_userdata('nama'),        
		'created_at' => date('Y-m-d h:m:s')
		);

		$insert = $this->Product_detail->input_data($data);
		$this->session->set_flashdata('success', 'Success add new product detail.');
		redirect(base_url('admin/product_detail/'. $id));		
		
	}

	public function detail_product_detail($id)
	{
		$data['product_detail'] = $this->Product_detail->getDataById($id);

        $this->load->view('templates/admin/header');        
        $this->load->view('templates/admin/head');        
        $this->load->view('templates/admin/sidebar');        
        $this->load->view('product_detail/detail', $data);
        $this->load->view('templates/admin/foot');
        $this->load->view('templates/admin/footer');		
	}		

	public function edit_product_detail($id)
	{
		$data['product_detail'] = $this->Product_detail->getDataById($id);		
		
        $this->load->view('templates/admin/header');        
        $this->load->view('templates/admin/head');        
        $this->load->view('templates/admin/sidebar');        
        $this->load->view('product_detail/edit', $data);
        $this->load->view('templates/admin/foot');
        $this->load->view('templates/admin/footer');		
	}

	public function store_update_product_detail($id)
	{
		$product_detail_name = $this->input->post('product_detail_name');
		$description = $this->input->post('description');

		$data = array(
		'product_detail_name' => $product_detail_name,
		'description' => $description,		
		'updated_by' => $this->session->set_userdata('nama'),        
		'updated_at' => date('Y-m-d h:m:s')
		);

		$insert = $this->Product_detail->update_data($data, $id);
		$this->session->set_flashdata('success', 'Success update product_detail.');
		redirect(base_url('admin/product_detail'));				
	}

	public function delete_product_detail($id)
	{
		$this->Product_detail->delete($id);	
		$this->session->set_flashdata('success', 'Success delete product_detail.');
		redirect(base_url('admin/product_detail'));				
	}

}
