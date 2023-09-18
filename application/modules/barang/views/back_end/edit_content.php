  <!-- Select2 -->
  
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  

  
  
          <a href="#" class="btn btn-sm btn-secondary" onclick="content();"> <i class="fa fa-arrow-left"></i> Kembali</a> <hr>
 
          <form id="form_add" method="POST" enctype="multipart/form-data">
     
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Kode ID Barang:</label>
            <input type="text" name="kode_id_barang" class="form-control" placeholder="Masukan Nama Ruang/OPD/Kantor" id="kode_id_barang" value="<?= $barang[0]->kode_id_barang;?>"   autocomplete="off"  readonly>
            <input type="hidden" name="id_barang" class="form-control" placeholder="Masukan Nama Ruang/OPD/Kantor" id="id_barang" value="<?= $barang[0]->id_barang;?>"   autocomplete="off"  readonly>
         
          </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Kode Barang:</label>
            <input type="text" name="kode_barang" value="<?= $barang[0]->kode_barang;?>" class="form-control" placeholder="Masukan Kode Barang" id="nip"   autocomplete="off" required >
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Kode Lokasi:</label>
            <input type="text" name="kode_lokasi" value="<?= $barang[0]->kode_lokasi;?>" class="form-control" value="<?= $barang[0]->kode_lokasi;?>" placeholder="Masukan Kode Lokasi" id="nip"   autocomplete="off" required >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Barang:</label>
            <input type="text" name="nama_barang" value="<?= $barang[0]->nama_barang;?>" class="form-control" placeholder="Masukan Nama Barang" id="nip"   autocomplete="off" required >
          </div>
          <div class="form-group">
            <label for="recipient-name"   class="col-form-label">Perolehan:</label>
            <select name="id_perolehan" class="form-control  select2bs4" required >
                    <option value="<?= $barang[0]->id_perolehan;?>" >-<?= $barang[0]->nama_perolehan;?>-</option>
                    <?php 
            
            foreach ($perolehan as $k) {
              ?>
            <option value="<?= $k->id_perolehan?>"> <?= $k->nama_perolehan?> </option>   
           <?php }?>           
           </select>
          </div>

          <div class="form-group">
            <label for="recipient-name"   class="col-form-label">Jenis:</label>
            <select name="id_jenis" class="form-control select2bs4" required >
                   
            <option value="<?= $barang[0]->id_jenis;?>" >-<?= $barang[0]->nama_jenis;?>-</option>
            
                    <?php 
            
            foreach ($jenis as $k) {
              ?>
            <option value="<?= $k->id_jenis?>"> <?= $k->nama_jenis?> </option>   
           <?php }?>           
           </select>
          </div>

          <div class="form-group">
            <label for="recipient-name"   class="col-form-label">Sumber Dana:</label>
            <select name="id_sumber_dana" class="form-control select2bs4" required >
            <option value="<?= $barang[0]->id_sumber_dana;?>" >-<?= $barang[0]->nama_sumber_dana;?>-</option>

                    <?php 
            
            foreach ($sumber_dana as $k) {
              ?>
            <option value="<?= $k->id_sumber_dana?>"> <?= $k->nama_sumber_dana?> | <?=  date('Y', strtotime($k->tahun));?></option>   
           <?php }?>           
           </select>
          </div>

          
          <div class="form-group">
            <label for="recipient-name"   class="col-form-label">Distributor:</label>
            <select name="id_distributor" class="form-control select2bs4" required  >
                   
            <option value="<?= $barang[0]->id_distributor;?>" >-<?= $barang[0]->nama_distributor;?>-</option>
            

                    <?php 
            
            foreach ($distributor as $k) {
              ?>
            <option value="<?= $k->id_distributor?>"> <?= $k->nama_distributor?> </option>   
           <?php }?>           
           </select>
          </div>


          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tahun Pembelian:</label>
            <input type="date"  value="<?= $barang[0]->tahun_pembelian?>" name="tahun_pembelian" class="form-control" placeholder="Tahun Pembelian" id="nip"   autocomplete="off" required >
          </div>


          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Harga Perolehan:</label>
            <input type="number" value="<?= $barang[0]->harga_perolehan?>" name="harga_perolehan" class="form-control" placeholder="Harga Pembelian" id="nip"   autocomplete="off" required >
          </div>



          

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Kondisi Barang:</label>
            <select name="kondisi_barang" class="form-control select2bs4" required >
                
            <option value="<?= $barang[0]->kondisi_barang;?>" >-<?= $barang[0]->kondisi_barang;?>-</option>
            
            
                    <option value ="B">B</option>      
                    <option value ="KB">KB</option>    
                    <option value ="RB">RB</option>  
           </select>
          </div>


          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Keterangan:</label>
          
            <textarea name="keterangan" id="keterangan">
            <?= $barang[0]->keterangan;?>
              </textarea>
       
          </div>

          <div class="form-group">
       
            <label for="recipient-name" class="col-form-label">Jumlah:</label>
            <input type="number" name="jumlah" value="<?= $barang[0]->jumlah;?>" class="form-control" placeholder="Jumlah Pembelian"  id="nip"   autocomplete="off" required >
             <input type="hidden" name="id_user" class="form-control" placeholder="Harga Pembelian" value="value="<?= $barang[0]->id_user;?>"" id="nip"   autocomplete="off" >
             <i class='text-danger'>*Disarankan Penginputan Per Item Karean Untuk Keperluan Maintenance,Cost,History Product.</i>
            </div>




            <div class="form-group">
            <label for="recipient-name"   class="col-form-label">Satuan:</label>
            <select name="id_satuan" class="form-control select2bs4" required  >
            <option value="<?= $barang[0]->id_satuan;?>" >-<?= $barang[0]->nama_satuan;?>-</option>

                    <?php 
            
            foreach ($satuan as $k) {
              ?>
            <option value="<?= $k->id_satuan?>"> <?= $k->nama_satuan?> </option>   
           <?php }?>           
           </select>
          </div>

                 <button type="submit"  id="submit_add" class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Simpan</button>


<script src="<?php echo base_url('assets/template/') ?>plugins/jquery/jquery.min.js"></script>
<script src="http://parsleyjs.org/dist/parsley.js"></script>
<script src="<?php echo base_url('assets/template/') ?>plugins/select2/js/select2.full.min.js"></script>


<script src="<?php echo base_url('assets/template/') ?>plugins/ckeditor/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url('assets/template/') ?>plugins/ckeditor/ckeditor/styles.js"></script>


          

<script>
  
CKEDITOR.replace( 'keterangan', {
     removePlugins : 'resize',
    entities : false
});


  //Initialize Select2 Elements
  $('.select2').select2();


//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
})


  $("#form_add").submit(function(e) {
    //add ckeditor spesial
        var ket = CKEDITOR.instances.keterangan.getData();
           e.preventDefault();
         $.ajax({
          url: "<?= base_url('barang/edit_p')?>",
             type: 'POST',
             data: $(this).serialize()+"&ket="+ket,           
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
      
     
     
      