<!DOCTYPE html>

<html lang="en">

<head id="Starter-Site">

	<meta charset="UTF-8">

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>
		@section('title')
			Administration
		@show
	</title>

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
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

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
  <link rel="stylesheet" type="text/css" href="{{{ asset('assets/css/bootstrap-2.3.2.min.css') }}}">
  <link rel="stylesheet" type="text/css" href="{{{ asset('assets/css/bootstrap-responsive-2.3.2.min.css') }}}">
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="{{{ asset('assets/css/bootstrap-ie6.css') }}}">
  <link rel="stylesheet" type="text/css" href="{{{ asset('assets/css/ie.css') }}}">
  <![endif]-->
  <link rel="stylesheet" type="text/css" href="{{{ asset('assets/css/admin-main.css') }}}">

  <style>
    @section('styles')
    @show
  </style>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>

<body>


    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./index.html">{{{ Lang::get('general.title') }}}</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li{{ (Request::is('admin') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin') }}}"><i class="icon-home"></i> Home</a></li>
            </ul>

            <ul class="nav navbar-nav pull-right">
              <li><a href="{{{ URL::to('/') }}}">View Homepage</a></li>
              <li class="divider-vertical"></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{{ Auth::user()->username }}}<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="{{{ URL::to(sprintf('admin/users/%d/edit',  Auth::user()->id)) }}}"><i class="icon-wrench"></i> Settings</a></li>
                  <li class="divider"></li>
                  <li><a href="{{{ URL::to('user/logout') }}}"><i class="icon-share"></i> Logout</a></li>
                </ul>
              </li>


            </ul>
          </div>
        </div>
      </div>
    </div>
		<!-- ./ navbar -->

    <!-- Container -->
    <div class="container">
    <div class="row">
      <div class="span3">
        <div class="accordion" id="accordionOne">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionOne" href="#collapseOne">
                        <i class="icon-list"></i> {{{ Lang::get('admin/menu.title_messages') }}}
                    </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <ul class="nav left-menu-nav">
                            @if (Auth::user()->can('manage_infos'))
                            <li{{ (Request::is('admin/infos*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/infos') }}}"> {{{ Lang::get('admin/menu.infos') }}}<i class=" icon-play"></i></a></li>
                            @endif
                            @if (Auth::user()->can('manage_recruits'))
                            <li{{ (Request::is('admin/recruits*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/recruits') }}}"> {{{ Lang::get('admin/menu.recruits') }}}<i class=" icon-play"></i></a></li>
                            @endif
                            @if (Auth::user()->can('manage_introductions'))
                            <li{{ (Request::is('admin/introductions*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/introductions/1/edit') }}}"> {{{ Lang::get('admin/menu.introductions') }}}<i class=" icon-play"></i></a></li>
                            @endif
                            @if (Auth::user()->can('manage_businesses'))
                            <li{{ (Request::is('admin/businesses*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/businesses/1/edit') }}}"> {{{ Lang::get('admin/menu.businesses') }}}<i class=" icon-play"></i></a></li>
                            @endif
                            @if (Auth::user()->can('manage_carousels'))
                            <li{{ (Request::is('admin/carousels*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/carousels') }}}"> {{{ Lang::get('admin/menu.carousels') }}}<i class=" icon-play"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
          @if (Auth::user()->can('manage_users') || Auth::user()->can('manage_roles'))
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionOne" href="#collapseThree">
                <i class="icon-user"></i> {{{ Lang::get('admin/menu.title_users') }}}
              </a>
            </div>
            <div id="collapseThree" class="accordion-body collapse in">
              <div class="accordion-inner">
                <ul class="nav left-menu-nav">
                  @if (Auth::user()->can('manage_users'))
                  <li{{ (Request::is('admin/users*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/users') }}}"> {{{ Lang::get('admin/menu.users') }}}<i class=" icon-play"></i></a></li>
                  @endif
                  @if (Auth::user()->can('manage_roles'))
                  <li{{ (Request::is('admin/roles*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/roles') }}}"> {{{ Lang::get('admin/menu.roles') }}}<i class=" icon-play"></i></a></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
      <div class="span9">

        <!-- Notifications -->
        @include('site.common.notifications')
        <!-- ./ notifications -->

        <!-- Content -->
        @yield('content')
        <!-- ./ content -->
      </div>
    </div>

		<!-- Footer -->
		<footer class="clearfix">
			@yield('footer')
		</footer>
		<!-- ./ Footer -->

	</div>
	<!-- ./ container -->

	<!-- Javascripts -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!--script src="{{asset('assets/js/bootstrap-affix.js')}}"></script>
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

    <script type="text/javascript" src="{{asset('assets/js/admin-main.js') }}"></script>

    @yield('scripts')

</body>

</html>