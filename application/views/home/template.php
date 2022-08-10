<?php
$iden = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<title><?= $iden['nama_website']; ?> - <?php echo $title; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="<?= $iden['meta_deskripsi']; ?>">
<meta name="author" content="">
<meta name="keywords" content="<?= $iden['meta_keyword']; ?>">
<meta name="robots" content="all,index,follow">
<meta http-equiv="Content-Language" content="id-ID">
<meta NAME="Distribution" CONTENT="Global">
<meta NAME="Rating" CONTENT="General">
<link rel="canonical" href="<?= "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
<meta property="og:locale" content="id_ID" />
<meta property="og:title" content="<?= $title; ?>" />
<meta property="og:description" content="<?= $iden['meta_deskripsi']; ?>" />
<meta property="og:url" content="<?= "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
<meta property="og:site_name" content="<?= $iden['nama_website']; ?>" />

<link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon/') ?><?= $iden['favicon']; ?>">

    <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>css/style.css">
<link rel="stylesheet" href="<?= base_url('assets/template/css/'); ?>sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/gijgo/css/gijgo.min.css') ?>">
	 <link rel="stylesheet" href="<?= base_url('assets/template/tema/') ?>vendor/select2/css/select2.min.css">

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/flipmart/css/bootstrap.min.css">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/flipmart/css/font-awesome.css">



<!-- Customizable CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/flipmart/css/main.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/flipmart/css/blue.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/flipmart/css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/flipmart/css/owl.transitions.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/flipmart/css/animate.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/flipmart/css/rateit.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/flipmart/css/bootstrap-select.min.css">

<link href="<?php echo base_url(); ?>assets/template/flipmart/css/lightbox.css" rel="stylesheet">

  <script src="<?= base_url('assets/template/tema/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/template/js/header.js') ?>"></script>
    <script>
        var site_url = '<?= base_url() ?>';
    </script>
	
 

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


 <link href="<?php echo base_url(); ?>assets/template/flipmart/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
  
  
<style>

 
header {
    background: #F0F0F0;
}

.header-style-1 .header-nav {
    background: #4A4949;
}


.sidebar .side-menu .head {
    background-color: #D4D4D4;
    border: 1px solid #D7D5D5;
    border-bottom: 1px #D7D5D5 solid;
}

.main-header .top-search-holder .search-area .search-button {
    background-color: #D4D4D4;
    border: 1px solid #D7D5D5;
}

.top-cart-row .dropdown-cart .lnk-cart {
    padding: 0px;
    background: #D4D4D4;
    border: 1px solid #D7D5D5;
}

.info-boxes-inner {
    background-color: #343431;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,.08);
}


.table > tbody > tr > td, .table > tfoot > tr > td, td{
    padding: 5px !important;
}

  .select2-container--default .select2-results>.select2-results__options {
            max-height: 400px;
            min-height: 400px;
            overflow-y: auto;
		background:#FFF; 
        }
	
  .select2  {
            height: 30px !important;
		margin-top:0px !important;
		padding-top:0px  !important;
        }	

.breadcrumb ul li a {
    color: #666666;
    font-family: 'Open Sans', sans-serif, sans-serif;
    font-size: 14px;
    line-height: 24px;
    font-weight: 500;
}	

.sidebar .sidebar-widget .advertisement .item {
    
    padding-bottom: 20px;
}

.product-info h3 {
	font-weight:bolder;
}

table {
		font-size:1.5rem !important;
	}
	
.reviews-list__item {
    border-bottom: 0px solid #ebebeb;
    padding-top: 28px;
    padding-bottom: 10px;
	
}
 
li.reviews-list__item {
	list-style:none;
}
 
.table-bordered th, .table-bordered td {
	border : 1px solid #ccc !important;
}

th {
	text-align:center;
	text-transform:uppercase;
	background-color:#ccc;
}

.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 3px;
    line-height: 1;
	
}
 
 .testimonials {
	 margin:0px 0px 5px 0px;
 }

.sidebar .side-menu nav .nav > li > a::after {
	color: #bababa;
	content: none;
}
</style>


