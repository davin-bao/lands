@extends('tp_391.layouts.default')

{{-- Content --}}
@section('content')
    <div id="content-wrapper">
    <div class="container">
        <!-- crumbs -->
        <div class="whole-width crumbs">
您现在的网站位置: <a href="{{{ URL::to('/') }}}">{{{ Lang::get('site/default.home') }}}</a> {{{ Lang::get('site/default.news') }}}
        </div>
    </div>
    <!-- title -->
    <div class="title">
        <div class="left-arr"></div>
        <div class="right-arr"></div>
        <div class="container">
            <div class="alpha title-inner">
                <div style="margin-left:30px;">
                    <h1>{{{ Lang::get('site/default.news') }}}</h1>
                    <p>地源网络公司最新新闻动态 </p>
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
            <div >
                <h2><a href="{{{ URL::to('/infos/'.$info->id.'/show') }}}">{{{ $info->info_name }}}</a></h2>
                <div class="post-entry">
                    <small>更新时间:<a href="#">{{{ $info->updated_at->format('Y年m月d日') }}}</a></small>

                <div>

                    @if($info->image!="")
                    <div class="post-image"><a href="{{ URL::to('files/image?name=') }}{{{ $info->image }}}" class="fancybox post-preview"><img src="{{ URL::to('files/image?name=') }}{{{ $info->image }}}" alt="" class="width:549px;height:209px;" /> <span class="over-bg-portfolio"><!-- over --></span></a></div>
                    @endif
                    <br/>
                    <p>
                        {{ $info->info_content }}
                    </p>

                </div>
                </div>

            </div>
            <!-- /Blog Item -->
            <!-- JiaThis Button BEGIN -->
            <div class="jiathis_style">
                <span class="jiathis_txt">分享到：</span>
                <a class="jiathis_button_tools_1"></a>
                <a class="jiathis_button_tools_2"></a>
                <a class="jiathis_button_tools_3"></a>
                <a class="jiathis_button_tools_4"></a>
                <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更
                    多</a>
                <a class="jiathis_counter_style"></a>
            </div>
            <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
            <!-- JiaThis Button END -->

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