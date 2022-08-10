<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsumen extends CI_Controller
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
		$data['title'] = 'Konsumen';
		$data['record'] = $this->model_app->view_where_ordering('pengguna', "level='2'", 'id_pengguna', 'ASC');
		$this->template->load('admin/template', 'admin/konsumen/view_konsumen', $data);
	}

	function edit_konsumen()
	{
		$id = $this->uri->segment(4);
		
		if (isset($_POST['submit'])) {
			
			$update = $this->model_members->profile_update($this->input->post('id'));
			 
			if($update) {
				$this->session->set_userdata('Sukses', 'Data konsumen berhasil diupdate.' ); 
				redirect('admin/konsumen');
			} else {
				$this->session->set_userdata('Gagal', 'Data konsumen gagal diupdate.' ); 
				redirect('admin/konsumen');
			}
			
		} else {

			$data['title'] = 'Ubah Konsumen';
			$data['row'] = $this->model_app->profile_konsumen($id)->row_array();
			$data['kota'] = $this->model_app->view('kota');
			$this->template->load('admin/template', 'admin/konsumen/view_konsumen_edit', $data);
		}
	}

	function detail_konsumen()
	{

		$id = $this->uri->segment(4);
		$record = $this->model_app->orders_report($id);
		$edit = $this->model_app->profile_konsumen($id)->row_array();
		$data = array('rows' => $edit, 'record' => $record);
		$data['title'] = 'Detail Konsumen';
		$this->template->load('admin/template', 'admin/konsumen/view_konsumen_detail', $data);
	}

	function delete_konsumen($id)
	{

        
		$where = array('id_pengguna' => $id);
		$this->model_app->delete('pengguna', $where);
		echo json_encode(array("status" => TRUE));
	}


	 
}
