@php
$data['navbar'] = App\Models\Company::first();
@endphp
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('db.home') }}" class="logo logo-dark">
                    <span class="logo-sm"><img src="{{ asset('img') }}/icon/{{ $data['navbar']->icon  }}" alt=""
                            height="30"></span>
                    <span class="logo-lg"><img src="{{ asset('img') }}/logo/{{ $data['navbar']->logo  }}" alt=""
                            height="32"></span>
                </a>

                <a href="{{ route('db.home') }}" class="logo logo-light">
                    <span class="logo-sm"><img src="{{ asset('img') }}/icon/{{ $data['navbar']->icon  }}" alt=""
                            height="30"></span>
                    <span class="logo-lg"><img src="{{ asset('img') }}/logo/{{ $data['navbar']->logo  }}" alt=""
                            height="32"></span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" style="color: white !important;"
                id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <div class="d-flex w-100">
            @yield('btn.nav')
        </div>

        <div class="d-flex">
            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="header-item bg-light-subtle border-start border-end"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ asset('dashboard') }}/images/users/avatar-1.jpg" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">Paul K.</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i
                            class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>