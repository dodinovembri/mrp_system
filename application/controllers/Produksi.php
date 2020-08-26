<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {

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
		if ($this->session->userdata('role') != 4) {
			redirect(base_url('welcome'));						
				if($this->session->userdata('status') != "login"){
					redirect(base_url('welcome'));
				}			
		}
		$this->load->model(array('User', 'Komposisi', 'Product', 'Product_detail', 'Cust_order', 'Cust_order_detail', 'Supp_order'));
	}

	public function index()
	{
		$data['jumlah_customer_order'] = $this->Cust_order->jumlah();
		$data['jumlah_supplier_order'] = $this->Supp_order->jumlah();
		$data['jumlah_product'] = $this->Product->jumlah();
		$data['jumlah_member'] = $this->User->jumlah();

        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');
	}

 	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('welcome'));
	}

	public function user()
	{		
		$data['user'] = $this->User->get_user()->result();		

        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('user/index', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');
	}

	public function create_user()
	{
		$data['role'] = $this->User->get_role()->result();		
        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('user/create', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');
	}

	public function store_user()
	{
		$username = $this->input->post('username');
		$role_akses = $this->input->post('role_akses');
		$password = $this->input->post('password');
		$password_confirm = $this->input->post('password_confirm');

		if ($password != $password_confirm) {			 
			$this->session->set_flashdata('warning', 'Your password doesnt match.');
			redirect(base_url('produksi/create_user'));		
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
			redirect(base_url('produksi/user'));		
		}
	}

	public function delete_user($id)
	{
		$this->User->delete($id);	
		$this->session->set_flashdata('success', 'Success delete user.');
		redirect(base_url('produksi/user'));				
	}

	public function detail_user($id)
	{
		$data['user'] = $this->User->getDataById($id);

        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('user/detail', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');		
	}

	public function edit_user($id)
	{
		$data['user'] = $this->User->getDataById($id);
		$data['role'] = $this->User->get_role()->result();		
		
        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('user/edit', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');		
	}

	public function store_update_user($id)
	{
		$username = $this->input->post('username');
		$role_akses = $this->input->post('role_akses');
		$password = $this->input->post('password');
		$password_confirm = $this->input->post('password_confirm');

		if ($password != $password_confirm) {			 
			$this->session->set_flashdata('warning', 'Your password doesnt match.');
			redirect(base_url('produksi/edit_user'));		
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
			redirect(base_url('produksi/user'));		
		}		
	}

	// for komposisi
	public function komposisi()
	{
		$data['komposisi'] = $this->Komposisi->get_data();		

        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('komposisi/index', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');
	}

	public function create_komposisi()
	{		
        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('komposisi/create');
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');
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
		redirect(base_url('produksi/komposisi'));		
		
	}

	public function detail_komposisi($id)
	{
		$data['komposisi'] = $this->Komposisi->getDataById($id);

        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('komposisi/detail', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');		
	}		

	public function edit_komposisi($id)
	{
		$data['komposisi'] = $this->Komposisi->getDataById($id);		
		
        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('komposisi/edit', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');		
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
		redirect(base_url('produksi/komposisi'));				
	}

	public function delete_komposisi($id)
	{
		$this->Komposisi->delete($id);	
		$this->session->set_flashdata('success', 'Success delete komposisi.');
		redirect(base_url('produksi/komposisi'));				
	}

	// for product
	public function product()
	{
		$data['product'] = $this->Product->get_data();		

        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('product/index', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');
	}

	public function create_product()
	{		
        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('product/create');
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');
	}	

	public function store_product()
	{
		$product_name = $this->input->post('product_name');
		$description = $this->input->post('description');		
		$price = $this->input->post('price');		

		$data = array(
		'product_name' => $product_name,
		'description' => $description,			
		'price' => $price,			
		'created_by' => $this->session->set_userdata('nama'),        
		'created_at' => date('Y-m-d h:m:s')
		);

		$insert = $this->Product->input_data($data);
		$this->session->set_flashdata('success', 'Success add new product.');
		redirect(base_url('produksi/product'));		
		
	}

	public function detail_product($id)
	{
		$data['product'] = $this->Product->getDataById($id);

        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('product/detail', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');		
	}		

	public function edit_product($id)
	{
		$data['product'] = $this->Product->getDataById($id);		
		
        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('product/edit', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');		
	}

	public function store_update_product($id)
	{
		$product_name = $this->input->post('product_name');
		$price = $this->input->post('price');
		$description = $this->input->post('description');

		$data = array(
		'product_name' => $product_name,
		'price' => $price,		
		'description' => $description,		
		'updated_by' => $this->session->set_userdata('nama'),        
		'updated_at' => date('Y-m-d h:m:s')
		);

		$insert = $this->Product->update_data($data, $id);
		$this->session->set_flashdata('success', 'Success update product.');
		redirect(base_url('produksi/product'));				
	}

	public function delete_product($id)
	{
		$this->Product->delete($id);	
		$this->session->set_flashdata('success', 'Success delete product.');
		redirect(base_url('produksi/product'));				
	}


	// for product detail
	public function product_detail($id){
		$data['product_detail'] = $this->Product_detail->getDataByIdAllDetail($id);		
		$data['product'] = $this->Product->getDataById($id);

        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('product_detail/index', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');
	}

	public function create_product_detail($id)
	{		
		$data['komposisi'] = $this->Komposisi->get_data();
		$data['id_product'] = $id;

        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('product_detail/create', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');
	}	

	public function store_product_detail($id)
	{
		$id_komposisi = $this->input->post('id_komposisi');
		$jumlah = $this->input->post('jumlah');					

		$data = array(
		'id_product' =>	$id,
		'id_komposisi' => $id_komposisi,
		'jumlah' => $jumlah,					
		'created_by' => print $this->session->set_userdata('nama'),        
		'created_at' => date('Y-m-d h:m:s')
		);

		$insert = $this->Product_detail->input_data($data);
		$this->session->set_flashdata('success', 'Success add new product detail.');
		redirect(base_url('produksi/product_detail/'. $id));		
		
	}

	public function detail_product_detail($id, $product_id)
	{
		$data['product_detail'] = $this->Product_detail->getDataById($id);
		$data['id_product'] = $product_id;		

        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('product_detail/detail', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');		
	}		

	public function edit_product_detail($id, $product_id)
	{
		$data['product_detail'] = $this->Product_detail->pd_join_komposisi($id);		
		// $data['komposisi'] = $this->Komposisi->get_data();
		$data['product_id'] = $product_id;
		
        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('product_detail/edit', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');		
	}

	public function store_update_product_detail($id, $product_id)
	{
		// $id_komposisi = $this->input->post('id_komposisi');
		$jumlah = $this->input->post('jumlah');

		$data = array(
		// 'id_komposisi' => $id_komposisi,
		'jumlah' => $jumlah,		
		'updated_by' => print $this->session->set_userdata('nama'),        
		'updated_at' => date('Y-m-d h:m:s')
		);

		$insert = $this->Product_detail->update_data($data, $id);
		$this->session->set_flashdata('success', 'Success update product_detail.');		

		redirect(base_url('produksi/product_detail/'. $product_id));				
	}

	public function delete_product_detail($id, $product_id)
	{
		$this->Product_detail->delete($id);	
		$this->session->set_flashdata('success', 'Success delete product detail.');
		redirect(base_url('produksi/product_detail/'. $product_id));				
	}

	// for cust_order
	public function cust_order()
	{
		$data['cust_order'] = $this->Cust_order->cust_order_join_product();		

        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('cust_order/index', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');
	}

	public function create_cust_order()
	{		
		$data['product'] = $this->Product->get_data();		

        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('cust_order/create', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');
	}	

	public function store_cust_order()
	{
		$cust_name = $this->input->post('cust_name');
		$id_product = $this->input->post('id_product');		
		$jumlah = $this->input->post('jumlah');		

		$price_db = $this->Product->getDataById($id_product);
		$price_total = $jumlah * $price_db->price;		

		$data = array(
		'cust_name' => $cust_name,
		'id_product' => $id_product,			
		'jumlah' => $jumlah,	
		'price' => $price_total,		
		'created_by' => $this->session->userdata('nama'),        
		'created_at' => date('Y-m-d h:m:s')
		);
		$insert = $this->Cust_order->input_data($data);		

		$get_komposisi = $this->Product_detail->getDataByIdAllDetail($id_product);
		foreach ($get_komposisi as $key => $value) {
			$getstockcurrent = $this->Komposisi->getDataById($value->id_komposisi);
			if ($getstockcurrent->stock < ($jumlah * $value->jumlah)) {
				$this->Cust_order_detail->delete_by_id($insert);				
				$this->Cust_order->delete($insert);
				$this->session->set_flashdata('success', 'Product quantity is not enough.');
				redirect(base_url('produksi/cust_order'));	
			}else{
				$stocknow = $getstockcurrent->stock - ($jumlah * $value->jumlah);
				$data_komposisi = array(
					'stock' => $stocknow,
					'updated_by' => $this->session->userdata('nama'),        
					'updated_at' => date('Y-m-d h:m:s')					
				);

				$data = array(
					'id_customer_order' => $insert,
					'id_product' => $id_product,			
					'id_komposisi' => $value->id_komposisi,			
					'jumlah' => $jumlah * $value->jumlah,								
					'created_by' => print $this->session->userdata('nama'),        
					'created_at' => date('Y-m-d h:m:s')
				);
			}							
			$updatestock = $this->Komposisi->update_data($data_komposisi, $getstockcurrent->id);	
			$insert_detail = $this->Cust_order_detail->input_data($data);	
		}
		$this->session->set_flashdata('success', 'Success add new cust order.');
		redirect(base_url('produksi/cust_order'));		
		
	}

	public function detail_cust_order($id)
	{
		$data['cust_order'] = $this->Cust_order->getDataById($id);

        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('cust_order/detail', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');		
	}		

	public function edit_cust_order($id)
	{
		$data['cust_order'] = $this->Cust_order->getDataById($id);		
		$data['product'] = $this->Product->get_data();		
		
        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('cust_order/edit', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');		
	}

	public function store_update_cust_order($id)
	{
		$cust_name = $this->input->post('cust_name');
		$id_product = $this->input->post('id_product');		
		$jumlah = $this->input->post('jumlah');	

		$data = array(
		'cust_name' => $cust_name,
		'id_product' => $id_product,		
		'jumlah' => $jumlah,		
		'updated_by' => $this->session->set_userdata('nama'),        
		'updated_at' => date('Y-m-d h:m:s')
		);

		$insert = $this->Cust_order->update_data($data, $id);
		$this->session->set_flashdata('success', 'Success update customer order.');
		redirect(base_url('produksi/cust_order'));				
	}

	public function delete_cust_order($id)
	{
		$this->Cust_order->delete($id);	
		$this->session->set_flashdata('success', 'Success delete cust_order.');
		redirect(base_url('produksi/cust_order'));				
	}

// for product cust_order_detail
	public function cust_order_detail($id){
		$data['order_detail'] = $this->Cust_order_detail->getDetailorder($id);		
		$cust_order = $this->Cust_order->getOrder($id);		
		$data['product'] = $this->Product->getDataById($cust_order->id_product);

        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('cust_order_detail/index', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');
	}

	// for supp order
	public function supp_order(){
		$data['supp_order'] = $this->Supp_order->getJoinKomposisi();				

        $this->load->view('templates/produksi/header');        
        $this->load->view('templates/produksi/head');        
        $this->load->view('templates/produksi/sidebar');        
        $this->load->view('produksi/index', $data);
        $this->load->view('templates/produksi/foot');
        $this->load->view('templates/produksi/footer');
	}	

	public function store_edit_supp_order($id, $id_product)
	{
		$status = $this->input->post('status');

			$data_komposisi = array(
			'status' => $status, //data sudah di order						
			'updated_by' => $this->session->set_userdata('nama'),        
			'updated_at' => date('Y-m-d h:m:s')
			);			

		$insert = $this->Supp_order->update_data($data_komposisi, $id);
		

		$this->session->set_flashdata('success', 'Success update customer order.');
		redirect(base_url('produksi/supp_order'));				
	}	

}
