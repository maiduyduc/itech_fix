@extends('layouts.index.index')

@section('title')
    <title>Danh sách khóa học</title>
    <style>
        .navbar-nav .nav-item .nav-link {
            /*padding: .5rem 1.5rem;*/
            display: flex;
            align-items: center;
            color: #333333;
            font-weight: 500;
            line-height: 1.8;
            transition: all 0s;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #593cc1;
        }

        .navbar-nav .nav-item .nav-link:hover .nav-icon {
            color: #593cc1;
            opacity: 1
        }

        .nav-link2 {
            padding-left: 1.35rem !important;
        }

        .navbar-nav .nav-item .nav-link[data-toggle=collapse] {
            position: relative;
        }

        .navbar-nav .nav-item .nav-link[data-toggle=collapse]:after {
            display: block;
            content: "\e92e";
            font-family: Feather;
            margin-left: auto;
            transition: .5s ease;
            position: absolute;
            right: 0rem;
            padding-left: 2.5rem;
        }

    </style>
@endsection

@section('content')
    <div class="bg-primary py-4 py-lg-6">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div>
                        <h1 class="mb-0 text-white display-4">Kết quả tìm kiếm cho "{{ $input }}"</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                    <div class="row d-lg-flex justify-content-between align-items-center">
                        <div class="col-md-6 col-lg-8 col-xl-9 ">
                        </div>
                        <div class="d-inline-flex col-md-6 col-lg-4 col-xl-3 ">
                            <div class="mr-2">
                                <div class="nav btn-group flex-nowrap" role="tablist">
                                    <button class="btn btn-outline-white  active" data-toggle="tab"
                                            data-target="#tabPaneGrid" role="tab"
                                            aria-controls="tabPaneGrid" aria-selected="true">
                                        <span class="fe fe-grid"></span>
                                    </button>
                                    <button class="btn btn-outline-white " data-toggle="tab" data-target="#tabPaneList"
                                            role="tab"
                                            aria-controls="tabPaneList" aria-selected="false">
                                        <span class="fe fe-list"></span>
                                    </button>
                                </div>
                            </div>
                            <select class="selectpicker" data-width="100%">
                                <option disabled selected style="display:none;">Sắp xếp</option>
                                <option value="Newest">Mới nhất</option>
                                <option value="Trend">Nhiều lượt đăng ký nhất</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-12 mb-4 mb-lg-0">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Danh mục</h4>
                        </div>
                        <div class="card-body">
                            <ul class="navbar-nav flex-column" id="sideNavbar">
                                <li class="nav-item">
                                    <a class="nav-link"
                                       href="{{ route('courses.course') }} "><i class="nav-icon fe fe-book mr-2"></i>
                                        Tất cả
                                    </a>
                                </li>
                                @foreach($categories_limit as $category)
                                    <li class="nav-item">
                                        <a class="nav-link " href="#!" data-toggle="collapse"
                                           data-target="#navCourses{{$category->id}}"
                                           aria-expanded="false" aria-controls="navCourses">
                                            <i class="nav-icon fe fe-book mr-2"></i>{{ $category->name }}
                                        </a>
                                        <div id="navCourses{{$category->id}}" class="collapse"
                                             data-parent="#sideNavbar">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link nav-link2"
                                                       href="{{ route('courses.list',['slug'=>$category->slug, 'id'=>$category->id]) }} ">
                                                        {{ $category->name }}
                                                    </a>
                                                </li>
                                                @foreach($category->categoryChidlren as $child)
                                                    <li class="nav-item">
                                                        <a class="nav-link nav-link2"
                                                           href="{{ route('courses.list',['slug'=>$child->slug, 'id'=>$child->id]) }} ">
                                                            {{ $child->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-8 col-12">
                    <div class="tab-content">
                        <div class="tab-pane fade show active pb-4 " id="tabPaneGrid" role="tabpanel"
                             aria-labelledby="tabPaneGrid">
                            <div class="row">
                                @if($names->isEmpty())
                                    <div class="col-lg-12 col-md-6 col-12">
                                        <div class="card  mb-4 card-hover">
                                            <div class="card-body">
                                                <h4 class="mb-2 text-truncate-line-2 ">
                                                    Không tìm thấy khóa học bạn yêu cầu.
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @foreach($names as $name)
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="card  mb-4 card-hover">
                                                <a href="{{ route('courses.course_info', ['id'=>$name->id]) }}"
                                                   class="card-img-top"><img
                                                        src="{{ $name->image_path }}" alt=""
                                                        class="card-img-top rounded-top"></a>
                                                <div class="card-body">
                                                    <h4 class="mb-2 text-truncate-line-2 ">
                                                        <a href="{{ route('courses.course_info', ['id'=>$name->id]) }}"
                                                           style="-webkit-line-clamp: 1;
                                                                                                  -webkit-box-orient: vertical;
                                                                                                  overflow: hidden;
                                                                                                  display: -webkit-box;"
                                                           class="text-inherit">{{ $name->name }}</a>
                                                    </h4>
                                                    <ul class="mb-3 list-inline">
                                                        <li class="list-inline-item">
                                                            Lượt đăng ký: {{ number_format($name->subscriptions) }}
                                                        </li>
                                                    </ul>
                                                    <div class="lh-1">
                                                        <span class="font-size-xs text-muted"></span>
                                                        <a href="{{ route('courses.list',['slug'=>optional($name->category)->slug, 'id'=>optional($name->category)->id]) }}"
                                                           class="text-warning">{{ optional($name->category)->name }}</a>
                                                    </div>
                                                    <div class="lh-1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade pb-4" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
                            @if($names->isEmpty())
                                <div class="card mb-4 card-hover">
                                    <div class="row no-gutters">
                                        <div class="col-lg-9 col-md-12 col-12">
                                            <div class="card-body">
                                                <h4 class="mb-2 text-truncate-line-2 ">
                                                    Không tìm thấy khóa học bạn yêu cầu.
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @foreach($names as $name)
                                    <div class="card mb-4 card-hover">
                                        <div class="row no-gutters">
                                            <a class="col-12 col-md-12 col-xl-3 col-lg-3 bg-cover img-left-rounded"
                                               style="background-image: url({{ $name->image_path }});" href="#!">
                                                <img src="{{ $name->image_path }}" alt="..."
                                                     class="img-fluid d-lg-none invisible">
                                            </a>
                                            <div class="col-lg-9 col-md-12 col-12">
                                                <div class="card-body">
                                                    <h3 class="mb-2 text-truncate-line-2 ">
                                                        <a href="#!"
                                                           style="-webkit-line-clamp: 1;
                                                                  -webkit-box-orient: vertical;
                                                                  overflow: hidden;
                                                                  display: -webkit-box;"
                                                           class="text-inherit">{{ $name->name }}</a>
                                                    </h3>
                                                    <ul class="mb-5 list-inline">
                                                        <li class="list-inline-item">
                                                            Lượt &dstrok;&abreve;ng
                                                            k&yacute;: {{ number_format($name->subscriptions) }}
                                                        </li>
                                                    </ul>
                                                    <div class="lh-1">
                                                        <span class="font-size-xs text-muted"></span>
                                                        <span
                                                            class="text-warning">{{ optional($name->category)->name }}</span>
                                                    </div>
                                                    <div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center mb-0">
                                {{ $names->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

