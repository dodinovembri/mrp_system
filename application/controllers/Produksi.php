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
