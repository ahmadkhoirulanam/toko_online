<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Varian Produk</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Produk</li>
							 
				<li class="active">Kelola Varian</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
						
						 <?php if($this->session->userdata('Sukses')!="") { ?>
						 <div class='alert alert-success'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Sukses"); ?></div>

						<?php  $this->session->unset_userdata('Sukses'); 
						
						} else if ($this->session->userdata('Gagal')!="") { ?>
						 <div class='alert alert-danger'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Gagal"); ?></div>
						  
						<?php  $this->session->unset_userdata('Gagal'); 
						}  ?>
				
				
				<div class="row">
				<div class="col-lg-6">
				
					<h3 class="box-title m-b-0">Kelola Varian Produk</h3><br/>
				
					<table class="table table-bordered">
						<tr><td>Nama Produk</td><td><?= $rows['nama_produk'] ?></td></tr>
						<tr><td>Foto</td><td><img src="<?= base_url('assets/images/produk/') . $rows['gambar'] ?>" alt="" style="height: 150px"></td></tr>
					</table>

				</div>
				<div class="col-lg-6">
				
				
				<button  onclick="showAjaxModal('<?php echo base_url()."admin/produk/tambah_varian/".$rows['id_produk']; ?>');"  class='btn btn-sm btn-success' title="Tambah Varian Produk" ><i class='fa fa-plus'></i> Tambah Varian</button> <br/><br/>
				
				
					 <div class="table-responsive">
					  <table class="table table-bordered" style="width:100%">

						<thead>
						  <tr> 
							<th>Warna</th>  
							<th>Stok</th> 
							<th width="100">Aksi</th>
						  </tr>
						</thead>
						<tbody>
						  <?php
						  $no = 1;
						  foreach ($varians as $row) {
							 
							?>
							<tr>
							  
								<td align="center"><?= $row['warna_produkvarian'] ?></td> 
								<td align="center"><?= $row['stok_produkvarian'] ?></td> 
							   
							  <td align="center">
								 
								  
								  
								  <button  onclick="showAjaxModal('<?= base_url('admin/produk/edit_varian/'.$rows['id_produk'].'/'.$row['id_produkvarian']) ?>');"  class='btn btn-sm btn-warning' title="Edit Varian" ><i class='fa fa-pencil'></i></button> 
								  
								  <button class='btn btn-danger btn-sm' title='Hapus' data-id="<?= $row['id_produkvarian'] ?>" onclick="confirmation(event)"><i class='fa fa-times '></i></button>
								 
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
          url: site_url + 'admin/produk/delete_varian/' + data_id,
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