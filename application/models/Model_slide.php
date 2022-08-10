<?php
class Model_slide extends CI_model
{
 

    function slide()
    {
        return $this->db->query("SELECT * FROM slide ORDER BY id_slide DESC");
    }

    function slide_tambah()
    {
        $config['upload_path'] = 'assets/images/slider/';
        $config['allowed_types'] = 'gif|jpg|png|JPG';
        $config['max_size'] = '3000'; // kb
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        $this->upload->do_upload('file1');
        $file1 = $this->upload->data();


        $datadb = array(

            'judul' => $this->input->post('judul'), 
            'ket' => $this->db->escape_str($this->input->post('ket')),
            'gambar' => $file1['file_name'], 
            'waktu' => date('Y-m-d H:i:s')
        );

        $simpan = $this->db->insert('slide', $datadb);
		if($simpan) {
			return TRUE;
		} else {
			return FALSE;
		}
		
    }

    function slide_update()
    {


        $config['upload_path'] = 'assets/images/slider/';
        $config['allowed_types'] = 'gif|jpg|png|JPG';
        $config['max_size'] = '3000'; // kb
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if (!empty($_FILES['file1']['name'])) {
            $this->upload->do_upload('file1');
            $file1 = $this->upload->data();
        }
 

        $query = $this->db->get_where('slide', array('id_slide' => $this->input->post('id')));
        $row = $query->row();
        $foto1 = $row->gambar; 
        $path = "assets/images/slider/";

        if ($file1['file_name'] == '') {
            $datadb = array(
                'judul' => $this->input->post('judul'), 
                'ket' => $this->db->escape_str($this->input->post('ket')),
            );
         
        } else {
            $datadb = array(
                'judul' => $this->input->post('judul'), 
                'ket' => $this->db->escape_str($this->input->post('ket')),
                'gambar' => $file1['file_name'], 
            );
			
            unlink($path . $foto1); 
        }

        $this->db->where('id_slide', $this->input->post('id'));
        $simpan = $this->db->update('slide', $datadb);
		
		if($simpan) {
			return TRUE;
		} else {
			return FALSE;
		}
    }

    function slide_edit($id)
    {
		$id=$this->uri->segment(4);
        return $this->db->query("SELECT * FROM slide where id_slide='$id'");
    }

    function slide_delete($id)
    {
		$id=$this->uri->segment(4);
        $query = $this->db->get_where('slide', array('id_slide' => $id));
        $row = $query->row();
        $foto1 = $row->gambar; 
        $path = "assets/images/slider/";

        unlink($path . $foto1); 

        $this->db->where('id_slide', $id);
        $hapus = $this->db->delete('slide');
		
		if($hapus) {
			return TRUE;
		} else {
			return FALSE;
		}
		
    }


 
 
}
