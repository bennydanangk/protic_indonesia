<link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">          
   
  <div class="card">
  <div class="card-body">
   
  <a  class="btn btn-sm btn-primary" onclick="add();"> <i class="fa fa-plus"></i> Tambah</a> 
  <a  class="btn btn-sm btn-secondary" onclick="data_sampah();"> <i class="fa fa-trash"></i> Data Sampah</a> <hr>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NIP</th>
                    <th>Nama Pengguna</th>
                    <th>Username</th>
                    <th>Lokasi Ruangan</th>
                    <th>Tools</th>
                      
                  </tr>
                  </thead>
                <tbody>
                  <?php foreach ($data as $k) {
                  ?>
                 
                  <tr>
                      <td><?= $k->nip ?></td>
                    <td><?= $k->nama_pengguna?></td>
                    <td><?= $k->username ?></td>
                    <td><?= $k->nama_ruangan?></td>
                    <td>
                    <a  class="btn btn-sm btn-success"  onclick='open_state("<?= $k->id_user; ?>");'> <i class="fa fa-user"></i></a>
                    <a  class="btn btn-sm btn-warning"  onclick='open_edit("<?= $k->id_user; ?>");'> <i class="fa fa-edit"></i></a>
                    <a  class="btn btn-sm btn-danger"  onclick='hapus("<?= $k->id_user; ?>");'> <i class="fa fa-ban"></i></a>

                    </td>

                  </tr>

                  <?php
                  } ?>
                </tbody>
                  <tfoot>
                  <tr>
                  <th>NIP</th>
                    <th>Nama Pengguna</th>
                    <th>Username</th> 
                    <th>Lokasi Ruangan</th>
                    <th>Tools</th>
                  </tr>
                  </tfoot>
                </table>

                
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



      </script>