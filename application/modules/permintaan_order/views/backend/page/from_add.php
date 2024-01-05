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
										<label class="control-label col-lg-2">Nomor Surat</label>
										<div class="col-lg-10">
											<input type="text" name="nomor_surat" value="<?= $nomor_surat?>" placeholder="Masukan Nomor Faktur" class="form-control" required readonly>
										</div>
									</div>

                                    <div class="form-group">
										<label class="control-label col-lg-2">Cusutomer</label>
										<div class="col-lg-10">
                                        <div class="form-group">
										<select class="select-search" name="id_customer" required>
											        <option value="">= Pilih Salah Satu =</option>
                                                <?php 
                                                foreach ($customer as $k) {?>
	                                                <option value="<?= $k->id_customer?>"><?= $k->nama_customer?></option>
                                                <?php   }     ?>
		
										</select>

										<p class="text-danger">*Jika Cusutomer Tidak Ada Silahkan Input data customer</p>
										<!-- <label for="control-label col-lg-2">Jika Cusutomer Tidak Ada Silahkan Input Data customer</label> -->

										<a class="btn btn-warning" href="http://kanishkkunal.com" 
  target="popup" 
  onclick="window.open('<?= base_url('customer')?>','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;">
   <span class="icon icon-user"></span> Input Customer
</a>
									</div>
										</div>

                                        </div>

                                      


										<div class="form-group">
										<label class="control-label col-lg-2">PPN </label>
										<div class="col-lg-10">
                                        <div class="form-group">
										<select class="select-search" name="ppn" required>
											        <option value="">= Pilih Salah  Satu =</option>
                                                     <option value="ya">ya</option>
													<option value="tidak">tidak</option>
		
										</select>
	
									</div>
										</div>

                                        </div>








                                    <div class="form-group">
										<label class="control-label col-lg-2">Tanggal Surat</label>
										<div class="col-lg-10">
											<input type="date" name="tgl_surat" placeholder="Masukan Tanggal Faktur" class="form-control" required>
										</div>
									</div>


                                    <div class="form-group">
										<label class="control-label col-lg-2">Catatan </label>
										<div class="col-lg-10">
											<input type="text" name="catatan" placeholder="Catatan Faktur" class="form-control" required>
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
var app= 'permintaan_order';

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