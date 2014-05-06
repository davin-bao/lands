@extends('admin_beauty.layouts.default')

@section('content_header')
@if($nextNode) {{{ $nextNode->node_name }}}@endif
<small>
  @if($nextNode) {{{ $nextNode->node_name }}}@endif
</small>
@stop
{{-- breadcrumb --}}
@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> {{{ Lang::get('admin/menu.home') }}}</a></li>
<li class="active">{{{ Lang::get('admin/menu.flows') }}}</li>
<li class="active">@if($nextNode) {{{ $nextNode->node_name }}} @endif</li>
@stop

{{-- Content --}}
@section('content')
<div class="box box-primary">

  {{-- Create Form --}}
  <form method="post" action="@if (isset($info)){{ URL::to('admin/infos/' . $info->id . '/audit') }}@endif" autocomplete="off">
          {{ Workflow::makeAuditFlowForm($entry, $auditUsers, $nextNode) }}
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