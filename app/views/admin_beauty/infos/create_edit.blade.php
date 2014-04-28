@extends('admin_beauty.layouts.default')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">{{{ Lang::get('admin/general.general_info') }}}</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Create Form --}}
	<form class="form-horizontal" method="post" action="@if (isset($info)){{ URL::to('admin/infos/' . $info->id . '/edit') }}@endif" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				<!-- info_name -->
				<div class="form-group {{{ $errors->has('info_name') ? 'error' : '' }}}">
					<label class="span2 control-label" for="info_name">{{{ Lang::get('admin/infos/table.info_name') }}}</label>
          <div class="span6">
						<input class="form-control" type="text" name="info_name" id="info_name" value="{{{ Input::old('info_name', isset($info) ? $info->info_name : null) }}}" />
						{{ $errors->first('info_name', '<span class="help-inline">:message</span>') }}
					</div>
				</div>
				<!-- ./ info_name -->

        <!-- info_content -->
        <div class="form-group {{{ $errors->has('info_content') ? 'error' : '' }}}">
          <label class="span2 control-label" for="info_content">{{{ Lang::get('admin/infos/table.info_content') }}}</label>
          <div class="span6">
            <textarea class="form-control ckeditor" cols="80" id="info_content" name="info_content" rows="10">
            {{{ Input::old('info_content', isset($info) ? $info->info_content : null) }}}
            </textarea>
            {{ $errors->first('info_content', '<span class="help-inline">:message</span>') }}
          </div>
        </div>
        <!-- ./ info_content -->

				<!-- freeze -->
				<div class="form-group {{{ $errors->has('freeze') || $errors->has('freeze') ? 'error' : '' }}}">
					<label class="span2 control-label" for="freeze">{{{ Lang::get('admin/infos/table.freeze') }}}?</label>
					<div class="span6">
						@if ($mode == 'create')
							<select class="form-control" name="freeze" id="freeze">
								<option value="1"{{{ (Input::old('freeze', 0) === 1 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>
								<option value="0"{{{ (Input::old('freeze', 0) === 0 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>
							</select>
						@else
							<select class="form-control" name="freeze" id="freeze">
								<option value="1"{{{ ($info->freeze ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>
								<option value="0"{{{ ( ! $info->freeze ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>
							</select>
						@endif
						{{ $errors->first('freeze', '<span class="help-inline">:message</span>') }}
					</div>
				</div>
				<!-- ./ freeze -->
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
	</form>
@stop
{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
  var imageUploadUrl = "{{{ URL::to('admin/images/upload') }}}"+"?_token={{{ csrf_token() }}}";
</script>
<script type="text/javascript" src="{{asset('assets/ckeditor/ckeditor.js') }}"></script>
@stop