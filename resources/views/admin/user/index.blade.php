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
                    @include('partials.dashboard.user-header', ['name' => 'Trang chủ','name_page' => 'Người dùng' ,'key' => 'Danh sách người dùng'])
                    <div>
                        <a href="{{ route('users.create') }}" class="btn btn-primary">Tạo tài khoản</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card mb-4">
                    <div class="card-header border-bottom-0">
                        <form action="{{ route('users.search') }}" method="get"
                            class="d-flex align-items-center">
                                    <span class="position-absolute pl-3 search-icon">
                      <i class="fe fe-search"></i>
                    </span>
                            <input type="search" name="email" class="form-control pl-6"
                                   placeholder="Tìm người dùng"/>
                        </form>
                    </div>
                    <div class="table-responsive border-0 overflow-y-hidden">
                        <table class="table mb-0 text-nowrap">
                            <thead>
                            <tr>
                                <th class="border-0 ">#</th>
                                <th class="border-0">Tên</th>
                                <th class="border-0">Email</th>
                                <th class="border-0">Level</th>
                                <th class="border-0"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="align-middle">
                                        {{ $user->id }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $user->name }}
                                    </td>
                                    <td class="align-middle">{{ $user->email }}</td>
                                    <td class="align-middle">{{ $user->level }}</td>
                                    <td class="text-muted align-middle">
                                                <span class="dropdown dropleft">
                            <a class="text-muted text-decoration-none" href="#!" role="button" id="courseDropdown3"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown3">
                              <span class="dropdown-header">Hành động</span>
                                                <a class="dropdown-item"
                                                   href="{{ route('users.edit', ['id'=>$user->id]) }}"><i
                                                        class="fe fe-edit dropdown-item-icon"></i>Sửa</a>
                                                <a class="dropdown-item action_delete"
                                                    style="@if($user->level ==0) display: none; @endif"
                                                   href=""
                                                   data-url="{{ route('users.delete', ['id'=>$user->id]) }}"
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
                                {{ $users->links() }}
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
    <script src="{{ asset('itech/assets/js/select2.min.js') }}"></script>
    <script>
        $(function () {
            $(".tag_select_choose").select2({
                'placeholder': 'Chọn vai trò',
            })
        })
    </script>
@endsection
