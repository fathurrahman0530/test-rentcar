<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php echo $__env->make('landing.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <div id="wrapper">
        <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- header begin -->
        <?php echo $__env->make('landing.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- header close -->
        <!-- content begin -->
        <?php echo $__env->yieldContent('content'); ?>
        <!-- content close -->
        <a href="#" id="back-to-top"></a>
        <!-- footer begin -->
        <?php echo $__env->make('landing.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- footer close -->
    </div>

    <?php echo $__env->yieldContent('modal'); ?>

    <!-- Javascript Files
================================================== -->
    <script src="<?php echo e(asset('landing')); ?>/js/plugins.js"></script>
    <script src="<?php echo e(asset('landing')); ?>/js/designesia.js"></script>

</body>

</html>
<?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/landing/layouts/master.blade.php ENDPATH**/ ?>