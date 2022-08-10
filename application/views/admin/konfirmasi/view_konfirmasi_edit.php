<div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Konfirmasi Pembayaran</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">  
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li>Konfirmasi Pembayaran</li>
				<li class="active">Edit Status Konfirmasi</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				 
		  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
						
				<h3 class="box-title m-b-0">Edit Status Konfirmasi</h3><br/>

       
	<div class="row">
	<div class="col-lg-6">
     
      <div class="form-group row">
        <label class="col-md-4 col-form-label">No. Invoice </label>
        <div class="col-md-8">
          <input type='text' name='a' class='form-control' value='<?= $rows['kode_transaksi'] ?>' placeholder='INV-0000000000' disabled>
        </div>
      </div>

      

        <div class="form-group row">
          <label class="col-md-4 col-form-label">Total Bayar</label>
          <div class="col-md-8">
            <input type='text' name='b' class='form-control' value="Rp <?= rupiah($total['total'] + $total['ongkir'] + $total['kode_unik']); ?>" disabled>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-md-4 col-form-label">Transfer Ke</label>
          <div class="col-md-8">
            <select name='c' class='form-control' disabled> 
              <?php
              foreach ($record->result_array() as $row) { 
			 if($rows['id_rekening']==$row['id_rekening']) { $ok="selected=selected";} else { $ok="";} 
			  ?>
                <option value='<?= $row['id_rekening'] ?>' <?= $ok ?>><?= $row['nama_bank'] . '&nbsp; - &nbsp;' . $row['no_rekening'] ?> (<?= $row['pemilik_rekening'] ?>)</option>

              <?php }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-md-4 col-form-label">Nama Pengirim</label>
          <div class="col-md-8">
            <input type='text' class='form-control' name='d' value='<?= $rows['nama_pengirim'] ?>' disabled>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-md-4 col-form-label">Tanggal Transfer</label>
          <div class="col-md-8">
            <td><input type='text' class='datepicker form-control' name='e' data-date-format='yyyy-mm-dd' value='<?= date(' Y-m-d') ?>' autocomplete="off" disabled>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-md-4 col-form-label">Bukti Transfer</label>
          <div class="col-md-8">

             <img src="<?= base_url(); ?>assets/images/bukti/<?= $rows['bukti_transfer'] ?>" width="300px">

          </div>
        </div>


	</div>
	
	<div class="col-lg-6">
	
	     <form action="<?= base_url('admin/konfirmasi/edit_konfirmasi'); ?>" method="post">
 
               <input type='hidden' name='id' value='<?= $rows['id_konfirmasi_pembayaran'] ?>'>
		<input type='hidden' name='idpenjualan' value='<?= $rows['id_penjualan'] ?>'>
		
			<div class="form-group row">
        <label class="col-md-4 col-form-label">Status Konfirmasi</label>
        <div class="col-md-8">
		<select name="status" class="form-control">
		   <option value=""> -- Pilih Status --</option>
		   <option value="Valid" <?php if($rows['status_konfirmasi']=="Valid") { echo "selected=selected"; } ?>> Valid</option>
		   <option value="Tidak Valid" <?php if($rows['status_konfirmasi']=="Tidak Valid") { echo "selected=selected"; } ?>> Tidak Valid</option> 
		  </select>
        </div>
      </div>


                <div class="form-group row">
                  <label class="col-lg-4 col-form-label"></label>
                  <div class="col-lg-8">
                    <button type='submit' name='submit' class='btn btn-success btn-sm'>Simpan</button>
                     
                  </div>
                </div>
		</form>
		
              </div>
         </div>   

          </div>
        </div>
      </div>
 