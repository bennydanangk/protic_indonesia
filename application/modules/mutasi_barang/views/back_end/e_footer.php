<!-- Main Footer -->
<footer class="main-footer">
    <strong>Create By Benny Danang Kurniawan <a href="#">@ <?= date('Y');?></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>V.</b> <?= $conf[0]->version?>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/template/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/template/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url('assets/template/') ?>dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<!-- <script src="<?php echo base_url('assets/template/') ?>plugins/chart.js/Chart.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/template/') ?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url('assets/template/') ?>dist/js/pages/dashboard3.js"></script> -->

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
<!-- menu -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo base_url('assets/js/') ?>bootstrap_menu.js"></script>
<script src="<?php echo base_url('assets/template/') ?>plugins/select2/js/select2.full.min.js"></script>

<script>

select2add();
 function select2add() {
  $('.select2').select2();
    $('.select2bs4').select2({
          theme: 'bootstrap4'
        })
    $("#mutasi_barang").select2({
    dropdownParent: $("#modal_add")
  });
 }


  $(function () {
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
  });


  url = '<?php echo base_url('rest_api/set_menu/')?>';
  get_menu(url);
  // $('#modal_add').modal('show');

  // content();
  function content() {
    $('#content').load('<?= base_url("mutasi_barang/content")?>')
  }

  menu_bar();
  function menu_bar() {
    $('#content').load('<?= base_url("mutasi_barang/menu_bar")?>')
  }


  function data_sampah() {
    $('#content').load('<?= base_url("mutasi_barang/data_sampah")?>')
  }



  function add() {
    $('#content').load('<?= base_url("mutasi_barang/add")?>');
  }

  function open_mutasi(id) {
    $('#content').load('<?= base_url("mutasi_barang/mutasi/")?>'+id);

  }

  function mutasi_manual() {
    $('#content').load('<?= base_url("mutasi_barang/content_barang")?>');

  }

  function open_qr() {
    $('#content').load('<?= base_url("mutasi_barang/qr_code2")?>');

  }

  function open_report() {
    $('#content').load('<?= base_url("mutasi_barang/report")?>');

  }

  function hapus(id) {
    Swal.fire({
  title: 'Apakah Anda Yakin?',
  text: "Apakah Anda Akan Menghapus Data Ini!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {

    $.ajax({
    url: "<?= base_url('mutasi_barang/hapus')?>",
             type: 'POST',
             data: {id:id},            
             success: function(data) {  
              setTimeout(function() {
            content();
            }, 500);
             
          
             }
  });


    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
  }









$("#form_add").submit(function(e) {
         e.preventDefault();
         $.ajax({
          url: "<?= base_url('mutasi_barang/add')?>",
             type: 'POST',
             data: $(this).serialize(),             
             success: function(data) {    
			
				
			// console.log(data);
             }
         });
     });




     function restore(id) {
    Swal.fire({
  title: 'Apakah Anda Yakin?',
  text: "Apakah Anda Akan Merestore Data Ini!",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Restore it!'
}).then((result) => {
  if (result.isConfirmed) {

    $.ajax({
    url: "<?= base_url('mutasi_barang/restore')?>",
             type: 'POST',
             data: {id:id},            
             success: function(data) {  
              setTimeout(function() {
            content();
            }, 500);
             
            //console.log(data);
            // $('#password').val(data);
            
             }
  });


    Swal.fire(
      'Restore!',
      'Your file has been Restore.',
      'success'
    )
  }
})
  }

function get_barang(qr) {

  $.ajax({
    url: "<?= base_url('mutasi_barang/barang_qr')?>",
             type: 'POST',
             data: {qr:qr},            
             success: function(data) {  
            
              let obj = JSON.parse(data); 
            // console.log(obj);
            s =obj['status']; 

            open_mutasi(s);
           
            
             }
  });


  
}

function open_berita(id) {

window.open("<?= base_url('mutasi_barang/berita_acara/')?>"+id,"Ratting","width=600,height=500,left=150,top=200,toolbar=0,status=0,");


// $('#content').load('<?= base_url("barang/cetak_label/")?>'+id);
}

</script>

</body>
</html>
