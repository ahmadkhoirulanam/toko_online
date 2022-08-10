<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Slider Website</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Slider Website</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
			<h3 class="box-title m-b-0">Kelola Data Slider</h3><br/>
			
		
		<?php if($this->session->userdata('Sukses')!="") { ?>
		 <div class='alert alert-success'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Sukses"); ?></div>

		<?php  $this->session->unset_userdata('Sukses'); 
		
		} else if ($this->session->userdata('Gagal')!="") { ?>
		 <div class='alert alert-danger'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Gagal"); ?></div>
		  
		<?php  $this->session->unset_userdata('Gagal'); 
		}  ?>
		
		   
			  
              <a class='btn btn-success btn-sm' href='<?= base_url('admin/slider/tambah_slider'); ?>'><i class="fa fa-plus"></i> Tambah Slider</a><br/><br/>
             

             <div class="table-responsive">
              <table id="table1" class="table table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th width="50">No</th>
                    <th>Judul</th>
                    <th>Gambar</th> 
                    <th width="100">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record->result_array() as $row) { ?>

                    <tr>
                      <td align="center"><?= $no ?></td>
                      <td> <?= $row['judul'] ?></td>
                      <td align="center"><img src='<?= base_url('assets/images/slider/') . $row['gambar'] ?>' height="40px"></td>
                      
                      <td align="center">
                        <a class='btn btn-success btn-sm' title='Ubah' href='<?= base_url('admin/slider/edit_slider/') . $row['id_slide'] ?>'><i class='fa fa-pencil'></i></a>
                        <button class='btn btn-danger btn-sm' title='Hapus' data-id='<?= $row['id_slide'] ?>' onclick="confirmation(event)"><i class='fa fa-times'></i></button>
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
  <!--row -->


 



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
          url: site_url + 'admin/slider/delete_slider/' + data_id,
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