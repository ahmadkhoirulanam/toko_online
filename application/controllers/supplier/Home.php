<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app'); 
		$this->load->model('model_supplier');  
	}
	
	 

	function index()
	{
		if (!empty($this->session->userdata('idsupplier'))) {

			$data['title'] = 'Supplier'; 
			$this->template->load('supplier/template', 'supplier/view_dashboard', $data);
		} else {
			redirect('supplier/login');
		}
	}



}
