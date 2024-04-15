<?php $__env->startSection('mm.db.master.user', 'mm-active'); ?>
<?php $__env->startSection('db.master.user', 'active'); ?>

<?php $__env->startSection('btn.nav'); ?>
<a href="<?php echo e(route('db.master.user')); ?>" class="btn btn-secondary waves-effect waves-light">
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
                    <h4 class="mb-sm-0 font-size-18">Detail User</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-4">
                <center>
                    <img src="<?php echo e(asset('img')); ?>/user/<?php echo e($data->profile); ?>" alt="Tidak ada gambar" width="85%"
                        style="border-radius: 25px;">
                </center>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="fullname">Nama Lengakap</label>
                                <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo e($data->fullname); ?>" readonly>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    value="<?php echo e($data->username); ?>" readonly>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="email">Email</label>
                                <input type="email" value="<?php echo e($data->email); ?>" name="email" id="email"
                                    class="form-control" readonly>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="notelp">No. Whatsapp</label><br>
                                <a href="https://wa.me/62<?php echo e(substr($data->notelp, 1)); ?>"
                                    target="_blank"><?php echo e($data->notelp); ?></a>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5"
                                    readonly><?php echo e($data->alamat); ?></textarea>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="role">Role</label><br>
                                <span><?php echo e($data->role == 2 ? 'Super Admin' : ($data->role == 3 ? 'Admin' : ($data->role
                                    == 4 ?
                                    'Driver' : ''))); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/master/user/detail.blade.php ENDPATH**/ ?>