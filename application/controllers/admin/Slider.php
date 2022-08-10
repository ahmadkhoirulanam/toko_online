<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_slide'); 
		cek_session_admin();
	}

	 

	function index()
	{
		$data['record'] = $this->model_slide->slide();
		$data['title'] = 'Slider';
		$this->template->load('admin/template', 'admin/website_slider/view_slider', $data);
	}



	function tambah_slider()
	{
		if (isset($_POST['submit'])) {
			$simpan = $this->model_slide->slide_tambah();
			
			if($simpan) {
				$this->session->set_userdata('Sukses', 'Data slider berhasil disimpan.' ); 
				redirect('admin/slider');
			} else {
				$this->session->set_userdata('Gagal', 'Data slider gagal disimpan.' ); 
				redirect('admin/slider');
			}
			
		} else {
			$data['record'] = $this->model_app->view('produk');

			$data['title'] = 'Tambah Slider';
			$this->template->load('admin/template', 'admin/website_slider/view_slider_tambah', $data);
		}
	}

	function edit_slider()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$update = $this->model_slide->slide_update();
			
			if($update) {
				$this->session->set_userdata('Sukses', 'Data slider berhasil diupdate.' ); 
				redirect('admin/slider');
			} else {
				$this->session->set_userdata('Gagal', 'Data slider gagal diupdate.' ); 
				redirect('admin/slider');
			}
			
		} else {

			$data['title'] = 'Edit Slider';
			$data['rows'] = $this->model_slide->slide_edit($id)->row_array();
			$data['record'] = $this->model_app->view('produk');
			$this->template->load('admin/template', 'admin/website_slider/view_slider_edit', $data);
		}
	}

	function delete_slider($id)
	{
		$this->model_slide->slide_delete($id);
		echo json_encode(array("status" => TRUE));
	}

	 
}
