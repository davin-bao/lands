@if (count($errors->all()) > 0)
<div class="alert alert-danger alert-dismissable">
  <i class="fa fa-ban"></i>
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>{{ Lang::get('general.error') }}</h4>
	{{ Lang::get('general.form_error_info') }}
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissable">
  <i class="fa fa-check"></i>
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>{{ Lang::get('general.success') }}</h4>
    @if(is_array($message))
        @foreach ($message as $m)
            {{ $m }}
        @endforeach
    @else
        {{ $message }}
    @endif
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissable">
  <i class="fa fa-ban"></i>
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>{{ Lang::get('general.error') }}</h4>
    @if(is_array($message))
    @foreach ($message as $m)
    {{ $m }}
    @endforeach
    @else
    {{ $message }}
    @endif
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissable">
  <i class="fa fa-warning"></i>
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>{{ Lang::get('general.warning') }}</h4>
    @if(is_array($message))
    @foreach ($message as $m)
    {{ $m }}
    @endforeach
    @else
    {{ $message }}
    @endif
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissable">
  <i class="fa fa-info"></i>
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>{{ Lang::get('general.info') }}</h4>
    @if(is_array($message))
    @foreach ($message as $m)
    {{ $m }}
    @endforeach
    @else
    {{ $message }}
    @endif
</div>
@endif
