<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Register</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="terms-conditions-page">
			<div class="row">
				<div class="col-md-12 terms-conditions">
	<h2 class="heading-title">Pendaftaran Member</h2>
	<div class="col-lg-12">

	<br/> 
	 
            <?= $this->session->flashdata('message') ?>
	 
 
            <form action="<?= base_url('register'); ?>" method="post">

           <div class="col-lg-6">  
            
                <div class="form-group row">
                    <label class="col-lg-3">Nama Lengkap</label>
                    <div class="col-lg-8">
				<input type="text" class="form-control" name="nama" value="<?= set_value('nama'); ?>" required>
				<?= form_error('nama', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
			</div>
                </div>
				
		<div class="form-group row">
                    <label class="col-lg-3">Jenis Kelamin</label>
                    <div class="col-lg-8">
				<input type="radio" class="" name="jk" value="Laki-laki" required> Laki-laki 
				<input type="radio" class="" name="jk" value="Perempuan"> Perempuan
				<?= form_error('jenis_kelamin', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
			</div>
                </div>
				
				
		<div class="form-group row">
                    <label class="col-lg-3">Tanggal Lahir</label>
                    <div class="col-lg-8">
				<input type="text" class="form-control" id="tanggal" name="tgllahir" value="<?= set_value('tgllahir'); ?>" data-date-format="yyyy-mm-dd" required>
				<?= form_error('tgllahir', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
			</div>
                </div>
				

                <div class="form-group row">
                    <label class="col-lg-3">No. Telp</label>
                    <div class="col-lg-8">
				<input type="text" class="form-control" name="telp" value="<?= set_value('telp'); ?>" required>
				<?= form_error('telp', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
			</div>
                </div>
				
				
		<div class="form-group row">
                    <label class="col-lg-3">Alamat</label>
                    <div class="col-lg-8">
				<textarea class="form-control" name="alamat" rows="2" required></textarea>
				<?= form_error('alamat', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
			</div>
                </div>

		   <div class="form-group row">
                    <label class="col-lg-3">Kecamatan</label>
			<div class="col-lg-8">		
                    <input type="text" class="form-control" name="kecamatan" value="<?= set_value('kecamatan'); ?>" required>
                    <?= form_error('kecamatan', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                </div>
			</div>



                <div class="form-group row">
                    <label class="col-lg-3">Kota </label>
				<div class="col-lg-8">
						<select name="kota" class='select2' style="width:100%" required>
							<option value=""></option>
							<?php $qkota = $this->db->get('kota');
							foreach ($qkota->result_array() as $kota) { ?>
								<option value="<?= $kota['kota_id'] ?>"><?= $kota['nama_kota'] ?></option>
							<?php } ?>
						</select>
						<?= form_error('kota', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
				</div>
                </div>
				
		   <div class="form-group row">
                    <label class="col-lg-3">Kode Pos</label>
			<div class="col-lg-8">		
                    <input type="text" class="form-control" name="kodepos" value="<?= set_value('kodepos'); ?>" required>
                    <?= form_error('kodepos', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                </div>
			</div>
				
			<br/><br/>
		</div>
		<div class="col-lg-6">  
				
		   <div class="form-group row">
                    <label class="col-lg-3">Email</label>
			<div class="col-lg-8">		
                    <input type="text" class="form-control" name="email" value="<?= set_value('email'); ?>" required>
                    <?= form_error('email', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
                </div>
			</div>


                <div class="form-group row">
                    <label class="col-lg-3">Password</label>
				<div class="col-lg-8">
						<input type="password" class="form-control" name='password1' required>
						<?= form_error('password1', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
				</div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3">Ulangi Password</label>
                    <div class="col-lg-8">
				<input type="password" class="form-control" name='password2' required>
				<?= form_error('password2', '<small class="font-italic text-danger ml-1">', '</small>'); ?>
			</div>
                </div>
				
				
		 <div class="form-group row">
                    <label class="col-lg-3"></label>
                    <div class="col-lg-8">
				<button type="submit" name="submit" class="btn btn-black mt-4">Kirim Data</button> <br/><br/>
				<p>Sudah punya akun? <a class="" href='<?= base_url('login') ?>'>Login.</a></p>
					
			</div>
                </div>
		
	</div>
                 
                
            </form>
   
   
   
	</div>
</div>			
</div><!-- /.row -->
</div><!-- /.sigin-in-->

<br/>
<br/>
