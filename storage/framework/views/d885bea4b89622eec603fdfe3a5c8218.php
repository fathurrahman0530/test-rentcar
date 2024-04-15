<?php $__env->startSection('mm.db.master.mobil', 'mm-active'); ?>
<?php $__env->startSection('db.master.mobil', 'active'); ?>

<?php $__env->startSection('btn.nav'); ?>
<a href="<?php echo e(route('db.master.mobil')); ?>" class="btn btn-secondary waves-effect waves-light">
    <i class="mdi mdi-arrow-left-bold-circle"></i>
    <span>Kembali</span>
</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tambah Data Mobil</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-8">
            <div class="card">
                <form action="<?php echo e(route('db.master.mobil.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="act" value="Store">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="brand">Brand <span class="text-danger">*</span></label>
                                <select class="form-control" data-trigger name="brand" id="choices-single-default"
                                    required>
                                    <option value="">-- Pilih --</option>
                                    <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($b->uuid); ?>"><?php echo e($b->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="name">Merk <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="thn_mobil">Tahun Mobil <span class="text-danger">*</span></label>
                                <input type="number" name="thn_mobil" id="thn_mobil" class="form-control" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="no_polisi">No. Polisi <span class="text-danger">*</span></label>
                                <input type="text" name="no_polisi" id="no_polisi" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="harga">Harga <span class="text-danger">*</span></label>
                                <input type="number" name="harga" id="harga" class="form-control" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="kondisi">Kondisi <span class="text-danger">*</span></label>
                                <select name="kondisi" id="kondisi" class="form-select" required>
                                    <option value="">- Pilih -</option>
                                    <option value="B">Baik</option>
                                    <option value="S">Service</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="foto">Gambar Mobil <span class="text-danger">*</span></label>
                            <input type="file" name="foto" id="foto" class="form-control" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <i class="mdi mdi-content-save-all"></i>
                            <span>Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/master/mobil/add.blade.php ENDPATH**/ ?>