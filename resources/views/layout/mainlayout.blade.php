<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.1.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8"/>
  <title>ABM Easy | TaxApp Dashboard</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <meta content="" name="description"/>
  <meta content="" name="author"/>
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <!-- <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'> -->
  <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/> -->
  <link href="{{ URL::asset("assets/global/plugins/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css"/>
  <link href="{{ URL::asset("assets/global/plugins/simple-line-icons/simple-line-icons.min.css") }}" rel="stylesheet" type="text/css"/>
  <link href="{{ URL::asset("assets/global/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
  <link href="{{ URL::asset("assets/global/plugins/uniform/css/uniform.default.css") }}" rel="stylesheet" type="text/css"/>
  <link href="{{ URL::asset("assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css") }}" rel="stylesheet" type="text/css"/>
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
  <link href="{{ URL::asset("assets/global/plugins/select2/select2.css") }}" rel="stylesheet" type="text/css"/>
  <link href="{{ URL::asset("assets/admin/pages/css/login3.css") }}" rel="stylesheet" type="text/css"/>
  <!-- END PAGE LEVEL PLUGIN STYLES -->
  <!-- BEGIN PAGE STYLES -->
  <!-- END PAGE STYLES -->
  <!-- BEGIN THEME STYLES -->
  <!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
  <link href="{{ URL::asset("assets/global/css/components.css") }}" id="style_components" rel="stylesheet" type="text/css"/>
  <link href="{{ URL::asset("assets/global/css/plugins.css") }}" rel="stylesheet" type="text/css"/>
  <link href="{{ URL::asset("assets/admin/layout5/css/layout.css") }}" rel="stylesheet" type="text/css"/>
  <link href="{{ URL::asset("assets/admin/layout5/css/custom.css") }}" rel="stylesheet" type="text/css"/>

  @yield('csslink')
  <!-- END THEME STYLES -->
  <link rel="shortcut icon" href="{{ URL::asset("favicon.ico") }}"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<body>

  @yield('content')

  <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
  <!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{ URL::asset("assets/global/plugins/respond.min.js") }}"></script>
<script src="{{ URL::asset("assets/global/plugins/excanvas.min.js") }}"></script> 
<![endif]-->
<script src="{{ URL::asset("assets/global/plugins/jquery.min.js") }}" type="text/javascript"></script>
<script src="{{ URL::asset("assets/global/plugins/jquery-migrate.min.js") }}" type="text/javascript"></script>
<script src="{{ URL::asset("assets/global/plugins/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<script src="{{ URL::asset("assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js") }}" type="text/javascript"></script>
<script src="{{ URL::asset("assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js") }}" type="text/javascript"></script>
<script src="{{ URL::asset("assets/global/plugins/jquery.blockui.min.js") }}" type="text/javascript"></script>
<script src="{{ URL::asset("assets/global/plugins/uniform/jquery.uniform.min.js") }}" type="text/javascript"></script>
<script src="{{ URL::asset("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js") }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ URL::asset("assets/global/plugins/jquery-validation/js/jquery.validate.min.js") }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ URL::asset("assets/global/scripts/metronic.js") }}" type="text/javascript"></script>
<script src="{{ URL::asset("assets/admin/layout5/scripts/layout.js") }}" type="text/javascript"></script>
<script src="{{ URL::asset("assets/admin/layout/scripts/demo.js") }}" type="text/javascript"></script>
<script src="{{ URL::asset("assets/admin/pages/scripts/login.js") }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
  jQuery(document).ready(function() {    
    Metronic.init(); // init metronic core componets
    Layout.init(); // init layout
    Login.init();
    Demo.init();
  });
</script>
<!-- END JAVASCRIPTS -->

<script>
  @yield('javascript')
</script>
  @yield('script')
</body>
</html>