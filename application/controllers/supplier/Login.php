<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
	}

	
	public function index()
	{
		
	 
		// cek session
		$ses_id = $this->session->idsupplier;
		$ses_lv = $this->session->levelsupplier;

		if (empty($ses_id)) {
			$this->form_validation->set_rules('email', 'Email', 'required|trim', [
				'required' => 'Email wajib diisi'
			]);

			$this->form_validation->set_rules('password', 'Password', 'required|trim', [
				'required' => 'Password wajib diisi'
			]);
			if ($this->form_validation->run() == false) {
				$data['title'] = 'Login Supplier';
				$data['breadcrumb'] = 'Login';
			 
				
				$this->load->view( 'supplier/view_login', $data);
			} else {
				 
				$this->_login();
			}
		} else {
			if ($ses_lv == "Aktif") {
				
				$this->session->set_userdata('Sukses', 'Login berhasil. Selamat Datang.' );  
				redirect('supplier/home');
			}  else {
				
				$this->session->unset_userdata('idsupplier'); 
				$this->session->unset_userdata('namalengkapsupplier');
				$this->session->unset_userdata('emailsupplier');
				$this->session->unset_userdata('passwordsupplier');
				$this->session->unset_userdata('levelsupplier');
		
				$this->session->set_userdata('Gagal', 'Username atau password salah.' );  
				redirect('supplier/login');
			}
		}
	}
	
	
	

	private function _login()
	{
		$email 	= $this->input->post('email');
		$password   = $this->input->post('password');

		$this->db->from('supplier');
		$this->db->where("(supplier.email_supplier = '$email')");
		$user = $this->db->get()->row_array();

		// jika usernya ada
		if ($user) {
			// juka usernya aktif
			if ($user['status_supplier'] == "Aktif") {
				// cek password 
				if (password_verify($password, $user['password_supplier'])) {
					$data = array(
						'idsupplier'   => $user['id_supplier'], 
						'namalengkapsupplier'   => $user['nama_supplier'],
						'emailsupplier'     	=> $user['email_supplier'],
						'passwordsupplier'   	=> $user['password_supplier'],
						 
					);
 					$this->session->set_userdata($data); 
					redirect('supplier/home');
					 
				}
				$this->session->set_userdata('Gagal', 'Password Salah.' ); 
				
				redirect('supplier/login');
			} else {
 				$this->session->set_userdata('Gagal', 'Pastikan input Anda tepat.' ); 
				
				redirect('supplier/login');
			}
		} else {
			$this->session->set_userdata('Gagal', 'Akun login tidak ditemukan.' ); 
			redirect('supplier/login');
		}
	}
	
	
	public function logout()
	{
		 
		$this->session->unset_userdata('idsupplier'); 
		$this->session->unset_userdata('namalengkapsupplier');
		$this->session->unset_userdata('emailsupplier');
		$this->session->unset_userdata('passwordsupplier'); 
		 
 		redirect('supplier/login');
	}
	

	
}
