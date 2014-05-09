@extends('admin_beauty.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop
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
@stop
{{-- Content --}}
@section('content')

<div class="box box-primary">
  <div class="box-header" style="cursor: move;">
    <i class="ion ion-clipboard"></i>

    <h3 class="box-title"></h3>

    <div class="box-tools pull-right">
      <?php echo $users->links(); ?>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <ul class="todo-list ui-sortable">
      <table class="table table-hover">
        <tbody><tr>
          <th class="col-md-2">{{{ Lang::get('admin/users/table.username') }}}</th>
          <th class="col-md-1">{{{ Lang::get('admin/users/table.last_name') }}}</th>
          <th class="col-md-2">{{{ Lang::get('admin/users/table.first_name') }}}</th>
          <th class="col-md-2">{{{ Lang::get('admin/users/table.email') }}}</th>
          <th class="col-md-2">{{{ Lang::get('admin/users/table.roles') }}}</th>
          <th class="col-md-1">{{{ Lang::get('admin/users/table.activated') }}}</th>
          <th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
        </tr>
        @foreach ($users as $user)
        <tr>
          <th class="col-md-2">{{ $user->username }}</th>
          <th class="col-md-1">{{ $user->last_name }}</th>
          <th class="col-md-2">{{ $user->first_name }}</th>
          <th class="col-md-2">{{ $user->email }}</th>
          <th class="col-md-2">{{ $user->rolename }}</th>
          <th class="col-md-1">{{ $user->confirmed }}</th>
          <th class="col-md-2">
            <a href="{{{ URL::to(sprintf('admin/users/%d/edit', $user->id)) }}}" class="iframe btn btn-xs btn-default"><i class="fa fa-edit"></i> {{{ Lang::get('button.edit') }}}</a>
            <a href="#deleteModal" data-id="{{ $user->id }}" data-toggle="modal" class="iframe btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> {{{ Lang::get('button.delete') }}}</a>
          </th>
        </tr>
        @endforeach
        </tbody></table>

    </ul>
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix no-border">
    <a href="{{{ URL::to('admin/users/create') }}}" class="btn btn-default pull-right"><i class="fa fa-plus"></i><i class="icon-plus-sign"></i> {{{ Lang::get('button.create') }}}</a>
  </div>
</div>

<!-- Modal -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">{{{ Lang::get('admin/users/title.delete') }}}</h3>
      </div>
      <div class="modal-body">
        <p>{{{ Lang::get('admin/users/messages.delete.message') }}}</p>
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
  var deleteAction = "{{ URL::to('admin/users') }}";
  $('a[data-toggle="modal"]').click(function(){
    if(deleteAction){
      $('form#deleteForm').attr('action',  deleteAction + '/' + $(this).attr('data-id') + '/delete');
      $('form#deleteForm input[name="id"]').attr('value',  $(this).attr('data-id'));
    }
  });
</script>
@stop
