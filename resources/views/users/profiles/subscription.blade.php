@extends('layouts.index.index')

@section('title')
    <title>Khóa học đã đăng ký</title>
    <script>
        let loadFile = function (event) {
            let image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script src="{{ asset('admins/unsub.js') }}"></script>
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
                                    <li class="nav-item active">
                                        <a class="nav-link" href="student-subscriptions.html"><i
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
                                    <li class="nav-item">
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
                    <div class="col-xl-12 col-lg-9 col-md-8 col-12">
                        <div class="tab-content">
                            <div class="tab-pane fade show active pb-4 " id="tabPaneGrid" role="tabpanel"
                                 aria-labelledby="tabPaneGrid">
                                <div class="row">
                                    @if($subscribe->count()==0)
                                        <div class="col-lg-12 col-md-6 col-12">
                                            <div class="card  mb-4 card-hover">
                                                <div class="card-body">
                                                    <h4 class="mb-2 text-truncate-line-2 ">
                                                        Bạn chưa đăng ký khóa học nào.
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        @foreach($subscribe as $sub)
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="card  mb-4 card-hover">
                                                    <a
                                                        href="{{ route('courses.course_info', ['id'=>$sub->course->id]) }}"
                                                        class="card-img-top"><img
                                                            src="{{ $sub->course->image_path }}" alt=""
                                                            class="card-img-top rounded-top"></a>
                                                    <div class="card-body">
                                                        <h4 class="mb-2 text-truncate-line-2 ">
                                                            <a
                                                                href="{{ route('courses.course_info', ['id'=>$sub->course->id]) }}"
                                                                style="-webkit-line-clamp: 1;
                                                                  -webkit-box-orient: vertical;
                                                                  overflow: hidden;
                                                                  display: -webkit-box;"
                                                                class="text-inherit">
                                                                {{ $sub->course->name }}
                                                            </a>
                                                        </h4>
                                                        <div class="lh-1">
                                                        </div>
                                                        <a href="{{ route('subscriptions.learning',['id'=>$sub->course->id]) }}"
                                                           class="btn btn-primary btn-block">Học ngay</a>
                                                        <a href="#!"
                                                           data-url="{{ route('subscriptions.unsubscribe',['user_id'=>Auth::user()->id,'course_id'=>$sub->course->id]) }}"
                                                           class="btn btn-secondary btn-block action_delete">Hủy đăng ký</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center mb-0">
                                    {{ $subscribe->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('sweetalert::alert')

