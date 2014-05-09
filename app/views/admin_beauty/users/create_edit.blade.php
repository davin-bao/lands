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
          <!-- first_name -->
          <div class="form-group {{{ $errors->has('first_name') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="first_name">{{{ Lang::get('admin/users/table.first_name') }}}</label>
            <div class="span6">
              <input class="form-control" type="text" name="first_name" id="first_name" value="{{{ Input::old('first_name', isset($user) ? $user->first_name : null) }}}" />
              {{ $errors->first('first_name', '<label class="control-label" for="first_name"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ first_name -->
          <!-- last_name -->
          <div class="form-group {{{ $errors->has('last_name') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="last_name">{{{ Lang::get('admin/users/table.last_name') }}}</label>
            <div class="span6">
              <input class="form-control" type="text" name="last_name" id="last_name" value="{{{ Input::old('last_name', isset($user) ? $user->last_name : null) }}}" />
              {{ $errors->first('last_name', '<label class="control-label" for="last_name"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ last_name -->
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
              <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="{{{ Input::old('password_confirmation', isset($user) ? $user->password_confirmation : null) }}}" />
              {{ $errors->first('password_confirmation', '<label class="control-label" for="password_confirmation"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ password_confirmation -->

          <!-- confirmed -->
          <div class="form-group {{{ $errors->has('confirmed') || $errors->has('confirmed') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="confirmed">{{{ Lang::get('admin/users/table.confirmed') }}}?</label>
            <div class="span6">
              @if ($mode == 'create')
              <select class="form-control" name="confirmed" id="confirmed">
                <option value="1"{{{ (Input::old('confirmed', 0) === 1 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>
                <option value="0"{{{ (Input::old('confirmed', 0) === 0 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>
              </select>
              @else
              <select class="form-control" name="confirmed" id="confirmed">
                <option value="1"{{{ ($user->confirmed ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>
                <option value="0"{{{ ( ! $user->confirmed ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>
              </select>
              @endif
              {{ $errors->first('confirmed', '<label class="control-label" for="confirmed"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ confirmed -->

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