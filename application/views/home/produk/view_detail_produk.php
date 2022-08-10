<?php
 
$foto_produk = $row['gambar']; 
$foto_produk2 = $row['gambar2'];
$foto_produk3 = $row['gambar3'];
$foto_produk4 = $row['gambar4'];

 
$produk = $row['nama_produk'];

?>

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Produk</a></li>
				<li><a href="#"> Detail</a></li>
				<li class='active'><?= $row['nama_produk']; ?></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->


	<div class='row single-product'>

	   <div class="col-md-3 sidebar"> 
     
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
		
		  <div class="sidebar-widget wow fadeInUp outer-top-vs ">
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
        
		
		
        </div>
		
	<div class='col-md-9'>
		<div class="detail-block">
				<div class="row  wow fadeInUp">
                
<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">
           
		<?php if($foto_produk!="") { ?>  
		<div class="single-product-gallery-item" id="slide1">
                <a data-lightbox="image-1" data-title="Gallery" href="<?= base_url() . "assets/images/produk/" . $foto_produk ?>">
                    <img class="img-responsive" alt="" src="<?= base_url() . "assets/images/produk/" . $foto_produk ?>" data-echo="<?= base_url()."assets/images/produk/" . $foto_produk ?>" />
                </a>
            </div> 
		  <?php } ?>
		  
		  

          <?php if($foto_produk2!="") { ?>  
		<div class="single-product-gallery-item" id="slide2">
                <a data-lightbox="image-1" data-title="Gallery" href="<?= base_url() . "assets/images/produk/" . $foto_produk2 ?>">
                    <img class="img-responsive" alt="" src="<?= base_url() . "assets/images/produk/" . $foto_produk2 ?>" data-echo="<?= base_url()."assets/images/produk/" . $foto_produk2 ?>" />
                </a>
            </div> 
		  <?php } ?>

             <?php if($foto_produk3!="") { ?>  
		<div class="single-product-gallery-item" id="slide3">
                <a data-lightbox="image-1" data-title="Gallery" href="<?= base_url() . "assets/images/produk/" . $foto_produk3 ?>">
                    <img class="img-responsive" alt="" src="<?= base_url() . "assets/images/produk/" . $foto_produk3 ?>" data-echo="<?= base_url() . "assets/images/produk/" . $foto_produk3 ?>" />
                </a>
            </div> 
		  <?php } ?>

             <?php if($foto_produk4!="") { ?>  
		<div class="single-product-gallery-item" id="slide4">
                <a data-lightbox="image-1" data-title="Gallery" href="<?= base_url() . "assets/images/produk/" . $foto_produk4 ?>">
                    <img class="img-responsive" alt="" src="<?= base_url() . "assets/images/produk/" . $foto_produk4 ?>" data-echo="<?= base_url() . "assets/images/produk/" . $foto_produk4 ?>" />
                </a>
            </div><!-- /.single-product-gallery-item -->
		  <?php } ?>
		  


        </div><!-- /.single-product-slider -->



        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">
                 
 				
		<?php if($foto_produk!="") { ?>  
		 <div class="item">
                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="1" href="#slide1">
                        <img class="img-responsive" width="85" alt="" src="<?= base_url() . "assets/images/produk/" . $foto_produk ?>" data-echo="<?= base_url() . "assets/images/produk/" . $foto_produk ?>"/>
                    </a>
                </div>
		  <?php } ?>
				
				
		<?php if($foto_produk2!="") { ?>  
		 <div class="item">
                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
                        <img class="img-responsive" width="85" alt="" src="<?= base_url() . "assets/images/produk/" . $foto_produk2 ?>" data-echo="<?= base_url() . "assets/images/produk/" . $foto_produk2 ?>"/>
                    </a>
                </div>
		  <?php } ?>

                
		<?php if($foto_produk3!="") { ?>  
		 <div class="item">
                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
                        <img class="img-responsive" width="85" alt="" src="<?= base_url() . "assets/images/produk/" . $foto_produk3 ?>" data-echo="<?= base_url() . "assets/images/produk/" . $foto_produk3 ?>"/>
                    </a>
                </div>
		  <?php } ?>
		  
		  <?php if($foto_produk4!="") { ?>  
		 <div class="item">
                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="4" href="#slide4">
                        <img class="img-responsive" width="85" alt="" src="<?= base_url() . "assets/images/produk/" . $foto_produk4 ?>" data-echo="<?= base_url() . "assets/images/produk/" . $foto_produk4 ?>"/>
                    </a>
                </div>
		  <?php } ?>
               
              
            </div><!-- /#owl-single-product-thumbnails -->

            

        </div><!-- /.gallery-thumbs -->



    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name"><?= $row['nama_produk'] ?></h1>
							
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-4">
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


									</div>
									<div class="col-sm-7">
										<div class="reviews">
											<a href="#" class="lnk">(<?= $jml_rev ?>  Reviews)</a>
										</div>
									</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->

							

							<div class="description-container m-t-20">
								<?= $row['keterangan'] ?>
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-12">
										<div class="price-box">
										
										 
										<?php if ($row['diskon'] == '0') { ?>
											<span class="price"> Rp <?= rupiah($row['harga_konsumen']) ?></span>
										<?php } else { ?>
											<span class="price"> Rp <?= rupiah($row['harga_konsumen'] - $row['diskon']) ?></span>
											<span class="price-strike">Rp <?= rupiah($row['harga_konsumen']) ?></span>
											
										<?php } ?>
										
										 
											 
										</div>
									</div>

									 

								</div><!-- /.row -->
							</div><!-- /.price-container -->
							
							<div>
							<div class="stock-container info-container m-t-10" style="margin-bottom:10px;">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value">In Stock</span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->
							
							<table class="table table-bordered">
								<tr>
									<th align=center>Warna</th><th align=center>Stok</th>
								</tr>
							<?php
							
							$varians  = $this->db->query("SELECT* FROM produkvarian WHERE id_produk='$idpro' and stok_produkvarian<>0")->result_array();
							
							 
							foreach($varians as $varian) {
								echo "<tr>
									<td>$varian[warna_produkvarian]</td>
									<td align=center>$varian[stok_produkvarian]</td>
								</tr>";
							}
							?>
							
							</table>
							</div>

							
							<div class="quantity-container info-container">
								<div class="row">
									
				<form id="product-form" class="product__options">
				<input type="hidden" name="id_produk" value="<?= encrypt_url($row['id_produk']) ?>">
				
				<div class="form-group product__option col-lg-3">
                     
                    <label class="product__option-label" for="product-quantity">Warna</label>
                    <div class="product__actions">
                        <div class="product__actions-item" style="width:100%">
							<select id="warna" name="warna" class="form-control" style="width:100%">
							<?php
							
							$varians  = $this->db->query("SELECT* FROM produkvarian WHERE id_produk='$idpro' and stok_produkvarian<>0")->result_array();
							
							 
							foreach($varians as $varian) {
								echo "<option value='$varian[warna_produkvarian]'>$varian[warna_produkvarian]</option>";
							}
							?>
							</select> 
                        </div>
                         
                    </div>
                </div>
				
                <div class="form-group product__option col-lg-9">
                    
                    <label class="product__option-label" for="product-quantity">Jumlah</label>
                    <div class="product__actions">
                        <div class="product__actions-item">
							 
                            <div class="input-number product__quantity"><input id="product-quantity" class="input-number__input form-control form-control-lg" type="number" min="1" value="1" name="jumlah">
                                <div class="input-number__add"></div>
                                <div class="input-number__sub"></div>
                            </div>
                        </div>
                        <div class="product__actions-item product__actions-item--addtocart">
                            <a href="javascript:void(0)" class="btn btn-black btn-lg" onclick="add2cart()">Tambah ke keranjang</a>
                        </div>
                    </div>
                </div>
            </form><!-- .product__options / end -->

									
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->

							

							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#review">REVIEW</a></li>
								 
								 
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
							 

								<div id="review" class="tab-pane in active">
									<div class="product-tab">
																				
										<div class="product-reviews">
											 
											   <?php
                    $idpro = $row['id_produk'];
                    $this->db->join('pengguna', 'pengguna.id_pengguna = ulasan.id_pembeli');
                    $this->db->join('produk', 'produk.id_produk = ulasan.id_produk');
                    $query = $this->db->get_where('ulasan', "ulasan.id_produk='$idpro'");
                    if ($query->num_rows() >= 1) {
                        foreach ($query->result_array() as $rev) {
                            if (empty($rev['foto'])) {
                                $foto = 'default.jpg';
                            } else {
                                $foto = $rev['foto'];
                            } ?>

                            <li class="reviews-list__item">
                                <div class="review">
                                    <div class="review__avatar">
                                        <img src="<?= base_url('assets/images/user/' . $foto) ?>" alt=""></div>
                                    <div class="review__content">
                                        <div class="review__author"><?= $rev['nama_lengkap'] ?></div>
                                        <div class="review__rating">
                                            <div class="rating">
                                                <div class="rating__body">

                                                    <?php
                                                    for ($x = 0; $x < $rev['bintang']; $x++) { ?>

                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#star-normal"></use>
                                                            </g>
                                                        </svg>

                                                    <?php }
                                                    for ($x = 0; $x < 5 - $rev['bintang']; $x++) { ?>

                                                        <svg class="rating__star rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#star-normal"></use>
                                                            </g>
                                                        </svg>
                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="review__text" style="margin-top:-10px;">
                                            <?= $rev['ulasan'] ?>
                                        </div>
                                        <div class="review__date"><?= tgl_grafik($rev['tanggal_ulasan']) ?></div>
                                    </div>
                                </div>
                            </li>

                        <?php }
                    } else { ?>

                        <p>Belum ada ulasan, beli produk ini untuk memberi ulasan</p>

                    <?php } ?>
              
			  
										</div><!-- /.product-reviews -->
										

										
										<div class="product-add-review">
											 
											 
	<?php
        if (!empty($this->session->id_pengguna)) { ?>



            <?php
            $idpeng = $this->session->id_pengguna;
            $queryx = $this->db->query("SELECT * FROM penjualan a JOIN penjualandetail b ON a.id_penjualan=b.id_penjualan WHERE b.id_produk='$idpro' AND a.id_pembeli='$idpeng' AND a.proses='3'");
            if ($queryx->num_rows() >= 1) {

                $id = $this->session->id_pengguna;
                $this->db->where("id_pengguna='$id'");
                $peng = $this->db->get('pengguna')->row_array();
                if (empty($peng['nama_lengkap'])) {
                    $nama = $peng['username'];
                } else {
                    $nama = $peng['nama_lengkap'];
                }

                if (empty($peng['foto'])) {
                    $foto = 'default.jpg';
                } else {
                    $foto = $peng['foto'];
                }
            ?>

                <form class="reviews-view__form" action="<?= base_url('produk/review/') ?>" method="POST">
                    <h3 class="reviews-view__header">Tulis Ulasan</h3>
                    <div class="row">
                        <div class="col-12 col-lg-9 col-xl-8">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="review-stars">Bintang</label>
                                    <select name='bintang' id="review-stars" class="form-control">
                                        <option value="5">5 Bintang</option>
                                        <option value="4">4 Bintang</option>
                                        <option value="3">3 Bintang</option>
                                        <option value="2">2 Bintang</option>
                                        <option value="1">1 Bintang</option>
                                    </select></div>
                                <div class="form-group col-md-4">
                                    <label for="review-author">Nama Lengkap</label>
                                    <input type="hidden" name="pembeli" value="<?= encrypt_url($id) ?>">
                                    <input type="hidden" name="produk" value="<?= encrypt_url($row['id_produk']) ?>">
                                    <input type="hidden" name="seo" value="<?= $row['produk_seo'] ?>">
                                    <input type="text" class="form-control" id="review-author" value="<?= $peng['nama_lengkap'] ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="review-email">Email</label>
                                    <input type="text" class="form-control" id="review-email" value="<?= $peng['email'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="review-text">Ulasan Anda</label>
                                <textarea name="ulasan" class="form-control" id="review-text" rows="6"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" name="submit" class="btn btn-black btn-lg">Tulis Ulasan</button>
                            </div>
                        </div>
                    </div>
                </form>
        <?php }
        } ?>


											 
											 </div><!-- /.review-form -->

										</div><!-- /.product-add-review -->										
										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

								
							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

			</div><!-- /.col -->
			<div class="clearfix"></div>
			
	</div>
	

<?php $temp_sales = $this->db->get_where('penjualantemp', array('session' => $this->session->idp, 'id_produk' => $idpro))->row_array();
if (!empty($temp_sales)) {
    $number_cart = $temp_sales['jumlah'];
} else {
    $number_cart = 0;
} ?>

<input type="hidden" id="number-cart" value="<?= $number_cart; ?>">
<script src="<?= base_url('assets/template/js/product.js') ?>"></script>