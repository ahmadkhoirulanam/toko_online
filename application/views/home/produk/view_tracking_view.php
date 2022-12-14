<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li>History_Transaksi</li>
				<li class='active'><?= $breadcrumb; ?></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->


<div class="terms-conditions-page">
			<div class="row">
				<div class="col-lg-12 terms-conditions">
	 
	
	
	
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
    <h3 class=""><?= $title; ?> - <?= $rows['kode_transaksi'] ?></h3>
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

  <table class="table table-borderless table-sm mt-3" id='tablemodul1'>
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



      <!-- Total berat 
        <tr>
          <td colspan='4'><b>Berat</b></td>
          <td><b> <?= //$total['total_berat']
                    '' ?> Gram</b></td>
        </tr>
        -->

    </tbody>
  </table><br>

  <p> Silahkan transfer ke salah satu pilihan rekening bank dibawah ini:</p>
  <table class="table table-borderless table-sm w-75 mx-auto" id='tablemodul1'>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Bank</th>
        <th>No Rekening</th>
        <th>Atas Nama</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $rekening = $this->model_app->view('rekening');
      foreach ($rekening->result_array() as $row) {
      ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $row['nama_bank']; ?></td>
          <td><?= $row['no_rekening']; ?></td>
          <td><?= $row['pemilik_rekening']; ?></td>
        </tr>
      <?php
        $no++;
      }
      ?>
    </tbody>
  </table>
  
</div>



</div>			
</div><!-- /.row -->
</div><!-- /.sigin-in-->

<br/><br/>