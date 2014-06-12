@extends('tp_391.layouts.default')

{{-- Content --}}
@section('content')
<div id="content-wrapper">
    <div class="container">
        <!-- crumbs -->
        <div class="whole-width crumbs">
            您现在的网站位置: <a href="{{{ URL::to('/') }}}">{{{ Lang::get('site/default.home') }}}</a> {{{ Lang::get('site/default.recruits') }}}
        </div>
    </div>
    <!-- title -->
    <div class="title">
        <div class="left-arr"></div>
        <div class="right-arr"></div>
        <div class="container">
            <div class=" alpha title-inner">
                <div style="margin-left:30px;">
                    <h1>{{{ Lang::get('site/default.recruits') }}}</h1>
                    <p>{{ strip_tags(String::tidy($setting->recruits), '') }} </p>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <!-- /title -->

    <div class="container">
        <div class="separator35"></div>

        <!-- Left Part -->
        <div class="columns twelve">

            <!-- Blog Item -->
            <div class="post-entry">
                <h2><a href="{{{ URL::to('/recruits/'.$recruit->id.'/show') }}}">{{{ $recruit->recruit_name }}}</a></h2>
                <div class="post-info">
                    <div class="post-date">&nbsp;&nbsp;<strong>{{{ $recruit->id }}}</strong></div>
                    <div class="post-comments">&nbsp;&nbsp;</div>

                    <div class="line-grey"></div>
                    <div class="post-categories">
                        <div style="margin-left:30px; margin-top:18px;"><small>更新时间:</small> <br/><a href="#">{{{ $recruit->updated_at->format('Y-M-d') }}}</a></div>	</div>
                </div>
                <div class="post-body">
                    <p><small>{{{ Lang::get('general.recruit_man') }}} {{ $recruit->recruit_count }} {{{ Lang::get('general.man') }}}</small></p>
                    <br/>
                    <p>
                        {{ $recruit->recruit_content }}
                    </p>

                </div>
            </div>
            <!-- /Blog Item -->

            <div class="separator29"></div>
        </div>
        <!-- Left Part -->


        <!-- Right Part -->
        <div class="columns four blog-aside">
            <h3 class="sidebar-titles">网站栏目</h3>
            <ul class="list_type8 categories-list">
                <li><a href="{{{ URL::to('introductions') }}}"> {{{ Lang::get('site/default.introductions') }}}</a></li>
                <li><a href="{{{ URL::to('businesses') }}}"> {{{ Lang::get('site/default.businesses') }}}</a></li>
                <li><a href="{{{ URL::to('infos') }}}"> {{{ Lang::get('site/default.news') }}}</a></li>
                <li><a href="{{{ URL::to('contact/show') }}}"> {{{ Lang::get('site/default.contact') }}}</a></li>
                <li><a href="{{{ URL::to('recruits') }}}"> {{{ Lang::get('site/default.recruits') }}}</a></li>
            </ul>
            <div class="dbl-dott-wrapper"></div>
            <div class="separator11"></div>

            <h3 class="sidebar-titles">最新新闻</h3>
            <ul class="recent-posts-side">
                @foreach ($infos as $info)
                <li>
                    <a href="{{ URL::to('files/image?name=') }}{{{ $info->image }}}" class="fancybox left-image"><img src="{{ URL::to('files/image?name=') }}{{{ $info->image }}}" style="width:60px; height:32px" alt="" /> <span class="over-bg-portfolio"></span></a>
                    <a href="{{{ URL::to('/infos/'.$info->id.'/show') }}}">{{{ $info->info_name }}}</a>
                    <em>{{{ $info->created_at->format('Y-M-d') }}}</em>
                </li>
                @endforeach
            </ul>

            <div class="dbl-dott-wrapper"></div>
            <div class="separator12"></div>
        </div>
        <!-- /Right Part -->


        <div class="clear"></div>
    </div>
</div>
@stop