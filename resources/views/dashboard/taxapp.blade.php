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
	                        <li class="dropdown dropdown-fw open selected">
	                            <a href="{{ action('User\DashboardController@getShowDashboard') }}">Homepage</a>
	                        </li>
							<li class="dropdown dropdown-fw">
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
					
					<div class="portlet light bg-inverse">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-equalizer font-green-haze"></i>
								<span class="caption-subject font-green-haze bold uppercase">Application page</span>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="#" class="form-horizontal">
								<div class="form-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-4">First Name</label>
												<div class="col-md-8">
													<input type="text" class="form-control" placeholder="Chee Kin">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4">Last Name</label>
												<div class="col-md-8">
													<input type="text" class="form-control" placeholder="Chee Kin">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4">Social Insurance Number</label>
												<div class="col-md-8">
													<input type="text" class="form-control" placeholder="Chee Kin">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4">Country</label>
												<div class="col-md-8">
													<select name="foo" class="select2me form-control">
														<option value="1">Abc</option>
														<option value="1">Abc</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4">Marital Status</label>
												<div class="col-md-8">
													<select name="foo" class="select2me form-control">
														<option value="1">Divorce</option>
														<option value="1">Living  Common Law</option>
														<option value="1">Married</option>
														<option value="1">Separated</option>
														<option value="1">Single</option>
														<option value="1">Widow</option>
													</select>
												</div>
											</div>
										</div>
										
									</div>
									<!--/row-->

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label col-md-3">Are you filing for your spouse?</label>
												<div class="col-md-9">
													<div class="radio-list">
														<label class="radio-inline">
															<input type="radio" name="spouseval" value="option1" /> Yes
														</label>
														<label class="radio-inline">
															<input type="radio" name="spouseval" value="option2" checked /> No
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<!--/spouse info -->
									<div id="spouseinfo" style="display:none;">
										<h3 class="form-section">If Yes</h3>
										<!--/row-->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label col-md-4">First Name</label>
													<div class="col-md-8">
														<input type="text" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-4">Last Name</label>
													<div class="col-md-8">
														<input type="text" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-4">Social Insurance Number</label>
													<div class="col-md-8">
														<input type="text" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-4">Address</label>
													<div class="col-md-8">
														<input type="text" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-4">City</label>
													<div class="col-md-8">
														<input type="text" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-4">Province\State</label>
													<div class="col-md-8">
														<select class="form-control">
															<option>Country 1</option>
															<option>Country 2</option>
														</select>
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-md-4">Type Of Tax Return</label>
													<div class="col-md-8">
														<input type="text" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-4">Price </label>
													<div class="col-md-8">
														<input type="text" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-4">Discount</label>
													<div class="col-md-8">
														<input type="text" class="form-control">
													</div>
												</div>
												
											</div>
										</div>
										
									</div>
									<!--/spouse info -->
								
									<h3 class="form-section">Dependents</h3>
									<!--/row-->
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label col-md-3">Do you have Dependents ?</label>
												<div class="col-md-9">
													<div class="radio-list">
														<label class="radio-inline">
														<input type="radio" name="optionsRadios2" value="option1"/>
														Yes </label>
														<label class="radio-inline">
														<input type="radio" name="optionsRadios2" value="option2" checked/>
														No </label>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row" id="addresses">
										<div class="col-md-12 address" id="address0">
											<div class="col-md-2">
												<div class="form-group">
													<label class="control-label">First Name</label>
													<input type="text" class="form-control input-small">
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label class="control-label">Last Name</label>
													<input type="text" class="form-control input-small">
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label class="control-label">Date of Birth</label>
													<input type="text" class="form-control input-small">
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label class="control-label">Relationship</label>
													<select class="form-control input-small">
														<option value="1">Son</option>
														<option value="2">Daughter</option>
														<option value="4">Father</option>
														<option value="3">Mother</option>
														<option value="4">Grand Parent</option>
														<option value="5">Son in law</option>
														<option value="6">Daughter in law</option>
													</select>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label class="control-label">Comment</label> 
													<input type="text" class="form-control input-small">
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label class="control-label">Gender</label> 
													<select class="form-control input-small">
														<option value="1">Male</option>
														<option value="2">Famale</option>
													</select>
												</div>
											</div>
											<div class="col-md-12 text-right">
												<div class="form-group addmoreadd">
													<button type="button" class="btn blue addmore"><i class="fa fa-plus"></i> Add</button>
												</div>
											</div>
										</div>
									</div>
									<!--/row-->
									
									<!--/row-->
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label col-md-6">Authorize ABMEASY to download your information from Canada Revenue Agency? </label>
												<div class="col-md-6">
													<div class="radio-list">
														<label class="radio-inline">
														<input type="radio" name="optionsRadios3" value="option1"/>
														Yes </label>
														<label class="radio-inline">
														<input type="radio" name="optionsRadios3" value="option2" checked/>
														No </label>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="form-actions">
										<div class="row">
											<div class="col-md-6">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" class="btn green">Save</button>
														<button type="submit" class="btn blue">Save and Upload Documents</button>
														<button type="button" class="btn default">Cancel</button>
													</div>
												</div>
											</div>
											<div class="col-md-6">
											</div>
										</div>
									</div>
								</div>
							</form>
							<!-- END FORM-->
							
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

@section('javascript')

	$(document).ready(function(){
	$(":radio[name=spouseval]").change(function(){
		$('#spouseinfo').toggle();
	});
});

<!-- script for ADD/REMOVE dependents -->
var rowNum = 0;
$("body").on("click", ".addmore", function() {
      rowNum++;
      var $address = $(this).parents('.address');
      var nextHtml = $address.clone();
      nextHtml.attr('id', 'address' + rowNum);
      var hasRmBtn = $('.rmbtn', nextHtml).length > 0;
    if (!hasRmBtn) {
      var rm = "<button type='button' class='rmbtn btn blue'><i class='fa fa-minus'></i> Remove</button>"
      $('.addmoreadd', nextHtml).append(rm);
    }
      $address.after(nextHtml); 
 });
$("body").on("click", ".rmbtn", function() {
    $(this).parents('.address').remove();
});
@endsection