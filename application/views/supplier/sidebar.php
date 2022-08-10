 
                         
                        <!-- /input-group -->
                    </li>
                     
                    <li><a href="<?= base_url('supplier/home') ?>" class="waves-effect"><i class="icon icon-speedometer" <i data-icon=")"></i> <span class="hide-menu"> &nbsp;Dashboard  </span></a> 
                    </li>
			
			
			<li><a href="<?= base_url('supplier/profil') ?>" class="waves-effect"><i class="icon icon-home" <i data-icon=")"></i> <span class="hide-menu"> &nbsp;Profil Perusahaan  </span></a> 
                    </li>
				

				
		   <li><a href="<?= base_url('supplier/produk') ?>" class="waves-effect"><i class="icon icon-screen-tablet" <i data-icon=")"></i> <span class="hide-menu"> &nbsp;Produk Supplier  </span></a> 
                    </li>
					
<?php 
 
$xxx = explode(" ",$iden['nama_website']);
?>	

			 <li><a href="<?= base_url('supplier/stok') ?>" class="waves-effect"><i class="icon icon-list" <i data-icon=")"></i> <span class="hide-menu"> &nbsp;Stok <?= $xxx[0] ?>    </span></a> 
                    </li>	 
                  	
					
					
					
                </ul>