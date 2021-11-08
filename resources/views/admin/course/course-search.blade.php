@extends('layouts.dashboard.dashboard')

@section('title')
    <title>Danh sách khóa học</title>
@endsection

@section('content')
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                    @include('partials.dashboard.course-header', ['name' => 'Trang chủ','name_page' =>'Danh sách hóa học' ,'key' => 'Tìm kiếm'])
                    <div>
                        <a href="{{ route('courses-admin.create') }}" class="btn btn-primary">Thêm khóa học mới</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card rounded-lg">
                    <div class="p-4 row">
                        <form action="{{ route('courses-admin.search') }}" method="get"
                            class="d-flex align-items-center col-12 col-md-12 col-lg-12">
                       <span class="position-absolute pl-3 search-icon">
                      <i class="fe fe-search"></i>
                      </span>
                            <input type="search" name="name"
                                   value="{{ $input }}"
                                   class="form-control pl-6"
                                   placeholder="Tìm khóa học"/>
                        </form>
                    </div>
                    <div>
                        <div class="tab-content" id="tabContent">
                            <div class="tab-pane fade show active" id="courses" role="tabpanel"
                                 aria-labelledby="courses-tab">
                                <div class="table-responsive border-0 overflow-y-hidden">
                                    <table class="table mb-0 text-nowrap">
                                        <colgroup>
                                            <col span="1" style="width: 50%">
                                            <col span="1" style="width: 20%">
                                            <col span="1" style="width: 20%">
                                            <col span="1" style="width: 10%">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th scope="col" class="border-0 text-uppercase">
                                                Khóa học
                                            </th>
                                            <th scope="col" class="border-0 text-uppercase">
                                                Danh mục
                                            </th>
                                            <th scope="col" class="border-0 text-uppercase">
                                                Lượt đăng ký
                                            </th>
                                            <th scope="col" class="border-0 text-uppercase"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($names as $name)
                                            <tr>
                                                <td class="border-top-0">
                                                    <a href="{{ route('courses.course_info', ['id'=>$name->id]) }}"
                                                       class="text-inherit">
                                                        <div class="d-lg-flex align-items-center">
                                                            <div>
                                                                <img
                                                                    src="{{ asset($name->image_path) }}"
                                                                    alt="" class="img-4by3-lg rounded"/>
                                                            </div>
                                                            <div class="ml-lg-3 mt-2 mt-lg-0">
                                                                <h4 class="mb-1 text-primary-hover"
                                                                    style="
                                                                            -webkit-line-clamp: 1;
                                                                            -webkit-box-orient: vertical;
                                                                            overflow: hidden;
                                                                            display: -webkit-box;">
                                                                    {{$name->name}}
                                                                </h4>
                                                                <span
                                                                    class="text-inherit">Cập nhật lần cuối: {{$name->updated_at}}</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="align-middle border-top-0">
                                                    <div class="d-flex align-items-center">
                                                        <h5 class="mb-0">{{ optional($name->category)->name }}</h5>
                                                    </div>
                                                </td>
                                                <td class="align-middle border-top-0">{{ number_format($name->subscriptions)  }}</td>
                                                <td class="align-middle border-top-0">
                                  <span class="dropdown">
                                  <a class="text-decoration-none" href="#!" role="button" id="courseDropdown1"
                                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fe fe-more-vertical"></i>
                                  </a>
                                  <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                  <span class="dropdown-header">Hành động</span>
                                  <a class="dropdown-item"
                                     href="{{ route('courses-admin.edit', ['id'=>$name->id]) }}"><i
                                          class="fe fe-edit dropdown-item-icon"></i>Sửa</a>
                                      <a class="dropdown-item action_delete"
                                         data-url="{{ route('courses-admin.delete', ['id'=>$name->id]) }}"
                                         href="">
                                          <i class="fe fe-edit dropdown-item-icon"></i>Xóa</a>
                                  </span>
                                  </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
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

@section('js')
    <script src="{{ asset('admins/list.js') }}"></script>
@endsection

