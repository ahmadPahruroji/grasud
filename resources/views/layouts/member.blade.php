<!doctype html>
<html class="fixed">
<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<title>Member_E-Grasud</title>
	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="Porto Admin - Responsive HTML5 Template">
	{{-- <meta http-equiv="refresh" content="10"/> --}}
	<meta name="author" content="okler.net">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	{{-- <link rel="shortcut icon" href="{{ asset('Admin/assets/images/favicon.ico') }}"> --}}
	<!-- Vendor CSS -->
	<link rel="stylesheet" href="{{ asset('octopus/assets/vendor/bootstrap/css/bootstrap.css') }}" />
	<link rel="stylesheet" href="{{ asset('octopus/assets/vendor/font-awesome/css/font-awesome.css') }}" />
	<link rel="stylesheet" href="{{ asset('octopus/assets/vendor/magnific-popup/magnific-popup.css') }}" />
	<link rel="stylesheet" href="{{ asset('octopus/assets/vendor/bootstrap-datepicker/css/datepicker3.css') }}" />

	<!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="{{ asset('octopus/assets/vendor/select2/select2.css') }}" />
	<link rel="stylesheet" href="{{  asset('octopus/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css') }}" />
	{{--  --}}
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
	<link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">

	<!-- Theme CSS -->
	<link rel="stylesheet" href="{{ asset('octopus/assets/stylesheets/theme.css') }}" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="{{ asset('octopus/assets/stylesheets/skins/default.css') }}" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="{{ asset('octopus/assets/stylesheets/theme-custom.css') }}">

	<!-- Head Libs -->
	<script src="{{ asset('octopus/assets/vendor/modernizr/modernizr.js') }}"></script>

