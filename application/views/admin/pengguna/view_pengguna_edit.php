<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Admin</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Admin</li>
				<li class="active">Edit Admin</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
				<h3 class="box-title m-b-0">Edit Admin</h3><br/>
   
            <form action="<?= base_url('admin/pengguna/edit_pengguna') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            

                <input type='hidden' name='id' value='<?= $rows['id_pengguna'] ?>'>
			<input type='hidden' name='idalamat' value='<?= $rows['id_alamat'] ?>'>
   

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='c' value='<?= $rows['nama_lengkap'] ?>'>
                  </div>
                </div>
				
				
		<div class="form-group row">
                  <label class="col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='alamat' value='<?= $rows['alamat'] ?>'>
                  </div>
                </div>
				
				

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">No. Telp</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='e' value='<?= $rows['no_telp'] ?>'>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Ganti Foto</label>
                  <div class="col-sm-6">
                    <div class="custom-file">
                      <input type="file" class="" id="" name="f">
                       
                    </div>
                  </div>
                </div>

                <?php
                if ($rows['foto'] != '') { ?>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Foto Saat Ini</label>
                    <div class="col-sm-6">
                      <img src="<?= base_url('assets/images/user/') . $rows['foto'] ?>" alt="" style="height: 150px">
                    </div>
                  </div>
                <?php } ?>
				
				<br/><br/>
				
				             <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-6">
                    <input type='email' class='form-control' name='d' value='<?= $rows['email'] ?>' readonly='on'>
                  </div>
                </div>

        

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-6">
                    <input type='password' class='form-control' name='b' onkeyup="nospaces(this)">
                    <small class="font-italic">Kosongkan jika tidak ingin mengubahnya</small>
                  </div>
                </div>
				

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-6">
                    <button type='submit' name='submit' class='btn btn-success btn-sm'>Perbarui</button>
                    <a href='<?= base_url('admin/users'); ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
                  </div>
                </div>

              </div>
            </form>

          </div>
        </div>
      </div>
   