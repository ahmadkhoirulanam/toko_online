<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Stok extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_supplier'); 
		  
	}


	function index()
	{
	 
		
		$data['title'] = 'Lihat Stok Produk';
		$data['record'] = $this->model_app->view_ordering('produk', 'id_kategori_produk', 'ASC');
		 
		$this->template->load('supplier/template', 'supplier/stok/view_stok', $data);
	}


	 
	
	
	
}
