<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'><?= $breadcrumb; ?></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="terms-conditions-page">
			<div class="row">
				<div class="col-lg-12 terms-conditions">
			 <h2 style="margin-top:0px;">Konfirmasi Pembayaran</h2>	
				
	<br/> 
	<div class="form-group row">
	<div class="col-lg-7">
            <?= $this->session->flashdata('message') ?>
	</div>
	</div>
	
     
   
	   
    <p>Masukan no. invoice pada pada form dibawah ini.</p>
    <form method="POST" action="<?= base_url('konfirmasi') ?>">
      <div class="row">
	  <div class="col-lg-3" style="margin-bottom:10px;">
        <input type="text" name="a" class="form-control" placeholder="INV-0000000000" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
		</div>
        <div class="col-lg-3">
          <button class="btn btn-black" name="submit1" type="submit">Cek invoice</button>
        </div>
		
      </div>
    </form>

  <br/><br/>
 
 
 </div>			
</div><!-- /.row -->
</div><!-- /.sigin-in-->

<br/><br/>
