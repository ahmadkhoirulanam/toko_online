<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Halaman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_main'); 
		$this->load->model('model_halaman'); 
		cek_session_admin();
	}

	 

	function index()
	{
		$data['record'] = $this->model_halaman->halaman();

		$data['title'] = 'Kelola Halaman';
		$this->template->load('admin/template', 'admin/website_halaman/view_halaman', $data);
	}

	function tambah_halaman()
	{
		if (isset($_POST['submit'])) {
			$simpan = $this->model_halaman->halaman_tambah();
			
			if($simpan) {
				$this->session->set_userdata('Sukses', 'Data halaman berhasil disimpan.' ); 
				redirect('admin/halaman');
			} else {
				$this->session->set_userdata('Gagal', 'Data halaman gagal disimpan.' ); 
				redirect('admin/halaman');
			}
			
			
		} else {
			
			$data['title'] = 'Tambah Halaman';
			$this->template->load('admin/template', 'admin/website_halaman/view_halaman_tambah',$data);
		}
	}

	function edit_halaman()
	{
		$id = $this->uri->segment(4);
		if (isset($_POST['submit'])) {
			$update= $this->model_halaman->halaman_update();
			
			if($update) {
				$this->session->set_userdata('Sukses', 'Data halaman berhasil diupdate.' ); 
				redirect('admin/halaman');
			} else {
				$this->session->set_userdata('Gagal', 'Data halaman gagal diupdate.' ); 
				redirect('admin/halaman');
			}
			 
		} else {
			$data['title'] = 'Edit Halaman';
			$data['rows'] = $this->model_halaman->halaman_edit($id)->row_array();
			$this->template->load('admin/template', 'admin/website_halaman/view_halaman_edit', $data);
		}
	}

	function delete_halaman($id)
	{
		$this->model_halaman->halaman_delete($id);
		echo json_encode(array("status" => TRUE));
	}


 
}
