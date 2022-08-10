<style>
.dataTables_scrollBody {
	min-height:180px;
}
</style>
 
 
  <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Pesanan</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Toko</li>
				<li class="active">Pesanan</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
			<h3 class="box-title m-b-0">Kelola Pesanan</h3><br/>
		   
	 

            <div class="table-responsive">
              <table id="kolom6" class="table table-bordered table-striped" style="width:100%;">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th>Kode Transaksi</th>
                    <th>Total Belanja</th>
                    <th>Pengiriman</th>
                    <!--  <th>Tujuan</th>  -->
                    <th>Waktu Transaksi</th>
                    <th>Resi</th>
                    <th style="width:200px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record->result_array() as $row) {
                    if ($row['proses'] == '0') {
                      $proses = '<i class="text-danger">Pending</i>';
                      $color = 'danger';
                      $text = 'Pending';
                    } elseif ($row['proses'] == '1') {
                      $proses = '<i class="text-warning">Konfirmasi</i>';
                      $color = 'warning';
                      $text = 'Konfirmasi';
                    } elseif ($row['proses'] == '2') {
                      $proses = '<i class="text-primary">Proses</i>';
                      $color = 'primary';
                      $text = 'Proses';
                    } elseif ($row['proses'] == '3') {
                      $proses = '<i class="text-success">Dikirim</i>';
                      $color = 'success';
                      $text = 'Dikirim';
                    }

                   $total = $this->db->query("SELECT a.kode_transaksi, a.kurir, a.resi, a.service, a.proses, a.ongkir, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total, sum(c.berat*b.jumlah) as total_berat FROM `penjualan` a JOIN penjualandetail b ON a.id_penjualan=b.id_penjualan JOIN produk c ON b.id_produk=c.id_produk JOIN pengguna d ON a.id_pembeli=d.id_pengguna where a.kode_transaksi='$row[kode_transaksi]'")->row_array();

                  ?>
                    <tr>
                      <td align="center"><?= $no ?> </td>
                      <td align="center"><?= $row['kode_transaksi']; ?></td>
                      <td align="right" style=''><?= rupiah($total['total'] + $total['ongkir']) ?></td>
                      <td><span style='text-transform:uppercase'> <?= $total['kurir'] ?></span> <?= ($total['service']) ?></td>
                      <td><?= $row['waktu_transaksi'] ?></td>
                      <td><?= $total['resi'] ?></td>
                      <td align="center">
                        <div class='btn-group'>
                          <button style='width:100px' type='button' class='btn btn-<?= $color ?> btn-sm'><?= $text ?></button>

                          <button type='button' class='btn btn-<?= $color ?> btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <span class='caret'></span> <span class='sr-only'>Toggle Dropdown</span> </button>
                          <div class='dropdown-menu' style='border:1px solid #cecece; background:#FFF;'>
                            <a class='dropdown-item' href='<?= base_url('admin/pesanan/pesanan_status/') . $row['id_penjualan'] ?>/0' onclick="return confirm('Apa anda yakin untuk ubah status jadi Pending ?')"> Pending</a>
                            <a class='dropdown-item' href='<?= base_url('admin/pesanan/pesanan_status/') . $row['id_penjualan'] ?>/1' onclick="return confirm('Apa anda yakin untuk ubah status jadi Konfirmasi ?')"> Konfirmasi</a>
                            <a class='dropdown-item' href='<?= base_url('admin/pesanan/pesanan_status/') . $row['id_penjualan'] ?>/2' onclick="return confirm('Apa anda yakin untuk ubah status jadi Proses ?')"> Proses</a>
                            <a class='dropdown-item' href='<?= base_url('admin/pesanan/pesanan_dikirim/') . $row['id_penjualan'] ?>/3' onclick="return confirm('Apa anda yakin untuk ubah status jadi Dikirim ?')"> Dikirim</a>
                          </div>
                        </div>

                        <a class='btn btn-info btn-sm' title='Detail data pesanan' href=' <?= base_url('admin/pesanan/tracking/') . $row['kode_transaksi'] ?>' target='_blank'><i class='fa fa-search'></i></a>
						
						
                        <a class='btn btn-success btn-sm' title='Input Resi' href='<?= base_url('admin/pesanan/pesanan_dikirim/') . $row['id_penjualan'].'/'.$row['kode_transaksi']; ?>'><i class='fa fa-truck'></i></a>
                      </td>
                    </tr>
                  <?php
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
			  
            </div>

          </div>

        </div>
      </div>
    