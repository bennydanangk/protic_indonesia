	<!-- Theme JS files -->
	<!-- <script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/core/libraries/jquery_ui/interactions.min.js"></script> -->
	<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<!-- <script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/core/app.js"></script> -->
	<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/pages/form_select2.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="panel-body">
							
<form id="form_edit" method="POST" enctype="multipart/form-data" class="form-horizontal" >


							<!-- <form  id="form_add" method="POST" class="form-horizontal" > -->
								<fieldset class="content-group">
									<legend class="text-bold">Form Edit <?= $nama_menu;?></legend>

                                    <div class="form-group">
										<label class="control-label col-lg-2">Kode Barang</label>
										<div class="col-lg-10">
                                        <input type="text" name="kode_barang"  value="<?= $data[0]->kode_barang;?>" placeholder="Masukan Nama data_barang" class="form-control" readonly>
											<!-- <input type="text" name="id" value="<?= $data[0]->id_barang;?>" placeholder="Masukan Nama data_barang" class="form-control" required> -->
										
                                        </div>
									</div>


									
									<div class="form-group">
										<label class="control-label col-lg-2">Nama Data barang</label>
										<div class="col-lg-10">
                                        <input type="text" name="nama_data_barang"  value="<?= $data[0]->nama_data_barang;?>" placeholder="Masukan Nama data_barang" class="form-control" required>
											<input type="hidden" name="id" value="<?= $data[0]->id_barang;?>" placeholder="Masukan Nama data_barang" class="form-control" required>
										
                                        </div>
									</div>

                                    <div class="form-group">
										<label class="control-label col-lg-2">Jenis</label>
										<div class="col-lg-10">
                                        <div class="form-group">
										<select class="select-search" name="id_jenis" required>
											        <option  value="<?= $data[0]->id_jenis;?>">= <?= $data[0]->nama_jenis;?> =</option>
                                                <?php 
                                                foreach ($jenis as $k) {?>
	                                                <option value="<?= $k->id_jenis?>"><?= $k->nama_jenis?></option>
                                                <?php   }     ?>
		
										</select>
									</div>
										</div>

                                        </div>

                                        <div class="form-group">
										<label class="control-label col-lg-2">Satuan</label>
										<div class="col-lg-10">
                                        <div class="form-group">
										<select class="select-search" name="id_satuan" required>
											        <option  value="<?= $data[0]->id_satuan;?>">= <?= $data[0]->nama_satuan;?> =</option>

											        <!-- <option value="">= Pilih Salah Satu =</option> -->
                                                <?php 
                                                foreach ($satuan as $k) {?>
	                                                <option value="<?= $k->id_satuan?>"><?= $k->nama_satuan?></option>
                                                <?php   }     ?>
		
										</select>
									</div>
										</div>
                                                </div>

                                        <div class="form-group">
										<label class="control-label col-lg-2">Kategori</label>
										<div class="col-lg-10">
                                        <div class="form-group">
										<select class="select-search" name="id_kategori" required>
											        <!-- <option value="">= Pilih Salah Satu =</option> -->
											        <option  value="<?= $data[0]->id_kategori;?>">= <?= $data[0]->nama_kategori;?> =</option>

                                                <?php 
                                                foreach ($kategori as $k) {?>
	                                                <option value="<?= $k->id_kategori?>"><?= $k->nama_kategori?></option>
                                                <?php   }     ?>
		
										</select>
									</div>
										</div>





									</div>


                                    <div class="form-group">
										<label class="control-label col-lg-2">Keuntungan Minimum</label>
										<div class="col-lg-10">
											<input type="number"  value="<?= $data[0]->keuntungan_minimum;?>" name="keuntungan_minimum" placeholder="Masukan Keuntungan Minimum (%)" class="form-control" required>
										</div>
									</div>


                                    <div class="form-group">
										<label class="control-label col-lg-2">Diskon Maksimum </label>
										<div class="col-lg-10">
											<input type="number"  value="<?= $data[0]->diskon_maksimum;?>" name="diskon_maksimum" placeholder="Masukan Diskon Maksimum (%)" class="form-control" required>
										</div>
									</div>


                                    <div class="form-group">
										<label class="control-label col-lg-2">Harga Beli </label>
										<div class="col-lg-10">
											<input type="number"  value="<?= $data[0]->harga_beli;?>" name="harga_beli" placeholder="Masukan Beli Maksimum (Rp)" class="form-control" required>
										</div>
									</div>


                                    <div class="form-group">
										<label class="control-label col-lg-2">Harga Jual </label>
										<div class="col-lg-10">
											<input type="number"  value="<?= $data[0]->harga_jual;?>" name="harga_jual" placeholder="Masukan Jual Maksimum (Rp)" class="form-control" required>
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
var app= 'data_barang';

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