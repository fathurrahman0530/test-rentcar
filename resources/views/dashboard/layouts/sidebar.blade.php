<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                @if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3)
                    <li class="menu-title">Menu</li>

                    <li class="@yield('mm.db.home')">
                        <a href="{{ route('db.home') }}" class="@yield('db.home')">
                            <i class="mdi mdi-home-circle-outline"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="menu-title">SPK</li>

                    <li class="@yield('mm.db.spk.penyewaan')">
                        <a href="{{ route('db.spk.penyewaan') }}" class="@yield('db.spk.penyewaan')">
                            <i class="mdi mdi-invoice-text-edit"></i>
                            <span>Data Penyewaan</span>
                        </a>
                    </li>

                    <li class="@yield('mm.db.spk.riwayat.penyewaan')">
                        <a href="{{ route('db.spk.riwayat.penyewaan') }}" class="@yield('db.spk.riwayat.penyewaan')">
                            <i class="mdi mdi-invoice-text-clock"></i>
                            <span>Riwayat Penyewaan</span>
                        </a>
                    </li>
                @endif

                @if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3)
                    <li class="menu-title">Master Data</li>

                    <li class="@yield('mm.db.master.mobil')">
                        <a href="{{ route('db.master.mobil') }}" class="@yield('db.master.mobil')">
                            <i class="mdi mdi-car-hatchback"></i>
                            <span>Data Mobil</span>
                        </a>
                    </li>

                    <li class="@yield('mm.db.master.pelanggan')">
                        <a href="{{ route('db.master.pelanggan') }}" class="@yield('db.master.pelanggan')">
                            <i class="mdi mdi-account-group"></i>
                            <span>Data Pelanggan</span>
                        </a>
                    </li>

                    <li class="@yield('mm.db.master.user')">
                        <a href="{{ route('db.master.user') }}" class="@yield('db.master.user')">
                            <i class="mdi mdi-account-group"></i>
                            <span>Data User</span>
                        </a>
                    </li>

                    <li class="@yield('mm.db.master.merk')">
                        <a href="{{ route('db.master.merk') }}" class="@yield('db.master.merk')">
                            <i class="mdi mdi-car-multiple"></i>
                            <span>Data Brand</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
