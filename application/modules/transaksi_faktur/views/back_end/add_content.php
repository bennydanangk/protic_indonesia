<script src="http://parsleyjs.org/dist/parsley.js"></script>
          

<div class="card text-white bg-dark mb-3">
  <div class="card-header">Transaksi BHP</div>
  <div class="card-body">
    <!-- <h5 class="card-title">Dark card title</h5> -->
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
  
    <form id="form_add" method="POST">
     
          
    <div class="form-group">
            <label for="recipient-name" class="col-form-label">Kode Transaksi:</label>
            <input type="text" id="kode_transaksi" name="kode_transaksi" class="form-control" placeholder="Masukan Nama Satuan" value='<?= date('YmdHis')?>'   autocomplete="off" required>
          </div>


     <div class="form-group">
         <label for="recipient-name" class="col-form-label">Nama Pelanggan:</label>
         <!-- <input type="text" name="nama_jenis" class="form-control" placeholder="Masukan Nama jenis/OPD/Kantor" id="nip"   autocomplete="off" required> -->
         <select name="id_user" class="form-control select2bs4" required  >
                    <option  value="1">-Admin-</option>
                    <?php 
            
            foreach ($user as $k) {
              ?>
            <option value="<?= $k->id_user?>"> <?= $k->nama_pengguna?> </option>   
           <?php }?>           
           </select>
      
        </div>


        <div class="form-group">
         <label for="recipient-name" class="col-form-label">Nama Barang:</label>
         <!-- <input type="text" name="nama_jenis" class="form-control" placeholder="Masukan Nama jenis/OPD/Kantor" id="nip"   autocomplete="off" required> -->
         <select name="id_barang_faktur" id="id_barang_faktur" class="form-control select2bs4" required  >
                    <option  value="">-Kosong-</option>
                    <?php 
            
            foreach ($barang_faktur as $k) {
              ?>
            <option value="<?= $k->id_barang_faktur?>"> <?= $k->nama_barang_faktur?> </option>   
           <?php }?>           
           </select>
      
        </div>

        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Sisa Stok:</label>
            <input type="number" id="sisa_stok" class="form-control" placeholder="Qty" autocomplete="off" readonly>
          </div>


          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Jumlah Barang:</label>
           <br>  <i class="text-danger"  id='notif'></i>
            <input type="number" id="qty" name="qty" onkeyup="cek_qty();" class="form-control" placeholder="Masukan Jumlah Barang" autocomplete="off" required>
          </div>

          <div class="form-group">
         <label for="recipient-name" class="col-form-label">Distribusi Ruangan:</label>
         <!-- <input type="text" name="nama_jenis" class="form-control" placeholder="Masukan Nama jenis/OPD/Kantor" id="nip"   autocomplete="off" required> -->
         <select name="id_ruang" id="id_ruang" class="form-control select2bs4" required  >
                    <option  value="1">-Default-</option>
                    <?php 
            
            foreach ($ruang as $k) {
              ?>
            <option value="<?= $k->id_ruang?>"> <?= $k->nama_ruangan?> </option>   
           <?php }?>           
           </select>
      
        </div>
       
        
        <div id="ss">
        <button type="submit"  id="submit_add" class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Simpan</button>

        </div>
   <!-- <a class="btn btn-primary btn-sm"> <i class="fa fa-user"></i> Set Pelanggan</a> -->


</form>
  
  </div>
</div>


        
 
<script src="<?php echo base_url('assets/template/') ?>plugins/select2/js/select2.full.min.js"></script>
 
       
<script>

  function cek_qty() {
stok = parseInt($('#sisa_stok').val());
qty = parseInt($('#qty').val());
$('#notif').html(''); 
$('#ss').hide();
// console.log(stok);
// console.log(qty);
if(qty < stok){
  $('#ss').show();
  $('#notif').html('');
  // console.log('Lanjut Dong');

}else{
  $('#ss').hide();
  $('#notif').html('Stok Tidak Cukup');
  // console.log('Ga Bisa DOng');
 
}
  }

$('#id_barang_faktur').on('change', function()
{
    id_barang_faktur = this.value; 

    // console.log(id_barang_faktur);
    $.ajax({
          url: "<?= base_url('transaksi_faktur/cek_stok')?>",
             type: 'POST',
             data: {id_barang_faktur : id_barang_faktur},             
             success: function(data) {    
              var obj =JSON.parse(JSON.stringify(data));

              $('#sisa_stok').val(obj.data);
              // console.log(obj.data);
             }
         });

         


});


 //Initialize Select2 Elements
 $('.select2').select2();


//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
})


  $("#form_add").submit(function(e) {
    
           e.preventDefault();

           kode_transaksi=$('#kode_transaksi').val();
         $.ajax({
          url: "<?= base_url('transaksi_faktur/add_p')?>",
             type: 'POST',
             data: $(this).serialize(),             
             success: function(data) {   
              
              // console.log(data);
          var obj =JSON.parse(JSON.stringify(data));
           if(obj.respone != 201){
            Swal.fire({
              icon: 'success',
              title: 'yeah!',
              text: obj.data,

              })

              // $("#form_add")[0].reset();
              $('#sisa_stok').value ='0';
              $('#qty')..value = '0';
              content(kode_transaksi);

              // console.log(kode_transaksi);
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
      
     
     
      