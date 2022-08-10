 
  <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Pesanan</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Toko</li>
				<li class="active">Input Resi</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
		 
		 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
			<h3 class="box-title m-b-0">Input Resi</h3><br/>
			
			
			
			

                        <form action="<?= base_url('admin/pesanan/resi'); ?>" method="post">

                            <div class="card-body">

                                <input type='hidden' name='id' value='<?= $rows['id_penjualan'] ?>'>

                                <input type='hidden' name='uri2' value='<?= $this->uri->segment(2); ?>'>
                                <input type='hidden' name='kode' value='<?= $this->uri->segment(5); ?>'>

                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Resi</label>
                                    <div class="col-sm-4">
                                        <input type='text' class='form-control' name='resi' value='<?= $rows['resi']; ?>' required>
                                    </div>
                                </div>
								
					<div class="form-group row">
                                    <label class="col-sm-1 col-form-label"></label>
                                    <div class="col-sm-4">
                                        <button type='submit' name='submit' class='btn btn-success btn-sm'>Simpan</button>
                                    </div>
                                </div>

                                

                            </div>
                        </form>

                    </div>
                </div>
            </div>
 