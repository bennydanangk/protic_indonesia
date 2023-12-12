<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/plugins/forms/selects/select2.min.js"></script>

	<!-- <script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/core/app.js"></script> -->
	<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/pages/datatables_basic.js"></script>


    <div class="container-fluid">



<table class="table datatable-pagination">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Pengguna</th>
									<th>Username</th>
									<th>Hak Akses</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
                                <?php 
                                $no= 0;
                                foreach ($data as $k) { $no++;?>

<tr>
									<td><?= $no;?></td>
									<td><?= $k->nama_user;?></td>
									<td> <?= $k->username?> </td>
									<td><span class="label label-info"> <?= $k->nama_hak_akses?> </span></td>
									<td class="text-center">
									<ul class="icons-list">
												<li onclick="open_edit(<?= $k->id_user;?>)" class="text-primary-600"><a href="#"><i class="icon-pencil7"></i></a></li>
												<li onclick="hapus_data(<?= $k->id_user;?>)" class="text-danger-600"><a href="#"><i class="icon-trash"></i></a></li>
												<!-- <li class="text-teal-600"><a href="#"><i class="icon-cog7"></i></a></li>
												<li class="text-success-600"><a href="#"><i class="icon-eye"></i></a></li> -->

											</ul>
									</td>
								</tr>



                              <?php
                                }
                                
                                ?>
			            	
							</tbody>
						</table>

                        </div>