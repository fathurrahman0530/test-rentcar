<?php $__env->startSection('mm.db.master.log', 'mm-active'); ?>
<?php $__env->startSection('db.master.log', 'active'); ?>

<?php $__env->startSection('btn.nav'); ?>
    <a href="<?php echo e(route('db.master.log.detail', ['id' => 1])); ?>" class="btn btn-secondary waves-effect waves-light">
        <i class="mdi mdi-arrow-left-bold-circle"></i>
        <span>Kembali</span>
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Detail Log Action</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/master/log/action.blade.php ENDPATH**/ ?>