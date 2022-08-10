			<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard </h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Home</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
				
				 <?php
        $produk = $this->db->query("SELECT * FROM supplierproduk WHERE id_supplier='".$this->session->userdata('idsupplier')."'"); 
         
        ?>
		
		
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                                <div class="col-lg-4 col-sm-6 row-in-br">
                                    <a href="<?php echo base_url(); ?>produk">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="icon icon-present"></i>
                                            <h5 class="text-muted vb">PRODUK SUPPLIER</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-danger"><?= $produk->num_rows(); ?></h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 1%"> <span class="sr-only"></span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                <div class="col-lg-8 col-sm-6 row-in-br  b-r-none">
								<br/>
                                     Aplikasi ini adalah aplikasi Supply Chain Management (SCM) milik Bakolsmartphone. Aplikasi digunakan untuk berbagi informasi data produk dan stok produk antara Bakolsmartphone dengan perusahaan rekanan. 
									 
					<br/>
					<br/>
					Transaksi pembelian dilakukan diluar aplikasi ini. 
                                </div>
                                 
                                 
                            </div>
                        </div>
                    </div>
                </div>
                <!--row -->
           
				
 	
 