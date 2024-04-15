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
                    <h4 class="mb-sm-0 font-size-18">Edit User</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-lg-6">
            <div class="card">
                <form action="<?php echo e(route('db.master.user.update')); ?>" enctype="multipart/form-data" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="act" value="Update">
                    <input type="hidden" name="IDUser" value="<?php echo e($data->IDUser); ?>">
                    <input type="hidden" name="IDBio" value="<?php echo e($data->IDBio); ?>">
                    <input type="hidden" name="old_image" value="<?php echo e($data->profile); ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="fullname">Nama Lengakap</label>
                                <input type="text" name="fullname" id="fullname" value="<?php echo e($data->fullname); ?>"
                                    class="form-control">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" value="<?php echo e($data->username); ?>"
                                    class="form-control">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" value="<?php echo e($data->email); ?>"
                                    class="form-control">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="notelp">No. Whatsapp</label>
                                <input type="text" name="notelp" id="notelp" value="<?php echo e($data->notelp); ?>"
                                    class="form-control">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" value="<?php echo e($data->alamat); ?>"
                                    cols="30" rows="5"><?php echo e($data->alamat); ?></textarea>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-select">
                                    <option value="">- Pilih -</option>
                                    <option value="2" <?php echo e($data->role == 2 ? 'selected' : ''); ?>>Super Admin</option>
                                    <option value="3" <?php echo e($data->role == 3 ? 'selected' : ''); ?>>Admin</option>
                                    <option value="4" <?php echo e($data->role == 4 ? 'selected' : ''); ?>>Driver</option>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="image">Foto</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i>
                            <span>Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/master/user/edit.blade.php ENDPATH**/ ?>