  <!-- Select2 -->
  
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/') ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  

  <div class="card  mb-3" >
  <div class="card-header text-white  bg-primary">
    Kode ID : <?= $barang[0]->kode_id_barang;?>
  </div>
  <div class="card-body">
    <h5 class="card-title">Detail Item</h5>
    <p class="card-text">
      
    <div class="row">
    <div class="col-sm">
    <b>Nama Barang:</b>
    <br><i> <?= $barang[0]->nama_barang;?> </i>  <br>
    <b>Kode Barang:</b>
    <br><i> <?= $barang[0]->kode_barang;?> </i> <br>
    <b>Kode Lokasi:</b>
    <br><i> <?= $barang[0]->kode_lokasi;?> </i> <br>
    <b>Tahun Pembelian:</b>
    <br><i> <?php echo  date('Y', strtotime($barang[0]->tahun_pembelian));?> </i>

    </div>
    <div class="col-sm">
    <b>Jenis Barang:</b>
    <br><i> <?= $barang[0]->nama_jenis;?> </i>  <br>
    <b>Jumlah Barang:</b>
    <br><i> <?= $barang[0]->jumlah;?> <?= $barang[0]->nama_satuan;?></i> <br>
    <b>Harga Perolehan:</b>
    <br><i> <?= $barang[0]->harga_perolehan;?> </i> <br>
    <b>Kondisi Barang:</b>
    <br><i><?= $barang[0]->kondisi_barang;?>  </i>

    </div>
    <div class="col-sm">
    <b>Sumber Dana:</b>
    <br><i> <?= $barang[0]->nama_sumber_dana;?> </i>  <br>
    <b>Jenis Perolehan:</b>
    <br><i> <?= $barang[0]->nama_perolehan;?></i> <br>
    <b>Tahun Anggaran:</b>
    <br><i><i> <?php echo  date('Y', strtotime($barang[0]->tahun));?> </i> <br>
    <b>Distributor:</b>
    <br><i><?= $barang[0]->nama_distributor;?>  </i>
    </div>
  </div>


    </p>

    <div class="card">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#">Keterangan</a>
      </li>
     
    </ul>
  </div>
  <div class="card-body">


    <?= $barang[0]->keterangan;?>
     <a onclick="content();" class="btn btn-secondary"> <i class="fa fa-arrow-left"></i> Kembali</a>
  </div>
</div>
    
  </div>
</div>


  <div class="container">
 
</div>


<script src="<?php echo base_url('assets/template/') ?>plugins/jquery/jquery.min.js"></script>
<script src="http://parsleyjs.org/dist/parsley.js"></script>

          

<script>
  

</script>
      
     
     
      