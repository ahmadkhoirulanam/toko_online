<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tracking extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_main'); 
		cek_session_admin();
	}

 

	function tracking()
	{
		cek_session_members();
		if ($this->uri->segment(3) != '') {
			$kode_transaksi = filter($this->uri->segment(3));
			$data['title'] = 'Tracking Order ' . $kode_transaksi;
			$data['rows'] = $this->db->query("SELECT * FROM penjualan a JOIN pengguna b ON a.id_pembeli=b.id_pengguna JOIN alamat c ON b.id_alamat=c.id_alamat JOIN kota d ON c.id_kota=d.kota_id where a.kode_transaksi='$kode_transaksi'")->row_array();
			
			$data['record'] = $this->db->query("SELECT a.kode_transaksi, b.*, c.nama_produk, c.satuan, c.berat, c.diskon, c.produk_seo FROM `penjualan` a JOIN penjualandetail b ON a.id_penjualan=b.id_penjualan JOIN produk c ON b.id_produk=c.id_produk where a.kode_transaksi='" . $kode_transaksi . "'");
			
			$data['total'] = $this->db->query("SELECT a.id_penjualan, a.kode_transaksi, a.kurir, a.resi, a.service, a.proses, a.ongkir, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total, sum(c.berat*b.jumlah) as total_berat FROM `penjualan` a JOIN penjualandetail b ON a.id_penjualan=b.id_penjualan JOIN produk c ON b.id_produk=c.id_produk where a.kode_transaksi='" . $kode_transaksi . "'")->row_array();

			$this->template->load('admin/template', 'admin/penjualan/view_tracking', $data);
		}
	}


 
}
