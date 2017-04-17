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
									{!! Html::image("assets/admin/layout5/img/avatar1.jpg") !!}
								</button>
								<ul class="dropdown-menu-v2" role="menu">
									<li class="active">
										<a href="#">My Profile <span class="badge badge-danger">1</span> </a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="{{ action('User\DashboardController@getLogout') }}">Sign Out</a>
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
	                            <a href="{{ action('User\DashboardController@getShowDashboard') }}">Homepage</a>
	                        </li>
							<li class="dropdown dropdown-fw">
								<a href="{{ action('User\DashboardController@progress') }}">View Applications</a>
	                        </li>
							<li class="dropdown dropdown-fw open selected">
	                            <a href="{{ action('User\DashboardController@pricing') }}">Pricing</a>
							</li>
							<li class="dropdown dropdown-fw">
	                            <a href="">Upload Document</a>
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
					<div class="col-md-12">
						
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-cogs"></i>Pricing
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>
													 Level
												</th>
												<th>
													 Tax Return Type
												</th>
												<th>
													 Description
												</th>
												<th>
													 Types of Documents
												</th>
												<th>
													 Fees
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													 1
												</td>
												<td>
													 Individual
												</td>
												<td>
													 one Basic Tax return
												</td>
												<td>
													 Unlimited slips and other Tax receipts
												</td>
												<td>
													 $25
												</td>
											</tr>
											<tr>
												<td>
													 2
												</td>
												<td>
													 Student
												</td>
												<td>
													 one Basic Tax return
												</td>
												<td>
													 Unlimited slips and other Tax receipts
												</td>
												<td>
													 $15
												</td>
											</tr>
											<tr>
												<td>
													 3
												</td>
												<td>
													 Senior
												</td>
												<td>
													 one Basic Tax return
												</td>
												<td>
													 Unlimited slips and other Tax receipts
												</td>
												<td>
													 $20
												</td>
											</tr>
											<tr>
												<td>
													 4
												</td>
												<td>
													 Family
												</td>
												<td>
													 Two Basic Tax return
												</td>
												<td>
													 Unlimited slips and other Tax receipts
												</td>
												<td>
													 $35
												</td>
											</tr>
											<tr>
												<td>
													 5
												</td>
												<td>
													 Individual
												</td>
												<td>
													 one Basic Tax return
												</td>
												<td>
													 Unlimited slips and other Tax receipts
												</td>
												<td>
													 $25
												</td>
											</tr>
											<tr>
												<td>
													 6
												</td>
												<td>
													 Complex Family
												</td>
												<td>
													 Two individual tax return were special forms are filled like employment expenses
												</td>
												<td>
													 Employment expense Tax forms are included
												</td>
												<td>
													 $45
												</td>
											</tr>
											<tr>
												<td>
													 7
												</td>
												<td>
													 Rental Income-Individual
												</td>
												<td>
													 One individual tax return were rental income claimed
												</td>
												<td>
													 Rental income tax forms included
												</td>
												<td>
													 $50
												</td>
											</tr>
											<tr>
												<td>
													 8
												</td>
												<td>
													 Rental Income-Family
												</td>
												<td>
													 Two individual tax return were rental income claimed
												</td>
												<td>
													 Rental income tax forms included
												</td>
												<td>
													 $60
												</td>
											</tr>
											<tr>
												<td>
													 9
												</td>
												<td>
													 Small Business Individual
												</td>
												<td>
													 One individual tax return were Self employment income claimed with Gross revenue less than or equal to $30,000
												</td>
												<td>
													 Self Employment forms are included
												</td>
												<td>
													 $50
												</td>
											</tr>
											<tr>
												<td>
													 10
												</td>
												<td>
													 Small Business Family
												</td>
												<td>
													 Two individual tax return were Self employment income is claime with Gross revenue less than or equal to $30,000
												</td>
												<td>
													 Self Employment forms are included
												</td>
												<td>
													 $65
												</td>
											</tr>
											<tr>
												<td>
													 11
												</td>
												<td>
													 Medium Business individual
												</td>
												<td>
													 One individual tax return were Self employment income is claime with Gross revenue Greater than $30,000
												</td>
												<td>
													 Self Employment forms are included
												</td>
												<td>
													 $75
												</td>
											</tr>
											<tr>
												<td>
													 12
												</td>
												<td>
													 Medium Business Family
												</td>
												<td>
													 Two individual tax return were Self employment income is claime with Gross revenue Greater than $30,001
												</td>
												<td>
													 Self Employment forms are included
												</td>
												<td>
													 $100
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
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