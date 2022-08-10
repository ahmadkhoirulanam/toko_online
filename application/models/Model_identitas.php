<?php
class Model_identitas extends CI_model
{

   


    function identitas()
    {
        return $this->db->query("SELECT * FROM identitas ORDER BY id_identitas DESC LIMIT 1");
    }

    function identitas_update()
    {
       
       
		
		$config['upload_path'] = 'assets/images/favicon/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|ico';
		$config['max_size'] = '3500'; // kb
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
	
	  
		if ($this->upload->do_upload('fav')) {
			
			$hasil = $this->upload->data();
			
			if($hasil['file_name']!="") {
				$datafav = array( 
					'favicon' => $hasil['file_name'],
				); 
				$this->db->where('id_identitas', 1);
				$this->db->update('identitas', $datafav);
			}
			
		}  
			
			
		$config2['upload_path'] = 'assets/images/logo/';
		$config2['allowed_types'] = 'jpeg|jpg|png';
		$config2['max_size'] = '3500'; // kb
		$config2['encrypt_name'] = TRUE;
			
		$this->load->library('upload', $config2);	
		 
		
		if ($this->upload->do_upload('logo')) {
			
			$hasil2 = $this->upload->data();
			
			if($hasil2['file_name']!="") {
				$datalogo = array( 
					'logo' => $hasil2['file_name'],
				); 
				$this->db->where('id_identitas', 1);
				$this->db->update('identitas', $datalogo);
			}
			
			
		}  
			
			 
		
		
		$datadb = array(
                'nama_website' => $this->db->escape_str($this->input->post('nama')),
                'email' => $this->db->escape_str($this->input->post('email')),
                'url' => $this->db->escape_str($this->input->post('url')), 
                'no_telp' => $this->db->escape_str($this->input->post('telp')),
                'kota_id' => $this->db->escape_str($this->input->post('kota')),
                'alamat' => $this->db->escape_str($this->input->post('alamat')),
                'meta_deskripsi' => $this->db->escape_str($this->input->post('des')),
                'meta_keyword' => $this->db->escape_str($this->input->post('key')),  
            ); 
        $this->db->where('id_identitas', 1);
        $simpan = $this->db->update('identitas', $datadb);
		
		if($simpan) {
			return TRUE;
		} else {
			return FALSE;
		}
		
    }

   
}
