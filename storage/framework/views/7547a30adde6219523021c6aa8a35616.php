<?php $__env->startSection('mm.db.master.mobil', 'mm-active'); ?>
<?php $__env->startSection('db.master.mobil', 'active'); ?>

<?php $__env->startSection('btn.nav'); ?>
<a href="<?php echo e(route('db.master.mobil')); ?>" class="btn btn-secondary waves-effect waves-light">
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
                    <h4 class="mb-sm-0 font-size-18">Detail Mobil</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-6">
                <center>
                    <img src="<?php echo e(asset('img')); ?>/car/<?php echo e($data['mobil']->image); ?>" alt="" width="85%"
                        style="border-radius: 25px">
                </center>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-responsive dt-responsive w-100">
                            <tr>
                                <th width="15%">Brand</th>
                                <td width="25px">:</td>
                                <td>Toyota</td>
                            </tr>
                            <tr>
                                <th>Merk</th>
                                <td>:</td>
                                <td>"<?php echo e($data['mobil']->name); ?></td>
                            </tr>
                            <tr>
                                <th>Tahun</th>
                                <td>:</td>
                                <td><?php echo e($data['mobil']->tahun); ?></td>
                            </tr>
                            <tr>
                                <th>No. Polisi</th>
                                <td>:</td>
                                <td><?php echo e($data['mobil']->plat); ?></td>
                            </tr>
                            <tr>
                                <th>Harga Sewa</th>
                                <td>:</td>
                                <td><?php echo e($data['mobil']->harga); ?></td>
                            </tr>
                            <tr>
                                <th>Kondisi</th>
                                <td>:</td>
                                <td><?php echo e($data['mobil']->kondisi == 'B' ? 'Baik' : ($data['mobil']->kondisi == 'S' ?
                                    'Service' : '')); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/master/mobil/detail.blade.php ENDPATH**/ ?>