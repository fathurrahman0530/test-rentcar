<?php $__env->startSection('mm.db.spk.request', 'mm-active'); ?>
<?php $__env->startSection('db.spk.request', 'active'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Riwayat Penyewaan</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Penyewa</th>
                                    <th>No. Telephone</th>
                                    <th>Email</th>
                                    <th>Mobil</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($i->name); ?></td>
                                    <td><?php echo e($i->notelp); ?></td>
                                    <td><?php echo e($i->email); ?></td>
                                    <td><?php echo e($i->unit); ?></td>
                                    <td>
                                        <?php if($i->status == "F"): ?>
                                        <span class="text-danger">Belum Diproses</span>
                                        <?php else: ?>
                                        <span class="text-success">Sudah Diproses</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($i->status == "F"): ?>
                                        <button type="button" class="btn btn-info waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target="#deleteMerk-<?php echo e($i->id); ?>">
                                            <i class="mdi mdi-reload"></i>
                                            <span>Proses</span>
                                        </button>
                                        <div id="deleteMerk-<?php echo e($i->id); ?>" class="modal fade" tabindex="-1"
                                            aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel">Peringatan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?php echo e(route('db.spk.request.update')); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="act" value="Update">
                                                        <input type="hidden" name="uuid" value="<?php echo e($i->uuid); ?>">
                                                        <div class="modal-body">
                                                            Yakin ingin memproses
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect"
                                                                data-bs-dismiss="modal">
                                                                Batal
                                                            </button>
                                                            <button type="submit"
                                                                class="btn btn-primary waves-effect waves-light">Proses</button>
                                                        </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/spk/request/index.blade.php ENDPATH**/ ?>