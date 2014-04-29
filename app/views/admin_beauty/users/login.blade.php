<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>@section('title')
          Administration
          @show</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{ asset('admin/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset('admin/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header bg-blue">{{{ Lang::get('general.login') }}}</div>
          <form method="POST" action="{{{ Confide::checkAction('UserController@do_login') ?: URL::to('/user/login') }}}" accept-charset="UTF-8">
                <div class="body bg-gray">

                    @if ( Session::get('error') )
                    <div class="alert alert-danger alert-dismissable">
                      <i class="fa fa-ban"></i>
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      {{{ Session::get('error') }}}
                    </div>
                    @endif

                    @if ( Session::get('notice') )
                    <div class="alert alert-warning alert-dismissable">
                      <i class="fa fa-warning"></i>
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      {{{ Session::get('notice') }}}
                    </div>
                    @endif
                    <div class="form-group">
                        <input type="text" id="email" name="email" class="form-control" value="{{{ Input::old('email') }}}" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}"/>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="remember" value="0">
                      <input tabindex="4" type="checkbox" name="remember" id="remember" value="1"> {{{ Lang::get('confide::confide.login.remember') }}}
                    </div>
                </div>

                <div class="footer">
                    <button type="submit" class="btn btn-primary btn-block">{{{ Lang::get('confide::confide.login.submit') }}}</button>
                    <p><a href="{{{ (Confide::checkAction('UserController@forgot_password')) ?: 'forgot' }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a></p>
                </div>
            </form>
        </div>

        <!-- jQuery 2.0.2 -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

    </body>
</html>