<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Retur extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_halaman');
	}

	function index()
	{
		
		
		 if (isset($_GET['inv'])) {

			$kode_transaksi = $_GET['inv'];
			$cek = $this->model_app->view_where('penjualan', array('kode_transaksi' => $kode_transaksi));
			$row = $this->db->query("SELECT id_penjualan FROM `penjualan` where kode_transaksi='$kode_transaksi'")->row_array();
			$data['record'] = $this->db->query("SELECT a.kode_transaksi, b.*, c.nama_produk, c.satuan, c.berat, c.diskon, c.produk_seo FROM `penjualan` a JOIN penjualandetail b ON a.id_penjualan=b.id_penjualan JOIN produk c ON b.id_produk=c.id_produk where a.kode_transaksi='" . $kode_transaksi . "'");
				
				$data['total'] = $this->db->query("SELECT a.kode_transaksi, a.resi, a.kurir, a.service, a.proses, a.ongkir, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total, sum(c.berat*b.jumlah) as total_berat FROM `penjualan` a JOIN penjualandetail b ON a.id_penjualan=b.id_penjualan JOIN produk c ON b.id_produk=c.id_produk where a.kode_transaksi='" . $kode_transaksi . "'")->row_array();
			
			 
			$data['ksm'] = $this->model_app->view_where('pengguna', array('id_pengguna' => $this->session->id_pengguna))->row_array();

			$data['kode_transaksi'] = $_GET['inv'];
				$data['rows'] = $this->db->query("SELECT * FROM penjualan a JOIN pengguna b ON a.id_pembeli=b.id_pengguna JOIN alamat c ON b.id_alamat=c.id_alamat JOIN kota d ON c.id_kota=d.kota_id where a.kode_transaksi='$kode_transaksi'")->row_array();

			$data['title'] = 'Retur Produk';
			$data['breadcrumb'] = 'Retur Produk';
			$data['halamans'] = $this->model_halaman->halaman()->result();
			$this->template->load('home/template', 'home/produk/view_retur', $data);
			
		} else if (isset($_GET['ret'])) {

			$kode_transaksi = $_GET['ret'];
			$cek = $this->model_app->view_where('penjualan', array('kode_transaksi' => $kode_transaksi));
			$row = $this->db->query("SELECT id_penjualan FROM `penjualan` where kode_transaksi='$kode_transaksi'")->row_array();
			$data['record'] = $this->db->query("SELECT a.kode_transaksi, b.*, c.nama_produk, c.satuan, c.berat, c.diskon, c.produk_seo FROM `penjualan` a JOIN penjualandetail b ON a.id_penjualan=b.id_penjualan JOIN produk c ON b.id_produk=c.id_produk where a.kode_transaksi='" . $kode_transaksi . "'");
				
				$data['total'] = $this->db->query("SELECT a.kode_transaksi, a.resi, a.kurir, a.service, a.proses, a.ongkir, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total, sum(c.berat*b.jumlah) as total_berat FROM `penjualan` a JOIN penjualandetail b ON a.id_penjualan=b.id_penjualan JOIN produk c ON b.id_produk=c.id_produk where a.kode_transaksi='" . $kode_transaksi . "'")->row_array();
			
			$data['recordretur'] = $this->db->query("SELECT a.kode_retur, a.video_unboxing, a.status_retur, b.*, c.nama_produk, c.satuan, c.berat, c.diskon, c.produk_seo FROM `retur` a JOIN returdetail b ON a.id_retur=b.id_retur JOIN produk c ON b.id_produk=c.id_produk where a.kode_retur='" . $kode_transaksi . "'");
			 
			$data['ksm'] = $this->model_app->view_where('pengguna', array('id_pengguna' => $this->session->id_pengguna))->row_array();

			$data['kode_transaksi'] = $_GET['ret'];
				$data['rows'] = $this->db->query("SELECT * FROM penjualan a JOIN pengguna b ON a.id_pembeli=b.id_pengguna JOIN alamat c ON b.id_alamat=c.id_alamat JOIN kota d ON c.id_kota=d.kota_id where a.kode_transaksi='$kode_transaksi'")->row_array();

			$data['title'] = 'Retur Produk';
			$data['breadcrumb'] = 'Retur Produk';
			$data['halamans'] = $this->model_halaman->halaman()->result();
			$this->template->load('home/template', 'home/produk/view_retur_status', $data);
			
		} else {
			 
			 
				 
				$kode_transaksi = filter($this->input->post('a'));
				$cek = $this->model_app->view_where('penjualan', array('kode_transaksi' => $kode_transaksi));
				
				$kode = $this->input->post('a');
				$config['upload_path'] = 'assets/images/bukti/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = '2000'; // kb
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('userfile')) {
					$this->session->set_flashdata('message', $this->upload->display_errors());
					redirect('retur?inv=' . $kode);
				} else {
					$hasil = $this->upload->data();
					//kode_retur	waktu_transaksi	id_penjualan	video_unboxing	status_retur 	
 
					$data = array(
						'kode_retur' => $this->input->post('a'),
						'waktu_transaksi' => date("Y-m-d H:i:s"),
						'id_penjualan' => $this->input->post('id'),
						'video_unboxing' => $hasil['file_name'],
						'status_retur' => 'Baru',
						);
					$this->db->insert('retur', $data);
					 
					
					$idretur = $this->db->insert_id();
					$idproduk=$this->input->post('idproduk');
					$jumlah=$this->input->post('jumlah');
					$alasan=$this->input->post('alasan');
					
					for($x=0; $x<sizeof($idproduk); $x++) {
						
						if($jumlah[$x]>0) {
							//id_retur	id_produk	warna	berat_satuan	jumlah_retur	harga_jual	satuan 	
							$produk = $this->model_app->view_where('penjualandetail', array('id_penjualan' => $this->input->post('id'), 'id_produk'=>$idproduk[$x]))->row_array();
							
							$datadetail = array(
								'id_retur' => $idretur,
								'id_produk' => $idproduk[$x],
								'warna' => $produk['warna'],
								'berat_satuan' =>$produk['berat_satuan'],
								'jumlah_retur' => $jumlah[$x],
								'harga_jual' => $produk['harga_jual'],
								'satuan' => $produk['satuan'],
								'alasan_retur' =>  $alasan[$x],
							);
							$this->db->insert('returdetail', $datadetail);


						}
						
					}
					
					

					 $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data retur telah terkirim.<br>
			Akan segera kami tindak lanjuti.
            
            </div>');
					
					redirect('retur/?inv='.$this->input->post('a'));
				}
				
		 
		}
	}

	 

	 
}
