<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Member</a></li>
				<li class='active'>Riwayat Transaksi</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
				 
     
<div class="sidebar-widget hot-deals wow fadeInUp">
	<h3 class="section-title">MENU MEMBER</h3>
	    <ul>
            <li class="account-nav__item"><a href="<?= base_url('members/dashboard') ?>">Dashboard</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/edit_profile') ?>">Ubah Profil</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/edit_alamat') ?>">Ubah Alamat</a></li>
            <li class="account-nav__item account-nav__item--active"><a href="<?= base_url('members/riwayat_belanja') ?>">Riwayat Transaksi</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/password') ?>">Ganti Password</a></li>
            <li class="account-nav__item"><a href="javascript:void(0)" onclick="logout()">Keluar</a></li>
          </ul>
         
</div>
 
 
 	</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
            <div class="detail-block">
			<div class=" wow fadeInUp">
				
  <table id='table1' class='table table-sm table-borderless' style="width: 100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Invoice</th>
                  <th>Total Belanja</th>
                  <th>Status</th>
                  <th>Waktu Transaksi</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($record as $row) {
                  if ($row['proses'] == '0') {
                    $proses = '<i class="text-danger">Pending</i>';
                  } elseif ($row['proses'] == '1') {
                    $proses = '<i class="text-warning">Konfirmasi</i>';
                  } elseif ($row['proses'] == '2') {
                    $proses = '<i class="text-primary">Proses</i>';
                  } elseif ($row['proses'] == '3') {
                    $proses = '<i class="text-success">Dikirim </i>';
                  }
                  
				  $total = $this->db->query("SELECT a.kode_transaksi, a.kurir, a.service, a.proses, a.ongkir, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total, sum(c.berat*b.jumlah) as total_berat FROM `penjualan` a JOIN penjualandetail b ON a.id_penjualan=b.id_penjualan JOIN produk c ON b.id_produk=c.id_produk where a.kode_transaksi='$row[kode_transaksi]'")->row_array();
				  
                  echo "<tr><td>$no</td>
                              <td><a href='" . base_url() . "konfirmasi/tracking/$row[kode_transaksi]' target='_BLANK'>$row[kode_transaksi]</a></td>
                              <td style='color:red;'>Rp " . rupiah($total['total'] + $total['ongkir']) . "</td>
                              <td>$proses</td>
                              <td>" . cek_terakhir($row['waktu_transaksi']) . " lalu</td>
                              <td>
                               
								
								<a class='btn btn-danger' title='Download Invoice' href='" . base_url() . "page/download/$row[kode_transaksi]' target='_BLANK'><i class='fa fa-file-o'></i></a>
								
								
								<a class='btn btn-success' title='Konfirmasi Pembayaran' href='" . base_url() . "konfirmasi/?inv=$row[kode_transaksi]'><i class='fa fa-credit-card'></i></a>";
						
				  if ($row['proses'] == '3') {
					  
					  $jumlahretur = $this->model_app->view_where('retur', array('id_penjualan' => $row['id_penjualan']))->result();
					   $jumlahretur= sizeof($jumlahretur);
					 if($jumlahretur==0) {
						 echo " <a class='btn btn-warning' title='Retur Produk' href='" . base_url() . "retur/?inv=$row[kode_transaksi]' ><i class='fa fa-undo'></i></a>";
					 } else {
						 echo " <a class='btn btn-danger' title='Lihat Retur Produk' href='" . base_url() . "retur/?ret=$row[kode_transaksi]' ><i class='fa fa-undo'></i></a>";
					 }						 
                   
                  } else {
					  echo " <a class='btn btn-default' title='Retur Produk' href='#' ><i class='fa fa-undo'></i></a>";
				  }
					
					
								
                                
					echo "</td>
                          </tr>";
                  $no++;
                }
                ?>
              </tbody>
            </table>
         
   


			</div>
 
 
 
	
	
</div>
    
 
 

				</div>
			</div><!-- /.sidebar -->
			 <div class="clearfix"></div>
		</div><!-- /.row -->
		 

 
<br/>
<br/>




 
  
  
  
 