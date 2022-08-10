<?php
class Model_rekening extends CI_model
{
    function rekening()
    {
        return $this->db->query("SELECT * FROM rekening ORDER BY id_rekening ASC");
    }

    function rekening_tambah()
    {
		
		$config['upload_path'] = 'assets/images/rekening/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '1000'; // kb
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('f');
			$hasil = $this->upload->data();
		
		if ($hasil['file_name'] == '') { 	
			$datadb = array(
				'nama_bank' => $this->db->escape_str($this->input->post('a')),
				'no_rekening' => $this->db->escape_str($this->input->post('b')),
				'pemilik_rekening' => $this->db->escape_str($this->input->post('c')), 
			);
		} else {
			$datadb = array(
				'nama_bank' => $this->db->escape_str($this->input->post('a')),
				'no_rekening' => $this->db->escape_str($this->input->post('b')),
				'pemilik_rekening' => $this->db->escape_str($this->input->post('c')), 
				'logo_bank' => $hasil['file_name'],
			);
		}
        $insert = $this->db->insert('rekening', $datadb);
		
		if($insert) {
			return TRUE;
		} else {
			return FALSE;
		}
    }

    function rekening_edit($id)
    {
        return $this->db->query("SELECT * FROM rekening where id_rekening='$id'");
    }

    function rekening_update()
    {
		
		$config['upload_path'] = 'assets/images/rekening/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$config['max_size'] = '1000'; // kb
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('f');
			$hasil = $this->upload->data();
		
		if ($hasil['file_name'] == '') { 	
		
			$datadb = array(
				'nama_bank' => $this->db->escape_str($this->input->post('a')),
				'no_rekening' => $this->db->escape_str($this->input->post('b')),
				'pemilik_rekening' => $this->db->escape_str($this->input->post('c')), 
			);
			
		} else {
			
			$datadb = array(
				'nama_bank' => $this->db->escape_str($this->input->post('a')),
				'no_rekening' => $this->db->escape_str($this->input->post('b')),
				'pemilik_rekening' => $this->db->escape_str($this->input->post('c')),
				'logo_bank' => $hasil['file_name'],
			);
			
			$path = "assets/images/rekening/";
            unlink($path . $this->db->escape_str($this->input->post('logolama'))); 
			
		}
        $this->db->where('id_rekening', $this->input->post('id'));
        
		$update = $this->db->update('rekening', $datadb);
		
		if($update) {
			return TRUE;
		} else {
			return FALSE;
		}
		
    }

    function rekening_delete($id)
    {
        return $this->db->query("DELETE FROM rekening where id_rekening='$id'");
    }
}
