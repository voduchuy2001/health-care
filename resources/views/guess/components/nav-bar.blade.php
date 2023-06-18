<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
                <a class="navbar-brand" href="{{ route('home.index') }}">SPA<span>CanTho<i
                                        class="fa fa-leaf"></i></span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span> Menu
                </button>
                <div class="collapse navbar-collapse" id="ftco-nav">
                        <ul class="navbar-nav ml-auto">
                                <li class="nav-item {{ request()->routeIs('home.*') ? 'active' : '' }}"><a
                                                href="{{ route('home.index') }}" class="nav-link">Trang chủ</a>
                                </li>

                                <li class="nav-item {{ request()->routeIs('about-us.*') ? 'active' : '' }}"><a
                                                href="{{ route('about-us.index') }}" class="nav-link">Về chúng tôi</a>
                                </li>

                                <li class="nav-item {{ request()->routeIs('service-pack.*') ? 'active' : '' }}"><a
                                                href="{{ route('service-pack.index') }}" class="nav-link">Gói dịch
                                                vụ</a>
                                </li>

                                <li class="nav-item {{ request()->routeIs('service.*') ? 'active' : '' }}"><a
                                                href="{{ route('service.index') }}" class="nav-link">Dịch vụ</a>
                                </li>

                                <li class="nav-item {{ request()->routeIs('contact-us.*') ? 'active' : '' }}"><a
                                                href="{{ route('contact-us.index') }}" class="nav-link">Liên hệ</a>
                                </li>


                                @if (Auth::check())
                                @if (Auth::user()->role === 'is_user')
                                <li class="nav-item">
                                        <a href="{{ route('profile.index') }}" class="nav-link">Thông tin cá nhân</a>
                                </li>
                                @else
                                <li class="nav-item">
                                        <a href="{{ route('dashboard.index') }}" class="nav-link" target="__blank">Trang quản trị</a>
                                </li>
                                @endif
                                @else
                                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Đăng nhập</a>
                                </li>
                                @endif
                        </ul>
                </div>
        </div>
</nav>