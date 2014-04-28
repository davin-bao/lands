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
    <form method="post" action="@if (isset($info)){{ URL::to('admin/infos/' . $info->id . '/edit') }}@endif" autocomplete="off">
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
                    <!-- info_name -->
                    <div class="form-group {{{ $errors->has('info_name') ? 'has-error' : '' }}}">
                        <label class="span2 control-label" for="info_name">{{{ Lang::get('admin/infos/table.info_name') }}}</label>
                        <div class="span6">
                            <input class="form-control" type="text" name="info_name" id="info_name" value="{{{ Input::old('info_name', isset($info) ? $info->info_name : null) }}}" />
                            {{ $errors->first('info_name', '<label class="control-label" for="info_name"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                        </div>
                    </div>
                    <!-- ./ info_name -->

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

            </div>
            <!-- ./ tabs content -->

            <!-- Form Actions -->
            <div class="form-group">
                <div class="span6 offset2">
                    <a type="reset" class="btn btn-default" href="{{{ URL::to('admin/infos') }}}">{{{ Lang::get('button.return') }}}</a>
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
</script>
<script type="text/javascript" src="{{asset('assets/ckeditor/ckeditor.js') }}"></script>
@stop