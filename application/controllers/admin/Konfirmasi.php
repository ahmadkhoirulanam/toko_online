<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfirmasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_main'); 
		$this->load->model('model_konfirmasi'); 
		cek_session_admin();
	}

	function index()
	{

		$data['title'] = 'Konfirmasi';
		$data['record'] = $this->model_konfirmasi->konfirmasi();
		$this->template->load('admin/template', 'admin/konfirmasi/view_konfirmasi', $data);
	}


	 

	function edit_konfirmasi()
	{

		$id = $this->uri->segment(4);
		
		if (isset($_POST['submit'])) {
			
			$update = $this->model_konfirmasi->konfirmasi_update();
			
			if($update) {
				$this->session->set_userdata('Sukses', 'Status konfirmasi berhasil diupdate.' ); 
			 
			} else {
				$this->session->set_userdata('Gagal', 'Status konfirmasi gagal diupdate.' ); 
				 
			}
			 
			 
			redirect('admin/konfirmasi');
		} else {

			$kode_transaksi = $id;
			 
			
			$data['record'] = $this->model_app->view('rekening');

			$data['total'] = $this->db->query("SELECT a.kode_transaksi, a.kurir, a.service, a.proses, a.ongkir, sum((b.harga_jual*b.jumlah)) as total, sum(c.berat*b.jumlah) as total_berat FROM `penjualan` a JOIN penjualandetail b ON a.id_penjualan=b.id_penjualan JOIN produk c ON b.id_produk=c.id_produk where a.kode_transaksi='" . $kode_transaksi . "'")->row_array();
			
			$data['rows'] = $this->db->query("SELECT * FROM konfirmasi 
				left join penjualan ON konfirmasi.id_penjualan=penjualan.id_penjualan 
				left join rekening ON konfirmasi.id_rekening=rekening.id_rekening where konfirmasi.id_konfirmasi_pembayaran='$kode_transaksi'")->row_array();
			
			  
			
			$data['title'] = 'Edit Konfirmasi';
			//$data['rows'] = $this->model_konfirmasi->konfirmasi_edit($id)->row_array();
			$this->template->load('admin/template', 'admin/konfirmasi/view_konfirmasi_edit', $data);
		}
	}

 

	 
}
