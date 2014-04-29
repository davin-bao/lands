@extends('admin_beauty.layouts.default')

@section('styles')
#tab-permissions label {
  display: block;
  margin: 5px 0px 5px 30px;
}
@stop
@section('content_header')
{{{ Lang::get('admin/menu.roles') }}}
<small>
  {{{ Lang::get('admin/roles/title.management') }}}
</small>
@stop
{{-- breadcrumb --}}
@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> {{{ Lang::get('admin/menu.home') }}}</a></li>
<li class="active">{{{ Lang::get('admin/menu.roles') }}}</li>
<li class="active">{{{ Lang::get('admin/general.edit') }}}</li>
@stop

{{-- Content --}}
@section('content')
  <div class="box box-primary">

  {{-- Create Form --}}
  <form method="post" action="@if (isset($role)){{ URL::to('admin/roles/' . $role->id . '/edit') }}@endif" autocomplete="off">
    <div class="box-body">
      <!-- Tabs -->
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-general" data-toggle="tab">{{{ Lang::get('admin/general.general_info') }}}</a></li>
        <li><a href="#tab-permissions" data-toggle="tab">{{{ Lang::get('admin/roles/title.tab_permissions') }}}</a></li>
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
          <!-- name -->
          <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="name">{{{ Lang::get('admin/roles/table.name') }}}</label>
            <div class="span6">
              <input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name', isset($role) ? $role->name : null) }}}" />
              {{ $errors->first('name', '<label class="control-label" for="name"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ name -->
        </div>
        <!-- ./ general tab -->

        <!-- Permissions tab -->
        <div class="tab-pane" id="tab-permissions">
          <div class="form-group">
            @foreach ($permissions as $permission)
            <label>
              <input type="hidden" id="permissions[{{{ $permission['id'] }}}]" name="permissions[{{{ $permission['id'] }}}]" value="0" />
              <input type="checkbox" id="permissions[{{{ $permission['id'] }}}]" name="permissions[{{{ $permission['id'] }}}]" value="1"{{{ (isset($permission['checked']) && $permission['checked'] == true ? ' checked="checked"' : '')}}} />
              {{{ $permission['display_name'] }}}
            </label>
            @endforeach
          </div>
        </div>
        <!-- ./ permissions tab -->

      </div>
      <!-- ./ tabs content -->

      <!-- Form Actions -->
      <div class="form-group">
        <div class="span6 offset2">
          <a type="reset" class="btn btn-default" href="{{{ URL::to('admin/roles') }}}">{{{ Lang::get('button.return') }}}</a>
          <button type="submit" class="btn btn-success">{{{ Lang::get('button.submit') }}}</button>
        </div>
      </div>
      <!-- ./ form actions -->
    </div>
  </form>
</div>
@stop