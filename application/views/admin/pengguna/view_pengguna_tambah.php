<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Admin</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Admin</li>
				<li class="active">Tambah Admin</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
				<h3 class="box-title m-b-0">Tambah Admin</h3><br/>

            <form action="<?= base_url('admin/pengguna/tambah_pengguna') ?>" method="post" enctype="multipart/form-data">
              <div class="card-body">


		  

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='c' required>
                  </div>
                </div>

		  <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='alamat' required>
                  </div>
                </div>


            

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">No. Telp</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='e' required>
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Unggah Foto</label>
                  <div class="col-sm-6">
                    <div class="custom-file">
                      <input type="file" class="" id="" name="f">
                       
                    </div>
                  </div>
                </div>


		<br/><br/>
		
		

		<div class="form-group row">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-6">
                    <input type='email' class='form-control' name='d' required>
                  </div>
                </div>

 


                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-6">
                    <input type='password' class='form-control' name='b' onkeyup="nospaces(this)" required>
                  </div>
                </div>

			
			

                <!-- <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Level</label>
                  <div class="col-sm-6">
                    <input type='radio' name='g' value='1'> Super Admin (Pemilik) &nbsp; <input type='radio' name='g' value='2'> Admin 
                  </div>
                </div> -->

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-6">
                    <button type='submit' name='submit' class='btn btn-success btn-sm'>Simpan</button>
                    <a href='<?= base_url('admin/user') ?>'><button type='button' class='btn btn-secondary btn-sm'>Batal</button></a>
                  </div>
                </div>

              </div>
            </form>

          </div>
        </div>
      </div>
   