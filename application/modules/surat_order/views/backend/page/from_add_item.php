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
											<input type="text" value="<?= $surat_order[0]->nomor_surat?>" name="nomor_surat" placeholder="Diskon %" class="form-control" readonly>
											<input type="hidden" value="<?= $surat_order[0]->id_surat_order?>" name="id_surat_order" placeholder="Diskon %" class="form-control" readonly>
											<input type="hidden" value="<?= $surat_order[0]->ppn?>" id="ppn_act" name="ppn_act" placeholder="Diskon %" class="form-control" readonly>
											<input type="hidden" value="11" id="besaran_ppn" placeholder="Diskon %" class="form-control" readonly>
										
										</div>
									</div>


									

								
                                    <div class="form-group">
										<label class="control-label col-lg-2">Nama Barang</label>
										<div class="col-lg-10">
                                        <div class="form-group">
										<select  onchange="get_barang()" class="select-search"  id='id_barang' name="id_barang" required>
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
										<span id="notif"></span>
										</div>
									</div>


     
					


                                
									<div class="form-group">
										<label class="control-label col-lg-2">Harga </label>
										<div class="col-lg-10">
											<input type="number" onkeyup="cek_jumlah()" id="harga" name="harga" placeholder="harga"  class="form-control" required>
										</div>
									</div>

  
									<div class="form-group">
										<label class="control-label col-lg-2">Harga Dasar </label>
										<div class="col-lg-10">
											<input type="number" onkeyup="cek_jumlah()" id="harga_beli" name="harga" placeholder="harga_dasar"  class="form-control" required readonly>
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-lg-2">Harga Jual </label>
										<div class="col-lg-10">
											<input type="number" onkeyup="cek_jumlah()" id="harga_jual" name="harga" placeholder="harga_dasar"  class="form-control" required readonly>
										</div>
									</div>



													
                                    
									<div class="form-group">
										<label class="control-label col-lg-2">Stok </label>
										<div class="col-lg-10">
											<input type="number" id="stok" name="stok" placeholder="stok" class="form-control" required readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">PPN </label>
										<div class="col-lg-10">
											<input type="number" id="ppn" name="ppn" placeholder="ppn" class="form-control" required readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Plus Minus </label>
										<div class="col-lg-10">
											<input type="number" id="plus_minus" name="plus_minus" placeholder="stok" class="form-control" required readonly>
										</div>
									</div>



									<div class="form-group">
										<label class="control-label col-lg-2">Jumlah </label>
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
var app= 'surat_order';

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

                    open_tabel_list(<?= $surat_order[0]->id_surat_order?>);


					reset_form();
             }
         });
     });


	 function cek_jumlah() {

		
	
		// var disc =$('#disc').val();
		// var pajak = $('#pajak').val();
		var harga = $('#harga').val();
		var harga_jual = $('#harga_jual').val();
		var harga_beli = $('#harga_beli').val();
		var qty = $('#qty').val();

		// console.log(disc);
		// console.log(pajak);
		// console.log(harga);
		// console.log(qty);

		if(harga >= harga_jual){
			// console.log('Good');
			$('#notif').html('<span class="badge badge-success"> Suksess </span>');
		} else

		if(harga >= harga_beli && harga < harga_jual){
			$('#notif').html('<span class="badge badge-warning"> Warning </span>');

		}else{
			$('#notif').html('<span class="badge badge-danger"> Danger </span>');

			// console.log('Danger');
		}

		ppn();

		ppn_ = $('#ppn').val();
		parseInt(ppn_);
		jumlah = (harga  * qty) ;
		jumlah  = parseInt(jumlah) + parseInt(ppn_);

		
		$('#jumlah').val(jumlah);

		jumlah_ = (harga - harga_jual)  * qty;
		$('#plus_minus').val(jumlah_);
		console.log(jumlah_);
	 }



	 open_tabel_list(<?= $surat_order[0]->id_surat_order?>);



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
			
              open_tabel_list(<?= $surat_order[0]->id_surat_order?>)
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





function get_barang() {
var id = $('#id_barang option:selected').val();

// console.log(id);

	$.ajax({
          url: url+"/"+app+"/get_barang/"+id,
             type: 'GET',
             data: $(this).serialize(),             
             success: function(data) {  
				
				var obj = jQuery.parseJSON(data);
				// console.log(obj);
				// console.log(obj.harga_jual);
				stok(id);

			
				$('#harga_beli').val(obj.harga_beli);
				$('#harga_jual').val(obj.harga_jual);
				$('#harga').val(obj.harga_jual);


             }
         });



	
	
}



function stok(id) {
//   console.log(id);
  $.ajax({
          url: url+"/stok_barang/stok",
             type: 'POST',
             data: {id:id} ,             
             success: function(data) {    
			
              const obj = JSON.parse(data);

			  $('#stok').val(obj.qty);
            //   $('#stok').html(obj.qty);
              //  console.log(obj.qty);
             }
         });

}



function ppn() {
	x = $('#ppn_act').val()
	var harga=	$('#harga').val();
	var qty = $('#qty').val();
	var besaran_ppn =$('#besaran_ppn').val();
	var jumlah_ppn = 0;
	if(x == 'ya'){
		jumlah_ppn = (harga*qty)*besaran_ppn/100;
	}else{
		jumlah_ppn = 0;
	}

	// console.log(jumlah_ppn);
	$('#ppn').val(jumlah_ppn);
}



function reset_form() {

	$('#id_barang').val('');
	$('#ppn').val('');
	$('#harga').val('');
	$('#harga_beli').val('');
	$('#harga_jual').val('');
	$('#stok').val('');
	$('#plus_minus').val('');
	$('#jumlah').val('');
	$('#nama_barang').val('');
	$('#qty').val('');
	
}
	
                        </script>