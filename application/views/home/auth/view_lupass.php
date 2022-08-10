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
	<h2 class="heading-title">Lupa Password</h2>
	<div class="">
	
	
            <?= $this->session->flashdata('message') ?>
		
		<br/><br/>
		
		
            <form action="<?= base_url('auth/lupa_password') ?>" method="post">

             
                
				
		<div class=" form-group row">
			<label class="col-lg-2">Email</label>
			<div class="col-lg-5">
                    <input type="text" name="email" class="form-control" value="<?= set_value('email'); ?>" placeholder="Masukan email Anda">
                    <?= form_error('user_email', '<small class="text-danger ml-1">', '</small>'); ?>
			</div>
                </div>
				
		<div class=" form-group row">
			<label class="col-lg-2"></label>
			<div class="col-lg-5">
                    <button type="submit" class="btn btn-black mt-4">Kirim</button>
			</div>
                </div>
				

                <br><br>
				
				
            </form>
    
	
		</div>
</div>			
</div><!-- /.row -->
</div><!-- /.sigin-in-->

<br/>
<br/>
