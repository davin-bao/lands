@extends('tp_390.layouts.default')

{{-- Content --}}
@section('content')

    <div id="templatemo_business" class="section1">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="secHeader">
              <h1 class="text-center">{{{ Lang::get('site/title.service_title') }}}</h1>
              <p class="text-center"><small> {{ $setting->services }}</small></p>
            </div>
            <div class="row">
              @if ($service_id = 0) @endif
              @foreach ($services as $service)
              <div class="col-xs-6 col-sm-6 col-md-3">
                <div class="blok text-center">
                  <div class="hexagon-a">
                    <a class="hlinktop" href="#">
                      <div class="hexa-a">
                        <div class="hcontainer-a">
                          <div class="vertical-align-a">
                            @if ($service_id == 0)
                            <span class="texts-a"><i class="fa fa-bell"></i></span>
                            @elseif ($service_id == 1)
                            <span class="texts-a"><i class="fa fa-rocket"></i></span>
                            @elseif ($service_id == 2)
                            <span class="texts-a"><i class="fa fa-mobile-phone"></i></span>
                            @else
                            <span class="texts-a"><i class="fa fa-tags"></i></span>
                            @endif
                            @if ($service_id = $service_id+1) @endif
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>  
                  <div class="hexagon">
                    <a class="hlinkbott" href="#">
                      <div class="hexa">
                        <div class="hcontainer">
                          <div class="vertical-align">
                            <span class="texts"></span>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <h4>{{{ $service->business_name }}}</h4>
                  <p><small>{{{ String::tidy(Str::limit($service->business_content, 100)) }}}</small></p>
                  <a class="btn btn-primary" href="#">Read More</a>
                </div>
              </div>
              @endforeach
          </div>
          </div>
        </div>
      </div>
    </div> <!-- e/o section1 -->

    <div id="templatemo_infos" class="section2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="secHeader">
                    <h1 class="text-center">{{{ Lang::get('site/title.info_title') }}}</h1>
                    <p class="text-center"><small>Nam scelerisque dui ultricies mollis interdum. Aenean at lectus quis risus pretium placerat. Sed consectetur bibendum pharetra. Mauris tincidunt a augue nec porta. Fusce porttitor leo est, id convallis erat pretium sed.</small></p>
                </div>
                <div class="glView">

                    <div class="imgSwitch">
                        <div class="row">
                            @foreach ($infos as $info)
                            <div class="col-xs-6 col-sm-3 col-md-3 prod-cnt webdesign dbox-list" style="opacity: 1;">
                                <div class="itemCont">
                                    <a href="http://www.cssmoban.com/">
                                        <div class="itemInfo">
                                            <h4>{{{ $info->info_name }}}</h4>
                                            <h6>Webdesign</h6>
                                            <p>{{ String::tidy(Str::limit($info->info_content, 200)) }} </p>
                                        </div>
                                    </a>
                                    <button type="button" class="btn btn-primary goto">view</button>
                                </div>
                            </div>
                            @endforeach
                        <div class="loadit"><button type="button" class="btn btn-primary">Load More</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- e/o section2 -->

    <div id="templatemo_about" class="section3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="secHeader">
              <h1 class="text-center"><a class="text-title" href="#" target="_blank">{{{ Lang::get('site/title.introductions_title') }}}</a></h1>
              <p class="text-center"><small>{{ $setting->company_instroductions }}</small></p>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- e/o section3 -->
    <div id="templatemo_contact" class="section4">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="secHeader">
              <h1 class="text-center">{{{ Lang::get('site/title.contact') }}}</h1>
              <p class="text-center"><small>{{ $setting->contact }}</small></p>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="templatemo_maps">
              <div class="fluid-wrapper">
                 <img src="http://maps.googleapis.com/maps/api/staticmap?center={{ $setting->address }}&zoom=13&size=1500x400&markers=color:blue%7Clabel:S%7C11211&sensor=true"/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- eo section 5 -->

    <div id="templatemo_recruit" class="section5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="secHeader">
              <h1 class="text-center">{{{ Lang::get('site/title.recruits') }}}</h1>
              <p class="text-center"><small>{{{ String::tidy(Str::limit($setting->recruits, 300)) }}}</small></p>
            </div>
          </div>
        </div>
      </div>
      <div class="glView">

        <div class="imgSwitch">
          <div class="row">
            @foreach ($recruits as $recruit)
            <div class="col-xs-6 col-sm-3 col-md-3 prod-cnt webdesign dbox-list" style="opacity: 1;">
              <div class="itemCont">
                <a href="http://www.cssmoban.com/">
                  <div class="itemInfo">
                    <h4>{{{ $recruit->recruit_name }}}</h4>
                    <h6>{{{ $recruit->recruit_count }}} {{{ Lang::get('general.man') }}}</h6>
                    <p>{{ String::tidy(Str::limit($recruit->recruit_content, 200)) }} </p>
                  </div>
                </a>
                <button type="button" class="btn btn-primary goto">view</button>
              </div>
            </div>
            @endforeach
            <div class="loadit"><button type="button" class="btn btn-primary">Load More</button></div>
          </div>
        </div>

    </div> <!-- eo section 6 -->

      <div class="bfWrap text-center">
        <div class="templatemo_footer">Copyright © 2014 {{{ $setting->company_name }}}
          @if (!Auth::check())| <a href="{{{ URL::to('user/login') }}}">{{{ Lang::get('general.login') }}}</a> @endif| Collect from <a href="http://{{{ $setting->site_url }}}/" title="{{{ $setting->company_name }}}" target="_blank">{{{ $setting->company_name }}}</a></div>
      </div>

