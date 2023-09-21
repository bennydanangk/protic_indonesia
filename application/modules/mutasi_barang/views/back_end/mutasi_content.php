<script src="http://parsleyjs.org/dist/parsley.js"></script>

          <a href="#" class="btn btn-sm btn-secondary" onclick="mutasi_manual();"> <i class="fa fa-arrow-left"></i> Kembali</a> <hr>
 
          <form id="form_add" method="POST">
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Kode Barang:</label>
            <input type="text" name="kode_barang" value="<?= $barang[0]->kode_barang;?>" class="form-control" id="nama_pengguna"    placeholder="Masukan Nama Anda!"  autocomplete="off" readonly>
            <input type="hidden" name="id_barang" value="<?= $barang[0]->id_barang;?>" class="form-control" id="id"    placeholder="Masukan Nama Anda!"  autocomplete="off" required>

          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Kode Lokasi:</label>
            <input type="text" name="kode_lokasi" value="<?= $barang[0]->kode_lokasi;?>" class="form-control" id="nama_pengguna"    placeholder="Masukan Nama Anda!"  autocomplete="off" readonly>
          
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Barang:</label>
            <input type="text" name="nama_barang" value="<?= $barang[0]->nama_barang;?>" class="form-control" id="nama_pengguna"    placeholder="Masukan Nama Anda!"  autocomplete="off" readonly>
          
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tahun Pembelian Barang:</label>
            <input type="text" name="tahun_pembelian" value="<?= $barang[0]->tahun_pembelian;?>" class="form-control" id="nama_pengguna"    placeholder="Masukan Nama Anda!"  autocomplete="off" readonly>
          
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Posisi Barang Sebelumnya:</label>
            <input type="hidden" name="id_ruang_sebelum" value="<?= $id_ruang_sebelum;?>" class="form-control" id="nama_pengguna"    placeholder="Masukan Nama Anda!"  autocomplete="off" readonly>
            <input type="text" name="nama_ruang_sebelum" value="<?= $nama_ruang_sebelum;?>" class="form-control" id="nama_pengguna"    placeholder="Masukan Nama Anda!"  autocomplete="off" readonly>
          
          </div>
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Info:</label>
          <br> Kondisi: 
            <?php $kondisi =$barang[0]->kondisi_barang;
                      if($kondisi == 'B'){
                        echo '<span class="badge badge-pill badge-success">'.$kondisi.'</span>';
                      } else if($kondisi == 'KB'){
                        echo '<span class="badge badge-pill badge-warning">'.$kondisi.'</span>';
                      } else{
                        echo '<span class="badge badge-pill badge-danger">'.$kondisi.'</span>';

                      }

                
                      ?>  Create By:
      <span class="badge badge-dark"><?= $barang[0]->nama_pengguna ?></span> input date:
      <span class="badge badge-info"><?= $barang[0]->tgl_input ?></span>
          </div>
          
          <div class="form-group">
            <label for="recipient-name"   class="col-form-label">Penanggung Jawab:</label>
            <select name="id_user_mutasi" class="form-control select2bs4" required  >
                    <option  value="">-Kosong-</option>
                    <?php 
            
            foreach ($user as $k) {
              ?>
            <option value="<?= $k->id_user?>"> <?= $k->nama_pengguna?> </option>   
           <?php }?>           
           </select>
          </div>


           
          <div class="form-group">
            <label for="recipient-name"   class="col-form-label">Ruang Mutasi:</label>
            <select name="id_ruang" class="form-control select2bs4" required  >
                    <option  value="">-Kosong-</option>
                    <?php 
            
            foreach ($ruang as $k) {
              ?>
            <option value="<?= $k->id_ruang?>"> <?= $k->nama_ruangan?> </option>   
           <?php }?>           
           </select>
          </div>


          <div class="form-group">
            <label for="recipient-name"   class="col-form-label">Status Barang:</label>
            <select name="id_status_barang" class="form-control select2bs4" required  >
                    <option  value="">-Kosong-</option>
                    <?php 
            
            foreach ($status_barang as $k) {
              ?>
            <option value="<?= $k->id_status_barang?>"> <?= $k->nama_status_barang?> </option>   
           <?php }?>           
           </select>
          </div>


          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Keterangan:</label>
            <input type="text" name="keterangan"  class="form-control" id="nama_pengguna"    placeholder="Masukan Keterangan!"  autocomplete="off">
          
          </div>



                   </div>
                   <button type="submit"  id="submit_add" class="btn btn-danger btn-sm"> <i class="fa fa-paper-plane"></i> Mutasi Barang</button>

   

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
          url: "<?= base_url('mutasi_barang/add_p')?>",
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
              mutasi_manual();
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
      
     
     
      