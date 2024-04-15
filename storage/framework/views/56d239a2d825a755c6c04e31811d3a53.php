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
                    <h4 class="mb-sm-0 font-size-18">Tambah User</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-lg-6">
            <div class="card">
                <form action="<?php echo e(route('db.master.user.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="act" value="Store">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="fullname">Nama Lengakap <span class="text-danger">*</span></label>
                                <input type="text" name="fullname" id="fullname" class="form-control" required>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="username">Username <span class="text-danger">*</span></label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="notelp">No. Whatsapp <span class="text-danger">*</span></label>
                                <input type="text" name="notelp" id="notelp" class="form-control" required>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5"
                                    required></textarea>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="role">Role <span class="text-danger">*</span></label>
                                <select name="role" id="role" class="form-select" required>
                                    <option value="">- Pilih -</option>
                                    <option value="2">Super Admin</option>
                                    <option value="3">Admin</option>
                                    <option value="4">Driver</option>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="image">Foto KTP <span class="text-danger">*</span></label>
                                <input type="file" name="image" id="image" class="form-control" required>
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
<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/master/user/add.blade.php ENDPATH**/ ?>