@extends('admin_beauty.layouts.default')

@section('content_header')
{{{ Lang::get('admin/menu.recruits') }}}
<small>
  {{{ Lang::get('admin/recruits/title.management') }}}
</small>
@stop
{{-- breadcrumb --}}
@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> {{{ Lang::get('admin/menu.home') }}}</a></li>
<li class="active">{{{ Lang::get('admin/menu.recruits') }}}</li>
<li class="active">{{{ Lang::get('admin/general.edit') }}}</li>
@stop

{{-- Content --}}
@section('content')
<div class="box box-primary">

  {{-- Create Form --}}
  <form method="post" id="main-form" action="@if (isset($entry)){{ URL::to('admin/recruits/' . $entry->id . '/edit') }}@endif" autocomplete="off">
    <div class="box-body">
      <!-- Tabs -->
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-general" data-toggle="tab">{{{ Lang::get('admin/general.general_info') }}}</a></li>
        @if (isset($entry) && isset($entry->isBinding))
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
          <!-- recruit_name -->
          <div class="form-group {{{ $errors->has('recruit_name') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="recruit_name">{{{ Lang::get('admin/recruits/table.recruit_name') }}}</label>
            <div class="span6">
              <input class="form-control" type="text" name="recruit_name" id="recruit_name" value="{{{ Input::old('recruit_name', isset($entry) ? $entry->recruit_name : null) }}}" />
              {{ $errors->first('recruit_name', '<label class="control-label" for="recruit_name"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ recruit_name -->
          <!-- recruit_count -->
          <div class="form-group {{{ $errors->has('recruit_count') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="recruit_count">{{{ Lang::get('admin/recruits/table.recruit_count') }}}</label>
            <div class="span6">
              <input class="form-control" type="text" name="recruit_count" id="recruit_count" value="{{{ Input::old('recruit_count', isset($entry) ? $entry->recruit_count : null) }}}" />
              {{ $errors->first('recruit_count', '<label class="control-label" for="recruit_count"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ recruit_count -->

          <!-- recruit_content -->
          <div class="form-group {{{ $errors->has('recruit_content') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="recruit_content">{{{ Lang::get('admin/recruits/table.recruit_content') }}}</label>
            <div class="span6">
              <textarea class="form-control ckeditor" cols="80" id="recruit_content" name="recruit_content" rows="10">
                {{{ Input::old('recruit_content', isset($entry) ? $entry->recruit_content : null) }}}
              </textarea>
              {{ $errors->first('recruit_content', '<label class="control-label" for="recruit_content"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ recruit_content -->


          <!-- freeze -->
          <div class="form-group {{{ $errors->has('freeze') || $errors->has('freeze') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="freeze">{{{ Lang::get('admin/recruits/table.freeze') }}}?</label>
            <div class="span6">
              @if ($mode == 'create')
              <select class="form-control" name="freeze" id="freeze">
                <option value="1"{{{ (Input::old('freeze', 0) === 1 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>
                <option value="0"{{{ (Input::old('freeze', 0) === 0 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>
              </select>
              @else
              <select class="form-control" name="freeze" id="freeze">
                <option value="1"{{{ ($entry->freeze ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>
                <option value="0"{{{ ( ! $entry->freeze ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>
              </select>
              @endif
              {{ $errors->first('freeze', '<label class="control-label" for="freeze"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ freeze -->

        </div>
        <!-- ./ general tab -->

        @if (isset($entry) && isset($entry->isBinding))
        <!-- Audit tab -->
        <div class="tab-pane" id="tab-audit">{{ Workflow::makeAuditDetail($entry) }}</div>
        <!-- ./ Audit tab -->
        @endif

      </div>
      <!-- ./ tabs content -->

      <!-- Form Actions -->
      <div class="form-group">
        <div class="span6 offset2">
          @if (!isset($entry) || !isset($entry->isBinding) || (isset($entry->isBinding) && $entry->isMeAudit()))
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

  $('form a[name="preview"]').click(function(){
      $('form#main-form').attr('target', "_blank");
      $('form#main-form').attr("action",'{{ URL::to("admin/recruits/preview") }}');
      $('form#main-form').submit();
  });

  $('form button[type="submit"]').click(function(){
      $('form#main-form').attr('target', "_self");
      $('form#main-form').attr("action",'@if (isset($entry)){{ URL::to('admin/recruits/' . $entry->id . '/edit') }}@endif');
      $('form#main-form').submit();
  });

</script>
<script type="text/javascript" src="{{asset('assets/ckeditor/ckeditor.js') }}"></script>
@stop