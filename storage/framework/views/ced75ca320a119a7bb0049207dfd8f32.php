<?php
$data['head'] = App\Models\Company::first();
?>
<meta charset="utf-8" />
<title><?php echo e($data['head']->name); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="<?php echo e(asset('img')); ?>/icon/<?php echo e($data['head']->icon); ?>">

<!-- DataTables -->
<link href="<?php echo e(asset('dashboard')); ?>/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />
<link href="<?php echo e(asset('dashboard')); ?>/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />
<link href="<?php echo e(asset('dashboard')); ?>/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />

<!-- choices css -->
<link href="<?php echo e(asset('dashboard')); ?>/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet"
    type="text/css" />

<!-- color picker css -->
<link rel="stylesheet" href="<?php echo e(asset('dashboard')); ?>/libs/@simonwep/pickr/themes/classic.min.css" />
<!-- 'classic' theme -->
<link rel="stylesheet" href="<?php echo e(asset('dashboard')); ?>/libs/@simonwep/pickr/themes/monolith.min.css" />
<!-- 'monolith' theme -->
<link rel="stylesheet" href="<?php echo e(asset('dashboard')); ?>/libs/@simonwep/pickr/themes/nano.min.css" /> <!-- 'nano' theme -->

<!-- datepicker css -->
<link rel="stylesheet" href="<?php echo e(asset('dashboard')); ?>/libs/flatpickr/flatpickr.min.css">

<!-- plugin css -->
<link href="<?php echo e(asset('dashboard')); ?>/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
    type="text/css" />

<!-- material design -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">

<!-- preloader css -->
<link rel="stylesheet" href="<?php echo e(asset('dashboard')); ?>/css/preloader.min.css" type="text/css" />

<!-- Bootstrap Css -->
<link href="<?php echo e(asset('dashboard')); ?>/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->

<!-- App Css-->
<link href="<?php echo e(asset('dashboard')); ?>/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/layouts/head.blade.php ENDPATH**/ ?>