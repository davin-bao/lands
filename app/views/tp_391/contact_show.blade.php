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
					<p>{{ String::tidy(Str::limit(strip_tags($setting->contact, '<p><a>'), 80)) }} </p>
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
                 <img src="http://maps.googleapis.com/maps/api/staticmap?center={{ $setting->address }}&zoom=13&size=984x356&markers=color:blue%7Clabel:S%7C11211&sensor=true"/>
             </div>
		</div>
		<div class="container">

			<div class="columns four">
				<h3 class="sub-title cont-title-aside">{{{ Lang::get('site/default.contact') }}}</h3>
				<div class="separator2"></div>
				<div class="address-line">{{{ $setting->address }}}</div>
				<div class="phone-line">Phone: {{{ $setting->service_phone }}}</div>
				<div class="fax-line">Mobile: {{{ $setting->mobile }}}</div>
				<div class="email-line">E-mail: <a href="{{{ $setting->master_email }}}">{{{ $setting->master_email }}}</a></div>
				<div class="website-line">Website: <a href="#">{{{ $setting->site_url }}}</a></div>
			</div>
			<div class="columns twelve send-mess">
				<h3 class="sub-title">留言</h3>
				<div class="separator2"></div>
				<form action="#" method="post" class="contact-form" id="SendContact" />
					<div class="columns four alpha">
						<label class="required">姓名</label>
						<input type="text" name="n-name" value="" class="required" />
					</div>
					<div class="columns four">
						<label class="required">Email</label>
						<input type="text" name="n-email" value="" class="required email" />
					</div>
					<div class="columns four omega">
						<label>标题</label>
						<input type="text" value="" name="n-subject" />
					</div>
					<div class="clear"></div>

					<label class="required">内容</label>
					<textarea cols="100" rows="10" class="required" name="n-mess"></textarea>

					<input type="submit" value="Send message" class="submit-btn" />
				</form>
			</div>
			 <div class="clear"></div>
			<div class="separator28"></div>
		</div>
	</div>

@stop