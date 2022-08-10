<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Member</a></li>
				<li class='active'>Ganti Password</li>
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
            <li class="account-nav__item"><a href="<?= base_url('members/edit_profile') ?>">Ubah Profil</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/edit_alamat') ?>">Ubah Alamat</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/riwayat_belanja') ?>">Riwayat Transaksi</a></li>
            <li class="account-nav__item account-nav__item--active"><a href="<?= base_url('members/password') ?>">Ganti Password</a></li>
            <li class="account-nav__item"><a href="javascript:void(0)" onclick="logout()">Keluar</a></li>
          </ul>
         
</div>
 
 
 	</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
            <div class="detail-block">
			<div class=" wow fadeInUp">
				
			                <?= $this->session->flashdata('message') ?>

                <form action="<?= base_url('members/password') ?>" method="post" enctype="multipart/form-data">


			<?= $this->session->flashdata('message1') ?>

                  <div class="form-group row">
                    <label class="col-lg-2"><b>Password Lama</b></label>
                    <div class="col-lg-5">
					<input class='form-control' type='password' name='pass'>
                    <?= form_error('pass', '<small class="text-danger ml-1">', '</small>'); ?>
                  </div>
		</div>


                  <div class="form-group row">
                    <label class="col-lg-2">Password Baru</label>
                    <div class="col-lg-5">
				<input class='form-control' type='password' name='pass1'>
                    <?= form_error('pass1', '<small class="text-danger ml-1">', '</small>'); ?>
                  </div>
			</div>

                  <div class="form-group row">
                    <label class="col-lg-2">Konfirmasi Password Baru</label>
                    <div class="col-lg-5">
				<input class='form-control' type='password' name='pass2'>
                    <?= form_error('pass2', '<small class="text-danger ml-1">', '</small>'); ?>
                  </div>
			</div>
			
			 <div class="form-group row">
                    <label class="col-lg-2"></label>
                    <div class="col-lg-5">
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




 
 