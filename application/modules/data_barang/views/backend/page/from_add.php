	<!-- Theme JS files -->
	<!-- <script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/core/libraries/jquery_ui/interactions.min.js"></script> -->
	<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<!-- <script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/core/app.js"></script> -->
	<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/pages/form_select2.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<div class="panel-body">
							
<form id="form_add" method="POST" enctype="multipart/form-data" class="form-horizontal" >


							<!-- <form  id="form_add" method="POST" class="form-horizontal" > -->
								<fieldset class="content-group">
									<legend class="text-bold">Form Add <?= $nama_menu;?></legend>

									<div class="form-group">
										<label class="control-label col-lg-2">Nama Data barang</label>
										<div class="col-lg-10">
											<input type="text" name="nama_data_barang" placeholder="Masukan Nama data_barang" class="form-control" required>
										</div>
									</div>

                                    <div class="form-group">
										<label class="control-label col-lg-2">Jenis</label>
										<div class="col-lg-10">
                                        <div class="form-group">
										<select class="select-search" name="id_jenis" required>
											        <option value="">= Pilih Salah Satu =</option>
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
											        <option value="">= Pilih Salah Satu =</option>
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
											        <option value="">= Pilih Salah Satu =</option>
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
											<input type="number" name="keuntungan_minimum" placeholder="Masukan Keuntungan Minimum (%)" class="form-control" required>
										</div>
									</div>


                                    <div class="form-group">
										<label class="control-label col-lg-2">Diskon Maksimum </label>
										<div class="col-lg-10">
											<input type="number" name="diskon_maksimum" placeholder="Masukan Diskon Maksimum (%)" class="form-control" required>
										</div>
									</div>


                                    <div class="form-group">
										<label class="control-label col-lg-2">Harga Beli </label>
										<div class="col-lg-10">
											<input type="number" name="harga_beli" placeholder="Masukan Beli Maksimum (Rp)" class="form-control" required>
										</div>
									</div>


                                    <div class="form-group">
										<label class="control-label col-lg-2">Harga Jual </label>
										<div class="col-lg-10">
											<input type="number" name="harga_jual" placeholder="Masukan Jual Maksimum (Rp)" class="form-control" required>
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
var app= 'data_barang';

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