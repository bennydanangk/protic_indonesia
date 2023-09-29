<script src="http://parsleyjs.org/dist/parsley.js"></script>
          
          <a href="#" class="btn btn-sm btn-primary" onclick="menu_bar();"> <i class="fa fa-arrow-left"></i> Kembali</a> <hr>
 
          <form id="form_add" method="POST">
     
          
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Pengguna:</label>
            <input type="hidden" name="url" value="tabel_user">
            <select name="id" id="id_distributor"  class="form-control select2bs4" required >
              <option value="">-Kosong-</option>
              <?php 
foreach ($user as $k) {
  ?>

  <option value="<?= $k->id_user ?>"> <?= $k->nama_pengguna ?> </option>

  <?php
}

               ?>
            </select>
            <!-- <input type="text" name="nama_satuan" class="form-control" placeholder="Masukan Nama Satuan" id="nip"   autocomplete="off" required> -->
          </div>
          
                 <button type="submit"  id="submit_add" class="btn btn-success btn-sm"> <i class="fa fa-search"></i> Cari Jenis</button>

   
                 <div id="tabel_laporan"></div>   
       
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
          url: "<?= base_url('laporan_barang/get_url')?>",
             type: 'POST',
             data: $(this).serialize(),             
             success: function(data) {    
          var obj =JSON.parse(JSON.stringify(data));



    $('#tabel_laporan').load(obj.data);

             }
         });
     });

</script>
      
     
     
      