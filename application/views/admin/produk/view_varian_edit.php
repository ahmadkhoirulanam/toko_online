 
                    <form method="post" action="<?php echo base_url('admin/produk/edit_varian') ?>" class="form-horizontal" novalidate>
					
					<input type="hidden" name="idproduk" value="<?= $idproduk ?>">
					<input type="hidden" name="idprodukvarian" value="<?= $varian['id_produkvarian']?>">
					
					
                        <div class="form-body">
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Warna</label>
                                        <div class="col-md-8 controls">
                                            <input type="text" name="warna" class="form-control" value="<?= $varian['warna_produkvarian']?>" required >
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
 
							
							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Stok</label>
                                        <div class="col-md-8 controls">
                                            <input type="number" name="stok" class="form-control" required value="<?= $varian['stok_produkvarian']?>" >
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

							
							  

 
                             
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="col-md-5 controls">
                                            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                        
                    </form>
       
	<script>
	 
		$('#modal_ajax .judul').html('EDIT VARIAN'); 
	  
	</script>	