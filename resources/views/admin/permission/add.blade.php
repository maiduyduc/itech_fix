@extends('layouts.dashboard.dashboard')

@section('title')
    <title>Thêm vai trò</title>
@endsection

@section('content')
    <div class="col-md-12 p-4">
        @include('partials.dashboard.role-header', ['name' => 'Trang chủ','name_page' => 'Permission' ,'key' => 'Thêm Key Code'])
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0">
                        Thêm vai trò
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form method="post" action="{{ route('permissions.store') }}">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="module" class="text-primary">Chọn module name</label>
                                <select id="module" class="form-control " name="module_parent">
                                    <option value="" style="font-weight: bold">Chọn tên module</option>
                                    @foreach(config('permissions.table_module') as $moduleItem)
                                        <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                            </div>
                            <br>
                            <div class="form-group mb-2">
                                <div class="row">
                                    @foreach(config('permissions.module_children') as $moduleItemChildren)
                                        <div class="col-md-3">
                                            <label>
                                                <input type="checkbox" name="module_children[]"
                                                       value="{{ $moduleItemChildren }}"> {{ $moduleItemChildren }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <br>
                            <div>
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Tạo mới
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

