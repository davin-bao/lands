@extends('admin_beauty.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop
@section('content_header')
{{{ Lang::get('admin/menu.recruits') }}}
<small>
  {{{ Lang::get('admin/recruits/title.management') }}}
</small>
@stop
{{-- breadcrumb --}}
@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> {{{ Lang::get('admin/menu.home') }}}</a></li>
<li class="active">{{{ Lang::get('admin/menu.recruits') }}}</li>
@stop
{{-- Content --}}
@section('content')

<div class="box box-primary">
  <div class="box-header" style="cursor: move;">
      <div class="box-tools pull-left">
          <a href="{{{ URL::to('admin/recruits?s=all') }}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> {{{ Lang::get('workflow::button.show_all') }}}</a>
          <a href="{{{ URL::to('admin/recruits?s=audit') }}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> {{{ Lang::get('workflow::button.show_audit') }}}</a>
          <a href="{{{ URL::to('admin/recruits?s=completed') }}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> {{{ Lang::get('workflow::button.show_completed') }}}</a>
      </div>
    <div class="box-tools pull-right">
      <?php echo $recruits->links(); ?>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <ul class="todo-list ui-sortable">
      <table class="table table-hover">
        <tbody><tr>
          <th class="col-md-2">{{{ Lang::get('admin/recruits/table.recruit_name') }}}</th>
          <th class="col-md-2">{{{ Lang::get('admin/recruits/table.recruit_count') }}}</th>
          <th class="col-md-4">{{{ Lang::get('workflow::workflow.audit_info') }}}</th>
          <th class="col-md-1">{{{ Lang::get('table.status') }}}</th>
          <th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
        </tr>
        @foreach ($recruits as $recruit)
        <tr>
          <th class="col-md-2">{{ $recruit->recruit_name }}</th>
          <th class="col-md-2">{{ $recruit->recruit_count }}</th>
          <th class="col-md-4">
            @if (isset($recruit->isBinding))
            {{ Workflow::makeFlowGraph($recruit->flow(), $recruit->orderID()) }}
            @endif
          </th>
          <th class="col-md-1">@if (isset($recruit->isBinding) && $recruit->status() != '') {{{ Lang::get('workflow::workflow.'.$recruit->status()) }}} @endif</th>
          <th class="col-md-2">
            @if (isset($recruit->isBinding) && $recruit->isMeAudit())
            <a href="{{{ URL::to(sprintf('admin/recruits/%d/edit', $recruit->id)) }}}" class="iframe btn btn-xs btn-default"><i class="fa fa-edit"></i> {{{ Lang::get('button.edit') }}}</a>
            @endif
            <a href="{{{ URL::to(sprintf('admin/recruits/%d/edit', $recruit->id)) }}}" class="iframe btn btn-xs btn-default"><i class="fa fa-eye"></i> {{{ Lang::get('button.view') }}}</a>
            @if (Auth::user()->can('delete_recruits'))
            <a href="#deleteModal" data-target="#deleteModal" data-id="{{ $recruit->id }}" data-toggle="modal" class="iframe btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> {{{ Lang::get('button.delete') }}}</a>
            @endif
          </th>
        </tr>
        @endforeach
        </tbody></table>

    </ul>
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix no-border">
    @if (Auth::user()->can('create_recruits'))
    <a href="{{{ URL::to('admin/recruits/create') }}}" class="btn btn-default pull-right"><i class="fa fa-plus"></i><i class="icon-plus-sign"></i> {{{ Lang::get('button.create') }}}</a>
    @endif
  </div>
</div>

<!-- Modal -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">{{{ Lang::get('admin/recruits/title.delete') }}}</h3>
      </div>
      <div class="modal-body">
        <p>{{{ Lang::get('admin/recruits/messages.delete.message') }}}</p>
      </div>
      <div class="modal-footer">
        <form id="deleteForm" class="form-horizontal" method="post" action="" autocomplete="off">
          <!-- CSRF Token -->
          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
          <input type="hidden" name="id" value="" />
          <button class="btn" data-dismiss="modal" aria-hidden="true">{{{ Lang::get('button.cancel') }}}</button>
          <button type="submit" class="btn btn-primary">{{{ Lang::get('button.ok') }}}</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal End -->
@stop

{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
  var deleteAction = "{{ URL::to('admin/recruits') }}";
  $('a[data-toggle="modal"]').click(function(){
    if(deleteAction){
      $('form#deleteForm').attr('action',  deleteAction + '/' + $(this).attr('data-id') + '/delete');
      $('form#deleteForm input[name="id"]').attr('value',  $(this).attr('data-id'));
    }
  });
</script>
@stop