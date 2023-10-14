<script src="http://parsleyjs.org/dist/parsley.js"></script>
          

<div class="card text-white bg-dark mb-3">
  <div class="card-header">Transaksi BHP</div>
  <div class="card-body">
    <!-- <h5 class="card-title">Dark card title</h5> -->
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
  
    <!-- <form id="form_add" method="POST"> -->
     
          
     <div class="form-group">
         <label for="recipient-name" class="col-form-label">Nama Pelanggan:</label>
         <!-- <input type="text" name="nama_jenis" class="form-control" placeholder="Masukan Nama jenis/OPD/Kantor" id="nip"   autocomplete="off" required> -->
         <select name="id_user" class="form-control select2bs4" required  >
                    <option  value="0">-Guest-</option>
                    <?php 
            
            foreach ($user as $k) {
              ?>
            <option value="<?= $k->id_user?>"> <?= $k->nama_pengguna?> </option>   
           <?php }?>           
           </select>
      
        </div>
       
   <!-- <button type="submit"  id="submit_add" class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Simpan</button> -->
   <a class="btn btn-primary btn-sm"> <i class="fa fa-user"></i> Set Pelanggan</a>


<!-- </form> -->
  
  </div>
</div>


        
 
<script src="<?php echo base_url('assets/template/') ?>plugins/select2/js/select2.full.min.js"></script>
 
       
<script>
 //Initialize Select2 Elements
 $('.select2').select2();


//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
})


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
      
     
     
      