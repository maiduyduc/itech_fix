<nav class="navbar-vertical navbar">
    <div class="nav-scroller">
        <a class="navbar-brand" href="/"><img src="{{ asset('itech/assets/images/logo.png') }}" alt=""/></a>
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link" href="/admin">
                    <i class="nav-icon fe fe-home mr-2"></i>Trang chủ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#!" data-toggle="collapse" data-target="#navCourses" aria-expanded="false"
                   aria-controls="navCourses">
                    <i class="nav-icon fe fe-book mr-2"></i>Khóa học
                </a>
                <div id="navCourses" class="collapse" data-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('courses-admin.index') }} ">Danh sách khóa học
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.index') }}">Danh mục khóa học
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#!" data-toggle="collapse" data-target="#navProfile" aria-expanded="false"
                   aria-controls="navProfile">
                    <i class="nav-icon fe fe-user mr-2"></i>Người dùng
                </a>
                <div id="navProfile" class="collapse " data-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('users.index') }}">
                                Danh sách người dùng
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link " href="{{ route('roles.index') }}">--}}
{{--                                Danh sách vai trò (Roles)--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link " href="#!" data-toggle="collapse" data-target="#navAuthentication"--}}
{{--                   aria-expanded="false" aria-controls="navAuthentication">--}}
{{--                    <i class="nav-icon fe fe-lock mr-2"></i>Bảo mật--}}
{{--                </a>--}}
{{--                <div id="navAuthentication" class="collapse " data-parent="#sideNavbar">--}}
{{--                    <ul class="nav flex-column">--}}
{{--                        <li class="nav-item ">--}}
{{--                            <a class="nav-link" href="{{ route('permissions.create') }}">Tạo key_code permission</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}
            <li class="nav-item ">
                <div class="nav-divider">
                </div>
            </li>
        </ul>
        <div class="card bg-dark-primary shadow-none text-center mx-4 my-8">
        </div>
    </div>
</nav>
