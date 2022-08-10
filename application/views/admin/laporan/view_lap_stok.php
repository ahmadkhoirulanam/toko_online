<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Laporan Stok</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Laporan</li>
				<li class="active">Lap. Stok</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
				<h3 class="box-title m-b-0">Laporan Stok</h3><br/>
				
				
				<div class="pull-right"> <a href="<?= base_url() ?>admin/stok/laporanpdf" class="btn btn-sm btn-danger" target="_blank">PDF</a></div>
				<div class="clearfix"></div><br />
 
 
				 <div class="table-responsive">
              <table id="laporan" class="table table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 25%">Nama Produk</th>
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
                     
					$no=1;
					foreach ($varians as $varian) {
						if($no==1) {
							echo "<td width='80' align='center'> $varian[warna_produkvarian] </td><td align='center' width='80'>  $varian[berat_produkvarian] </td><td align='center' width='80'>  $varian[stok_produkvarian] </td></tr>";
						} else {
							echo "<tr><td></td><td></td><td></td><td></td><td></td><td width='80' align='center'> $varian[warna_produkvarian] </td><td align='center' width='80'>  $varian[berat_produkvarian] </td><td align='center' width='80'>  $varian[stok_produkvarian] </td></tr>";
						}
						
						$no++;
						 
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
            </div>

			
			
 
 
                    </div>

                </div>
			</div>

 