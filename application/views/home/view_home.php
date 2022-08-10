 <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        
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
        
       
  
        
        <!-- ============================================== Testimonials============================================== -->
        <div class="sidebar-widget wow fadeInUp outer-top-vs ">
		<h4 style="margin:0px 0px 10px 0px;"><center>Kami Siap Membantu Anda</center></h4>
		
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
        
        <!-- ============================================== Testimonials: END ============================================== -->
        
         
      </div>
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
            
		<?php 
		foreach ($slides as $slide) {  ?>
		
		<div class="item" style="background-image: url(assets/images/slider/<?= $slide->gambar?>);">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1"></div>
                  <div class="big-text fadeInDown-1" style="color:#000; margin-left:-20px; font-size:3.8rem;"> <?= $slide->judul?> </div>
                  <div class="excerpt fadeInDown-2 hidden-xs" style="color:#4B4B47; width:400px; font-size:2.2rem; margin-left:-20px;"> <span><?= $slide->ket?></span> </div>
                  <!-- <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-black shop-now-button">Shop Now</a> </div> -->
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item -->
			
		<?php } ?>
            
    
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        
        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-4 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Banyak Pilihan</h4>
                    </div>
                  </div>
                  <h6 class="text">Bekerjasama dengan beberapa distributor resmi</h6>
                </div>
              </div>
              <!-- .col -->
			  
			  
		  <div class="col-md-4 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Garansi Produk</h4>
                    </div>
                  </div>
                  <h6 class="text">Dibantu mengurus garansi kerusakan</h6>
                </div>
              </div>  
              <!-- .col -->
              
             
              <div class="col-md-4 col-sm-4col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Layanan Prima</h4>
                    </div>
                  </div>
                  <h6 class="text">Transaksi nyaman, cepat, dan aman</h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">Terbaru</h3>
             
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                  
			  <?php
			$no = 1;
			foreach ($record->result_array() as $row) {
				if (trim($row['gambar']) == '') {
					$foto_produk = 'no-image.png';
				} else {
					$foto_produk = $row['gambar'];
				}

				$stok = $row['stok'];
				if ($stok !== 0) { ?>

							
		<div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="<?= base_url('produk/detail/') . $row['produk_seo']; ?>">
                                                <img src="<?= base_url('assets/images/produk/') . $foto_produk; ?>" alt=""></a> </div>
                          <!-- /.image -->
                          
                         
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="<?= base_url('produk/detail/') . $row['produk_seo']; ?>"><?= $row['nama_produk']; ?></a></h3>
                          <div class="">
						  
				<?php
                            $idpro = $row['id_produk'];
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
						  
						   
								<?php if ($row['diskon'] == '0') { ?>
                                                    
								 <div class="product-price"> <span class="price"> Rp <?= rupiah($row['harga_konsumen']) ?> </div>
								 
                                <?php } else { ?>
								<div class="product-price"> <span class="price">   Rp <?= rupiah($row['harga_konsumen'] - $row['diskon']) ?></span> <span class="price-before-discount">Rp <?= rupiah($row['harga_konsumen']) ?></span> </div>
								
                                <?php } ?>
								 
                                                	
                         
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <!--   <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-black icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-black cart-btn" type="button">Add to cart</button>
                              </li>
                            <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li> -->
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
                  
				<?php }
			}				?>
                   
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
			
		 
            
          </div>
          <!-- /.tab-content --> 
        </div>
        <!-- /.scroll-tabs --> 
		
	
        
	 
      
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>