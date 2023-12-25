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
										<label class="control-label col-lg-2">Nomor Item </label>
										<div class="col-lg-10">
											<input type="text" value="<?= $surat_penawaran[0]->nomor_surat?>" name="nomor_surat" placeholder="Diskon %" class="form-control" readonly>
											<input type="hidden" value="<?= $surat_penawaran[0]->id_surat_penawaran?>" name="id_surat_penawaran" placeholder="Diskon %" class="form-control" readonly>
										
										</div>
									</div>


									

								
                                    <div class="form-group">
										<label class="control-label col-lg-2">Nama Barang</label>
										<div class="col-lg-10">
                                        <div class="form-group">
										<select class="select-search" name="id_barang" required>
											        <option value="">= Pilih Salah Satu =</option>
                                                <?php 
                                                foreach ($data_barang as $k) {?>
	                                                <option value="<?= $k->id_barang?>"><?= $k->nama_data_barang?></option>
                                                <?php   }     ?>
		
										</select>
									</div>


										</div>

                                        </div>

                                      
									
													


									<!-- <div class="form-group">
										<label class="control-label col-lg-2">Nama Satuan</label>
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

                                        </div> -->


										<div class="form-group">
										<label class="control-label col-lg-2">qty</label>
										<div class="col-lg-10">
										<!-- <input type="hidden" name="id_faktur" value="<?= $id_faktur; ?>" placeholder="Masukan Nomor Faktur" class="form-control" required> -->

											<input type="number" id="qty" name="qty"   onkeyup="cek_jumlah()"placeholder="Masukan Jumlah Barang" class="form-control" required>
										</div>
									</div>


     

                                


  
                                    
									<div class="form-group">
										<label class="control-label col-lg-2">Stok </label>
										<div class="col-lg-10">
											<input type="number" id="jumlah" name="jumlah" placeholder="Jumlah" class="form-control" required readonly>
										</div>
									</div>

                                   
									
								<div class="text-right">
                 <button type="submit"  id="submit_add" class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Simpan</button>

									<!-- <button type="submit"  id="submit_add" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button> -->
								</div>
							</form>


							
<h5>ITEM LIST</h5>
											
											<div id="tabel_content_item">
					
					</div>


						</div>


                        <script>
       
        
var url = '<?= base_url()?>';
var app= 'surat_penawaran';

$("#form_add").submit(function(e) {
         e.preventDefault();
         $.ajax({
          url: url+"/"+app+"/p_add_item",
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

                    open_tabel_list(<?= $surat_penawaran[0]->id_surat_penawaran?>);
             }
         });
     });


	 function cek_jumlah() {

		
	
		// var disc =$('#disc').val();
		// var pajak = $('#pajak').val();
		// var harga = $('#harga').val();
		// var qty = $('#qty').val();

		// console.log(disc);
		// console.log(pajak);
		// console.log(harga);
		// console.log(qty);

		// jumlah = (harga - (disc/100 * harga) + (pajak/100 * harga) ) * qty;

		// console.log(jumlah);

		// $('#jumlah').val(jumlah);
	 }



	 open_tabel_list(<?= $surat_penawaran[0]->id_surat_penawaran?>);



	 /// //============Restore ==

function hapus_item_data(id) {
    
    Swal.fire({
  title: "Are you sure?",
  text: "Data Tidak Bisa di kembalikan Lagi",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, Terhapus Permanen!"
}).then((result) => {
  if (result.isConfirmed) {


	$.ajax({
          url: url+"/"+app+"/p_delete_item",
             type: 'POST',
             data: {id:id} ,             
             success: function(data) {    
			
              open_tabel_list(<?= $surat_penawaran[0]->id_surat_penawaran?>)
             }
         });



    Swal.fire({
      title: "Restore!",
      text: "Your file has been Restore.",
      icon: "success"
    });
  }
});

}



	
                        </script>