<?php
class Model_laporan extends CI_model
{

    function laporan($tglawal, $tglakhir)
    {
         
		return $this->db->query("SELECT * FROM `penjualan` 
					WHERE proses='3' 
					AND (waktu_transaksi >= '". $tglawal." 00:00:01' AND waktu_transaksi <= '". $tglakhir." 23:59:59')
					ORDER BY waktu_transaksi ASC");
    }

     

 
}
