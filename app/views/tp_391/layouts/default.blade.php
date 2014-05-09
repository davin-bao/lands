<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Beautiful - Responsive HTML5/CSS3 Template by WebVision -->

    <!-- ~~~~~~ META & TITLE ~~~~~~ -->
    <meta charset="utf-8" />
    <title>{{{ $setting->company_name }}}</title>

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

    <!-- ~~~~~~ CSS ~~~~~~ -->
    <link rel="stylesheet" href="{{ asset('tp_391/layout/styles/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('tp_391/layout/styles/skeleton.css') }}" />
    <link rel="stylesheet" href="{{ asset('tp_391/layout/styles/layout.css') }}" />

    <!-- Fancybox plugin -->
    <link rel="stylesheet" href="{{ asset('tp_391/layout/scripts/fancybox/styles/jquery.fancybox.css') }}" type="text/css" media="screen" />

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="{{ asset('tp_391/layout/styles/ie7.css') }}" >
    <![endif]-->


    <link href="{{ asset('tp_391/layout/styles/fonts.css') }}" rel="stylesheet" type="text/css" />

    <!-- ~~~~~~ COLORS ~~~~~~ -->
    <link href="{{ asset('tp_391/layout/styles/colors.css') }}" rel="stylesheet" type="text/css" />


    <!-- Modernizr -->
    <script type="text/javascript" src="{{ asset('tp_391/layout/scripts/lib/modernizr.js') }}"></script>



    <script type="text/javascript" src="{{ asset('tp_391/layout/scripts/lib/jquery-latest.min.js') }}"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<div class="wrapper">
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ PAGE -->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
											 HEADER
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<header id="header-wrapper">
    <div class="container upper-container">
        <!-- upper part: contact info -->
        <div class="header-upper" id="header-upper">
            <div class="four columns">
                <div class="map-iframe">
                    <img src="http://maps.googleapis.com/maps/api/staticmap?center={{ $setting->address }}&zoom=13&size=420x182&markers=color:blue%7Clabel:S%7C11211&sensor=true"/>
                </div>
            </div>
            <div class="six  columns contact-datails">
                <h3 class="font_dosis">{{{ Lang::get('site/default.contact') }}}</h3>
                <p class="bott-line">{{ String::tidy(Str::limit(strip_tags($setting->contact, '<p><a>'), 100)) }}</p>
                <div class="address-line">{{{ $setting->address }}}</div>
                <div class="part-left">
                    <div class="phone-line">Phone: {{{ $setting->service_phone }}}</div>
                    <div class="fax-line">Mobile: {{{ $setting->mobile }}}</div>
                </div>
                <div class="part-right">
                    <div class="email-line">E-mail: <a href="{{{ $setting->master_email }}}">{{{ $setting->master_email }}}</a></div>
                    <div class="website-line">Website: <a href="#">{{{ $setting->site_url }}}</a></div>
                </div>
            </div>
            <div class="six  columns contact-upper-form">
                <h3>留言</h3>
                <form action="#" method="post" />
                <input type="text" value="" placeholder="Name*" />
                <input type="text" value="" placeholder="Email*" />
                <textarea cols="50" rows="3" placeholder="Message*"></textarea>
                <input type="submit" value="{{{ Lang::get('button.submit') }}}" class="submit-btn" />
                </form>
            </div>

            <a href="#header-upper" class="toggle-upper close">Toggle Upper</a>
        </div>
    </div>

    <!-- top part: sign / registration -->
    <div id="header-top">
        <a href="#header-upper" class="toggle-upper">Toggle Upper</a>
        <div class="container">
            <div class="half-left">
                <a href="{{{ $setting->master_email }}}">{{{ $setting->master_email }}}</a>
            </div>
            <div class="half-right">
                @if (Auth::check())
                    <a href="{{{ URL::to('admin') }}}"><i class="icon-wrench"></i> {{{ Lang::get('general.admin_panel') }}}</a>
                    <a class="left_wrapper" href="{{{ URL::to('user/settings') }}}"><i class="icon-wrench"></i> {{{ Lang::get('admin/menu.profile') }}}</a>
                    <a class="left_wrapper" href="{{{ URL::to('user/logout') }}}"><i class="icon-share"></i> {{{ Lang::get('admin/menu.signout') }}}</a>
                @else
                <a href="{{{ URL::to('user/login') }}}">{{{ Lang::get('general.login') }}}</a>
                @endif
            </div>
            <div class="clear"></div>

        </div>
    </div>
    <!-- middle part: logo / tagline / contact info / menu -->
    <div id="header-middle">
        <div class="container">
            <!-- logo / tagline-->
            <div class="two-thirds column">
                <div class="logo-slogan">
                    <div class="logo"><a href="index.html"><img src="{{ asset('tp_391/layout/styles/images/blue/logo.gif') }}" alt="" width="150" height="32" /></a></div>
                    <!-- text: <div class="logo font_gautami"><a href="index.html"><img src="layout/styles/images/blue/footer-logo.png" alt="BeautyMind"></a></div> -->
                    <div class="slogan">    </div>
                </div>
                <div class="tagline">
                    地源网络，专业土地流转专家.
                </div>
            </div>
            <!-- contact info -->
            <div class="one-third column info">
                <div class="phone"><small>{{{ Lang::get('site/default.contact') }}}: </small>
                    <mark>{{{ $setting->service_phone }}}</mark>
                </div>
                <div class="social_links">
                    <!-- src ->  grey;
                         data-icon -> colored -->
                    <a href="#"><img src="{{ asset('tp_391/layout/styles/images/backgrounds/ico/h-ico.png') }}" data-icon="{{ asset('tp_391/layout/styles/images/blue/ico.png') }}" alt="twitter" /></a>
                    <a href="#"><img src="{{ asset('tp_391/layout/styles/images/backgrounds/ico/h-ico-02.png') }}" data-icon="{{ asset('tp_391/layout/styles/images/blue/ico-02.png') }}" alt="facebook" /></a>
                    <a href="#"><img src="{{ asset('tp_391/layout/styles/images/backgrounds/ico/h-ico-03.png') }}" data-icon="{{ asset('tp_391/layout/styles/images/blue/ico-03.png') }}" alt="StubleUpon" /></a>
                    <a href="#"><img src="{{ asset('tp_391/layout/styles/images/backgrounds/ico/h-ico-04.png') }}" data-icon="{{ asset('tp_391/layout/styles/images/blue/ico-04.png') }}" alt="digg" /></a>
                    <a href="#"><img src="{{ asset('tp_391/layout/styles/images/backgrounds/ico/h-ico-05.png') }}" data-icon="{{ asset('tp_391/layout/styles/images/blue/ico-05.png') }}" alt="vimeo" /></a>
                    <a href="#"><img src="{{ asset('tp_391/layout/styles/images/backgrounds/ico/h-ico-06.png') }}" data-icon="{{ asset('tp_391/layout/styles/images/blue/ico-06.png') }}" alt="youtube" /></a>
                </div>
            </div>
        </div>
    </div>

    <!-- middle part: logo / tagline / contact info / menu -->
    <div id="header-bottom" class="container">
        <div class="header-bottom-wrapper">
            <nav class="twelve columns alpha" id="main-menu-wrapper">
                <ul id="main-menu">


                    <li><a href="{{{ URL::to('/') }}}"><i class="icon-home"></i> {{{ Lang::get('site/default.home') }}}</a></li>
                    <li><a href="#"><i class="icon-exclamation-sign"></i> {{{ Lang::get('site/default.businesses') }}}</a>
                        <ul>
                            @foreach ($services as $service)
                            <li><a href="{{{ URL::to('businesses/'.$service->id.'/show') }}}"> {{ $service->business_name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{{ URL::to('infos') }}}"><i class="icon-tags"></i> {{{ Lang::get('site/default.news') }}}</a></li>
                    <li><a href="{{{ URL::to('introductions') }}}"><i class="icon-eye-open"></i> {{{ Lang::get('site/default.introductions') }}}</a></li>
                    <li><a href="{{{ URL::to('contact/show') }}}"><i class="icon-glass"></i> {{{ Lang::get('site/default.contact') }}}</a></li>
                    <li><a href="{{{ URL::to('recruits') }}}"><i class="icon-glass"></i> {{{ Lang::get('site/default.recruits') }}}</a></li>
                </ul>
                <select id="main-menu-mobile">
                    <option value="#" />跳转到
                    <option value="{{{ URL::to('/') }}}" />&nbsp;-&nbsp;{{{ Lang::get('site/default.home') }}}
                    <option value="{{{ URL::to('businesses') }}}" />&nbsp;-&nbsp;{{{ Lang::get('site/default.businesses') }}}
                    @foreach ($services as $service)
                    <option value="{{{ URL::to('businesses/'.$service->id.'/show') }}}" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ $service->business_name }}
                    @endforeach

                    <option value="{{{ URL::to('infos') }}}" />&nbsp;-&nbsp;{{{ Lang::get('site/default.news') }}}

                    <option value="{{{ URL::to('introductions') }}}" />&nbsp;&nbsp;{{{ Lang::get('site/default.introductions') }}}
                    <option value="{{{ URL::to('contact/show') }}}" />&nbsp;&nbsp;{{{ Lang::get('site/default.contact') }}}
                    <option value="{{{ URL::to('recruits') }}}" />&nbsp;-&nbsp;{{{ Lang::get('site/default.recruits') }}}
                </select>
            </nav>
            <div class="four columns omega">
                <form action="#" method="post" class="search_block" />
                <input type="text" value="搜索新闻 " onFocus="if(this.value=='搜索新闻 ')this.value='';" onBlur="if(this.value=='')this.value='搜索新闻 ';" />
                <input type="submit" value="" />
                </form>
            </div>
        </div>
    </div>
