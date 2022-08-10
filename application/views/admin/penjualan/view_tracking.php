 
  <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Pesanan</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Toko</li>
				<li class="active">Detail Pesanan </li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
			<h3 class="box-title m-b-0">Detail Pesanan </h3><br/>
		   


              <?php
              if ($total['proses'] == '0') {
                $proses = '<span class="text-danger">Pending</span>';
                $color = 'danger';
                $text = 'Pending';
              } elseif ($total['proses'] == '1') {
                $proses = '<span class="text-warning">Konfirmasi</span>';
                $color = 'warning';
                $text = 'Konfirmasi';
              } elseif ($total['proses'] == '2') {
                $proses = '<span class="text-primary">Proses</span>';
                $color = 'primary';
                $text = 'Proses';
              } elseif ($total['proses'] == '3') {
                $proses = '<span class="text-success">Dikirim</span>';
                $color = 'success';
                $text = 'Dikirim';
              }
              ?>

             

              
                <div class='btn-group' >
                  <button style='width:100px' type='button' class='btn btn-<?= $color ?> btn-sm'  ><?= $text ?></button>

                  <button type='button' class='btn btn-<?= $color ?> btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'  > <span class='caret'></span> <span class='sr-only'>Toggle Dropdown</span> </button>
                  <div class='dropdown-menu' style='border:1px solid #ccc !important;'>
                    <a class='dropdown-item' href='<?= base_url('admin/pesanan/pesanan_status2/') . $total['id_penjualan'] ?>/0/<?= $this->uri->segment(4) ?>' onclick="return confirm('Apa anda yakin untuk ubah status jadi Pending ?')"> Pending</a>
                    <a class='dropdown-item' href='<?= base_url('admin/pesanan/pesanan_status2/') . $total['id_penjualan'] ?>/1/<?= $this->uri->segment(4) ?>' onclick="return confirm('Apa anda yakin untuk ubah status jadi Konfirmasi ?')"> Konfirmasi</a>
                    <a class='dropdown-item' href='<?= base_url('admin/pesanan/pesanan_status2/') . $total['id_penjualan'] ?>/2/<?= $this->uri->segment(4) ?>' onclick="return confirm('Apa anda yakin untuk ubah status jadi Proses ?')"> Proses</a>
                    <a class='dropdown-item' href='<?= base_url('admin/pesanan/pesanan_dikirim2/') . $total['id_penjualan'] ?>/3/<?= $this->uri->segment(4) ?>' onclick="return confirm('Apa anda yakin untuk ubah status jadi Dikirim ?')"> Dikirim</a>
                  </div>
                </div>

                <a class='btn btn-success btn-sm' href='<?php echo base_url('admin/pesanan'); ?>'>Kembali</a>
              <br/><br/>

            <div class="card-body">
              <div class="row">


                <div class="col-md-6">
                  <table class="table table-sm table-borderless" style="width: 100%">
                    <tr>
                      <td style="width:120px;">Nama</td>
                      <td><?= $rows['nama_lengkap']; ?></td>
                    </tr>
                    <tr>
                      <td>No. Telepon</td>
                      <td><?= $rows['no_telp']; ?></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>
                        <?= $rows['alamat']; ?><br>
                        Kec. <?= $rows['kecamatan']; ?><br>
                        <?= $rows['nama_kota']; ?><?= $rows['kode_pos']; ?>
                      </td>
                    </tr>
                  </table>

                </div>
                <div class="col-md-6">

                  <table class="table table-sm table-borderless" style="width: 100%">
                    <tr>
                      <td style="width:120px;">Total Bayar</td>
                      <td>Rp <?= rupiah($total['total'] + $total['ongkir']); ?></td>
                    </tr>
                    <tr>
                      <td>Pengiriman</td>
                      <td><span style='text-transform:uppercase'><?= $total['kurir']; ?> <?= $total['service'] ?></span></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td><?= $proses ?></td>
                    </tr>

                    <?php if ($total['proses'] == '3') { ?>
                      <tr>
                        <td>No. Resi</td>
                        <td><?= $total['resi']; ?></td>
                      </tr>
                    <?php } ?>

                  </table>
                </div>

              </div>
              
		<br/>	<br/>  
		<div class="row">

                <div class="col-md-12">
                  <table class='table table-bordered' style="">
                    <thead>
                      <tr class="border border-dark">
                        <th width='10px'>No</th>
                        <th width='40%'>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Berat</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                       
                      foreach ($record->result_array() as $row) {
                        $sub_total = (($row['harga_jual'] - $row['diskon']) * $row['jumlah']);
                        if ($row['diskon'] != '0') {
                          $diskon = "<del style='color:red'>" . rupiah($row['harga_jual']) . "</del>";
                        } else {
                          $diskon = "";
                        }
						
                        if (trim($row['gambar']) == '') {
                          $foto_produk = 'no-image.png';
                        } else {
                          $foto_produk = $row['gambar'];
                        }
                                                $diskon_total = $diskon_total + $row['diskon'] * $row['jumlah'];
                      ?>

                        <tr>
                          <td align="center"><?= $no ?></td>
                          <td><a href='<?= base_url('produk/detail/') . $row['produk_seo'] ?>'><?= $row['nama_produk']; ?></a></td>
                          <td align="right"><?= rupiah($row['harga_jual'] - $row['diskon']) . " " . $diskon ?></td>
                          <td align="center"><?= $row['jumlah'] ?></td>
                          <td><?= ($row['berat_satuan'] * $row['jumlah']) ?> gram</td>
                          <td align="right">Rp <?= rupiah($sub_total) ?></td>
                        </tr>
                      <?php
                        $no++;
                      }
                      ?>
                      <tr>
                        <td colspan='5'>Subtotal  </td>
                        <td align="right">Rp <?= rupiah($total['total']) ?></td>
                      </tr>
			  <tr>
                        <td colspan='5'>Berat</td>
                        <td align="right"><?= $total['total_berat'] ?> gram</td>
                      </tr>
					  
					  
                      <tr>
                        <td colspan='5'>Biaya Kirim </td>
                        <td align="right">Rp <?= rupiah($total['ongkir']) ?></td>
                      </tr>

			  <tr>
                        <td colspan='5'>Total Tagihan</td>
                        <td align="right">Rp <?= rupiah($total['total'] + $total['ongkir']); ?></td>
                      </tr>
                    

                    </tbody>
                  </table><br>
                </div>

              </div>

              <div class="row">
                <div class="col-md-12">
                  <?php

                  $cek_konfirmasi = $this->db->get_where('konfirmasi', array('id_penjualan' => $total['id_penjualan']));
                  if ($cek_konfirmasi->num_rows() >= 1) {
                   
                    $konfirmasi = $this->model_app->view_join_where('konfirmasi', 'rekening', 'id_rekening', array('id_penjualan' => $total['id_penjualan']), 'id_konfirmasi_pembayaran', 'DESC');
                    foreach ($konfirmasi as $r) {
						
						 echo "<div class='alert-primary' style='border-radius:0px; padding:5px'>Konfirmasi Pembayaran dari Pembeli : </div>";
                  ?>
                      
                        <table class="table table-sm table-borderless">
                          <tr>
                            <td style="width:140px;">Nama Pengirim</td>

                            <td><?= $r['nama_pengirim'] ?></td>
                          </tr>

                          <tr>
                            <td>Total Transfer</td>

                            <td><?= $r['total_transfer'] ?></td>
                          </tr>

                          <tr>
                            <td>Tanggal Transfer</td>

                            <td><?= tgl_indo($r['tanggal_transfer']) ?></td>
                          </tr>

                          <tr>
                            <td>Bukti Transfer</td>

                            <td><a href='<?= base_url('assets/images/bukti/') . $r['bukti_transfer'] ?>' target="_blank">Lihat File</a></td>
                          </tr>

                          <tr>
                            <td>Rekening Tujuan</td>

                            <td><?= $r['nama_bank'] ?> - <?= $r['no_rekening'] ?> - <?= $r['pemilik_rekening'] ?></td>
                          </tr>

                          <tr>
                            <td>Waktu Konfirmasi</td>

                            <td><?= $r['waktu_konfirmasi'] ?></td>
                          </tr>


                        </table>
                       
				<br><br>
                      
                  <?php
                    }
                  }
                  ?>
				  
				  
                </div>
				
			
<div class="clearfix"></div>
              </div>
            </div>

          </div>
        </div>
		
		
		
		   </div>   </div>