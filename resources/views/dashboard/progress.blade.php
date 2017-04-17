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
							<li class="dropdown dropdown-fw open selected">
	                            <a href="{{ action('User\DashboardController@progress') }}">View Applications</a>
	                        </li>
							<li class="dropdown dropdown-fw">
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
					<div class="col-md-12 text-center">
						<button class="btn red btn-lg" type="button" data-toggle="modal" href="#responsive">Submit a Tax service</button>
					</div>
					<br class="clearfix" /><br /><br />
				</div>
				
				<div class="row">
					
					<div class="col-md-12">
						
						<!-- form in popup -->
						<div id="responsive" class="modal fade bs-modal-lg" role="responsive" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
										<h4 class="modal-title"><strong>Submit a Tax service</strong></h4>
									</div>
									<div class="modal-body">
										 
										 <form id="fileupload" action="#" method="POST" enctype="multipart/form-data">
											<div class="form-body">
												
												<div class="table-responsive">
													<table class="table borderless">
														<thead>
															<tr>
																<th>
																	 &nbsp;
																</th>
																<th>
																	 Main applicant
																</th>
																<th>
																	 Spouse
																</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<label class="control-label">First Name</label>
																</td>
																<td>
																	<input type="text" class="form-control" placeholder="Chee Kin">
																</td>
																<td>
																	<input type="text" class="form-control" placeholder="Chee Kin">
																</td>
															</tr>
															<tr>
																<td>
																	<label class="control-label">Last Name</label>
																</td>
																<td>
																	<input type="text" class="form-control" placeholder="Chee Kin">
																</td>
																<td>
																	<input type="text" class="form-control" placeholder="Chee Kin">
																</td>
															</tr>
															<tr>
																<td>
																	<label class="control-label">Social Insurance Number</label>
																</td>
																<td>
																	<input type="text" class="form-control" placeholder="Chee Kin">
																</td>
																<td>
																	<input type="text" class="form-control" placeholder="Chee Kin">
																</td>
															</tr>
															<tr>
																<td>
																	<label class="control-label">Country</label>
																</td>
																<td>
																	<select name="foo" class="select2me form-control">
																		<option value="1">Abc</option>
																		<option value="1">Abc</option>
																	</select>
																</td>
																<td>
																	<select name="foo" class="select2me form-control">
																		<option value="1">Abc</option>
																		<option value="1">Abc</option>
																	</select>
																</td>
															</tr>
															<tr>
																<td>
																	<label class="control-label">Marital Status</label>
																</td>
																<td>
																	<select name="foo" class="select2me form-control">
																		<option value="1">Divorce</option>
																		<option value="1">Living  Common Law</option>
																		<option value="1">Married</option>
																		<option value="1">Separated</option>
																		<option value="1">Single</option>
																		<option value="1">Widow</option>
																	</select>
																</td>
																<td>
																	<select name="foo" class="select2me form-control">
																		<option value="1">Divorce</option>
																		<option value="1">Living  Common Law</option>
																		<option value="1">Married</option>
																		<option value="1">Separated</option>
																		<option value="1">Single</option>
																		<option value="1">Widow</option>
																	</select>
																</td>
															</tr>
															<tr>
																<td>
																	<label class="control-label">Address</label>
																</td>
																<td>
																	<input type="text" class="form-control" placeholder="Chee Kin">
																</td>
																<td>&nbsp;</td>
															</tr>
															<tr>
																<td>
																	<label class="control-label">City</label>
																</td>
																<td>
																	<input type="text" class="form-control" placeholder="Chee Kin">
																</td>
																<td>&nbsp;</td>
															</tr>
															<tr>
																<td>
																	<label class="control-label">Province\State</label>
																</td>
																<td>
																	<input type="text" class="form-control" placeholder="Chee Kin">
																</td>
																<td>&nbsp;</td>
															</tr>
														</tbody>
													</table>
												
												</div>
												
												<div class="table-responsive">
													<h4>Dependents</h4>
													<table class="table borderless">
														<thead>
															<tr>
																<th>
																	 First Name
																</th>
																<th>
																	 Last Name
																</th>
																<th>
																	 Date of Birth
																</th>
																<th>
																	 Relationship
																</th>
																<th>
																	 Comment
																</th>
																<th>
																	 Gender
																</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<input type="text" class="form-control" placeholder="Chee Kin">
																</td>
																<td>
																	<input type="text" class="form-control" placeholder="Chee Kin">
																</td>
																<td>
																	<input type="text" class="form-control" placeholder="Chee Kin">
																</td>
																<td>
																	<input type="text" class="form-control" placeholder="Chee Kin">
																</td>
																<td>
																	<input type="text" class="form-control" placeholder="Chee Kin">
																</td>
																<td>
																	<input type="text" class="form-control" placeholder="Chee Kin">
																</td>
															</tr>
														</tbody>
													</table>
												</div>
												
												<div class="clear">
													<strong>Uploaded Documents</strong>
													<br /><br />
												</div>
												
											</div>
											
										</form>
										<!-- END FORM-->
									</div>
									<div class="modal-footer">
										<button type="button" class="btn blue">Edit</button>
										<button type="button" class="btn default" data-dismiss="modal">Close</button>										
										<a href="#messagebox" class="btn green" data-toggle="modal" data-dismiss="modal">Message</a>
									</div>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<!-- form in popup end -->
						
						<!-- /.Message box -->
						<div id="messagebox" class="modal fade" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
										<h4 class="modal-title">Message</h4>
									</div>
									<div class="modal-body">
										<form action="#" method="POST" enctype="multipart/form-data">
											<div class="form-body">
												<div class="form-group">
													<label class="control-label">Subject</label>
													<input type="text" class="form-control" value="" >
												</div>
												<div class="form-group">
													<label class="control-label">Text</label>
													<textarea class="form-control"></textarea>
												</div>
											</div>											
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" data-dismiss="modal" class="btn default">Close</button>
										<button type="button" class="btn green">Save changes</button>
									</div>
								</div>
							</div>
						</div>
						<!-- /.Message box -->						
						
					</div>
					
				</div>
				<!--/row-->
				
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
											<tr>
												<td>
													 1
												</td>
												<td>
													 Jigar
												</td>
												<td>
													 Chauhan
												</td>
												<td>
													 Pending
												</td>
												<td>
													 Pending
												</td>
												<td>
													 $55
												</td>
												<td>
													 <a href="javascript:;" title="Edit" class="btn default btn-xs black"><i class="fa fa-edit"></i></a>
													 <a href="javascript:;" title="Delete" class="btn default btn-xs black"><i class="fa fa-trash-o"></i></a>
												</td>
											</tr>
											<tr>
												<td>
													 1
												</td>
												<td>
													 Jigar
												</td>
												<td>
													 Chauhan
												</td>
												<td>
													 Pending
												</td>
												<td>
													 Pending
												</td>
												<td>
													 $55
												</td>
												<td>
													 <a href="javascript:;" title="Edit" class="btn default btn-xs black"><i class="fa fa-edit"></i></a>
													 <a href="javascript:;" title="Delete" class="btn default btn-xs black"><i class="fa fa-trash-o"></i></a>
												</td>
											</tr>
											<tr>
												<td>
													 1
												</td>
												<td>
													 Jigar
												</td>
												<td>
													 Chauhan
												</td>
												<td>
													 Pending
												</td>
												<td>
													 Pending
												</td>
												<td>
													 $55
												</td>
												<td>
													 <a href="javascript:;" title="Edit" class="btn default btn-xs black"><i class="fa fa-edit"></i></a>
													 <a href="javascript:;" title="Delete" class="btn default btn-xs black"><i class="fa fa-trash-o"></i></a>
												</td>
											</tr>
											<tr>
												<td>
													 1
												</td>
												<td>
													 Jigar
												</td>
												<td>
													 Chauhan
												</td>
												<td>
													 Pending
												</td>
												<td>
													 Pending
												</td>
												<td>
													 $55
												</td>
												<td>
													 <a href="javascript:;" title="Edit" class="btn default btn-xs black"><i class="fa fa-edit"></i></a>
													 <a href="javascript:;" title="Delete" class="btn default btn-xs black"><i class="fa fa-trash-o"></i></a>
												</td>
											</tr>
											<tr>
												<td>
													 1
												</td>
												<td>
													 Jigar
												</td>
												<td>
													 Chauhan
												</td>
												<td>
													 Pending
												</td>
												<td>
													 Pending
												</td>
												<td>
													 $55
												</td>
												<td>
													 <a href="javascript:;" title="Edit" class="btn default btn-xs black"><i class="fa fa-edit"></i></a>
													 <a href="javascript:;" title="Delete" class="btn default btn-xs black"><i class="fa fa-trash-o"></i></a>
												</td>
											</tr>
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