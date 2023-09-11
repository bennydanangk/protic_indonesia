<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0"><?=  "Selamat Datang, ".$nama_user; ?></h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $nama_menu; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data <?= $nama_menu; ?> </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
      <div id="content"></div>          
 
 
 
    </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
 
<!-- ============ MODAL ADD  =============== -->
<!-- Modal -->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="row">
      <div class="col-md-6 ml-auto">
        <form id="form_add" method="POST">
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Pengguna:</label>
            <input type="text" name="nama_pengguna" class="form-control" id="nama_pengguna"  placeholder="Masukan Nama Anda!"  autocomplete="off" require>
            <input type="hidden" name="x_token"  value="<?= $x_token;?>"class="form-control" id="x_token"  placeholder="Masukan Nama Anda!"  autocomplete="off" require>
          </div>

          
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">NIP:</label>
            <input type="text" name="nip" class="form-control" placeholder="Masukan NIP!" id="nip"  autocomplete="off" require>
          </div>
          
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" name="username" class="form-control" placeholder="Masukan Username!" id="userame"  autocomplete="off" require>
          </div>
          
    </div>
      <div class="col-md-6 ml-auto">
        
      
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" name="password" class="form-control"placeholder="Masukan Password"  id="password"  autocomplete="off" require>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Jabatan:</label>
            <input type="text" class="form-control" name="jabatan" placeholder="Masukan Jabatan" id="jabatan"  autocomplete="off" require>
          </div>

          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Ruang</label>
             
      

                  <select name="ruang" class="form-control select2"  id="ruang" ><option value="0"> -Kosong- </option><option value="1">Sekertariat</option><option value="2">PIAK</option><option value="3">Dafduk</option><option value="4">Produksi</option></select>
                   </div>


    </div>
    </div>

       

      </div>
      
      

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit"  id="submit_add" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
 
        <!--END MODAL ADD END-->
 


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->