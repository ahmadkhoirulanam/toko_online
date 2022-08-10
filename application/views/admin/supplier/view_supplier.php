 <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Supplier</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Pengaturan</li>
				<li class="active">Supplier</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
			<h3 class="box-title m-b-0">Kelola Supplier</h3><br/>
		   
		   
		   <?php if($this->session->userdata('Sukses')!="") { ?>
		 <div class='alert alert-success'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Sukses"); ?></div>

		<?php  $this->session->unset_userdata('Sukses'); 
		
		} else if ($this->session->userdata('Gagal')!="") { ?>
		 <div class='alert alert-danger'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Gagal"); ?></div>
		  
		<?php  $this->session->unset_userdata('Gagal'); 
		}  ?>
		
		   
			   <a class='btn btn-success btn-sm' href='<?= base_url('admin/supplier/tambah_supplier'); ?>'><i class='fa fa-plus'></i> Tambah Supplier</a><br/><br/>
            

            <div class="table-responsive">
              <table id="kolom4" class="table table-bordered" style="width:100%">

                <thead>
                  <tr>
                    <th width="50">No</th> 
                    
			<th> Perusahaan</th>     
		    <th> Contact Person</th> 
			  <th>Status</th>
			    <th>Produk</th>
                    <th width="100">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record as $row) {
                    if ($row['foto_supplier'] == '') {
                      $foto = 'default.jpg';
                    } else {
                      $foto = $row['foto_supplier'];
                    } 
					
					if($row['status_supplier']=="Aktif") {
						$status = "<span class='label label-success'>Aktif</span>";
					} else {
						$status = "<span class='label label-danger'>Non Aktif</span>";
					}
					 
					?>
                    <tr>
                      <td align="center"><?= $no; ?></td> 
                     
			<td><?= $row['nama_supplier'] ?> <br/> 
			 <?= $row['alamat_supplier'] ?><br/> 
			 <?= $row['email_supplier'] ?><br/> 
			 <?= $row['notelp_supplier'] ?></td> 
                      
                      <td><?= $row['nama_cp'] ?> <br/> 
			 <?= $row['notelp_cp'] ?></td> 
                      <td align="center"><?= $status ?></td> 
			  <td align="center">
			   <a class='btn btn-info btn-sm' title='Lihat Produk' data-id="<?= $row['id_supplier'] ?>" href="<?= base_url('admin/supplier/produk_supplier/') . $row['id_supplier'] ?>"><i class="fa fa-list"></i></a>
			  </td> 		  
			<td align="center">
                         
                          <a class='btn btn-success btn-sm' title='Reset Password' data-id="<?= $row['id_supplier'] ?>" href="<?= base_url('admin/supplier/edit_supplier/') . $row['id_supplier'] ?>"><i class="fa fa-pencil"></i></a>
                          <button class='btn btn-danger btn-sm' title='Hapus' data-id="<?= $row['id_supplier'] ?>" onclick="confirmation(event)"><i class='fa fa-times '></i></button>
                         
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
          url: site_url + 'admin/supplier/delete_supplier/' + data_id,
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
              location.reload()
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