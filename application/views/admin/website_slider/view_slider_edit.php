<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Slider Website</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Slider Website</li>
				<li class="active">Edit Slider</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
				<h3 class="box-title m-b-0">Edit Slider</h3><br/>
				
				
				
            <form action="<?= base_url('admin/slider/edit_slider') ?>" method="post" enctype="multipart/form-data">
              <div class="card-body">

                <input type='hidden' name='id' value='<?= $rows['id_slide'] ?>'>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Judul</label>
                  <div class="col-sm-6">
                    <input type="text" name="judul" id="" class="form-control" value="<?= $rows['judul'] ?>" required>
                  </div>
                </div>

           

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-6">
                    <textarea class='form-control' name='ket' style='height:120px'><?= $rows['ket'] ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Gambar Dekstop</label>
                  <div class="col-sm-6">
                    <div class="custom-file">
                      <input type='file' class='' name="file1">
                      
                      <small><span class="text-danger">*</span>Rekomendasi ukuran  870 px &#10005;  370 px</small><br>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-6">
                    <img class='img-thumbnail' style='height:100px' src='<?= base_url('assets/images/slider/') . $rows['gambar'] ?>'>
                  </div>
                </div>

             
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type='submit' name='submit' class='btn btn-success btn-sm'>Perbarui</button>
                    <a href='<?= base_url('admin/slider') ?>'><button type='button' class='btn btn-secondary btn-sm'>Batal</button></a>
                  </div>
                </div>

              </div>
            </form>

          </div>
        </div>
      </div>
 