<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
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
		$id = $this->session->userdata('idadmin');
		
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/images/user/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '1000'; // kb
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('f');
			$hasil = $this->upload->data();
			
			
			if ($hasil['file_name'] == '' and $this->input->post('b') == '') {
				$data = array(
					 
					'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
					'email' => $this->db->escape_str($this->input->post('d')),
					'no_telp' => $this->db->escape_str($this->input->post('e')),
				);
			} elseif ($hasil['file_name'] != '' and $this->input->post('b') == '') {
				$data = array(
					 
					'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
					'email' => $this->db->escape_str($this->input->post('d')),
					'no_telp' => $this->db->escape_str($this->input->post('e')),
					'foto' => $hasil['file_name'],
				);
			} elseif ($hasil['file_name'] == '' and $this->input->post('b') != '') {
				$data = array(
					 
					'password' => password_hash($this->input->post('b'), PASSWORD_DEFAULT),
					'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
					'email' => $this->db->escape_str($this->input->post('d')),
					'no_telp' => $this->db->escape_str($this->input->post('e')),
				);
			} elseif ($hasil['file_name'] != '' and $this->input->post('b') != '') {
				$data = array(
					 
					'password' => password_hash($this->input->post('b'), PASSWORD_DEFAULT),
					'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
					'email' => $this->db->escape_str($this->input->post('d')),
					'no_telp' => $this->db->escape_str($this->input->post('e')),
					'foto' => $hasil['file_name'],
				);
			}
			$where = array('id_pengguna' => $this->input->post('id'));
			$update = $this->model_app->update('pengguna', $data, $where);

			 if($update) {
				$this->session->set_userdata('Sukses', 'Data pengguna berhasil diupdate.' ); 
				redirect('admin/profil');
			} else {
				$this->session->set_userdata('Gagal', 'Data pengguna gagal diupdate.' ); 
				redirect('admin/profil');
			}

			 
		} else {
			
			 
			$proses = $this->model_app->edit('pengguna', array('id_pengguna' => $id))->row_array();
			$data = array(
				'rows' => $proses, 
				'title' => 'Edit Profil Pengguna'
				);
			$this->template->load('admin/template', 'admin/profil/view_pengguna_edit', $data);
		}
	}

	 
}
