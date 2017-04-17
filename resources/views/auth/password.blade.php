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
                    <h3>Forget Password ?</h3> 
                     @if (session('status'))
                      <div class="alert alert-success">
                       {{ session('status') }}
                     </div>
                     @endif

                     @if (count($errors) > 0)
                     <div class="alert alert-danger">
                       <strong>Whoops!</strong> There were some problems with your input.<br><br>
                       <ul>
                         @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                         @endforeach
                       </ul>
                     </div>
                     @endif   
                     <form class="forget-form" role="form" method="POST" action="{{ action('Auth\PasswordController@postEmail') }}" style="display:block">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="form-group">
                        <div class="input-icon">
                            <i class="fa fa-envelope"></i>
                            <input type="email" class="form-control placeholder-no-fix" name="email" value="{{ old('email') }}"  autocomplete="off" placeholder="Email">
                        </div>
                      </div>

                        <div class="form-actions">
                            <a href="{{ action('Auth\AuthController@getLogin') }}"><button type="button" id="back-btn" class="btn">
                            <i class="m-icon-swapleft"></i> Back </button></a>
                            <button type="submit" class="btn green-haze pull-right">
                            Submit <i class="m-icon-swapright m-icon-white"></i>
                            </button>
                        </div>
                   </form>                 
                    
                        
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