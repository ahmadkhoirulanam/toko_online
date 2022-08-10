<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="terms-conditions-page">
			<div class="row">
				<div class="col-md-12 terms-conditions">
	<h2 class="heading-title">Login Member</h2>
	<div class="">
	<br/> 
	<div class="form-group row">
	<div class="col-lg-7">
            <?= $this->session->flashdata('message') ?>
	</div>
	</div>
		
            <form action="<?= base_url('login') ?>" method="post">

                <div class="form-group row">
			<label class="col-lg-2">Email  </label>
			<div class="col-lg-5">
                    <input type="text" name="user_email" class="form-control" value="">
                    <?= form_error('user_email', '<small class="text-danger ml-1">', '</small>'); ?>
			</div>
                </div>
                <div class=" form-group row">
			<label class="col-lg-2">Password</label>
			<div class="col-lg-5">
                    <input type="password" name="password" class="form-control">
                    <?= form_error('password', '<small class="text-danger ml-1">', '</small>'); ?>
			</div>
                </div>
				
		 <div class=" form-group row">
			<label class="col-lg-2"></label>
			<div class="col-lg-5">
                     
					<button type="submit" class="btn btn-black mt-4">Login</button>
					<br><br>

					<div class="mt-5">
						<p>Belum punya akun? <a href='<?= base_url('auth/register') ?>'>Registrasi.</a> <br/>
						<a class="" href='<?= base_url('auth/lupa_password') ?>'>Lupa password ?</a></p>
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
