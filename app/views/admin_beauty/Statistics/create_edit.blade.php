@extends('admin_beauty.layouts.default')

@section('content_header')
{{{ $title }}}
<small>
  {{{ $title }}}
</small>
@stop
{{-- breadcrumb --}}
@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> {{{ Lang::get('admin/menu.home') }}}</a></li>
<li class="active">{{{ Lang::get('statistics::statistics.statistics') }}}</li>
<li class="active">{{{ Lang::get('admin/general.edit') }}}</li>
@stop

{{-- Content --}}
@section('content')
<div class="box box-primary">

  {{-- Create Form --}}
  <form method="post" id="main-form" action="@if (isset($entry)){{ URL::to('admin/statistics/' . $entry->id . '/edit') }}@endif" autocomplete="off">
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
            <!-- name -->
            <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
                <label class="span2 control-label" for="name">{{{ Lang::get('statistics::statistics.name') }}}</label>
                <div class="span6">
                    <input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name', isset($entry) ? $entry->name : null) }}}" />
                    {{ $errors->first('name', '<label class="control-label" for="name"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                </div>
            </div>
            <!-- ./ name -->
            <!-- column_names -->
            <div class="form-group {{{ $errors->has('column_names') ? 'has-error' : '' }}}">
                <label class="span2 control-label" for="column_names">{{{ Lang::get('statistics::statistics.column_names') }}}</label>
                <div class="span6">
                    <input class="form-control" type="text" name="column_names" id="column_names" value="{{{ Input::old('column_names', isset($entry) ? $entry->column_names : null) }}}" />
                    {{ $errors->first('column_names', '<label class="control-label" for="column_names"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                </div>
            </div>
            <!-- ./ name -->
            <!-- type -->
            <div class="form-group {{{ $errors->has('type') || $errors->has('type') ? 'has-error' : '' }}}">
                <label class="span2 control-label" for="type">{{{ Lang::get('statistics::statistics.type') }}}?</label>
                <div class="span6">
                    @if ($mode == 'create')
                    <select class="form-control" name="type" id="type">
                        <option value="infos"{{{ (Input::old('type', 0) === 'infos' ? ' selected="selected"' : '') }}}>infos</option>
                        <option value="recruits"{{{ (Input::old('type', 0) === 'recruits' ? ' selected="selected"' : '') }}}>recruits</option>
                    </select>
                    @else
                    <select class="form-control" name="type" id="type">
                        <option value="infos"{{{ ($entry->type=='infos' ? ' selected="selected"' : '') }}}>infos</option>
                        <option value="recruits"{{{ ( ! $entry->type=='recruits' ? ' selected="selected"' : '') }}}>recruits</option>
                    </select>
                    @endif
                    {{ $errors->first('type', '<label class="control-label" for="type"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                </div>
            </div>
            <!-- ./ type -->

          <!-- sql -->
          <div class="form-group {{{ $errors->has('sql') ? 'has-error' : '' }}}">
            <label class="span2 control-label" for="sql">SQL</label>
            <div class="span6">
              <textarea class="form-control" cols="80" id="sql" name="sql" rows="10">
                {{{ Input::old('sql', isset($entry) ? $entry->sql : null) }}}
              </textarea>
              {{ $errors->first('sql', '<label class="control-label" for="sql"><i class="fa fa-times-circle-o"></i> :message</label>') }}
            </div>
          </div>
          <!-- ./ sql -->



        </div>
        <!-- ./ general tab -->

      </div>
      <!-- ./ tabs content -->

      <!-- Form Actions -->
      <div class="form-group">
        <div class="span6 offset2">
          <a type="reset" class="btn btn-default" href="{{{ URL::to('admin/statistics') }}}">{{{ Lang::get('button.return') }}}</a>
          <button type="submit" class="btn btn-success" style="margin-left: 20px">{{{ Lang::get('button.submit') }}}</button>
        </div>
      </div>
      <!-- ./ form actions -->
    </div>
  </form>
</div>
@stop