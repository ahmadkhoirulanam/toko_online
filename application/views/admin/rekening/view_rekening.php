
 <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Rekening</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Toko</li>
				<li class="active">Rekening</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		  
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
			<h3 class="box-title m-b-0">Kelola Rekening</h3><br/><br/>
			
			
			<?php if($this->session->userdata('Sukses')!="") { ?>
		 <div class='alert alert-success'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Sukses"); ?></div>

		<?php  $this->session->unset_userdata('Sukses'); 
		
		} else if ($this->session->userdata('Gagal')!="") { ?>
		 <div class='alert alert-danger'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Gagal"); ?></div>
		  
		<?php  $this->session->unset_userdata('Gagal'); 
		}  ?>


              <a class=' btn btn-success btn-sm' href='<?= base_url('admin/rekening/tambah_rekening'); ?>'><i class='fa fa-plus'></i> Tambah Rekening</a><br/><br/>
             

            <div class="table-responsive">
              <table id="kolom4" class="table table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th width="50"> No</th>
                    <th>Nama Bank</th>
					<th>Logo</th> 
                    <th>No Rekening</th>
                    <th>Atas Nama</th>
                    <th width="100">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record->result_array() as $row) {
					  
					 if ($row['logo_bank'] == '') {
                      $logo = 'noimage.png';
                    } else {
                      $logo = $row['logo_bank'];
                    }
					
					 
					
                    echo "<tr><td align='center'>$no</td>
                              <td>$row[nama_bank]</td> 
							  
							   <td align='center'><img width='150px' src='".base_url('assets/images/rekening/').$logo."'></td>
							   
							   
                              <td>$row[no_rekening]</td>
                              <td>$row[pemilik_rekening]</td>
                              <td align='center'>
                                <a class='btn btn-success btn-sm' title='Ubah' href='" . base_url() . "admin/rekening/edit_rekening/$row[id_rekening]'><i class='fa fa-pencil'></i></a>
                                <button class='btn btn-danger btn-sm' title='Hapus' data-id='$row[id_rekening]' onclick=\"confirmation(event)\"><i class='fa fa-times'></i></button>
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