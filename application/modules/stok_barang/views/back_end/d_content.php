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
                  <h3 class="card-title"><?= $nama_menu; ?></h3>
                 
                </div>
              </div>
              <div class="card-body">
             
              <div class="position-relative mb-4">

<form class="form-inline">
<div class="form-group mb-2">
<!-- <label for="staticEmail2" class="sr-only">Email</label> -->
<input id='tgl_awal' class="form-control form-control-sm" type="date" placeholder=".form-control-sm" aria-label=".form-control-sm example">

</div>
<div class="form-group mx-sm-3 mb-2">
<!-- <label for="inputPassword2" class="sr-only">Password</label> -->
<input id='tgl_akhir' class="form-control form-control-sm" type="date" placeholder=".form-control-sm" aria-label=".form-control-sm example">

</div>


<div class="form-check mb-2 mr-sm-2">


</div>


<a  onclick="content_transaksi();" class="btn btn-danger  btn-sm mb-2"> <i class="fa fa-search"></i> Cari Transaksi BHP</a> &nbsp;
<a  class="btn btn-sm btn-primary mb-2" onclick="content();"> <i class="fa fa-fire"></i> Data Stok</a>  &nbsp;
<!-- <a  class="btn btn-sm btn-danger mb-2" onclick="data_sampah();"> <i class="fa fa-trash"></i>Sampah</a>  -->
&nbsp;
<!-- <a  class="btn btn-sm btn-warning mb-2" onclick="data_item_sampah();"> <i class="fa fa-ban"></i>Sampah Item</a>  -->
&nbsp;
<!-- <a  class="btn btn-sm btn-success mb-2" onclick="reload();"> <i class="fa fa-spin fa-cog"></i>Refresh</a>  -->

<hr> 


                <!-- <div class="position-relative mb-4"> -->
           
                <div id="content"></div>   

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