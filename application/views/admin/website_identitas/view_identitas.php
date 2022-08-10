<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Identitas Website </h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Edit Identitas Website</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
			
		<?php if($this->session->userdata('Sukses')!="") { ?>
		 <div class='alert alert-success'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Sukses"); ?></div>

		<?php  $this->session->unset_userdata('Sukses'); 
		
		} else if ($this->session->userdata('Gagal')!="") { ?>
		 <div class='alert alert-danger'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Gagal"); ?></div>
		  
		<?php  $this->session->unset_userdata('Gagal'); 
		}  ?>
                            

              <form action="<?= base_url('admin/website') ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Website</label>
                    <div class="col-sm-6">
                      <input type='text' class='form-control' name='nama' value="<?= $record['nama_website'] ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-4">
                      <input type='email' class='form-control' name='email' value="<?= $record['email'] ?>">
                    </div>
                  </div>

               
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">No. Telp</label>
                    <div class="col-sm-3">
                      <input type='text' class='form-control' name='telp' value="<?= $record['no_telp'] ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kota Toko</label>
                    <div class="col-sm-3">
                      <select class='form-control select2' name='kota' required>
                        <option value=''>- Pilih -</option>
                        <?php
                        $kota = $this->model_app->view('kota');
                        foreach ($kota->result_array() as $rows) {
                          if ($record['kota_id'] == $rows['kota_id']) {
                            echo "<option value='$rows[kota_id]' selected>$rows[nama_kota]</option>";
                          } else {
                            echo "<option value='$rows[kota_id]?>'>$rows[nama_kota]</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-6">
                      <textarea class='form-control' name='alamat' rows="3"><?= $record['alamat'] ?></textarea>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Meta Deskripsi</label>
                    <div class="col-sm-6">
                      <input type='text' class='form-control' name='des' value="<?= $record['meta_deskripsi'] ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Meta Keyword</label>
                    <div class="col-sm-6">
                      <input type='text' class='form-control' name='key' value="<?= $record['meta_keyword'] ?>">
                    </div>
                  </div>


             

         

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Favicon</label>
                    <div class="col-sm-6">
                      <div class="custom-file">
                        <input type="file"  name="fav">
                         
                      </div>
                      <p class="mb-3 mt-2">Favicon sekarang : <img src="<?= base_url('assets/images/favicon/') . $record['favicon'] ?>" style="height: 30px"></p>
                    </div>
                  </div>


			 <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Logo</label>
                    <div class="col-sm-6">
                      <div class="custom-file">
                        <input type="file"  name="logo">
                         
                      </div>
                      <p class="mb-3 mt-2">Logo sekarang : <img src="<?= base_url('assets/images/favicon/') . $record['logo'] ?>" style="height:100px; background-color:#000;"></p>
                    </div>
                  </div>
				  
				  

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-6">
                      <button type='submit' name='submit' class='btn btn-success'>Simpan</button>
                    </div>
                  </div>


                </div>
              </form>

         
                         
                        </div>
                    </div>
                </div>
                <!--row -->





