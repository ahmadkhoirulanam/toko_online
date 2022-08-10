<?php
if (trim($record['foto']) == '') {
  $foto_user = 'default.jpg';
} else {
  $foto_user = $record['foto'];
}
?>



 
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Member</a></li>
				<li class='active'>Dashboard</li>
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
            <li class="account-nav__item  account-nav__item--active"><a href="<?= base_url('members/dashboard') ?>">Dashboard</a></li>
            <li class="account-nav__item"><a href="<?= base_url('members/edit_profile') ?>">Ubah Profil</a></li>
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
				<div class="wow fadeInUp">
				
 
		<div class="profile-card__avatar col-lg-3">
                 
                  <img src="<?= base_url('assets/images/user/') . $foto_user ?>" width="100px" height="100px">
                  <br/>
                    <a href="#" data-toggle="modal" data-target="#uploadfoto" title="Ganti foto">
                      <img src="<?= base_url('assets/images/icon/camera.png') ?>" style="width:25px">
                    </a>
                 
                
              </div>

		<div class="col-lg-9"  width="100%">
		
		<table class="table table-condensed" width="100%">
			<tr><td width="25%">Nama Lengkap</td><td><?= $record['nama_lengkap'] ?> 
			 
			</td></tr>
			<tr><td>Alamat</td><td> 
			 
				<?= $rows['alamat'] ?> 
					  Kec. <?= $rows['kecamatan'] ?><br>
					  <?= $rows['nama_kota'] ?>, <?= $rows['kode_pos'] ?>   
			 
			</td></tr>
			<tr><td>No.Telp.</td><td><?= $record['no_telp'] ?></td></tr>
			<tr><td>Email</td><td><?= $record['email'] ?></td></tr>
		</table>
		
		
              
             
              
            
		</div>
          </div>
 
 
 
	
	
</div>
    
 
 

				</div>
			</div><!-- /.sidebar -->
			 <div class="clearfix"></div>
		</div><!-- /.row -->
		 

 
<br/>
<br/>


              
			  
<div class="modal fade" id="uploadfoto">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content rounded">
            <div class="modal-body">
                <?php
                $attributes = array('class' => 'form', 'role' => 'form');
                echo form_open_multipart('members/foto', $attributes); ?>

                <h4 class="mb-3 mt-3">GANTI FOTO PROFIL</h4>

                <div class="custom-file mt-3 mb-3">
                    <input style='text-transform:lowercase;' type="file"   name="userfile" required>
                    
                </div>


                <div class="row mt-3">
                     <br/>
                    <div class="col-5 col-md-5 col-sm-5 col-xs-5 mx-auto">
                        <button type="submit" name='submit' class="btn  btn-sm btn-black  ">Simpan</button>
                    </div>
                </div>

            </div>
            </form>
        </div>

    </div>
</div>
</div>