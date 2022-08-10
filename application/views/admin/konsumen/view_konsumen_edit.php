<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Konsumen</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Konsumen</li>
				<li class="active">Edit Konsumen</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
				<h3 class="box-title m-b-0">Edit Data Konsumen</h3><br/>
				
				
				
            <form action="<?= base_url('admin/konsumen/edit_konsumen') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
              

                <input type='hidden' value='<?= $row['id_pengguna'] ?>' name='id'>


		 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-6">
                    <input class='required email form-control' type='email' name='c' value='<?= $row['email'] ?>' required>
                  </div>
                </div>

               
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-6">
                    <input class='form-control' type='password' name='a'>
                    <small style='color:red'><i>Kosongkan jika tidak ingin diubah.</i></small>
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-6">
                    <input class='required form-control' type='text' name='b' value='<?= $row['nama_lengkap'] ?>' required>
                  </div>
                </div>

               
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-6">
                    <?php if ($row['jenis_kelamin'] == 'Laki-laki') {
                      echo "<input type='radio' value='Laki-laki' name='d' checked> Laki-laki <input type='radio' value='Perempuan' name='d'> Perempuan ";
                    } else {
                      echo "<input type='radio' value='Laki-laki' name='d'> Laki-laki <input type='radio' value='Perempuan' name='d' checked> Perempuan ";
                    } ?>
                  </div>
                </div>



                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-6">
                    <input class='datepicker form-control tanggal' type='text' name='e' value='<?= $row['tgl_lahir'] ?>' data-date-format='yyyy-mm-dd' required>
                  </div>
                </div>

      

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-6">
                    <textarea class='form-control' name='g' required><?= $row['alamat'] ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kota Sekarang</label>
                  <div class="col-sm-6">
                    <select class='form-control select2 w-100' name='j' id='city' required>
                      <option value=''>- Pilih -</option>
                      <?php
                      foreach ($kota->result_array() as $rows) {
                        if ($row['kota_id'] == $rows['kota_id']) {
                          echo "<option value='$rows[kota_id]' selected>$rows[nama_kota]</option>";
                        } else {
                          echo "<option value='$rows[kota_id]'>$rows[nama_kota]</option>";
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">No. Telp</label>
                  <div class="col-sm-6">
                    <input class='form-control' type='text' name='l' value='<?= $row['no_telp'] ?>' maxlength="13" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type='submit' name='submit' class='btn btn-success btn-sm'>Perbarui</button>
                    <a href='<?= base_url('admin/konsumen') ?>'><button type='button' class='btn btn-secondary btn-sm'>Batal</button></a>
                  </div>
                </div>


              </div>
            </form>

          </div>
        </div>
      </div>
 