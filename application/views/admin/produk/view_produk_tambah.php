<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Produk</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Produk</li>
				<li class="active">Tambah Produk</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
				<h3 class="box-title m-b-0">Tambah Produk</h3><br/>
				
				
            <form action="<?= base_url('admin/produk/tambah_produk') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">

              

                <input type='hidden' name='id' value=''>

              

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kategori</label>
                  <div class="col-sm-4">
                    <select name='a' class='form-control select2' required>
                      <option value='' selected>- Pilih Kategori Produk -</option>
                      <?php
                      foreach ($record as $row) {
                        echo "<option value='$row[id_kategori_produk]'>$row[nama_kategori]</option>";
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Produk</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='b' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Satuan</label>
                  <div class="col-sm-3">
                    <input type='text' class='form-control' name='c' required>
                  </div>
                </div>

               <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Berat (gram)</label>
                  <div class="col-sm-3">
                    <input type='number' class='form-control' name='berat' required>
                  </div>
                </div>  

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Harga Beli (Rp)</label>
                  <div class="col-sm-3">
                    <input type='number' class='form-control' name='d' required>
                  </div>
                </div>


               <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Harga Konsumen</label>
                  <div class="col-sm-3">
                    <input type='number' class='form-control' name='f' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Diskon</label>
                  <div class="col-sm-3">
                    <input type='number' class='form-control' name='diskon'>
                  </div>
                </div>
				
 

            <!--    <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Stok</label>
                  <div class="col-sm-3">
                    <input type='number' class='form-control' name='stok' required>
                  </div>
                </div> -->

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-8">
                    <textarea rows="3" id="summernote" class='form-control' name='ff' required></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Gambar 1</label>
                  <div class="col-sm-6">
                    <div class="custom-file">
                      <input type="file" class="" id="" name="g">
                       
                    </div>
                  </div>
                </div>
				
		 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Gambar 2</label>
                  <div class="col-sm-6">
                    <div class="custom-file">
                      <input type="file" class="" id="" name="gambar2">
                      
                    </div>
                  </div>
                </div>
				
		 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Gambar 3</label>
                  <div class="col-sm-6">
                    <div class="custom-file">
                      <input type="file" class="" id="" name="gambar3">
                       
                    </div>
                  </div>
                </div>
				
		 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Gambar 4</label>
                  <div class="col-sm-6">
                    <div class="custom-file">
                      <input type="file" class="" id="" name="gambar4">
                     
                    </div>
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-8">
                    <button type='submit' name='submit' class='btn btn-success sm '>Simpan</button>
                    <a href='<?= base_url('admin/produk') ?>'><button type='button' class='btn btn-secondary sm'>Batal</button></a>
                  </div>
                </div>

              </div>

            </form>



          </div>
        </div>
      </div>
  
 