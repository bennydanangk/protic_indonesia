
</html>

<script>
//.inv module
var url = '<?= base_url()?>';
var app= 'customer';
//end

connecting(url+'api/cek_koneksi');

tabel_content();
function tabel_content() {
    $('#tabel_content').load(url+'/'+app+'/tabel_content');
}

//========Open SAmpah

function open_sampah() {
    $('#tabel_content').load(url+'/'+app+'/tabel_sampah');
}


//=========add==
function open_add() {
    $('#tabel_content').load(url+'/'+app+'/form_add');
    
}
//======= Edit===

function open_edit(id) {
    $('#tabel_content').load(url+'/'+app+'/form_edit/'+id);
    
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




</script>