<link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">          
   
  <div class="card">
  <div class="card-body">
   
  <a href="#" class="btn btn-sm btn-secondary" onclick="content();"> <i class="fa fa-arrow-left"></i> Kembali</a> <hr>
             
  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ID barang</th>
                    <th>Kode barang | Kode Lokasi</th>
                    <th>Nama Barang</th>
                    <th>Jenis </th>
                    <th>Jumlah </th>
                    <th>Kondisi</th>
                     <th>Tools</th>
                      
                  </tr>
                  </thead>
                <tbody>
                  <?php
                  $i =0;
                  foreach ($data as $k) {
                    $i++;
                  ?>
                 
                  <tr>
                      <td><?= $i; ?></td>
                      <td><?= $k->kode_id_barang?></td>
                      <td><?= $k->kode_barang?> | <?= $k->kode_lokasi?></td>
                      <td><?= $k->nama_barang?></td>
                      <td><?= $k->nama_jenis?></td>
                      <td><?= $k->jumlah?> <?= $k->nama_satuan?></td>
                      <td><?php $kondisi =$k->kondisi_barang;
                      if($kondisi == 'B'){
                        echo '<span class="badge badge-pill badge-success">'.$kondisi.'</span>';
                      } else if($kondisi == 'KB'){
                        echo '<span class="badge badge-pill badge-warning">'.$kondisi.'</span>';
                      } else{
                        echo '<span class="badge badge-pill badge-danger">'.$kondisi.'</span>';

                      }
                      ?></td>
                      <td>
                      <a class="btn btn-sm btn-primary"  onclick='restore("<?= $k->id_barang; ?>");'> <i class="fa fa-spin fa-cog"></i> Restore</a>
                                    </td>

                  </tr>

                  <?php
                  } ?>
                </tbody>
                  <tfoot>
                  <tr>
                          <th>No</th>
                    <th>ID barang</th>
                    <th>Kode barang | Kode Lokasi</th>
                    <th>Nama Barang</th>
                    <th>Jenis </th>
                    <th>Jumlah </th>
                    <th>Kondisi</th>
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