</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1"> 
  
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
            <?php if(isset($this->session->email_pengguna)) { ?>
			<li><a href="<?= base_url()?>members/dashboard"><i class="icon fa fa-user" style="margin-top:2px; color:#343431;"></i> <?= $this->session->nama_pengguna ?></a></li> 
		<?php } else { ?> 
		<li><a href="<?= base_url()?>auth/register" style="color:#343431;"><i class="icon fa fa-user" style="margin-top:2px;color:#343431;"></i> Registrasi</a></li>
		<?php }  ?>
           
		<?php if(!isset($this->session->email_pengguna)) { ?>
			<li><a href="<?= base_url()?>auth/login" style="color:#343431;"><i class="icon fa fa-lock" style="margin-top:2px;color:#343431;"></i>Login</a></li>
		<?php } else { ?>
			<li><a href="<?= base_url()?>auth/logout" style="color:#343431;"><i class="icon fa fa-lock" style="margin-top:2px;color:#343431;"></i>Logout</a></li>
		<?php }  ?>
          </ul>
        </div>
        <!-- /.cnt-account -->
        
        
        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"> 
		   <?php
			
			 
				echo "<a href='" . base_url() . "' class='mobile-header__logo'><img height='77px' width='270px;' src='" . base_url() . "assets/images/favicon/$iden[logo]' style='margin-left:-20px; margin-top:-30px;'/></a>";
			
			?>
		  
		   </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area">
            <form method="POST" action="<?= base_url('cari') ?>">
              <div class="control-group">
                <ul class="categories-filter animate-dropdown">
                  <li class="dropdown" style="height:45px; width:50px; padding-left:15px;">Cari  
                     
                  </li>
                </ul>
                <input class="search-field" name="cari" placeholder="Search here..." />
                <input type="submit" class="search-button" value="Go!"> </div>
            </form>
          </div>
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div class="dropdown dropdown-cart"> 
            
			  
			<?php
        $recordx = $this->model_app->view_join_rows('penjualantemp', 'produk', 'id_produk', array('session' => $this->session->idp), 'id_penjualan_detail', 'ASC');
		
		$total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-(b.diskon*a.jumlah)) as total, sum(b.berat*a.jumlah) as total_berat FROM `penjualantemp` a JOIN produk b ON a.id_produk=b.id_produk where a.session='" . $this->session->idp . "'")->row_array();
		
        if ($recordx->num_rows() == '0') { ?>
          <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
		<div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>	  
              <div class="basket-item-count"><span class="count">0</span></div>
              <div class="total-price-basket"> <span class="lbl"></span> <span class="total-price"> <span class="sign">Rp</span><span class="value">0</span> </span> </div>
            </div>
            </a>

        <?php } else { ?>  
		<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
		<div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>	  
              <div class="basket-item-count"><span class="count"><?= $recordx->num_rows() ?></span></div>
              <div class="total-price-basket"> <span class="lbl"></span> <span class="total-price"> <span class="sign">Rp </span><span class="value"><?= rupiah($total['total']); ?></span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>
                <div class="cart-item product-summary">
                  
			 <?php
                $no = 1;
                foreach ($recordx->result_array() as $row) {
                     $sub_total = (($row['harga_jual'] - $row['diskon']) * $row['jumlah']);
                    if ($row['diskon'] != '0') {
                        $diskon = "<del style='color:red'>" . rupiah($row['harga_jual']) . "</del>";
                    } else {
                        $diskon = "";
                    }
                    if (trim($row['gambar']) == '') {
                        $foto_produk = 'no-image.png';
                    } else {
                        $foto_produk = $row['gambar'];
                    } ?>

                    <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="<?= base_url('produk/detail/') . $row['produk_seo']; ?>"><img src="<?= base_url('assets/images/produk/') . $foto_produk; ?>" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="<?= base_url('produk/detail/') . $row['produk_seo']; ?>">
                                    <?= $row['nama_produk'] ?></a></h3>
                      <div class="price"><?= $row['jumlah'] ?>x <?= rupiah($row['harga_jual'] - $row['diskon']); ?></div>
                    </div>
                    <div class="col-xs-1 action">  <a href="<?= base_url() . "keranjang/delete/" . encrypt_url($row['id_penjualan_detail']);  ?>"> <i class="fa fa-trash"></i>
                             
                        </a> </div>
                  </div>
				  
				 

                <?php } ?>


			
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>
                <div class="clearfix cart-total">
			       
			<?php 
				$total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-(b.diskon*a.jumlah)) as total, sum(b.berat*a.jumlah) as total_berat FROM `penjualantemp` a JOIN produk b ON a.id_produk=b.id_produk where a.session='" . $this->session->idp . "'")->row_array();
               ?>
						
                  <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>Rp <?= rupiah($total['total']); ?></span> </div>
                  <div class="clearfix"></div>
                  <a class="btn btn-black" href="<?= base_url('keranjang') ?>" style="width:100%; margin-bottom:10px; margin-top:20px;">Lihat Keranjang</a>
                  <a class="btn btn-black" href="<?= base_url('keranjang/checkouts') ?>" style="width:100%">Checkout</a> </div>
                <!-- /.cart-total--> 
                
              </li>
            </ul>
			
		 <?php } ?>
		 
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart --> 
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                
		<li class="dropdown yamm-fw"> <a href="<?php echo base_url(); ?>" >Home</a> </li>
               
		<li class="dropdown yamm-fw"> <a href="<?php echo base_url(); ?>produk" >Produk</a> </li> 
		
		
		<?php 
			 
			foreach ($halamans as $halaman) {
				echo '<li class="dropdown yamm-fw"> <a href="'.base_url().'page/detail/'.$halaman->judul_seo.'" >'.$halaman->judul.'</a> </li>';
			}
			
			?>
			
			
		
		<li class="dropdown yamm-fw"> <a href="<?php echo base_url(); ?>konfirmasi/tracking" >Cek Status Pesanan</a> </li>
               
		<?php if(isset($this->session->email_pengguna)) { ?>
		  <li class="" style="background-color:#FDD922;"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" style="color:#000 !important;">Menu Member</a>
                  <ul class="dropdown-menu pages">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          <div class="col-xs-12 col-menu">
                            <ul class="links">
					<li><a href="<?= base_url('members/dashboard') ?>">Dashboard</a></li>
					<li><a href="<?= base_url('members/edit_profile') ?>">Ubah Profil</a></li>
					<li><a href="<?= base_url('members/edit_alamat') ?>">Ubah Alamat</a></li>
					<li><a href="<?= base_url('members/riwayat_belanja') ?>">Riwayat Transaksi</a></li>
					<li><a href="<?= base_url('members/password') ?>">Ganti Password</a></li>
					<li><a href="javascript:void(0)" onclick="logout()">Keluar</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>  
				
		<?php } ?>
                
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  
</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
   
   <?= $konten; ?>
   
   
   
  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Kontak Kami</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class="toggle-footer" style="">
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p><?= $iden['alamat']?></p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p><?= $iden['no_telp']?></p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body"> <span><a href="#"><?= $iden['email']?></a></span> </div>
              </li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Perusahaan</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
            
		<?php 
			 
			foreach ($halamans as $halaman) {
				echo '<li> <a href="'.base_url().'page/detail/'.$halaman->judul_seo.'" >'.$halaman->judul.'</a> </li>';
			}
			
			?>
			
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Konsumen</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a title="Your Account" href="<?= base_url()?>auth/register">Registrasi</a></li>
              <li><a title="Login" href="<?= base_url()?>auth/login">Login</a></li>
              <li><a title="Rekening" href="<?= base_url()?>rekening">Rekening</a></li>
		 
		<li><a title="Konfirmasi Pembayaran" href="<?= base_url()?>konfirmasi">Konfirmasi Pembayaran</a></li>
		 
		
              <li><a title="Tracking" href="<?= base_url()?>konfirmasi/tracking">Tracking</a></li> 
			  
			
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Bantuan</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
               
              <li><a href="<?= base_url()?>auth/lupa_password" title="Lupa Password">Lupa Password</a></li> 
              
              <?php
              $query=$this->db->query("SELECT * FROM pengguna WHERE level='1' and aktif='1'");
              $hasil=$query->result();
              foreach($hasil as $h) {
                  $a = substr($h->no_telp,0,1);
                  $b = trim(substr($h->no_telp,1,20));
                  if($a=='0') {
                      $h->no_telp="62".$b;
                  } else {
                       $h->no_telp= $h->no_telp;
                  
                  }
                  echo "<li><a href='http://wa.me/".$h->no_telp."' title='Kirim Pesan'>".$h->nama_lengkap." ".$h->no_telp." </a> </li> ";
              }
              
              
              ?>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
      </div>
    </div>
  </div>
  <div class="copyright-bar">
    <div class="container">
      <div class="col-xs-12 col-sm-6 no-padding social">
        <ul class="link">
          <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
          <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
          <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
           
        </ul>
      </div>
      <div class="col-xs-12 col-sm-6 no-padding">
        <div class="clearfix payment-methods">
          <ul>
            <li><img src="<?php echo base_url(); ?>assets/template/flipmart/images/payments/1.png" alt=""></li>
            <li><img src="<?php echo base_url(); ?>assets/template/flipmart/images/payments/2.png" alt=""></li> 
          </ul>
        </div>
        <!-- /.payment-methods --> 
      </div>
    </div>
  </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<!-- <script src="<?php //echo base_url(); ?>assets/template/flipmart/js/jquery-1.11.1.min.js"></script>  -->
