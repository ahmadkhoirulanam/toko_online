<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
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
		$data['title'] = 'Kelola Admin';
		 
		$data['record'] = $this->db->query("SELECT * FROM pengguna WHERE level=1 ORDER BY id_pengguna ASC")->result_array();
		$this->template->load('admin/template', 'admin/pengguna/view_pengguna', $data);
	}

	function tambah_pengguna()
	{

		 
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/images/user/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '1000'; // kb
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('f');
			$hasil = $this->upload->data();
			
			$dataalamat =  array( 
                'alamat' => $this->db->escape_str($this->input->post('alamat')),
            );
			
			$this->db->insert('alamat', $dataalamat);
			$idalamat=$this->db->insert_id();
		
			if ($hasil['file_name'] == '') {
				$data = array( 
					'password' => password_hash($this->input->post('b'), PASSWORD_DEFAULT),
					'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
					'id_alamat' => $idalamat,
					'email' => $this->db->escape_str($this->input->post('d')),
					'no_telp' => $this->db->escape_str($this->input->post('e')),
					'level' => 1,
				);
			} else {
				$data = array( 
					'password' => password_hash($this->input->post('b'), PASSWORD_DEFAULT),
					'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
					'id_alamat' => $idalamat,
					'email' => $this->db->escape_str($this->input->post('d')),
					'no_telp' => $this->db->escape_str($this->input->post('e')),
					'foto' => $hasil['file_name'],
					'level' => 1,
				);
			}
			$simpan = $this->model_app->insert('pengguna', $data);
			
			if($simpan) {
				$this->session->set_userdata('Sukses', 'Data pengguna berhasil disimpan.' ); 
			} else {
				$this->session->set_userdata('Gagal', 'Data pengguna berhasil disimpan.' ); 
			}
		
			redirect('admin/pengguna/');
		} else {
			$data['title'] = 'Tambah Admin';
			$this->template->load('admin/template', 'admin/pengguna/view_pengguna_tambah', $data);
		}
	}
	  

	// Mod Managment User
	function edit_pengguna()
	{
		$id = $this->uri->segment(4);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/images/user/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '1000'; // kb
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('f');
			$hasil = $this->upload->data();
			
			$dataalamat =  array( 
                'alamat' => $this->db->escape_str($this->input->post('alamat')),
            );
			$where = array('id_alamat' => $this->input->post('idalamat'));
			$this->model_app->update('alamat', $dataalamat, $where);
			 
			
			
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
			} else {
				$this->session->set_userdata('Gagal', 'Data pengguna berhasil diupdate.' ); 
			}

			redirect('admin/pengguna');
			
			
		} else {
			
			
			// view_join_where($table1, $table2, $field, $where, $order, $ordering)
			$proses = $this->model_app->view_join_where('pengguna','alamat','id_alamat', array('id_pengguna' => $id),'','');
			
			$data['title'] = 'Edit Admin';
			$data['rows'] =  $proses[0];
			$this->template->load('admin/template', 'admin/pengguna/view_pengguna_edit', $data);
		}
	}

	function delete_pengguna($id)
	{
		$id = $this->uri->segment(4);
		
		$where = array('id_pengguna' => $id);
		$this->model_app->delete('pengguna', $where);
		
		
		echo json_encode(array("status" => TRUE));
	}



 
}
