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
		$ses_id = $this->session->idadmin;
		$ses_lv = $this->session->leveladmin;

		if (empty($ses_id)) {
			$this->form_validation->set_rules('email', 'Email', 'required|trim', [
				'required' => 'Email wajib diisi'
			]);

			$this->form_validation->set_rules('password', 'Password', 'required|trim', [
				'required' => 'Password wajib diisi'
			]);
			if ($this->form_validation->run() == false) {
				$data['title'] = 'Login Admin';
				$data['breadcrumb'] = 'Login';
				
				
				$this->load->view( 'admin/view_login', $data);
			} else {
				$this->_login();
			}
		} else {
			if ($ses_lv == 1) {
				
				$this->session->set_userdata('Sukses', 'Login berhasil. Selamat Datang.' );  
				redirect('admin/home');
			}  else {
				
				$this->session->unset_userdata('idadmin'); 
				$this->session->unset_userdata('namalengkapadmin');
				$this->session->unset_userdata('emailadmin');
				$this->session->unset_userdata('passwordadmin');
				$this->session->unset_userdata('leveladmin');
		
				$this->session->set_userdata('Gagal', 'Username atau password salah.' );  
				redirect('admin');
			}
		}
	}
	
	
	

	private function _login()
	{
		$email 	= $this->input->post('email');
		$password   = $this->input->post('password');

		$this->db->from('pengguna');
		$this->db->where("(pengguna.email = '$email')");
		$user = $this->db->get()->row_array();

		// jika usernya ada
		if ($user) {
			// juka usernya aktif
			if ($user['aktif'] == 1) {
				// cek password 
				if (password_verify($password, $user['password'])) {
					$data = array(
						'idadmin'   => $user['id_pengguna'], 
						'namalengkapadmin'   => $user['nama_lengkap'],
						'emailadmin'     	=> $user['email'],
						'passwordadmin'   	=> $user['password'],
						'leveladmin' 		=> $user['level'],
					);
					
					 
					
					if ($user['level'] == 1) {
						$this->session->set_userdata($data);
						
						redirect('admin/home');
						
					} else {
						 
						 $this->session->unset_userdata('idadmin');
					$this->session->unset_userdata('usernameadmin');
					$this->session->unset_userdata('namalengkapadmin');
					$this->session->unset_userdata('emailadmin');
					$this->session->unset_userdata('passwordadmin');
					$this->session->unset_userdata('leveladmin');
			
					$this->session->set_userdata('Gagal', 'Username atau password salah.' );  
					redirect('admin');
				
					}
				}
				$this->session->set_userdata('Gagal', 'Password Salah.' ); 
				
				redirect('admin/login');
			} else {
 				$this->session->set_userdata('Gagal', 'Pastikan input Anda tepat.' ); 
				
				redirect('admin/login');
			}
		} else {
			$this->session->set_userdata('Gagal', 'Akun login tidak ditemukan.' ); 
			redirect('admin/login');
		}
	}
	
	
	public function logout()
	{
		 
		$this->session->unset_userdata('idadmin'); 
		$this->session->unset_userdata('namalengkapadmin');
		$this->session->unset_userdata('emailadmin');
		$this->session->unset_userdata('passwordadmin');
		$this->session->unset_userdata('leveladmin');
		 
 		redirect('admin/login');
	}
	

	
}
