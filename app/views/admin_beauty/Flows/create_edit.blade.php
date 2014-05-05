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
    @if (isset($flow)){{ Workflow::makeFlowForm($flow, $roles) }}@else{{ Workflow::makeFlowForm(null,$roles) }}@endif
</div>
@stop
{{-- Scripts --}}
@section('scripts')
@stop