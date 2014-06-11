@extends('tp_391.layouts.default')

{{-- Content --}}
@section('content')

<div id="content-wrapper">
	<div class="container">
			<!-- crumbs -->
			<div class="whole-width crumbs">您现在的网站位置: <a href="{{{ URL::to('/') }}}">{{{ Lang::get('site/default.home') }}}</a>  {{{ Lang::get('site/default.contact') }}}
</div>
		</div>
		<!-- title -->
		<div class="title">
			<div class="left-arr"></div>
			<div class="right-arr"></div>
			<div class="container">
				<div class="columns ten alpha title-inner">
					<h1>{{{ Lang::get('site/default.contact') }}}</h1>
					<p>{{ String::tidy(strip_tags($setting->contact, '<p><a>')) }} </p>
				</div>
				<div class="columns six omega icons">
					<a href="index.html" class="ico-home"><span>Home</span></a><a href="contact.html" class="ico-contact"><span>Contact</span></a><a href="#" class="ico-sitemap"><span>Sitemap</span></a>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<!-- /title -->
		<div class="separator31"></div>


		<div class="map-box">
			 <div id="map_canvas">
                 <!--img src="http://maps.googleapis.com/maps/api/staticmap?center=
                 {{ $setting->address }}&zoom=13&size=984x356&markers=color:blue%7Clabel:S%7C11211&sensor=true"/-->
         <img src="{{ asset('tp_391/images/map-large.png') }}" width="984"
       </div>
		</div>
		<div class="container">

			<div class="columns four">
				<h3 class="sub-title cont-title-aside">{{{ Lang::get('site/default.contact') }}}</h3>
				<div class="separator2"></div>
				<div class="address-line">{{{ $setting->address }}}</div>
				<div class="phone-line">联系号码: {{{ $setting->service_phone }}}</div>
				<div class="email-line">联系邮箱: <a href="{{{ $setting->master_email }}}">{{{ $setting->master_email }}}</a></div>
				<div class="website-line">网址: <a href="#">{{{ $setting->site_url }}}</a></div>
			</div>

			 <div class="clear"></div>
			<div class="separator28"></div>
		</div>
	</div>

@stop