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
										<label class="control-label col-lg-2">Nomor Surat</label>
										<div class="col-lg-10">
										<input type="hidden" name="id" placeholder="Masukan Nomor Faktur" value="<?= $data[0]->id_surat_order;?>" class="form-control" required>

											<input type="text" name="nomor_surat" value="<?= $data[0]->nomor_surat;?>"  placeholder="Masukan Nomor Faktur" class="form-control" required readonly>
										</div>
									</div>

                                    <div class="form-group">
										<label class="control-label col-lg-2">Customer</label>
										<div class="col-lg-10">
                                        <div class="form-group">
										<select class="select-search" name="id_customer" required>
											        <option value="<?= $data[0]->id_customer;?>" >= <?= $data[0]->nama_customer;?>=</option>
                                                <?php 
                                                foreach ($customer as $k) {?>
	                                                <option value="<?= $k->id_customer?>"><?= $k->nama_customer?></option>
                                                <?php   }     ?>
		
										</select>
									</div>
										</div>

                                        </div>

                                      


										<div class="form-group">
										<label class="control-label col-lg-2">PPN </label>
										<div class="col-lg-10">
                                        <div class="form-group">
										<select class="select-search" name="ppn" required>
											        <option value="<?= $data[0]->ppn?>">= <?= $data[0]->ppn?> =</option>
                                                     <option value="ya">ya</option>
													<option value="tidak">tidak</option>
		
										</select>
	
									</div>
										</div>

                                        </div>







                                    <div class="form-group">
										<label class="control-label col-lg-2">Tanggal Surat</label>
										<div class="col-lg-10">
											<input type="date" value="<?= $data[0]->tgl_surat;?>"  name="tgl_surat" placeholder="Masukan Tanggal Faktur" class="form-control" required>
										</div>
									</div>


                                    <div class="form-group">
										<label class="control-label col-lg-2">Catatan </label>
										<div class="col-lg-10">
											<input type="text" value="<?= $data[0]->catatan;?>"  name="catatan" placeholder="Catatan Faktur" class="form-control" required>
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
var app= 'surat_order';

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