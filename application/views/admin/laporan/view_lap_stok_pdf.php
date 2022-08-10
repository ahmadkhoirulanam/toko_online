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
			
	 
				<h3 style="text-align:center;">LAPORAN STOK  </h3>
				 
				
				Tgl Cetak : <?= date("d-m-Y");?>
                            
				<table id="laporan" class="tableku" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga Modal (Rp)</th>
                    <th>Harga Jual (Rp)</th>
                    <th>Diskon (Rp)</th> 
                    <th>Warna</th> 
					<th>Berat</th> 
					<th>Stok</th> 
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record as $row) {
                    // $jual = $this->model_app->jual($row['id_produk'])->row_array();
                    // $beli = $this->model_app->beli($row['id_produk'])->row_array();
                    echo "<tr><td align='center'>$no</td>
                              <td>$row[nama_produk]</td>
                              <td align='right'>" . rupiah($row['harga_beli']) . "</td>
                              <td align='right'>" . rupiah($row['harga_konsumen']) . "</td>
                              <td align='right'>" . rupiah($row['diskon']) . "</td>
                              
							  ";
							  
					//$row[stok] &nbsp; $row[satuan]
							  
					$varians = $this->db->query("SELECT * FROM produkvarian 
									WHERE id_produk='$row[id_produk]'")->result_array();
                     
					$x=1;
					foreach ($varians as $varian) {
						if($x==1) {
							echo "<td width='80' align='center'> $varian[warna_produkvarian] </td><td align='center' width='80'>  $varian[berat_produkvarian] </td><td align='center' width='80'>  $varian[stok_produkvarian] </td></tr>";
						} else {
							echo "<tr><td></td><td></td><td></td><td></td><td></td><td width='80' align='center'> $varian[warna_produkvarian] </td><td align='center' width='80'>  $varian[berat_produkvarian] </td><td align='center' width='80'>  $varian[stok_produkvarian] </td></tr>";
						}
						
						$x++;
						 
					}
					if(sizeof($varians)==0) {
						echo "<td align='center'>  </td><td>   </td><td>  </td></tr>";
					}
							  
							  
					echo "</tr>";
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
           			
							
							
 </body>
 </html>
 