<?php


class Model_kategori_produk extends CI_model
{
    
    function semua_kategori_produk($start, $limit)
    {
        return $this->db->query("SELECT * FROM kategoriproduk ORDER BY id_kategori_produk ASC LIMIT $start,$limit");
    }

   
}
