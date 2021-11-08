@extends('layouts.index.index')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="bg-primary"
         style="background-image: url('{{ asset('itech/assets/images/banner_main.jpg') }}'); z-index: 999 ;background-repeat: no-repeat; background-size: cover">
        <div class="container">
            <div class="row align-items-center no-gutters" style="position: relative">
                <div class="col-xl-5 col-lg-6 col-md-12" style="
                    position: absolute;
                    left: 10px;
                    bottom: 10px;
                    z-index: 1;
                ">
                    <div class="py-5 py-lg-0">
                        <a href="{{ route('courses.course') }}" class="btn btn-success">Danh s&aacute;ch kh&oacute;a
                            học</a>
                        @if(!Auth::check())
                            <a href="{{ route('register') }}" class="btn btn-white">Bạn chưa c&oacute; t&agrave;i
                                khoản?</a>
                        @endif
                    </div>
                </div>
                <div class=" col-xl-1 col-lg-6 col-md-12 text-lg-right text-center">
                    <div style="width: 1px; height: 408px"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white py-4 shadow-sm">
        <div class="container">
            <div class="row align-items-center no-gutters">
                <div class="col-xl-4 col-lg-4 col-md-6 mb-lg-0 mb-4">
                    <div class="d-flex align-items-center">
                        <span
                            class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning font-size-md "> <i
                                class="fe fe-video"> </i></span>
                        <div class="ml-3">
                            <h4 class="mb-0 font-weight-semi-bold">30,000 online courses</h4>
                            <p class="mb-0">Enjoy a variety of fresh topics</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-lg-0 mb-4">
                    <div class="d-flex align-items-center">
                        <span
                            class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning font-size-md "> <i
                                class="fe fe-users"> </i></span>
                        <div class="ml-3">
                            <h4 class="mb-0 font-weight-semi-bold">Expert instruction</h4>
                            <p class="mb-0">Find the right instructor for you</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="d-flex align-items-center">
                        <span
                            class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning font-size-md "> <i
                                class="fe fe-clock"> </i></span>
                        <div class="ml-3">
                            <h4 class="mb-0 font-weight-semi-bold">Lifetime access</h4>
                            <p class="mb-0">Learn on your schedule</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-lg-12 pb-lg-3 pt-8 pb-6">
        <div class="container">
            <div class="row d-lg-flex align-items-center mb-4">
                <div class="col">
                    <h2 class="mb-0">Khóa học đề xuất cho bạn</h2>
                </div>
{{--                <div class="col-auto">--}}
{{--                    <a href="{{ route('courses.course') }}" class="btn btn-outline-primary btn-sm">Xem tất cả</a>--}}
{{--                </div>--}}
            </div>
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card  mb-4 card-hover">
                            <a href="{{ route('courses.course_info', ['id'=>$course->id]) }}" class="card-img-top"><img
                                    src="{{ $course->image_path }}" alt=""
                                    class="card-img-top rounded-top"></a>
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 ">
                                    <a href="{{ route('courses.course_info', ['id'=>$course->id]) }}"
                                       style="-webkit-line-clamp: 1;
                                            -webkit-box-orient: vertical;
                                            overflow: hidden;
                                            display: -webkit-box;"
                                       class="text-inherit">{{ $course->name }}</a>
                                </h4>
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item">
                                        Lượt đăng ký:
                                        {{ number_format($course->subscriptions,0,'.',',') }}
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span class="font-size-xs text-muted"></span>
                                    <a href="{{ route('courses.list',['slug'=>optional($course->category)->slug, 'id'=>optional($course->category)->id]) }}"
                                       class="text-warning">{{ optional($course->category)->name }}</a>
                                </div>
                                <div class="lh-1">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="pb-lg-3 pt-lg-3">
        <div class="container">
            <div class="row d-lg-flex align-items-center mb-4">
                <div class="col">
                    <h2 class="mb-0">Khóa học mới nhất</h2>
                </div>
{{--                <div class="col-auto">--}}
{{--                    <a href="{{ route('courses.course') }}" class="btn btn-outline-primary btn-sm">Xem tất cả</a>--}}
{{--                </div>--}}
            </div>
            <div class="row">
                @foreach($course_news as $course_new)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card  mb-4 card-hover">
                            <a href="{{ route('courses.course_info', ['id'=>$course_new->id]) }}"
                               class="card-img-top"><img
                                    src="{{ $course_new->image_path }}" alt=""
                                    class="card-img-top rounded-top"></a>
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 ">
                                    <a href="{{ route('courses.course_info', ['id'=>$course_new->id]) }}"
                                       style="
                                                                            -webkit-line-clamp: 1;
                                                                            -webkit-box-orient: vertical;
                                                                            overflow: hidden;
                                                                            display: -webkit-box;"
                                       class="text-inherit">{{ $course_new->name }}</a>
                                </h4>
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item">
                                        Lượt đăng ký: {{ number_format($course_new->subscriptions,0,'.',',') }}
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span class="font-size-xs text-muted"></span>
                                    <a href="{{ route('courses.list',['slug'=>optional($course_new->category)->slug, 'id'=>optional($course_new->category)->id]) }}"
                                       class="text-warning">{{ optional($course_new->category)->name }}</a>
                                </div>
                                <div class="lh-1">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="pb-lg-8 pt-lg-3 py-6">
        <div class="container">
            <div class="row d-lg-flex align-items-center mb-4">
                <div class="col">
                    <h2 class="mb-0">Nhiều người đăng ký nhất</h2>
                </div>
{{--                <div class="col-auto">--}}
{{--                    <a href="{{ route('courses.course') }}" class="btn btn-outline-primary btn-sm">Xem tất cả</a>--}}
{{--                </div>--}}
            </div>
            <div class="row">
                @foreach($course_trends as $trend)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card  mb-4 card-hover">
                            <a href="{{ route('courses.course_info', ['id'=>$trend->id]) }}" class="card-img-top"><img
                                    src="{{ $trend->image_path }}" alt=""
                                    class="card-img-top rounded-top"></a>
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 ">
                                    <a href="{{ route('courses.course_info', ['id'=>$trend->id]) }}"
                                       style="
                                            -webkit-line-clamp: 1;
                                            -webkit-box-orient: vertical;
                                            overflow: hidden;
                                            display: -webkit-box;"
                                       class="text-inherit">{{ $trend->name }}</a>
                                </h4>
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item">
                                        Lượt đăng ký:
                                        {{ number_format($trend->subscriptions,0,'.',',') }}
                                    </li>
                                </ul>
                                <div class="lh-1">
                                    <span class="font-size-xs text-muted"></span>
                                    <a href="{{ route('courses.list',['slug'=>optional($trend->category)->slug, 'id'=>optional($course->category)->id]) }}"
                                       class="text-warning">{{ optional($trend->category)->name }}</a>
                                </div>
                                <div class="lh-1">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
