<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/plugins/forms/selects/select2.min.js"></script>

	<!-- <script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/core/app.js"></script> -->
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
									<!-- <th>Disc</th> -->
									<!-- <th>Tax/Pajak</th> -->
									<th>Harga</th>
									<th>Sub Harga</th>
									<th>User Input</th>
									<th>Tools</th>
									
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
                                <?php 
                                $no= 0;
								$sub_jumlah= 0;
                                foreach ($data as $k) { $no++;
								
								$sub_jumlah += $k->jumlah;
								?>

<tr>
									<td><?= $no;?></td>
									<td><?= $k->nama_data_barang;?></td>
									<td><?= $k->qty;?></td>
									<!-- <td><?= $k->disc;?> % </td> -->
									<!-- <td><?= $k->pajak;?> % </td> -->
									<td><?= rupiah($k->harga);?> </td>
									<td><?= rupiah($k->jumlah);?> </td>

									<td><?= $k->tgl_input;?> </td>
									<td> <span class="badge badge-info"><?= $k->nama_user;?></span> </td>

									<td>
									<ul class="icons-list">
												<!-- <li onclick="open_edit(<?= $k->id_faktur;?>)" class="text-primary-600"><a href="#"><i class="icon-pencil7"></i></a></li> -->
												<li onclick="hapus_item_data(<?= $k->id_item_surat_penawaran;?>)" class="text-danger-600"><a href="#"><i class="icon-trash"></i></a></li>
												<!-- <li class="text-teal-600"><a href="#"><i class="icon-cog7"></i></a></li> -->
												<!-- <li onclick="open_detail(<?= $k->id_faktur;?>)" class="text-success-600"><a href="#"><i class="icon-eye"></i></a></li> -->

											</ul>
									</td>
								</tr>



                              <?php
                                }
                                
                                ?>
			            	
							</tbody>
						</table>

						<table class="table">
							<tr>
								<td>Jumlah</td>
								<td><?= rupiah($sub_jumlah);?></td>
							</tr>
						</table>

                        </div>