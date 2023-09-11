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
            <a href="#" class="btn btn-sm btn-primary" onclick="add('<?= $x_token; ?>');"> <i class="fa fa-plus"></i> Tambah</a> <hr>
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
                    <a href="#" class="btn btn-sm btn-warning"  onclick='open_edit("<?= $x_token?>","<?= $k->id_ruang; ?>");'> <i class="fa fa-edit"></i></a>
                    <a href="#" class="btn btn-sm btn-danger"  onclick='open_hapus("<?= $x_token?>","<?= $k->id_ruang; ?>");'> <i class="fa fa-trash"></i></a>

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
        
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Pengguna:</label>
            <input type="text" class="form-control" id="nama_pengguna" require>
          </div>

          
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">NIP:</label>
            <input type="text" class="form-control" id="nip" require>
          </div>
          
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" class="form-control" id="userame" require>
          </div>
          
    </div>
      <div class="col-md-6 ml-auto">
        
      
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" class="form-control" id="password" require>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Jabatan:</label>
            <input type="text" class="form-control" id="jabatan" require>
          </div>

          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Ruang</label>
                  <select class="form-control select2" id="ruang" >
                    <i id=''></i>
                    <!-- <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option> -->
                  </select>
          </div>


    </div>
    </div>

       

      </div>
      
      

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
 
        <!--END MODAL ADD END-->
 


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->