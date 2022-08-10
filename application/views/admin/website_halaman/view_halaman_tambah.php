<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Halaman Website</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Halaman Website</li>
				<li class="active">Tambah Halaman</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
				<h3 class="box-title m-b-0">Tambah Halaman</h3><br/>

            <form action="<?= base_url('admin/halaman/tambah_halaman') ?>" method="post" enctype="multipart">
              <div class="card-body">

                <input type='hidden' name='id' value=''>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Judul</label>
                  <div class="col-sm-10">
                    <input type='text' class='form-control' name='a'>
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Isi Halaman</label>
                  <div class="col-sm-10">
                    <textarea id="summernote" class='form-control' name='b'></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type='submit' name='submit' class='btn btn-success'>Simpan</button>
                    <a href='<?= base_url('admin/halaman') ?>'><button type='button' class='btn btn-secondary ml-1'>Batal</button></a>
                  </div>
                </div>

              </div>
            </form>

          </div>
        </div>
      </div>
     