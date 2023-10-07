<link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">          
   
  <div class="card">
  <div class="card-body">
   
  <!-- <a  class="btn btn-sm btn-primary" onclick="add();"> <i class="fa fa-plus"></i> Tambah</a> 
  <a  class="btn btn-sm btn-secondary" onclick="data_sampah();"> <i class="fa fa-trash"></i> Data Sampah</a> <hr> -->
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tgl Faktur</th>
                    <th>Tgl Input</th>
                    <th>Nomor Faktur</th>
                    <th>Distributor</th>
                    <th>Sumber Dana</th>
                    <th>Item</th>
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
                      <td><?= $k->tgl_faktur?></td>
                      <td><?= $k->tgl_input?></td>
                      <td><?= $k->nomor_faktur?></td>
                      <td><?= $k->nama_distributor?></td>
                      <td><?= $k->nama_sumber_dana?></td>
                      <td> 
                      <!-- <i id="count_<?= $k->id_faktur?>"></i> -->
                      <a  class="btn btn-sm btn-info"  data-toggle="tooltip" data-placement="right" onclick='open_modal_faktur("<?= $k->id_faktur; ?>");'>Item <span class="badge badge-light">   <i id="count_<?= $k->id_faktur?>"></i></span>
                         <script>
                       $.ajax({
    url: "<?= base_url('faktur/count_item_faktur/'.$k->id_faktur)?>",
    type: 'GET',
    success: function(res) {
        // console.log(res.data);
        $('#count_<?= $k->id_faktur?>').html(res.data);
    }
});
                     
                      </script>
                  
 </a>    
                      <!-- <span class="badge badge-success"><?= $k->nama_pengguna?></span> </td> -->
                   
                          
                      <td>

                    <a  class="btn btn-sm btn-warning"  onclick='open_edit("<?= $k->id_faktur; ?>");'> edit <i class="fa fa-edit"></i></a>
                    <a  class="btn btn-sm btn-danger"  onclick='hapus("<?= $k->id_faktur; ?>");'> hapus <i class="fa fa-ban"></i></a>

                    </td>

                  </tr>

                  <?php
                  } ?>
                </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th>
                    <th>Tgl Faktur</th>
                    <th>Tgl Input</th>
                    <th>Nomor Faktur</th>
                    <th>Distributor</th>
                    <th>Sumber Dana</th>
                    <th>Item</th>
                     <th>Tools</th>
                  </tr>
                  </tfoot>
                </table>

                
              </div>
              <!-- /.card-body -->



  </div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
 <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>  -->
<!-- <script src="<?php echo base_url('assets/template/') ?>plugins/jquery/jquery.min.js"></script> -->
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

    //  $('#faktur_modal').modal('show');

    function open_modal_faktur(id) {
    window.$('#faktur_modal').modal('show');
    // $('#add_item').load('');
    $('#add_item').load('<?= base_url("faktur/add_item/")?>'+id);
      $('#tabel_item_faktur').load('<?= base_url("faktur/content_item/")?>'+id);


  }


      </script>