<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Hasil Pencarian</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="terms-conditions-page">
			<div class="row">
				<div class="col-lg-12 terms-conditions"> 
	
	

<?php if ($this->input->post('cari') != '') { ?>

    <div class="">
        <div class="col-12">
            <div class="block">

                <?php if ($record->num_rows() == 0) { ?>

                    <h5>Maaf produk yang anda cari tidak tersedia.</h5>

                <?php } else { ?>

                     
       
         
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
				
				
			
			<?php
			
		 
			
                                $query2 = $record;
                                foreach ($query2->result_array() as $rowz) {
                                    if (trim($rowz['gambar']) == '') {
                                        $foto_produk1 = 'no-image.png';
                                    } else {
                                        $foto_produk1 = $rowz['gambar'];
                                    }
                                    $stok1 = $rowz['stok'];
                                    if ($stok1 !== 0) { ?>
										
				
                  <div class="col-sm-6 col-md-3 wow fadeInUp">
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
          <div class="clearfix">
            <div class="text-right">
               
                 <?php echo $this->pagination->create_links(); ?>
                <!-- /.list-inline --> 
               
              <!-- /.pagination-container --> </div>
            <!-- /.text-right --> 
            
     	   
				   
                <?php } ?>
            </div>
        </div>
    </div>
    <?= $this->pagination->create_links(); ?>

<?php } else { ?>

    

<?php } ?>


</div>			
</div><!-- /.row -->
</div><!-- /.sigin-in-->

<br/><br/>