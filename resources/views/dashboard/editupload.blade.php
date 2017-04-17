@extends('layout.mainlayout')

@section('title', 'ABM Easy | TaxApp Dashboard')

@section('csslink')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}"/>
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
							<li class="dropdown dropdown-fw">
	                            <a href="{{ action('User\TaxServiceController@getProgress') }}">View Applications</a>
	                        </li>
							<li class="dropdown dropdown-fw">
	                            <a href="{{ action('User\PriceController@showPrice') }}">Pricing</a>
							</li>
							<li class="dropdown dropdown-fw open selected">
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
						<button class="btn red btn-lg" type="button" data-toggle="modal" href="#responsive">Upload a Document</button>
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
									<form id="fileupload" action="{{ action('User\UploadController@store') }}" method="POST" enctype="multipart/form-data">
											{!! csrf_field() !!}

									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
										<h4 class="modal-title"><strong>Upload a Document</strong></h4>
									</div>
									<div class="modal-body">										 
											<div class="form-body">
												
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Date</label>
															<div class="input-group date input-append date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
																<input value="{{ old('date') }}" name="date" type="text" class="form-control" readonly>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label">Application Number</label>
																<select name="applicationnumber" class="select2me form-control">
																	@foreach($applicationID as $an)
																		@if($an->id == old('applicationnumber'))
																			<option value="{{ $an->id }}" label="{{ $an->id }}" selected>{{ $an->id }}</option>
																		@else 
																			<option value="{{ $an->id }}" label="{{ $an->id }}">{{ $an->id }}</option>
																		@endif
																	@endforeach
																</select>
														</div>
														<div class="form-group">
															<label class="control-label">Document Category</label>
															<?php $doc_category = array('Slips','Tax Deductions','Expenses','Income Tax','Self-Employed and Business') ?>
															<select name="doccategory" class="select2me form-control">
																@foreach($doc_category as $dc)
																	@if($dc == old('doccategory'))
																		<option value="{{ $dc }}" label="{{ $dc }}" selected>{{ $dc }}</option>
																	@else 
																		<option value="{{ $dc }}" label="{{ $dc }}">{{ $dc }}</option>
																	@endif
																@endforeach
															</select>
														</div>
														<div class="form-group">
															<label class="control-label">Document Type</label>
															<?php $doc_type = array('Notice of Assessment','T2202/TL11','T3','T4','T4A','T4AOAS','T4AP','T4E','T4PS','T4RCA','T4RIF','T4RSP','T5') ?>
															<select name="doctype" class="select2me form-control">
																@foreach($doc_type as $dt)
																	@if($dt == old('doctype'))
																		<option value="{{ $dt }}" label="{{ $dt }}" selected>{{ $dt }}</option>
																	@else 
																		<option value="{{ $dt }}" label="{{ $dt }}">{{ $dt }}</option>
																	@endif
																@endforeach
															</select>
														</div>
														<div class="form-group">
															<label class="control-label">Document Name</label>
															<input name="docname" value="{{ old('docname') }}" type="text" class="form-control">
														</div>
													</div>
												</div>
												<!--/row-->
												
												<div class="row fileupload-buttonbar">
													<div class="col-lg-7">
														<label class="control-label">Choose File</label>
														<span class="btn green fileinput-button">
															<input type="file" name="docfile">
														</span>
													</div>
												</div>
												
											</div>
											
										<!-- END FORM-->
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn blue">Upload</button>
										<button type="button" class="btn default" data-dismiss="modal">Cancel</button>										
									</div>
									</form>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<!-- form in popup end -->
						
						<!-- form in popup -->
						<div id="edit" class="modal fade" role="edit" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<form id="fileupload" action="{{ action('User\UploadController@update', ['id' => $uploaddata->id]) }}" method="POST" enctype="multipart/form-data">
											{!! csrf_field() !!}

									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
										<h4 class="modal-title"><strong>Edit Upload a Document</strong></h4>
									</div>
									<div class="modal-body">										 
											<div class="form-body">
												
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Date</label>
															<input value="{{ $uploaddata->date }}" class="form-control" disabled>
														</div>
														<div class="form-group">
															<label class="control-label">Application Number</label>
															<input value="{{ $uploaddata->tax_service_id }}" class="form-control" disabled>
														</div>
														<div class="form-group">
															<label class="control-label">Document Category</label>
															<input value="{{ $uploaddata->doccategory }}" class="form-control" disabled>
														</div>
														<div class="form-group">
															<label class="control-label">Document Type</label>
															<input value="{{ $uploaddata->doctype }}" class="form-control" disabled>
														</div>
														<div class="form-group">
															<label class="control-label">Document Name</label>
															<input name="docname" value="{{ $uploaddata->docname }}" type="text" class="form-control">
														</div>
													</div>
												</div>
												<!--/row-->
												
												<div class="row fileupload-buttonbar">
													<div class="col-md-12">
														<label class="control-label">Uplodate File</label><br><br>
														<a href="{{ action('User\UploadController@download', ['id' => $uploaddata->id ]) }}">File Category: {{ $uploaddata->doccategory }} || File Type: {{ $uploaddata->doctype }} || File Name: {{ $uploaddata->docname }}</a>
													</div>
												</div>
												
											</div>
											
										<!-- END FORM-->
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn blue">Edit Upload</button>
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
									<i class="fa fa-cogs"></i>Application Listing
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>
													 Date
												</th>
												<th>
													 Application Number
												</th>
												<th>
													 Document Type
												</th>
												<th>
													 Document Name
												</th>
												<th>
													 Action
												</th>
											</tr>
										</thead>
										<tbody>
										@foreach($uploadfiles as $uf)
											<tr>
												<td>
													 {{ $uf->date }}
												</td>
												<td>
													 {{ $uf->tax_service_id }}
												</td>
												<td>
													 {{ $uf->doctype }}
												</td><td>
													 {{ $uf->docname }}
												</td>
												<td>
													 <a href="{{ action('User\UploadController@edit', ['id' => $uf->id]) }}" title="Edit" class="btn default btn-xs black"><i class="fa fa-edit"></i></a>
													 <a href="{{ action('User\UploadController@destroy', ['id' => $uf->id]) }}" title="Delete" class="btn default btn-xs black"><i class="fa fa-trash-o"></i></a>
													 <a href="{{ action('User\UploadController@download', ['id' => $uf->id ]) }}" title="Download" class="btn default btn-xs black"><i class="fa fa-download"></i></a>
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

@section('script')
	<script src="{{ asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('assets/admin/pages/scripts/components-pickers.js') }}"></script>
@endsection

@section('javascript')
	jQuery(document).ready(function() {    
	   	Metronic.init(); // init metronic core componets
	   	Layout.init(); // init layout
		ComponentsPickers.init();	
	});
	$('#edit').modal('show');
@endsection