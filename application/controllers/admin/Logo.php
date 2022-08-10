<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Logo extends CI_Controller
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
		if (isset($_POST['submit'])) {
			
			$update = $this->model_main->logo_update();
			if($update) {
				$this->session->set_userdata('Sukses', 'Data logo berhasil diupdate.' ); 
				redirect('admin/logo');
			} else {
				$this->session->set_userdata('Gagal', 'Data logo gagal diupdate.' ); 
				redirect('admin/logo');
			}
		} else {

			$data['title'] = 'Edit Logo Website';
			$data['record'] = $this->model_main->logo();
			$this->template->load('admin/template', 'admin/website_logo/view_logowebsite', $data);
		}
	}

 
}
