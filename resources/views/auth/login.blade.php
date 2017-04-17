@extends('layout.mainlayout')

@section('title', 'ABM Easy | TaxApp Login')

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
                        
                        <!-- BEGIN LOGIN FORM -->
                        <form class="login-form" action="{{ action('Auth\AuthController@postLogin') }}" method="post">
                            {!! csrf_field() !!}
                            <h3 class="form-title">Login to your account</h3>
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

                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>Enter any username and password. </span>
                            </div>
                            <div class="form-group">
                                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                <label class="control-label visible-ie8 visible-ie9">Email</label>
                                <div class="input-icon">
                                    <i class="fa fa-user"></i>
                                    <input value="{{ old('email') }}" class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email"/>
                                </div>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label visible-ie8 visible-ie9">Password</label>
                                <div class="input-icon">
                                    <i class="fa fa-lock"></i>
                                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
                                </div>
                            </div>
                            <div class="form-actions">
                                <label class="checkbox">
                                <input type="checkbox" name="remember" value="1"/> Remember me </label>
                                <button type="submit" class="btn green-haze pull-right">
                                Login <i class="m-icon-swapright m-icon-white"></i>
                                </button>
                            </div>
                            <div class="forget-password">
                                <h4>Forgot your password ?</h4>
                                <p>
                                     no worries, click <a href="{{ action('Auth\AuthController@getforgotPassword') }}" id="forget-password">
                                    here </a>
                                    to reset your password.
                                </p>
                            </div>
                            <div class="create-account">
                                <p>
                                     Don't have an account yet ?&nbsp; <a href="{{ action('Auth\AuthController@getSignup') }}" id="register-btn">
                                    Create an account </a>
                                </p>
                            </div>
                        </form>
                        <!-- END LOGIN FORM -->
                        
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