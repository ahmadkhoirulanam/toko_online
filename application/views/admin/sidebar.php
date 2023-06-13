 
                         
                        <!-- /input-group -->
                    </li>
                     
                    <li><a href="<?= base_url('admin/home') ?>" class="waves-effect"><i class="icon icon-speedometer" <i data-icon=")"></i> <span class="hide-menu"> Dashboard  </span></a> 
                    </li>
					
			 <li><a href="<?= base_url('admin/produk') ?>" class="waves-effect"><i class="icon icon-screen-tablet" <i data-icon=")"></i> <span class="hide-menu"> Produk  </span></a> 
                    </li>
					
			 <li><a href="<?= base_url('admin/pesanan') ?>" class="waves-effect"><i class="icon icon-handbag" <i data-icon=")"></i> <span class="hide-menu"> Pesanan  </span></a> 
                    </li>
					
			 <li><a href="<?= base_url('admin/konfirmasi') ?>" class="waves-effect"><i class="icon icon-credit-card" <i data-icon=")"></i> <span class="hide-menu"> Konfirmasi  </span></a> 
                    </li>
                   
				   
			 <li><a href="<?= base_url('admin/retur') ?>" class="waves-effect"><i class="icon icon-star" <i data-icon=")"></i> <span class="hide-menu"> Retur   </span></a> 
                    </li>
                   
					<li><a href="<?= base_url('admin/supplier') ?>" class="waves-effect"><i class="icon icon-list" <i data-icon=")"></i> <span class="hide-menu"> Supplyer   </span></a> 
                    </li> 
			<!-- <li><a href="#" class="waves-effect <?php if($this->uri->Segment(2)=="website" 
			or $this->uri->Segment(2)=="pembelian"
			or $this->uri->Segment(2)=="supplier"  ) { echo "active"; } ?>" ><i data-icon=")" class="icon icon-heart"></i> <span class="hide-menu">Pembelian <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
				   <li><a href="<?= base_url('admin/pembelian') ?>">Pembelian </a></li> 
				   <li><a href="<?= base_url('admin/supplier') ?>">Supplier</a></li>
                          
				  
                        </ul>
                    </li>
					 -->
					
			 
					
		 
					
			<li><a href="#" class="waves-effect <?php if($this->uri->Segment(2)=="website" 
			or $this->uri->Segment(2)=="pengguna"
			or $this->uri->Segment(2)=="slider" 
			or $this->uri->Segment(2)=="halaman" 
			or $this->uri->Segment(2)=="kategori_produk" 
			or $this->uri->Segment(2)=="rekening") { echo "active"; } ?>" ><i data-icon=")" class="icon icon-equalizer"></i> <span class="hide-menu">Pengaturan <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
				   <li><a href="<?= base_url('admin/pengguna') ?>">Admin</a></li> 
				   <li><a href="<?= base_url('admin/website') ?>">Identitas Web</a></li>
                          
				 <li><a href="<?= base_url('admin/slider') ?>">Slider</a></li>
				 <li><a href="<?= base_url('admin/halaman') ?>">Halaman</a></li> 
				 <li><a href="<?= base_url('admin/rekening') ?>">Rekening</a></li>
                            <li><a href="<?= base_url('admin/kategori_produk') ?>">Kategori Produk</a></li>
                        </ul>
                    </li>
					
                    
 
					
			<li><a href="#" class="waves-effect <?php if(
									$this->uri->Segment(2)=="laporan"
									or $this->uri->Segment(2)=="stok") { echo "active"; } 
				?>"><i data-icon=")" class="fa fa-book"></i> <span class="hide-menu">Laporan <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                           
				<!-- <li><a href="<?= base_url('admin/laporan') ?>">Lap. Penjualan</a></li> -->
				<li><a href="<?= base_url('admin/stok') ?>">Lap. Stok</a></li> 
                            
                        </ul>
                    </li>
					
					
					
					
                </ul>