<script src="http://parsleyjs.org/dist/parsley.js"></script>

          <a href="#" class="btn btn-sm btn-secondary" onclick="content();"> <i class="fa fa-arrow-left"></i> Kembali</a> <hr>
 
          <form id="form_add" method="POST">
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Pengguna:</label>
            <input type="text" name="nama_faktur" value="<?= $faktur[0]->nama_faktur;?>" class="form-control" id="nama_pengguna"    placeholder="Masukan Nama Anda!"  autocomplete="off" required>
            <input type="hidden" name="id_faktur" value="<?= $faktur[0]->id_faktur;?>" class="form-control" id="id"    placeholder="Masukan Nama Anda!"  autocomplete="off" required>
          </div>

        

          
          
                   </div>
                   <button type="submit"  id="submit_add" class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Ubah Data</button>

   

       
<script>



  $("#form_add").submit(function(e) {
           e.preventDefault();
         $.ajax({
          url: "<?= base_url('faktur/edit_p')?>",
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
      
     
     
      