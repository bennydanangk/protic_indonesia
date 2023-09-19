<script src="http://parsleyjs.org/dist/parsley.js"></script>
          
          <a href="#" class="btn btn-sm btn-secondary" onclick="content();"> <i class="fa fa-arrow-left"></i> Kembali</a> <hr>
 
          <form id="form_add" method="POST">
     
          
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama jenis:</label>
            <input type="text" name="nama_jenis" class="form-control" placeholder="Masukan Nama jenis/OPD/Kantor" id="nip"   autocomplete="off" required>
          </div>
          
                 <button type="submit"  id="submit_add" class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Simpan</button>

   

       
<script>



  $("#form_add").submit(function(e) {
    
           e.preventDefault();
         $.ajax({
          url: "<?= base_url('jenis/add_p')?>",
             type: 'POST',
             data: $(this).serialize(),             
             success: function(data) {    
          var obj =JSON.parse(JSON.stringify(data));
           if(obj.respone != 201){
            Swal.fire({
              icon: 'success',
              title: 'yeah!',
              text: obj.data,

              })
              content();
           }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: obj.data,
})

           }
             }
         });
     });

</script>
      
     
     
      