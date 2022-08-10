<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Kategori Produk</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Kategori Produk</li>
				<li class="active">Tambah Kategori Produk</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
				<h3 class="box-title m-b-0">Tambah Kategori Produk</h3><br/>

            <form action="<?= base_url('admin/kategori_produk/tambah_kategori_produk') ?>" method="post" class="form-horizontal">
              

                <input type='hidden' name='id' value=''>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Kategori</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='a' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type='submit' name='submit' class='btn btn-success btn-sm'>Simpan</button>
                    <a href='<?= base_url('admin/kategori_produk') ?>'><button type='button' class='btn btn-secondary btn-sm'>Batal</button></a>
                  </div>
                </div>

              </div>
            </form>

          </div>
        </div>
      </div>
   