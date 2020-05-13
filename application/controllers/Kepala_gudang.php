<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepala_gudang extends CI_Controller {

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
		if ($this->session->userdata('role') != 3) {
			redirect(base_url('welcome'));
			if (condition) {				
				if($this->session->userdata('status') != "login"){
					redirect(base_url('welcome'));
				}
			}
		}
		$this->load->model(array('User', 'Komposisi', 'Product', 'Product_detail', 'Supp_order', 'Cust_order'));
	}

	public function index()
	{
		$data['jumlah_customer_order'] = $this->Cust_order->jumlah();
		$data['jumlah_supplier_order'] = $this->Supp_order->jumlah();
		$data['jumlah_product'] = $this->Product->jumlah();
		$data['jumlah_member'] = $this->User->jumlah();

        $this->load->view('templates/kepala_gudang/header');        
        $this->load->view('templates/kepala_gudang/head');        
        $this->load->view('templates/kepala_gudang/sidebar');        
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/kepala_gudang/foot');
        $this->load->view('templates/kepala_gudang/footer');
	}

	// for stock
	public function stock()
	{
		$data['stock'] = $this->Komposisi->get_data();

        $this->load->view('templates/kepala_gudang/header');        
        $this->load->view('templates/kepala_gudang/head');        
        $this->load->view('templates/kepala_gudang/sidebar');        
        $this->load->view('stock/index', $data);
        $this->load->view('templates/kepala_gudang/foot');
        $this->load->view('templates/kepala_gudang/footer');		
	}

	public function stock_define($id)
	{
		$data['stock'] = $this->Komposisi->getDataById($id);

        $this->load->view('templates/kepala_gudang/header');        
        $this->load->view('templates/kepala_gudang/head');        
        $this->load->view('templates/kepala_gudang/sidebar');        
        $this->load->view('stock/edit', $data);
        $this->load->view('templates/kepala_gudang/foot');
        $this->load->view('templates/kepala_gudang/footer');		
	}	

	public function store_update_stock($id)
	{

		$jumlah = $this->input->post('jumlah'); //D
		$harga = $this->input->post('harga'); //Harga per
		$biaya_pemesanan = $this->input->post('biaya_pemesanan'); //S
		$biaya_penyimpanan_blm = $this->input->post('biaya_penyimpanan'); //H		
		$biaya_penyimpanan = ($harga * $biaya_penyimpanan_blm)/100;		
		$lt = $this->input->post('lt'); //lead time
		$sl = $this->input->post('sl'); //Service level	
		$eoq_blm = (2 * $biaya_pemesanan * $jumlah)/$biaya_penyimpanan;		
		$eoq = sqrt($eoq_blm);
		$frekuensi_pemesanan = $jumlah/$eoq;
		$rop = ($jumlah/365) * $lt;
		$jml_pemakaian_perhari = $jumlah/365;
		$ss = $sl * $jml_pemakaian_perhari * $lt;					

		$data = array(
		'jumlah' => $jumlah,
		'harga' => $harga,
		'biaya_pemesanan' => $biaya_pemesanan,
		'biaya_penyimpanan' => $biaya_penyimpanan,		
		'lt' => $lt,		
		'sl' => $sl,		
		'eoq' => $eoq,				
		'frekuensi_pemesanan' => $frekuensi_pemesanan,		
		'rop' => $rop,		
		'ss' => $ss,					
		'updated_by' => $this->session->userdata('nama'),        
		'updated_at' => date('Y-m-d h:m:s')
		);

		$insert = $this->Komposisi->update_data($data, $id);
		$this->session->set_flashdata('success', 'Success update komposisi.');
		redirect(base_url('kepala_gudang/stock'));		
	}

	// for supplier order
	public function supp_order()
	{
		$data['supp_order'] = $this->Supp_order->getJoinKomposisi();						

        $this->load->view('templates/kepala_gudang/header');        
        $this->load->view('templates/kepala_gudang/head');        
        $this->load->view('templates/kepala_gudang/sidebar');        
        $this->load->view('supp_order/index_kg', $data);
        $this->load->view('templates/kepala_gudang/foot');
        $this->load->view('templates/kepala_gudang/footer');
	}

	public function create_supp_order()
	{
        $this->load->view('templates/kepala_gudang/header');        
        $this->load->view('templates/kepala_gudang/head');        
        $this->load->view('templates/kepala_gudang/sidebar');        
        $this->load->view('supp_order/create');
        $this->load->view('templates/kepala_gudang/foot');
        $this->load->view('templates/kepala_gudang/footer');		
	}

	public function store_supp_order($id)
	{
		$getdata = $this->Komposisi->getDataById($id);

		$supplier_name = $this->input->post('supplier_name');
		$telp = $this->input->post('telp');		
		$description = $this->input->post('description');		

		$data = array(
		'supplier_name' => $supplier_name,
		'telp' => $telp,			
		'description' => $description,			
		'id_komposisi' => $getdata->id,			
		'jumlah' => $getdata->eoq,			
		'created_by' => $this->session->userdata('nama'),        
		'created_at' => date('Y-m-d h:m:s')
		);

		$data_komposisi = array(
		'status' => 1, //sedang order			
		'updated_by' => $this->session->userdata('nama'),        
		'updated_at' => date('Y-m-d h:m:s')
		);		

		$insert = $this->Supp_order->input_data($data);
		$insert = $this->Komposisi->update_data($data_komposisi, $id);

		$this->session->set_flashdata('success', 'Success add new Order.');
		redirect(base_url('kepala_gudang/stock'));			
	}
}
