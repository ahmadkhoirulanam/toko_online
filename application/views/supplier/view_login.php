<?php $iden = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array(); ?>
 
 
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
     
    <title><?php echo $title; ?></title>
<link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon/') ?><?= $iden['favicon']; ?>">

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/template/eliteadmin/') ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/template/eliteadmin/') ?>/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?= base_url('assets/template/eliteadmin/') ?>css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/template/eliteadmin/') ?>css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?= base_url('assets/template/eliteadmin/') ?>css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- toast CSS -->
    <link href="<?= base_url('assets/template/eliteadmin/') ?>/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->

<style>
input[text],input[password]{
	font-weight:400 !important;
	color:#999 !important;
}

input {
	font-weight:400 !important;
	color:#999 !important;
}

 
.login-register { 
    background: url(<?php echo base_url(); ?>assets/template/eliteadmin/plugins/images/big/img6.jpg) center center/cover no-repeat !important;
    height: 100%;
    position: fixed;
}

.login-box {
	margin-top:80px;
}


*{
  font-weight:400 !important;
}
 
</style>
</head>

<body>
    <!-- Preloader -->
 
    <section id="wrapper" class="login-register">
        <div class="login-box" style="width:257px;">
            <div class="white-box" style="background-color:#CCC;">
			
			
			 
			 <center><img src="<?php echo base_url(); ?>assets/images/favicon/<?= $iden['logo'] ?>" style="width:100%; margin-top:20px;" /></center>
			<br/>
			<br/>
			
                <form class="form-horizontal form-material" id="loginform" method="post" action="">
                    <h3 class="box-title m-b-20">LOGIN SUPPLIER</h3>
				

		<?php if($this->session->userdata('Sukses')!="") { ?>
		 <div class='alert alert-success'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Sukses"); ?></div>

		<?php  $this->session->unset_userdata('Sukses'); 
		
		} else if ($this->session->userdata('Gagal')!="") { ?>
		 <div class='alert alert-danger'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'></i></button><?php echo $this->session->userdata("Gagal"); ?></div>
		  
		<?php  $this->session->unset_userdata('Gagal'); 
		}  ?>
    
	
			<?php

		 if($_SESSION[sukses]!="")
		 {
			echo " <div class='alert alert-success'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'>
			</i></button>".$_SESSION['sukses']."</div>";
			$_SESSION[sukses]="";  
		 } else if($_SESSION[gagal]!="")
		 {
			echo " <div class='alert alert-danger'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'>
			</i></button>".$_SESSION['gagal']."</div>";
			$_SESSION[gagal]="";  
		 }

		?>				
		
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="email" type="text" required="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="password" type="password" required="" placeholder="Password">
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button name='submit' class="btn btn-dark btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                     <br/>
                  <br/> 
                </form>
                </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="<?= base_url('assets/template/eliteadmin/') ?>/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('assets/template/eliteadmin/') ?>bootstrap/dist/js/tether.min.js"></script>
    <script src="<?= base_url('assets/template/eliteadmin/') ?>bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/template/eliteadmin/') ?>/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?= base_url('assets/template/eliteadmin/') ?>/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?= base_url('assets/template/eliteadmin/') ?>js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('assets/template/eliteadmin/') ?>js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url('assets/template/eliteadmin/') ?>js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="<?= base_url('assets/template/eliteadmin/') ?>/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
	
	<script>
 $('.alert').delay(4000).slideUp();
</script>

 

</body>

</html>
