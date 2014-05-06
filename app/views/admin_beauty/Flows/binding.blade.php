@extends('admin_beauty.layouts.default')

@section('content_header')
{{{ Lang::get('admin/menu.flows') }}}
<small>
    {{{ Lang::get('admin/general.select_flow') }}}
</small>
@stop
{{-- breadcrumb --}}
@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> {{{ Lang::get('admin/menu.home') }}}</a></li>
<li class="active">{{{ Lang::get('admin/menu.flows') }}}</li>
<li class="active">{{{ Lang::get('admin/general.edit') }}}</li>
@stop

{{-- Content --}}
@section('content')
  <div class="box box-primary">

    {{-- Create Form --}}
    <form method="post" action="@if (isset($info)){{ URL::to('admin/infos/' . $info->id . '/binding') }}@endif" autocomplete="off">
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
                    {{ Workflow::makeBindingFlowForm($flows, $entry) }}
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
    $(function () {
      'use strict';
    });
</script>
@stop