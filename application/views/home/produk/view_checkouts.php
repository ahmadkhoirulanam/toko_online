<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="terms-conditions-page">
			<div class="row">
				<div class="col-lg-12 terms-conditions">
	<h2 class="heading-title">Checkout</h2>
	<div class="" style="margin-top:20px;">
	


<form action='' method='POST'>
    <div class="row">
        <?php
        $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-(b.diskon*a.jumlah)) as total, sum(b.berat*a.jumlah) as total_berat FROM `penjualantemp` a JOIN produk b ON a.id_produk=b.id_produk where a.session='" . $this->session->idp . "'")->row_array();
		
		 
        ?>
        <div class="col-md-4">
            <div class="card w-100 shadow mb-2 bg-white rounded">
                <div class="card-body">
                    <h4 class="float-left">Alamat Pengiriman <a class="float-right" href="<?php echo base_url('members/edit_alamat') ?>" title="Ubah Alamat"><i class="fa fa-pencil"></i></a></h4>
                    
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                Nama<br>
                                <input type="text" name='nama_pem' class="form-control" value="<?php echo $rows['nama_lengkap'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nomor telepon<br>
                                <input type="text" name='telp_pem' class="form-control" value="<?php echo $rows['no_telp'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Kota<br>


                                <select name="kota_pem" id='kota_pem' class='form-control select2'>
                                    <option value="Pilih kota"></option>
                                    <?php $qkota = $this->db->get('kota');
                                    foreach ($qkota->result_array() as $kota) {
                                        if ($kota['kota_id'] == $rows['kota_id']) {
                                    ?>
                                            <option value="<?php echo $kota['kota_id'] ?>" selected><?php echo $kota['nama_kota'] ?></option>

                                        <?php } else { ?>
                                            <option value="<?php echo $kota['kota_id'] ?>"><?php echo $kota['nama_kota'] ?></option>
                                    <?php }
                                    } ?>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Kecamatan<br>
                                <input type="text" name='kec_pem' class="form-control" value="<?php echo $rows['kecamatan'] ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Alamat Lengkap<br>
                                <textarea name='alamat_pem' class="form-control"><?php echo $rows['alamat'] ?></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Kode Pos<br>
                                <input type="text" name='pos_pem' class="form-control" value="<?php echo $rows['kode_pos'] ?>">
                            </td>
                        </tr>


                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card w-100 shadow mb-2 bg-white rounded">
                <div class="card-body">
                    <h4>Detail Belanja</h4>
                    <table class="table table-bordered" style="width: 100%">
					
						<tr>
						<th>Produk</th>
						<th>Warna</th>
						<th>Jumlah</th>
						<th>Sub Total</th> 
					</tr>	
					
					
                        <?php
                        $no = 1;
                        $total_diskon = 0;
                        foreach ($record->result_array() as $row) {
                            $sub_total = (($row['harga_jual'] - $row['diskon']) * $row['jumlah']);
                             
                            $diskon_total = $diskon_total + $row['diskon'] * $row['jumlah'];
                        ?>

                            <tr>
                                
                                <td>
                                    <a href="<?php echo base_url('produk/detail/') . $row['produk_seo']; ?>"> <?php echo $row['nama_produk']; ?> <br/> 
									 </a>
                                    
                                    
                                </td>
								<td align="center"><?php echo $row['warna']; ?></td>
								<td align="center"><?php echo $row['jumlah']; ?></td>
                                <td align="center">
                                    Rp  <?php echo rupiah($sub_total) ?> 
                                </td>
                                
                            </tr>
                        <?php } ?>
                    </table>

                    <input type="hidden" name="total" id="total" value="<?php echo $total['total']; ?>" />
                    <input type="hidden" name="ongkir" id="ongkir" value="0" />
                    <input type="hidden" name="berat" value="<?php echo $total['total_berat']; ?>" />
                    <input type="hidden" name="diskonnilai" id="diskonnilai" value="<?php echo $diskon_total; ?>" />

                    <div class="">
                        <div class="col-3">
                            <h4>Kurir :</h4>
                        </div>
                        <div class="col-9">
                            <select name="kurir" id="" class="kurir form-control w-100">
                                <option value="" selected class="text-center">Pilih metode pengiriman</option>
                                <option value="cod" id="cod" onclick="show2();">Datang ke Toko</option>
                                <?php
                                $kurir = array('jne', 'pos', 'tiki');
                                foreach ($kurir as $rkurir) {
                                ?>
                                    <option value="<?php echo $rkurir; ?>"> <?php echo strtoupper($rkurir); ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class=" mt-2" id="kuririnfo" style="display: none; margin:20px 10px;">
                        <div class="col-3"></div>
                        <div class="col-9 pt-2" id="kurirserviceinfo">

                        </div>
                    </div>

                </div>
            </div>
        </div>



        <div class="col-md-3">
            <div class="card w-100 shadow mb-2 bg-white rounded">
                <div class="card-body">
                    <h4>Ringkasan Belanja</h4>
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                Total Harga<br>
                                <strong>Rp <?php echo rupiah($total['total']) ?></strong>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Biaya Kirim<br>
                                <strong id="kirim"></strong>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Total Bayar<br>
                                <strong id="totalbayar"></strong>
                            </td>
                        </tr>

                        <tr>
                            <td>
							<br/>
                                <button type='submit' name='submit' id='oksimpan' class='btn btn-success btn-block' style='display:none'>
                                    Kirim Data Pembelian
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</form>



	</div>
</div>			
</div><!-- /.row -->
</div><!-- /.sigin-in-->

<br/><br/>



<script>
    $(document).ready(function() {

        $(".kurir").each(function(o_index, o_val) {
            $(this).on("change", function() {
                checkouts();
            });
        });

        $("#kota_pem").each(function(o_index, o_val) {
            $(this).on("change", function() {
                change_city();
            });
        });

        $("#diskon").html(toDuit(0));
        hitung();

    });

    function checkouts() {
        var kurir = $('.kurir').val();
        var berat = "<?php echo $total['total_berat']; ?>";
        var kota = document.getElementById("kota_pem").value;
        $.ajax({
                method: "get",
                dataType: "html",
                url: site_url + 'produk/kurirdata',
                data: "kurir=" + kurir + "&berat=" + berat + "&kota=" + kota,
                beforeSend: function() {
                    $("#oksimpan").hide();
                }
            })
            .done(function(x) {
                $("#kurirserviceinfo").html(x);
                $("#kuririnfo").show();

            })
            .fail(function() {
                $("#kurirserviceinfo").html("");
                $("#kuririnfo").hide();
            });
    }

    function change_city() {
        var kurir = $('.kurir').val();
        var berat = "<?php echo $total['total_berat']; ?>";
        var kota = document.getElementById("kota_pem").value;
		
		 
        $.ajax({
                method: "get",
                dataType: "html",
                url: site_url + 'produk/kurirdata',
                data: "kurir=" + kurir + "&berat=" + berat + "&kota=" + kota,
                beforeSend: function() {
                    $("#oksimpan").hide();
                }
            })
            .done(function(x) {
                $("#kurirserviceinfo").html(x);

            })
            .fail(function() {
                $("#kurirserviceinfo").html("");
            });
    }

    function show2() {
        $("#oksimpan").show();
    }

    function hitung() {
        var diskon = $('#diskonnilai').val();
        var total = $('#total').val();
        var ongkir = $("#ongkir").val();
        var bayar = (parseFloat(total) + parseFloat(ongkir));
        var ongkir2 = parseFloat(ongkir);
        $("#kirim").html(toDuit(ongkir2));
        $("#totalbayar").html(toDuit(bayar));
    }
</script>