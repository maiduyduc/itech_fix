@extends('layouts.dashboard.dashboard')

@section('title')
    <title>Thêm danh mục</title>
@endsection

@section('content')
    <div class="col-md-12 p-4">
        @include('partials.dashboard.category-header', ['name' => 'Trang chủ','name_page' =>'Danh mục khóa học' ,'key' => 'Thêm danh mục'])
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0">
                        Tạo danh mục mới
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-6">
                        <form method="post" action="{{ route('categories.store') }}">
                            @csrf
                            <div class="form-group mb-2">
                                <label class="form-label" for="title">Tên danh mục<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục"
                                       id="title"
                                       required/>
                                <small></small>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label">Danh mục</label>
                                <select class="form-control " name="parent_id">
                                    <option value="0" style="font-weight: bold">Chọn danh mục</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <div>
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Tạo mới
                                </button>
                                <a href="{{ route('categories.index') }}" class="btn btn-secondary">
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

