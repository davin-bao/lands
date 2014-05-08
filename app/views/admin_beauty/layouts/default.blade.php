<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>@section('title')
    Administration
    @show</title>
  <meta name="keywords" content="@yield('keywords')" />
  <meta name="author" content="@yield('author')" />
  <!-- Google will often use this as its description of your page/site. Make it good. -->
  <meta name="description" content="@yield('description')" />

  <!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
  <meta name="google-site-verification" content="">

  <!-- Dublin Core Metadata : http://dublincore.org/ -->
  <meta name="DC.title" content="Project Name">
  <meta name="DC.subject" content="@yield('description')">
  <meta name="DC.creator" content="@yield('author')">

  <!--  Mobile Viewport Fix -->
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

  <!-- This is the traditional favicon.
   - size: 16x16 or 32x32
   - transparency is OK
   - see wikipedia for info on browser support: http://mky.be/favicon/ -->
  <link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">

  <!-- iOS favicons. -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
  <link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">


  <!-- CSS -->
  <!-- Bootstrap css file v2.3.2 -->
  <!--link rel="stylesheet" type="text/css" href="{{{ asset('assets/css/bootstrap-2.3.2.min.css') }}}">
  <link rel="stylesheet" type="text/css" href="{{{ asset('assets/css/bootstrap-responsive-2.3.2.min.css') }}}"-->
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="{{{ asset('assets/css/bootstrap-ie6.css') }}}">
  <link rel="stylesheet" type="text/css" href="{{{ asset('assets/css/ie.css') }}}">
  <![endif]-->

  <!-- bootstrap 3.0.2 -->
  <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- font Awesome -->
  <link href="{{ asset('admin/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="{{ asset('admin/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- Morris chart -->
  <link href="{{ asset('admin/css/morris/morris.css') }}" rel="stylesheet" type="text/css" />
  <!-- jvectormap -->
  <link href="{{ asset('admin/css/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
  <!-- fullCalendar -->
  <link href="{{ asset('admin/css/fullcalendar/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
  <!-- Daterange picker -->
  <link href="{{ asset('admin/css/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
  <!-- bootstrap wysihtml5 - text editor -->
  <link href="{{ asset('admin/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="{{ asset('admin/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" type="text/css" href="{{{ asset('assets/css/admin-main.css') }}}">

  <style>
    @section('styles')
    @show
  </style>

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->

</head>

</head>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header">
<a href="{{{ URL::to('admin') }}}" class="logo">
  <!-- Add the class icon to your logo image or logo icon to add the margining -->
  {{{ Lang::get('general.title') }}}
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</a>
<div class="navbar-right">
<ul class="nav navbar-nav">
  <!-- User Account: style can be found in dropdown.less -->
    <!-- Tasks: style can be found in dropdown.less -->
    <li>
        <a href="{{{ URL::to('/') }}}" target="_blank">
            <i class="fa fa-home"></i> {{ Lang::get('admin/menu.front_page') }}
        </a>
    </li>
  <li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <i class="glyphicon glyphicon-user"></i>
      <span>{{{ Auth::user()->username }}} <i class="caret"></i></span>
    </a>
    <ul class="dropdown-menu">
      <!-- Menu Footer-->
      <li class="user-footer">
        <div class="pull-left">
          <a href="{{{ URL::to(sprintf('admin/users/%d/edit',  Auth::user()->id)) }}}" class="btn btn-default btn-flat">{{{ Lang::get('admin/menu.profile') }}}</a>
        </div>
        <div class="pull-right">
          <a href="{{{ URL::to('user/logout') }}}" class="btn btn-default btn-flat">{{{ Lang::get('admin/menu.signout') }}}</a>
        </div>
      </li>
    </ul>
  </li>
</ul>
</div>
</nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left info">
        <p>Hello, {{{ Auth::user()->username }}}</p>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="active">
        <a href="{{{ URL::to('admin') }}}">
          <i class="fa fa-dashboard"></i> <span>{{ Lang::get('admin/menu.dashboard') }}</span>
        </a>
      </li>

      @if (Auth::user()->can('manage_settings'))
      <li{{ (Request::is('admin/settings*') ? ' class="active"' : '') }}>
      <a href="{{{ URL::to('admin/settings/1/edit') }}}"><i class="fa fa-wrench"></i> {{{ Lang::get('admin/menu.settings') }}}</a>
      </li>
      @endif
      <li class="treeview">
        <a href="#">
          <i class="fa fa-bar-chart-o"></i>
          <span>{{{ Lang::get('admin/menu.title_messages') }}}</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            @if (Auth::user()->can('manage_flows'))
            <li{{ (Request::is('admin/flows*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/flows') }}}"><i class="fa fa-angle-double-right"></i> {{{ Lang::get('admin/menu.flows') }}}</a></li>
            @endif
            @if (Auth::user()->can('manage_infos'))
            <li{{ (Request::is('admin/infos*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/infos') }}}"><i class="fa fa-angle-double-right"></i> {{{ Lang::get('admin/menu.infos') }}}</a></li>
            @endif
          @if (Auth::user()->can('manage_recruits'))
          <li{{ (Request::is('admin/recruits*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/recruits') }}}"><i class="fa fa-angle-double-right"></i> {{{ Lang::get('admin/menu.recruits') }}}</a></li>
          @endif
          @if (Auth::user()->can('manage_businesses'))
          <li{{ (Request::is('admin/businesses*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/businesses') }}}"><i class="fa fa-angle-double-right"></i> {{{ Lang::get('admin/menu.businesses') }}}</a></li>
          @endif
          @if (Auth::user()->can('manage_carousels'))
          <li{{ (Request::is('admin/carousels*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/carousels') }}}"><i class="fa fa-angle-double-right"></i> {{{ Lang::get('admin/menu.carousels') }}}</a></li>
          @endif
        </ul>
      </li>
    @if (Auth::user()->can('manage_users') || Auth::user()->can('manage_roles'))
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>{{{ Lang::get('admin/menu.title_users') }}}</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          @if (Auth::user()->can('manage_users'))
          <li{{ (Request::is('admin/users*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/users') }}}"><i class="fa fa-angle-double-right"></i> {{{ Lang::get('admin/menu.users') }}}</a></li>
          @endif
          @if (Auth::user()->can('manage_roles'))
          <li{{ (Request::is('admin/roles*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/roles') }}}"><i class="fa fa-angle-double-right"></i> {{{ Lang::get('admin/menu.roles') }}}</a></li>
          @endif
        </ul>
      </li>
    @endif
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    @yield('content_header')
  </h1>
  <ol class="breadcrumb">
  @yield('breadcrumb')
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Notifications -->
  @include('admin_beauty.layouts.notifications')
  <!-- ./ notifications -->

  <!-- Content -->
  @yield('content')
  <!-- ./ content -->


</section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

	<!-- ./ container -->

	<!-- Javascripts -->
    <!--script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-affix.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-alert.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-button.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-carousel.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-collapse.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-dropdown.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-modal.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-popover.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-scrollspy.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-tab.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-tooltip.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-transition.js')}}"></script-->
    <!--[if lte IE 6]>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap-ie.js') }}"></script>
    <![endif]-->

    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- jQuery UI 1.10.3 -->
    <script src="{{asset('admin/js/jquery-ui-1.10.3.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="{{asset('admin/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- Morris.js charts
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{asset('admin/js/plugins/morris/morris.min.js') }}" type="text/javascript"></script>-->
    <!-- Sparkline -->
    <script src="{{asset('admin/js/plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{asset('admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
    <!-- fullCalendar -->
    <script src="{{asset('admin/js/plugins/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('admin/js/plugins/jqueryKnob/jquery.knob.js') }}" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="{{asset('admin/js/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('admin/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{asset('admin/js/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>

    <!-- AdminLTE App -->
    <script src="{{asset('admin/js/AdminLTE/app.js') }}" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('admin/js/AdminLTE/dashboard.js') }}" type="text/javascript"></script>

    <script type="text/javascript" src="{{asset('assets/js/admin-main.js') }}"></script>

    @yield('scripts')

</body>

</html>