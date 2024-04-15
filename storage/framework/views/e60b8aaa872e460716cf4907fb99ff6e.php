<?php $__env->startSection('mm.db.spk.riwayat.penyewaan', 'mm-active'); ?>
<?php $__env->startSection('db.spk.riwayat.penyewaan', 'active'); ?>

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
                                    <th>Kode</th>
                                    <th>Unit</th>
                                    <th>Nama Penyewa</th>
                                    <th>No. Telephone</th>
                                    <th>Tgl. Sewa</th>
                                    <th>Jam Sewa</th>
                                    <th>Sisa Pembayaran</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $penyewa = App\Models\User::select('b.*')->join('biodatas as b', 'b.uuid_user', '=',
                                        'users.uuid')->where('users.uuid', $i->uuid_penyewa)->first();
                                        $car = \App\Models\Car::join('brands', 'cars.uuid_brand', '=', 'brands.uuid')
                                                ->select('cars.*', 'brands.name as brand_name')
                                                ->where('cars.uuid', $i->uuid_unit)
                                                ->first();
                                    ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td>J<?php echo e($i->no_spk); ?></td>
                                        <td><?php echo e($car->brand_name); ?> | <?php echo e($car->name); ?> | <?php echo e($car->plat); ?></td>
                                        <td><?php echo e(isset($penyewa->fullname) ? $penyewa->fullname : ''); ?></td>
                                        <td><a href="https://wa.me/62<?php echo e(substr($i->notelp, 1)); ?>" target="_blank"><?php echo e(isset($penyewa->notelp) ? $penyewa->notelp : ''); ?></a></td>
                                        <td><?php echo e(date('d/m/Y', strtotime($i->tgl_ambil))); ?> <br><?php echo e(date('d/m/Y', strtotime($i->tgl_kembali))); ?></td>
                                        <td><?php echo e($i->jam_ambil); ?> <br> <?php echo e($i->jam_kembali); ?></td>
                                        <td>Rp. <?php echo e(number_format($i->total_payment - $i->store_payment, 0, ',', '.')); ?></td>
                                        <td><?php echo e($i->fullname); ?></td>
                                        <td>
                                            <?php if($i->total_payment - $i->store_payment == 0): ?>
                                                <span class="text-success">Lunas</span>
                                            <?php else: ?>
                                                <span class="text-danger">Belum Lunas</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('db.spk.riwayat.penyewaan.detail', ['id' => $i->idSpks])); ?>"
                                               class="btn btn-sm btn-info">
                                                <i class="mdi mdi-eye-circle"></i>
                                                
                                            </a>
                                            
                                            <button type="button" class="btn btn-sm btn-dark waves-effect waves-light" data-bs-toggle="modal"
                                                    data-bs-target="#cetakSPK-<?php echo e($i->idSpks); ?>">
                                                <i class="mdi mdi-printer"></i>
                                            </button>
                                            <div id="cetakSPK-<?php echo e($i->idSpks); ?>" class="modal fade" tabindex="-1"
                                                 aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Peringatan...!!!</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <form action="<?php echo e(route('db.spk.penyewaan.cetak', ['id' => $i->idSpks])); ?>" method="get" target="_blank">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <label for="km_ambil">Km. Awal</label>
                                                                        <input type="number" name="km_ambil" id="km_ambil" class="form-control"
                                                                               value="<?php echo e($i->km_awal != null ? $i->km_awal : ''); ?>" required>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="tgl_pesan">Tanggal Pemesanan</label>
                                                                        <input type="date" name="tgl_pesan" id="tgl_pesan" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">
                                                                    Batal
                                                                </button>
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Cetak</button>
                                                            </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                            
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

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/spk/riwayat/index.blade.php ENDPATH**/ ?>