@extends('admin.layouts.default')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">{{{ Lang::get('admin/general.general_info') }}}</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Create Form --}}
	<form class="form-horizontal" method="post" action="@if (isset($setting)){{ URL::to('admin/settings/' . $setting->id . '/edit') }}@endif" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
                <!-- site_url -->
                <div class="form-group {{{ $errors->has('site_url') ? 'error' : '' }}}">
                    <label class="span2 control-label" for="site_url">{{{ Lang::get('admin/settings/table.site_url') }}}</label>
                    <div class="span6">
                        <input class="form-control" type="text" name="site_url" id="site_url" value="{{{ Input::old('site_url', isset($setting) ? $setting->site_url : null) }}}" />
                        {{ $errors->first('site_url', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- ./ site_url -->

                <!-- company_name -->
                <div class="form-group {{{ $errors->has('company_name') ? 'error' : '' }}}">
                    <label class="span2 control-label" for="company_name">{{{ Lang::get('admin/settings/table.company_name') }}}</label>
                    <div class="span6">
                        <input class="form-control" type="text" name="company_name" id="company_name" value="{{{ Input::old('company_name', isset($setting) ? $setting->company_name : null) }}}" />
                        {{ $errors->first('company_name', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- ./ company_name -->

                <!-- master_email -->
                <div class="form-group {{{ $errors->has('master_email') ? 'error' : '' }}}">
                    <label class="span2 control-label" for="master_email">{{{ Lang::get('admin/settings/table.master_email') }}}</label>
                    <div class="span6">
                        <input class="form-control" type="text" name="master_email" id="master_email" value="{{{ Input::old('master_email', isset($setting) ? $setting->master_email : null) }}}" />
                        {{ $errors->first('master_email', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- ./ master_email -->

                <!-- address -->
                <div class="form-group {{{ $errors->has('address') ? 'error' : '' }}}">
                    <label class="span2 control-label" for="address">{{{ Lang::get('admin/settings/table.address') }}}</label>
                    <div class="span6">
                        <input class="form-control" type="text" name="address" id="address" value="{{{ Input::old('address', isset($setting) ? $setting->address : null) }}}" />
                        {{ $errors->first('address', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- ./ address -->

                <!-- service_phone -->
                <div class="form-group {{{ $errors->has('service_phone') ? 'error' : '' }}}">
                    <label class="span2 control-label" for="service_phone">{{{ Lang::get('admin/settings/table.service_phone') }}}</label>
                    <div class="span6">
                        <input class="form-control" type="text" name="service_phone" id="service_phone" value="{{{ Input::old('service_phone', isset($setting) ? $setting->service_phone : null) }}}" />
                        {{ $errors->first('service_phone', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- ./ service_phone -->

                <!-- mobile -->
                <div class="form-group {{{ $errors->has('mobile') ? 'error' : '' }}}">
                    <label class="span2 control-label" for="mobile">{{{ Lang::get('admin/settings/table.mobile') }}}</label>
                    <div class="span6">
                        <input class="form-control" type="text" name="mobile" id="mobile" value="{{{ Input::old('mobile', isset($setting) ? $setting->mobile : null) }}}" />
                        {{ $errors->first('mobile', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- ./ mobile -->

                <!-- company_instroductions -->
                <div class="form-group {{{ $errors->has('company_instroductions') ? 'error' : '' }}}">
                    <label class="span2 control-label" for="company_instroductions">{{{ Lang::get('admin/settings/table.company_instroductions') }}}</label>
                    <div class="span6">
                        <textarea class="form-control ckeditor" cols="80" id="company_instroductions" name="company_instroductions" rows="10">
                            {{{ Input::old('company_instroductions', isset($setting) ? $setting->company_instroductions : null) }}}
                        </textarea>
                        {{ $errors->first('company_instroductions', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- ./ company_instroductions -->

                <!-- services -->
                <div class="form-group {{{ $errors->has('services') ? 'error' : '' }}}">
                    <label class="span2 control-label" for="services">{{{ Lang::get('admin/settings/table.services') }}}</label>
                    <div class="span6">
                        <textarea class="form-control ckeditor" cols="80" id="services" name="services" rows="10">
                            {{{ Input::old('services', isset($setting) ? $setting->services : null) }}}
                        </textarea>
                        {{ $errors->first('services', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- ./ services -->

                <!-- contact -->
                <div class="form-group {{{ $errors->has('contact') ? 'error' : '' }}}">
                    <label class="span2 control-label" for="contact">{{{ Lang::get('admin/settings/table.contact') }}}</label>
                    <div class="span6">
                        <textarea class="form-control ckeditor" cols="80" id="contact" name="contact" rows="10">
                            {{{ Input::old('contact', isset($setting) ? $setting->contact : null) }}}
                        </textarea>
                        {{ $errors->first('contact', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- ./ contact -->

			</div>
			<!-- ./ general tab -->

		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="form-group">
			<div class="span6 offset2">
        <a type="reset" class="btn btn-default" href="{{{ URL::to('admin/settings') }}}">{{{ Lang::get('button.return') }}}</a>
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