@extends('admin_beauty.layouts.default')

@section('content_header')
@if($entry->flow()) {{{ $entry->flow()->flow_name }}}@else {{{ Lang::get("workflow::workflow.audit") }}} @endif
<small>
    @if($entry->flow()) {{{ $entry->flow()->flow_name }}}@else {{{ Lang::get("workflow::workflow.audit") }}} @endif
</small>
@stop
{{-- breadcrumb --}}
@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> {{{ Lang::get('admin/menu.home') }}}</a></li>
<li class="active">{{{ Lang::get('admin/menu.flows') }}}</li>
<li class="active">@if($currentNode) {{{ $currentNode->node_name }}} @endif</li>
@stop

{{-- Content --}}
@section('content')
<div class="box box-primary">

  {{-- Create Form --}}
  <form method="post" action="@if (isset($entry)){{ URL::to('admin/'.$entryName.'/' . $entry->id . '/audit') }}@endif" autocomplete="off">
          {{ Workflow::makeAuditFlowForm($entry, $nextAuditUsers,$currentNode) }}
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