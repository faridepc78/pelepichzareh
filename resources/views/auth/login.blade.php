<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت پله پیچ زارع | ورود</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets/common/images/logo/apple-icon-57x57.png')}}">--}}
{{--    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/common/images/logo/apple-icon-60x60.png')}}">--}}
{{--    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/common/images/logo/apple-icon-72x72.png')}}">--}}
{{--    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/common/images/logo/apple-icon-76x76.png')}}">--}}
{{--    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/common/images/logo/apple-icon-114x114.png')}}">--}}
{{--    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/common/images/logo/apple-icon-120x120.png')}}">--}}
{{--    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/common/images/logo/apple-icon-144x144.png')}}">--}}
{{--    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/common/images/logo/apple-icon-152x152.png')}}">--}}
{{--    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/common/images/logo/apple-icon-180x180.png')}}">--}}
{{--    <link rel="icon" type="image/png" sizes="192x192"--}}
{{--          href="{{asset('assets/common/images/logo/android-icon-192x192.png')}}">--}}
{{--    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/common/images/logo/favicon-32x32.png')}}">--}}
{{--    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/common/images/logo/favicon-96x96.png')}}">--}}
{{--    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/common/images/logo/favicon-16x16.png')}}">--}}
{{--    <link rel="icon" href="{{asset('assets/common/images/logo/favicon.ico')}}" type="image/x-icon">--}}
{{--    <link rel="manifest" href="{{asset('assets/common/images/logo/manifest.json')}}">--}}

    <link rel="stylesheet" href="{{asset('assets/backend/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/custom-style.css')}}">
</head>

<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <a style="font-size: 20px" href="{{route('login')}}"><b>ورود به پنل مدیریت پله پیچ زارع</b></a>
    </div>

    <div class="alert alert-info text-center">
        <p>نام کاربری می تواند ایمیل یا تلفن همراه باشد</p>
    </div>

    <div class="card">
        <div class="card-body login-card-body">

            <form action="{{route('login')}}" method="post">

                @csrf

                @if ($errors->has('failed'))
                    <div id="failed_alert" class="alert alert-danger display-hide">
                        <button onclick="hideFailedAlert()" type="button" class="close ml-2">
                            <span>&times;</span>
                        </button>
                        <span style="font-size: 13px">{{$errors->first('failed')}}</span>
                    </div>
                @endif

                <div class="input-group mb-3">
                    <label for="user_name"></label>
                    <input required onkeyup="this.value=removeSpaces(this.value)"  id="user_name" type="text" placeholder="نام کاربری را وارد کنید"
                           class="form-control @error('user_name') is-invalid @enderror" name="user_name"
                           value="{{ old('user_name') }}" autocomplete="user_name" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fa fa-user"></span>
                        </div>
                    </div>
                    @error('user_name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <label for="password"></label>
                    <input required onkeyup="this.value=removeSpaces(this.value)"  id="password" type="password"
                           placeholder="رمز عبور را وارد کنید"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password"
                           autocomplete="current-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fa fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    {!! app('captcha')->display(); !!}
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block" role="alert">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="clearfix"></div>
                <br>

                <div class="row">
                    <div class="col-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                                مرا به خاطر بسپار
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>
                    </div>

                </div>
            </form>

        </div>

    </div>
</div>
<script type="text/javascript" src="{{asset('assets/backend/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/common/js/public.js')}}"></script>
<script src="https://www.google.com/recaptcha/api.js?explicit&hl=fa" async defer></script>
<script type="text/javascript">
    function hideFailedAlert() {
        $('#failed_alert').hide();
    }
</script>
</body>
</html>
