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
		if ($this->session->userdata('role') != 3) {
			redirect(base_url('welcome'));
			if (condition) {				
				if($this->session->userdata('status') != "login"){
					redirect(base_url('welcome'));
				}
			}
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

}
