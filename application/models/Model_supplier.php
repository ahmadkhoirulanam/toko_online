<?php
class Model_supplier extends CI_model
{
    function supplier()
    {
        return $this->db->query("SELECT * FROM supplier");
    }

    function supplier_tambah()
    {
        $config['upload_path'] = 'assets/images/user/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '1000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('f');
        $hasil = $this->upload->data();
		
		$dataalamat =  array( 
                'alamat' => $this->db->escape_str($this->input->post('alamat')),
            );
			
		$this->db->insert('alamat', $dataalamat);
		$idalamat=$this->db->insert_id();
		 
        if ($hasil['file_name'] == '') {
            $datadb = array( 
                'password' => hash("sha512", md5($this->input->post('b'))),
                'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
                'id_alamat' => $idalamat,
				'email' => $this->db->escape_str($this->input->post('d')),
                'no_telp' => $this->db->escape_str($this->input->post('e')),
                'foto' => $hasil['file_name'],
                
            );
        } else {
            $datadb = array( 
                'password' => hash("sha512", md5($this->input->post('b'))),
                'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
				'id_alamat' => $idalamat,
                'email' => $this->db->escape_str($this->input->post('d')),
                'no_telp' => $this->db->escape_str($this->input->post('e')),
                'foto' => $hasil['file_name'],
               
            );
        }
        
		$insert = $this->db->insert('supplier', $datadb);
		
		if($insert) {
			return TRUE;
		} else {
			return FALSE;
		}
    }

    function supplier_edit($id)
    {
        return $this->db->query("SELECT * FROM supplier where id_supplier='$id'");
    }

    function supplier_update()
    {
        $config['upload_path'] = 'assets/images/user/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
        $config['max_size'] = '1000'; // kb
        $this->load->library('upload', $config);
        $this->upload->do_upload('f');
        $hasil = $this->upload->data();
        if ($hasil['file_name'] == '' and $this->input->post('b') == '') {
            $datadb = array(
                
                'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
                'email' => $this->db->escape_str($this->input->post('d')),
                'no_telp' => $this->db->escape_str($this->input->post('e')),
                 
            );
        } elseif ($hasil['file_name'] != '' and $this->input->post('b') == '') {
            $datadb = array(
                
                'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
                'email' => $this->db->escape_str($this->input->post('d')),
                'no_telp' => $this->db->escape_str($this->input->post('e')),
                'foto' => $hasil['file_name'],
               
            );
        } elseif ($hasil['file_name'] == '' and $this->input->post('b') != '') {
            $datadb = array(
                
                'password' => hash("sha512", md5($this->input->post('b'))),
                'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
                'email' => $this->db->escape_str($this->input->post('d')),
                'no_telp' => $this->db->escape_str($this->input->post('e')),
                
            );
        } elseif ($hasil['file_name'] != '' and $this->input->post('b') != '') {
            $datadb = array(
                 
                'password' => hash("sha512", md5($this->input->post('b'))),
                'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
                'email' => $this->db->escape_str($this->input->post('d')),
                'no_telp' => $this->db->escape_str($this->input->post('e')),
                'foto' => $hasil['file_name'],
                 
            );
        }

        $this->db->where('username', $this->input->post('id'));
        $update = $this->db->update('supplier', $datadb);
		
		if($update) {
			return TRUE;
		} else {
			return FALSE;
		}
		
    }

    function supplier_delete($id)
    {
        return $this->db->query("DELETE FROM supplier where username='$id'");
    }
}
