<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_main');
		 
		cek_session_admin();
	}


	function index()
	{
		$idproduk = $this->uri->segment(4);
		
		$data['title'] = 'Kelola Produk';
		$data['record'] = $this->model_app->view_ordering('produk', 'nama_produk', 'ACS');
		 
		$this->template->load('admin/template', 'admin/produk/view_produk', $data);
	}


	function tambah_produk()
	{

		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/images/produk/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '5000'; // kb
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			
			 
			
			if ($this->upload->do_upload('g')) {
				$this->upload->do_upload('g');
				$hasil = $this->upload->data();
				$namagambar = $hasil['file_name'];
			} else { $namagambar =""; }
			
			
			 
			if ($this->upload->do_upload('gambar2')) {
				$this->upload->do_upload('gambar2');
				$hasil2 = $this->upload->data();
				$namagambar2 = $hasil2['file_name'];
			} else { $namagambar2 =""; }
			
			
			 
			
			if ($this->upload->do_upload('gambar3')) {
				$this->upload->do_upload('gambar3');
				$hasil3 = $this->upload->data();
				$namagambar3 = $hasil3['file_name'];
			} else { $namagambar3 =""; }
			
			 
			
			if ($this->upload->do_upload('gambar4')) {
				$this->upload->do_upload('gambar4');
				$hasil4 = $this->upload->data();
				$namagambar4 = $hasil4['file_name'];
			} else { $namagambar4 =""; }
			
			
			
				$data = array( 
					'id_kategori_produk' => $this->input->post('a'),
					'nama_produk' => $this->input->post('b'),
					'produk_seo' => $this->db->escape_str(seo_title($this->input->post('b'))),
					'satuan' => $this->input->post('c'),
					'harga_beli' => $this->input->post('d'),
					'harga_konsumen' => $this->input->post('f'), 
					'diskon' => $this->input->post('diskon'),
					'berat' => $this->input->post('berat'),
					//'stok' => $this->input->post('stok'),
					'gambar' => $namagambar,
					'gambar2' => $namagambar2,
					'gambar3' => $namagambar3,
					'gambar4' => $namagambar4,
					'keterangan' => $this->input->post('ff'),
					'waktu_input' => date('Y-m-d H:i:s'), 
				);
			 
			
			$simpan = $this->model_app->insert('produk', $data);
			
			if($simpan) {
				$this->session->set_userdata('Sukses', 'Data produk berhasil disimpan.' ); 
				redirect('admin/produk');
			} else {
				$this->session->set_userdata('Gagal', 'Data produk gagal disimpan.' ); 
				redirect('admin/produk');
			}
			
		} else {

			$data['title'] = 'Tambah Produk';
			$data['record'] = $this->model_app->view_ordering('kategoriproduk', 'id_kategori_produk', 'DESC');
			 
			$this->template->load('admin/template', 'admin/produk/view_produk_tambah', $data);
		}
	}




	function edit_produk()
	{

		$id = $this->uri->segment(4);
		if (isset($_POST['submit'])) {
			
			
			$config['upload_path'] = 'assets/images/produk/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '5000'; // kb
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			
			
			$query = $this->db->get_where('produk', array('id_produk' => $this->input->post('id')));
				$row = $query->row();
				$foto = $row->gambar;
				$foto2 = $row->gambar2;
				$foto3 = $row->gambar3;
				$foto4 = $row->gambar4;
				
			$path = "assets/images/produk/";	
				
			
		 
			
			if ($this->upload->do_upload('g')) {
				$this->upload->do_upload('g');
				$hasil = $this->upload->data();
				$namagambar = $hasil['file_name']; 
				unlink($path . $foto);
			} else { $namagambar =$foto; }
			
			
			
			if ($this->upload->do_upload('gambar2')) {
				$this->upload->do_upload('gambar2');
				$hasil2 = $this->upload->data();
				$namagambar2 = $hasil2['file_name']; 
				unlink($path . $foto2);
			} else { $namagambar2 =$foto2; }
			
			
			
			if ($this->upload->do_upload('gambar3')) {
				$this->upload->do_upload('gambar3');
				$hasil3 = $this->upload->data();
				$namagambar3 = $hasil3['file_name'];
				unlink($path . $foto3);
			} else { $namagambar3 =$foto3; }
			
			
			if ($this->upload->do_upload('gambar4')) {
				$this->upload->do_upload('gambar4');
				$hasil4 = $this->upload->data();
				$namagambar4 = $hasil4['file_name'];
				unlink($path . $foto4);
			} else { $namagambar4 =$foto4; }
			
			 
				$data = array( 
					'id_kategori_produk' => $this->input->post('a'),
					'nama_produk' => $this->input->post('b'),
					'produk_seo' => $this->db->escape_str(seo_title($this->input->post('b'))),
					'satuan' => $this->input->post('c'),
					'harga_beli' => $this->input->post('d'),
					'harga_konsumen' => $this->input->post('f'), 
					'diskon' => $this->input->post('diskon'),
					'berat' => $this->input->post('berat'),
					//'stok' => $this->input->post('stok'),
					'gambar' => $namagambar,
					'gambar2' => $namagambar2,
					'gambar3' => $namagambar3,
					'gambar4' => $namagambar4,
					'keterangan' => $this->input->post('ff')
				);
			 
			$where = array('id_produk' => $this->input->post('id'));
			$update = $this->model_app->update('produk', $data, $where);
			
			if($update) {
				$this->session->set_userdata('Sukses', 'Data produk berhasil diupdate.' ); 
				redirect('admin/produk');
			} else {
				$this->session->set_userdata('Gagal', 'Data produk gagal diupdate.' ); 
				redirect('admin/produk');
			}
			
		} else {

			$data['title'] = 'Edit Produk';
			 
			$data['record'] = $this->model_app->view_ordering('kategoriproduk', 'id_kategori_produk', 'DESC');
			$data['rows'] = $this->model_app->edit('produk', array('id_produk' => $id))->row_array();
			$this->template->load('admin/template', 'admin/produk/view_produk_edit', $data);
		}
	}

	function delete_produk($id)
	{
		$where = array('id_produk' => $id);
		$this->model_app->delete('produk', $where);
		
		$where = array('id_produk' => $id);
		$this->model_app->delete('produkvarian', $where);
		
		echo json_encode(array("status" => TRUE));
	}

	
	function kelola_varian()
	{

		$idproduk = $this->uri->segment(4);
		 

			$data['title'] = 'Edit Produk';
			 
			$data['record'] = $this->model_app->view_ordering('kategoriproduk', 'id_kategori_produk', 'DESC');
			$data['rows'] = $this->model_app->edit('produk', array('id_produk' => $idproduk))->row_array();
			
			$data['varians'] = $this->model_app->view_where_ordering('produkvarian', 'id_produk='.$idproduk,'id_produkvarian', 'ACS');
		
		 
			$this->template->load('admin/template', 'admin/produk/view_kelola_varian', $data);
		
	}

	
	function tambah_varian()
	{

		if (isset($_POST['submit'])) {
			
			
			
			
				$data = array( 
					'id_produk' => $this->input->post('idproduk'),
					'warna_produkvarian' => $this->input->post('warna'), 
					'stok_produkvarian' => $this->input->post('stok'),
					 
				);
			 
			
			$simpan = $this->model_app->insert('produkvarian', $data);
			
			if($simpan) {
				$this->session->set_userdata('Sukses', 'Data varian produk berhasil disimpan.' ); 
				redirect('admin/produk/kelola_varian/'.$this->input->post('idproduk'));
			} else {
				$this->session->set_userdata('Gagal', 'Data varian produk gagal disimpan.' ); 
				redirect('admin/produk/kelola_varian/'.$this->input->post('idproduk'));
			}
			
		} else {

			$data['title'] = 'Tambah Varian';
			$data['idproduk'] = $this->uri->segment(4);
			 
			$this->load->view('admin/produk/view_varian_tambah', $data);
		}
	}
	
	
	
	function edit_varian()
	{

		if (isset($_POST['submit'])) {
			 
			
				$data = array(  
					'warna_produkvarian' => $this->input->post('warna'), 
					'stok_produkvarian' => $this->input->post('stok'),
					 
				);
			 
			
			 
			$where = array('id_produkvarian' => $this->input->post('idprodukvarian'));
			$simpan = $this->model_app->update('produkvarian', $data, $where);
			
			
			if($simpan) {
				$this->session->set_userdata('Sukses', 'Data varian produk berhasil disimpan.' ); 
				redirect('admin/produk/kelola_varian/'.$this->input->post('idproduk'));
			} else {
				$this->session->set_userdata('Gagal', 'Data varian produk gagal disimpan.' ); 
				redirect('admin/produk/kelola_varian/'.$this->input->post('idproduk'));
			}
			
		} else {

			$data['title'] = 'Edit Varian';
			$data['idproduk'] = $this->uri->segment(4);
			$idvarian= $this->uri->segment(5);
			
			$data['varian'] = $this->model_app->edit('produkvarian', array('id_produkvarian' => $idvarian))->row_array();
			 
			$this->load->view('admin/produk/view_varian_edit', $data);
		}
	}
	
	
	
	function delete_varian($id)
	{
		$where = array('id_produkvarian' => $id);
		$this->model_app->delete('produkvarian', $where);
		echo json_encode(array("status" => TRUE));
	}
	
	
	
}
