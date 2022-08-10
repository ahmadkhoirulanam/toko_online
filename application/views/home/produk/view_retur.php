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
    <h2 style="margin-top:0px;">Retur Produk</h2><br/> 
	
	
	<?php
if ($total['proses'] == '0') {
  $proses = 'Pending';
} elseif ($total['proses'] == '1') {
  $proses = 'konfirmasi';
} elseif ($total['proses'] == '2') {
  $proses = 'Proses';
} elseif ($total['proses'] == '3') {
  $proses = 'Dikirim';
}
?>
<div class="wrapper w-100 mx-auto">
  <div class="font-weight-bold mt-2 mb-4">
    <h3 class="">Kode Pesanan - <?= $rows['kode_transaksi'] ?></h3>
  </div>
  <!-- Row -->
  <div class="row">
    <div class='col-lg-8 col-md-6'>
      <table class="table table-borderless table-sm">
        <tr>
          <td width="140px;">Nama</td>
          <td class="text-left"><?= $rows['nama_lengkap']; ?></td>
        </tr>
        <tr>
          <td>No. Telpon</td>
          <td><?= $rows['no_telp']; ?></td>
        </tr>

        <tr>
          <td valign="top">Alamat</td>
          <td>
            <?= $rows['alamat'] ?><br>
            Kecamatan <?= $rows['kecamatan']; ?> <br>
            <?= $rows['nama_kota']; ?>, <?= $rows['kode_pos']; ?>
          </td>
        </tr>
      </table>
    </div>

    <div class='col-lg-4 col-md-6'>
      <table class="table table-borderless table-sm">
        <tr>
          <td width="140px;">Total Bayar</td>
          <td class="text-left">Rp <?= rupiah($total['total'] + $total['ongkir']); ?></td>
        </tr>
        <tr>
          <td>Pengiriman</td>
          <td>
        <span style='text-transform:uppercase'>
          <?php if ($total['kurir'] == 'COD') { ?>
            <?= $total['service']; ?>
          <?php } else { ?>
            <?= $total['kurir'] ?> <?= $total['service']; ?>
          <?php } ?>
        </span>
          </td>
        </tr>

        <tr>
          <td>Status</td>
          <td><?= $proses ?></td>
        </tr>

        <?php if ($total['proses'] == '3') { ?>

          <tr>
            <td>No. Resi</td>
            <td><?= $total['resi']; ?></td>
          </tr>

        <?php } ?>

      </table>
    </div>


  </div>

  <table class="table table-bordered table-sm mt-3" id='tablemodul1'>
    <thead>
      <tr class="border border-dark">
        <th width='47%'>Nama Produk</th>
        <th>Warna</th>
		<th>Harga</th>
        <th>Qty</th>
        <th>Berat</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>

      <?php

      $no = 1;
      $diskon_total = 0;
      foreach ($record->result_array() as $row) {
        $sub_total = (($row['harga_jual'] - $row['diskon']) * $row['jumlah']);
        if ($row['diskon'] != '0') {
          $diskon = "<del style='color:red'>" . rupiah($row['harga_jual']) . "</del>";
        } else {
          $diskon = "";
        }
        if (trim($row['gambar']) == '') {
          $foto_produk = 'no-image.png';
        } else {
          $foto_produk = $row['gambar'];
        }
        $diskon_total = $diskon_total + $row['diskon'] * $row['jumlah'];
      ?>
        <tr>
          <td><?= $row['nama_produk'] ?></td>
          <td><?= $row['warna'] ?></td>
		  <td><?= rupiah($row['harga_jual'] - $row['diskon']) ?> &nbsp; <?= $diskon ?></td>
          <td><?= $row['jumlah'] ?></td>
          <td><?= ($row['berat_satuan'] * $row['jumlah']) ?> gram</td>
          <td>Rp<?= rupiah($sub_total) ?></td>
        </tr>
      <?php
        $no++;
      }
      ?>

      <tr>
        <td colspan='5'><b>Subtotal </b></td>
        <td><b>Rp <?= rupiah($total['total']) ?></b></td>
      </tr>

      <tr>
        <td colspan='5'><b>Ongkir </b></td>
        <td><b>Rp <?= rupiah($total['ongkir']) ?></b></td>
      </tr>

      <tr>
        <td colspan='5'><b>Total Bayar</b></td>
        <td class="border border-dark"><b>Rp <?= rupiah($total['total'] + $total['ongkir']); ?></b>
        </td>
      </tr>


 

    </tbody>
  </table><br>
  
    <div class="font-weight-bold mt-2 mb-4">
    <h3 class="">Permintaan Retur</h3>
  </div>
	
	

 
    <form action="<?= base_url('retur') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

      <input type='hidden' name='a' value='<?= $rows['kode_transaksi'] ?>'>
	  <input type='hidden' name='id' value='<?= $rows['id_penjualan'] ?>'>

     
<p>
Retur produk hanya akan dipertimbangkan dan disetujui jika disertakan video unboxing paket. <br/>
	Ongkos kirim akan menjadi tanggungan kedua belah pihak. <br/>
	Silakan lengkapi dan kirim data melalui form ini,  dan selanjutnya silakan kontak administrator toko online kami <br/>
	melalui aplikasi whatsapp (WA). <br/>
</p>
  <table class="table table-bordered table-sm mt-3" id='tablemodul1'>
    <thead>
      <tr class="border border-dark">
        <th width='47%'>Nama Produk Retur</th> 
         <th>Warna</th>
		 <th>Jumlah Retur</th>
        <th>Alasan Retur</th> 
      </tr>
    </thead>
    <tbody>

      <?php

      $no = 1;
      $diskon_total = 0;
      foreach ($record->result_array() as $row) {
        
      ?>
        <tr>
          <td><?= $row['nama_produk'] ?></td> 
	   <td><?= $row['warna'] ?></td> 
          <td width="100px"><input type="hidden"  name="idproduk[]" value="<?= $row['id_produk']?>">
		  <input type="number" min=0 max="<?= $row['jumlah'] ?>" name="jumlah[]" class="form-control" value=0 step=1 ></td>
        
          <td><textarea name="alasan[]" class="form-control"></textarea></td>
        </tr>
      <?php
        $no++;
      }
      ?>
 
    </tbody>
  </table><br>  
	  

      

	
        <div class="form-group row">
          <label class="col-md-2 col-form-label">Video Unboxing</label>
          <div class="col-md-5">

            <div class="custom-file">
              <input style='text-transform:lowercase;' type="file"   name="userfile" required>
              
            </div>
            

          </div>
        </div>


   

      <div class="form-group row">
        <label class="col-md-2 col-form-label"></label>
        <div class="col-md-5">
          <button type='submit' name='submit' class='btn btn-black btn-sm float-right'>Kirimkan</button>
        </div>
      </div>


    </form>
 
 
  <br/><br/>
 
  </div>	
 </div>			
</div><!-- /.row -->
</div><!-- /.sigin-in-->

<br/><br/>


