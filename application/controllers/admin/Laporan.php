<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
		
		if($this->input->post('tglawal')=="") {
			$data['tglAwal'] = date("Y-m-01");
		} else {
			$data['tglAwal'] = $this->input->post('tglawal');
		}
		
		if($this->input->post('tglakhir')=="") {
			$data['tglAkhir'] = date("Y-m-d");
		} else {
			$data['tglAkhir'] = $this->input->post('tglakhir');
		}
		
		  
		$data['title'] = 'Laporan Penjualan';
		$data['record'] = $this->model_laporan->laporan($data['tglAwal'],$data['tglAkhir']);
		$this->template->load('admin/template', 'admin/laporan/view_lap_penjualan', $data);
	}
	
	

	function laporanpdf()
	{
		
		 
		$data['tglAwal'] = $this->input->get('tglawal');
		$data['tglAkhir'] = $this->input->get('tglakhir');
		 
		  
		$data['title'] = 'Laporan Penjualan';
		$data['record'] = $this->model_laporan->laporan($data['tglAwal'],$data['tglAkhir']);
			
		$data['tglAwal'] = tgl_indo($this->input->get('tglawal'));
		$data['tglAkhir'] = tgl_indo($this->input->get('tglakhir'));
		
	 
		 
		$this->load->library('pdf');

			$this->pdf->setPaper('A4', 'potrait');
			$this->pdf->filename = "Laporan Penjualan ".$data['tglAwal']." sd ".$data['tglAkhir'].".pdf";
			$this->pdf->load_view('admin/laporan/view_lap_penjualan_pdf',$data);
		 

 
	}

	
	
	 

	 
}
