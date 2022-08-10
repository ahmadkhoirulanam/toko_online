<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Rekening</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="terms-conditions-page">
			<div class="row">
				<div class="col-lg-12 terms-conditions">
	<h2 class="heading-title">Rekening Kami</h2>
	<div class="">
	<style>
	    th {
            text-align: center !important;
        }
	    
	</style>
	    <table class="table table-condensed table-striped">
	        
	        <tr style="text-align:center !important;">
	            <th align='center'>Nama Bank</th>
	            <th align='center'>No. Rekening</th>
	            <th align='center'>Atas Nama</th> 
	        </tr>
	   
	
		  <?php
		  foreach($record as $r) {
		      echo "<tr>
		        <td align='center'>".$r->nama_bank."</td>
		        <td align='center'>".$r->no_rekening."</td>
		        <td align='center'>".$r->pemilik_rekening."</td>
		      </tr>";
		  }
		  
		  ?>
		  
		   </table>
		  
	</div>
</div>			
</div><!-- /.row -->
</div><!-- /.sigin-in-->

<br/><br/>