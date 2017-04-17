@extends('layout.mainlayout')

@section('title', 'ABM Easy | TaxApp Dashboard')

@section('content')
<div class="page-header-fixed page-quick-sidebar-over-content">

	<!-- BEGIN MAIN LAYOUT -->
	<div class="wrapper">
		<!-- Header BEGIN -->
	    <header class="page-header">
	        <nav class="navbar mega-menu" role="navigation">
	            <div class="container-fluid">
	                <div class="clearfix navbar-fixed-top">
		                <!-- Brand and toggle get grouped for better mobile display -->
		                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
		                    <span class="sr-only">Toggle navigation</span>
		                    <span class="toggle-icon">
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                    </span>
		                </button>
		                <!-- End Toggle Button -->

	                	<!-- BEGIN LOGO -->
	                	<!-- END LOGO -->
		                
		                <!-- BEGIN SEARCH -->
		                <!-- END SEARCH -->

		                <!-- BEGIN TOPBAR ACTIONS -->
		                <div class="topbar-actions">

							<!-- BEGIN USER PROFILE -->
			                <div class="btn-group-img btn-group">
								<button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
									<img src="{{ asset('assets/admin/layout5/img/avatar1.jpg') }}">
								</button>
								<ul class="dropdown-menu-v2" role="menu">
									<li class="active">
										<a href="#">My Profile <span class="badge badge-danger">1</span> </a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="{{ action('Auth\AuthController@getLogout') }}">Sign Out</a>
									</li>
								</ul>
							</div>
							<!-- END USER PROFILE -->

						</div>
		                <!-- END TOPBAR ACTIONS -->
	                </div>

	                <!-- Collect the nav links, forms, and other content for toggling -->
	                <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
	                    <ul class="nav navbar-nav text-uppercase">
	                        <li class="dropdown dropdown-fw open selected">
	                            <a href="{{ action('User\DashboardController@showDashboard') }}">Homepage</a>
	                        </li>
							<li class="dropdown dropdown-fw">
	                            <a href="{{ action('User\TaxServiceController@getProgress') }}">View Applications</a>
	                        </li>
							<li class="dropdown dropdown-fw">
	                            <a href="{{ action('User\PriceController@showPrice') }}">Pricing</a>
							</li>
							<li class="dropdown dropdown-fw">
	                            <a href="{{ action('User\UploadController@index') }}">Upload Document</a>
							</li>	                        
	                    </ul>
	                </div>
	                <!-- END NAVBAR COLLAPSE -->
	            </div>
	            <!--/container-->
	        </nav>
	    </header>
		<!-- Header END -->

		<!-- Page Content BEGIN -->
	    <div class="container-fluid">
	    	<div class="page-content">
	    		<div class="row">
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>Where do you want to go?
							</div>
						</div>
						<div class="portlet-body">
							<br />
							<p class="text-center">
								<a href="{{ action('User\TaxServiceController@getTaxservice') }}" class="btn green btn-lg">Submit a request For a Tax service</a> &nbsp; <a href="{{ action('User\TaxServiceController@getProgress') }}" class="btn red btn-lg">View The progress of application</a>
							</p>
						</div>
					</div>
				</div>

	    	</div>
			<!-- Page Content END -->

			<!-- Copyright BEGIN -->
			<p class="copyright">2015 &copy; ABMEASY</p>
			<!-- Copyright END -->
	    </div>
	</div>
    <!-- END MAIN LAYOUT -->
    <a href="#index" class="go2top"><i class="icon-arrow-up"></i></a>
</div>
@endsection