<script src="<?php echo base_url(); ?>assets/template/flipmart/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/template/flipmart/js/bootstrap-hover-dropdown.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/template/flipmart/js/owl.carousel.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/template/flipmart/js/echo.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/template/flipmart/js/jquery.easing-1.3.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/template/flipmart/js/bootstrap-slider.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/template/flipmart/js/jquery.rateit.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/template/flipmart/js/lightbox.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/template/flipmart/js/bootstrap-select.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/template/flipmart/js/wow.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/template/flipmart/js/scripts.js"></script>
 
 

      <?php $this->model_main->kunjungan(); ?>

    
    <script src="<?= base_url('assets/template/tema/') ?>vendor/select2/js/select2.min.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>js/number.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>js/main.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>js/header.js"></script>
    <script src="<?= base_url('assets/template/tema/') ?>vendor/svg4everybody/svg4everybody.min.js"></script>
    <script src="<?= base_url('assets/template/js/'); ?>sweetalert2.min.js"></script>
    <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="<?= base_url('assets/template/gijgo/js/gijgo.min.js') ?>"></script>
 
	  <script src="<?php echo base_url(); ?>assets/template/flipmart/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
   
   
   <script>
        var site_url = '<?= base_url() ?>';
		
		jQuery('#tanggal').datepicker({
			autoclose: true,
			todayHighlight: true
		});
		
    </script>
	
    <script src="<?= base_url('assets/template/js/footer.js') ?>"></script>


</body>
</html>