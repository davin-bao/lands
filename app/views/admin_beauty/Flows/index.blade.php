@extends('admin_beauty.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('workflow::workflow.flow') }}} :: @parent
@stop
@section('content_header')
{{{ Lang::get('workflow::workflow.audit') }}}{{{ Lang::get('workflow::workflow.flow') }}}
<small>
    {{{ Lang::get('workflow::workflow.audit') }}}{{{ Lang::get('workflow::workflow.flow') }}}
</small>
@stop
{{-- breadcrumb --}}
@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> {{{ Lang::get('admin/menu.home') }}}</a></li>
<li class="active">{{{ Lang::get('workflow::workflow.audit') }}}{{{ Lang::get('workflow::workflow.flow') }}}</li>
@stop
{{-- Content --}}
@section('content')

<div class="box box-primary">
  <div class="box-header" style="cursor: move;">
    <i class="ion ion-clipboard"></i>

    <h3 class="box-title"></h3>

    <div class="box-tools pull-right">
      <?php echo $flows->links(); ?>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <ul class="todo-list ui-sortable">
      <table class="table table-hover">
        <tbody><tr>
          <th class="col-md-2">{{{ Lang::get('workflow::workflow.flow') }}}{{{ Lang::get('workflow::workflow.name') }}}</th>
            <th class="col-md-3">{{{ Lang::get('workflow::workflow.resource_type') }}}</th>
            <th class="col-md-5">{{{ Lang::get('workflow::workflow.audit_info') }}}</th>
          <th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
        </tr>
        @foreach ($flows as $flow)
        <tr>
            <th class="col-md-2">{{ $flow->flow_name }}</th>
            <th class="col-md-3">{{{ Lang::get('admin/menu.'.str_replace('"','',$flow->resource_type)) }}}</th>
          <th class="col-md-5">{{ Workflow::makeFlowGraph($flow, 0, 'unstart') }}</th>
          <th class="col-md-2">
            <a href="{{{ URL::to(sprintf('admin/flows/%d/edit', $flow->id)) }}}" class="iframe btn btn-xs btn-default"><i class="fa fa-edit"></i> {{{ Lang::get('button.edit') }}}</a>
            <a href="#deleteModal" data-id="{{ $flow->id }}" data-toggle="modal" class="iframe btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> {{{ Lang::get('button.delete') }}}</a>
          </th>
        </tr>
        @endforeach
        </tbody></table>

    </ul>
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix no-border">
    <a href="{{{ URL::to('admin/flows/create') }}}" class="btn btn-default pull-right"><i class="fa fa-plus"></i><i class="icon-plus-sign"></i> {{{ Lang::get('button.create') }}}</a>
  </div>
</div>

<!-- Modal -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">{{{ Lang::get('admin/flows/title.delete') }}}</h3>
      </div>
      <div class="modal-body">
        <p>{{{ Lang::get('workflow::workflow.delete_flow_info') }}}</p>
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
  var deleteAction = "{{ URL::to('admin/flows') }}";
  $('a[data-toggle="modal"]').click(function(){
    if(deleteAction){
      $('form#deleteForm').attr('action',  deleteAction + '/' + $(this).attr('data-id') + '/delete');
      $('form#deleteForm input[name="id"]').attr('value',  $(this).attr('data-id'));
    }
  });
</script>
@stop
