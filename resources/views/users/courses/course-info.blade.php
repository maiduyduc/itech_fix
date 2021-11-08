@extends('layouts.index.index')

@section('title')
    <title>{{ $course->name }}</title>
@endsection

@section('content')
    <div class="pt-lg-8 pb-lg-12 pt-8 pb-12 bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div>
                        <h1 class="text-white display-4 font-weight-semi-bold">{{ $course->name }}</h1>
{{--                        <p class="text-white mb-4 lead">--}}
{{--                        </p>--}}
                        <div class="d-flex align-items-center">
                            <span class="text-white">
                                <i class="fe fe-user text-white-50"></i>
                                {{ number_format($course->subscriptions) }} lượt đăng ký
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 mt-n8 mb-4 mb-lg-0">
                    <div class="card rounded-lg">
                        <div class="card-header border-bottom-0 p-0">
                            <div>
                                <ul class="nav nav-lb-tab" id="tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="description-tab" data-toggle="pill"
                                           href="#description" role="tab"
                                           aria-controls="description" aria-selected="false">Giới thiệu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="table-tab" data-toggle="pill" href="#table" role="tab"
                                           aria-controls="table" aria-selected="true">Bài học</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="tabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel"
                                     aria-labelledby="description-tab">
                                    <div class="mb-4">
                                        {!! $course->content !!}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="table" role="tabpanel" aria-labelledby="table-tab">
                                    <div class="accordion" id="courseAccordion">
                                        <div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0 pt-0">
                                                    <a class=" h4 mb-0 d-flex align-items-center text-inherit text-decoration-none active"
                                                       data-toggle="collapse" href="#courseTwo" aria-expanded="true"
                                                       aria-controls="courseTwo">
                                                        <div class="mr-auto">
                                                            Danh sách bài học
                                                        </div>
                                                        <span class="chevron-arrow ml-4">
                              <i class="fe fe-chevron-down font-size-md"></i>
                            </span>
                                                    </a>
                                                    <div class="collapse show" id="courseTwo"
                                                         data-parent="#courseAccordion">
                                                        <div class="pt-3 pb-2">
                                                            @foreach($course->courseLectures as $lec)
                                                                <a href="#!"
                                                                   class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                                    <div class="text-truncate">
                                  <span class="icon-shape bg-light text-primary icon-sm rounded-circle mr-2"><i
                                          class="mdi mdi-play font-size-md"></i></span>
                                                                        <span>{{$lec->name}}</span>
                                                                    </div>
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 mt-lg-n8">
                    <div class="card mb-3 mb-4">
                        <div class="p-1">
                            <div
                                class="d-flex justify-content-center position-relative rounded py-10 border-white border rounded-lg bg-cover"
                                style="background-image: url('{{ $course->image_path }}');">
                                <a
                                    style="opacity: 0; cursor: default;"
                                    class="popup-youtube icon-shape rounded-circle btn-play icon-xl text-decoration-none"
                                    href="#!">
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(Auth::check())
                                @if( !$subscription->isEmpty() )
                                    <a type="button" disabled="" style="pointer-events: none"
                                       class="btn btn-primary btn-block">Đã đăng ký</a>
                                @else
                                    <a href="{{ route('subscriptions.subscribe',['id'=>$course->id]) }}"
                                       class="btn btn-primary btn-block">Đăng ký khóa học</a>
                                @endif
                            @else
                                <a href="{{ route('subscriptions.subscribe',['id'=>$course->id]) }}"
                                   class="btn btn-primary btn-block">Đăng ký khóa học</a>
                            @endif
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div>
                            <div class="card-header">
                                <h4 class="mb-0">Có gì trong khóa học này</h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent"><i
                                        class="fe fe-play-circle align-middle mr-2 text-primary"></i>{{count($course->courseLectures)}}
                                    video bài giảng
                                </li>
                                <li class="list-group-item bg-transparent"><i
                                        class="fe fe-award mr-2 align-middle text-success"></i>Chứng chỉ sau khi hoàn
                                    thành khóa học
                                </li>
                                <li class="list-group-item bg-transparent"><i
                                        class="fe fe-video align-middle mr-2 text-secondary"></i>Xem video mọi lúc mọi
                                    nơi
                                </li>
                                <li class="list-group-item bg-transparent border-bottom-0"><i
                                        class="fe fe-clock align-middle mr-2 text-warning"></i>Sở hữu trọn đời
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-12 pb-3">
                <div class="row d-md-flex align-items-center mb-4">
                    <div class="col-12">
                        <h2 class="mb-0">Khóa học đề xuất cho bạn</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($courses_random as $random)
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card  mb-4 card-hover">
                                <a href="{{ route('courses.course_info', ['id'=>$random->id]) }}"
                                   class="card-img-top"><img
                                        src="{{ $random->image_path }}" alt=""
                                        class="card-img-top rounded-top"></a>
                                <div class="card-body">
                                    <h4 class="mb-2 text-truncate-line-2 ">
                                        <a href="{{ route('courses.course_info', ['id'=>$random->id]) }}"
                                           style="-webkit-line-clamp: 1;
                                                                                                  -webkit-box-orient: vertical;
                                                                                                  overflow: hidden;
                                                                                                  display: -webkit-box;"
                                           class="text-inherit">{{ $random->name }}</a>
                                    </h4>
                                    <ul class="mb-3 list-inline">
                                        <li class="list-inline-item">
                                            Lượt đăng ký: {{ number_format($random->subscriptions) }}
                                        </li>
                                    </ul>
                                    <div class="lh-1">
                                        <span class="font-size-xs text-muted">Danh mục</span>
                                        <a href="{{ route('courses.list',['slug'=>optional($random->category)->slug, 'id'=>optional($random->category)->id]) }}"
                                           class="text-warning">{{ optional($random->category)->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

