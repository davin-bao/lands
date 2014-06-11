@extends('tp_391.layouts.default')

{{-- Content --}}
@section('content')
<div id="content-wrapper">
<div class="container">

<!-- slider -->
<div id="slider">
    <ul>
        @if (isset($carousels) && $carousels->count()>0)
        @foreach ($carousels as $carousel)
        <li>
            <img src="{{ URL::to('files/image?name=') }}{{{ isset($carousel) ? $carousel->carousel_image : null }}}" alt="" />
            <div class="slider-text">
                <p> {{ String::tidy(Str::limit(strip_tags($carousel->carousel_content, ''), 80)) }}</p>
            </div>
        </li>
        @endforeach
        @else
        <li>
            <img {{ asset('tp_391/images/slider/slider3.jpg') }}" alt="" />
            <div class="slider-text">
                <h3><a href="#">Distracted the readable content</a></h3>
                <p>There are many variations of passages of available, majority have suffered alteration in some form.</p>
            </div>
        </li>
        <li>
            <img {{ asset('tp_391/images/slider/slider2.jpg') }}" alt="" />
            <div class="slider-text">
                <h3><a href="#">Distracted the readable content</a></h3>
                <p>There are many variations of passages in some form.</p>
            </div>
        </li>
        <li>
            <img {{ asset('tp_391/images/slider/slider1.jpg') }}" alt="" />
            <div class="slider-text">
                <h3><a href="#">Distracted the readable content</a></h3>
                <p>There are many variations of passages of available, majority have suffered alteration in some form.</p>
            </div>
        </li>
        @endif
    </ul>
</div>
<!-- end slider -->



<!-- Recent Projects -->
<div class="full-width sub-title">
    <h3>{{{ Lang::get('site/default.news') }}}</h3>
    <div id="recent-navi"></div>
</div>
<div class="separator2"></div>
<div class="recent-box">
    <div class="list_recent_over" id="recent-blog">
        <ul class="list_recent">
            @foreach ($infos as $info)
            <li>
                <div class="rec_img"> <img src="{{ URL::to('files/image?name=') }}{{{ $info->image }}}" style="width:300px;height:114px;" alt="" /> </div>
                <h5><a href="{{{ URL::to('/infos/'.$info->id.'/show') }}}">{{{ $info->info_name }}}</a></h5>
                <div class="rec_fade_context">
                    <div class="rec_fade_context_arrow"></div>
                    <p>{{ strip_tags(String::tidy(Str::limit($info->info_content, 100)), '') }}</p>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="hidder-right"></div>
    <div class="hidder-left"></div>
</div>
<!-- end Recent Projects -->

<!-- Blog, Service, Testemonials -->
<div class="eight columns">
    <h3 class="sub-title">最新招聘岗位</h3>
    <div class="separator9"></div>
    <ul class="recent_blog">
        @foreach ($recruits as $recruit)
        <li>
            <h5><a href="{{{ URL::to('/recruits/'.$recruit->id.'/show') }}}">{{ $recruit->recruit_name }}</a></h5>
            <div class="details">{{{ Lang::get('general.recruit_man') }}} {{ $recruit->recruit_count }} {{{ Lang::get('general.man') }}}</div>
            <p>{{ strip_tags(String::tidy(Str::limit($recruit->recruit_content, 100)), '<p><a>') }}</p>
        </li>
        @endforeach
    </ul>
</div>
<div class="four columns service-box">
    <h3 class="sub-title">我们的服务</h3>
    <div class="separator10"></div>
    <ul class="service_list">
        @foreach ($services as $service)
        <li>
            <h6><a href="{{{ URL::to('businesses/'.$service->id.'/show') }}}" class="toggle-link">{{ $service->business_name }}</a></h6>
            <div class="sub-text" id="Web">
                {{ strip_tags(String::tidy(Str::limit($service->service_content, 100)), '<p><a>') }}
            </div>
        </li>
        @endforeach
    </ul>
</div>
<div class="four columns testim-box">
    <h3 class="sub-title">公司简介 <span id="testim_navi"></span></h3>
    <div id="testimonials">
        <ul>
            <li>
                <p><img {{ asset('tp_391/layout/styles/images/backgrounds/ico/quote.png') }}" alt="" />
                    {{ strip_tags(String::tidy(Str::limit($setting->company_instroductions, 100)), '<p><a>') }}
            </li>
        </ul>
    </div>
</div>
<div class="clear"></div>
<!-- end Blog, Service, Testemonials -->

</div>
</div>
@stop
