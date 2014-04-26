@extends('admin.layouts.default')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">{{{ Lang::get('admin/general.general_info') }}}</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Create Form --}}
	<form class="form-horizontal" method="post" action="@if (isset($introduction)){{ URL::to('admin/introductions/' . $introduction->id . '/edit') }}@endif" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				<!-- introduction_name -->
				<div class="form-group {{{ $errors->has('introduction_name') ? 'error' : '' }}}">
					<label class="span2 control-label" for="introduction_name">{{{ Lang::get('admin/introductions/table.introduction_name') }}}</label>
          <div class="span6">
						<input class="form-control" type="text" name="introduction_name" id="introduction_name" value="{{{ Input::old('introduction_name', isset($introduction) ? $introduction->introduction_name : null) }}}" />
						{{{ $errors->first('introduction_name', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ introduction_name -->

        <!-- introduction_content -->
        <div class="form-group {{{ $errors->has('introduction_content') ? 'error' : '' }}}">
          <label class="span2 control-label" for="introduction_content">{{{ Lang::get('admin/introductions/table.introduction_content') }}}</label>
          <div class="span6">
            <textarea class="form-control ckeditor" cols="80" id="introduction_content" name="introduction_content" rows="10">
            {{{ Input::old('introduction_content', isset($introduction) ? $introduction->introduction_content : null) }}}
            </textarea>
            {{{ $errors->first('introduction_content', '<span class="help-inline">:message</span>') }}}
          </div>
        </div>
        <!-- ./ introduction_content -->
		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="form-group">
			<div class="span6 offset2">
        <a type="reset" class="btn btn-default" href="{{{ URL::to('admin/introductions') }}}">{{{ Lang::get('button.return') }}}</a>
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