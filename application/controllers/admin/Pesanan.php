<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
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
		$data['title'] = 'Pesanan Masuk';
		$data['record'] = $this->model_app->orders_report_all();
		$this->template->load('admin/template', 'admin/penjualan/view_pesanan', $data);
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

			$this->template->load('admin/template', 'admin/penjualan/view_tracking', $data);
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

	function konfirmasi()
	{
		cek_session_admin();
		$data['title'] = 'Konfirmasi Pembayaran Pesanan';
		$data['record'] = $this->model_app->konfirmasi_bayar();
		$this->template->load('admin/template', 'admin/penjualan/view_konfirmasi_bayar', $data);
	}

	function pesanan_status()
	{
		$data = array('proses' => $this->uri->segment(5));
		$where = array('id_penjualan' => $this->uri->segment(4));
		$this->model_app->update('penjualan', $data, $where);
		redirect('admin/pesanan');
	}

	function pesanan_status2()
	{

		$kode = $this->uri->segment(6);
		$data = array('proses' => $this->uri->segment(5));
		$where = array('id_penjualan' => $this->uri->segment(4));
		$this->model_app->update('penjualan', $data, $where);
		redirect('admin/pesanan/tracking/' . $kode);
	}

	function pesanan_dikirim()
	{
		$data = array('proses' => $this->uri->segment(5));
		$where = array('id_penjualan' => $this->uri->segment(4));
		$this->model_app->update('penjualan', $data, $where);
		$data['title'] = 'Input Resi';
		$query = $this->model_app->edit('penjualan', array('id_penjualan' => $this->uri->segment(4)))->row_array();
		$data = array('rows' => $query);


		$data['title'] = 'Masukan Resi';
		$this->template->load('admin/template', 'admin/penjualan/view_resi', $data);
	}

	function pesanan_dikirim2()
	{

		$data = array('proses' => $this->uri->segment(5));
		$where = array('id_penjualan' => $this->uri->segment(4));
		$this->model_app->update('penjualan', $data, $where);
		$data['title'] = 'Input Resi';
		$query = $this->model_app->edit('penjualan', array('id_penjualan' => $this->uri->segment(3)))->row_array();
		$data = array('rows' => $query);

		$data['title'] = 'Masukan Resi';
		$this->template->load('admin/template', 'admin/penjualan/view_resi', $data);
	}

	function resi()
	{

		$kode = $this->input->post('kode');
		$uri2 = $this->input->post('uri2');
		$id = $this->input->post('id');
		
		
		if (isset($_POST['submit'])) {
			$data = array('resi' => $this->input->post('resi'));
			$where = array('id_penjualan' => $id);
			$this->model_app->update('penjualan', $data, $where);

			$data1 = array(
				'proses'    => '3'
			);
			$this->db->where('id_penjualan', $id);
			$this->db->update('penjualan', $data1);

			if ($uri2 == 'pesanan_dikirim2') {
				redirect('admin/pesanan/tracking/' . $kode);
			} else {
				redirect('admin/pesanan');
			}
		}
	}

	
	
	
}
