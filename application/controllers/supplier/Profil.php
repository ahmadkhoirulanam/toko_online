<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_supplier');
		 
	}

	 
	function index()
	{
		$id = $this->session->userdata('idsupplier');
		
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
					'nama_supplier' => $this->db->escape_str($this->input->post('c')), 
					'alamat_supplier' => $this->db->escape_str($this->input->post('alamat')), 
					'email_supplier' => $this->db->escape_str($this->input->post('d')),
					'notelp_supplier' => $this->db->escape_str($this->input->post('e')),
					 'nama_cp' => $this->db->escape_str($this->input->post('nama_cp')),
					 'notelp_cp' => $this->db->escape_str($this->input->post('notelp_cp')),
					 'jabatan_cp' => $this->db->escape_str($this->input->post('jabatan_cp')),
				);
			} elseif ($hasil['file_name'] != '' and $this->input->post('b') == '') {
				$data = array( 
					'nama_supplier' => $this->db->escape_str($this->input->post('c')), 
					'alamat_supplier' => $this->db->escape_str($this->input->post('alamat')), 
					'email_supplier' => $this->db->escape_str($this->input->post('d')),
					'notelp_supplier' => $this->db->escape_str($this->input->post('e')),
					 'nama_cp' => $this->db->escape_str($this->input->post('nama_cp')),
					 'notelp_cp' => $this->db->escape_str($this->input->post('notelp_cp')),
					 'jabatan_cp' => $this->db->escape_str($this->input->post('jabatan_cp')),
					'foto_supplier' => $hasil['file_name'],
				);
			} elseif ($hasil['file_name'] == '' and $this->input->post('b') != '') {
				$data = array( 
					'password_supplier' => password_hash($this->input->post('b'), PASSWORD_DEFAULT),
					'nama_supplier' => $this->db->escape_str($this->input->post('c')), 
					'alamat_supplier' => $this->db->escape_str($this->input->post('alamat')), 
					'email_supplier' => $this->db->escape_str($this->input->post('d')),
					'notelp_supplier' => $this->db->escape_str($this->input->post('e')),
					 'nama_cp' => $this->db->escape_str($this->input->post('nama_cp')),
					 'notelp_cp' => $this->db->escape_str($this->input->post('notelp_cp')),
					 'jabatan_cp' => $this->db->escape_str($this->input->post('jabatan_cp')),
				);
			} elseif ($hasil['file_name'] != '' and $this->input->post('b') != '') {
				$data = array( 
					'password_supplier' => password_hash($this->input->post('b'), PASSWORD_DEFAULT),
					'nama_supplier' => $this->db->escape_str($this->input->post('c')), 
					'alamat_supplier' => $this->db->escape_str($this->input->post('alamat')), 
					'email_supplier' => $this->db->escape_str($this->input->post('d')),
					'notelp_supplier' => $this->db->escape_str($this->input->post('e')),
					 'nama_cp' => $this->db->escape_str($this->input->post('nama_cp')),
					 'notelp_cp' => $this->db->escape_str($this->input->post('notelp_cp')),
					 'jabatan_cp' => $this->db->escape_str($this->input->post('jabatan_cp')),
					'foto_supplier' => $hasil['file_name'],
				);
			}
			
			$where = array('id_supplier' => $this->input->post('id'));
			$update = $this->model_app->update('supplier', $data, $where);

			 if($update) {
				$this->session->set_userdata('Sukses', 'Data supplier berhasil diupdate.' ); 
			} else {
				$this->session->set_userdata('Gagal', 'Data supplier berhasil diupdate.' ); 
			}

			redirect('supplier/profil');

			 
		} else {
			
			 
			$proses = $this->model_app->edit('supplier', array('id_supplier' => $id))->row_array();
			$data = array(
				'rows' => $proses, 
				'title' => 'Edit Profil Supplier'
				);
			$this->template->load('supplier/template', 'supplier/profil/view_pengguna_edit', $data);
		}
	}

	 
}
