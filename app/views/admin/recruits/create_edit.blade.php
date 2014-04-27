@extends('admin.layouts.default')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">{{{ Lang::get('admin/general.general_info') }}}</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Create Form --}}
	<form class="form-horizontal" method="post" action="@if (isset($recruit)){{ URL::to('admin/recruits/' . $recruit->id . '/edit') }}@endif" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				<!-- recruit_name -->
				<div class="form-group {{{ $errors->has('recruit_name') ? 'error' : '' }}}">
					<label class="span2 control-label" for="recruit_name">{{{ Lang::get('admin/recruits/table.recruit_name') }}}</label>
          <div class="span6">
						<input class="form-control" type="text" name="recruit_name" id="recruit_name" value="{{{ Input::old('recruit_name', isset($recruit) ? $recruit->recruit_name : null) }}}" />
						{{ $errors->first('recruit_name', '<span class="help-inline">:message</span>') }}
					</div>
				</div>
				<!-- ./ recruit_name -->

        <!-- recruit_count -->
        <div class="form-group {{{ $errors->has('recruit_count') ? 'error' : '' }}}">
          <label class="span2 control-label" for="recruit_count">{{{ Lang::get('admin/recruits/table.recruit_count') }}}</label>
          <div class="span6">
            <input class="form-control" type="text" name="recruit_count" id="recruit_count" value="{{{ Input::old('recruit_count', isset($recruit) ? $recruit->recruit_count : null) }}}" />
            {{ $errors->first('recruit_count', '<span class="help-inline">:message</span>') }}
          </div>
        </div>
        <!-- ./ recruit_count -->

        <!-- recruit_content -->
        <div class="form-group {{{ $errors->has('recruit_content') ? 'error' : '' }}}">
          <label class="span2 control-label" for="recruit_content">{{{ Lang::get('admin/recruits/table.recruit_content') }}}</label>
          <div class="span6">
            <textarea class="form-control ckeditor" cols="80" id="recruit_content" name="recruit_content" rows="10">
            {{{ Input::old('recruit_content', isset($recruit) ? $recruit->recruit_content : null) }}}
            </textarea>
            {{ $errors->first('recruit_content', '<span class="help-inline">:message</span>') }}
          </div>
        </div>
        <!-- ./ recruit_content -->

				<!-- freeze -->
				<div class="form-group {{{ $errors->has('freeze') || $errors->has('freeze') ? 'error' : '' }}}">
					<label class="span2 control-label" for="freeze">{{{ Lang::get('admin/recruits/table.freeze') }}}?</label>
					<div class="span6">
						@if ($mode == 'create')
							<select class="form-control" name="freeze" id="freeze">
								<option value="1"{{{ (Input::old('freeze', 0) === 1 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>
								<option value="0"{{{ (Input::old('freeze', 0) === 0 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>
							</select>
						@else
							<select class="form-control" name="freeze" id="freeze">
								<option value="1"{{{ ($recruit->freeze ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>
								<option value="0"{{{ ( ! $recruit->freeze ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>
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
        <a type="reset" class="btn btn-default" href="{{{ URL::to('admin/recruits') }}}">{{{ Lang::get('button.return') }}}</a>
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