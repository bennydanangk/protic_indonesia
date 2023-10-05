<script src="http://parsleyjs.org/dist/parsley.js"></script>

          <a href="#" class="btn btn-sm btn-secondary" onclick="content();"> <i class="fa fa-arrow-left"></i> Kembali</a> <hr>
 
          <form id="form_add" method="POST">
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nomor Faktur:</label>
            <input type="text" name="nomor_faktur" value="<?= $faktur[0]->nomor_faktur;?>" class="form-control" id="nama_pengguna"    placeholder="Masukan Nama Anda!"  autocomplete="off" required>
            <input type="hidden" name="id_faktur" value="<?= $faktur[0]->id_faktur;?>" class="form-control" id="id"    placeholder="Masukan Nama Anda!"  autocomplete="off" required>
          </div>


          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Distributor</label>
             
      

          <select name="id_distributor" class="form-control select2bs4"  id="distributor" >
            <option value="<?= $faktur[0]->id_distributor;?>"> -<?= $faktur[0]->nama_distributor ?>- </option>
            <?php 
            
            foreach ($distributor as $k) {
              ?>
            <option value="<?= $k->id_distributor?>"> <?= $k->nama_distributor?> </option>   
           <?php }?>
          </select>

          
          
                   </div>


        

          
          
           

                   <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tgl Faktur:</label>
            <input type="date" name="tgl_faktur"  value="<?= $faktur[0]->tgl_faktur;?>" class="form-control" placeholder="Masukan Nomor Faktur" id="nip"   autocomplete="off" required>
          </div>

         
          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Sumber Dana</label>
             
      

          <select name="id_sumber_dana" class="form-control select2bs4"  id="id_sumber_dana" >
          <option value="<?= $faktur[0]->id_sumber_dana;?>"> -<?= $faktur[0]->nama_sumber_dana ?>- </option>

            <?php 
            
            foreach ($sumber_dana as $k) {
              ?>
            <option value="<?= $k->id_sumber_dana?>"> <?= $k->nama_sumber_dana?> </option>   
           <?php }?>
          </select>

          
          
                   </div>



                   <div class="form-group">
            <label for="recipient-name" class="col-form-label">Catatan:</label>
            <input type="text" name="catatan"  value="<?= $faktur[0]->catatan;?>" class="form-control" placeholder="Masukan Catatan" id="nip"   autocomplete="off" required>
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
      
     
     
      