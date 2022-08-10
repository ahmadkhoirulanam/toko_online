<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
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
		$data['title'] = 'Kelola Supplier';
		 
		$data['record'] = $this->db->query("SELECT * FROM supplier  ORDER BY id_supplier ASC")->result_array();
		$this->template->load('admin/template', 'admin/supplier/view_supplier', $data);
	}

	function tambah_supplier()
	{

		 
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/images/user/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '1000'; // kb
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('f');
			$hasil = $this->upload->data();
			
			 
		
			if ($hasil['file_name'] == '') {
				$data = array( 
					'password_supplier' => password_hash($this->input->post('b'), PASSWORD_DEFAULT),
					'nama_supplier' => $this->db->escape_str($this->input->post('c')), 
					'alamat_supplier' => $this->db->escape_str($this->input->post('alamat')), 
					'email_supplier' => $this->db->escape_str($this->input->post('d')),
					'notelp_supplier' => $this->db->escape_str($this->input->post('e')),
					 'nama_cp' => $this->db->escape_str($this->input->post('nama_cp')),
					 'notelp_cp' => $this->db->escape_str($this->input->post('notelp_cp')),
					 'jabatan_cp' => $this->db->escape_str($this->input->post('jabatan_cp')),
					 'status_supplier' => 'Aktif',
				);
			} else {
				$data = array( 
					'password_supplier' => password_hash($this->input->post('b'), PASSWORD_DEFAULT),
					'nama_supplier' => $this->db->escape_str($this->input->post('c')), 
					'alamat_supplier' => $this->db->escape_str($this->input->post('alamat')), 
					'email_supplier' => $this->db->escape_str($this->input->post('d')),
					'notelp_supplier' => $this->db->escape_str($this->input->post('e')),
					'foto_supplier' => $hasil['file_name'],
					'nama_cp' => $this->db->escape_str($this->input->post('nama_cp')),
					 'notelp_cp' => $this->db->escape_str($this->input->post('notelp_cp')),
					 'jabatan_cp' => $this->db->escape_str($this->input->post('jabatan_cp')),
					'status_supplier' => 'Aktif',
				);
			}
			$simpan = $this->model_app->insert('supplier', $data);
			
			if($simpan) {
				$this->session->set_userdata('Sukses', 'Data supplier berhasil disimpan.' ); 
			} else {
				$this->session->set_userdata('Gagal', 'Data supplier berhasil disimpan.' ); 
			}
		
			redirect('admin/supplier/');
		} else {
			$data['title'] = 'Tambah Supplier';
			$this->template->load('admin/template', 'admin/supplier/view_supplier_tambah', $data);
		}
	}
	  

	// Mod Managment User
	function edit_supplier()
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
					'password' => password_hash($this->input->post('b'), PASSWORD_DEFAULT),
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

			redirect('admin/supplier');
			
			
		} else {
			 
			$datasupp = array('id_supplier' => $id);
			
			// view_join_where($table1, $table2, $field, $where, $order, $ordering)
			$proses = $this->model_app->view_where('supplier', $datasupp);
			$proses = $proses->result_array();
			$data['title'] = 'Edit Supplier';
			$data['rows'] =  $proses[0];
			$this->template->load('admin/template', 'admin/supplier/view_supplier_edit', $data);
		}
	}
	
	

	function delete_supplier($id)
	{
		$id = $this->uri->segment(4);
		
		$where = array('id_supplier' => $id);
		$this->model_app->delete('supplier', $where);
		
		
		echo json_encode(array("status" => TRUE));
	}


	function produk_supplier()
	{
		$idsupplier =  $this->uri->segment(4);
		
		
		// view_where_ordering($table, $data, $order, $ordering) 
		$data = array(
			'id_supplier' => $idsupplier
		);
		
		$data['record'] = $this->model_app->view_where_ordering('supplierproduk', $data, 'nama_produk', 'ACS');
		$data['title'] = 'Lihat Produk Supplier'; 
		$this->template->load('admin/template', 'admin/supplier/view_produk', $data);
	}

 
}
