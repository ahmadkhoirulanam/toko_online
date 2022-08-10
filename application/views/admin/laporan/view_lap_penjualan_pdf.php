<html>
<head> 
<style>
    
 

.tableku {
border-collapse:collapse;
 

}

.tableku td{
border-collapse:collapse;
border:1px solid #666666;
 
padding-left:6px;
padding-right:6px;
}

img {
	margin-top:8px;
	padding-left:5px;
}

th {
	font-size:bolder;
 
	background-color:#ccc;
	border-collapse:collapse;
	border:1px solid #666666;
	text-align:center;
	text-transform:uppercase;
}


 
 
</style>
 </head>
 <body>
 
 <?php
$iden = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
?>

 
				<h2 style="text-align:center; margin-bottom:0px !important;"><?= strtoupper($iden['nama_website']); ?> </h2>
				<h3 style="text-align:center; margin-top:0px !important;"><small><?= $iden['alamat']; ?> <br/>
				Email : <?= $iden['email']; ?> | No.Telp. <?= $iden['no_telp']; ?></small></h3>
				
				<hr/>
			
	 
				<h3 style="text-align:center;">LAPORAN PENJUALAN <br/>
				<small>Tanggal <?= $tglAwal ?> s/d <?= $tglAkhir ?></small></h3>
				 
				
				Tgl Cetak : <?= date("d-m-Y");?>
                            <table class="tableku" style="width:100%">

                                <thead>
                                    
                                    <tr>
                                        <th width="40">No</th>
                                        <th>Waktu Transaksi</th>
                                        <th>Kode Transaksi</th> 
                                        <th>Pengiriman</th>
                                        <th>Kota Tujuan</th>
						 <th>Total Belanja (Rp)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
									$totalxx = 0;
                                    foreach ($record->result_array() as $row) {

                                        $total = $this->db->query("SELECT a.kode_transaksi, a.kurir, a.resi, a.service, a.proses, a.ongkir, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total, sum(c.berat*b.jumlah) as total_berat FROM `penjualan` a JOIN penjualandetail b ON a.id_penjualan=b.id_penjualan JOIN produk c ON b.id_produk=c.id_produk JOIN pengguna d ON a.id_pembeli=d.id_pengguna where a.kode_transaksi='$row[kode_transaksi]'")->row_array();
                                        
										$alamat = $this->db->query("SELECT id_alamat FROM pengguna WHERE id_pengguna=$row[id_pembeli]")->row_array();
                                        
										$kota = $this->db->query("SELECT a.nama_kota FROM `kota` a JOIN alamat b ON a.kota_id=b.id_kota where b.id_alamat='$alamat[id_alamat]'")->row_array();

                                    ?>
                                        <tr>
                                            <td align="center"><?= $no ?> </td>
                                            <td align="center"><?= $row['waktu_transaksi'] ?></td>
                                            <td align="center"><?= $row['kode_transaksi']; ?></td> 
                                            <td><span style='text-transform:uppercase'> <?= $total['kurir'] ?></span> <?= ($total['service']) ?></td>
                                            <td><?= $kota['nama_kota'] ?></td>
							<td align="right"> <?php  
											
							echo rupiah($total['total'] + $total['ongkir']);
							$totalxx = $totalxx + ($total['total'] + $total['ongkir']);
							?></td>
                                        </tr>
										
										
                                    <?php
                                        $no++;
                                    }
                                    ?>
									
						<tr>
                                            <td colspan="5" align="right"> TOTAL </td>
                                            <td align="right"><?= rupiah($totalxx) ?></td>
                                        </tr>
										
                                </tbody>
                            </table>
 
 </body>
 </html>
 