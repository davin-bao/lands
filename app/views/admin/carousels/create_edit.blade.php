@extends('admin.layouts.default')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">{{{ Lang::get('admin/general.general_info') }}}</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Create Form --}}
	<form class="form-horizontal" method="post" action="@if (isset($carousel)){{ URL::to('admin/carousels/' . $carousel->id . '/edit') }}@endif" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				<!-- carousel_image -->
				<div class="form-group {{{ $errors->has('carousel_image') ? 'error' : '' }}}">
					<label class="span2 control-label" for="carousel_image">{{{ Lang::get('admin/carousels/table.carousel_image') }}}</label>
          <div class="span6">
						<input class="form-control" type="text" name="carousel_image" id="carousel_image" value="{{{ Input::old('carousel_image', isset($carousel) ? $carousel->carousel_image : null) }}}" />
						{{{ $errors->first('carousel_image', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ carousel_image -->
        <!-- carousel_content -->
        <div class="form-group {{{ $errors->has('carousel_content') ? 'error' : '' }}}">
          <label class="span2 control-label" for="carousel_content">{{{ Lang::get('admin/carousels/table.carousel_content') }}}</label>
          <div class="span6">
            <textarea class="form-control ckeditor" cols="80" id="carousel_content" name="carousel_content" rows="10">
            {{{ Input::old('carousel_content', isset($carousel) ? $carousel->carousel_content : null) }}}
            </textarea>
            {{{ $errors->first('carousel_content', '<span class="help-inline">:message</span>') }}}
          </div>
        </div>
        <!-- ./ carousel_content -->

                <!-- order -->
                <div class="form-group {{{ $errors->has('order') ? 'error' : '' }}}">
                    <label class="span2 control-label" for="order">{{{ Lang::get('admin/carousels/table.order') }}}</label>
                    <div class="span6">
                        <input class="form-control" type="text" name="order" id="order" value="{{{ Input::old('order', isset($carousel) ? $carousel->order : null) }}}" />
                        {{{ $errors->first('order', '<span class="help-inline">:message</span>') }}}
                    </div>
                </div>
                <!-- ./ order -->
			</div>
			<!-- ./ general tab -->

		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="form-group">
			<div class="span6 offset2">
        <a type="reset" class="btn btn-default" href="{{{ URL::to('admin/carousels') }}}">{{{ Lang::get('button.return') }}}</a>
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