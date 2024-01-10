	<!-- Theme JS files -->
	<!-- <script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/core/libraries/jquery_ui/interactions.min.js"></script> -->
	<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<!-- <script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/core/app.js"></script> -->
	<script type="text/javascript" src="<?= base_url('assets/limitless/');?>assets/js/pages/form_select2.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<div class="panel-body">
							
<?php

// echo "<pre>";
// print_r($surat_order);
// echo "</pre>";
?>

<table class="table">

<tr>
	<td>Nomor Surat</td>
	<td>:</td>
	<td><?= $surat_order[0]->nomor_surat?></td>
</tr>
<tr>
	<td>Tgl Input</td>
	<td>:</td>
	<td><?= $surat_order[0]->tgl_input?></td>
</tr>
<tr>
	<td>Status Berkas</td>
	<td>:</td>
	<td><span class="badge badge-pill badge-primary">status barang :<?= $surat_order[0]->flag?></span> 
	<span class="badge badge-pill badge-success">input : <?= $user_input?></span> 
	<span class="badge badge-pill badge-secondary">gudang : <?= $user_gudang?></span> 
	<span class="badge badge-pill badge-warning">Kurir : <?= $user_kurir?></span> 
</td>
</tr>
<tr>
	<td>Alamat Pengiriman</td>
	<td>:</td>
	<td><?= $surat_order[0]->alamat?></td>
</tr>
<tr>
	<td>Nama Pengorder</td>
	<td>:</td>
	<td><?= $surat_order[0]->nama_pimpinan?></td>
</tr>
<tr>
	<td>Nomor Telp</td>
	<td>:</td>
	<td><?= $surat_order[0]->no_wa?></td>
</tr>
</table>
<!-- <p class="text-danger">* Apabila Alamat pengiriman Keliru Silahkan Hubungi Verifikator untuk membenahi di data Master</p>					 -->
<h6>List Order</h6>
											
											<div id="tabel_content_item">
					
					</div>


						</div>


                        <script>
       
        
var url = '<?= base_url()?>';
var app= 'tagihan';

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