<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Retur extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_main'); 
		$this->load->model('model_identitas'); 
		cek_session_admin();
	}

	 
	function index()
	{
		$data['title'] = 'Retur Produk';
		$data['record'] = $this->model_app->retur_report_all();
		$this->template->load('admin/template', 'admin/retur/view_retur', $data);
	}



	function tracking()
	{
		cek_session_admin();
		if ($this->uri->segment(4) != '') {
			$kode_transaksi = filter($this->uri->segment(4));
			$data['title'] = 'Tracking Order ' . $kode_transaksi;
			$data['rows'] = $this->db->query("SELECT * FROM penjualan a JOIN pengguna b ON a.id_pembeli=b.id_pengguna JOIN alamat c ON b.id_alamat=c.id_alamat JOIN kota d ON c.id_kota=d.kota_id where a.kode_transaksi='$kode_transaksi'")->row_array();
			
			$data['record'] = $this->db->query("SELECT a.kode_transaksi, b.*, c.nama_produk, c.satuan, c.berat, c.diskon, c.produk_seo FROM `penjualan` a JOIN penjualandetail b ON a.id_penjualan=b.id_penjualan JOIN produk c ON b.id_produk=c.id_produk where a.kode_transaksi='" . $kode_transaksi . "'");
			
			$data['total'] = $this->db->query("SELECT a.id_penjualan, a.kode_transaksi, a.kurir, a.resi, a.service, a.proses, a.ongkir, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total, sum(b.berat_satuan*b.jumlah) as total_berat FROM `penjualan` a JOIN penjualandetail b ON a.id_penjualan=b.id_penjualan JOIN produk c ON b.id_produk=c.id_produk where a.kode_transaksi='" . $kode_transaksi . "'")->row_array();

				$data['retur'] = $this->db->query("SELECT a.kode_retur, a.status_retur as status_retur, a.video_unboxing as video_unboxing, b.*, b.alasan_retur as alasan_retur, c.nama_produk, c.satuan, c.berat, c.diskon, c.produk_seo FROM `retur` a JOIN returdetail b ON a.id_retur=b.id_retur JOIN produk c ON b.id_produk=c.id_produk where a.kode_retur='" . $kode_transaksi . "'");
				
				$data['totalretur'] = $this->db->query("SELECT a.*, b.*, c.* FROM `retur` a JOIN returdetail b ON a.id_retur=b.id_retur JOIN produk c ON b.id_produk=c.id_produk where a.kode_retur='" . $kode_transaksi . "'")->row_array();
				
			$this->template->load('admin/template', 'admin/retur/view_tracking', $data);
		}
	}





	function print_pesanan()
	{
		cek_session_admin();
		$data['title'] = 'Laporan Pesanan Masuk';
		$data['record'] = $this->model_app->orders_report_all();
		$data['iden'] = $this->model_identitas->identitas()->row_array();
		$this->load->view('admin/penjualan/view_orders_report_print', $data);
	}

 

	function retur_status()
	{
		$data = array('status_retur' => $this->uri->segment(5));
		$where = array('id_retur' => $this->uri->segment(4));
		$this->model_app->update('retur', $data, $where);
		redirect('admin/retur');
	}

	function retur_status2()
	{

		$kode = $this->uri->segment(6);
		$data = array('status_retur' => $this->uri->segment(5));
		$where = array('id_retur' => $this->uri->segment(4));
		$this->model_app->update('retur', $data, $where);
		redirect('admin/retur/tracking/' . $kode);
	}

	  

	
	
	
}
