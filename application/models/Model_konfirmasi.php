<?php
class Model_konfirmasi extends CI_model
{
    function konfirmasi()
    {
        return $this->db->query("SELECT * FROM konfirmasi 
		left join penjualan ON konfirmasi.id_penjualan=penjualan.id_penjualan 
		left join rekening ON konfirmasi.id_rekening=rekening.id_rekening
		ORDER BY konfirmasi.id_konfirmasi_pembayaran DESC");
    }

 
  

    function konfirmasi_update()
    {
        $datadb = array(
                'status_konfirmasi' => $this->db->escape_str($this->input->post('status')), 
            );
        
        $this->db->where('id_konfirmasi_pembayaran', $this->input->post('id'));
        $simpan = $this->db->update('konfirmasi', $datadb);
		
		if($this->db->escape_str($this->input->post('status'))=="Valid"){
			$data = array(
                'proses' => '1', 
            );
        
			$this->db->where('id_penjualan', $this->input->post('idpenjualan'));
			$this->db->update('penjualan', $data);
		}

		
		if($simpan) {
			return TRUE;
		} else {
			return FALSE;
		}
		
    }

 
}
