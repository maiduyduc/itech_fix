@extends('layouts.dashboard.dashboard')

@section('title')
    <title>Sửa thông tin người dùng</title>
@endsection

@section('content')
    <div class="col-md-12 p-4">
        @include('partials.dashboard.user-header', ['name' => 'Trang chủ','name_page' => 'Người dùng' ,'key' => 'Sửa thông tin người dùng'])
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0">
                        Sửa thông tin tài khoản
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-6">
                        <form method="post" action="{{ route('users.update',['id'=>$user->id]) }}">
                            @csrf
                            <div class="form-group mb-2">
                                <label class="form-label" for="name">Tên người dùng<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                       placeholder="Nhập tên người dùng" id="name"
                                       required/>
                                <small></small>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label" for="email">Email<span
                                        class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                       placeholder="Nhập email" id="email"
                                       required/>
                                <small></small>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label" for="password">Mật khẩu<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="password"
                                       class="form-control" placeholder="Nhập mật khẩu" id="password"
                                />
                                <small></small>
                            </div>
                            <div class="form-group mb-2" style="@if($user->level ==0) display: none; @endif">
                                <label class="form-label">Level</label>
                                <span class="font-size-xs text-muted">(level 0 là admin, level 1 là người dùng)</span>
                                <select class="form-control"
                                        name="level">
                                    <option value="" disabled>Chọn level</option>
                                    @for($i=0;$i <= 1; $i ++)
                                        @if($user->level == $i)
                                            <option value="{{ $i }}" selected>{{ $i }}</option>
                                        @else
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endif
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label">Vai trò</label>
                                <select class="form-control tag_select_choose"
                                        name="role_id[]"
                                        multiple="multiple">
                                    <option value=""></option>
                                    @foreach($roles as $role)
                                        <option
                                            {{ $role_user->contains('id', $role->id) ? 'selected' : ''}}
                                            value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div>
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Cập nhật
                                </button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">
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
    <script src="{{ asset('itech/assets/js/select2.min.js') }}"></script>
    <script>
        $(function () {
            $(".tag_select_choose").select2({
                'placeholder': 'Chọn vai trò',
            })
        })
    </script>
@endsection
