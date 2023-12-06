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

			<p class="navbar-text"><span class="label bg-success-400">Online</span></p>
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
								<li class="active"><a href="<?= base_url('dashboard')?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								
                                
                                <li>
									<a href="#"><i class="icon-stack2"></i> <span>Page layouts</span></a>
									<ul>
										<li><a href="layout_navbar_fixed.html">Fixed navbar</a></li>
										<li><a href="layout_navbar_sidebar_fixed.html">Fixed navbar &amp; sidebar</a></li>
										<li><a href="layout_sidebar_fixed_native.html">Fixed sidebar native scroll</a></li>
									
									</ul>
								</li>
							

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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active">Dashboard</li>
						</ul>

						<ul class="breadcrumb-elements">
							
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

				


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
