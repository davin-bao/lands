@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>
			{{{ $title }}}

			<div class="pull-right">
				<a href="{{{ URL::to('admin/recruits/create') }}}" class="btn btn-small btn-info iframe"><i class="icon-plus-sign"></i> {{{ Lang::get('button.create') }}}</a>
			</div>
		</h3>
	</div>

	<table id="recruits" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-md-2">{{{ Lang::get('admin/recruits/table.recruit_name') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/recruits/table.recruit_count') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/recruits/table.recruit_content') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/recruits/table.freeze') }}}</th>
        <th class="col-md-2">{{{ Lang::get('admin/recruits/table.updated_at') }}}</th>
				<th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
			</tr>
		</thead>
		<tbody>
    @foreach ($recruits as $user)
      <tr>
        <th class="col-md-2">{{ $user->recruit_name }}</th>
        <th class="col-md-2">{{ $user->recruit_count }}</th>
        <th class="col-md-2">{{ $user->recruit_content }}</th>
        <th class="col-md-2">{{ $user->freeze }}</th>
        <th class="col-md-2">{{ $user->updated_at }}</th>
        <th class="col-md-2">
          <a href="{{{ URL::to(sprintf('admin/recruits/%d/edit', $user->id)) }}}" class="iframe btn btn-xs btn-default"><i class="icon-edit"></i> {{{ Lang::get('button.edit') }}}</a>
          <a href="#deleteModal" data-id="{{ $user->id }}" data-toggle="modal" class="iframe btn btn-xs btn-danger"><i class="icon-trash"></i> {{{ Lang::get('button.delete') }}}</a>
        </th>
      </tr>
    @endforeach
		</tbody>
	</table>
<!-- Modal -->
<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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