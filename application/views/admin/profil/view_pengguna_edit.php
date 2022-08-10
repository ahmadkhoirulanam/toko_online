 
 
 <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">My Profile</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Profil</li>
				<li class="active">Edit Profil</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
				<h3 class="box-title m-b-0">Edit Profil Pengguna</h3><br/>
				
				
            <form action="<?= base_url('admin/profil') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
               

                <input type='hidden' name='id' value='<?= $rows['id_pengguna'] ?>'>

               

           
				
		  <?php
           
		   if ($rows['foto'] == '') { 
				$rows['foto'] = "noimages.jpeg";
		   } 
		  ?>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Foto  </label>
                    <div class="col-sm-6">
                      <img src="<?= base_url('assets/images/user/') . $rows['foto'] ?>" alt="" style="height: 150px">
						
						<br/>
						<input type="file" id="" name="f">
			</div>
                  </div>
                <br/><br/>
				
		
	 
                      
                      

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='c' value='<?= $rows['nama_lengkap'] ?>'>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">No. Telp</label>
                  <div class="col-sm-4">
                    <input type='number' class='form-control' name='e' value='<?= $rows['no_telp'] ?>'>
                  </div>
                </div>

		
			<br/><br/>
                
		<div class="form-group row">
                  <label class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-6">
                    <input type='email' class='form-control' name='d' value='<?= $rows['email'] ?>'>
                  </div>
                </div>
				
				
				
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-4">
                    <input type='password' class='form-control' name='b' onkeyup="nospaces(this)">
                    <small class="font-italic">Kosongkan jika tidak ingin mengubahnya</small>
                  </div>
                </div>
               

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-6">
                    <button type='submit' name='submit' class='btn btn-success'>Perbarui</button>
                    <a href='<?= base_url('admin/users'); ?>'><button type='button' class='btn btn-secondary ml-1'>Batal</button></a>
                  </div>
                </div>

              </div>
            </form>

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

