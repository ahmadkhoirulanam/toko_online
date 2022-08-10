<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_main'); 
		$this->load->model('model_rekening'); 
		cek_session_admin();
	}

	function index()
	{

		$data['title'] = 'Rekening';
		$data['record'] = $this->model_rekening->rekening();
		$this->template->load('admin/template', 'admin/rekening/view_rekening', $data);
	}


	function tambah_rekening()
	{

		if (isset($_POST['submit'])) {
			
			$simpan = $this->model_rekening->rekening_tambah();
			
			if($simpan) {
				$this->session->set_userdata('Sukses', 'Data rekening berhasil disimpan.' ); 
			} else {
				$this->session->set_userdata('Gagal', 'Data rekening berhasil disimpan.' ); 
			}
			
			redirect('admin/rekening');
		} else {

			$data['title'] = 'Tambah Rekening';
			 
			$this->template->load('admin/template', 'admin/rekening/view_rekening_tambah');
		}
	}

	function edit_rekening()
	{

		$id = $this->uri->segment(4);
		if (isset($_POST['submit'])) {
			
			$update = $this->model_rekening->rekening_update();
			
			 if($update) {
				$this->session->set_userdata('Sukses', 'Data rekening berhasil diupdate.' ); 
			} else {
				$this->session->set_userdata('Gagal', 'Data rekening gagal diupdate.' ); 
			}
			
			redirect('admin/rekening');
		} else {

			$data['title'] = 'Edit Rekening';
			$data['rows'] = $this->model_rekening->rekening_edit($id)->row_array();
			$this->template->load('admin/template', 'admin/rekening/view_rekening_edit', $data);
		}
	}

	function delete_rekening($id)
	{
		$this->model_rekening->rekening_delete($id);
		echo json_encode(array("status" => TRUE));
	}


	 
}
