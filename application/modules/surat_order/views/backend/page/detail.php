
					<!-- Tabs with top line -->
					<?php 
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
					?>

					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-heading">
								<h6 class="content-group text-semibold">
						Detail Barang
						<small class="display-block">Detail Inputan Data Barang </small>
					</h6>
								
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>

								<div class="panel-body">
									<div class="tabbable">
										<ul class="nav nav-tabs nav-tabs-top">
											<li class="active"><a href="#top-tab1" data-toggle="tab">Barang</a></li>
											<li><a href="#top-tab2" data-toggle="tab">Detail</a></li>
										
										</ul>

										<div class="tab-content">
											<div class="tab-pane active" id="top-tab1">
											<table class="table">
  <thead>
    <tr>
    
      <th scope="col">Nama Item</th>
      <th scope="col">Detail</th>
   
    </tr>
  </thead>
  <tbody>
    
  <tr>
      <td>Kode Barang</td>
      <td><?= $data[0]->kode_barang?></td>
       </tr>

	   <tr>
      <td>Nama Barang</td>
      <td><?= $data[0]->nama_data_barang?></td>
       </tr>

	   <tr>
      <td>Nama Jenis</td>
      <td><?= $data[0]->nama_jenis?></td>
       </tr>

	   <tr>
      <td>Nama Satuan</td>
      <td><?= $data[0]->nama_satuan?></td>
       </tr>

	   <tr>
      <td>Nama Kategori</td>
      <td><?= $data[0]->nama_kategori?></td>
       </tr>

	   <tr>
      <td>Keuntungan Minimum</td>
      <td><?= $data[0]->keuntungan_minimum?> %</td>
       </tr>

	   <tr>
      <td>Diskon  Maksimum</td>
      <td><?= $data[0]->diskon_maksimum?> %</td>
       </tr>

	   <tr>
      <td>Harga Beli</td>
      <td><?= rupiah($data[0]->harga_beli);?> </td>
       </tr>

	   <tr>
      <td>Harga Jual</td>
      <td><?= rupiah($data[0]->harga_jual);?> </td>
       </tr>
    
  </tbody>
</table>
											</div>

											<div class="tab-pane" id="top-tab2">
											<span class="badge badge-success"><?= $data[0]->tgl_input;?></span>
<span class="badge badge-danger"><?= $data[0]->nama_user;?></span>
											</div>

							
										</div>
									</div>
								</div>
							</div>

						
						</div>

					</div>
					<!-- /tabs with top line -->