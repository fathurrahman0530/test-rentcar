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
                    <h4 class="mb-sm-0 font-size-18">Edit Data Mobil</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-8">
            <div class="card">
                <form action="<?php echo e(route('db.master.mobil.update')); ?>" enctype="multipart/form-data" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="act" value="Update">
                    <input type="hidden" name="uuid" value="<?php echo e($data['mobil']->uuid); ?>">
                    <input type="hidden" name="old_image" value="<?php echo e($data['mobil']->image); ?>">
                    <input type="hidden" name="status" value="<?php echo e($data['mobil']->status); ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="brand">Brand</label>
                                <select name="brand" id="brand" class="form-select">
                                    <option value="">-- Pilih --</option>
                                    <?php $__currentLoopData = $data['brand']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($b->uuid); ?>" <?php echo e($b->uuid == $data['mobil']->uuid_brand ?
                                        'selected' : ''); ?>><?php echo e($b->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="merk">Merk</label>
                                <input type="text" name="merk" id="merk" class="form-control"
                                    value="<?php echo e($data['mobil']->name); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="thn_mobil">Tahun Mobil</label>
                                <input type="number" name="thn_mobil" id="thn_mobil" value="<?php echo e($data['mobil']->tahun); ?>"
                                    class="
                                    form-control">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="no_polisi">No. Polisi</label>
                                <input type="text" name="no_polisi" id="no_polisi" value="<?php echo e($data['mobil']->plat); ?>"
                                    class="
                                    form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" value="<?php echo e($data['mobil']->harga); ?>" id=" harga"
                                    class="form-control">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="kondisi">Kondisi</label>
                                <select name="kondisi" id="kondisi" class="form-select">
                                    <option value="">- Pilih -</option>
                                    <option value="B" <?php echo e($data['mobil']->kondisi == 'B' ? 'selected' : ''); ?>>Baik
                                    </option>
                                    <option value="S" <?php echo e($data['mobil']->kondisi == 'S' ? 'selected' : ''); ?>>Service
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="image">Gambar Mobil</label>
                            <input type="file" name="foto" id="image" class="form-control">
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

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/master/mobil/edit.blade.php ENDPATH**/ ?>