@extends('layouts.index.index')

@section('title')
    <title>Mật khẩu</title>
@endsection

@section('content')
    <div class="pt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div class="pt-16 rounded-top" style="
                        background: url({{ asset('itech/assets/images/profile-bg.jpg') }}) no-repeat;
                        background-size: cover;
                        "></div>
                    <div
                        class="d-flex align-items-end justify-content-between bg-white px-4 pt-2 pb-4 rounded-none rounded-bottom shadow-sm">
                        <div class="d-flex align-items-center">
                            <div class="mr-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                                <img src="{{ Auth::user()->avatar }}"
                                     class="avatar-xl rounded-circle border-width-4 border-white"
                                     alt=""/>
                            </div>
                            <div class="lh-1">
                                <h2 class="mb-0">
                                    {{ Auth::user()->name }}
                                </h2>
                            </div>
                        </div>
                        <div>
                            @if(Auth::user()->level == 0)
                                <a href="{{ route('admin.dashboard') }}"
                                   class="btn btn-outline-primary btn-sm d-none d-md-block">Đến trang quản lý</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-5 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <nav class="navbar navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 small-sidenav">
                        <a class="d-xl-none d-lg-none d-md-none text-inherit font-weight-bold" href="#!">Menu</a>
                        <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light"
                                type="button"
                                data-toggle="collapse" data-target="#smallSidenav" aria-controls="smallSidenav"
                                aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="fe fe-menu"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="smallSidenav">
                            <div class="navbar-nav flex-column">
                                <span class="navbar-header">Đăng ký</span>
                                <ul class="list-unstyled ml-n2 mb-4">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.subscribe') }}"><i
                                                class="fe fe-book nav-icon"></i>
                                            Khóa học đã đăng ký
                                        </a>
                                    </li>
                                </ul>
                                <span class="navbar-header">Cài đặt tài khoản</span>
                                <ul class="list-unstyled ml-n2 mb-0">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.index') }}"><i
                                                class="fe fe-settings nav-icon"></i>Thông tin cá nhân</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('user.password') }}"><i
                                                class="fe fe-user nav-icon"></i>Mật
                                            khẩu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}"><i
                                                class="fe fe-power nav-icon"></i>Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0">Mật khẩu</h3>
                            <p class="mb-0">
                                Bạn có thể đổi mật khẩu của mình tại đây.
                            </p>
                        </div>
                        <div class="card-body">
                            <div>
                                {{Form::open(array('route' => 'user.changePassword'))}}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="password" class="control-label">Mật khẩu hiện tại</label>
                                        </div>
                                        <div class="col">
                                            {{Form::password('password', array('id' => 'password', 'class' => 'form-control', 'required' ,'placeholder' => ''))}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="new-password" class="control-label">Mật khẩu mới</label>
                                        </div>
                                        <div class="col">
                                            {{Form::password('new-password', array('id' => 'new-password', 'class' => 'form-control',  'required' ,'placeholder' => ''))}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="new-password-confirmation" class="control-label">Xác nhận mật
                                                khẩu</label>
                                        </div>
                                        <div class="col">
                                            {{Form::password('confirm-password', array('id' => 'confirm-password', 'class' => 'form-control',  'required' ,'placeholder' => ''))}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Đổi mật khẩu</button>
                                </div>
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

