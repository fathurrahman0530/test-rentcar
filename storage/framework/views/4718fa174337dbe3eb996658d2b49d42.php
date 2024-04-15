<?php $__env->startSection('mm.db.setting.company', 'mm-active'); ?>
<?php $__env->startSection('db.setting.company', 'active'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Data Perusahaan</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-4">
                <center>
                    <img src="<?php echo e(asset('img')); ?>/logo/<?php echo e($data->logo); ?>" alt="Logo Perusahaan" style="width: 85%">
                </center>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <form action="<?php echo e(route('db.setting.update')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="act" value="Update">
                        <input type="hidden" name="uuid" value="<?php echo e($data->uuid); ?>">
                        <input type="hidden" name="old_icon" value="<?php echo e($data->icon); ?>">
                        <input type="hidden" name="old_logo" value="<?php echo e($data->logo); ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">name</label>
                                    <input type="text" value="<?php echo e($data->name); ?>" name="name" id="name"
                                        class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="telp">No. Telephone</label>
                                    <input type="text" value="<?php echo e($data->telp); ?>" name="telp" id="telp"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fax">Fax</label>
                                    <input type="text" value="<?php echo e($data->fax); ?>" name="fax" id="fax"
                                        class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" value="<?php echo e($data->email); ?>" name="email" id="email"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" cols="15"
                                    rows="5"><?php echo e($data->alamat); ?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="mobile_1">Mobile 1</label>
                                    <input type="text" name="mobile_1" value="<?php echo e($data->mobile_1); ?>" id="mobile_1"
                                        class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="mobile_2">Mobile 2</label>
                                    <input type="mobile_2" name="mobile_2" value="<?php echo e($data->mobile_2); ?>" id="email"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="maps">Maps</label>
                                    <input type="text" name="maps" value="<?php echo e($data->maps); ?>" id="maps"
                                        class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="zona">Zona</label>
                                    
                                    <select name="zona" id="zona" class="form-control">
                                        <option value="">-- Silahkan Pilih --</option>
                                        <option value="WIT" <?php echo e($data->zona == 'WIT' ? 'selected' : ''); ?>>WIT</option>
                                        <option value="WIB" <?php echo e($data->zona == 'WIB' ? 'selected' : ''); ?>>WIB</option>
                                        <option value="WITA" <?php echo e($data->zona == 'WITA' ? 'selected' : ''); ?>>WITA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="icon">Icon</label>
                                    <input type="file" name="icon" id="icon" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="logo">Logo</label>
                                    <input type="file" name="logo" id="icon" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">
                                <i class="mdi mdi-content-save-all"></i>
                                <span>Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/setting/company/index.blade.php ENDPATH**/ ?>