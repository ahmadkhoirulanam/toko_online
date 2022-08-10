<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_halaman'); 
		$this->load->model('model_rekening');  
	}

	public function index()
	{
		 
		$data['title'] = 'Rekening';
		$data['breadcrumb'] = 'Rekening';
		$data['record'] = $this->model_rekening->rekening()->result();
		$data['halamans'] = $this->model_halaman->halaman()->result(); 
	 
		$this->template->load('home/template', 'home/rekening/view_page', $data);
	}

 
}