@stop

{{-- Scripts --}}
@section('scripts')

    <script type="text/javascript">
      $(function(){
          var default_view = 'grid';
          if($.cookie('view') !== 'undefined'){
              $.cookie('view', default_view, { expires: 7, path: '/' });
          } 
          function get_grid(){
              $('.list').removeClass('list-active');
              $('.grid').addClass('grid-active');
              $('.prod-cnt').animate({opacity:0},function(){
                  $('.prod-cnt').removeClass('dbox-list');
                  $('.prod-cnt').addClass('dbox');
                  $('.prod-cnt').stop().animate({opacity:1});
              });
          }
          function get_list(){
              $('.grid').removeClass('grid-active');
              $('.list').addClass('list-active');
              $('.prod-cnt').animate({opacity:0},function(){
                  $('.prod-cnt').removeClass('dbox');
                  $('.prod-cnt').addClass('dbox-list');
                  $('.prod-cnt').stop().animate({opacity:1});
              });
          }
          if($.cookie('view') == 'list'){ 
              $('.grid').removeClass('grid-active');
              $('.list').addClass('list-active');
              $('.prod-cnt').animate({opacity:0});
              $('.prod-cnt').removeClass('dbox');
              $('.prod-cnt').addClass('dbox-list');
              $('.prod-cnt').stop().animate({opacity:1}); 
          } 

          if($.cookie('view') == 'grid'){ 
              $('.list').removeClass('list-active');
              $('.grid').addClass('grid-active');
              $('.prod-cnt').animate({opacity:0});
                  $('.prod-cnt').removeClass('dboxlist');
                  $('.prod-cnt').addClass('dbox');
                  $('.prod-cnt').stop().animate({opacity:1});
          }

          $('#list').click(function(){   
              $.cookie('view', 'list'); 
              get_list()
          });

          $('#grid').click(function(){ 
              $.cookie('view', 'grid'); 
              get_grid();
          });

          /* filter */
          $('.menuSwitch ul li').click(function(){
              var CategoryID = $(this).attr('category');
              $('.menuSwitch ul li').removeClass('cat-active');
              $(this).addClass('cat-active');
              
              $('.prod-cnt').each(function(){
                  if(($(this).hasClass(CategoryID)) == false){
                     $(this).css({'display':'none'});
                  };
              });
              $('.'+CategoryID).fadeIn(); 
              
          });
      });
    </script>

    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
          prevText: '',
          nextText: '',
          controlNav: false,
        });
    });
    </script>
    <script>
      $(document).ready(function(){

        // hide #back-top first
        $("#back-top").hide();
        
        // fade in #back-top
        $(function () {
          $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
              $('#back-top').fadeIn();
            } else {
              $('#back-top').fadeOut();
            }
          });

          // scroll body to 0px on click
          $('#back-top a').click(function () {
            $('body,html').animate({
              scrollTop: 0
            }, 800);
            return false;
          });
        });

      });
      </script>
      <script type="text/javascript">
      <!--
          function toggle_visibility(id) {
             var e = document.getElementById(id);
             if(e.style.display == 'block'){
                e.style.display = 'none';
                $('#togg').text('show footer');
            }
             else {
                e.style.display = 'block';
                $('#togg').text('hide footer');
            }
          }
      //-->
      </script>

      <script type="text/javascript">
      $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
      });
      </script>
      <script type="text/javascript">
        //initiating jQuery
        jQuery(function($) {
          $(document).ready( function() {
            //enabling stickUp on the '.navbar-wrapper' class
            $('.mWrapper').stickUp();
          });
        });
      </script>
      
@stop
