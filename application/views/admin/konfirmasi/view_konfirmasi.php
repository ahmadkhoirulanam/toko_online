
 <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Konfirmasi Pembayaran</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Toko</li>
				<li class="active">Konfirmasi Pembayaran</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		  
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
			<h3 class="box-title m-b-0">Kelola Konfirmasi Pembayaran</h3><br/><br/>


	<?php if($this->session->userdata('Sukses')!="") { ?>
		 <div class='alert alert-success'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Sukses"); ?></div>

		<?php  $this->session->unset_userdata('Sukses'); 
		
		} else if ($this->session->userdata('Gagal')!="") { ?>
		 <div class='alert alert-danger'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Gagal"); ?></div>
		  
		<?php  $this->session->unset_userdata('Gagal'); 
		}  ?>
		
			
			
 

            <div class="table-responsive">
              <table id="kolom7" class="table table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th width="50"> No</th>
                    <th>No. Invoice</th>
                    <th>Tgl Konfirmasi</th>
                    <th>Total Transfer</th>
			<th>Tgl Transfer</th>
			<th>Bank Tujuan</th> 
			<th>Status</th> 
                    <th width="100">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record->result_array() as $row) {
					  
					 if ($row['status_konfirmasi'] == 'Baru' or $row['status_konfirmasi'] == '') {
                      $status = '<span class="btn btn-xs btn-warning">Baru</span>'; 
                    } elseif ($row['status_konfirmasi'] == 'Valid') {
                      $status = '<span class="btn btn-xs btn-success">Valid</span>'; 
                    } elseif ($row['status_konfirmasi'] == 'Tidak Valid') {
                      $status = '<span class="btn btn-xs btn-danger">Tidak Valid</span>'; 
                    } 
					
                    echo "<tr><td align='center'>$no</td>
                              <td align='center'>$row[kode_transaksi]</td>
                              <td align='center'>".tgljam_indo($row[waktu_konfirmasi])."</td>
                              <td>$row[total_transfer]</td>
							  <td align='center'>".tgl_indo($row[tanggal_transfer])."</td>
							  <td align='center'>$row[nama_bank]</td> 
							  <td align='center'>$status</td> 
                              <td align='center'>
                                <a class='btn btn-success btn-sm' title='Edit Status' href='" . base_url() . "admin/konfirmasi/edit_konfirmasi/$row[id_konfirmasi_pembayaran]'><i class='fa fa-pencil'></i></a>
                                 
                              </td>
                          </tr>";
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    


<?php if($this->session->userdata('Sukses')!="") { ?>

 <script>
 $(document).ready(function(){
   	Swal.fire({
	  title: 'Berhasil!',
	  text: '<?php echo $this->session->userdata("Sukses"); ?>',
	  icon: 'success',
	  showConfirmButton: false,
	  timer: 3000
	});
 });
</script>

<?php  $this->session->unset_userdata('Sukses'); 
} else if ($this->session->userdata('Gagal')!="") { ?>
 
 <script>
 $(document).ready(function(){
   	Swal.fire({
	  title: 'Gagal!',
	  text: '<?php echo $this->session->userdata("Gagal"); ?>',
	  icon: 'warning',
	  showConfirmButton: false,
	  timer: 3000
	});
 });
</script>

<?php  $this->session->unset_userdata('Gagal'); 
}  ?>



<script>
  function confirmation(ev) {
    ev.preventDefault();
    var data_id = ev.currentTarget.getAttribute('data-id');
    var currentLocation = window.location;
    Swal.fire({
      title: 'Konfirmasi Hapus Data',
      text: "Apakah Anda ingin menghapus data ini?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus',
      cancelButtonText: 'Batal',
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: site_url + 'admin/rekening/delete_rekening/' + data_id,
          type: "POST",
          dataType: "JSON",
          success: function(data) {
            Swal.fire({
              title: 'Dihapus!',
              text: 'Data berhasil dihapus',
              icon: 'success',
              showConfirmButton: false,
              timer: 1500
            }).then(() => {
              location.reload();
            })
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.debug(jqXHR);
            console.debug(textStatus);
            console.debug(errorThrown);
          },
        });
      }
    })
  }
</script>