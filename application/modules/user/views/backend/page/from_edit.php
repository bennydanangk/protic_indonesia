<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="panel-body">
							
<form id="form_edit" method="POST" enctype="multipart/form-data" class="form-horizontal" >


							<!-- <form  id="form_add" method="POST" class="form-horizontal" > -->
								<fieldset class="content-group">
									<legend class="text-bold">Form Edit <?= $nama_menu;?></legend>

									<div class="form-group">
										<label class="control-label col-lg-2">Nama User</label>
										<div class="col-lg-10">
											<input type="text" name="nama_user" value="<?= $data[0]->nama_user?>" placeholder="Masukan Nama Pengguna" class="form-control" required>
											<input type="hidden" name="id" value="<?= $data[0]->id_user?>" placeholder="Masukan Nama Pengguna" class="form-control" required >
										
										</div>
									</div>

                                    <div class="form-group">
										<label class="control-label col-lg-2">Username</label>
										<div class="col-lg-10">
											<input type="text" name="username" placeholder="Masukan username" value="<?= $data[0]->username?>"  class="form-control" required>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Password</label>
										<div class="col-lg-10">
											<input type="password" id="password" name="password" placeholder="Masukan Password" value="<?= $data[0]->password?>"  class="form-control" required>
											<br><a onclick="cek_pass();" href="#" class="btn btn-secondary"> <span class="icon-eye"></span> Lihat Password</a>
											<b id="show_password"></b>
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
                 <button type="submit"  id="submit_add" class="btn btn-primary btn-sm"> <i class="icon-check"></i> Simpan</button>

									<!-- <button type="submit"  id="submit_add" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button> -->
								</div>
							</form>
						</div>


                        <script>

var url = '<?= base_url()?>';
var app= 'user';

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

                    tabel_content();
             }
         });
     });



	 function cek_pass() {
		enc =  $('#password').val();

		$.ajax({
          url: url+"/"+app+"/cek_pass",
             type: 'POST',
             data: {enc:enc} ,             
             success: function(data) {    
			
                $('#show_password').html(data);
             }
         });
		
	 }
                        </script>