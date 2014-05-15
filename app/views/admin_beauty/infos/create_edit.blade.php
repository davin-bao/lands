@extends('admin_beauty.layouts.default')

@section('content_header')
{{{ Lang::get('admin/menu.infos') }}}
<small>
    {{{ Lang::get('admin/infos/title.management') }}}
</small>
@stop
{{-- breadcrumb --}}
@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> {{{ Lang::get('admin/menu.home') }}}</a></li>
<li class="active">{{{ Lang::get('admin/menu.infos') }}}</li>
<li class="active">{{{ Lang::get('admin/general.edit') }}}</li>
@stop

{{-- Content --}}
@section('content')
<div class="box box-primary">

    {{-- Create Form --}}
    <form method="post" id="main-form" action="@if (isset($info)){{ URL::to('admin/infos/' . $info->id . '/edit') }}@endif" autocomplete="off">
        <div class="box-body">
            <!-- Tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-general" data-toggle="tab">{{{ Lang::get('admin/general.general_info') }}}</a></li>
                @if (isset($info) && isset($info->isBinding))
                  <li><a href="#tab-audit" data-toggle="tab">{{{ Lang::get('workflow::workflow.audit_info') }}}</a></li>
                @endif
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
                    <!-- info_name -->
                    <div class="form-group {{{ $errors->has('info_name') ? 'has-error' : '' }}}">
                        <label class="span2 control-label" for="info_name">{{{ Lang::get('admin/infos/table.info_name') }}}</label>
                        <div class="span6">
                            <input class="form-control" type="text" name="info_name" id="info_name" value="{{{ Input::old('info_name', isset($info) ? $info->info_name : null) }}}" />
                            {{ $errors->first('info_name', '<label class="control-label" for="info_name"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                        </div>
                    </div>
                    <!-- ./ info_name -->


                    <!-- image -->
                    <div class="form-group {{{ $errors->has('image') ? 'has-error' : '' }}}">
                        <label class="span2 control-label" for="image">{{{ Lang::get('admin/infos/table.image') }}}</label>
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
                                    <img data-src="holder.js/80x80" alt="" src="{{ URL::to('files/image?name=') }}{{{ Input::old('image', isset($info) ? $info->image : null) }}}">
                                </a>
                            </div>
                            <input class="form-control" type="hidden" name="image" id="image" value="{{{ Input::old('image', isset($info) ? $info->image : null) }}}" />
                            {{ $errors->first('image', '<label class="control-label" for="image"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                        </div>
                    </div>
                    <!-- ./ image -->

                    <!-- info_content -->
                    <div class="form-group {{{ $errors->has('info_content') ? 'has-error' : '' }}}">
                        <label class="span2 control-label" for="info_content">{{{ Lang::get('admin/infos/table.info_content') }}}</label>
                        <div class="span6">
                            <textarea class="form-control ckeditor" cols="80" id="info_content" name="info_content" rows="10">
                                {{{ Input::old('info_content', isset($info) ? $info->info_content : null) }}}
                            </textarea>
                            {{ $errors->first('info_content', '<label class="control-label" for="info_content"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                        </div>
                    </div>
                    <!-- ./ info_content -->


                    <!-- freeze -->
                    <div class="form-group {{{ $errors->has('freeze') || $errors->has('freeze') ? 'has-error' : '' }}}">
                        <label class="span2 control-label" for="freeze">{{{ Lang::get('admin/infos/table.freeze') }}}?</label>
                        <div class="span6">
                            @if ($mode == 'create')
                            <select class="form-control" name="freeze" id="freeze">
                                <option value="1"{{{ (Input::old('freeze', 0) === 1 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>
                                <option value="0"{{{ (Input::old('freeze', 0) === 0 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>
                            </select>
                            @else
                            <select class="form-control" name="freeze" id="freeze">
                                <option value="1"{{{ ($info->freeze ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>
                                <option value="0"{{{ ( ! $info->freeze ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>
                            </select>
                            @endif
                            {{ $errors->first('freeze', '<label class="control-label" for="freeze"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                        </div>
                    </div>
                    <!-- ./ freeze -->

                </div>
                <!-- ./ general tab -->

                @if (isset($info) && isset($info->isBinding))
                <!-- Audit tab -->
                <div class="tab-pane" id="tab-audit">{{ Workflow::makeAuditDetail($info) }}</div>
                <!-- ./ Audit tab -->
                @endif
            </div>
            <!-- ./ tabs content -->

            <!-- Form Actions -->
            <div class="form-group">
                <div class="span6 offset2">
                    @if (!isset($info) || !isset($info->isBinding) || (isset($info->isBinding) && $info->isMeAudit()))
                    <a type="reset" class="btn btn-default" href="{{{ URL::to('admin/infos') }}}">{{{ Lang::get('button.return') }}}</a>
                    <a name="preview" class="btn btn-success" value="preview">{{{ Lang::get('button.preview') }}}</a>
                    <button type="submit" class="btn btn-success" style="margin-left: 20px">{{{ Lang::get('button.submit') }}}</button>
                    @endif
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
        if($('input[name="image"]').val().length<=0){
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
                    $('input[name="image"]').val('');
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
                        $('input[name="image"]').val(file.name);
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

        $('form a[name="preview"]').click(function(){
            $('form#main-form').attr('target', "_blank");
            $('form#main-form').attr("action",'{{ URL::to("admin/infos/preview") }}');
            $('form#main-form').submit();
        });

        $('form button[type="submit"]').click(function(){
            $('form#main-form').attr('target', "_self");
            $('form#main-form').attr("action",'@if (isset($info)){{ URL::to('admin/infos/' . $info->id . '/edit') }}@endif');
            $('form#main-form').submit();
        });

    });
</script>
<script type="text/javascript" src="{{asset('assets/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/jQuery-File-Upload-9.5.7/js/vendor/jquery.ui.widget.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/jQuery-File-Upload-9.5.7/js/jquery.iframe-transport.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/jQuery-File-Upload-9.5.7/js/jquery.fileupload.js') }}"></script>
<!--[if gte IE 8]><script src="{{asset('assets/jQuery-File-Upload-9.5.7/js/cors/jquery.xdr-transport.js') }}"></script><![endif]-->
@stop