</head>
<body>
	<section class="body">

		<!-- start: header -->
		<header class="header">
			<div class="logo-container">
				<a href="{{ route('homemember') }}" class="logo">
					<img src="{{ asset('octopus/assets/images/lg.png') }}" height="35" alt="Porto Admin" />
				</a>
				<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
					<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
				</div>
			</div>
			
			<!-- start: search & user box -->
			<div class="header-right">

				{{-- <form action="pages-search-results.html" class="search nav-form">
					<div class="input-group input-search">
						<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form> --}}

				{{-- <span class="separator"></span> --}}

				{{-- <ul class="notifications"> --}}
					{{-- <li>
						<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
							<i class="fa fa-tasks"></i>
							<span class="badge">3</span>
						</a>

						<div class="dropdown-menu notification-menu large">
							<div class="notification-title">
								<span class="pull-right label label-default">3</span>
								Tasks
							</div>

							<div class="content">
								<ul>
									<li>
										<p class="clearfix mb-xs">
											<span class="message pull-left">Generating Sales Report</span>
											<span class="message pull-right text-dark">60%</span>
										</p>
										<div class="progress progress-xs light">
											<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
										</div>
									</li>

									<li>
										<p class="clearfix mb-xs">
											<span class="message pull-left">Importing Contacts</span>
											<span class="message pull-right text-dark">98%</span>
										</p>
										<div class="progress progress-xs light">
											<div class="progress-bar" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="width: 98%;"></div>
										</div>
									</li>

									<li>
										<p class="clearfix mb-xs">
											<span class="message pull-left">Uploading something big</span>
											<span class="message pull-right text-dark">33%</span>
										</p>
										<div class="progress progress-xs light mb-xs">
											<div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;"></div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</li> --}}
					{{-- <li>
						<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
							<i class="fa fa-envelope"></i>
							<span class="badge">4</span>
						</a>

						<div class="dropdown-menu notification-menu">
							<div class="notification-title">
								<span class="pull-right label label-default">230</span>
								Messages
							</div>

							<div class="content">
								<ul>
									<li>
										<a href="#" class="clearfix">
											<figure class="image">
												<img src="assets/images/!sample-user.jpg" alt="Joseph Doe Junior" class="img-circle" />
											</figure>
											<span class="title">Joseph Doe</span>
											<span class="message">Lorem ipsum dolor sit.</span>
										</a>
									</li>
									<li>
										<a href="#" class="clearfix">
											<figure class="image">
												<img src="assets/images/!sample-user.jpg" alt="Joseph Junior" class="img-circle" />
											</figure>
											<span class="title">Joseph Junior</span>
											<span class="message truncate">Truncated message. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam, nec venenatis risus. Vestibulum blandit faucibus est et malesuada. Sed interdum cursus dui nec venenatis. Pellentesque non nisi lobortis, rutrum eros ut, convallis nisi. Sed tellus turpis, dignissim sit amet tristique quis, pretium id est. Sed aliquam diam diam, sit amet faucibus tellus ultricies eu. Aliquam lacinia nibh a metus bibendum, eu commodo eros commodo. Sed commodo molestie elit, a molestie lacus porttitor id. Donec facilisis varius sapien, ac fringilla velit porttitor et. Nam tincidunt gravida dui, sed pharetra odio pharetra nec. Duis consectetur venenatis pharetra. Vestibulum egestas nisi quis elementum elementum.</span>
										</a>
									</li>
									<li>
										<a href="#" class="clearfix">
											<figure class="image">
												<img src="assets/images/!sample-user.jpg" alt="Joe Junior" class="img-circle" />
											</figure>
											<span class="title">Joe Junior</span>
											<span class="message">Lorem ipsum dolor sit.</span>
										</a>
									</li>
									<li>
										<a href="#" class="clearfix">
											<figure class="image">
												<img src="assets/images/!sample-user.jpg" alt="Joseph Junior" class="img-circle" />
											</figure>
											<span class="title">Joseph Junior</span>
											<span class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam.</span>
										</a>
									</li>
								</ul>

								<hr />

								<div class="text-right">
									<a href="#" class="view-more">View All</a>
								</div>
							</div>
						</div>
					</li> --}}
					{{-- <li>
						<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
							<i class="fa fa-bell"></i>
							<span class="badge">3</span>
						</a>

						<div class="dropdown-menu notification-menu">
							<div class="notification-title">
								<span class="pull-right label label-default">3</span>
								Alerts
							</div>

							<div class="content">
								<ul>
									<li>
										<a href="#" class="clearfix">
											<div class="image">
												<i class="fa fa-thumbs-down bg-danger"></i>
											</div>
											<span class="title">Server is Down!</span>
											<span class="message">Just now</span>
										</a>
									</li>
									<li>
										<a href="#" class="clearfix">
											<div class="image">
												<i class="fa fa-lock bg-warning"></i>
											</div>
											<span class="title">User Locked</span>
											<span class="message">15 minutes ago</span>
										</a>
									</li>
									<li>
										<a href="#" class="clearfix">
											<div class="image">
												<i class="fa fa-signal bg-success"></i>
											</div>
											<span class="title">Connection Restaured</span>
											<span class="message">10/10/2014</span>
										</a>
									</li>
								</ul>

								<hr />

								<div class="text-right">
									<a href="#" class="view-more">View All</a>
								</div>
							</div>
						</div>
					</li> --}}
				{{-- </ul> --}}

				<span class="separator"></span>

				<div id="userbox" class="userbox">
					<a href="#" data-toggle="dropdown">
						<figure class="profile-picture">
							<img src="{{ Auth::user()->image != null ?  asset('storage/'.Auth::user()->image) : asset('storage/user/sample.png') }}" alt="Joseph Doe" class="img-circle" data-lock-picture="{{ Auth::user()->image != null ?  asset('storage/'.Auth::user()->image) : asset('storage/user/sample.png') }}" />
						</figure>
						<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
							
							<span class="name">{{Auth::user()->name}}</span>
							<span class="role">{{Auth::user()->email}}</span>
						</div>

						<i class="fa custom-caret"></i>
					</a>

					<div class="dropdown-menu">
						<ul class="list-unstyled">
							<li class="divider"></li>
							<li>
								<a role="menuitem" tabindex="-1" href="{{ url('memberusers') }}"><i class="fa fa-user"></i> My Profile</a>
							</li>
							{{-- <li>
								<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
							</li> --}}
							<li>
								<a role="menuitem" tabindex="-1" href="#" onclick="logout()"><i class="fa fa-power-off"></i> Logout</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end: search & user box -->
		</header>
		<!-- end: header -->

		<div class="inner-wrapper" style="background-color: #d3d6cd">
			<!-- start: sidebar -->
			<aside id="sidebar-left" class="sidebar-left" style="background-color: #2d6ca2">
				
				<div class="sidebar-header" style="background-color: #2d6ca2">
					<div class="sidebar-title" style="color: white">
						Navigation
					</div>
					<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
				
				<div class="nano">
					<div class="nano-content">
						<nav id="menu" class="nav-main" role="navigation">
							<ul class="nav nav-main" >
								<li {{ Request::is('homemember') ? 'class=nav-active' : '' }} >
									<a href="{{ route('homemember') }}" style="color: white">
										<i class="fa fa-home" aria-hidden="true"></i>
										<span>Dashboard</span>
									</a>
								</li>
								{{-- <li>
									<a href="mailbox-folder.html">
										<span class="pull-right label label-primary">182</span>
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<span>Mailbox</span>
									</a>
								</li> --}}
								<li>
									<a href="{{ url('countributionusers') }}" style="color: white">
										{{-- <span class="pull-right label label-primary">182</span> --}}
										<i class="fa fa-list-alt" aria-hidden="true"></i>
										<span>Data Iuran</span>
									</a>
								</li>
								
								{{-- <li class="nav-parent">
									<a style="color: white">
										<i class="fa fa-users" aria-hidden="true"></i>
										<span>Data Warga</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="" style="color: white">
												Warga
											</a>
										</li>
										<li>
											<a href="" style="color: white">
												Petugas
											</a>
										</li> --}}
										{{-- <li>
											<a href="ui-elements-tabs.html">
												Tabs
											</a>
										</li>
										<li>
											<a href="ui-elements-panels.html">
												Panels
											</a>
										</li>
										<li>
											<a href="ui-elements-widgets.html">
												Widgets
											</a>
										</li>
										<li>
											<a href="ui-elements-portlets.html">
												Portlets
											</a>
										</li>
										<li>
											<a href="ui-elements-buttons.html">
												Buttons
											</a>
										</li>
										<li>
											<a href="ui-elements-alerts.html">
												Alerts
											</a>
										</li>
										<li>
											<a href="ui-elements-notifications.html">
												Notifications
											</a>
										</li>
										<li>
											<a href="ui-elements-modals.html">
												Modals
											</a>
										</li>
										<li>
											<a href="ui-elements-lightbox.html">
												Lightbox
											</a>
										</li>
										<li>
											<a href="ui-elements-progressbars.html">
												Progress Bars
											</a>
										</li>
										<li>
											<a href="ui-elements-sliders.html">
												Sliders
											</a>
										</li>
										<li>
											<a href="ui-elements-carousels.html">
												Carousels
											</a>
										</li>
										<li>
											<a href="ui-elements-accordions.html">
												Accordions
											</a>
										</li>
										<li>
											<a href="ui-elements-nestable.html">
												Nestable
											</a>
										</li>
										<li>
											<a href="ui-elements-tree-view.html">
												Tree View
											</a>
										</li>
										<li>
											<a href="ui-elements-grid-system.html">
												Grid System
											</a>
										</li>
										<li>
											<a href="ui-elements-charts.html">
												Charts
											</a>
										</li>
										<li>
											<a href="ui-elements-animations.html">
												Animations
											</a>
										</li>
										<li>
											<a href="ui-elements-extra.html">
												Extra
											</a>
										</li> --}}
								{{-- 	</ul>
								</li>
								<li class="nav-parent">
									<a style="color: white">
										<i class="fa fa-list-alt" aria-hidden="true"></i>
										<span>Data Iuran</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="" style="color: white">
												Kategori Pengeluaran
											</a>
										</li>
										<li>
											<a href="" style="color: white">
												Iuran
											</a>
										</li>
										<li>
											<a href="" style="color: white">
												Pengeluaran
											</a>
										</li>
										<li>
											<a href="" style="color: white">
												Data Bukti
											</a>
										</li> --}}
										{{-- <li>
											<a href="forms-wizard.html">
												Wizard
											</a>
										</li>
										<li>
											<a href="forms-code-editor.html">
												Code Editor
											</a>
										</li> --}}
									{{-- </ul> --}}
								{{-- </li> --}}
								<li>
									<a href="{{ url('eventusers') }}" style="color: white">
										{{-- <span class="pull-right label label-primary">182</span> --}}
										<i class="fa fa-calendar" aria-hidden="true"></i>
										<span>Kegiatan</span>
									</a>
								</li>
								<li>
									<a href="{{ url('complaintusers') }}" style="color: white">
										{{-- <span class="pull-right label label-primary">182</span> --}}
										<i class="fa fa-weixin" aria-hidden="true"></i>
										<span>Keluhan</span>
									</a>
								</li>
								<li class="nav-parent">
									<a style="color: white">
										<i class="fa fa-tasks" aria-hidden="true"></i>
										<span>Laporan</span>
									</a>
									<ul class="nav nav-children">
										{{-- <li>
											<a href="" style="color: white">
												Iuran Warga
											</a>
										</li> --}}
										<li>
											<a href="{{ url('spendingusers') }}" style="color: white">
												Pengeluaran
											</a>
										</li>
										{{-- <li>
											<a href="tables-responsive.html">
												Responsive
											</a>
										</li>
										<li>
											<a href="tables-editable.html">
												Editable
											</a>
										</li>
										<li>
											<a href="tables-ajax.html">
												Ajax
											</a>
										</li>
										<li>
											<a href="tables-pricing.html">
												Pricing
											</a>
										</li> --}}
									</ul>
								</li>
								{{-- <li class="nav-parent">
									<a>
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										<span>Maps</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="maps-google-maps.html">
												Basic
											</a>
										</li>
										<li>
											<a href="maps-google-maps-builder.html">
												Map Builder
											</a>
										</li>
										<li>
											<a href="maps-vector.html">
												Vector
											</a>
										</li>
									</ul>
								</li> --}}
								{{-- <li class="nav-parent">
									<a>
										<i class="fa fa-columns" aria-hidden="true"></i>
										<span>Layouts</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="layouts-default.html">
												Default
											</a>
										</li>
										<li>
											<a href="layouts-boxed.html">
												Boxed
											</a>
										</li>
										<li>
											<a href="layouts-menu-collapsed.html">
												Menu Collapsed
											</a>
										</li>
										<li>
											<a href="layouts-scroll.html">
												Scroll
											</a>
										</li>
									</ul>
								</li> --}}
								{{-- <li class="nav-parent">
									<a>
										<i class="fa fa-align-left" aria-hidden="true"></i>
										<span>Menu Levels</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a>First Level</a>
										</li>
										<li class="nav-parent">
											<a>Second Level</a>
											<ul class="nav nav-children">
												<li class="nav-parent">
													<a>Third Level</a>
													<ul class="nav nav-children">
														<li>
															<a>Third Level Link #1</a>
														</li>
														<li>
															<a>Third Level Link #2</a>
														</li>
													</ul>
												</li>
												<li>
													<a>Second Level Link #1</a>
												</li>
												<li>
													<a>Second Level Link #2</a>
												</li>
											</ul>
										</li>
									</ul>
								</li> --}}
								{{-- <li>
									<a href="http://themeforest.net/item/porto-responsive-html5-template/4106987?ref=Okler" target="_blank">
										<i class="fa fa-external-link" aria-hidden="true"></i>
										<span>Front-End <em class="not-included">(Not Included)</em></span>
									</a>
								</li> --}}
							</ul>
						</nav>

						<hr class="separator" />

						<div class="sidebar-widget widget-tasks">
							<div class="widget-header">
								{{-- <h6>Projects</h6> --}}
								<div class="widget-toggle">+</div>
							</div>
							{{-- <div class="widget-content">
								<ul class="list-unstyled m-none">
									<li><a href="#">Porto HTML5 Template</a></li>
									<li><a href="#">Tucson Template</a></li>
									<li><a href="#">Porto Admin</a></li>
								</ul>
							</div> --}}
						</div>

						<hr class="separator" />

						<div class="sidebar-widget widget-stats">
							<div class="widget-header">
								{{-- <h6>Company Stats</h6> --}}
								<div class="widget-toggle">+</div>
							</div>
							{{-- <div class="widget-content">
								<ul>
									<li>
										<span class="stats-title">Stat 1</span>
										<span class="stats-complete">85%</span>
										<div class="progress">
											<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
												<span class="sr-only">85% Complete</span>
											</div>
										</div>
									</li>
									<li>
										<span class="stats-title">Stat 2</span>
										<span class="stats-complete">70%</span>
										<div class="progress">
											<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
												<span class="sr-only">70% Complete</span>
											</div>
										</div>
									</li>
									<li>
										<span class="stats-title">Stat 3</span>
										<span class="stats-complete">2%</span>
										<div class="progress">
											<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
												<span class="sr-only">2% Complete</span>
											</div>
										</div>
									</li>
								</ul>
							</div> --}}
						</div>
					</div>

				</div>
				
			</aside>
			<!-- end: sidebar -->

			<section role="main" class="content-body" >
				{{-- <header class="page-header" style="background-color: #2d6ca2">
					<h2>Dashboard</h2>
					
					<div class="right-wrapper pull-right">
						<ol class="breadcrumbs">
							<li>
								<a href="#">
									<i class="fa fa-home"></i>
								</a>
							</li>
							<li><span>Pages</span></li>
							<li><span>Dashboard</span></li>
						</ol>

						<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
					</div>
				</header> --}}

				<!-- start: page -->
				@yield('content')
				<!-- end: page -->
			</section>
		</div>

		<aside id="sidebar-right" class="sidebar-right">
			<div class="nano">
				<div class="nano-content">
					<a href="#" class="mobile-close visible-xs">
						Collapse <i class="fa fa-chevron-right"></i>
					</a>

					<div class="sidebar-right-wrapper">

						<div class="sidebar-widget widget-calendar">
							<h6>Upcoming Tasks</h6>
							<div data-plugin-datepicker data-plugin-skin="dark" ></div>

							<ul>
								<li>
									<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
									<span>Company Meeting</span>
								</li>
							</ul>
						</div>

						<div class="sidebar-widget widget-friends">
							<h6>Friends</h6>
							<ul>
								<li class="status-online">
									<figure class="profile-picture">
										<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
									</figure>
									<div class="profile-info">
										<span class="name">Joseph Doe Junior</span>
										<span class="title">Hey, how are you?</span>
									</div>
								</li>
								<li class="status-online">
									<figure class="profile-picture">
										<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
									</figure>
									<div class="profile-info">
										<span class="name">Joseph Doe Junior</span>
										<span class="title">Hey, how are you?</span>
									</div>
								</li>
								<li class="status-offline">
									<figure class="profile-picture">
										<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
									</figure>
									<div class="profile-info">
										<span class="name">Joseph Doe Junior</span>
										<span class="title">Hey, how are you?</span>
									</div>
								</li>
								<li class="status-offline">
									<figure class="profile-picture">
										<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
									</figure>
									<div class="profile-info">
										<span class="name">Joseph Doe Junior</span>
										<span class="title">Hey, how are you?</span>
									</div>
								</li>
							</ul>
						</div>

					</div>
				</div>
			</div>
		</aside>
	</section>

	{{-- <script src="{{ asset('Admin/assets/js/modernizr.min.js') }}"></script> --}}
	{{-- @yield('script') --}}
	<!-- Vendor -->
	<script src="{{ asset('octopus/assets/vendor/jquery/jquery.js') }}"></script>
	<script src="{{ asset('octopus/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
	<script src="{{ asset('octopus/assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ asset('octopus/assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
	<script src="{{ asset('octopus/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('octopus/assets/vendor/magnific-popup/magnific-popup.js') }}"></script>
	<script src="{{ asset('octopus/assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>

	<!-- Specific Page Vendor -->
	<script src="{{ asset('octopus/assets/vendor/select2/select2.js') }}"></script>
	<script src="{{ asset('octopus/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('octopus/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js') }}"></script>
	<script src="{{ asset('octopus/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js') }}"></script>
	{{--  --}}
	{{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="{{ asset('octopus/assets/javascripts/theme.js') }}"></script>

	<!-- Theme Custom -->
	<script src="{{ asset('octopus/assets/javascripts/theme.custom.js') }}"></script>

	<!-- Theme Initialization Files -->
	<script src="{{ asset('octopus/assets/javascripts/theme.init.js') }}"></script>

	<!-- Examples -->
	<script src="{{ asset('octopus/assets/javascripts/tables/examples.datatables.ajax.js') }}"></script>

	<!-- Examples -->
	<script src="{{ asset('octopus/assets/javascripts/ui-elements/examples.modals.js') }}"></script>
	{{--  --}}
	{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script> --}}
	<!-- Examples -->
	<script src="{{ asset('octopus/assets/javascripts/tables/examples.datatables.default.js') }}"></script>
	<script src="{{ asset('octopus/assets/javascripts/tables/examples.datatables.row.with.details.js') }}"></script>
	<script src="{{ asset('octopus/assets/javascripts/tables/examples.datatables.tabletools.js') }}"></script>

	<!-- Files Logout-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.12/sweetalert2.all.js"></script>
	<!-- Logout -->
	<script>

		const logout = ()=>{
			swal({
				type:"info",
				title: "Yakin mau Keluar?",
				confirmButtonText: "<i class='fa fa-thumbs-up'></i> Ya, Keluar",
				showCancelButton:true,
				cancelButtonColor: '#d33',
				cancelButtonText: "<i class='fa fa-close'></i> Tidak"
			}).then(res=>{
				if(res.value){
					$("#logout-form").submit();
				}
			});
		}

	</script>
	{{--  --}}
	<script type="text/javascript">

		$(document).ready(function() {
			$('#example').DataTable( {
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
				]
			} );
		} );
	</script>
	{{-- hanya angka --}}
	<script type="text/javascript">
		function hanyaAngka(evt) {
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))

				return false;
			return true;
		}
	</script>
	@yield('script')
</body>
</html>