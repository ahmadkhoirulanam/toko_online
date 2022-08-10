<?php $iden = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array(); ?>
 
 
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon/') ?><?= $iden['favicon']; ?>">
    <title>Admin - <?= $title; ?></title>
	
	
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/template/eliteadmin/') ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/template/eliteadmin/') ?>/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?= base_url('assets/template/eliteadmin/') ?>/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
     
    <!-- morris CSS -->
    <link href="<?= base_url('assets/template/eliteadmin/') ?>/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


<link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/') ?>plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/') ?>plugins/summernote/summernote-bs4.css">
   
   
    <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/'); ?>plugins/select2/css/select2.css">
  <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/'); ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.css">
  <!-- Select2 -->
  
   
	 <script src="<?= base_url('assets/template/adminlte3/') ?>plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/select2/js/select2.full.js"></script>
  <script>
    var site_url = "<?= base_url() ?>";
  </script>
  
  
  
	 
  
	
      <link href="<?= base_url('assets/template/eliteadmin/') ?>css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/template/eliteadmin/') ?>css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?= base_url('assets/template/eliteadmin/') ?>css/colors/default.css" id="theme" rel="stylesheet">
  
     <link rel="stylesheet" href="<?= base_url('assets/template/adminlte3/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" href="<?= base_url('assets/template/css/'); ?>sweetalert2/sweetalert2.min.css">
  
  
  <link href="<?php echo base_url(); ?>assets/template/flipmart/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
 
  <style>
  
 	.card-title {
		text-transform:uppercase !important;
		font-weight:bolder;
		margin-top:2px;
	}
	
	.col-form-label, .breadcrumb, .sidebar-nav{
		font-weight:400 !important;
	}
	
	table, .dataTables_filter, .dataTables_paginate {
		font-size:0.9em  !important;
	}
	
	th {
		text-transform:uppercase !important;
		text-align : center !important;
		background: #e4e7ea;
	}
	
	
	 


	.dataTables_paginate {
		margin-top:15px !important;
	}
	
 
	
	.dt-button  {
		font-weight:400;
		margin:0px;
		padding-top:10px !important;
		margin:0px !important; 
	}
	
	#example23_previous, #example23_next  {
		background: #4c5667 !important;
		opacity: 0.2;
		color:#FFF !important; 
	}


 
	
	footer {
		background: #4C5667 !important;
	}
	
	.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
		background-color: #353C48 !important;
		opacity: 1;
		color:#FFF !important;
	}
	
	table {
		font-weight:400 !important;
	}
	
	.dt-button {
		 
		background: #fff !important;
	}
  
	
	.white-box h3.box-title {
		font-size:2rem !important;
	}
	
	.slimScrollDiv, .sidebar{
		overflow : hidden !important;
	}
	 .slimScrollBar {
		 display:none  !important;
	 }
  	</style>
	
	
	
</head>

<body>
    <!-- Preloader -->
      <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
	
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
               
				<!--<img src="<?= base_url('assets/images/favicon/'.$iden['logo']) ?>" alt="home" class="dark-logo" style="width:150px; height:50px; margin:10px 5px 5px 5px;"/> -->
		
<?php 
 
