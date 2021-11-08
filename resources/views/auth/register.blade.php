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
            <div class="card shadow">
                <div class="card-body p-6">
                    <div class="mb-4">
                        <a href="/"><img width="150px" src="{{ asset('itech/assets/images/logo.png') }}"
                                         class="mb-4" alt=""/></a>
                        <h1 class="mb-1 font-weight-bold">Đăng ký</h1>
                        <span>Bạn đã có tài khoản?
								<a href="{{ route('login') }}" class="ml-1">Đăng nhập</a></span>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="username" class="form-label">{{ __('Họ và Tên') }}</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                   name="name" placeholder="Họ và Tên"
                                   value="{{ old('name') }}"
                                   autofocus
                                   required/>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" placeholder="Email"
                                   value="{{ old('email') }}"
                                   required/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">{{ __('Mật khẩu') }}</label>
                            <input type="password" id="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" placeholder="**************"
                                   required/>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">{{ __('Nhập lại mật khẩu') }}</label>
                            <input type="password" id="password-confirm"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password_confirmation" placeholder="**************"
                                   required/>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Đăng ký') }}
                            </button>
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
