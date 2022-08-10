<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_main'); 
		$this->load->model('model_laporan'); 
		$this->load->helper('cek'); 
		cek_session_admin();
	}

	  
 
	function index()
	{
		   
		$data['title'] = 'Laporan Stok';
		 
		$data['record'] = $this->model_app->view_ordering('produk', 'nama_produk', 'ACS');
		$this->template->load('admin/template', 'admin/laporan/view_lap_stok', $data);
	}
	
	

	function laporanpdf()
	{
		
		 
		$data['record'] = $this->model_app->view_ordering('produk', 'nama_produk', 'ACS');
		 
		$this->load->library('pdf');

			$this->pdf->setPaper('A4', 'landscape');
			$this->pdf->filename = "Laporan Stok ".date("Y-m-d").".pdf";
			$this->pdf->load_view('admin/laporan/view_lap_stok_pdf',$data);
		 

 
	}

	
	
	 

	 
}
