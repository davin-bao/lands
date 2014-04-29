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
                  <p><small>{{ String::tidy(Str::limit($service->business_content, 120)) }}</small></p>
                  <a class="btn btn-primary read-more" data-id="{{{ $service->id }}}" href="#">{{{ Lang::get('button.read_more') }}}</a>
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
                    <p class="text-center"><small>&nbsp;</small></p>
                </div>
                <div class="glView">

                    <div class="imgSwitch">
                        <div class="row">
                            @foreach ($infos as $info)
                            <div class="col-xs-6 col-sm-3 col-md-3 prod-cnt webdesign dbox-list" style="opacity: 1;">
                                <div class="itemCont">
                                  <a href="#">
                                  <div class="itemInfo">
                                    <h4>{{{ $info->info_name }}}</h4>
                                    <h6>{{{ $info->created_at }}}</h6>
                                    <p>{{ String::tidy(Str::limit(strip_tags($info->info_content, '<p><a>'), 100)) }} </p>
                                  </div>
                                   </a>
                                  <button type="button" class="btn btn-primary goto" data-id="{{{ $info->id }}}">{{{ Lang::get('button.view') }}}</button>
                                </div>
                            </div>
                            @endforeach
                    </div>
                      <div class="loadit"><button type="button" class="btn btn-primary load-more" data-offset="1">{{{ Lang::get('button.load_more') }}}</button></div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div><!-- e/o section2 -->
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
    </div> <!-- eo section4 -->
    <div id="templatemo_recruit" class="section5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="secHeader">
              <h1 class="text-center">{{{ Lang::get('site/title.recruits') }}}</h1>
              <p class="text-center"><small>{{ String::tidy(Str::limit(strip_tags($setting->recruits, '<p><a>'), 100)) }}</small></p>
            </div>
              <div class="glView">

                  <div class="imgSwitch">
                      <div class="row">
                          @foreach ($recruits as $recruit)
                          <div class="col-xs-6 col-sm-3 col-md-3 prod-cnt webdesign dbox-list" style="opacity: 1;">
                              <div class="itemCont">
                                  <a href="#">
                                      <div class="itemInfo">
                                          <h4>{{{ $recruit->recruit_name }}}</h4>
                                          <h6>{{{ $recruit->recruit_count }}} {{{ Lang::get('general.man') }}}</h6>
                                          <p>{{ strip_tags(String::tidy(Str::limit($recruit->recruit_content, 100)), '<p><a>') }} </p>
                                      </div>
                                  </a>
                                  <button type="button" class="btn btn-primary goto" data-id="{{{ $recruit->id }}}">{{{ Lang::get('button.view') }}}</button>
                              </div>
                          </div>
                          @endforeach
                      </div>
                      <div class="loadit"><button type="button" class="btn btn-primary load-more" data-offset="1">{{{ Lang::get('button.load_more') }}}</button></div>

                  </div> <!-- eo section 6 -->
              </div>
          </div>
        </div>
      </div>
      </div><!-- eo section5 -->


      <!-- Modal -->
      <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><i class="ion ion-loading-c"></i></h4>
            </div>
            <div class="modal-body"><div class="text-center"><i class="ion ion-loading-c"></i></div></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
@stop


{{-- footer --}}
@section('footer')
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

      <script>
        $(document).ready(function(){

          $("#templatemo_business .read-more").click(function(){

            showModal();

            $.ajax({
              url: "businesses/"+$(this).attr('data-id')+"/show_ajax",
              type:"GET",
              dataType : "json"
            }).done(function(data) {
              if(data.result){
                $("#newModal .modal-title").html(data.title);
                $("#newModal .modal-body").html(data.content);
              }else{
                $("#newModal .modal-title").html("Error");
                $("#newModal .modal-body").html(data.message);
              }
            });
          });

            openRecruitDetailModalAction();
            openInfoDetailModalAction();
          ///Load more
            $("#templatemo_recruit .load-more").click(function(){

                $.ajax({
                    url: "recruits/more_ajax?offset="+$(this).attr("data-offset"),
                    type:"GET",
                    dataType : "json"
                }).done(function(data) {
                    if(data.result){
                        for(var i=0;i<data.list.length;i++) {
                            $("#templatemo_recruit .imgSwitch .row").append(getOneInfo(data.list[i].id, data.list[i].title," {{{ Lang::get('general.recruit_man') }}}: " +  data.list[i].count + " {{{ Lang::get('general.man') }}}", data.list[i].content));
                        }
                        openRecruitDetailModalAction();
                    }
                });
                $(this).attr('data-offset', parseInt($(this).attr('data-offset'))+1);
            });

            $("#templatemo_infos .load-more").click(function(){

                $.ajax({
                    url: "infos/more_ajax?offset="+$(this).attr("data-offset"),
                    type:"GET",
                    dataType : "json"
                }).done(function(data) {
                    if(data.result){
                        for(var i=0;i<data.list.length;i++) {
                            $("#templatemo_infos .imgSwitch .row").append(getOneInfo(data.list[i].id, data.list[i].title, data.list[i].created_at.date, data.list[i].content));
                        }
                        openInfoDetailModalAction();
                    }
                });
                $(this).attr('data-offset', parseInt($(this).attr('data-offset'))+1);
            });
        });

        function openRecruitDetailModalAction(){
            $("#templatemo_recruit .goto").click(function(){
                showModal();
                $.ajax({
                    url: "recruits/"+$(this).attr('data-id')+"/show_ajax",
                    type:"GET",
                    dataType : "json"
                }).done(function(data) {
                    if(data.result){
                        $("#newModal .modal-title").html(data.title);
                        $("#newModal .modal-body").html(" {{{ Lang::get('general.recruit_man') }}}: "+data.count + " {{{ Lang::get('general.man') }}}"+"<br/>"+ data.content);
                    }else{
                        $("#newModal .modal-title").html("Error");
                        $("#newModal .modal-body").html(data.message);
                    }
                });
            });
        }

        function openInfoDetailModalAction(){
            $("#templatemo_infos .goto").on('click', function(){
                showModal();
                $.ajax({
                    url: "infos/"+$(this).attr('data-id')+"/show_ajax",
                    type:"GET",
                    dataType : "json"
                }).done(function(data) {
                    if(data.result){
                        $("#newModal .modal-title").html(data.title);
                        $("#newModal .modal-body").html(data.content);
                    }else{
                        $("#newModal .modal-title").html("Error");
                        $("#newModal .modal-body").html(data.message);
                    }
                });
            });
        }

        function showModal(){
          $("#newModal .modal-title").html('<i class="ion ion-loading-c"></i></div>');
          $("#newModal .modal-body").html('<div class="text-center"><i class="ion ion-loading-c"></i></div>');

          $("#newModal").modal({
            backdrop:true,
            show: true
          });
        };


        function getOneInfo(id, title, created_at, content){
            return '<div class="col-xs-6 col-sm-3 col-md-3 prod-cnt webdesign dbox-list" style="opacity: 1;">\
                <div class="itemCont">\
                <a href="#">\
                <div class="itemInfo">\
                <h4>'+title+'</h4>\
              <h6>'+created_at+'</h6>\
              <p>'+content+'</p>\
            </div>\
            </a>\
            <button type="button" class="btn btn-primary goto" data-id="'+id+'">{{{ Lang::get('button.view') }}}</button>\
            </div>\
            </div>';
        }

      </script>
@stop
