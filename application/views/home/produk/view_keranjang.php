<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Keranjang Belanja</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="terms-conditions-page">
			<div class="row">
				<div class="col-lg-12 terms-conditions">
	<h2 class="heading-title">Keranjang Belanja</h2>
	<div class="" style="margin-top:20px;">
	
	
	<?php
if ($record->num_rows() == '0') { ?>
  <div class='text-center mt-3 mb-5'>
    <h3>Maaf, Keranjang belanja anda saat ini masih kosong</h3><br>
    <a class='btn btn-black' href='<?= base_url('produk') ?>'>Klik disini Untuk mulai belanja.</a>
  </div>
<?php } else {
?>


   
    <div class="col-lg-8">
      <div class="card w-100">
        <div class="card-body">
          <table class="table table-bordered">

			<tr>
                <th>Produk</th>
				<th>Warna</th>
				<th>Jumlah</th>
				<th>Sub Total</th>
				<th>Aksi</th>
			</tr>	
				
            <?php
            $i = 1;
            $qty_product = $record->num_rows();
            foreach ($record->result_array() as $row) {
              $sub_total = (($row['harga_jual'] - $row['diskon']) * $row['jumlah']);
              
              if (trim($row['gambar']) == '') {
                $foto_produk = 'no-image.png';
              } else {
                $foto_produk = $row['gambar'];
              } ?>

              <tr>
                <td align="center">
                  <img src="<?= base_url('assets/images/produk/') . $foto_produk; ?>" alt="" style="height:100px;"> <br/>
				  <a href="<?= base_url('produk/detail/') . $row['produk_seo']; ?>" target="_blank"><?= $row['nama_produk'] ?></a>
                </td>
				<td>
				
				
				<form action="<?= base_url('keranjang/update3/') . encrypt_url($row['id_penjualan_detail']); ?> ?>." method="POST">
				
				<select id="warna_<?= $i ?>" name="warna" class="form-control" style="width:100%">
				<?php
				
				$varians  = $this->db->query("SELECT* FROM produkvarian WHERE id_produk='".$row['id_produk']."' and stok_produkvarian<>0")->result_array();
				
				 
				foreach($varians as $varian) {
					if($varian[warna_produkvarian]==$row['warna']) { $ok="selected=selected"; } else { $ok=""; }
					echo "<option value='$varian[warna_produkvarian]' $ok>$varian[warna_produkvarian]</option>";
				}
				?>
				</select> 
				
				<span id="save3_<?= $i ?>" style="display: none"></span>
                </form>
				
				</td>
				
                <td align="center">
				
				
					<?php
					
					$querystok = $this->db->get_where('produkvarian', array('id_produk' => $row['id_produk'], 'warna_produkvarian' => $row['warna']));
					foreach ($querystok->result() as $rowx) {
						$stok = $rowx->stok_produkvarian;
					}
		
					?>
                     
					<form action="<?= base_url('keranjang/update2/') . encrypt_url($row['id_penjualan_detail']); ?> ?>." method="POST">
				
				  
                    <input name="id_penjualan_detail" type="hidden" value="<?= $row['id_penjualan_detail']; ?>">
					
					
                    <input type="hidden" id="stock_<?= $i ?>" value="<?= $stok ?>">
					
                    <div class="input-number mt-1" style="width: 100px">
                      <input name="jumlah" style="height:30px;" class="form-control input-number__input" type="number" min="1" value="<?= $row['jumlah'] ?>" id="quantity_<?= $i ?>">
                      <a href="javascript:void(0)" class="input-number__add" id="plus_<?= $i ?>"></a>

                      <?php
                      if ($row['jumlah'] == 1) {
                        $display = 'none';
                      } else {
                        $display = 'block';
                      }
                      echo "<span style='display: " . $display . "'>";
                      ?>
                      <a href="javascript:void(0)" class="input-number__sub" id="minus_<?= $i ?>"></a>
                      <?php echo "</span>"; ?>


                    </div>
                    <span id="save_<?= $i ?>" style="display: none"></span>
                  </form>

                </td>

                <td align="center">
 
                   Rp  <?= rupiah($sub_total) ?>
                      
                </td>
				
				<td>

                   <a href="<?= base_url() . "keranjang/delete/" . encrypt_url($row['id_penjualan_detail']);  ?>">
                      <button type="button" class="dropcart__product-remove btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </a>
                   
                </td>



              </tr>

            <?php $i++;
            } ?>


          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card w-100">
        <div class="card-body">

          <table class="table" style="margin-bottom: 10px;">
             
              <tr>
                <?php
                $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-(b.diskon*a.jumlah)) as total, sum(b.berat*a.jumlah) as total_berat FROM `penjualantemp` a JOIN produk b ON a.id_produk=b.id_produk where a.session='" . $this->session->idp . "'")->row_array();
                ?>
                <td>Total</td>
                <td>Rp <?= rupiah($total['total']); ?></td>
              </tr>
             
          </table>
		  * Belum termasuk ongkos kirim 
		  <br/><br/>
		  <a class="btn btn-lg btn-success  btn-block cart__checkout-button" href="<?= base_url('keranjang/checkouts') ?>">Proses checkout</a>
        </div>
      </div>
    </div>

<div class="clearfix"></div>
<br/><br/>
 

<?php } ?>

	</div>
</div>			
</div><!-- /.row -->
</div><!-- /.sigin-in-->

<br/><br/>



<input type="hidden" id="qty_product" value="<?= $qty_product ?>">
<script src="<?= base_url('assets/template/js/cart.js') ?>"></script>