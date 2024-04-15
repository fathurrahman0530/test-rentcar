<?php $__env->startSection('mm.db.master.pelanggan', 'mm-active'); ?>
<?php $__env->startSection('db.master.pelanggan', 'active'); ?>

<?php $__env->startSection('btn.nav'); ?>
    <a href="<?php echo e(route('db.master.pelanggan.add')); ?>" class="btn btn-secondary waves-effect waves-light">
        <i class="mdi mdi-plus-circle"></i>
        <span>Tambah</span>
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
                        <h4 class="mb-sm-0 font-size-18">Data Pelanggan</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive w-100">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIK</th>
                                <th>Nama Pelanggan</th>
                                <th>Email</th>
                                <th>No. Telephone</th>
                                <th>Total Tunggakan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($r->ktp); ?></td>
                                    <td><?php echo e($r->fullname); ?></td>
                                    <td><?php echo e($r->email); ?></td>
                                    <td>
                                        <a href="https://wa.me/62<?php echo e(substr($r->notelp, 1)); ?>" target="_blank"><?php echo e($r->notelp); ?></a>
                                    </td>
                                    <?php if($r->total_payment == null && $r->store_payment == null): ?>
                                        <?php
                                            $tunggakan = 0;
                                        ?>
                                    <?php else: ?>
                                        <?php
                                            $tunggakan = $r->total_payment - $r->store_payment;
                                        ?>
                                    <?php endif; ?>
                                    <td>Rp. <?php echo e(number_format($tunggakan, 0, ',', '.')); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('db.master.pelanggan.detail', ['id' => $r->IDUser])); ?>"
                                           class="btn btn-info waves-effect waves-light">
                                            <i class="mdi mdi-eye"></i>
                                            <span>Detail</span>
                                        </a>
                                        <?php if(Auth::user()->role == 1 || Auth::user()->role == 2): ?>
                                            <a href="<?php echo e(route('db.master.pelanggan.edit', ['id' => $r->IDUser])); ?>"
                                               class="btn btn-warning waves-effect waves-light">
                                                <i class="mdi mdi-text-box-edit"></i>
                                                <span>Edit</span>
                                            </a>
                                            <button type="button" class="btn btn-danger waves-effect waves-light"
                                                    data-bs-toggle="modal" data-bs-target="#deleteMerk-<?php echo e($r->IDUser); ?>">
                                                <i class="mdi mdi-trash-can"></i>
                                                <span>Hapus</span>
                                            </button>
                                            <div id="deleteMerk-<?php echo e($r->IDUser); ?>" class="modal fade" tabindex="-1"
                                                 aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Delete Brand</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <form action="<?php echo e(route('db.master.pelanggan.destroy')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="act" value="Destroy">
                                                            <input type="hidden" name="uuid_bio" value="<?php echo e($r->IDBio); ?>">
                                                            <input type="hidden" name="uuid_user" value="<?php echo e($r->IDUser); ?>">
                                                            <div class="modal-body">
                                                                yakin ingin dihapus
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary waves-effect"
                                                                        data-bs-dismiss="modal">
                                                                    Batal
                                                                </button>
                                                                <button type="submit"
                                                                        class="btn btn-primary waves-effect waves-light">Hapus
                                                                </button>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/master/pelanggan/index.blade.php ENDPATH**/ ?>