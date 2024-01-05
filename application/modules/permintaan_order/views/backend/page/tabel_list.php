	<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/pages/datatables_basic.js"></script>
    <div class="container-fluid">

<?php


function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}


?>

<table class="table datatable-pagination">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Barang</th>
									<th>QTY</th>
									<th>Harga beli</th>
									<th>Harga Jual</th>
									<th>Harga Order</th>
									<th>PPN</th>
									<th>Sub Harga</th>
									<th class="text-center">User Input</th>
								</tr>
							</thead>
							<tbody>
                                <?php 
                                $no= 0;
								$sub_jumlah= 0;

								$sub_jumlah_non_ppn = 0;
								$sub_jumlah_dasar = 0;

                                foreach ($data as $k) { $no++;
							
								$sub_jumlah += $k->jumlah;
								?>

<tr>
									<td><?= $no;?></td>
									<td><?= $k->nama_data_barang;?></td>
									<td><?= $qty =$k->qty;?></td>
									<td> <b><?= rupiah($harga_beli = $k->harga_beli);?> </b> </td>
									<td> <b><?= rupiah($harga_jual = $k->harga_jual);?> </b> </td>
									<td><?= rupiah($k->harga);?> </td>
									<td><?= rupiah($k->ppn_);?> </td>
									<td><?= rupiah($k->jumlah);?> </td>

								<?php 
								
								$sub_jumlah_non_ppn += $qty * $harga_jual;
								$sub_jumlah_dasar += $qty * $harga_beli;
								?>
									<td> <span class="badge badge-info"><?= $k->nama_user;?></span> </td>

									<!-- <td>
									<ul class="icons-list"> -->
												<!-- <li onclick="open_edit(<?= $k->id_faktur;?>)" class="text-primary-600"><a href="#"><i class="icon-pencil7"></i></a></li> -->
												<!-- <li onclick="hapus_item_data(<?= $k->id_item_surat_order;?>)" class="text-danger-600"><a href="#"><i class="icon-trash"></i></a></li> -->
												<!-- <li class="text-teal-600"><a href="#"><i class="icon-cog7"></i></a></li> -->
												<!-- <li onclick="open_detail(<?= $k->id_faktur;?>)" class="text-success-600"><a href="#"><i class="icon-eye"></i></a></li> -->
<!-- 
											</ul>
									</td> -->
								</tr>



                              <?php
                                }
                                
                                ?>
			            	
							</tbody>
						</table>

						<table class="table">
							<!-- <tr>
								<td>Jumlah Cost Dasar</td>
								<td><?= rupiah($sub_jumlah_dasar);?></td>
							</tr>


							<tr>
								<td>Jumlah Real Cost + Profit Non PPN</td>
								<td><?= rupiah($sub_jumlah_non_ppn);?></td>
							</tr> -->
							<tr>
								<td>Jumlah Order Sales</td>
								<td> <b> <?= rupiah($sub_jumlah);?></b></td>
							</tr>
						</table>

						<hr>
					
				

	


<a class="btn btn-block btn-success" onclick="aprove(<?= $id_surat_order; ?>)" > <span class="icon icon-checkmark4"></span> Kirim Order</a>
<br>
<a class="btn btn-block btn-danger" onclick="cancel(<?= $id_surat_order; ?>)" > <span class="icon icon-cancel-circle2"></span> Kembaikan Ke Verifikator</a>
                        </div>

<script>




</script>