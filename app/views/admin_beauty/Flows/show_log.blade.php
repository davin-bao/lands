@extends('admin_beauty.layouts.default')

@section('content_header')
{{{ Lang::get('workflow::workflow.show_log') }}}
<small>
    {{{ Lang::get('workflow::workflow.show_log') }}}
</small>
@stop
{{-- breadcrumb --}}
@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> {{{ Lang::get('admin/menu.home') }}}</a></li>
<li class="active">{{{ Lang::get('workflow::workflow.audit_info') }}}</li>
<li class="active">{{{ Lang::get('workflow::workflow.show_log') }}}</li>
@stop
{{-- Content --}}
@section('content')
  <div class="box box-primary">
    <div class="box-header" style="cursor: move;">
      <h3 class="box-title"><i class="fa fa-comments-o"></i> {{{ $log->title }}}</h3>
    </div>

    <div class="box-body chat" id="chat-box">
      <!-- chat item -->
      <div class="item">
        <div class="attachment">
          <h4>{{{ $username }}}
            @if ($result == 'agreed')
            <span class="label label-success">
            @elseif($result == 'disagreed')
            <span class="label label-danger">
            @else
            <span class="label label-warning">
            @endif
            {{{ Lang::get('workflow::workflow.'.$result) }}}</span>
          </h4>
        </div><!-- /.attachment -->
        {{ $log->content }}
      </div><!-- /.item -->
    </div>

    <div class="box-footer clearfix no-border">
      <a type="reset" class="btn btn-default" onclick="window.history.go(-1);">{{{ Lang::get('button.return') }}}</a>
    </div>
  </div>
@stop
{{-- Scripts --}}
@section('scripts')
@stop