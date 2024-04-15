<?php $__env->startSection('mm.db.spk.penyewaan', 'mm-active'); ?>
<?php $__env->startSection('db.spk.penyewaan', 'active'); ?>

<?php $__env->startSection('btn.nav'); ?>
    <a href="<?php echo e(route('db.spk.penyewaan.add')); ?>" class="btn btn-secondary waves-effect waves-light">
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
                        <h4 class="mb-sm-0 font-size-18">Data Penyewaan</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row mt-2">
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
                                    <th>Denda</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        date_default_timezone_set('Asia/Makassar');
                                        $penyewa = App\Models\User::select('b.*')->join('biodatas as b', 'b.uuid_user', '=',
                                        'users.uuid')->where('users.uuid', $r->uuid_penyewa)->first();
                                        /*dd($penyewa->fullname);*/
                                        $car = \App\Models\Car::join('brands', 'cars.uuid_brand', '=', 'brands.uuid')
                                                    ->select('cars.*', 'brands.name as brand_name')
                                                    ->where('cars.uuid', $r->uuid_unit)
                                                    ->first();
                                        // Tanggal Sekarang
                                        $sekarang = time();

                                        // Tanggal Kembali
                                        $kembali = strtotime($r->tgl_kembali);

                                        // Menghitung selisih hari
                                        $selisihDetik = $sekarang - $kembali;
                                        $sisaDetik = $kembali - $sekarang;
                                        $selisih = floor($selisihDetik / (60 * 60 * 24));
                                        $sisaHari = floor($sisaDetik / (60 * 60 * 24));
                                    ?>
                                    <tr style="<?php echo e($selisih >= 0 ? 'background-color: #ff00004f !important; color: white !important;' : ''); ?>">
                                        <td style="text-align: center; vertical-align: middle"><?php echo e($key+1); ?></td>
                                        <td style="vertical-align: middle">J<?php echo e($r->no_spk); ?></td>
                                        <td style="vertical-align: middle"><?php echo e($car->brand_name); ?> | <?php echo e($car->name); ?> | <?php echo e($car->plat); ?></td>
                                        <td style="vertical-align: middle"><?php echo e(isset($penyewa->fullname) ? $penyewa->fullname : ''); ?></td>
                                        <td style="vertical-align: middle"><a href="https://wa.me/62<?php echo e(substr($r->notelp, 1)); ?>" target="_blank"><?php echo e(isset($penyewa->notelp) ? $penyewa->notelp : ''); ?></a>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle">
                                            <?php echo e(date('d/m/Y', strtotime($r->tgl_ambil))); ?><br>
                                            <?php echo e(date('d/m/Y', strtotime($r->tgl_kembali))); ?>

                                            <?php if($selisih >= 0): ?>
                                                <br><span class="text-danger">Telat <?php echo e($selisih); ?> Hari</span>
                                            <?php else: ?>
                                                <br><span class="text-success">Sisa <?php echo e($sisaHari); ?> Hari</span>
                                            <?php endif; ?>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle"><?php echo e($r->jam_ambil); ?> <br> <?php echo e($r->jam_kembali); ?></td>
                                        <td style="vertical-align: middle">Rp. <?php echo e(number_format($r->total_payment - $r->store_payment, 0, ',', '.')); ?></td>
                                        <td style="vertical-align: middle">Rp. -</td>
                                        <td style="vertical-align: middle"><?php echo e($r->fullname); ?></td>
                                        <td style="vertical-align: middle">
                                            <a href="<?php echo e(route('db.spk.penyewaan.detail', ['id' => $r->idSpks])); ?>"
                                               class="btn btn-sm btn-info">
                                                <i class="mdi mdi-eye-circle"></i>
                                            </a>
                                            
                                            <button type="button" class="btn btn-sm btn-dark waves-effect waves-light" data-bs-toggle="modal"
                                                    data-bs-target="#cetakSPK-<?php echo e($r->idSpks); ?>">
                                                <i class="mdi mdi-printer"></i>
                                            </button>
                                            <div id="cetakSPK-<?php echo e($r->idSpks); ?>" class="modal fade" tabindex="-1"
                                                 aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Peringatan...!!!</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <form action="<?php echo e(route('db.spk.penyewaan.cetak', ['id' => $r->idSpks])); ?>" method="get" target="_blank">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <label for="km_ambil">Km. Awal</label>
                                                                        <input type="number" name="km_ambil" id="km_ambil" class="form-control" value="<?php echo e($r->km_awal != null ? $r->km_awal : ''); ?>" required>
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

<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function () {
            // perhitungan penyelesaian
            $(".btn-penyelesaian").on("click", function () {
                $(".modal-penyelesaian").on("show.bs.modal", function () {
                    // deklarasi variable
                    let kmAwal = document.getElementById('km_awal', this);
                    let kmKembali = document.getElementById('km_kembali', this);
                    let totalKm = 0;

                    kmKembali.addEventListener("input", function () {
                        const awal = kmAwal.value;
                        const kembali = kmKembali.value;
                        const total = kembali - awal;

                        totalKm = total;
                    });
                    console.log(totalKm);
                })
            });
            // end perhitungan penyelesaian

            // reload modal
            $(".modal-penyelesaian").on("hidden.bs.modal", function () {
                location.reload();
            });
            // end reload modal
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/spk/penyewaan/index.blade.php ENDPATH**/ ?>