 <style>
 hr{
	 margin:7px 0px;
 }
 </style>
 <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Produk Supplier</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            
				<li class="active">Produk Supplier</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
			 <?php 
			 
				
			$log = $this->db->query("SELECT * FROM supplier
									WHERE id_supplier='$id_supplier'")->result_array();;		
		
			?>
			<h3 class="box-title m-b-0">Kelola Produk  <?= $log['nama_supplier'] ?> </h3>
			
			<br/>
		   
		   
		  <?php if($this->session->userdata('Sukses')!="") { ?>
		 <div class='alert alert-success'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Sukses"); ?></div>

		<?php  $this->session->unset_userdata('Sukses'); 
		
		} else if ($this->session->userdata('Gagal')!="") { ?>
		 <div class='alert alert-danger'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Gagal"); ?></div>
		  
		<?php  $this->session->unset_userdata('Gagal'); 
		}  ?>
		
		   
               

             <div class="table-responsive">
              <table id="kolom6" class="table table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 25%">Nama Produk</th> 
                    <th>Harga  (Rp)</th>
                    <th>Diskon (Rp)</th> 
                    <th>Varian / Stok</th> 
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record as $row) {
					  
					
					 
                    echo "<tr><td align='center'>$no</td>
                              <td>$row[nama_produk]</td>
                     
                              <td align='center'>" . rupiah($row['harga_konsumen']) . "</td>
                              <td align='center'>" . rupiah($row['diskon']) . "</td>
                              
							  <td>";
							  
					//$row[stok] &nbsp; $row[satuan]
							  
					$varians = $this->db->query("SELECT * FROM supplierprodukvarian 
									WHERE id_supplierproduk='$row[id_supplierproduk]'")->result_array();
                    
					 $all="";
					foreach ($varians as $varian) {
						$all.= " $varian[warna_produkvarian] <div class='pull-right'> $varian[stok_produkvarian] </div> <hr/>";
						
					}
						$all = substr($all,0,-5);	  
							  
					echo $all. " </td>
                             
                               
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
          url: site_url + 'produk/delete_produk/' + data_id,
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