</header>
<!-- end header -->
<!-- Notifications -->
@include('tp_391.common.notifications')
<!-- ./ notifications -->
<!-- Content -->
@yield('content')
<!-- ./ content -->

<!-- FOOTER -->
<footer id="footer-wrapper">
    <!-- bottom part  -->
    <div id="footer-bottom">
        <!--
			<div id="footer-bottom-arr"></div>
            -->
        <div class="container">
            <!-- copyrights -->
            <div class="one-third column copyrights">
                <p>&copy; Copyright &copy; 2014.地源网络 All rights reserved.</p>
            </div>
            <a href="#top" class="backtop" title="Page Up"><!-- Upper --></a>
        </div>
    </div>
</footer>
<!-- end footer -->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ End Document -->
</div><!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ JS -->
<!-- ~~~ LIBS ~~~ -->
<script type="text/javascript" src="{{ asset('tp_391/layout/scripts/lib/jquery-latest.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('tp_391/layout/scripts/lib/jquery.easing.1.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('tp_391/layout/scripts/lib/jquery.mousewheel-3.0.6.pack.js') }}"></script>
<script type="text/javascript" src="{{ asset('tp_391/layout/scripts/lib/jquery.backgroundPosition.js') }}"></script>
<script type="text/javascript" src="{{ asset('tp_391/layout/scripts/lib/respond.src.js') }}"></script>
<!-- ~~~ FANCYBOX PLUGIN ~~~ -->
<script type="text/javascript" src="{{ asset('tp_391/layout/scripts/fancybox/jquery.fancybox.pack.js') }}"></script>
<script type="text/javascript" src="{{ asset('tp_391/layout/scripts/fancybox/helpers/jquery.fancybox-media_cdea843a.js') }}"></script>
<!-- ~~~ Necessary for Sorted ~~~ -->
<script type="text/javascript" src="{{ asset('tp_391/layout/scripts/lib/jquery.easing.1.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('tp_391/layout/scripts/quicksand/jquery.quicksand.js') }}"></script>
<script type="text/javascript" src="{{ asset('tp_391/layout/scripts/quicksand/quicksand.js') }}"></script>
<!-- ~~~ BEAUTYMIND JS ~~~ -->
<script type="text/javascript" src="{{ asset('tp_391/layout/scripts/beautymind.js') }}"></script>
<!-- Beautiful - Responsive HTML5/CSS3 Template by WebVision -->

<!-- ~~~~~~ LOAD FONTS ~~~~~~ -->
<link href="http://fonts.googleapis.com/css?family=Dosis:300,600,700,800" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css" />
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
@yield('scripts')

<script>
    $(document).ready(function(){
        $("#main-menu li a").removeClass('active');

        $("#main-menu li a").each(function() {
            var href = window.location.href;
            if(href == $(this).attr('href')){
                $(this).addClass('active');
            }
        });
    });
</script>
</body>
</html>
