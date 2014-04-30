@extends('admin_beauty.layouts.default')

@section('content_header')
{{{ Lang::get('admin/menu.settings') }}}
<small>
    {{{ Lang::get('admin/settings/title.management') }}}
</small>
@stop
{{-- breadcrumb --}}
@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> {{{ Lang::get('admin/menu.home') }}}</a></li>
<li class="active">{{{ Lang::get('admin/menu.settings') }}}</li>
<li class="active">{{{ Lang::get('admin/general.edit') }}}</li>
@stop

{{-- Content --}}
@section('content')
<div class="box box-primary">

    {{-- Create Form --}}
    <form method="post" action="@if (isset($setting)){{ URL::to('admin/settings/' . $setting->id . '/edit') }}@endif" autocomplete="off">
        <div class="box-body">
            <!-- Tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-general" data-toggle="tab">{{{ Lang::get('admin/general.general_info') }}}</a></li>
            </ul>
            <!-- ./ tabs -->


            <!-- Tabs Content -->
            <div class="tab-content">
                <!-- General tab -->
                <div class="tab-pane active" id="tab-general">
                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <!-- ./ csrf token -->
                    <br/>
                    <!-- site_url -->
                    <div class="form-group {{{ $errors->has('site_url') ? 'has-error' : '' }}}">
                        <label class="span2 control-label" for="site_url">{{{ Lang::get('admin/settings/table.site_url') }}}</label>
                        <div class="span6">
                            <input class="form-control" type="text" name="site_url" id="site_url" value="{{{ Input::old('site_url', isset($setting) ? $setting->site_url : null) }}}" />
                            {{ $errors->first('site_url', '<label class="control-label" for="site_url"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                        </div>
                    </div>
                    <!-- ./ site_url -->
                    <!-- company_name -->
                    <div class="form-group {{{ $errors->has('company_name') ? 'has-error' : '' }}}">
                        <label class="span2 control-label" for="company_name">{{{ Lang::get('admin/settings/table.company_name') }}}</label>
                        <div class="span6">
                            <input class="form-control" type="text" name="company_name" id="company_name" value="{{{ Input::old('company_name', isset($setting) ? $setting->company_name : null) }}}" />
                            {{ $errors->first('company_name', '<label class="control-label" for="company_name"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                        </div>
                    </div>
                    <!-- ./ company_name -->
                    <!-- master_email -->
                    <div class="form-group {{{ $errors->has('master_email') ? 'has-error' : '' }}}">
                        <label class="span2 control-label" for="master_email">{{{ Lang::get('admin/settings/table.master_email') }}}</label>
                        <div class="span6">
                            <input class="form-control" type="text" name="master_email" id="master_email" value="{{{ Input::old('master_email', isset($setting) ? $setting->master_email : null) }}}" />
                            {{ $errors->first('master_email', '<label class="control-label" for="master_email"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                        </div>
                    </div>
                    <!-- ./ master_email -->
                    <!-- address -->
                    <div class="form-group {{{ $errors->has('address') ? 'has-error' : '' }}}">
                        <label class="span2 control-label" for="address">{{{ Lang::get('admin/settings/table.address') }}}</label>
                        <div class="span6">
                            <input class="form-control" type="text" name="address" id="address" value="{{{ Input::old('address', isset($setting) ? $setting->address : null) }}}" />
                            {{ $errors->first('address', '<label class="control-label" for="address"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                        </div>
                    </div>
                    <!-- ./ address -->
                    <!-- service_phone -->
                    <div class="form-group {{{ $errors->has('service_phone') ? 'has-error' : '' }}}">
                        <label class="span2 control-label" for="service_phone">{{{ Lang::get('admin/settings/table.service_phone') }}}</label>
                        <div class="span6">
                            <input class="form-control" type="text" name="service_phone" id="service_phone" value="{{{ Input::old('service_phone', isset($setting) ? $setting->service_phone : null) }}}" />
                            {{ $errors->first('service_phone', '<label class="control-label" for="service_phone"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                        </div>
                    </div>
                    <!-- ./ service_phone -->
                    <!-- mobile -->
                    <div class="form-group {{{ $errors->has('mobile') ? 'has-error' : '' }}}">
                        <label class="span2 control-label" for="mobile">{{{ Lang::get('admin/settings/table.mobile') }}}</label>
                        <div class="span6">
                            <input class="form-control" type="text" name="mobile" id="mobile" value="{{{ Input::old('mobile', isset($setting) ? $setting->mobile : null) }}}" />
                            {{ $errors->first('mobile', '<label class="control-label" for="mobile"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                        </div>
                    </div>
                    <!-- ./ mobile -->

                    <!-- company_instroductions -->
                    <div class="form-group {{{ $errors->has('company_instroductions') ? 'has-error' : '' }}}">
                        <label class="span2 control-label" for="company_instroductions">{{{ Lang::get('admin/settings/table.company_instroductions') }}}</label>
                        <div class="span6">
                            <textarea class="form-control ckeditor" cols="80" id="company_instroductions" name="company_instroductions" rows="10">
                                {{{ Input::old('company_instroductions', isset($setting) ? $setting->company_instroductions : null) }}}
                            </textarea>
                            {{ $errors->first('company_instroductions', '<label class="control-label" for="company_instroductions"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                        </div>
                    </div>
                    <!-- ./ company_instroductions -->

                    <!-- services -->
                    <div class="form-group {{{ $errors->has('services') ? 'has-error' : '' }}}">
                        <label class="span2 control-label" for="services">{{{ Lang::get('admin/settings/table.services') }}}</label>
                        <div class="span6">
                            <textarea class="form-control ckeditor" cols="80" id="services" name="services" rows="10">
                                {{{ Input::old('services', isset($setting) ? $setting->services : null) }}}
                            </textarea>
                            {{ $errors->first('services', '<label class="control-label" for="services"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                        </div>
                    </div>
                    <!-- ./ services -->

                    <!-- recruits -->
                    <div class="form-group {{{ $errors->has('recruits') ? 'has-error' : '' }}}">
                      <label class="span2 control-label" for="recruits">{{{ Lang::get('admin/settings/table.recruits') }}}</label>
                      <div class="span6">
                        <textarea class="form-control ckeditor" cols="80" id="recruits" name="recruits" rows="10">
                          {{{ Input::old('recruits', isset($setting) ? $setting->recruits : null) }}}
                        </textarea>
                        {{ $errors->first('recruits', '<label class="control-label" for="recruits"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                      </div>
                    </div>
                    <!-- ./ recruits -->

                    <!-- contact -->
                    <div class="form-group {{{ $errors->has('contact') ? 'has-error' : '' }}}">
                      <label class="span2 control-label" for="contact">{{{ Lang::get('admin/settings/table.contact') }}}</label>
                      <div class="span6">
                        <textarea class="form-control ckeditor" cols="80" id="contact" name="contact" rows="10">
                          {{{ Input::old('contact', isset($setting) ? $setting->contact : null) }}}
                        </textarea>
                        {{ $errors->first('contact', '<label class="control-label" for="contact"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                      </div>
                    </div>
                    <!-- ./ contact -->
                    <!-- front_color -->
                  <div class="form-group {{{ $errors->has('front_color') || $errors->has('front_color') ? 'has-error' : '' }}}">
                    <label class="span2 control-label" for="front_color">{{{ Lang::get('admin/settings/table.front_color') }}}?</label>
                    <div class="span6">
                      @if ($mode == 'create')
                      <select class="form-control" name="front_color" id="front_color">
                        <option value="blue"{{{ (Input::old('front_color', 0) === 'blue' ? ' selected="selected"' : '') }}}>Blue</option>
                        <option value="red"{{{ (Input::old('front_color', 0) === 'red' ? ' selected="selected"' : '') }}}>Red</option>
                        <option value="orange"{{{ (Input::old('front_color', 0) === 'orange' ? ' selected="selected"' : '') }}}>Orange</option>
                      </select>
                      @else
                      <select class="form-control" name="front_color" id="front_color">
                        <option value="blue"{{{ ($setting->front_color === 'blue' ? ' selected="selected"' : '') }}}>Blue</option>
                        <option value="red"{{{ ($setting->front_color === 'red' ? ' selected="selected"' : '') }}}>Red</option>
                        <option value="orange"{{{ ($setting->front_color === 'orange' ? ' selected="selected"' : '') }}}>Orange</option>
                      </select>
                      @endif
                      {{ $errors->first('front_color', '<label class="control-label" for="front_color"><i class="fa fa-times-circle-o"></i> :message</label>') }}
                    </div>
                  </div>
                  <!-- ./ front_color -->

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
        </div>
    </form>
</div>
@stop
{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
  var imageUploadUrl = "{{{ URL::to('admin/images/upload') }}}"+"?_token={{{ csrf_token() }}}";
</script>
<script type="text/javascript" src="{{asset('assets/ckeditor/ckeditor.js') }}"></script>
@stop