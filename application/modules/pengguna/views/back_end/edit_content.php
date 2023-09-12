<script src="http://parsleyjs.org/dist/parsley.js"></script>

          <a href="#" class="btn btn-sm btn-secondary" onclick="content();"> <i class="fa fa-arrow-left"></i> Kembali</a> <hr>
 
          <form id="form_add" method="POST">
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Pengguna:</label>
            <input type="text" name="nama_pengguna" value="<?= $data[0]->nama_pengguna;?>" class="form-control" id="nama_pengguna"    placeholder="Masukan Nama Anda!"  autocomplete="off" required>
            <input type="hidden" name="id_user" value="<?= $data[0]->id_user;?>" class="form-control" id="id"    placeholder="Masukan Nama Anda!"  autocomplete="off" required>
          </div>

          
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">NIP:</label>
            <input type="text" name="nip"  value="<?= $data[0]->nip;?>" class="form-control" placeholder="Masukan NIP!" id="nip"   autocomplete="off" required>
          </div>
          
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" name="username"  value="<?= $data[0]->username;?>" class="form-control" placeholder="Masukan Username!" id="userame"  autocomplete="off" required>
          </div>
          
    </div>
    
        
      
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="text" name="password" value="<?= $data[0]->password;?>" class="form-control"placeholder="Masukan Password"  id="password"  autocomplete="off" required>
            <br><i>Lupa Password? Dobel Klik Tombol di samping </i>
            <a class="btn btn-success btn-sm" ondblclick="cek_password();" > <i class="fa fa-eye"></i></a> ,Sebaiknya Segera Ubah Password Anda..
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Jabatan:</label>
            <input type="text" class="form-control" name="jabatan"  value="<?= $data[0]->jabatan;?>" placeholder="Masukan Jabatan" id="jabatan"  autocomplete="off" required>
          </div>

          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Ruang</label>
             
      

          <select name="ruang" class="form-control select2"  id="ruang" >
            <option value="<?= $data[0]->id_ruang;?>">--  <?= $data[0]->nama_ruangan;?>-- </option>
            <?php 
            
            foreach ($ruang as $k) {
              ?>
            <option value="<?= $k->id_ruang?>"> <?= $k->nama_ruangan?> </option>   
           <?php }?>
          </select>

          
          
                   </div>
                   <button type="submit"  id="submit_add" class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Ubah Data</button>

   

       
<script>



  $("#form_add").submit(function(e) {
           e.preventDefault();
         $.ajax({
          url: "<?= base_url('pengguna/edit_p')?>",
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


function cek_password() {
  ps = $('#password').val();
  $.ajax({
    url: "<?= base_url('pengguna/forgot_password')?>",
             type: 'POST',
             data: {ps:ps},            
             success: function(data) {  
            // console.log(data);
            $('#password').val(data);
            
             }
  });
}
</script>
      
     
     
      