<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Supplier</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Supplier</li>
				<li class="active">Tambah Supplier</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
				<h3 class="box-title m-b-0">Tambah Supplier</h3><br/>

            <form action="<?= base_url('admin/supplier/tambah_supplier') ?>" method="post" enctype="multipart/form-data">
              <div class="card-body">


		  

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama Perusahaan</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='c' required>
                  </div>
                </div>

		  <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Alamat Perusahaan</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='alamat' required>
                  </div>
                </div>


            

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">No. Telp Perusahaan</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='e' required>
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"> Foto / Logo Perusahaan</label>
                  <div class="col-sm-6">
                    <div class="custom-file">
                      <input type="file" class="" id="" name="f">
                       
                    </div>
                  </div>
                </div>


		<br/><br/>
		
		

		<div class="form-group row">
                  <label class="col-sm-3 col-form-label">Email Perusahaan</label>
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

		
		<br/><br/>
			

               
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama Contact Person</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='nama_cp' required>
                  </div>
                </div>

		
            

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">No. Telp. Contact Person</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='notelp_cp' required>
                  </div>
                </div>

		  <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Jabatan Contact Person</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='jabatan_cp' required>
                  </div>
                </div>




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
   