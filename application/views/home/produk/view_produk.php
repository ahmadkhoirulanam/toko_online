 <div class='row'>
      <div class='col-md-3 sidebar'> 
        
	 <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Kategori </div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
           	
			<?php 
			 
			foreach ($kategoris as $kategori) {
				$jumlah = $this->db->query("SELECT * FROM produk WHERE id_kategori_produk='".$kategori->id_kategori_produk."' ")->num_rows(); 
				 
				if($jumlah>0) {
					echo '<li class=""> <a href="produk/kategori/'.$kategori->nama_kategori.'"  >'.$kategori->nama_kategori.'<span class="btn btn-xs btn-default pull-right">'.$jumlah.'</span></a></li>';
				} else {
					echo '<li class=""> <a href="produk/kategori/'.$kategori->nama_kategori.'"  >'.$kategori->nama_kategori.'</a></li>';
				}
			}
			
			?>
			
               
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== --> 
        	
		
	
        <div class="sidebar-module-container">
          <div class="sidebar-filter"> 
            
         
          
          <!----------- Testimonials------------->
            <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
		<h4 style="margin:0px 0px 20px 0px;"><center>Kami Siap Membantu Anda</center></h4>
              <div id="advertisement" class="advertisement">
                
                 <?php
		$cariadmin = $this->db->query("SELECT * FROM pengguna WHERE level=1")->result(); 
		
		foreach ($cariadmin as $admin) { 
		if($admin->foto=="") {
			$admin->foto="default.jpg";
		}
		?>

		<div class="item">
              <div class="avatar" style="margin:0px;"><img src="<?php echo base_url(); ?>assets/images/user/<?= $admin->foto?>" alt="Image"></div>
              <div class="testimonials">Admin <?= $admin->nama_lengkap?> </div>
              <div class="testimonials">WA <?= $admin->no_telp?> </div>
              <!-- /.container-fluid --> 
            </div>
             

		<?php } ?>

              
                
              </div>
              <!-- /.owl-carousel --> 
            </div>
            
            <br/> <br/>
            
            
          </div>
          <!-- /.sidebar-filter --> 
        </div>
        <!-- /.sidebar-module-container --> 
      </div>
      <!-- /.sidebar -->
      <div class='col-md-9'> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
       
     
         <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
				
				
			
			<?php
			
			 if ($this->uri->segment(2) == 'kategori') {
				 echo "<h4 style='margin:0px 20px 30px 20px;'>KATEGORI ".strtoupper($namakategori). " </h4>";
			 } else {
				 echo "<h4 style='margin:0px 20px 30px 20px;'>SEMUA KATEGORI</h4>";
			 }
			
                                $query2 = $record;
                                foreach ($query2->result_array() as $rowz) {
                                    if (trim($rowz['gambar']) == '') {
                                        $foto_produk1 = 'no-image.png';
                                    } else {
                                        $foto_produk1 = $rowz['gambar'];
                                    }
                                    $stok1 = $rowz['stok'];
                                    if ($stok1 !== 0) { ?>
										
				
                  <div class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="<?= base_url('produk/detail/') . $rowz['produk_seo']; ?>"><img  src="<?= base_url('assets/images/produk/') . $foto_produk1; ?>" alt=""></a> </div>
                          <!-- /.image -->
                           
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"> <a href="<?= base_url('produk/detail/') . $rowz['produk_seo']; ?>">
                                                        <?= $rowz['nama_produk']; ?>
                                                    </a></h3>
                          <div class="">
				<?php
                            $idpro = $rowz['id_produk'];
                            $query = $this->db->query("SELECT * FROM ulasan WHERE id_produk='$idpro'");
                            $bin  = $this->db->query("SELECT SUM(bintang) AS totalbintang FROM ulasan WHERE id_produk='$idpro'")->row_array();
                            $jml_rev = $query->num_rows();

                            $jml_bintang = $bin['totalbintang'] / $jml_rev;

                            if ($jml_rev == 0) {
                                for ($y = 0; $y <  5; $y++) { ?>

                                    <svg class="rating__star" width="13px" height="12px" style="display:inline;">
                                        <g class="rating__fill">
                                            <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#star-normal"></use>
                                        </g>
                                    </svg>

                                <?php }
                            } else {
                                for ($y = 0; $y <  $jml_bintang; $y++) { ?>
                                    <svg class="rating__star rating__star--active" width="13px" height="12px" style="display:inline;">
                                        <g class="rating__fill">
                                            <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#star-normal"></use>
                                        </g>
                                    </svg>
                                <?php }
                                for ($y = 0; $y <  5 - $jml_bintang; $y++) { ?>
                                    <svg class="rating__star rating__star" width="13px" height="12px" style="display:inline;">
                                        <g class="rating__fill">
                                            <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#star-normal"></use>
                                        </g>
                                    </svg>
                            <?php }
                            } ?>

					(<?= $jml_rev ?>  Reviews)
				</div>
                          <div class="description"></div>
                          <div class="product-price"> 
						  
						  
						   <?php if ($rowz['diskon'] == '0') { ?>
							  <span class="price">  Rp <?= rupiah($rowz['harga_konsumen']) ?></span>
							<?php } else { ?>
								
								<span class="price"> Rp <?= rupiah($rowz['harga_konsumen'] - $rowz['diskon']) ?></span>
								
								<span class="price-before-discount"><?= rupiah($rowz['harga_konsumen']) ?></span>
			
							<?php } ?>
								  
						 
													
													
				</div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
                  
									<?php } 
									
								}?>
                  
                </div>
                <!-- /.row --> 
              </div>
              <!-- /.category-product --> 
              
            </div>
            <!-- /.tab-pane -->
            
             
          </div>
          <!-- /.tab-content -->
          <div class="clearfix filters-container">
            <div class="text-right">
               
                 <?php echo $this->pagination->create_links(); ?>
                <!-- /.list-inline --> 
               
              <!-- /.pagination-container --> </div>
            <!-- /.text-right --> 
            
          </div>
          <!-- /.filters-container --> 
          
        </div>
        <!-- /.search-result-container --> 
        
      </div>
      <!-- /.col --> 
    </div>
    