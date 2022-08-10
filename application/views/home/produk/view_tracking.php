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
				
				
   
    <?= $this->session->flashdata('message') ?>
    <h2 style="margin-top:0px;">Cek Status Pesanan</h2>
   
   <p>Masukan Nomor / Kode Invoice pada pada form dibawah ini.</p>
    <form method="POST" action="<?= base_url('konfirmasi/tracking') ?>">
      <div class="input-group mb-3 row">
		<div class="col-lg-8">
		<input type="text" name="kode" class="form-control" placeholder="INV-0000000000" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
		</div>
			<div class="col-lg-3">
          <button class="btn btn-black" name="submit1" type="submit">Cek Invoice</button>
        </div>
      </div>
    </form>

  
 <br/><br/>
 
 
 </div>			
</div><!-- /.row -->
</div><!-- /.sigin-in-->

<br/><br/>