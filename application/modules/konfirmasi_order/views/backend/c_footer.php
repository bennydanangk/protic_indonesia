
</html>

<script>

select2add();
 function select2add() {
  $('.select2').select2();
    $('.select2bs4').select2({
          theme: 'bootstrap4'
        })
    $("#mutasi_barang").select2({
    dropdownParent: $("#modal_add")
  });
 }

 

  //  $('#js-example-basic-single').select2();
  
  //.inv module
var url = '<?= base_url()?>';
var app= 'konfirmasi_order';
//end

connecting(url+'api/cek_koneksi');

   


tabel_content();


function open_item(id) {
    $('#tabel_content').load(url+'/'+app+'/open_item/'+id);
}


function open_tabel_list(id) {
    $('#tabel_content_item').load(url+'/'+app+'/tabel_list/'+id);
}



//========Open SAmpah

function open_sampah() {
    $('#tabel_content').load(url+'/'+app+'/tabel_sampah');
}


//=========add==
function open_add() {
  $('#js-example-basic-single').select2();
    $('#tabel_content').load(url+'/'+app+'/form_add');
    
}
//======= Edit===

function open_edit(id) {
    $('#tabel_content').load(url+'/'+app+'/form_edit/'+id);
    
}


function open_detail(id) {
    $('#tabel_content').load(url+'/'+app+'/get_detail/'+id);
    
}


//======Del Data

function hapus_data(id) {
    
    Swal.fire({
  title: "Are you sure?",
  text: "Apakah Anda Akan Menghapus Data Anda",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {


	$.ajax({
          url: url+"/"+app+"/p_delete",
             type: 'POST',
             data: {id:id} ,             
             success: function(data) {    
			
                tabel_content();
             }
         });



    Swal.fire({
      title: "Deleted!",
      text: "Your file has been deleted.",
      icon: "success"
    });
  }
});

}



//============Restore ==

function restore_data(id) {
    
    Swal.fire({
  title: "Are you sure?",
  text: "Apakah Anda Mengembalikan Data Anda",
  icon: "info",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, Restore it!"
}).then((result) => {
  if (result.isConfirmed) {


	$.ajax({
          url: url+"/"+app+"/p_restore",
             type: 'POST',
             data: {id:id} ,             
             success: function(data) {    
			
                open_sampah();
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



/// //============Restore ==

function permanent_hapus_data(id) {
    
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
          url: url+"/"+app+"/p_delete_permanen",
             type: 'POST',
             data: {id:id} ,             
             success: function(data) {    
			
                open_sampah();
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




function tabel_content() {
  $('#tabel_content').load(url+'/'+app+'/tabel_content/');

}







function aprove(id) {
  Swal.fire({
  title: "Apa Kamu Yakin?",
  text: "Apakah Menyetujui Data Anda",
  icon: "info",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, Aprove it!"
}).then((result) => {
  if (result.isConfirmed) {


	$.ajax({
          url: url+"/"+app+"/p_aprove",
             type: 'POST',
             data: {id:id} ,             
             success: function(data) {    
			
              tabel_content();
             }
         });



    Swal.fire({
      title: "Aprove!",
      text: "Your data has been Aprove.",
      icon: "success"
    });
  }
});

	
	
}





function cancel(id) {
  Swal.fire({
  title: "Are you sure?",
  text: "Apakah Anda Menolak Data Anda",
  icon: "info",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, Restore it!"
}).then((result) => {
  if (result.isConfirmed) {


	$.ajax({
          url: url+"/"+app+"/p_cancel",
             type: 'POST',
             data: {id:id} ,             
             success: function(data) {    
			
              tabel_content();
             }
         });



    Swal.fire({
      title: "Cancel Data!",
      text: "Your file has been Cancel.",
      icon: "success"
    });
  }
});;
	
}





</script>