@extends('admin_beauty.layouts.default')

@section('content_header')
{{{ Lang::get('admin/menu.carousels') }}}
<small>
  {{{ Lang::get('admin/carousels/title.management') }}}
</small>
@stop
{{-- breadcrumb --}}
@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> {{{ Lang::get('admin/menu.home') }}}</a></li>
<li class="active">{{{ Lang::get('admin/menu.carousels') }}}</li>
<li class="active">{{{ Lang::get('admin/general.edit') }}}</li>
@stop

{{-- Content --}}
@section('content')
<div class="box box-primary">

  {{-- Create Form --}}
  <form method="post" action="@if (isset($carousel)){{ URL::to('admin/carousels/' . $carousel->id . '/edit') }}@endif" autocomplete="off">
  <div class="box-body">
    <!-- Tabs -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-general" data-toggle="tab">{{{ Lang::get('admin/general.general_info') }}}</a></li>
    </ul>
    <!-- ./ tabs -->


        <!-- Tabs Content -->
        <div class="tab-content">
            <!-- General tab -->
            <div class="tab-pane active" id="tab-general">
              <!-- CSRF Token -->
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
              <!-- ./ csrf token -->
              <br/>
                <!-- carousel_image -->
                <div class="form-group {{{ $errors->has('carousel_image') ? 'has-error' : '' }}}">
                    <label class="span2 control-label" for="carousel_image">{{{ Lang::get('admin/carousels/table.carousel_image') }}}</label>
                    <div class="span6">
                        <input id="fileupload" type="file" name="upload[]" multiple />
                        <div class="progress progress-striped active">
                            <div class="bar" style="width: 0%;"></div>
                        </div>
                        <div class="thumbnails">
                            <button type="button" class="btn btn-danger destroy">
                              <i class="icon-trash"></i>
                              <span>Delete</span>
                            </button>
                            <a href="#" class="thumbnail">
                              <img data-src="holder.js/80x80" alt="" src="{{ URL::to('files/image?name=') }}{{{ Input::old('carousel_image', isset($carousel) ? $carousel->carousel_image : null) }}}">
                            </a>
                        </div>
                        <input class="form-control" type="hidden" name="carousel_image" id="carousel_image" value="{{{ Input::old('carousel_image', isset($carousel) ? $carousel->carousel_image : null) }}}" />
                      {{ $errors->first('carousel_image', '<label class="control-label" for="carousel_image"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                    </div>
                </div>
                <!-- ./ carousel_image -->

                <!-- carousel_content -->
                <div class="form-group {{{ $errors->has('carousel_content') ? 'has-error' : '' }}}">
                    <label class="span2 control-label" for="carousel_content">{{{ Lang::get('admin/carousels/table.carousel_content') }}}</label>
                    <div class="span6">
                        <textarea class="form-control ckeditor" cols="80" id="carousel_content" name="carousel_content" rows="10">
                            {{{ Input::old('carousel_content', isset($carousel) ? $carousel->carousel_content : null) }}}
                        </textarea>
                      {{ $errors->first('carousel_content', '<label class="control-label" for="carousel_content"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                    </div>
                </div>
                <!-- ./ carousel_content -->

                <!-- order -->
                <div class="form-group {{{ $errors->has('order') ? 'has-error' : '' }}}">
                    <label class="span2 control-label" for="order">{{{ Lang::get('admin/carousels/table.order') }}}</label>
                    <div class="span6">
                        <input class="form-control" type="text" name="order" id="order" value="{{{ Input::old('order', isset($carousel) ? $carousel->order : null) }}}" />
                      {{ $errors->first('order', '<label class="control-label" for="order"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                    </div>
                </div>
                <!-- ./ order -->

            </div>
            <!-- ./ general tab -->

        </div>
        <!-- ./ tabs content -->

        <!-- Form Actions -->
        <div class="form-group">
            <div class="span6 offset2">
                <a type="reset" class="btn btn-default" href="{{{ URL::to('admin/carousels') }}}">{{{ Lang::get('button.return') }}}</a>
                <button type="submit" class="btn btn-success">{{{ Lang::get('button.submit') }}}</button>
            </div>
        </div>
        <!-- ./ form actions -->
  </div>
</form>
</div>
@stop
{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
    var imageUploadUrl = "{{{ URL::to('admin/images/upload') }}}"+"?_token={{{ csrf_token() }}}";
    $(function () {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = "{{{ URL::to('admin/files/image') }}}"+"?_token={{{ csrf_token() }}}";
        if($('input[name="carousel_image"]').val().length<=0){
            $("#fileupload").show();
            $('.progress').hide();
            $('.thumbnails').hide();
        }else{
            $("#fileupload").hide();
            $('.thumbnails').show();
            $('.progress').hide();
        }
        $('.thumbnails button.destroy').click(function(){
            var file = $(this).attr('data-file');
            $.ajax({
                url: url + '&upload[0]=' + encodeURIComponent(file),
                type: 'DELETE'
            }).done(function( data ) {
                var data = JSON.parse(data);
                var file = $('.thumbnails button.destroy').attr('data-file');
                if(data[file]){
                    $("#fileupload").show();
                    $('.thumbnails').hide();
                    $('.thumbnails img').attr('src','');
                    $('input[name="carousel_image"]').val('');
                }else{
                    var error = $('<div class="alert"/>').text("{{{ Lang::get('admin/general.delete_fail') }}}").append('<button type="button" class="close" data-dismiss="alert">&times;</button>');
                    $('.thumbnails').after(error);
                }
            });
        });

        $('#fileupload').fileupload({
            url: url,
            dataType: 'json',
            done: function (e, data) {
                $.each(data.result.upload, function (index, file) {
                    if(file.error){
                        var error = $('<div class="alert"/>').text(file.error).append('<button type="button" class="close" data-dismiss="alert">&times;</button>');
                        $('.thumbnails').after(error);
                    }else{
                        $('.thumbnails button.destroy').attr('data-file',file.name);
                        $('.thumbnails img').attr('src',file.url);
                        $('input[name="carousel_image"]').val(file.name);
                        $("#fileupload").hide();
                        $('.thumbnails').show();
                        $('.progress').hide();
                    }
                });
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('.progress .bar').show();
                $('.progress .bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
</script>
<script type="text/javascript" src="{{asset('assets/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/jQuery-File-Upload-9.5.7/js/vendor/jquery.ui.widget.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/jQuery-File-Upload-9.5.7/js/jquery.iframe-transport.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/jQuery-File-Upload-9.5.7/js/jquery.fileupload.js') }}"></script>
<!--[if gte IE 8]><script src="{{asset('assets/jQuery-File-Upload-9.5.7/js/cors/jquery.xdr-transport.js') }}"></script><![endif]-->
@stop