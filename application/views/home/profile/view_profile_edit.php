<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Member</a></li>
				<li class='active'>Ubah Profil</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
				 
     
<div class="sidebar-widget hot-deals wow fadeInUp">
	<h3 class="section-title">MENU MEMBER</h3>
	    <ul>
            <li class="account-nav__item"><a href="<?= base_url('members/dashboard') ?>">Dashboard</a></li>
            <li class="account-nav__item account-nav__item--active"><a href="<?= base_url('members/edit_profile') ?>">Ubah Profil</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/edit_alamat') ?>">Ubah Alamat</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/riwayat_belanja') ?>">Riwayat Transaksi</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/password') ?>">Ganti Password</a></li>
            <li class="account-nav__item"><a href="javascript:void(0)" onclick="logout()">Keluar</a></li>
          </ul>
         
</div>
 
 
 	</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
            <div class="detail-block">
			<div class=" wow fadeInUp">
				
 
  <?= $this->session->flashdata('message') ?>
	 
	 
		
  <form action="<?= base_url('members/edit_profile') ?>" method="post" enctype="multipart/form-data">

                  <input type="hidden" name="id" value="<?= encrypt_url($row['id_pengguna']) ?>">

                 
                  <div class="form-group row">
                    <label class="col-lg-2">Nama Lengkap</label>
                    <div class="col-lg-6">
					<input class='form-control' type='text' name='b' value='<?= $row['nama_lengkap']; ?>' required>
                  </div>
			</div>

                

                  <div class="form-group row">
                    <label class="col-lg-2">Jenis Kelamin</label>
                    <div class="col-lg-6">
                    <?php
                    if ($row['jenis_kelamin'] == 'Laki-laki') { ?>

                      <div class="form-check-inline single-ship">
                        <input class="mr-2" type='radio' value='Laki-laki' name='d' checked> Laki-laki
                        <input class="mr-2 ml-5" type='radio' value='Perempuan' name='d'> Perempuan
                      </div>
			 

                    <?php } else { ?>

                      <div class="form-check-inline single-ship">
                        <input type='radio' value='Laki-laki' name='d'> &nbsp; Laki-laki
                        <input class="ml-3" type='radio' value='Perempuan' name='d' checked> &nbsp; Perempuan
                      </div>

                    <?php }
                    ?>
			</div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-2">No. Telp</label>
                    <div class="col-lg-4">
				<input class='form-control' type='text' name='l'  value='<?= $row['no_telp']; ?>' required>
			</div>
                  </div>

			
                  <div class="form-group row">
                    <label class="col-lg-2">Email</label>
			<div class="col-lg-6">
                    <input class='email form-control' type='email' name='c' value='<?= $row['email']; ?>' required >
			</div>
                  </div>

			 <div class="form-group row">
                    <label class="col-lg-2"></label>
			<div class="col-lg-6">
                     <button class="btn btn-black" type="submit" name="submit">Simpan</button>
			</div>
                  </div>
				  

                   

                </form>




			</div>
 
 
 
	
	
</div>
    
 
 

				</div>
			</div><!-- /.sidebar -->
			 <div class="clearfix"></div>
		</div><!-- /.row -->
		 

 
<br/>
<br/>


 <script>
  
   $(".alert").delay(4000).addClass("in").fadeOut("slow");
  
 </script>


 