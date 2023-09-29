<script src="http://parsleyjs.org/dist/parsley.js"></script>
          
          <a href="#" class="btn btn-sm btn-secondary" onclick="content();"> <i class="fa fa-arrow-left"></i> Kembali</a> <hr>
 
          <form id="form_add" method="POST">
     
          
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama sumber_dana:</label>
            <input type="text" name="nama_sumber_dana" class="form-control" placeholder="Masukan Nama sumber_dana/OPD/Kantor" id="nip"   autocomplete="off" required>
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tahun Anggaran:</label>
            <input type="date" name="tahun" class="form-control" placeholder="Masukan Nama sumber_dana/OPD/Kantor" id="nip"   autocomplete="off" required>
          </div>
                 <button type="submit"  id="submit_add" class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Simpan</button>

   

       
<script>



  $("#form_add").submit(function(e) {
    
           e.preventDefault();
         $.ajax({
          url: "<?= base_url('sumber_dana/add_p')?>",
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
      
     
     
      