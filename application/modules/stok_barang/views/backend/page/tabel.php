<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/core/libraries/jquery.min.js"></script>


<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/plugins/forms/selects/select2.min.js"></script>

	<!-- <script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/core/app.js"></script> -->
	<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/pages/datatables_basic.js"></script>


    <div class="container-fluid">


<table class="table datatable-pagination">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Barang</th>
									<th>Nama Barang</th>
									<th>Jumlah</th>
									
									<!-- <th class="text-center">Actions</th> -->
								</tr>
							</thead>
							<tbody>
                                <?php 
                                $no= 0;
                                foreach ($data as $k) { $no++;?>

<tr>
									<td><?= $no;?></td>
									<td><?= $k->kode_barang;?></td>
									<td><?= $k->nama_data_barang;?></td>
									<td>
							<script>
								stok(<?=$k->id_barang;?>);
			
							</script>
									
									<span  id="stok_<?=$k->id_barang;?>"><?= $k->id_barang;?></span> </td>
									
								</tr>




                              <?php
                                }
                                
                                ?>
			            	
							</tbody>
						</table>

                        </div>

						<script>
			

function stok(id) {
 
  $.ajax({
          url: url+"/"+app+"/stok",
             type: 'POST',
             data: {id:id} ,             
             success: function(data) {    
			
               console.log(data);
             }
         });

}


						</script>