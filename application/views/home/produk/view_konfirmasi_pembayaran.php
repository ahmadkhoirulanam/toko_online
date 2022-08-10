<style>
.input-group-append button{
	display:none;
}

input.datepicker  {
	width:100% !important;
	border-radius:5px !important;
}

.input-group {
	width:100% !important;
}
</style>

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
    <h2 style="margin-top:0px;">Konfirmasi Pembayaran</h2><br/> 
	
	
	<div class="form-group row">
	<div class="col-lg-7">
            <?= $this->session->flashdata('message') ?>
	</div>
	</div>
	
 
    <form action="<?= base_url('konfirmasi/form') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

      <input type='hidden' name='id' value='<?= $rows['id_penjualan'] ?>'>

     
      <div class="form-group row">
        <label class="col-md-2 col-form-label">No. Invoice</label>
        <div class="col-md-5">
          <input type='text' name='a' class='form-control' value='<?= $rows['kode_transaksi'] ?>' placeholder='INV-0000000000' required>
        </div>
      </div>

      <?php
      if ($rows['kode_transaksi'] != '') { ?>

        <div class="form-group row">
          <label class="col-md-2 col-form-label">Total Bayar</label>
          <div class="col-md-5">
            <input type='text' name='b' class='form-control' value="Rp <?= rupiah($total['total'] + $total['ongkir'] + $total['kode_unik']); ?>" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-md-2 col-form-label">Transfer Ke</label>
          <div class="col-md-5">
            <select name='c' class='form-control' required>
              <option value='' selected>-- Pilih --</option>
              <?php
              foreach ($record->result_array() as $row) { ?>
                <option value='<?= $row['id_rekening'] ?>'><?= $row['nama_bank'] . '&nbsp; - &nbsp;' . $row['no_rekening'] ?> (<?= $row['pemilik_rekening'] ?>)</option>

              <?php }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-md-2 col-form-label">Nama Pengirim</label>
          <div class="col-md-5">
            <input type='text' class='form-control' name='d' value='<?= $ksm['nama_lengkap'] ?>' required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-md-2 col-form-label">Tanggal Transfer</label>
          <div class="col-md-5">
            <td><input type='text' class='datepicker form-control' name='e' data-date-format='yyyy-mm-dd' value='<?= date(' Y-m-d') ?>' autocomplete="off" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-md-2 col-form-label">Bukti Transfer</label>
          <div class="col-md-5">

            <div class="custom-file">
              <input style='text-transform:lowercase;' type="file"   name="userfile" required>
              
            </div>
            <small>Silahkan pilih file dengan format <b class="text-danger">jpg/png</b>, ukuran maksimal <b class="text-danger">2mb</b></small>

          </div>
        </div>


      <?php } ?>

      <div class="form-group row">
        <label class="col-md-2 col-form-label"></label>
        <div class="col-md-5">
          <button type='submit' name='submit' class='btn btn-black btn-sm float-right'>Kirimkan</button>
        </div>
      </div>


    </form>
 
 
  <br/><br/>
 
 
 </div>			
</div><!-- /.row -->
</div><!-- /.sigin-in-->

<br/><br/>


