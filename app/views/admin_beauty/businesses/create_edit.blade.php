@extends('admin_beauty.layouts.default')

@section('content_header')
{{{ Lang::get('admin/menu.businesses') }}}
<small>
  {{{ Lang::get('admin/businesses/title.management') }}}
</small>
@stop
{{-- breadcrumb --}}
@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> {{{ Lang::get('admin/menu.home') }}}</a></li>
<li class="active">{{{ Lang::get('admin/menu.businesses') }}}</li>
<li class="active">{{{ Lang::get('admin/general.edit') }}}</li>
@stop

{{-- Content --}}
@section('content')
<div class="box box-primary">

  {{-- Create Form --}}
  <form method="post" action="@if (isset($business)){{ URL::to('admin/businesses/' . $business->id . '/edit') }}@endif" autocomplete="off">
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
          <!-- business_name -->
          <div class="form-group {{{ $errors->has('business_name') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="business_name">{{{ Lang::get('admin/businesses/table.business_name') }}}</label>
            <div class="span6">
              <input class="form-control" type="text" name="business_name" id="business_name" value="{{{ Input::old('business_name', isset($business) ? $business->business_name : null) }}}" />
              {{ $errors->first('business_name', '<label class="control-label" for="business_name"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ business_name -->

          <!-- business_content -->
          <div class="form-group {{{ $errors->has('business_content') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="business_content">{{{ Lang::get('admin/businesses/table.business_content') }}}</label>
            <div class="span6">
              <textarea class="form-control ckeditor" cols="80" id="business_content" name="business_content" rows="10">
                {{{ Input::old('business_content', isset($business) ? $business->business_content : null) }}}
              </textarea>
              {{ $errors->first('business_content', '<label class="control-label" for="business_content"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ business_content -->

          <!-- order -->
          <div class="form-group {{{ $errors->has('order') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="order">{{{ Lang::get('admin/businesses/table.order') }}}</label>
            <div class="span6">
              <input class="form-control" type="text" name="order" id="order" value="{{{ Input::old('order', isset($business) ? $business->order : null) }}}" />
              {{ $errors->first('order', '<label class="control-label" for="order"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ order -->

          <!-- freeze -->
          <div class="form-group {{{ $errors->has('freeze') || $errors->has('freeze') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="freeze">{{{ Lang::get('admin/businesses/table.freeze') }}}?</label>
            <div class="span6">
              @if ($mode == 'create')
              <select class="form-control" name="freeze" id="freeze">
                <option value="1"{{{ (Input::old('freeze', 0) === 1 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>
                <option value="0"{{{ (Input::old('freeze', 0) === 0 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>
              </select>
              @else
              <select class="form-control" name="freeze" id="freeze">
                <option value="1"{{{ ($business->freeze ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>
                <option value="0"{{{ ( ! $business->freeze ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>
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
          <a type="reset" class="btn btn-default" href="{{{ URL::to('admin/businesses') }}}">{{{ Lang::get('button.return') }}}</a>
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