<style>
.dataTables_scrollBody {
	min-height:180px;
}
</style>
 
 
  <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Retur</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Toko</li>
				<li class="active">Retur</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
			<h3 class="box-title m-b-0">Kelola Retur</h3><br/>
		   
	 

            <div class="table-responsive">
              <table id="kolom6" class="table table-bordered table-striped" style="width:100%;">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th>Kode Transaksi</th> 
                    <th>Waktu Transaksi</th>
                    <th>Produk Retur </th>
			<th>Alasan Retur </th>
                    <th style="width:200px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record->result_array() as $row) {
                    if ($row['status_retur'] == 'Baru') {
                      $proses = '<i class="text-danger">Baru</i>';
                      $color = 'danger';
                      $text = 'Baru';
                    } elseif ($row['status_retur'] == 'Proses') {
                      $proses = '<i class="text-warning">Proses</i>';
                      $color = 'warning';
                      $text = 'Proses';
                    }   elseif ($row['status_retur'] == 'Selesai') {
                      $proses = '<i class="text-success">Selesai</i>';
                      $color = 'success';
                      $text = 'Selesai';
                    }

                   $total = $this->db->query("SELECT a.kode_retur, a.status_retur, b.alasan_retur as alasan_retur, c.nama_produk as nama_produk, b.warna as warna FROM `retur` a JOIN returdetail b ON a.id_retur=b.id_retur JOIN produk c ON b.id_produk=c.id_produk where a.kode_retur='$row[kode_retur]'")->row_array();

                  ?>
                    <tr>
                      <td align="center"><?= $no ?> </td>
                      <td align="center"><?= $row['kode_retur']; ?></td> 
                      <td><?= $row['waktu_transaksi'] ?></td>
                      <td><?= $total['nama_produk'] ?> <?= $total['warna'] ?></td>
		 <td><?= $total['alasan_retur'] ?></td>
                      <td align="center">
                        <div class='btn-group'>
                          <button style='width:100px' type='button' class='btn btn-<?= $color ?> btn-sm'><?= $text ?></button>

                          <button type='button' class='btn btn-<?= $color ?> btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <span class='caret'></span> <span class='sr-only'>Toggle Dropdown</span> </button>
                          <div class='dropdown-menu' style='border:1px solid #cecece; background:#FFF;'>
                            <a class='dropdown-item' href='<?= base_url('admin/retur/retur_status/') . $row['id_retur'] ?>/Proses' onclick="return confirm('Apa anda yakin untuk ubah status jadi Proses ?')"> Proses</a>
                            <a class='dropdown-item' href='<?= base_url('admin/retur/retur_status/') . $row['id_retur'] ?>/Selesai' onclick="return confirm('Apa anda yakin untuk ubah status jadi Selesai ?')"> Selesai</a> 
                          </div>
                        </div>

                        <a class='btn btn-info btn-sm' title='Detail data retur' href=' <?= base_url('admin/retur/tracking/') . $row['kode_retur'] ?>' target='_blank'><i class='fa fa-search'></i></a>
						
						
                      
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
    