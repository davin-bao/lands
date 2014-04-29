@extends('admin_beauty.layouts.default')

@section('content_header')
{{{ Lang::get('admin/menu.users') }}}
<small>
  {{{ Lang::get('admin/users/title.management') }}}
</small>
@stop
{{-- breadcrumb --}}
@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> {{{ Lang::get('admin/menu.home') }}}</a></li>
<li class="active">{{{ Lang::get('admin/menu.users') }}}</li>
<li class="active">{{{ Lang::get('admin/general.edit') }}}</li>
@stop

{{-- Content --}}
@section('content')
<div class="box box-primary">

  {{-- Create Form --}}
  <form method="post" action="@if (isset($user)){{ URL::to('admin/users/' . $user->id . '/edit') }}@endif" autocomplete="off">
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
          <!-- username -->
          <div class="form-group {{{ $errors->has('username') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="username">{{{ Lang::get('admin/users/table.username') }}}</label>
            <div class="span6">
              <input class="form-control" type="text" name="username" id="username" value="{{{ Input::old('username', isset($user) ? $user->username : null) }}}" />
              {{ $errors->first('username', '<label class="control-label" for="username"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ username -->
          <!-- email -->
          <div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="email">{{{ Lang::get('admin/users/table.email') }}}</label>
            <div class="span6">
              <input class="form-control" type="text" name="email" id="email" value="{{{ Input::old('email', isset($user) ? $user->email : null) }}}" />
              {{ $errors->first('email', '<label class="control-label" for="email"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ email -->
          <!-- password -->
          <div class="form-group {{{ $errors->has('password') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="password">{{{ Lang::get('admin/users/table.password') }}}</label>
            <div class="span6">
              <input class="form-control" type="password" name="password" id="password" value="" />
              {{ $errors->first('password', '<label class="control-label" for="password"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ password -->
          <!-- password_confirmation -->
          <div class="form-group {{{ $errors->has('password_confirmation') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="password_confirmation">{{{ Lang::get('admin/users/table.password_confirmation') }}}</label>
            <div class="span6">
              <input class="form-control" type="text" name="password_confirmation" id="password_confirmation" value="{{{ Input::old('password_confirmation', isset($user) ? $user->password_confirmation : null) }}}" />
              {{ $errors->first('password_confirmation', '<label class="control-label" for="password_confirmation"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ password_confirmation -->

          <!-- activated -->
          <div class="form-group {{{ $errors->has('activated') || $errors->has('confirm') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="activated">{{{ Lang::get('admin/users/table.activated') }}}?</label>
            <div class="span6">
              @if ($mode == 'create')
              <select class="form-control" name="activated" id="activated">
                <option value="1"{{{ (Input::old('activated', 0) === 1 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>
                <option value="0"{{{ (Input::old('activated', 0) === 0 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>
              </select>
              @else
              <select class="form-control" name="activated" id="activated">
                <option value="1"{{{ ($user->activated ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>
                <option value="0"{{{ ( ! $user->activated ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>
              </select>
              @endif
              {{ $errors->first('activated', '<label class="control-label" for="activated"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ activated -->

          <!-- Groups -->
          <div class="form-group {{{ $errors->has('roles') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="roles">{{{ Lang::get('admin/users/table.roles') }}}</label>
            <div class="span6">
              <select class="form-control" name="roles[]" id="roles[]" multiple>
                @foreach ($roles as $role)
                @if ($mode == 'create')
                <option value="{{{ $role->id }}}"{{{ ( in_array($role->id, $selectedRoles) ? ' selected="selected"' : '') }}}>{{{ $role->name }}}</option>
                @else
                <option value="{{{ $role->id }}}"{{{ ( array_search($role->id, $user->currentRoleIds()) !== false && array_search($role->id, $user->currentRoleIds()) >= 0 ? ' selected="selected"' : '') }}}>{{{ $role->name }}}</option>
                @endif
                @endforeach
              </select>

						<span class="help-block">
							{{{ Lang::get('admin/users/messages.create.help_block') }}}
						</span>
            </div>
          </div>
          <!-- ./ groups -->
        </div>
        <!-- ./ general tab -->

      </div>
      <!-- ./ tabs content -->

      <!-- Form Actions -->
      <div class="form-group">
        <div class="span6 offset2">
          <a type="reset" class="btn btn-default" href="{{{ URL::to('admin/users') }}}">{{{ Lang::get('button.return') }}}</a>
          <button type="submit" class="btn btn-success">{{{ Lang::get('button.submit') }}}</button>
        </div>
      </div>
      <!-- ./ form actions -->
    </div>
  </form>
</div>
@stop