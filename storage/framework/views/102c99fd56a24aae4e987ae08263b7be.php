<?php
$data['head'] = App\Models\Company::first();
?>
<title><?php echo e($data['head']->name); ?></title>
<link rel="icon" href="<?php echo e(asset('img')); ?>/icon/<?php echo e($data['head']->icon); ?>" type="image/gif" sizes="16x16">
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="Rentaly - Multipurpose Vehicle Car Rental Website Template" name="description">
<meta content="" name="keywords">
<meta content="" name="author">
<!-- CSS Files
================================================== -->
<link href="<?php echo e(asset('landing')); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap">
<link href="<?php echo e(asset('landing')); ?>/css/mdb.min.css" rel="stylesheet" type="text/css" id="mdb">
<link href="<?php echo e(asset('landing')); ?>/css/plugins.css" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('landing')); ?>/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('landing')); ?>/css/coloring.css" rel="stylesheet" type="text/css">
<!-- color scheme -->
<link id="colors" href="<?php echo e(asset('landing')); ?>/css/colors/scheme-01.css" rel="stylesheet" type="text/css">
<?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/landing/layouts/head.blade.php ENDPATH**/ ?>