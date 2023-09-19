<link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">          
   
  <div class="card">
  <div class="card-body">
   
  <a  class="btn btn-sm btn-secondary" onclick="content();"> <i class="fa fa-arrow-left"></i> Kembali</a> <hr>
  <div class="content">
    

<div class="form-group">
    <label for="exampleFormControlInput1">Nama User</label>
    <input type="text" name="nama_pengguna" class="form-control" value = '<?= $user[0]->nama_pengguna;?>' readonly>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Username</label>
    <input type="text" name="nama_pengguna" class="form-control" value = '<?= $user[0]->username;?>' readonly>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Jabatan</label>
    <input type="text" name="nama_pengguna" class="form-control" value = '<?= $user[0]->jabatan;?>' readonly>

    <p class="text-danger">Perhatian! <br> Apabila Ingin Mengaktifkan menu Child "Anak" Maka Aktifkan Menu Parent "Orang Tua" Dahulu!</p>
</div>

  </div>
  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Role/Aturan</th>
                   
                      
                  </tr>
                  </thead>
                <tbody>
                  <?php 
                
               $i=1; foreach ($role_user as $k) {
                   
                  ?>
                 
                  <tr>
                      <td><?= $i; ?></td>
                    <td><?= $k['nama_menu'];?> 
                    <?php 
                    if($k['hirarce']=='parent'){
echo '<span class="badge badge-warning">Parent</span>';
                    }else{
 echo '<span class="badge badge-success">Child</span>';
                    }
                    ?>
                  
                  
                  </td>
                    <td>
                     
                    <?php
                    if($k['state'] != 'aktif'){
                      ?>
                
                      <a onclick="p_state('<?= $user[0]->id_user;?>',<?= $k['id_menu'];?>,'aktif')"; class="btn btn-danger btn-sm" > <i class="fa fa-ban"></i> tidak</a>
                      <?php
                    }else{
                     ?>

             
                      <a onclick="p_state('<?= $user[0]->id_user;?>',<?= $k['id_menu'];?>,'tidak')"; class="btn btn-success btn-sm" > <i class="fa fa-check"></i> aktif</a>
                      
                     <?php
                    }
                    ?>
                    
                    </td>
                   

                  </tr>

                  <?php $i++;
                  } ?>
                </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th>
                    <th>Nama Menu</th>
                    <th>Role/Aturan</th>
                   
                  </tr>
                  </tfoot>
                </table>

                <button type="submit"  id="submit_add" class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Ubah Data</button>

        
          
                
              </div>
              <!-- /.card-body -->



  </div>
</div>
          
     
<script src="<?php echo base_url('assets/template/') ?>plugins/jquery/jquery.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets/template/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/template/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/template/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/template/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/template/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets/template/') ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/template/') ?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url('assets/template/') ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url('assets/template/') ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url('assets/template/') ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets/template/') ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets/template/') ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
      <script>

$("#example1").DataTable({
       "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

function p_state(id_user,id_menu,state) {

  $.ajax({
          url: "<?= base_url('pengguna/p_role')?>",
             type: 'POST',
             data: {id_user:id_user, id_menu:id_menu, state:state},            
             success: function(data) {    
                setTimeout(function(){
                  }, 500); 
                  open_state(id_user)

                  }
         });

  
}


      </script>