@extends('layouts.dashboard.dashboard')

@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-4 mb-4 d-lg-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-0 h2 font-weight-bold">Trang chủ</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <a href="{{route('categories.index')}}"><span
                                        class="font-size-xs text-uppercase font-weight-semi-bold">Danh mục khóa học</span></a>
                            </div>
                            <div>
                                <a href="{{route('categories.index')}}">
                                    <span class="fe fe-shopping-bag font-size-lg text-primary"></span></a>
                            </div>
                        </div>
                        <h2 class="font-weight-bold mb-1">
                            {{ number_format($categories,0,'.',',') }}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <a href="{{route('courses-admin.index')}}"><span
                                        class="font-size-xs text-uppercase font-weight-semi-bold">Khóa học</span></a>
                            </div>
                            <div>
                                <a href="{{route('courses-admin.index')}}">
                                    <span class=" fe fe-book-open font-size-lg text-primary"></span></a>
                            </div>
                        </div>
                        <h2 class="font-weight-bold mb-1">
                            {{ number_format($courses,0,'.',',') }}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <a href="{{route('users.index')}}">
                                    <span class="font-size-xs text-uppercase font-weight-semi-bold">Người dùng</span>
                                </a>
                            </div>
                            <div>
                                <a href="{{route('users.index')}}">
                                    <span class=" fe fe-users font-size-lg text-primary"></span>
                                </a>

                            </div>
                        </div>
                        <h2 class="font-weight-bold mb-1">
                            {{ number_format($user) }}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div>
                                <a href="#!">
                                    <span class="font-size-xs text-uppercase font-weight-semi-bold">Tổng lượt đăng ký khóa học</span>
                                </a>
                            </div>
                            <div>
                                <a href="#!">
                                    <span class=" fe fe-plus font-size-lg text-primary"></span>
                                </a>
                            </div>
                        </div>
                        <h2 class="font-weight-bold mb-1">
                            {{ number_format($coursesList) }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-12 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center
                              justify-content-between card-header-height">
                        <h4 class="mb-0">Các khóa học nhiều lượt đăng ký nhất</h4>
                        <a href="{{ route('courses-admin.index') }}" class="btn btn-outline-white btn-sm">Xem tất cả</a>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach($course_trends as $course_trend)
                                <div></div>
                                <li class="list-group-item px-0 pt-0" style="padding-top: 10px!important;">
                                    <div class="row">
                                        <div class="col-auto">
                                            <a href="{{ route('courses.course_info', ['id'=>$course_trend->id]) }}">
                                                <img src="{{ $course_trend->image_path }}" alt=""
                                                     class="img-fluid rounded img-4by3-lg"/></a>
                                        </div>
                                        <div class="col pl-0">
                                            <a href="{{ route('courses.course_info', ['id'=>$course_trend->id]) }}">
                                                <h5 class="text-primary-hover"
                                                    style="
                                                        -webkit-line-clamp: 1;
                                                        -webkit-box-orient: vertical;
                                                        overflow: hidden;
                                                        display: -webkit-box;"
                                                >
                                                    {{ $course_trend->name }}
                                                </h5>
                                            </a>
                                            <div class="d-flex align-items-center">
                                            <span class="mr-2 font-size-xs">
                            Lượt đăng ký:&nbsp;<span
                                                    class="text-dark  mr-1 font-weight-semi-bold">{{ number_format($course_trend->subscriptions,0,'.',',') }}</span></span>
                                                <span class="mr-2 font-size-xs">
                            Ngày tạo:&nbsp;<span class="text-dark  mr-1 font-weight-semi-bold">{{$course_trend->created_at}}</span></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                                <span class="dropdown dropleft">
                            <a class="text-muted text-decoration-none" href="#!" role="button" id="courseDropdown3"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown3">
                              <span class="dropdown-header">Hành động</span>
                                                <a class="dropdown-item"
                                                   href="{{ route('courses-admin.edit', ['id'=>$course_trend->id]) }}"><i
                                                        class="fe fe-edit dropdown-item-icon "></i>Sửa</a>
                                                <a class="dropdown-item action_delete"
                                                   data-url="{{ route('courses-admin.delete', ['id'=>$course_trend->id]) }}"
                                                   href=""><i
                                                        class="fe fe-trash dropdown-item-icon "></i>Xóa</a>
                                                </span>
                                                </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-12 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center
                              justify-content-between card-header-height">
                        <h4 class="mb-0">Các khóa học mới nhất</h4>
                        <a href="{{ route('courses-admin.index') }}" class="btn btn-outline-white btn-sm">Xem tất cả</a>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach($course_news as $course_new)
                                <div></div>
                                <li class="list-group-item px-0 pt-0" style="padding-top: 10px!important;">
                                    <div class="row">
                                        <div class="col-auto">
                                            <a href="{{ route('courses.course_info', ['id'=>$course_new->id]) }}">
                                                <img src="{{ $course_new->image_path }}" alt=""
                                                     class="img-fluid rounded img-4by3-lg"/></a>
                                        </div>
                                        <div class="col pl-0">
                                            <a href="{{ route('courses.course_info', ['id'=>$course_new->id]) }}">
                                                <h5 class="text-primary-hover"
                                                    style="
                                                        -webkit-line-clamp: 1;
                                                        -webkit-box-orient: vertical;
                                                        overflow: hidden;
                                                        display: -webkit-box;"
                                                >
                                                    {{ $course_new->name }}
                                                </h5>
                                            </a>
                                            <div class="d-flex align-items-center">
                                            <span class="mr-2 font-size-xs">
                            Lượt đăng ký:&nbsp;<span
                                                    class="text-dark  mr-1 font-weight-semi-bold">{{ number_format($course_new->subscriptions,0,'.',',') }}</span></span>
                                                <span class="mr-2 font-size-xs">
                            Ngày tạo:&nbsp;<span class="text-dark  mr-1 font-weight-semi-bold">{{$course_new->created_at}}</span></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                                <span class="dropdown dropleft">
                            <a class="text-muted text-decoration-none" href="#!" role="button" id="courseDropdown3"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown3">
                              <span class="dropdown-header">Hành động</span>
                                                <a class="dropdown-item"
                                                   href="{{ route('courses-admin.edit', ['id'=>$course_new->id]) }}"><i
                                                        class="fe fe-edit dropdown-item-icon "></i>Sửa</a>
                                                <a class="dropdown-item action_delete"
                                                   data-url="{{ route('courses-admin.delete', ['id'=>$course_new->id]) }}"
                                                   href=""><i
                                                        class="fe fe-trash dropdown-item-icon "></i>Xóa</a>
                                                </span>
                                                </span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('admins/list.js') }}"></script>
@endsection
