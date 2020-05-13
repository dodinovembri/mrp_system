<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan extends CI_Controller {

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
		if ($this->session->userdata('role') != 2) {
			redirect(base_url('welcome'));
			if (condition) {				
				if($this->session->userdata('status') != "login"){
					redirect(base_url('welcome'));
				}
			}
		}
		$this->load->model(array('User', 'Komposisi', 'Product', 'Product_detail', 'Cust_order', 'Cust_order_detail', 'Supp_order', 'Cust_order'));
	}

	public function index()
	{
		$data['jumlah_customer_order'] = $this->Cust_order->jumlah();
		$data['jumlah_supplier_order'] = $this->Supp_order->jumlah();
		$data['jumlah_product'] = $this->Product->jumlah();
		$data['jumlah_member'] = $this->User->jumlah();

        $this->load->view('templates/pimpinan/header');        
        $this->load->view('templates/pimpinan/head');        
        $this->load->view('templates/pimpinan/sidebar');        
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/pimpinan/foot');
        $this->load->view('templates/pimpinan/footer');
	}

	// for cust_order
	public function cust_order()
	{
		$data['cust_order'] = $this->Cust_order->cust_order_join_product();		

        $this->load->view('templates/pimpinan/header');        
        $this->load->view('templates/pimpinan/head');        
        $this->load->view('templates/pimpinan/sidebar');        
        $this->load->view('cust_order/index_pimpinan', $data);
        $this->load->view('templates/pimpinan/foot');
        $this->load->view('templates/pimpinan/footer');
	}	

	// for product cust_order_detail
	public function cust_order_detail($id){
		$data['order_detail'] = $this->Cust_order_detail->getDetailorder($id);		
		$cust_order = $this->Cust_order->getOrder($id);		
		$data['product'] = $this->Product->getDataById($cust_order->id_product);

        $this->load->view('templates/pimpinan/header');        
        $this->load->view('templates/pimpinan/head');        
        $this->load->view('templates/pimpinan/sidebar');        
        $this->load->view('cust_order_detail/index', $data);
        $this->load->view('templates/pimpinan/foot');
        $this->load->view('templates/pimpinan/footer');
	}	

	// for supp order
	public function supp_order(){
		$data['supp_order'] = $this->Supp_order->getJoinKomposisi();				

        $this->load->view('templates/pimpinan/header');        
        $this->load->view('templates/pimpinan/head');        
        $this->load->view('templates/pimpinan/sidebar');        
        $this->load->view('supp_order/index_pimpinan', $data);
        $this->load->view('templates/pimpinan/foot');
        $this->load->view('templates/pimpinan/footer');
	}

	// for stock
	public function stock()
	{
		$data['stock'] = $this->Komposisi->get_data();

        $this->load->view('templates/pimpinan/header');        
        $this->load->view('templates/pimpinan/head');        
        $this->load->view('templates/pimpinan/sidebar');        
        $this->load->view('stock/index_pimpinan', $data);
        $this->load->view('templates/pimpinan/foot');
        $this->load->view('templates/pimpinan/footer');		
	}	
}
