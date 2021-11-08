@extends('layouts.dashboard.dashboard')

@section('title')
    <title>Thêm vai trò</title>
@endsection

@section('content')
    <div class="col-md-12 p-4">
        @include('partials.dashboard.role-header', ['name' => 'Trang chủ','name_page' => 'Vai trò' ,'key' => 'Cập nhật vai trò'])
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0">
                        Cập nhật vai trò
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form method="post" action="{{ route('roles.update', ['id'=>$role->id]) }}">
                            @csrf
                            <div class="form-group mb-2">
                                <label class="form-label" for="name">Tên vai trò<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Nhập tên vai trò"
                                       id="name" value="{{ $role->name }}"
                                       required/>
                                <small></small>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label" for="display_name">Mô tả<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="display_name" class="form-control" placeholder="Mô tả vai trò"
                                       id="display_name" value=" {{ $role->display_name }} "
                                       required/>
                                <small></small>
                            </div>
                            <div class="col-md-12">
                                <label>
                                    <input type="checkbox" class="checkall"> Chọn tất cả
                                </label>
                            </div>
                            @foreach($permissionsParent as $permisstionItem)
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="card border-dark mb-3 col-md-12" style="border: 1px solid">
                                            <h5 class="card-header border-dark">
                                                <label>
                                                    <input type="checkbox"
                                                           value="" class="checkbox_wrapper">
                                                </label>
                                                Module {{ $permisstionItem->name }}
                                            </h5>
                                            <div class="row">
                                                @foreach($permisstionItem->permissionChildren as $permissionsChildren)
                                                    <div class="card-body">
                                                        <div class="card-title">
                                                            <label>
                                                                <input type="checkbox"
                                                                       {{ $permissionsChecked->contains('id', $permissionsChildren->id) ? ' checked' : '' }}
                                                                       class="checkbox_children"
                                                                       name="permission_id[]"
                                                                       value="{{ $permissionsChildren->id }}"></label>
                                                            </label>
                                                            {{ $permissionsChildren->name }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div>
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Cập nhật
                                </button>
                                <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                                    Hủy
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function () {
            $('.checkbox_wrapper').on('click', function () {
                $(this).parents('.card').find('.checkbox_children').prop('checked', $(this).prop('checked'));
            });
            $('.checkall').on('click', function () {
                $(this).parents().find('.checkbox_wrapper').prop('checked', $(this).prop('checked'));
                $(this).parents().find('.checkbox_children').prop('checked', $(this).prop('checked'));
            });
        });
    </script>
@endsection

