<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Management | Sign in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-box-body">
        <div class="login-logo">
            <img src="{{asset('assets/images/img/logo/logo.png')}}" width="250">
          </div>
      <form method="POST" action="{{ route('signin') }}">
          @csrf
        <div class="form-group has-feedback">
          <input id="email" style="border-radius:4px;" type="text" class="form-control" name="username" placeholder="E-mail" autofocus>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input id="password" style="border-radius:4px;" type="password" class="form-control"
            name="password" placeholder="Password" required autocomplete="current-password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          {{--  <div class="col-xs-6">
            <div class="form-check">
              <label>
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
              </label>
            </div>
          </div>
          <div class="col-xs-6">
            @if (Route::has('password.request'))
            <a class="btn" href="{{ route('password.request') }}">
              {{ __('Forgot Your Password') }}
              @endif
            </a>
          </div>  --}}
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block">
              {{ __('Signin') }}
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- jQuery 3 -->
  <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="../../plugins/iCheck/icheck.min.js"></script>
  <!-- <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script> -->
</body>

</html>