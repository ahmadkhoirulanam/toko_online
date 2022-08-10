<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Rekening</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Rekening</li>
				<li class="active">Edit Rekening</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
				<h3 class="box-title m-b-0">Edit Data Rekening</h3><br/>

            <form action="<?= base_url('admin/rekening/edit_rekening'); ?>" enctype="multipart/form-data" method="post">

              

                <input type='hidden' name='id' value='<?= $rows['id_rekening']; ?>'>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Bank</label>
                  <div class="col-sm-10">
                    <input type='text' class='form-control' name='a' value='<?= $rows['nama_bank']; ?>' required>
                  </div>
                </div>
				
		
		  <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Ganti Logo</label>
                  <div class="col-sm-6">
                    <div class="custom-file">
                      <input type="file" class="" id="" name="f">
                      <input type="hidden" name="logolama" value="<?= $rows['logo_bank']?>">
                    </div>
                  </div>
                </div>
		
		 <?php
         if ($rows['logo_bank'] != '') { ?>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Logo Saat Ini</label>
                    <div class="col-sm-6">
                      <img src="<?= base_url('assets/images/rekening/') . $rows['logo_bank'] ?>" alt="" style="height: 150px">
                    </div>
                  </div>
                <?php } ?>
				

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">No. Rekening</label>
                  <div class="col-sm-10">
                    <input type='text' class='form-control' name='b' value='<?= $rows['no_rekening']; ?>' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Atas Nama</label>
                  <div class="col-sm-10">
                    <input type=' text' class='form-control' name='c' value='<?= $rows['pemilik_rekening']; ?>' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type='submit' name='submit' class='btn btn-success btn-sm'>Perbarui</button>
                    <a href='<?= base_url('admin/rekening'); ?>'><button type='button' class='btn btn-secondary btn-sm'>Batal</button></a>
                  </div>
                </div>

              </div>
            </form>

          </div>
        </div>
      </div>
 