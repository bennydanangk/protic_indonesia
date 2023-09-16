<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=  "Selamat Datang, ".$nama_user; ?></h1>
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
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title"><?= $nama_menu; ?> </h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
              
                <div class="position-relative mb-4">
                  
                <form id="setting" method="POST">
                <div class="form-group">
                <label>Nama Aplikasi</label>
                  <input type="text" name="nama_aplikasi" class="form-control"  placeholder="Nama Aplikasi" value="<?php echo $data[0]->nama_aplikasi?>" readonly>
                  <input type="text" name="x_token" class="form-control"  placeholder="Nama Aplikasi" value="<?php echo $x_token?>" hidden>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                <label>Nama Aplikasi</label>
                  <input type="text" name="nama_instansi" class="form-control"  placeholder="Nama Instansi" value="<?php echo $data[0]->nama_instansi?>" require>
                 
                </div>

                <div class="form-group">
                <label>No Telp/ Faks</label>
                  <input type="text" name="no_telp" class="form-control"  placeholder="Mac Register" value="<?php echo $data[0]->no_telp?>" require>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
           
                <div class="form-group">
                  <label>Alamat Instansi</label>
                  <input type="text" class="form-control"  name="alamat" placeholder="Alamat Instansi" value="<?php echo $data[0]->alamat_instansi?>" require>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                <label>Email Instansi</label>
                  <input type="text" class="form-control" name="email"  placeholder="Email email" value="<?php echo $data[0]->email_instansi?>" require>
                </div>

                <div class="form-group">
                <label>Mac Register</label>
                  <input type="text" class="form-control"  placeholder="Mac Register" value="<?php echo $data[0]->mac_register?>" readonly>
                </div>
             
  
                <div class="form-group">

                        <button type="submit" class="btn btn-primary btn-block"> <i class="fa fa-save"></i> Simpan</button>
                      
                      
                        <br><br><br>
                        <i>Silahkan Klik Download Database Backup Secara Berkala simpan di tempat Terpisah di USB/HARDSIK/SSD/Nvme Stick, Terimakasih</i>
                        <a class="btn btn-danger btn-block" href="<?= base_url('Rest_api/backup_db')?>" > <i class="fa fa-database"></i> Backup Database</a>
                      
               

                <!-- /.form-group -->
            
              <!-- /.col -->
              
              </form>


                </div>

                <div class="d-flex flex-row justify-content-end">
                 
                </div>
              </div>
            </div>
            <!-- /.card -->

      
          </div>
       
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->