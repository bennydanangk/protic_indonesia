<script src="http://parsleyjs.org/dist/parsley.js"></script>
          
          <a href="#" class="btn btn-sm btn-secondary" onclick="content();"> <i class="fa fa-arrow-left"></i> Kembali</a> <hr>
 
          <form id="form_add" method="POST">
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Pengguna:</label>
            <input type="text" name="nama_pengguna" class="form-control" id="nama_pengguna"    placeholder="Masukan Nama Anda!"  autocomplete="off" required>
           
          </div>

          
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">NIP:</label>
            <input type="text" name="nip" class="form-control" placeholder="Masukan NIP!" id="nip"   autocomplete="off" required>
          </div>
          
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" name="username" class="form-control" placeholder="Masukan Username!" id="userame"  autocomplete="off" required>
          </div>
          
    </div>
    
        
      
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" name="password" class="form-control"placeholder="Masukan Password"  id="password"  autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Jabatan:</label>
            <input type="text" class="form-control" name="jabatan" placeholder="Masukan Jabatan" id="jabatan"  autocomplete="off" required>
          </div>

          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Ruang</label>
             
      

          <select name="ruang" class="form-control select2"  id="ruang" >
            <option value="0"> -Kosong- </option>
            <?php 
            
            foreach ($ruang as $k) {
              ?>
            <option value="<?= $k->id_ruang?>"> <?= $k->nama_ruangan?> </option>   
           <?php }?>
          </select>

          
          
                   </div>
                   <button type="submit"  id="submit_add" class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Simpan</button>

   

       
<script>



  $("#form_add").submit(function(e) {
           e.preventDefault();
         $.ajax({
          url: "<?= base_url('pengguna/add_p')?>",
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
      
     
     
      