@extends('admin_beauty.layouts.default')
{{-- content_header --}}

@section('content_header')
{{{ Lang::get('admin/menu.dashboard') }}}

@stop

{{-- breadcrumb --}}
@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> {{{ Lang::get('admin/menu.home') }}}</a></li>

@stop
{{-- Content --}}
@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner"  @if (Auth::user()->can('manage_infos'))onclick="document.location=' {{{ URL::to('admin/infos') }}}'" @endif>
        <h3>
          {{{ Lang::get('admin/menu.infos') }}}
        </h3>
        <p>&nbsp;</p>
      </div>
      <div class="icon">
        <i class="ion ion-cloud"></i>
      </div>
      @if (Auth::user()->can('manage_infos'))
      <a href="{{{ URL::to('admin/infos') }}}" class="small-box-footer">{{{ Lang::get('general.manage') }}}<i class="fa fa-arrow-circle-right"></i></a>
      @else
      <a href="{{{ URL::to('admin') }}}" class="small-box-footer">{{{ Lang::get('general.no_permission') }}}<i class="fa fa-arrow-circle-right"></i></a>
      @endif
    </div>
  </div><!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner"  @if (Auth::user()->can('manage_settings'))onclick="document.location=' {{{ URL::to('admin/settings/1/edit') }}}'" @endif>
        <h3>
          {{{ Lang::get('admin/menu.settings') }}}
        </h3>
        <p>&nbsp;</p>
      </div>
      <div class="icon">
        <i class="ion ion-wrench"></i>
      </div>
      @if (Auth::user()->can('manage_settings'))
      <a href="{{{ URL::to('admin/settings/1/edit') }}}" class="small-box-footer">{{{ Lang::get('general.manage') }}}<i class="fa fa-arrow-circle-right"></i></a>
      @else
      <a href="{{{ URL::to('admin') }}}" class="small-box-footer">{{{ Lang::get('general.no_permission') }}}<i class="fa fa-arrow-circle-right"></i></a>
      @endif
    </div>
  </div><!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner"  @if (Auth::user()->can('manage_recruits'))onclick="document.location=' {{{ URL::to('admin/recruits') }}}'" @endif>
        <h3>
          {{{ Lang::get('admin/menu.recruits') }}}
        </h3>
        <p>&nbsp;</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      @if (Auth::user()->can('manage_recruits'))
      <a href="{{{ URL::to('admin/recruits') }}}" class="small-box-footer">{{{ Lang::get('general.manage') }}}<i class="fa fa-arrow-circle-right"></i></a>
      @else
      <a href="{{{ URL::to('admin') }}}" class="small-box-footer">{{{ Lang::get('general.no_permission') }}}<i class="fa fa-arrow-circle-right"></i></a>
      @endif
    </div>
  </div><!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner" @if (Auth::user()->can('manage_users'))onclick="document.location=' {{{ URL::to('admin/users') }}}'" @endif>
        <h3>
          {{{ Lang::get('admin/menu.title_users') }}}
        </h3>
        <p>&nbsp;</p>
      </div>
      <div class="icon">
        <i class="ion ion-unlocked"></i>
      </div>
      @if (Auth::user()->can('manage_users'))
      <a href="{{{ URL::to('admin/users') }}}" class="small-box-footer">{{{ Lang::get('general.manage') }}}<i class="fa fa-arrow-circle-right"></i></a>
      @else
      <a href="{{{ URL::to('admin') }}}" class="small-box-footer">{{{ Lang::get('general.no_permission') }}}<i class="fa fa-arrow-circle-right"></i></a>
      @endif
    </div>
  </div><!-- ./col -->
</div><!-- /.row -->

<!-- top row -->
<div class="row">
  <div class="col-xs-12 connectedSortable">

  </div><!-- /.col -->
</div>
<!-- /.row -->

<!-- Main row -->
<div class="row">
<!-- Left col -->
<section class="col-lg-6">
  <!-- Infos -->
  <div class="box box-danger">
    <div class="box-header">
      <i class="ion ion-clipboard"></i>
      <h3 class="box-title">{{{ Lang::get('admin/menu.recruits') }}}</h3>
      <div class="box-tools pull-right">
          &nbsp;
      </div>
    </div><!-- /.box-header -->
    <div class="box-body">
      <ul class="todo-list">
        @foreach ($recruits as $recruit)
        <li>
          <span class="text">{{ $recruit->recruit_name }}</span>
          <!-- Emphasis label -->
          <small class="label label-danger"><i class="fa fa-clock-o"></i>{{ $recruit->created_at }}</small>
          <!-- General tools such as edit or delete-->
          <div class="tools">
            <a href="{{{ URL::to(sprintf('admin/recruits/%d/edit', $recruit->id)) }}}"><i class="fa fa-edit"></i></a>
          </div>
        </li>
        @endforeach
      </ul>
    </div><!-- /.box-body -->
    <div class="box-footer clearfix no-border">
      <a href="{{{ URL::to('admin/recruits') }}}" class="btn btn-default pull-right"><i class="fa fa-list"></i> {{{ Lang::get('general.more') }}}</a>
    </div>
  </div><!-- /.box -->

</section><!-- /.Left col -->
<!-- right col (We are only adding the ID to make the widgets sortable)-->
<section class="col-lg-6 connectedSortable">
  <!-- Infos -->
  <div class="box box-primary">
    <div class="box-header">
      <i class="ion ion-clipboard"></i>
      <h3 class="box-title">{{{ Lang::get('admin/menu.infos') }}}</h3>
      <div class="box-tools pull-right">
        &nbsp;
      </div>
    </div><!-- /.box-header -->
    <div class="box-body">
      <ul class="todo-list">
        @foreach ($infos as $info)
        <li>
          <span class="text">{{ $info->info_name }}</span>
          <!-- Emphasis label -->
          <small class="label label-danger"><i class="fa fa-clock-o"></i>{{ $info->created_at }}</small>
          <!-- General tools such as edit or delete-->
          <div class="tools">
            <a href="{{{ URL::to(sprintf('admin/infos/%d/edit', $info->id)) }}}"><i class="fa fa-edit"></i></a>
          </div>
        </li>
        @endforeach
      </ul>
    </div><!-- /.box-body -->
    <div class="box-footer clearfix no-border">
      <a href="{{{ URL::to('admin/infos') }}}" class="btn btn-default pull-right"><i class="fa fa-list"></i> {{{ Lang::get('general.more') }}}</a>
    </div>
  </div><!-- /.box -->

</section><!-- right col -->
</div><!-- /.row (main row) -->
@stop