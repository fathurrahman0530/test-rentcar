<?php $__env->startSection('mm.db.spk.penyewaan', 'mm-active'); ?>
<?php $__env->startSection('db.spk.penyewaan', 'active'); ?>

<?php $__env->startSection('btn.nav'); ?>
    <a href="<?php echo e(route('db.spk.penyewaan')); ?>" class="btn btn-secondary" style="margin-right: 10px">
        <i class="mdi mdi-arrow-left-bold-circle"></i>
        <span>Kembali</span>
    </a>
    <button class="btn-penyelesaian btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#penyelesaian" style="margin-right: 10px">
        <i class="mdi mdi-checkbox-marked"></i>
    </button>
    <button type="button" class="btn btn-warning waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#perpanjang">
        <i class="mdi mdi-arrow-up-bold-circle"></i>
    </button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Detail Penyewaan J<?php echo e($data->no_spk); ?></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <h3 class="card-header">Data Mobil</h3>
                                <div class="card-body">
                                    <div class="col-lg-12 mt-3">
                                        <table id="datatable" class="table table-bordered dt-responsive w-100">
                                            <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Merk Mobil</th>
                                                <th>Jenis Mobil</th>
                                                <th>No. Polisi</th>
                                                <th>Harga</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $car = App\Models\Car::select('b.name as nbrand', 'cars.*')->join('brands as b', 'cars.uuid_brand', '=', 'b.uuid')->where('cars.uuid', $data->uuid_unit)->get();
                                                $i = 1;
                                            ?>
                                            <?php $__currentLoopData = $car; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($i++); ?></td>
                                                    <td><?php echo e($c->nbrand); ?></td>
                                                    <td><?php echo e($c->name); ?></td>
                                                    <td><?php echo e($c->plat); ?></td>
                                                    <td>Rp. <?php echo e(number_format($c->harga, 0,',','.')); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-1">
                            <div class="card">
                                <h3 class="card-header">Waktu Sewa</h3>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="tgl_ambil">Tanggal Ambil</label>
                                                <input type="date" name="tgl_ambil" value="<?php echo e($data->tgl_ambil); ?>" id="tgl_ambil"
                                                       class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="tgl_kembali">Tanggal Kembali</label>
                                                <input type="date" name="tgl_kembali" value="<?php echo e($data->tgl_kembali); ?>"
                                                       id="tgl_kembali" class="form-control" readonly>
                                            </div>
                                        </div>
                                        
                                        <?php
                                            $ambil = strtotime($data->tgl_ambil);
                                            $kembali = strtotime($data->tgl_kembali);

                                            $selisihDetik = $kembali - $ambil;
                                            $selisih = floor($selisihDetik / (60 * 60 * 24));
                                        ?>
                                        
                                        <div class="col-lg-4 mb-3">
                                            <label for="masa_sewa">Masa Sewa</label>
                                            <input type="text" name="masa_sewa" id="masa_sewa" class="form-control" value="<?php echo e($selisih); ?> Hari" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="jam_ambil">Jam Ambil</label>
                                                <input type="time" name="jam_ambil" value="<?php echo e($data->jam_ambil); ?>" id="jam_ambil"
                                                       class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="jam_kembali">Jam Kembali</label>
                                                <input type="time" name="jam_kembali" value="<?php echo e($data->jam_kembali); ?>"
                                                       id="jam_kembali" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="kategori_pemakaian">Kategori</label>
                                                <input type="text" name="kategori_pemakaian" id="kategori_pemakaian"
                                                       class="form-control" value="<?php echo e($data->kat_pemakaian == 'LK' ? " Lepas Kunci"
                                                : "Dengan Drive"); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="tujuan">Tujuan Pemakaian</label>
                                                <input type="text" name="tujuan" id="tujuan" value="<?php echo e($data->tujuan); ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="jaminan">Jaminan</label>
                                                <input type="text" name="jaminan" value="<?php echo e($data->jaminan); ?>" id="jaminan"
                                                       class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <h3 class="card-header">Data Penyewa</h3>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="nik">NIK</label>
                                        <input type="text" value="<?php echo e($data->ktp); ?>" name="nik" id="nik" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="fullname">Nama Lengkap</label>
                                        <input type="text" value="<?php echo e($data->fullname); ?>" name="fullname" id="fullname" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="tmpt_lahir">Tempat Lahir</label>
                                        <input type="text" value="<?php echo e($data->tmpt_lahir); ?>" name="tmpt_lahir" id="tmpt_lahir" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" value="<?php echo e($data->tgl_lahir); ?>" name="tgl_lahir" id="tgl_lahir"
                                               class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" class="form-control" cols="15" rows="5" readonly><?php echo e($data->alamat); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" name="pekerjaan" value="<?php echo e($data->pekerjaan); ?>" id="pekerjaan" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="<?php echo e($data->email); ?>" id="email" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="notelp">No. Telephone</label><br>
                                        <a href="https://wa.me/62<?php echo e(substr($data->notelp, 1)); ?>" target="_blank"><?php echo e($data->notelp); ?></a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="notelp_kerabat">No. Telephone Kerabat</label><br>
                                        <a href="https://wa.me/62<?php echo e(substr($data->notelp_kerabat, 1)); ?>" target="_blank"><?php echo e($data->notelp_kerabat); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>
    <div id="penyelesaian" class="modal fade modal-penyelesaian" tabindex="-1"
         aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Penyelesaian Penyewaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('db.spk.penyewaan.penyelesaian')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="act" value="Penyelesaian">
                    <input type="hidden" name="uuid" value="<?php echo e($data->idSpks); ?>">
                    <input type="hidden" name="uuid_unit" value="<?php echo e($data->uuid_unit); ?>">
                    <input type="hidden" name="status" value="T">
                    <input type="hidden" name="status_unit" value="RD">
                    <input type="hidden" id="km_awal" name="km_awal" value="<?php echo e($data->km_awal); ?>">
                    <input type="hidden" id="tgl_kembali" name="tgl_kembali" value="<?php echo e($data->tgl_kembali); ?>">
                    <input type="hidden" id="jam_kembali" name="jam_kembali" value="<?php echo e($data->jam_kembali); ?>">
                    <input type="hidden" id="harga_unit" name="harga_unit" value="<?php echo e($car[0]->harga); ?>">
                    <input type="hidden" id="old_tunggakan" name="old_tunggakan" value="<?php echo e($data->total_payment - $data->store_payment); ?>">
                    <input type="hidden" name="old_store" value="<?php echo e($data->store_payment); ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="km_kembali">Km. Kembali</label>
                                <input type="number" name="km_kembali" id="km_kembali" class="form-control" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="total_pemakaian">Total Pembakaian</label>
                                <input type="text" name="total_pemakaian" id="total_pemakaian" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <label for="telat">Telat</label>
                                <input type="text" name="telat" id="telat" class="form-control" readonly>
                            </div>
                            <div class="col-lg-6">
                                <label for="denda">Denda</label>
                                <input type="number" name="denda" id="denda" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <label for="kerusakan">Biaya Kerusakan</label>
                                <input type="number" name="kerusakan" id="kerusakan" class="form-control" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="bbm">Biaya BBM</label>
                                <input type="number" name="bbm" id="bbm" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <label for="diskon">Diskon</label>
                                <input type="number" name="diskon" id="diskon" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg mt-2">
                            <label for="ket-kerusakan">Deskripsi Kerusakan</label>
                            <textarea name="ket-kerusakan" class="form-control" id="ket-kerusakan" cols="30" rows="5"></textarea>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-4">
                                <a class="btn btn-sm btn-success" onclick="hitungTunggakan()">
                                    Hitung Tagihan
                                </a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <label for="total_pembayaran">Total Pembayaran</label>
                                <input type="number" name="total_pembayaran" id="total_pembayaran" class="form-control" value="<?php echo e($data->total_payment); ?>" readonly>
                            </div>
                            <div class="col-lg-6">
                                <label for="status_pembayaran">Status Pembayaran</label>
                                <input type="text" name="status_pembayaran" id="status_pembayaran" class="form-control"
                                       value="<?php echo e($data->total_payment - $data->store_payment == 0 ? 'Lunas' : 'Belum Lunas'); ?>" readonly>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <label for="sisa_tagihan">Sisa Tagihan</label>
                                <input type="number" name="sisa_tagihan" id="sisa_tagihan" class="form-control" value="<?php echo e($data->total_payment - $data->store_payment); ?>"
                                       readonly>
                            </div>
                            <div class="col-lg-6">
                                <label for="pembayaran">Pembayaran</label>
                                <input type="number" name="pembayaran" id="pembayaran" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg mt-2">
                            <label for="sisa_pembayaran">Sisa Pembayaran</label>
                            <input type="number" name="sisa_pembayaran" id="sisa_pembayaran" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Bayar</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    
    <div id="perpanjang" class="modal fade" tabindex="-1"
         aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Peringatan...!!!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('db.spk.penyewaan.perpanjang')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="act" value="Perpanjang">
                    <input type="hidden" name="uuid" value="<?php echo e($data->idSpks); ?>">
                    <input type="hidden" name="hr_unit" value="<?php echo e($car[0]->harga); ?>">
                    <input type="hidden" name="old_total_pay" value="<?php echo e($data->total_payment); ?>">
                    <input type="hidden" name="old_tgl_kembali" value="<?php echo e($data->tgl_kembali); ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="tgl_ambil_perpanjang">Tanggal Kembali</label>
                                <input type="date" name="tgl_ambil_perpanjang" id="tgl_ambil_perpanjang" class="form-control" value="<?php echo e($data->tgl_ambil); ?>" readonly>
                            </div>
                            <div class="col-lg-6">
                                <label for="tgl_kembali_perpanjang">Tanggal Kembali</label>
                                <input type="date" name="tgl_kembali_perpanjang" id="tgl_kembali_perpanjang" class="form-control" required>
                            </div>
                            <div class="col-lg-6 mt-2">
                                <label for="masa_sewa_perpanjang">Masa Sewa</label>
                                <input type="text" name="masa_sewa_perpanjang" id="masa_sewa_perpanjang" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect"
                                data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit"
                                class="btn btn-primary waves-effect waves-light">Perpanjang
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        function hitungTunggakan() {
            let fKerusakan = document.getElementById('kerusakan');
            let fBBM = document.getElementById('bbm');
            let iTunggakan = document.getElementById('sisa_tagihan');
            let fTunggakan = document.getElementById('old_tunggakan');
            let fDenda = document.getElementById('denda');
            let fSisaPembayaran = document.getElementById('sisa_pembayaran');
            let fDiskon = document.getElementById('diskon');

            const nKerusakan = fKerusakan.value;
            const nBBM = fBBM.value;
            const nTunggakan = fTunggakan.value;
            const nDenda = fDenda.value;
            const nDiskon = fDiskon.value;
            const hTunggakan = (parseInt(nKerusakan) + parseInt(nBBM) + parseInt(nDenda) + parseInt(nTunggakan)) - parseInt(nDiskon);

            iTunggakan.value = hTunggakan;
            fSisaPembayaran.value = hTunggakan;
        }

        $(document).ready(function () {
            let kmAwal = document.getElementById('km_awal');
            let kmKembali = document.getElementById('km_kembali');
            let totalPemakaian = document.getElementById('total_pemakaian');

            totalPemakaian.value = parseInt(kmAwal.value);

            // menghitung total pemakaian
            kmKembali.addEventListener("input", function () {
                const awal = kmAwal.value;
                const kembali = kmKembali.value;
                const total = kembali - awal;

                totalPemakaian.value = total;
            });

            let tglKembali = new Date(document.getElementById('tgl_kembali').value);
            let jamKembaliValue = document.getElementById('jam_kembali').value;
            let waktuSekarang = new Date();

            let [jam, menit] = jamKembaliValue.split(':');
            let hrTelat = 0;
            let jmTelat = 0;

            let hrgUnit = document.getElementById('harga_unit').value;
            let telat = document.getElementById('telat');
            let tglAwal = document.getElementById('tgl_ambil');
            let tglPerpanjang = document.getElementById('tgl_kembali_perpanjang');
            let masaSewaPerpanjang = document.getElementById('masa_sewa_perpanjang');
            let vDenda = document.getElementById('denda');
            let vPembayaran = document.getElementById('pembayaran');
            let vSisaPembayaran = document.getElementById('sisa_pembayaran');
            let vTunggakan = document.getElementById('sisa_tagihan');
            let vKerusakan = document.getElementById('kerusakan');
            let vBBM = document.getElementById('bbm');
            let vDiskon = document.getElementById('diskon');
            let denda = hrgUnit * 0.1;
            let totDenda = 0;
            let totHrTelat = 0;

            // hitung total hari perpanjangan
            $('#tgl_kembali_perpanjang').change(function () {
                let awal = new Date(tglAwal.value);
                let akhir = new Date(tglPerpanjang.value);

                // Menghitung selisih dalam milidetik
                let selisihPerpanjang = akhir.getTime() - awal.getTime();

                // Menghitung jumlah hari dari selisih waktu
                let jarakHariPerpanjang = Math.floor(selisihPerpanjang / (1000 * 3600 * 24));

                masaSewaPerpanjang.value = jarakHariPerpanjang + " Hari";
            })
            // end hitung total hari perpanjangan

            const selisiHari = waktuSekarang - tglKembali;
            const selisiJam = waktuSekarang.getHours() - parseInt(jam);

            if (waktuSekarang.toDateString() !== tglKembali.toDateString()) {
                // hrTelat = Math.ceil(selisiHari / (1000 * 60 * 60 * 24));
                hrTelat = Math.floor(selisiHari / (1000 * 60 * 60 * 24));
            }

            if (hrTelat == 0 && selisiJam > 0 && selisiJam <= 8) {
                console.log("hrTelat == 0 && selisiJam > 0 && selisiJam <= 8");
                jmTelat = selisiJam;
                totDenda = jmTelat * denda;
            } else if (hrTelat > 0 && selisiJam > 0 && selisiJam <= 8) {
                console.log("hrTelat > 0 && selisiJam > 0 && selisiJam <= 8");
                jmTelat = selisiJam;
                totDenda = jmTelat * denda;
                totHrTelat = hrTelat * hrgUnit;
                totDenda = totDenda + totHrTelat;
            } else if (hrTelat == 0 && selisiJam > 8) {
                console.log("hrTelat == 0 && selisiJam > 8");
                jmTelat = 0;
                totDenda = hrgUnit;
                hrTelat = hrTelat + 1;
            } else if (hrTelat > 0 && selisiJam > 8) {
                console.log("hrTelat > 0 && selisiJam > 8");
                jmTelat = 0;
                totDenda = hrgUnit;
                hrTelat = hrTelat + 1;
                totHrTelat = hrTelat * hrgUnit;
                totDenda = totDenda + totHrTelat;
            } else if (hrTelat > 0) {
                console.log("hrTelat > 0");
                jmTelat = 0;
                totHrTelat = hrTelat * hrgUnit;
                totDenda = totHrTelat;
            }

            console.log([jmTelat, hrTelat]);

            vDenda.value = totDenda;
            telat.value = hrTelat + " Hari " + jmTelat + " Jam";

            if (vKerusakan.value == "" || isNaN(vKerusakan.value)) {
                vKerusakan.value = 0;
            }
            if (vBBM.value == "" || isNaN(vBBM.value)) {
                vBBM.value = 0;
            }
            if (vDiskon.value == "" || isNaN(vDiskon.value)) {
                vDiskon.value = 0;
            }

            vPembayaran.addEventListener("input", function () {
                const nPembayaran = vPembayaran.value;
                const nTunggakan = vTunggakan.value;
                const nSisaPembayaran = parseInt(nTunggakan) - parseInt(nPembayaran);

                vSisaPembayaran.value = nSisaPembayaran;
            });
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/spk/penyewaan/detail.blade.php ENDPATH**/ ?>