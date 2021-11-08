@extends('layouts.dashboard.dashboard')

@section('title')
    <title>Danh mục khóa học</title>
@endsection

@section('content')
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                    @include('partials.dashboard.category-header', ['name' => 'Trang chủ','name_page' => 'Danh mục khóa học' ,'key' => 'Danh mục khóa học'])
                    <div>
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm danh mục</a>
                        <a href="{{ route('categories.trash') }}" class="btn btn-danger">Thùng rác</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card mb-4">
                    <div class="card-header border-bottom-0">
                        <form method="get" action="{{ route('categories.search') }}"
                            class="d-flex align-items-center">
{{--                            @csrf--}}
                                    <span class="position-absolute pl-3 search-icon">
                      <i class="fe fe-search"></i>
                    </span>
                            <input type="search" name="name" class="form-control pl-6"
                                   placeholder="Tìm danh mục"/>
                        </form>
                    </div>
                    <div class="table-responsive border-0 overflow-y-hidden">
                        <table class="table mb-0 text-nowrap">
                            <thead>
                            <tr>
                                <th class="border-0 ">#</th>
                                <th class="border-0">Tên danh mục</th>
                                <th class="border-0">Ngày tạo</th>
                                <th class="border-0">Ngày cập nhật</th>
                                <th class="border-0"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td class="align-middle">
                                        {{ $category->id }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $category->name }}
                                    </td>
                                    <td class="align-middle">{{ $category->created_at }}</td>
                                    <td class="align-middle">{{ $category->updated_at }}</td>
                                    <td class="text-muted align-middle">
                                                <span class="dropdown dropleft">
                            <a class="text-muted text-decoration-none" href="#!" role="button" id="courseDropdown3"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown3">
                              <span class="dropdown-header">Hành động</span>
                                                <a class="dropdown-item"
                                                   href="{{ route('categories.edit', ['id'=>$category->id]) }}"><i
                                                        class="fe fe-edit dropdown-item-icon"></i>Sửa</a>
                                                <a class="dropdown-item action_delete"
                                                   data-url="{{ route('categories.delete', ['id'=>$category->id]) }}"
                                                   href="#!">
                                                    <i class="fe fe-trash dropdown-item-icon"></i>Xóa
                                                </a>
                                                </span>
                                                </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center mb-0">
                                {{ $categories->links() }}
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
