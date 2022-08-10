<?php
class Model_pengguna extends CI_model
{
    function pengguna()
    {
        return $this->db->query("SELECT * FROM pengguna");
    }

    function pengguna_tambah()
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
                'level' => $this->db->escape_str($this->input->post('g')),
            );
        } else {
            $datadb = array( 
                'password' => hash("sha512", md5($this->input->post('b'))),
                'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
				'id_alamat' => $idalamat,
                'email' => $this->db->escape_str($this->input->post('d')),
                'no_telp' => $this->db->escape_str($this->input->post('e')),
                'foto' => $hasil['file_name'],
                'level' => $this->db->escape_str($this->input->post('g')),
            );
        }
        
		$insert = $this->db->insert('pengguna', $datadb);
		
		if($insert) {
			return TRUE;
		} else {
			return FALSE;
		}
    }

    function pengguna_edit($id)
    {
        return $this->db->query("SELECT * FROM pengguna where id_pengguna='$id'");
    }

    function pengguna_update()
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
                'level' => $this->db->escape_str($this->input->post('g')),
            );
        } elseif ($hasil['file_name'] != '' and $this->input->post('b') == '') {
            $datadb = array(
                
                'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
                'email' => $this->db->escape_str($this->input->post('d')),
                'no_telp' => $this->db->escape_str($this->input->post('e')),
                'foto' => $hasil['file_name'],
                'level' => $this->db->escape_str($this->input->post('g')),
            );
        } elseif ($hasil['file_name'] == '' and $this->input->post('b') != '') {
            $datadb = array(
                
                'password' => hash("sha512", md5($this->input->post('b'))),
                'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
                'email' => $this->db->escape_str($this->input->post('d')),
                'no_telp' => $this->db->escape_str($this->input->post('e')),
                'level' => $this->db->escape_str($this->input->post('g')),
            );
        } elseif ($hasil['file_name'] != '' and $this->input->post('b') != '') {
            $datadb = array(
                 
                'password' => hash("sha512", md5($this->input->post('b'))),
                'nama_lengkap' => $this->db->escape_str($this->input->post('c')),
                'email' => $this->db->escape_str($this->input->post('d')),
                'no_telp' => $this->db->escape_str($this->input->post('e')),
                'foto' => $hasil['file_name'],
                'level' => $this->db->escape_str($this->input->post('g')),
            );
        }

        $this->db->where('username', $this->input->post('id'));
        $update = $this->db->update('pengguna', $datadb);
		
		if($update) {
			return TRUE;
		} else {
			return FALSE;
		}
		
    }

    function pengguna_delete($id)
    {
        return $this->db->query("DELETE FROM pengguna where username='$id'");
    }
}
