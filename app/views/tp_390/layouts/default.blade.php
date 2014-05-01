<!DOCTYPE html>
<html>
<head>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('tp_390/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-responsive-2.3.2.min.css') }}">
    <!--[if lte IE 6]>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-ie6.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ie.css') }}">
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/site-main.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>
    <link href="{{ asset('tp_390/css/font-awesome.min.css') }}" rel="stylesheet">
  <!-- Ionicons -->
  <link href="{{ asset('admin/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('tp_390/css/templatemo_style.css') }}" rel="stylesheet">

    <link href="{{ asset('tp_390/css/circle.css') }}" rel="stylesheet">
    <link href="{{ asset('tp_390/css/jquery.bxslider.css') }}" rel="stylesheet" />
    <link href="{{ asset('tp_390/css/nivo-slider.css') }}" rel="stylesheet">
  @if ($setting->front_color == 'red')
  <link href="{{ asset('tp_390/css/templatemo_red_style.css') }}" rel="stylesheet">
  @elseif ($setting->front_color == 'orange')
  <link href="{{ asset('tp_390/css/templatemo_orange_style.css') }}" rel="stylesheet">
  @endif
    <style>
        @section('styles')
        @show
    </style>

    <script src="{{ asset('tp_390/js/modernizr.custom.js') }}"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
    <div id="templatemo_top" class="mainTop">
        <div class="container">
            <div class="row">
                <div class="hidden-xs hidden-sm col-md-6">
                    <div class="mailme">
                        <a href="mailto:info@company.com"><i class="fa fa-envelope"></i>{{ $setting->master_email }}</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="socials">
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- e/o mainTop -->

    <div id="slider" class="nivoSlider">
        @if (isset($carousels) && $carousels->count()>0)
        @foreach ($carousels as $carousel)
        <a href="#">
            <img src="{{ URL::to('files/image?name=') }}{{{ isset($carousel) ? $carousel->carousel_image : null }}}" alt="{{{ isset($carousel) ? $carousel->carousel_content : 'description' }}}" /></a>
        @endforeach
        @else
        <a href="#"><img src="{{ asset('tp_390/images/slider/img_1.jpg') }}" alt="slide 1" /></a>
        <a href="#"><img src="{{ asset('tp_390/images/slider/img_2.jpg') }}" alt="slide 2" /></a>
        <a href="#"><img src="{{ asset('tp_390/images/slider/img_3.jpg') }}" alt="slide 3" /></a>
        @endif
    </div>
</header>

<div class="mWrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <div class="logo">
                    <a  href="{{{ URL::to('/') }}}"><img src="{{ asset('tp_390/images/logo.png') }}" height="38" alt="Powerful Theme"></a>
                </div>
            </div>
            <div class="col-sm-8 col-md-8">
                <nav class="mainMenu">
                    <ul class="nav">
                        <li><a href="#templatemo_top"><i class="icon-home"></i> {{{ Lang::get('site/default.home') }}}</a></li>
                        <li><a href="#templatemo_business"><i class="icon-exclamation-sign"></i> {{{ Lang::get('site/default.businesses') }}}</a></a></li>
                        <li><a href="#templatemo_infos"><i class="icon-tags"></i> {{{ Lang::get('site/default.news') }}}</a></li>
                        <li><a href="#templatemo_about"><i class="icon-eye-open"></i> {{{ Lang::get('site/default.introductions') }}}</a></li>
                        <li><a href="#templatemo_contact"><i class="icon-glass"></i> {{{ Lang::get('site/default.contact') }}}</a></li>
                        <li><a href="#templatemo_recruit"><i class="icon-glass"></i> {{{ Lang::get('site/default.recruits') }}}</a></li>
                        @if (Auth::check())
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> {{{ Auth::user()->username }}}<b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <li><a href="{{{ URL::to('admin') }}}"><i class="icon-wrench"></i> {{{ Lang::get('general.admin_panel') }}}</a></li>
                            <li class="divider"></li>
                            <li><a href="{{{ URL::to('user/settings') }}}"><i class="icon-wrench"></i> {{{ Lang::get('admin/menu.profile') }}}</a></li>
                            <li><a href="{{{ URL::to('user/logout') }}}"><i class="icon-share"></i> {{{ Lang::get('admin/menu.signout') }}}</a></li>
                          </ul>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
      <!-- Notifications -->
      @include('tp_390.common.notifications')
      <!-- ./ notifications -->

      <!-- Content -->
      @yield('content')
      <!-- ./ content -->
  <!-- Footer -->
  <footer class="clearfix">
    @yield('footer')
  </footer>
  <!-- ./ Footer -->

</div>
<!-- ./ container -->

<!-- Javascripts -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<!--script src="{{asset('assets/js/bootstrap.min.js')}}"></script-->
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
<script src="{{asset('assets/js/bootstrap-transition.js')}}"></script>
<!--[if lte IE 6]>
<script type="text/javascript" src="{{asset('assets/js/bootstrap-ie.js') }}"></script>
<![endif]-->
<script src="{{ asset('tp_390/js/jquery.cycle2.min.js') }}"></script>
<script src="{{ asset('tp_390/js/jquery.cycle2.carousel.min.js') }}"></script>
<script src="{{ asset('tp_390/js/jquery.nivo.slider.pack.js') }}"></script>
<script>$.fn.cycle.defaults.autoSelector = '.slideshow';</script>
<script src="{{ asset('tp_390/js/jquery.cookie.js') }}"></script>

<script type="text/javascript" src="{{ asset('tp_390/js/lib/jquery.mousewheel-3.0.6.pack.js') }}"></script>
<script src="{{ asset('tp_390/js/stickUp.min.js') }}" type="text/javascript"></script>
@yield('scripts')
<script type='text/javascript' src="{{ asset('tp_390/js/logging.js') }}"></script>
</body>

</html>