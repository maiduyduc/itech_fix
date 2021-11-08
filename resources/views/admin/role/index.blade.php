@extends('layouts.dashboard.dashboard')

@section('title')
    <title>Danh sách người dùng</title>
@endsection

@section('content')
    <div class="container-fluid p-4">
        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                    @include('partials.dashboard.role-header', ['name' => 'Trang chủ','name_page' => 'Vai trò' ,'key' => 'Danh sách vai trò'])
                    <div>
                        <a href="{{ route('roles.create') }}" class="btn btn-primary">Thêm vai trò</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card mb-4">
                    <div class="card-header border-bottom-0">
                        <form class="d-flex align-items-center">
                                    <span class="position-absolute pl-3 search-icon">
                      <i class="fe fe-search"></i>
                    </span>
                            <input type="search" name="name" class="form-control pl-6"
                                   placeholder="Search Course Category"/>
                        </form>
                    </div>
                    <div class="table-responsive border-0 overflow-y-hidden">
                        <table class="table mb-0 text-nowrap">
                            <thead>
                            <tr>
                                <th class="border-0 ">#</th>
                                <th class="border-0">Tên vai trò</th>
                                <th class="border-0">Mô tả</th>
                                <th class="border-0"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td class="align-middle">
                                        {{ $role->id }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $role->name }}
                                    </td>
                                    <td class="align-middle">{{ $role->display_name }}</td>
                                    <td class="text-muted align-middle">
                                                <span class="dropdown dropleft">
                            <a class="text-muted text-decoration-none" href="#!" role="button" id="courseDropdown3"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown3">
                              <span class="dropdown-header">Hành động</span>
                                                <a class="dropdown-item"
                                                   href="{{ route('roles.edit', ['id'=>$role->id]) }}"><i
                                                        class="fe fe-edit dropdown-item-icon"></i>Sửa</a>
                                                <a class="dropdown-item action_delete"
                                                   href=""
                                                   data-url="{{ route('roles.delete', ['id'=>$role->id]) }}"
                                                >
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
                                {{ $roles->links() }}
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
