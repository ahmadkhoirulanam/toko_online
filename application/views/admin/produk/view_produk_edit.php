<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Produk</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Produk</li>
				<li class="active">Edit Produk</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
				<h3 class="box-title m-b-0">Edit Produk</h3><br/>
				
              <form action="<?= base_url('admin/produk/edit_produk') ?>" method="post" enctype="multipart/form-data">

                <input type='hidden' name='id' value='<?= $rows['id_produk'] ?>'>

            

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kategori</label>
                  <div class="col-sm-4">
                    <select name='a' class='form-control' required>
                      <option value='' selected>- Pilih Kategori Produk -</option>
                      <?php
                      foreach ($record as $row) {
                        if ($rows['id_kategori_produk'] == $row['id_kategori_produk']) {
                          echo "<option value='$row[id_kategori_produk]' selected>$row[nama_kategori]</option>";
                        } else {
                          echo "<option value='$row[id_kategori_produk]'>$row[nama_kategori]</option>";
                        }
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Produk</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='b' value='<?= $rows['nama_produk'] ?>' required></td>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Satuan</label>
                  <div class="col-sm-3">
                    <input type='text' class='form-control' name='c' value='<?= $rows['satuan'] ?>' required>
                  </div>
                </div>

            <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Berat (gram)</label>
                  <div class="col-sm-3"><input type='text' class='form-control' name='berat' value='<?=  $rows['berat'] ?>' required>
                  </div>
                </div>  

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Harga Beli (Rp)</label>
                  <div class="col-sm-3">
                    <input type='number' class='form-control' name='d' value='<?= $rows['harga_beli'] ?>' required>
                  </div>
                </div>

                 
				<div class="form-group row">
                  <label class="col-sm-2 col-form-label">Harga Konsumen (Rp)</label>
                  <div class="col-sm-3">
                    <input type='number' class='form-control' name='f' value='<?= $rows['harga_konsumen'] ?>' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Diskon (Rp)</label>
                  <div class="col-sm-3">
                    <input type='number' class='form-control' name='diskon' value='<?= $rows['diskon'] ?>'>
                  </div>
                </div>

             

            <!--     <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Stok</label>
                  <div class="col-sm-3">
                    <input type='number' class='form-control' name='stok' value='<?=  $rows['stok'] ?>' required>
                  </div>
                </div> -->

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-8">
                    <textarea id="summernote" rows="3" class='form-control' name='ff' required><?= $rows['keterangan'] ?></textarea>
                  </div>
                </div>


		<?php
		
		if($rows['gambar']=="") {
			$rows['gambar']="noimages.png";
		} 
		if($rows['gambar2']=="") {
			$rows['gambar2']="noimages.png";
		} 
		if($rows['gambar3']=="") {
			$rows['gambar3']="noimages.png";
		}
		if($rows['gambar4']=="") {
			$rows['gambar4']="noimages.png";
		}
		
		?>
                 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gambar 1</label>
                    <div class="col-sm-6">
                      <img src="<?= base_url('assets/images/produk/') . $rows['gambar'] ?>" alt="" style="height: 150px">
			<input type="file" class="" id="" name="g">
                    </div>
                  </div>
                

			 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gambar 2</label>
                    <div class="col-sm-6">
                      <img src="<?= base_url('assets/images/produk/') . $rows['gambar2'] ?>" alt="" style="height: 150px">
			<input type="file" class="" id="" name="gambar2">
                    </div>
                  </div>
				  
			 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gambar 3</label>
                    <div class="col-sm-6">
                      <img src="<?= base_url('assets/images/produk/') . $rows['gambar3'] ?>" alt="" style="height: 150px">
			<input type="file" class="" id="" name="gambar3">
                    </div>
                  </div>

			<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gambar 4</label>
                    <div class="col-sm-6">
                      <img src="<?= base_url('assets/images/produk/') . $rows['gambar4'] ?>" alt="" style="height: 150px">
			<input type="file" class="" id="" name="gambar4">
                    </div>
                  </div>				  

		 
              
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-8">
                    <button type='submit' name='submit' class='btn btn-success btn-sm'>Perbarui</button>
                    <a href='<?= base_url('admin/produk') ?>'><button type='button' class='btn btn-secondary btn-sm'>Batal</button></a>
                  </div>
                </div>

              </form>
            </div>

          </div>
        </div>
       