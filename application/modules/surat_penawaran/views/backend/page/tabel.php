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
									<th>Nomor Surat</th>
									<th>Tgl Surat</th>
									<!-- <th>Tgl Input</th> -->
									<th>Flag</th> 
									<th>User Input</th>
									<th>Tools</th>
									
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
                                <?php 
                                $no= 0;
                                foreach ($data as $k) { $no++;?>

<tr>
									<td><?= $no;?></td>
									<td><?= $k->nomor_surat;?></td>
									<td><?= $k->tgl_surat;?></td>
									<!-- <td><?= $k->tgl_input;?> </td> -->
									<td>  <span class="badge badge-warning"> <?= $k->flag;?> <span> </td>
									<!-- <td><?= $k->tgl_input;?> </td> -->
									<td> <span class="badge badge-info"><?= $k->nama_user;?></span> </td>

									<td><button onclick="open_item(<?= $k->id_surat_penawaran?>)" type="button" class="btn btn-success">
  Item Pesanan
  
  <!-- <span class="badge badge-light">0</span> -->
</button></td>
									<td>
									<ul class="icons-list">
												<li onclick="open_edit(<?= $k->id_surat_penawaran;?>)" class="text-primary-600"><a href="#"><i class="icon-pencil7"></i></a></li>
												<li onclick="hapus_data(<?= $k->id_surat_penawaran;?>)" class="text-danger-600"><a href="#"><i class="icon-trash"></i></a></li>
												<!-- <li class="text-teal-600"><a href="#"><i class="icon-cog7"></i></a></li> -->
												<!-- <li onclick="open_detail(<?= $k->id_surat_penawaran;?>)" class="text-success-600"><a href="#"><i class="icon-eye"></i></a></li> -->

											</ul>
									</td>
								</tr>



                              <?php
                                }
                                
                                ?>
			            	
							</tbody>
						</table>

                        </div>