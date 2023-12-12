<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="panel-body">
							
<form id="form_edit" method="POST" enctype="multipart/form-data" class="form-horizontal" >


							<!-- <form  id="form_add" method="POST" class="form-horizontal" > -->
								<fieldset class="content-group">
									<legend class="text-bold">Form Edit <?= $nama_menu;?></legend>

									<div class="form-group">
										<label class="control-label col-lg-2">Nama Vendor</label>
										<div class="col-lg-10">
											<input type="text" name="nama_vendor" value="<?= $data[0]->nama_vendor?>" placeholder="Masukan Nama Pengguna" class="form-control" required readonly>
											<input type="hidden" name="id" value="<?= $data[0]->id_vendor?>" placeholder="Masukan Nama Pengguna" class="form-control" required >
										
										</div>
									</div>

                                    <div class="form-group">
										<label class="control-label col-lg-2">Key App</label>
										<div class="col-lg-10">
											<input type="text" name="key_app" placeholder="Masukan username" value="<?= $data[0]->key_app?>"  class="form-control" required>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Nama Pimpinan</label>
										<div class="col-lg-10">
											<input type="text" name="nama_pimpinan" placeholder="Masukan username" value="<?= $data[0]->nama_pimpinan?>"  class="form-control" required>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Alamat vendor</label>
										<div class="col-lg-10">
											<input type="text" name="alamat_vendor" placeholder="Masukan username" value="<?= $data[0]->alamat_vendor?>"  class="form-control" required>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">No telp</label>
										<div class="col-lg-10">
											<input type="text" name="no_telp" placeholder="Masukan username" value="<?= $data[0]->no_telp?>"  class="form-control" required>
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-lg-2">Email</label>
										<div class="col-lg-10">
											<input type="text" name="email" placeholder="Masukan username" value="<?= $data[0]->email?>"  class="form-control" required>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Moto</label>
										<div class="col-lg-10">
											<input type="text" name="moto" placeholder="Masukan username" value="<?= $data[0]->moto?>"  class="form-control" required>
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-lg-2">Status Aplikasi</label>
										<div class="col-lg-10">
											<?php
											if($data[0]->status_aplikasi != 'online'){
?>
			<p class="navbar-text"><span class="label bg-danger-400">Offline</span></p>

<?php
											}else{
?>
			<p class="navbar-text"><span class="label bg-success-400">Online</span></p>

<?php
											}
											?>
											<!-- <input type="text" name="moto" placeholder="Masukan username" value="<?= $data[0]->status_aplikasi	?>"  class="form-control" required> -->
										</div>
									</div>
						
																									
								<div class="text-right">
                 <button type="submit"  id="submit_add" class="btn btn-primary btn-sm"> <i class="icon-check"></i> Simpan</button>

									<!-- <button type="submit"  id="submit_add" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button> -->
								</div>
							</form>

							<br><br><hr>	
							<div class="form-group">
										<label class="control-label col-lg-2">Backup Database</label>
										<div class="col-lg-10">
										<a onclick="backup_database();"  class="btn btn-success btn-sm"> <i class="icon-database"></i> Backup Database</a>

										</div>
									</div>


						</div>


                        <script>

var url = '<?= base_url()?>';
var app= 'seting';

$("#form_edit").submit(function(e) {
         e.preventDefault();
         $.ajax({
          url: url+"/"+app+"/p_edit",
             type: 'POST',
             data: $(this).serialize(),             
             success: function(data) {    
			
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Your work has been Edit",
                    showConfirmButton: false,
                    timer: 1500
                    });

					open_edit();
             }
         });
     });



	                        </script>