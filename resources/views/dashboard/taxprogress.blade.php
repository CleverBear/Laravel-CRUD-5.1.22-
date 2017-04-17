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
							<li class="dropdown dropdown-fw">
	                            <a href="{{ action('User\DashboardController@showDashboard') }}">Homepage</a>
	                        </li>
							<li class="dropdown dropdown-fw open selected">
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
					<div class="col-md-12 text-center">
						<a class="btn red btn-lg" href="{{ action('User\TaxServiceController@getTaxservice') }}" >Submit a Tax service</a>
					</div>

					<br class="clearfix" /><br /><br />
					@if(Session::has('massage'))
                        <div class="alert alert-danger"> 
                            <p>{{ Session::get('massage') }}</p>
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
				</div>				
				<!-- application listing -->
	    		<div class="row">
					<div class="col-md-12">
						
						<div class="portlet box blue">
							
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-cogs"></i>Application Listing
								</div>
							</div>
							
							<div class="portlet-body">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>
													 Application #
												</th>
												<th>
													 First Name
												</th>
												<th>
													 Last Name
												</th>
												<th>
													 Status
												</th>
												<th>
													 Progress
												</th>
												<th>
													 Fee
												</th>
												<th>
													 Action
												</th>
											</tr>
										</thead>
										<tbody>
										@foreach($taxprogresdata as $tpd)
											<tr>
												<td>
													 {{ $tpd->id }}
												</td>
												<td>
													 {{ $tpd->firstname }}
												</td>
												<td>
													 {{ $tpd->lastname }}
												</td>
												<td>
													 Pending
												</td>
												<td>
													 Pending
												</td>
												<td>
													<?php $taxreturntype = array('Individual' => '25','Student' => '15', 'Senior' => '20','Family' => '35','Individual' => '25','Complex Family' => '45','Rental Income-Individual' => '50','Rental Income-Family' => '60', 'Small Business Individual' => '50','Small Business Family' => '65','Medium Business individual' => '75','Medium Business Family' => '100') ?>
													@foreach($taxreturntype as $key => $value)
														@if($key == $tpd->applicationtaxes->typeoftaxreturn)
													 		${{ $value }} 
													 	@endif
													@endforeach
												</td>
												<td>
													 <a href="{{ action('User\TaxServiceController@edit', ['id' => $tpd->id]) }}" title="Edit" class="btn default btn-xs black"><i class="fa fa-edit"></i></a>
													 <a href="{{ action('User\TaxServiceController@destroy', ['id' => $tpd->id]) }}" title="Delete" class="btn default btn-xs black"><i class="fa fa-trash-o"></i></a>
												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
				<!-- application listing -->

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