<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app'); 
		$this->load->model('model_kategori_produk');
		$this->load->model('model_halaman');
		$this->load->model('model_slide');
	}

	function index()
	{
		$jumlah = $this->model_app->view('produk')->num_rows();
		$config['base_url'] = base_url() . 'produk/index';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 12;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active" aria-current="page"> <a class="page-link">';
		$config['cur_tag_close'] = '</a><span class="sr-only">(current)</span></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');

		if ($this->uri->segment('3') == '') {
			$dari = 0;
		} else {
			$dari = $this->uri->segment('3');
		}

		if (is_numeric($dari)) {


			$data['title'] = 'Toko Online Tas Ecer dan Grosir';
			$data['record'] = $this->model_app->view_ordering_limit('produk', 'id_produk', 'DESC', $dari, $config['per_page']);
			 
			$data['kategoris'] = $this->model_kategori_produk->semua_kategori_produk(0,10)->result();
			$data['halamans'] = $this->model_halaman->halaman()->result();
			$data['slides'] = $this->model_slide->slide()->result();
			
			
			$this->pagination->initialize($config);
			
			$this->template->load('home/template', 'home/view_home', $data);
			//$this->load->view('home/template');
		} else {
			redirect('main');
		}
	}
}
