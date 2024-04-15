<?php $__env->startSection('mm.db.master.mobil', 'mm-active'); ?>
<?php $__env->startSection('db.master.mobil', 'active'); ?>

<?php $__env->startSection('btn.nav'); ?>
<a href="<?php echo e(route('db.master.mobil.add')); ?>" class="btn btn-secondary waves-effect waves-light">
    <i class="mdi mdi-plus-circle"></i>
    <span>Tambah</span>
</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Data Mobil</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive w-100">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Brand</th>
                                <th>Merk</th>
                                <th>Tahun</th>
                                <th>No. Polisi</th>
                                <th>Harga Sewa</th>
                                <th>Kondisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e($d->brand_name); ?></td>
                                <td><?php echo e($d->name); ?></td>
                                <td><?php echo e($d->tahun); ?></td>
                                <td><?php echo e($d->plat); ?></td>
                                <td>Rp. <?php echo e(number_format($d->harga, 0, ',', '.')); ?></td>
                                <td><?php echo e($d->kondisi == 'B' ? 'Baik' : ($d->kondisi == 'S' ? 'Service' : '')); ?></td>
                                <td>
                                    <a href="<?php echo e(route('db.master.mobil.detail', ['id' => $d->uuid])); ?>"
                                        class="btn btn-sm btn-info waves-effect waves-light">
                                        <i class="mdi mdi-eye"></i>
                                        <span>Detail</span>
                                    </a>
                                    <?php if($d->status == 'BK'): ?>
                                    
                                    <button type="button" class="btn btn-sm btn-success waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target="#ready-<?php echo e($d->id); ?>">
                                        <i class="mdi mdi-check-circle"></i>
                                        <span>Ready</span>
                                    </button>
                                    <div id="ready-<?php echo e($d->id); ?>" class="modal fade" tabindex="-1"
                                        aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Warning...!!!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="<?php echo e(route('db.master.mobil.update')); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="act" value="Ready">
                                                    <input type="hidden" name="uuid" value="<?php echo e($d->uuid); ?>">
                                                    <input type="hidden" name="status" value="RD">
                                                    <div class="modal-body">
                                                        yakin unit ini ready...!!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect"
                                                            data-bs-dismiss="modal">
                                                            Batal
                                                        </button>
                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light">Ready</button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                                    
                                    <?php else: ?>
                                    
                                    <button type="button" class="btn btn-sm btn-secondary waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target="#booking-<?php echo e($d->id); ?>">
                                        <i class="mdi mdi-close-circle"></i>
                                        <span>Booking</span>
                                    </button>
                                    <div id="booking-<?php echo e($d->id); ?>" class="modal fade" tabindex="-1"
                                        aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Warning...!!!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="<?php echo e(route('db.master.mobil.update')); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="act" value="Booking">
                                                    <input type="hidden" name="uuid" value="<?php echo e($d->uuid); ?>">
                                                    <input type="hidden" name="status" value="BK">
                                                    <div class="modal-body">
                                                        yakin unit ini diboking...!!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect"
                                                            data-bs-dismiss="modal">
                                                            Batal
                                                        </button>
                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light">Booking</button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                                    
                                    <?php endif; ?>
                                    <?php if(Auth::user()->role == 1 || Auth::user()->role == 2): ?>
                                        <a href="<?php echo e(route('db.master.mobil.edit', ['id' => $d->uuid])); ?>"
                                           class="btn btn-sm btn-warning waves-effect waves-light">
                                            <i class="mdi mdi-text-box-edit"></i>
                                            <span>Edit</span>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target="#deleteMerk-<?php echo e($d->id); ?>">
                                            <i class="mdi mdi-trash-can"></i>
                                            <span>Hapus</span>
                                        </button>
                                        <div id="deleteMerk-<?php echo e($d->id); ?>" class="modal fade" tabindex="-1"
                                             aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel">Delete Brand</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?php echo e(route('db.master.mobil.destroy')); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="act" value="Destroy">
                                                        <input type="hidden" name="uuid" value="<?php echo e($d->uuid); ?>">
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

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/master/mobil/index.blade.php ENDPATH**/ ?>