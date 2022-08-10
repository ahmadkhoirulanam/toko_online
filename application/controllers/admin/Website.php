<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Website extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_identitas'); 
		cek_session_admin();
	}

	  

	// Modul Web
	function index()
	{
		if (isset($_POST['submit'])) {
			$update=$this->model_identitas->identitas_update();
			
			if($update) {
				$this->session->set_userdata('Sukses', 'Data identitas web berhasil diupdate.' ); 
				redirect('admin/website');
			} else {
				$this->session->set_userdata('Gagal', 'Data identitas web gagal diupdate.' ); 
				redirect('admin/website');
			}
			
			 
			
		} else {
			$data['record'] = $this->model_identitas->identitas()->row_array();

			$data['title'] = 'Identitas Website';
			$this->template->load('admin/template', 'admin/website_identitas/view_identitas', $data);
		}
	}
	
	
	 

 
  
}
