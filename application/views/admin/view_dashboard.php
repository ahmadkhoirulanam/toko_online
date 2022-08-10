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
        $produk = $this->db->query('SELECT * FROM produk');
        $pengguna = $this->db->query("SELECT * FROM pengguna WHERE level='2'");
        $penjualan = $this->db->query('SELECT * FROM penjualan WHERE proses="3"');
         
        ?>
		
		
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                                <div class="col-lg-4 col-sm-6 row-in-br">
                                    <a href="<?php echo base_url(); ?>admin/produk">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="icon icon-present"></i>
                                            <h5 class="text-muted vb">PRODUK</h5> </div>
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
                                <div class="col-lg-4 col-sm-6 row-in-br  b-r-none">
                                    <a href="<?php echo base_url(); ?>admin/pesanan">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="icon icon-basket-loaded " data-icon="&#xe01b;"></i>
                                            <h5 class="text-muted vb">PENJUALAN</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-megna"><?= $penjualan->num_rows(); ?></h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 1%"> <span class="sr-only"></span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-sm-6 row-in-br">
                                    <a href="<?php echo base_url(); ?>admin/konsumen">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="icon icon-user" data-icon="&#xe00b;"></i>
                                            <h5 class="text-muted vb">KONSUMEN</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-primary"><?= $pengguna->num_rows(); ?></h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 1%"> <span class="sr-only"></span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                 
                            </div>
                        </div>
                    </div>
                </div>
                <!--row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">GRAFIK PENGUNJUNG</h3>
 
                            <?php include 'grafik_pengunjung.php'; ?>
							
							
                        </div>
                    </div>
                      </div>
                <!--row -->
				
	<script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/chart.js/Chart.min.js"></script>			
				
 