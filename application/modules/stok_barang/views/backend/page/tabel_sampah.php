<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/plugins/forms/selects/select2.min.js"></script>

	<!-- <script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/core/app.js"></script> -->
	<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/pages/datatables_basic.js"></script>


    <div class="container-fluid">



<table class="table datatable-pagination">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama stok_barang</th>
									
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
                                <?php 
                                $no= 0;
                                foreach ($data as $k) { $no++;?>

<tr>
									<td><?= $no;?></td>
									<td><?= $k->nama_stok_barang;?></td>
								
									<td class="text-center">
									<ul class="icons-list">
												<li onclick="restore_data(<?= $k->id_stok_barang;?>)" class="text-primary-600"><a href="#"><i class="icon-eye"></i> Restore </a></li>
												<li onclick="permanent_hapus_data(<?= $k->id_stok_barang;?>)" class="text-danger-600"><a href="#"><i class="icon-trash"></i> Permanen</a></li>
											</ul>
									</td>
								</tr>



                              <?php
                                }
                                
                                ?>
			            	
							</tbody>
						</table>

                        </div>