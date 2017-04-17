@extends('layout.mainlayout')

@section('title', 'ABM Easy | TaxApp Dashboard')

@section('csslink')
<link rel="stylesheet" href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}"/>
@endsection

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
									<img src="{{ asset('assets/admin/layout5/img/avatar1.jpg') }}" alt="">
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
	                            <a href="{{ action('Admin\AdminController@userindex') }}">User</a>
	                        </li>
							<li class="dropdown dropdown-fw open selected">
	                            <a href="{{ action('Admin\AdminController@applicationindex') }}">Applications</a>
	                        </li>
							@if(Auth::user()->type == 1)
								<li class="dropdown dropdown-fw">
		                            <a href="{{ action('Admin\AdminController@adminindex') }}">Admin</a>
								</li>
							@endif
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
					<form id="file" action="{{ action('Admin\AdminController@search') }}" method="get">
						{!! csrf_field() !!}
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Application Search</label>
								<input name="search" type="text" class="form-control" required>
							</div>
						</div>
						<div class="col-md-9">
							<div class="form-group">
								<label class="control-label col-md-12">&nbsp;</label>
								<button class="btn green" type="submit" style="margin-bottom:15px;">Search Application</button>
								<a class="btn green" href="{{ action('Admin\AdminController@applicationindex') }}" style="margin-bottom:15px;">Refresh</a>
							</div>
						</div>
					</form>										
				</div>
				
				
				<div class="row">
					
					<div class="col-md-12">
						
						<!-- form in popup -->
						<div id="responsive" class="modal fade bs-modal-lg" role="responsive" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
										<h4 class="modal-title"><strong>View of Application</strong></h4>
									</div>
									<div class="modal-body">								 
											<div class="form-body">												
												<div class="table-responsive">
													<table class="table borderless">
														<thead>
															<tr>
																<th>
																	 Main applicant
																</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<label class="control-label">First Name</label>
																</td>
																<td>
																	{{ $taxservice->firstname }}
																</td>
															</tr>
															<tr>
																<td>
																	<label class="control-label">Last Name</label>
																</td>
																<td>
																	{{ $taxservice->lastname }}
																</td>
															</tr>
															<tr>
																<td>
																	<label class="control-label">Social Insurance Number</label>
																</td>
																<td>
																	{{ $taxservice->socialinsurancenumber }}
																</td>
															</tr>
															<tr>
																<td>
																	<label class="control-label">Country</label>
																</td>
																<td>
																	{{ $taxservice->country }}
																</td>
															</tr>
															<tr>
																<td>
																	<label class="control-label">Marital Status</label>
																</td>
																<td>
																	{{ $taxservice->maritalstatus }}
																</td>
															</tr>
															<tr>
																<td>
																	<label class="control-label">Address</label>
																</td>
																<td>
																	{{ $taxservice->address }}
																</td>
															</tr>
															<tr>
																<td>
																	<label class="control-label">City</label>
																</td>
																<td>
																	{{ $taxservice->city }}
																</td>
															</tr>
															<tr>
																<td>
																	<label class="control-label">Province\State</label>
																</td>
																<td>
																	{{ $taxservice->provinceorstate }}
																</td>
															</tr>
														</tbody>
													</table>												
												</div>
												@if(count($taxservice->spouse))
												<div class="table-responsive">
													<table class="table borderless">
														<thead>
															<tr>
																<th>
																	 Spouse
																</th>
															</tr>
														</thead>
														<tbody>
														@foreach($taxservice->spouse as $ts)
															<tr>
																<td>
																	<label class="control-label">First Name</label>
																</td>
																<td>
																	{{ $ts->spousefirstname }}
																</td>
															</tr>
															<tr>
																<td>
																	<label class="control-label">Last Name</label>
																</td>
																<td>
																	{{ $ts->spouselastname }}
																</td>
															</tr>
															<tr>
																<td>
																	<label class="control-label">Social Insurance Number</label>
																</td>
																<td>
																	{{ $ts->spousesocialinsurancenumber }}
																</td>
															</tr>
														@endforeach															
														</tbody>
													</table>												
												</div>
												@endif
												@if(count($taxservice->dependent))
												<div class="table-responsive">
													<h4>Dependents</h4>
													<table class="table table-bordered">
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
														@foreach($taxservice->dependent as $td)
															<tr>
																<td>
																	{{ $td->dependentfirstname }}
																</td>
																<td>
																	{{ $td->dependentlastname }}
																</td>
																<td>
																	{{ $td->dependentdateofbirth }}
																</td>
																<td>
																	{{ $td->relationship }}
																</td>
																<td>
																	{{ $td->comment }}
																</td>
																<td>
																	{{ $td->dependentgender }}
																</td>
															</tr>
														@endforeach
														</tbody>
													</table>
												</div>
												@endif
												@if(count($taxservice->uploadfile))
												<div class="clear">
													<strong>Uploaded Documents</strong>
													@foreach($taxservice->uploadfile as $tu)
													<br/><br/>
													<a href="{{ action('User\UploadController@download', ['id' => $tu->id ]) }}">File Category: {{ $tu->doccategory }} || File Type: {{ $tu->doctype }} || File Name: {{ $tu->docname }}</a>													
													@endforeach
												</div>
												@endif												
											</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn blue">Print</button>
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
													Application Number
												</th>
												<th>
													Date of Submission
												</th>
												<th>
													First Name
												</th>
												<th>
													Last Name
												</th>
												<th>
													Email
												</th>
												<th>
													Telephone
												</th>
												<th>
													Status
												</th>
												<th>
													View
												</th>
												<th>
													Message
												</th>
											</tr>
										</thead>
										<tbody>
										@foreach($tax as $t)
											<tr>
												<td>
													 {{ $t->id }}
												</td>
												<td>
													 {{ $t->created_at->toFormattedDateString() }}
												</td>
												<td>
													 {{ $t->user->firstname }}
												</td>
												<td>
													 {{ $t->user->lastname }}
												</td>
												<td>
													 {{ $t->user->email }}
												</td>
												<td>
													 {{ $t->user->telephone }}
												</td>
												<td>
													 Pending
												</td>
												<td>
													<a data-toggle="modal" href="{{ action('Admin\AdminController@viewApplication', ['id' => $t->id]) }}" title="View" class="btn default btn-xs black"><i class="fa fa-eye"></i></a>
												</td>
												<td>
													 Testing message
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
				<!--/row-->

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

@section('javascript')
	jQuery(document).ready(function() {    
		ComponentsPickers.init();	
	});
	$('#responsive').modal('show');
@endsection

@section('script')
<script src="{{ asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endsection
