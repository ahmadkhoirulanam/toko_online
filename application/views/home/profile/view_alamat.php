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
            <li class="account-nav__item"><a href="<?= base_url('members/edit_profile') ?>">Ubah Profil</a></li>
            <li class="account-nav__item account-nav__item--active"><a href="<?= base_url('members/edit_alamat') ?>">Ubah Alamat</a></li>
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
	 
	 
 
  <form action="<?= base_url('members/edit_alamat') ?>" method="post" enctype="multipart/form-data">

		 

                  <input type="hidden" name="id" value="<?= encrypt_url($row['id_alamat']) ?>">

                  <div class="form-group row">
                    <label class="col-lg-2">Alamat</label>
				<div class="col-lg-8">
					<textarea name="alamat" class="form-control" rows="3" required><?= $row['alamat']; ?></textarea>
				</div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-2">Kecamatan</label>
                    <div class="col-lg-6">
				<input class='form-control' type='text' name='kec' value="<?= $row['kecamatan']; ?>" required>
                  </div>
			</div>

                  <div class="form-group row">
                    <label class="col-lg-2">Kota / Kab.</label>
                    <div class="col-lg-6">
				<select class='form-control select2' name='kab' required>
						  <option value=''>- Pilih -</option>
						  <?php
						  foreach ($kota->result_array() as $rows) {
							if ($row['id_kota'] == $rows['kota_id']) {
							  echo "<option value='$rows[kota_id]' selected>$rows[nama_kota]</option>";
							} else {
							  echo "<option value='$rows[kota_id]'>$rows[nama_kota]</option>";
							}
						  }
						  ?>
						</select>
				</div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-2">Kode Pos</label>
                    <div class="col-lg-3">
				<input class='form-control' min="0" type='text' name='kode_pos' value='<?= $row['kode_pos']; ?>' required>
			</div>
                  </div>

		<div class="form-group row">
                    <label class="col-lg-2"> </label>
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
 
  