<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="panel-body">
							
<form id="form_add" method="POST" enctype="multipart/form-data" class="form-horizontal" >


							<!-- <form  id="form_add" method="POST" class="form-horizontal" > -->
								<fieldset class="content-group">
									<legend class="text-bold">Form Add <?= $nama_menu;?></legend>

									<div class="form-group">
										<label class="control-label col-lg-2">Nama User</label>
										<div class="col-lg-10">
											<input type="text" name="nama_user" placeholder="Masukan Nama Pengguna" class="form-control" required>
										</div>
									</div>

                                    <div class="form-group">
										<label class="control-label col-lg-2">Username</label>
										<div class="col-lg-10">
											<input type="text" name="username" placeholder="Masukan username"  class="form-control" required>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Password</label>
										<div class="col-lg-10">
											<input type="password" name="password" placeholder="Masukan Password"  class="form-control" required>
										</div>
									</div>

									
			                        <div class="form-group">
			                        	<label class="control-label col-lg-2">Pilih Hak Akses</label>
			                        	<div class="col-lg-10">
				                            <select name="id_hak_akses"  class="form-control" required>
				                                <option value="">- Pilih Hak Akses-</option>
                                                <?php 
                                                foreach ($hak_akses as $k) {
                                               ?>
      <option value="<?= $k->id_hak_akses?>"><?= $k->nama_hak_akses?></option>
                                               <?php
                                                }
                                                ?>

                                                
				                          
				                              </select>
			                            </div>
			                        </div>

									
								<div class="text-right">
                 <button type="submit"  id="submit_add" class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Simpan</button>

									<!-- <button type="submit"  id="submit_add" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button> -->
								</div>
							</form>
						</div>


                        <script>

var url = '<?= base_url()?>';
var app= 'user';

$("#form_add").submit(function(e) {
         e.preventDefault();
         $.ajax({
          url: url+"/"+app+"/p_add",
             type: 'POST',
             data: $(this).serialize(),             
             success: function(data) {    
			
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Your work has been saved",
                    showConfirmButton: false,
                    timer: 1500
                    });

                    tabel_content();
             }
         });
     });


                        </script>