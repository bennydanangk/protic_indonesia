<script src="http://parsleyjs.org/dist/parsley.js"></script>
          
          <!-- <a href="#" class="btn btn-sm btn-secondary" onclick="content();"> <i class="fa fa-arrow-left"></i> Kembali</a> <hr> -->
 
          <form id="form_add" method="POST">
     
         
            <input type="hidden" name="id_faktur" class="form-control" value="<?= $id_faktur?>" placeholder="Masukan Nomor Faktur" id="nip"   autocomplete="off" required>

  

          
          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Barang Faktur</label>
             
      

          <select name="id_barang_faktur" class="form-control select2bs4"  id="id_barang_faktur" >
            <option value="0"> -Kosong- </option>
            <?php 
            
            foreach ($barang_faktur as $k) {
              ?>
            <option value="<?= $k->id_barang_faktur?>"> <?= $k->nama_barang_faktur?> </option>   
           <?php }?>
          </select>

          
          
                   </div>



          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Jumlah:</label>
            <input type="number" name="qty" class="form-control" placeholder="Masukan Jumlah Pembelian" id="nip"   autocomplete="off" required>
          </div>

         
          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Jenis Satuan</label>
             
      

          <select name="id_satuan" class="form-control select2bs4"  id="id_satuan" >
            <option value="0"> -Kosong- </option>
            <?php 
            
            foreach ($satuan as $k) {
              ?>
            <option value="<?= $k->id_satuan?>"> <?= $k->nama_satuan?> </option>   
           <?php }?>
          </select>

          
          
                   </div>



                   <div class="form-group">
            <label for="recipient-name" class="col-form-label">Exp:</label>
            <input type="date" name="ed" class="form-control" placeholder="Masukan Exp Product" id="nip"   autocomplete="off" required>
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Harga:</label>
            <input type="date" name="harga" class="form-control" placeholder="Masukan Harga Per @ Item" id="nip"   autocomplete="off" required>
          </div>
              
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Disc:</label>
            <input type="number" step="0.01" name="disc" class="form-control" placeholder="Masukan Harga Per @ Item" id="nip"   autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Pajak:</label>
            <input type="number" step="0.01" name="pajak" class="form-control" placeholder="Masukan Harga Per @ Item" id="nip"   autocomplete="off" required>
          </div>

                 <button type="submit"  id="submit_add" class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Simpan</button>

            </form>
                 <script src="<?php echo base_url('assets/js/') ?>bootstrap_menu.js"></script>
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
          url: "<?= base_url('faktur/add_p')?>",
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
      
     
     
      