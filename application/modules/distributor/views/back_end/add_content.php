<script src="http://parsleyjs.org/dist/parsley.js"></script>
          
          <a href="#" class="btn btn-sm btn-secondary" onclick="content();"> <i class="fa fa-arrow-left"></i> Kembali</a> <hr>
 
    <form id="form_add" method="POST">
     
          
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Distributor:</label>
            <input type="text" name="nama_distributor" class="form-control" placeholder="Masukan Nama Ruang/OPD/Kantor" id="nip"   autocomplete="off" required>
          </div>
              
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Alamat Distributor:</label>
            <input type="text" name="alamat_distributor" class="form-control" placeholder="Alamat distributor" id="nip"   autocomplete="off" required>
          </div>
          

              
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">No Telp:</label>
            <input type="text" name="no_telp" class="form-control" placeholder="No telp" id="nip"   autocomplete="off" required>
          </div>
          
              
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email Distributor:</label>
            <input type="email" name="email_distributor" class="form-control" placeholder="Email Distributor" id="nip"   autocomplete="off" required>
          </div>
              
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Pimpinan:</label>
            <input type="text" name="nama_pimpinan" class="form-control" placeholder="Masukan Nama Pimpinan" id="nip"   autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Bank:</label>
            <input type="text" name="nama_bank" class="form-control" placeholder="Masukan Nama Bank" id="nip"   autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nomor Rekening:</label>
            <input type="text" name="no_rek" class="form-control" placeholder="Masukan Nomor Rekening" id="nip"   autocomplete="off" required>
          </div>

          
                 <button type="submit"  id="submit_add" class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Simpan</button>

      </form>

       
<script>



  $("#form_add").submit(function(e) {
    
           e.preventDefault();
         $.ajax({
          url: "<?= base_url('distributor/add_p')?>",
             type: 'POST',
             data: $(this).serialize(),             
             success: function(data) {    

              console.log(data);
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
      
     
     
      