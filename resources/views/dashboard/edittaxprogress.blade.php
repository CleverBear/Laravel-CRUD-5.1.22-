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
					
					<div class="portlet light bg-inverse">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-equalizer font-green-haze"></i>
								<span class="caption-subject font-green-haze bold uppercase">Application page</span>
							</div>
						</div>
						<div class="portlet-body form">

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
                            
							<!-- BEGIN FORM-->
							<form id="form" method="post" action="{{ action('User\TaxServiceController@update', ['id' => $taxprogress->id]) }}" class="form-horizontal">
							 	{!! csrf_field() !!}
								<div class="form-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-4">First Name</label>
												<div class="col-md-8">
													<input name="firstname" value="{{ $taxprogress->firstname }}" type="text" class="form-control" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4">Last Name</label>
												<div class="col-md-8">
													<input name="lastname" value="{{ $taxprogress->lastname }}" type="text" class="form-control" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4">Social Insurance Number</label>
												<div class="col-md-8">
													<input name="socialinsurancenumber" value="{{ $taxprogress->socialinsurancenumber }}" type="text" class="form-control" placeholder="" min="1">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4">Country</label>
												<div class="col-md-8">
													<?php $countries = array('Canada') ?>
													<select name="country" class="select2me form-control">
														@foreach($countries as $country)
															@if($country == $taxprogress->country)                               
							                                    <option value="{{ $country }}" label="{{ $country }}" selected>{{ $country }}</option>
							                                @else
							                                    <option value="{{ $country }}" label="{{ $country }}">{{ $country }}</option>
							                                @endif
														@endforeach
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4">Marital Status</label>
												<div class="col-md-8">
												<?php $marital_status = array('Divorce','Living  Common Law','Married','Separated','Single','Widow') ?>
													<select id="maritalstatus" name="maritalstatus" class="select2me form-control">
														@foreach($marital_status as $ms)
															@if($ms == $taxprogress->maritalstatus)                               
							                                    <option value="{{ $ms }}" label="{{ $ms }}" selected>{{ $ms }}</option>
							                                @else
							                                    <option value="{{ $ms }}" label="{{ $ms }}">{{ $ms }}</option>
							                                @endif
														@endforeach
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-md-4">Type Of Tax Return</label>
												<div class="col-md-8">
													<?php $taxreturntype = array('Individual' => '25','Student' => '15', 'Senior' => '20','Family' => '35','Individual' => '25','Complex Family' => '45','Rental Income-Individual' => '50','Rental Income-Family' => '60', 'Small Business Individual' => '50','Small Business Family' => '65','Medium Business individual' => '75','Medium Business Family' => '100') ?>
													<select id="taxreturntype" name="typeoftaxreturn" class="select2me form-control">
														@foreach($taxreturntype as $key => $tax_return_type)
															@if($tax_return_type == old('typeoftaxreturn'))                               
							                                    <option value="{{ $key }}" label="{{ $key }}" selected>{{ $tax_return_type }}</option>
							                                @else
							                                    <option value="{{ $key }}" label="{{ $key }}">{{ $tax_return_type }}</option>
							                                @endif
														@endforeach
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4">Price </label>
												<div class="col-md-8">
													<input id="price" value="" name="price" type="text" class="form-control" disabled>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4">Discount</label>
												<div class="col-md-8">
													<input value="0" name="discount" type="text" class="form-control" disabled>
												</div>
											</div>
											<div class="form-group">
													<label class="control-label col-md-4">Address</label>
													<div class="col-md-8">
														<input id="address" value="{{ $taxprogress->address }}" name="address" type="text" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-4">City</label>
													<div class="col-md-8">
														<input value="{{ $taxprogress->city }}" name="city" type="text" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-4">Province\State</label>
													<div class="col-md-8">
														<input value="{{ $taxprogress->provinceorstate }}" name="provinceorstate" type="text" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-4">Postal Code</label>
													<div class="col-md-8">
														<input value="{{ $taxprogress->postalcode }}" name="postalcode" type="text" class="form-control">
													</div>
												</div>
										</div>
										
									</div>
									<!--/row-->

								<div id="spouse">
									<div  class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label col-md-3">Are you filing for your spouse?</label>
												<div class="col-md-9">
													<div class="radio-list">
															<label class="radio-inline">
																<!-- <input type="radio" name="spouse" value="yes" @if(old('spouse') == 'yes') checked @endif /> Yes -->
																<input type="radio" name="spouse" value="yes" @if(count($taxprogress->spouse) > 0) checked @endif /> Yes
															</label>
															<label class="radio-inline">
																<!-- <input type="radio" name="spouse" value="no"  @if(old('spouse') == null || old('spouse') == 'no') checked @endif /> No -->
																<input id="no" type="radio" name="spouse" value="no" @if(count($taxprogress->spouse) == null) checked @endif /> No
															</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<!--/spouse info -->
									<div id="spouseinfo" @if(count($taxprogress->spouse) == null) style="display:none;" @endif>
										<h3 class="form-section">If Yes</h3>
										<!--/row-->
										<div class="row">
											<div class="col-md-6">
											@if(count($taxprogress->spouse) > 0)
												@foreach($taxprogress->spouse as $ts)
													<div class="form-group">
														<label class="control-label col-md-4">First Name</label>
														<div class="col-md-8">
															<input value="{{ $ts->spousefirstname }}" name="spousefirstname" type="text" class="form-control">
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-4">Last Name</label>
														<div class="col-md-8">
															<input value="{{ $ts->spouselastname }}" name="spouselastname" type="text" class="form-control">
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-4">Social Insurance Number</label>
														<div class="col-md-8">
															<input value="{{ $ts->spousesocialinsurancenumber }}" name="spousesocialinsurancenumber" type="text" class="form-control" min="1">
														</div>
													</div>
												@endforeach
											@else
												<div class="form-group">
														<label class="control-label col-md-4">First Name</label>
														<div class="col-md-8">
															<input value="{{ old('spousefirstname') }}" name="spousefirstname" type="text" class="form-control">
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-4">Last Name</label>
														<div class="col-md-8">
															<input value="{{ old('spouselastname') }}" name="spouselastname" type="text" class="form-control">
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-4">Social Insurance Number</label>
														<div class="col-md-8">
															<input value="{{ old('spousesocialinsurancenumber') }}" name="spousesocialinsurancenumber" type="text" class="form-control">
														</div>
													</div>
											@endif									
											</div>
										</div>
										
									</div>
									<!--/spouse info -->
								</div> 
								<!-- spouse id -->
								
									<h3 class="form-section">Dependents</h3>
									<!--/row-->
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label col-md-3">Do you have Dependents ?</label>
												<div class="col-md-9">
													<div class="radio-list">
														<label class="radio-inline">
															<!-- <input type="radio" name="dependent" value="yes" @if(old('dependent') == 'yes') checked @endif /> Yes  -->
															<input type="radio" name="dependent" value="yes" @if(count($taxprogress->dependent) > 0) checked @endif/> Yes 
														</label>
														<label class="radio-inline">
															<!-- <input type="radio" name="dependent" value="no" @if(old('dependent') == null || old('dependent') == 'no') checked @endif /> No -->
															<input type="radio" name="dependent" value="no" @if(count($taxprogress->dependent) == null) checked @endif/> No
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row" id="addresses" @if(count($taxprogress->dependent) == null) style="display:none;" @endif>
									@if(count($taxprogress->dependent) > 0)
										<?php $i = 0; ?>
										@foreach($taxprogress->dependent as $td)
											<div class="col-md-12 address" id="address{{ $i }}">
											<?php ++$i ?>
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label">First Name</label>
														<input value="{{ $td->dependentfirstname }}" name="dependentfirstname[]" type="text" class="form-control input-small">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label">Last Name</label>
														<input value="{{ $td->dependentlastname }}" name="dependentlastname[]" type="text" class="form-control input-small">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label">Date of Birth</label>
														<input value="{{ $td->dependentdateofbirth }}" name="dependentdateofbirth[]" type="date" class="form-control input-small">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label">Relationship</label>
														<?php $relationship = array('Son','Daughter', 'Father', 'Mother' ,'Grand Parent', 'Son in law', 'Daughter in law'); ?>
														<select name="relationship[]" class="form-control input-small">
															@foreach($relationship as $r)
																@if($r == $td->relationship)                               
								                                    <option value="{{ $r }}" label="{{ $r }}" selected>{{ $r }}</option>
								                                @else
								                                    <option value="{{ $r }}" label="{{ $r }}">{{ $r }}</option>
								                                @endif
															@endforeach
														</select>
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label">Comment</label> 
														<input value="{{ $td->comment }}" name="comment[]" type="text" class="form-control input-small">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label">Gender</label>
														<?php $gender = array('Male','Female') ?>
														<select name="dependentgender[]" class="form-control input-small">
															@foreach($gender as $g)
																@if($g == $td->dependentgender)                               
								                                    <option value="{{ $g }}" label="{{ $g }}" selected>{{ $g }}</option>
								                                @else
								                                    <option value="{{ $g }}" label="{{ $g }}">{{ $g }}</option>
								                                @endif
															@endforeach
														</select>
													</div>
												</div>
												<div class="col-md-12 text-right">
													<div class="form-group addmoreadd">
														<button type="button" class="btn blue addmore"><i class="fa fa-plus"></i> Add</button>
													</div>
												</div>										
											</div>
											@endforeach
										@else
											<div class="col-md-12 address" id="address0">
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label">First Name</label>
														<input value="{{ old('dependentfirstname[]') }}" name="dependentfirstname[]" type="text" class="form-control input-small">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label">Last Name</label>
														<input value="{{ old('dependentlastname[]') }}" name="dependentlastname[]" type="text" class="form-control input-small">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label">Date of Birth</label>
														<input value="{{ old('dependentdateofbirth[]') }}" name="dependentdateofbirth[]" type="date" class="form-control input-small">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label">Relationship</label>
														<?php $relationship = array('Son','Daughter', 'Father', 'Mother' ,'Grand Parent', 'Son in law', 'Daughter in law'); ?>
														<select name="relationship[]" class="form-control input-small">
															@foreach($relationship as $r)
																@if($r == old('relationship'))                               
								                                    <option value="{{ $r }}" label="{{ $r }}" selected>{{ $r }}</option>
								                                @else
								                                    <option value="{{ $r }}" label="{{ $r }}">{{ $r }}</option>
								                                @endif
															@endforeach
														</select>
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label">Comment</label> 
														<input value="{{ old('comment[]') }}" name="comment[]" type="text" class="form-control input-small">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label">Gender</label>
														<?php $gender = array('Male','Female') ?>
														<select name="dependentgender[]" class="form-control input-small">
															@foreach($gender as $g)
																@if($g == old('dependentgender'))                               
								                                    <option value="{{ $g }}" label="{{ $g }}" selected>{{ $g }}</option>
								                                @else
								                                    <option value="{{ $g }}" label="{{ $g }}">{{ $g }}</option>
								                                @endif
															@endforeach
														</select>
													</div>
												</div>
												<div class="col-md-12 text-right">
													<div class="form-group addmoreadd">
														<button type="button" class="btn blue addmore"><i class="fa fa-plus"></i> Add</button>
													</div>
												</div>
											</div>
										@endif
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
														<input type="radio" name="revenueagency" value="1" @if(old('revenueagency') == null || old('revenueagency') == 1) checked @endif/>
														Yes </label>
														<label class="radio-inline">
														<input type="radio" name="revenueagency" value="0" @if(old('revenueagency') != null && old('revenueagency') == 0) checked @endif/>
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
														<input  id="saveandupload" name="saveandupload" class="btn blue" value="Save and Upload Documents">
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
		$(":radio[name=spouse]").change(function(){
			$('#spouseinfo').toggle();
		});
		$(":radio[name=dependent]").change(function(){
			$('#addresses').toggle();
		});

		$('#saveandupload').click( function(){
			$(this).val('Updating');
			$('#form').submit();
		});
	});

<!-- tax return type price-->
function taxreturntype() {
  $( "#price" ).val($("#taxreturntype").find('option:selected').text());
}
 
$( "select" ).change( taxreturntype );
taxreturntype();

<!-- Spouse Check -->
function maritalstatus() {
	var maritalstatus = $("#maritalstatus").val();
	if( maritalstatus == 'Living  Common Law' || maritalstatus == 'Married') {
		$('#spouse').show();
	}
	else {
		if($(":radio[name=spouse]:checked").val() == 'yes')
		{
			$("#no").prop( "checked", true );
		}
		$('#spouse').hide();
	}
}

$( "select" ).change( maritalstatus );
maritalstatus();

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