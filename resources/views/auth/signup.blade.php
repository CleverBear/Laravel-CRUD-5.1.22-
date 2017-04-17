@extends('layout.mainlayout')

@section('title', 'ABM Easy | TaxApp Sign Up')

@section('content')
<div class="login">
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
                        <a id="index" class="page-logo" href="{{ action('Home\HomeController@showHome') }}">
                            <img src="{{ asset("assets/admin/layout5/img/logo.png") }}" />
                        </a>
                        <!-- END LOGO -->
                        
                        <!-- BEGIN SEARCH -->
                        
                        <!-- END SEARCH -->

                    </div>

                </div>
                <!--/container-->
            </nav>
        </header>
        <!-- Header END -->

        <!-- Page Content BEGIN -->
        <div class="container-fluid">
            <div class="page-content">
                <div class="row">
                    <div class="content">
                        
                        <!-- BEGIN REGISTRATION FORM -->
                        <form class="register-form" action="{{ action('Auth\AuthController@postSignup') }}" method="post">
                            {!! csrf_field() !!}
                            <h3>Sign Up</h3>
                            <p>
                                 Enter your  details below:
                            </p>
                            @if(Session::has('massage'))
                            <div class="text-danger"> 
                                <p>{{ Session::get('massage') }}</p>
                            </div>
                            @endif
                            @if (count($errors) > 0)
                            <div class="text-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="form-group">
                                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                <label class="control-label visible-ie8 visible-ie9">Email</label>
                                <div class="input-icon">
                                    <i class="fa fa-envelope"></i>
                                    <input class="form-control placeholder-no-fix" value="{{ old('email') }}" type="email" placeholder="Email" name="email"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label visible-ie8 visible-ie9">First Name</label>
                                <div class="input-icon">
                                    <i class="fa fa-font"></i>
                                    <input class="form-control placeholder-no-fix" value="{{ old('firstname') }}" type="text" placeholder="First Name" name="firstname"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label visible-ie8 visible-ie9">Lsst Name</label>
                                <div class="input-icon">
                                    <i class="fa fa-font"></i>
                                    <input class="form-control placeholder-no-fix" value="{{ old('lastname') }}" type="text" placeholder="Last Name" name="lastname"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label visible-ie8 visible-ie9">Password</label>
                                <div class="input-icon">
                                    <i class="fa fa-lock"></i>
                                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label visible-ie8 visible-ie9">Confirm Password</label>
                                <div class="controls">
                                    <div class="input-icon">
                                        <i class="fa fa-check"></i>
                                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Confirm Password" name="password_confirmation"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label visible-ie8 visible-ie9">Telephone</label>
                                <div class="input-icon">
                                    <i class="fa fa-phone"></i>
                                    <input class="form-control placeholder-no-fix" value="{{ old('telephone') }}" type="number" placeholder="Telephone" name="telephone"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                <input type="checkbox" name="tnc"/> I agree to the <a href="javascript:;">
                                Terms of Service </a>
                                and <a href="javascript:;">
                                Privacy Policy </a>
                                </label>
                                <div id="register_tnc_error">
                                </div>
                            </div>
                            <div class="form-actions text-center">
                                <button type="submit" id="register-submit-btn" class="btn green-haze">
                                Sign Up <i class="m-icon-swapright m-icon-white"></i>
                                </button>
                            </div>
                        </form>
                        <!-- END REGISTRATION FORM -->
                        
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