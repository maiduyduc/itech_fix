<nav class="navbar-default navbar navbar-expand-lg">
    <a id="nav-toggle" href="#!"><i class="fe fe-menu"></i></a>
    <ul class="navbar-nav navbar-right-wrap ml-auto  d-flex nav-top-wrap ">
        <li class="dropdown ml-2">
            <a class="rounded-circle " href="#!" role="button" id="dropdownUser" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md">
                    @if( Auth::check() )
                        <img alt="avatar" src="{{ Auth::user()->avatar }}" class="rounded-circle">
                    @else
                        <img alt="avatar" src="{{ asset('itech/assets/images/non_user_default.svg') }}"
                             class="rounded-circle">
                    @endif
                </div>
            </a>
            @if( Auth::check() )
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownUserProfile">
                    <div class="dropdown-item">
                        <div class="d-flex">
                            <div class="avatar avatar-md">
                                <img alt="avatar" src="{{ Auth::user()->avatar }}"
                                     class="rounded-circle"/>
                            </div>
                            <div class="ml-3 lh-1">
                                @if( Auth::user()->level == 0 )
                                    <h5 class="mb-1">{{ Auth::user()->name }} - Admin</h5>
                                @else
                                    <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                                @endif
                                <p class="mb-0 text-muted">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">
                        <li>
                            <a class="dropdown-item" href="{{ route('user.index') }}">
                                <i class="fe fe-user mr-2"></i>Thông tin cá nhân
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('user.subscribe') }}">
                                <i class="fe fe-star mr-2"></i>Khóa học đã đăng ký
                            </a>
                        </li>
                    </ul>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">
                        @if( Auth::user()->level == 0 )
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    <i class="fe fe-settings mr-2"></i>Quản lý trang web
                                </a>
                            </li>
                        @endif
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="fe fe-log-out mr-2"></i>Đăng xuất
                            </a>
                        </li>
                    </ul>
                </div>
            @else
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownUserProfile">
                    <ul class="list-unstyled">
                        <li>
                            <a class="dropdown-item" href="{{ route('register') }}">
                                <i class="fe fe-at-sign mr-2"></i>Đăng ký
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('login') }}">
                                <i class="fe fe-log-in mr-2"></i>Đăng nhập
                            </a>
                        </li>
                    </ul>
                </div>
            @endif
        </li>
    </ul>
</nav>
