<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="#"><img src="<?= base_url('assets/limitless/');?>assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

			</ul>

			
			<!-- <span class="navbar-text" id='status_aplikasi'></span> -->
			<a id='status_aplikasi'></a>
			<!-- <p class="navbar-text"><span class="label bg-success-400">Online</span></p> -->
            <!-- <p class="navbar-text"><span class="label bg-danger-400">Ofline</span></p> -->
			<ul class="nav navbar-nav navbar-right">
			

	

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?= base_url('assets/limitless/');?>assets/images/placeholder.jpg" alt="">
						<span><?= $nama_user;?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?= base_url('profile/index')?>"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="<?= base_url('auth/logout')?>"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="<?= base_url('assets/limitless/');?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?= $nama_user;?></span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Indonesia
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
					
						
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="active"><a href="<?= base_url('user')?>"><i class="icon-home4"></i> <span><?= $nama_menu?></span></a></li>
								
                                
                            								

								<div id='menu_output'></div>
								<?= $menu?>
						
                              

								<!-- <li><a href="#"><i class	="icon-cube3"></i> <span>Adminstrator</span></a><ul><li><a href="user">User</a></li><li><a href="setting">Setting</a></li></ul></li><li><a href="#"><i class="icon-box-add"></i> <span>Master Barang</span></a><ul><li><a href="jenis">jenis</a></li><li><a href="satuan">satuan</a></li><li><a href="kategori">kategori</a></li><li><a href="distributor">distributor</a></li><li><a href="customer">customer</a></li><li><a href="data_barang">data barang</a></li></ul></li><li><a href="#"><i class="icon-stack2"></i> <span>Transaksi faktur</span></a><ul><li><a href="faktur">Faktur</a></li><li><a href="item_faktur">Item faktur</a></li><li><a href="laporan_faktur">Laporan faktur</a></li></ul></li><li><a href="#"><i class="icon-store2"></i> <span>Penjualan</span></a><ul><li><a href="surat_penawaran_harga">Surat Penawaran Harga</a></li><li><a href="sales_order">Sales order</a></li><li><a href="konfirmasi_order">Konfirmasi Order</a></li><li><a href="permintaan_barang">Permintaan Barang</a></li><li><a href="tagihan">Tagihan / invocie</a></li><li><a href="kwitansi">Kwintasi</a></li><li><a href="permohonan_pembayaran">Permohonan Pembayaran</a></li><li><a href="pembayaran">Pembayaran</a></li></ul></li><li><a href="#"><i class="icon-cart-add"></i> <span>Pembelian</span></a><ul><li><a href="permohonan_informasi_harga">Permohonan Informasi Harga</a></li><li><a href="request_order">Request Order</a></li><li><a href="penerimaan_barang">Penerimaan Barang</a></li><li><a href="request_payment">Request Payment</a></li></ul></li><li><a href="#"><i class="icon-truck"></i> <span>Sales & Marketing</span></a><ul><li><a href="pengajuan_diskon">Pengajuan Diskon</a></li></ul></li><li><a href="#"><i class="icon-user"></i> <span>SDM</span></a><ul><li><a href="data_pegawai">Data Pegawai</a></li><li><a href="pengajuan_cuti">Pengajuan Cuti</a></li></ul></li><li><a href="#"><i class="icon-price-tags2"></i> <span>Keuangan</span></a><ul><li><a href="laba">Laba</a></li><li><a href="piutang">Piutang</a></li><li><a href="realisasi_pengadaan">Realisasi Pengadaan</a></li><li><a href="sudah_lunas">Sudah Lunas</a></li><li><a href="belum_lunas">Belum Lunas</a></li></ul></li> -->


							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - <?= $nama_menu?></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="#"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><?= $nama_menu?></li>
						</ul>

						<ul class="breadcrumb-elements">
							
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

		<div id="main_app" >



			<!-- Pagination types -->
					<div class="panel panel-flat">
						<div class="panel-heading">
						<a href="" class="btn btn-sm btn-primary"> <span class="icon-plus3"></span> Tambah</a>
						<a href="" class="btn btn-sm btn-success"> <span class="icon-cog"></span> Reload</a>

							<!-- <h5 class="panel-title"><a href="" class="btn btn-sm btn-primary"> <span class="icon-plus3"></span> Tambah</a></h5> -->
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
						<div id="tabel_content">
						</div>

					
					
					

</div>



						
					</div>
					<!-- /pagination types -->
					
		</div>

					<!-- Footer -->
					<div class="footer text-muted">
						&copy; <?= date('Y')?>. <a href="#"><?= $nama_aplikasi?></a> by <a href="" target="_blank">B & S</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
