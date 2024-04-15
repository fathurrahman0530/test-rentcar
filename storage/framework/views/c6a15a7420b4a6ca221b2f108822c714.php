<?php $__env->startSection('mm.db.master.merk', 'mm-active'); ?>
<?php $__env->startSection('db.master.merk', 'active'); ?>

<?php $__env->startSection('btn.nav'); ?>
<button type="button" class="btn btn-secondary waves-effect waves-light" data-bs-toggle="modal"
    data-bs-target="#addMerk">
    <i class="mdi mdi-plus-circle"></i>
    <span>Tambah Brand</span>
</button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content">
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Data Brand</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive w-100">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($b->name); ?></td>
                                <td>
                                    <a href="<?php echo e(route('db.master.merk.detail', ['id' => $b->uuid])); ?>"
                                        class="btn btn-info waves-effect waves-light">
                                        <i class="mdi mdi-eye"></i>
                                        <span>Detail</span>
                                    </a>
                                    <?php if(Auth::user()->role == 1 || Auth::user()->role == 2): ?>
                                        
                                        <button type="button" class="btn btn-warning waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target="#editMerk-<?php echo e($b->id); ?>">
                                            <i class="mdi mdi-text-box-edit"></i>
                                            <span>Edit</span>
                                        </button>
                                        <div id="editMerk-<?php echo e($b->id); ?>" class="modal fade" tabindex="-1"
                                             aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel">Edit Brand</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?php echo e(route('db.master.merk.update')); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="act" value="Update">
                                                        <input type="hidden" name="uuid" value="<?php echo e($b->uuid); ?>">
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="merk">Merk</label>
                                                                <input type="text" name="merk" id="merk"
                                                                       class="form-control" value="<?php echo e($b->name); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect"
                                                                    data-bs-dismiss="modal">
                                                                Batal
                                                            </button>
                                                            <button type="submit"
                                                                    class="btn btn-primary waves-effect waves-light">Simpan
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                        
                                        
                                        <button type="button" class="btn btn-danger waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target="#deleteMerk-<?php echo e($b->id); ?>">
                                            <i class="mdi mdi-trash-can"></i>
                                            <span>Hapus</span>
                                        </button>
                                        <div id="deleteMerk-<?php echo e($b->id); ?>" class="modal fade" tabindex="-1"
                                             aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel">Delete Brand</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?php echo e(route('db.master.merk.destroy')); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="act" value="Destroy">
                                                        <input type="hidden" name="uuid" value="<?php echo e($b->uuid); ?>">
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

<?php $__env->startSection('modals'); ?>
<div id="addMerk" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    data-bs-scroll="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('db.master.merk.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="act" value="Store">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="merk">Brand <span class="text-danger">*</span></label>
                        <input type="text" name="merk" id="merk" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/master/merk/index.blade.php ENDPATH**/ ?>