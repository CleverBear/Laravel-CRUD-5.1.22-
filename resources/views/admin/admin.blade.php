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
							<li class="dropdown dropdown-fw ">
	                            <a href="{{ action('Admin\AdminController@userindex') }}">User</a>
	                        </li>
							<li class="dropdown dropdown-fw">
	                            <a href="{{ action('Admin\AdminController@applicationindex') }}">Applications</a>
	                        </li>
	                        @if(Auth::user()->type == 1)
								<li class="dropdown dropdown-fw open selected">
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
					<div class="col-md-12 text-center">
						<button class="btn red btn-lg" type="button" data-toggle="modal" href="#responsive">Create a Employee</button>
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
				
				<div class="row">
					
					<div class="col-md-12">
						
						<!-- form in popup -->
						<div id="responsive" class="modal fade" role="responsive" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
										<h4 class="modal-title"><strong>Create a Employee</strong></h4>
									</div>
									<form action="{{ action('Admin\AdminController@createEmployee') }}" method="post">
										{!! csrf_field() !!}
										<div class="modal-body">
												<div class="form-body">
													
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label class="control-label">Email</label>
																<input name="email" type="text" class="form-control" value="{{ old('email') }}" >
															</div>
															<div class="form-group">
																<label class="control-label">First name</label>
																<input name="firstname" type="text" class="form-control" value="{{ old('firstname') }}" >
															</div>
															<div class="form-group">
																<label class="control-label">Last name</label>
																<input name="lastname" type="text" class="form-control" value="{{ old('lastname') }}" >
															</div>
															<div class="form-group">
																<label class="control-label">Level</label>
																<?php $level = array('1' => 'Admin', '2' => 'Accountant') ?>
																<select name="level" class="select2me form-control">
																	@foreach($level as $key => $value)
																		@if($key == old('level'))                               
										                                    <option value="{{ $key }}" label="{{ $value }}" selected>{{ $value }}</option>
										                                @else
										                                    <option value="{{ $key }}" label="{{ $value }}">{{ $value }}</option>
										                                @endif
																	@endforeach
																</select>
															</div>
														</div>
													</div>
													<!--/row-->
													
												</div>											
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn blue">Save</button>
											<button type="button" class="btn default" data-dismiss="modal">Cancel</button>										
										</div>
									</form>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<!-- form in popup end -->
						
					</div>
					
				</div>
				<!--/row-->
				
	    		<div class="row">
					<div class="col-md-12">
						
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-cogs"></i>Employee Listing
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>
													 Employee Email
												</th>
												<th>
													 First Name
												</th>
												<th>
													 Last Name
												</th>
												<th>
													 Action
												</th>
											</tr>
										</thead>
										<tbody>
										@foreach($employee as $e)
											<tr>
												<td>
													 {{ $e->email }}
												</td>
												<td>
													 {{ $e->firstname }}
												</td>
												<td>
													 {{ $e->lastname }}
												</td>
												<td>
													 <a href="{{ action('Admin\AdminController@getEditEmployee', ['id' => $e->id]) }}" title="Edit" class="btn default btn-xs black"><i class="fa fa-edit"></i></a>
													 <a href="{{ action('Admin\AdminController@deleteEmployee', ['id' => $e->id]) }}" title="Delete" class="btn default btn-xs black"><i class="fa fa-trash-o"></i></a>
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
@endsection

@section('script')
<script src="{{ asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endsection