$xxx = explode(" ",$iden['nama_website']);
?>		
		<div class="top-left-part"><a class="logo" style="margin-left:20px;" href="<?= base_url().'admin/home'; ?>"><b> <?= $xxx[0]?></b><span class="hidden-xs"> <?= $xxx[1]?></span></a></div>		
				
				
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
 
                    <li>
                         
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                   
                     
                    <li class=""><a class="nav-link" href="<?= base_url() ?>" target="_blank">
            <i class="fa fa-external-link"></i> Lihat Website
          </a></li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
		
		 <?php
        $log = $this->model_pengguna->pengguna_edit($this->session->idadmin)->row_array();
        if ($log['foto'] == '') {
          $foto = 'default.jpg';
        } else {
          $foto = $log['foto'];
        }
		
		?>
		
       <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
			
			
			 <li class="user-pro">
                        <a href="#" class="waves-effect"><img src="<?php echo base_url()."assets/images/user/".$foto; ?>" alt="user-img" class="img-circle"> <span class="hide-menu"> <?= $log[nama_lengkap] ?><span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                           <li><a href="<?php echo base_url();?>admin/profil"><i class="ti-user"></i> My Profile</a></li> 
                            <li><a href="<?php echo base_url();?>admin/login/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
					
			 <br/>
				
			<?php include 'sidebar.php' ?>	
				
                
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
               
			    <?php echo $konten; ?>
             
            </div>
            <!-- /.container-fluid -->
              <footer class="footer text-center" style="color:#FFF;">  &copy; <?= date("Y") ?>. <?= $iden['nama_website'] ?>. </footer>
        </div>
        <!-- /#page-wrapper -->
		
		
		
		
		
		
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
	
	
	
	
	<div class="modal fade" id="modal_ajax" style="padding-top:100px;">
        <div class="modal-dialog" >
            <div class="modal-content">
                
                <div class="modal-header">
                     <button type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</button>
					 <h4 class="modal-title"><div class="judul"></div></h4> 
			
                     		
                </div>
                
                <div class="modal-body" style="overflow:auto;"> <!-- style="height:500px; overflow:auto;" -->
                
                    
                    
                </div>
                
                <div class="modal-footer">
                    <div class="tutup pull-left left"></div>
                </div>
            </div>
        </div>
    </div>
	
  
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
    <!--Counter js -->
    <script src="<?= base_url('assets/template/eliteadmin/') ?>/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="<?= base_url('assets/template/eliteadmin/') ?>/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="<?= base_url('assets/template/eliteadmin/') ?>/plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="<?= base_url('assets/template/eliteadmin/') ?>/plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url('assets/template/eliteadmin/') ?>js/custom.min.js"></script>
    <script src="<?= base_url('assets/template/eliteadmin/') ?>js/dashboard1.js"></script>
 
	
	
	  <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
  <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/summernote/summernote-bs4.min.js"></script>

  <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?= base_url('assets/template/adminlte3/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>  
 
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<script src="<?= base_url('assets/template/js/'); ?>sweetalert2.min.js"></script>
 
  	  <script src="<?php echo base_url(); ?>assets/template/flipmart/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
   
   
   
	
  <script>
  
	function showAjaxModal(url) { 
			$('#modal_ajax').modal('show', {backdrop: 'true'}); 
			$.ajax({
				url:  url,
				success: function(response)
				{ 
					$('#modal_ajax .modal-body').html(response);
				}
			});
		}
		
  
   $(".alert").delay(4000).addClass("in").fadeOut("slow");
  
		jQuery('#tanggal').datepicker({
			autoclose: true,
			todayHighlight: true
		});
		
		jQuery('#tanggal2').datepicker({
			autoclose: true,
			todayHighlight: true
		});
		
    $('.datepicker').datepicker({
      uiLibrary: 'bootstrap4'
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#table1').DataTable({
        "bInfo": false,
        "lengthChange": false,
        "paging": true,
        "searching": true,
        "scrollX": true,
        "ordering": false,
      });
	  
	  
      $('#table2').DataTable({
        "bInfo": false,
        "lengthChange": false,
        "paging": true,
        "searching": false,
        "scrollX": true,
        "autoWidth": false,
        "ordering": false,
      });
	  
	  
	   $('#kolom3').DataTable({
			dom: 'Bfrtip',
			buttons: [
				//'copy', 'csv', 'excel', 'pdf', 'print'
				 
            {
           extend: 'copy',
           exportOptions: {
           columns: [ 0, 1, 2 ]  
               }
             },
             {
              extend: 'excel',
              exportOptions: {
              columns: [ 0, 1, 2 ] 
             }
           },
             {
              extend: 'pdf',
              exportOptions: {
              columns: [ 0, 1, 2 ]  
             }
           },
             {
              extend: 'print',
              exportOptions: {
              columns: [ 0, 1, 2 ]  
             }
           },
           
			]
		});
		
	  
	   $('#kolom4').DataTable({
			dom: 'Bfrtip',
			buttons: [
				//'copy', 'csv', 'excel', 'pdf', 'print'
				 
            {
           extend: 'copy',
           exportOptions: {
           columns: [ 0, 1, 2, 3 ]  
               }
             },
             {
              extend: 'excel',
              exportOptions: {
              columns: [ 0, 1, 2, 3 ] 
             }
           },
             {
              extend: 'pdf',
              exportOptions: {
              columns: [ 0, 1, 2, 3 ]  
             }
           },
             {
              extend: 'print',
              exportOptions: {
              columns: [ 0, 1, 2, 3 ]  
             }
           },
           
			]
		});
		
	  
	  $('#kolom5').DataTable({
			dom: 'Bfrtip',
			buttons: [
				//'copy', 'csv', 'excel', 'pdf', 'print'
				 
            {
           extend: 'copy',
           exportOptions: {
           columns: [ 0, 1, 2, 3, 4 ]  
               }
             },
             {
              extend: 'excel',
              exportOptions: {
              columns: [ 0, 1, 2, 3, 4 ] 
             }
           },
             {
              extend: 'pdf',
              exportOptions: {
              columns: [ 0, 1, 2, 3, 4 ]  
             }
           },
             {
              extend: 'print',
              exportOptions: {
              columns: [ 0, 1, 2, 3, 4 ]  
             }
           },
           
			]
		});
		
		
		 $('#kolom6').DataTable({
			dom: 'Bfrtip',
			buttons: [
				//'copy', 'csv', 'excel', 'pdf', 'print'
				 
            {
           extend: 'copy',
           exportOptions: {
           columns: [ 0, 1, 2, 3, 4, 5 ]  
               }
             },
             {
              extend: 'excel',
              exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5 ] 
             }
           },
             {
              extend: 'pdf',
              exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5 ]  
             }
           },
             {
              extend: 'print',
              exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5 ]  
             }
           },
           
			]
		});
	
	
	    $('#kolom7').DataTable({
			dom: 'Bfrtip',
			buttons: [
				//'copy', 'csv', 'excel', 'pdf', 'print'
				 
            {
           extend: 'copy',
           exportOptions: {
           columns: [ 0, 1, 2, 3, 4, 5, 6 ]  
               }
             },
             {
              extend: 'excel',
              exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5, 6 ] 
             }
           },
             {
              extend: 'pdf',
              exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5, 6 ]  
             }
           },
             {
              extend: 'print',
              exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5, 6 ]  
             }
           },
           
			]
		});
		
		
		$('#laporan').DataTable({
			dom: 'Bfrtip',
			buttons: [
				//'copy', 'csv', 'excel', 'pdf', 'print'
				 
            {
           extend: 'copy',
           exportOptions: {
           columns: [ 0, 1, 2, 3, 4, 5 ]  
               }
             },
             {
              extend: 'excel',
              exportOptions: {
              columns: [ 0, 1, 2, 3, 4, 5 ] 
             }
           },
             
           
			]
		});
		
	
    });
	
	
  </script>

 

  <script>
     
      $('.select2').select2({
        theme: 'bootstrap4'
      })
     
  </script>


 
  <script>
    $('#summernote').summernote({
      tabsize: 2,
      height: 200
    });
  </script>

  <?php $this->model_main->kunjungan(); ?>
  
  
</body>

</html>
