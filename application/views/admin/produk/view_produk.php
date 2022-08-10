
 <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Produk</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Toko</li>
				<li class="active">Produk</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
			<h3 class="box-title m-b-0">Kelola Produk</h3><br/>
		   
		   
		  <?php if($this->session->userdata('Sukses')!="") { ?>
		 <div class='alert alert-success'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Sukses"); ?></div>

		<?php  $this->session->unset_userdata('Sukses'); 
		
		} else if ($this->session->userdata('Gagal')!="") { ?>
		 <div class='alert alert-danger'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Gagal"); ?></div>
		  
		<?php  $this->session->unset_userdata('Gagal'); 
		}  ?>
		
		   
              <a class=' btn btn-success btn-sm' href='<?= base_url('admin/produk/tambah_produk'); ?>'><i class='fa fa-plus'></i> Tambah Produk</a><br/><br/>
            

             <div class="table-responsive">
              <table id="kolom6" class="table table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 25%">Nama Produk</th>
                    <th>Harga Modal (Rp)</th>
                    <th>Harga Jual (Rp)</th>
                    <th>Diskon (Rp)</th> 
                    <th>Varian / Stok</th>
                    <th width="130">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record as $row) {
					  
					
					 
                    echo "<tr><td align='center'>$no</td>
                              <td>$row[nama_produk]</td>
                              <td align='center'>" . rupiah($row['harga_beli']) . "</td>
                              <td align='center'>" . rupiah($row['harga_konsumen']) . "</td>
                              <td align='center'>" . rupiah($row['diskon']) . "</td>
                              
							  <td>";
							  
					//$row[stok] &nbsp; $row[satuan]
							  
					$varians = $this->db->query("SELECT * FROM produkvarian 
									WHERE id_produk='$row[id_produk]'")->result_array();
                    
					foreach ($varians as $varian) {
						echo " $varian[warna_produkvarian] -  $varian[stok_produkvarian] <br/>";
						
					}
							  
							  
					echo "</td>
                             
                              <td align='center'>
                                <a class='btn btn-success btn-sm' title='Kelola Varian' href='" . base_url() . "admin/produk/kelola_varian/$row[id_produk]'><i class='fa fa-list'></i></a>
								
								<a class='btn btn-success btn-sm' title='Ubah' href='" . base_url() . "admin/produk/edit_produk/$row[id_produk]'><i class='fa fa-pencil'></i></a>
								
								
                                <button class='btn btn-danger btn-sm' title='Hapus' data-id='$row[id_produk]' onclick=\"confirmation(event)\"><i class='fa fa-times '></i></button>
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
          url: site_url + 'admin/produk/delete_produk/' + data_id,
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