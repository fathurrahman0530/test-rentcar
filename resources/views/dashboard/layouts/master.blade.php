<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    @include('dashboard.layouts.head')
    @yield('css')
</head>

<body data-topbar="dark">
@include('sweetalert::alert')
<!-- Begin page -->
<div id="layout-wrapper">

    @include('dashboard.layouts.navbar')
    <!-- ========== Left Sidebar Start ========== -->
    @include('dashboard.layouts.sidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        @yield('content')
        <!-- End Page-content -->

        @include('dashboard.layouts.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

@yield('modals')

<!-- JAVASCRIPT -->
@include('dashboard.layouts.javascript')

@yield('js')

</body>

</html>