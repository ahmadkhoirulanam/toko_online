<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Laporan Penjualan</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Laporan</li>
				<li class="active">Lap. Penjualan</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
				<h3 class="box-title m-b-0">Laporan Penjualan</h3><br/>

				<div class="row">
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self">
					
					 <div class="form-group row">
						  <label class="col-sm-2 col-form-label">Tanggal</label>
						  <div class="col-sm-3">
							 <input name="tglawal" type="text" id="tanggal" class="form-control" value="<?= $tglAwal; ?>" data-date-format="yyyy-mm-dd" style="width:150px;" />  
						  </div>
						  
						  <div class="col-sm-3">
							 <input name="tglakhir" type="text" id="tanggal2" class="form-control" value="<?= $tglAkhir; ?>"  data-date-format="yyyy-mm-dd" style="width:150px;" /> 
						  </div>
						  <div class="col-sm-2">
							 <input name="btnTampil" type="submit" value=" Tampilkan " class="btn btn-success" />
						  </div>
						  
						  
						</div>
				
				 
					  
					  
					   
					 
				</form>
				<br /> 
				</div>
				
				<div class="pull-right"> <a href="<?= base_url() ?>admin/laporan/laporanpdf/?tglawal=<?php echo $tglAwal;?>&tglakhir=<?php echo $tglAkhir;?>" class="btn btn-sm btn-danger" target="_blank">PDF</a></div>
				<div class="clearfix"></div><br />
				
				<center><h2>LAPORAN PENJUALAN</h2><br/>
				<h3 style="margin-top:-30px;">Tanggal <?= tgl_indo($tglAwal) ?> s/d <?= tgl_indo($tglAkhir) ?></h3>
				</center>
				
				<br/><br/>
				<div class="table-responsive">
                            <table id="laporan" class="table table-bordered" style="width:100%">

                                <thead>
                                    
                                    <tr>
                                        <th width="50">No</th>
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
											<td style='color:red;' align="center"><?= rupiah($total['total'] + $total['ongkir']) ?></td>
                                            
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                       
				</div>
				
				<br/><br/>
				 </div>

                    </div>

                </div>
     

 