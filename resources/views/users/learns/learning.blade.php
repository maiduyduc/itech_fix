@extends('layouts.index.learning')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="mt-13 course-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Tab content -->
                    <div class="tab-content content" id="course-tabContent-{{ $i = 1 }}">
                        @foreach($lectures as $lecture)
                            <div class="tab-pane fade show @if($i==1) active @endif" id="course-{{ $lecture->id }}"
                                 role="tabpanel"
                                 name="{{ $i++ }}"
                                 aria-labelledby="course-{{ $lecture->id }}">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div>
                                        <h3 class=" mb-0  text-truncate-line-2">{{ $lecture->name }}</h3>
                                    </div>
                                </div>
                                <!-- Video -->
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item"
                                            src="{{ $lecture->lecture_link }}"></iframe>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card -->
    <div class="card course-sidebar " id="courseAccordion">
        <!-- List group -->
        <ul class="list-group list-group-flush course-list">
            <li class="list-group-item">
                <h4>{{ $name }}</h4>
            </li>
            <!-- List group item -->
            <li class="list-group-item">
                <!-- Toggle -->
                <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0" data-toggle="collapse"
                   href="#courseTwo" role="button" aria-expanded="false" aria-controls="courseTwo">
                    <div class="mr-auto">
                        Danh sách bài học
                    </div>
                    <!-- Chevron -->
                    <span class="chevron-arrow  ml-4">
              <i class="fe fe-chevron-down font-size-md"></i>
            </span>
                </a>
                <!-- Row -->
                <!-- Collapse -->
                <div class="collapse show" id="courseTwo" data-parent="#courseAccordion">
                    <div class="py-4 nav" id="course-tabOne" role="tablist" aria-orientation="vertical"
                         style="display: inherit;">
                        @foreach($lectures as $lecture)
                            <a class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none"
                               id="course-{{ $lecture->id }}" data-toggle="pill" href="#course-{{ $lecture->id }}"
                               role="tab"
                               aria-controls="course-{{ $lecture->id }}"
                               aria-selected="true">
                                <div class="text-truncate">
                  <span class="icon-shape bg-light text-primary icon-sm  rounded-circle mr-2"><i
                          class="fe fe-play  font-size-xs"></i></span>
                                    <span>{{ $lecture->name }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </li>
        </ul>
    </div>
@endsection
