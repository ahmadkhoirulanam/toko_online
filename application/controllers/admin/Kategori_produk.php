<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Kategori_produk extends CI_Controller
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

		$data['title'] = 'Kategori Produk';
		$data['record'] = $this->model_app->view_ordering('kategoriproduk', 'id_kategori_produk', 'ASC');

		$this->template->load('admin/template', 'admin/kategori_produk/view_kategori_produk', $data);
	}



	function tambah_kategori_produk()
	{

		if (isset($_POST['submit'])) {
			$data = array('nama_kategori' => $this->input->post('a'), 'kategori_seo' => seo_title($this->input->post('a')));
			$simpan = $this->model_app->insert('kategoriproduk', $data);
			
			if($simpan) {
				$this->session->set_userdata('Sukses', 'Data kategori produk berhasil disimpan.' ); 
				redirect('admin/kategori_produk');
			} else {
				$this->session->set_userdata('Gagal', 'Data kategori produk gagal disimpan.' ); 
				redirect('admin/kategori_produk');
			}
			
		} else {

			$data['title'] = 'Tambah Kategori Produk';
			$this->template->load('admin/template', 'admin/kategori_produk/view_kategori_produk_tambah', $data);
		}
	}

	function edit_kategori_produk()
	{

		$id = $this->uri->segment(4);
		if (isset($_POST['submit'])) {
			$data = array('nama_kategori' => $this->input->post('a'), 'kategori_seo' => seo_title($this->input->post('a')));
			$where = array('id_kategori_produk' => $this->input->post('id'));
			$update = $this->model_app->update('kategoriproduk', $data, $where);
			  
			if($update) {
				$this->session->set_userdata('Sukses', 'Data kategori produk berhasil diupdate.' ); 
				redirect('admin/kategori_produk');
			} else {
				$this->session->set_userdata('Gagal', 'Data kategori produk gagal diupdate.' ); 
				redirect('admin/kategori_produk');
			}
			
			
		} else {
			$edit = $this->model_app->edit('kategoriproduk', array('id_kategori_produk' => $id))->row_array();
			$data = array('rows' => $edit);

			$data['title'] = 'Ubah Produk';
			$this->template->load('admin/template', 'admin/kategori_produk/view_kategori_produk_edit', $data);
		}
	}
	
	
	

	function delete_kategori_produk($id)
	{
		$where = array('id_kategori_produk' => $id);
		$this->model_app->delete('kategoriproduk', $where);
		echo json_encode(array("status" => TRUE));
		
	}

	 
}
