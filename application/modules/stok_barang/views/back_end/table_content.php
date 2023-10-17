<link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">          
   
  <div class="card">
  <div class="card-body">
   
  <!-- <a  class="btn btn-sm btn-primary" onclick="add();"> <i class="fa fa-plus"></i> Tambah</a>  -->
  <!-- <a  class="btn btn-sm btn-secondary" onclick="data_sampah();"> <i class="fa fa-trash"></i> Data Sampah</a> <hr> -->
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kode PLU</th>
                    <th>Sisa Stok</th>
                    <th>Barang Keluar</th>
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
                      <td><?= $k->kode_barang?></td>
                      <td><?= $k->kode_plu?></td>
                      <td><?= $k->nama_barang_faktur?></td>
                      <td>
                  
                      <i id='barang_<?= $k->id_barang_faktur ?>'> </i> 
                        <script>
                          id =<?= $k->id_barang_faktur ?>;
                          id_up ='barang_<?= $k->id_barang_faktur ?>';
                          get_stok(id,id_up);
                        </script>
                    </td>
                      <td>

                      <i id='barang_keluar<?= $k->id_barang_faktur ?>'> </i> 
                        <script>
                          id =<?= $k->id_barang_faktur ?>;
                          id_up ='barang_keluar<?= $k->id_barang_faktur ?>';
                          get_stok_keluar(id,id_up);
                        </script>


                      </td>

                    <td>

                    <a  class="btn btn-sm btn-success"  onclick='open_edit("<?= $k->id_stok_barang; ?>");'> Detail <i class="fa fa-eye"></i></a>
                    
                    </td>

                  </tr>

                  <?php
                  } ?>
                </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kode PLU</th>
                    <th>Sisa Stok</th>
                    <th>Barang Keluar</th>
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

// get_stok(1);

  //   function get_stok(id) {
      
  //     $.ajax({
  //   url: "<?= base_url('transaksi_faktur/cek_stok')?>",
  //            type: 'POST',
  //            data: {id_barang_faktur:id},            
  //            success: function(data) {  
  //           console.log(data);      
          
  //            }
  // });


  //   }

      </script>