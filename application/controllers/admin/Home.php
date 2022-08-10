<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app'); 
		cek_session_admin();
	}
	
	 

	function index()
	{
		if (!empty($this->session->userdata('idadmin'))) {

			$data['title'] = 'Admin';
			$data['grap'] = $this->model_main->grafik_kunjungan();

			$this->template->load('admin/template', 'admin/view_dashboard', $data);
		} else {
			redirect('admin');
		}
	}



}
