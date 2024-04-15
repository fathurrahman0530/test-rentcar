<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>

    <meta charset="utf-8"/>
    <title>CF Rentcars</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('img')); ?>/logo/fav.png">

    <!-- preloader css -->
    <link rel="stylesheet" href="<?php echo e(asset('dashboard')); ?>/css/preloader.min.css" type="text/css"/>

    <!-- Bootstrap Css -->
    <link href="<?php echo e(asset('dashboard')); ?>/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="<?php echo e(asset('dashboard')); ?>/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="<?php echo e(asset('dashboard')); ?>/css/app.min.css" id="app-style" rel="stylesheet" type="text/css"/>

</head>

<body data-topbar="dark" data-sidebar="dark">
<!-- <body data-layout="horizontal"> -->
<div class="auth-page">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-5 text-center">
                                <a href="<?php echo e(route('lp.home')); ?>" class="d-block auth-logo">
                                    <img src="<?php echo e(asset('img')); ?>/logo/logo.png" alt="" height="45">
                                </a>
                            </div>
                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <h5 class="mb-0">Welcome Back !</h5>
                                    <p class="text-muted mt-2">Sign in to continue to Dason.</p>
                                </div>
                                <form class="mt-4 pt-2" action="<?php echo e(route('login')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-floating form-floating-custom mb-4">
                                        <input type="text" name="username" class="form-control" id="input-username" placeholder="Enter User Name" required>
                                        <label for="input-username">Username</label>
                                        <div class="form-floating-icon">
                                            <i data-feather="users"></i>
                                        </div>
                                    </div>

                                    <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                                        <input type="password" name="password" class="form-control pe-5" id="password-input" placeholder="Enter Password" required>

                                        <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                            <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                        </button>
                                        <label for="input-password">Password</label>
                                        <div class="form-floating-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                        
                                        <a class="btn btn-secondary mt-2 w-100 waves-effect waves-light" href="<?php echo e(route('lp.home')); ?>">Cancel</a>
                                    </div>
                                </form>

                                <div class="mt-5 text-center">
                                    <p class="text-muted mb-0">
                                        Don't have an account ?
                                        <a href="auth-register.html" class="text-primary fw-semibold"> Signup now </a>
                                    </p>
                                </div>
                            </div>
                            <div class="mt-4 mt-md-5 text-center">
                                <p class="mb-0">© 2017 -
                                    <script>document.write(new Date().getFullYear())</script>
                                    CF Rent Car. Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://cfteknologi.id" target="_blank">CF Teknologi</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end auth full page content -->
            </div>
            <!-- end col -->
            <div class="col-xxl-9 col-lg-8 col-md-7">
                <div class="pt-md-5 p-4 d-flex" style="background-image: url(<?php echo e(asset('img/bg.jpg')); ?>); background-position: center; background-size: cover; background-repeat: no-repeat; height: 100%;">
                    <div class="bg-overlay"></div>
                    <ul class="bg-bubbles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <!-- end bubble effect -->
                    <div class="row justify-content-center align-items-end">
                        <div class="col-xl-7">
                            <div class="p-0 p-sm-4 px-xl-0">
                                <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators auth-carousel carousel-indicators-rounded justify-content-center mb-0">
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true"
                                                aria-label="Slide 1">
                                            <img src="<?php echo e(asset('dashboard')); ?>/images/users/avatar-1.jpg" class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                        </button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2">
                                            <img src="<?php echo e(asset('dashboard')); ?>/images/users/avatar-2.jpg" class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                        </button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3">
                                            <img src="<?php echo e(asset('dashboard')); ?>/images/users/avatar-3.jpg" class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                        </button>
                                    </div>
                                    <!-- end carouselIndicators -->
                                    <div class="carousel-inner">
                                    </div>
                                    <!-- end carousel-inner -->
                                </div>
                                <!-- end review carousel -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container fluid -->
</div>

<!-- JAVASCRIPT -->
<script src="<?php echo e(asset('dashboard')); ?>/libs/jquery/jquery.min.js"></script>
<script src="<?php echo e(asset('dashboard')); ?>/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(asset('dashboard')); ?>/libs/metismenu/metisMenu.min.js"></script>
<script src="<?php echo e(asset('dashboard')); ?>/libs/simplebar/simplebar.min.js"></script>
<script src="<?php echo e(asset('dashboard')); ?>/libs/node-waves/waves.min.js"></script>
<script src="<?php echo e(asset('dashboard')); ?>/libs/feather-icons/feather.min.js"></script>
<!-- pace js -->
<script src="<?php echo e(asset('dashboard')); ?>/libs/pace-js/pace.min.js"></script>

<script src="<?php echo e(asset('dashboard')); ?>/js/pages/pass-addon.init.js"></script>

<script src="<?php echo e(asset('dashboard')); ?>/js/pages/feather-icon.init.js"></script>

</body>

</html>
<?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/auth/login.blade.php ENDPATH**/ ?>