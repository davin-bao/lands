@extends('admin.layouts.default')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">{{{ Lang::get('admin/general.general_info') }}}</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Create Form --}}
	<form class="form-horizontal" method="post" action="@if (isset($business)){{ URL::to('admin/businesses/' . $business->id . '/edit') }}@endif" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				<!-- business_name -->
				<div class="form-group {{{ $errors->has('business_name') ? 'error' : '' }}}">
					<label class="span2 control-label" for="business_name">{{{ Lang::get('admin/businesses/table.business_name') }}}</label>
          <div class="span6">
						<input class="form-control" type="text" name="business_name" id="business_name" value="{{{ Input::old('business_name', isset($business) ? $business->business_name : null) }}}" />
						{{ $errors->first('business_name', '<span class="help-inline">:message</span>') }}
					</div>
				</div>
				<!-- ./ business_name -->

        <!-- business_content -->
        <div class="form-group {{{ $errors->has('business_content') ? 'error' : '' }}}">
          <label class="span2 control-label" for="business_content">{{{ Lang::get('admin/businesses/table.business_content') }}}</label>
          <div class="span6">
            <textarea class="form-control ckeditor" cols="80" id="business_content" name="business_content" rows="10">
            {{{ Input::old('business_content', isset($business) ? $business->business_content : null) }}}
            </textarea>
            {{ $errors->first('business_content', '<span class="help-inline">:message</span>') }}
          </div>
        </div>
        <!-- ./ business_content -->

			</div>
			<!-- ./ general tab -->

		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="form-group">
			<div class="span6 offset2">
        <a type="reset" class="btn btn-default" href="{{{ URL::to('admin/businesses') }}}">{{{ Lang::get('button.return') }}}</a>
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