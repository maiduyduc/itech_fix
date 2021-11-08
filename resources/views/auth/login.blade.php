<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('itech/assets/images/favicon.png') }}">
    <link href="{{ asset('itech/assets/fonts/feather/feather.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('itech/assets/css/theme.min.css') }}">
    <title>Đăng ký</title>
</head>

<body>
<div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center no-gutters min-vh-100">
        <div class="col-lg-5 col-md-8 py-8 py-xl-0">
            <div class="card shadow ">
                <div class="card-body p-6">
                    <div class="mb-4">
                        <a href="/"><img width="150px" src="{{ asset('itech/assets/images/logo.png') }}" class="mb-4"
                                         alt=""></a>
                        <h1 class="mb-1 font-weight-bold">Đăng nhập</h1>
                        <span>Bạn chưa có tài khoản? <a href="{{ route('register') }}"
                                                        class="ml-1">{{ __('Đăng ký') }}</a></span>
                    </div>
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control  @error('email') is-invalid @enderror"
                                   autofocus
                                   name="email" placeholder="Email"
                                   value="{{ old('email') }}"
                                   required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" id="password"
                                   class="form-control  @error('password') is-invalid @enderror"
                                   autocomplete="current-password"
                                   name="password" placeholder="**************"
                                   required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="d-lg-flex justify-content-between align-items-center mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label " for="remember">{{ __('Nhớ mật khẩu') }}
                                </label>
                            </div>
                            {{--                            @if (Route::has('password.request'))--}}
                            {{--                                <a class="btn btn-link" href="{{ route('password.request') }}">--}}
                            {{--                                    {{ __('Quên mật khẩu?') }}--}}
                            {{--                                </a>--}}
                            {{--                            @endif--}}
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Đăng nhập') }}</button>
                        </div>
                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('itech/assets/js/theme.min.js') }}"></script>

</body>

</html>
