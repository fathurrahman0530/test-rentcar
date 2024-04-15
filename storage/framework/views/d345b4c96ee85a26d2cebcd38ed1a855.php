<?php $__env->startSection('mm.db.spk.penyewaan', 'mm-active'); ?>
<?php $__env->startSection('db.spk.penyewaan', 'active'); ?>

<?php $__env->startSection('btn.nav'); ?>
    <a href="<?php echo e(route('db.spk.penyewaan')); ?>" class="btn btn-secondary" style="float: left !important;">
        <i class="mdi mdi-arrow-left-bold-circle"></i>
        <span>Kembali</span>
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        #driver {
            display: none;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Tambah Penyewaan</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- button -->
            <div class="row">
                <div class="col-6"></div>
                <div class="col-6">
                    <button type="button" class="btn btn-secondary waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target="#addPelanggan">
                        <i class="mdi mdi-plus-circle"></i>
                        <span>Tambah Pelanggan</span>
                    </button>
                </div>
            </div>
            <!-- end button -->

            <form action="<?php echo e(route('db.spk.penyewaan.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="act" value="Store">
                <input type="hidden" name="no_spk" value="<?php echo e(isset($data['lastNoSpk']->no_spk) ? sprintf("%04d", intval($data['lastNoSpk']->no_spk) + 1) : '0001'); ?>">
                <div class="row">
                    <div class="col-lg-6 mb-3 mt-4">
                        <div class="card">
                            <h3 class="card-header">Data Mobil</h3>
                            <input type="hidden" id="uuid_penyewaan" name="uuid" value="<?php echo e(\Ramsey\Uuid\Uuid::uuid4()->toString()); ?>">
                            <input type="hidden" name="uuid_mobil" id="uuid_mobil">
                            <input type="hidden" name="plat" id="plat">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 mb-3 mb-3">
                                        <label for="choices-single-default">No. Polisi <span class="text-danger">*</span></label>
                                        <select class="cars form-control" data-trigger name="no_polisi" id="choices-single-default">
                                            <option value="">No. Polisi</option>
                                            <?php $__currentLoopData = $data['mobil']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($m->uuid); ?>"><?php echo e($m->plat); ?> | <?php echo e($m->brand_name); ?> | <?php echo e($m->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3 mb-3">
                                        <label for="merk_mobil">Merk Mobil <span class="text-danger">*</span></label>
                                        <input type="text" name="merk_mobil" id="merk_mobil" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-3 mb-3">
                                        <label for="jns_mobil">Jenis Mobil <span class="text-danger">*</span></label>
                                        <input type="text" name="jns_mobil" id="jns_mobil" class="form-control">
                                    </div>
                                    <div class="col-lg-6 mb-3 mb-3">
                                        <label for="hrg_sewa">Harga Sewa <span class="text-danger">*</span></label>
                                        <input type="number" name="hrg_sewa" id="hrg_sewa" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3 mt-4">
                        <div class="card">
                            <h3 class="card-header">Data Penyewa</h3>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="nik">NIK <span class="text-danger">*</span></label>
                                        <select class="nik form-control " data-trigger name="nik" id="choices-single-default">
                                            <option value="">This is a placeholder</option>
                                            <?php $__currentLoopData = $data['pelanggan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($p->IDUser); ?>"><?php echo e($p->ktp); ?> | <?php echo e($p->fullname); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="fullname">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" name="fullname" id="fullname" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="tmpt_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                                        <input type="text" name="tmpt_lahir" id="tmpt_lahir" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="tgl_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                        <textarea name="alamat" id="alamat" class="form-control" cols="15" rows="5"
                                                  required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
                                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="notelp">No. Telephone <span class="text-danger">*</span></label>
                                        <input type="text" name="notelp" id="notelp" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="notelp_kerabat">No. Telephone Kerabat <span class="text-danger">*</span></label>
                                        <input type="text" name="notelp_kerabat" id="notelp_kerabat" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3 mt-4">
                        <div class="card">
                            <h3 class="card-header">Waktu Sewa</h3>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="tgl_ambil">Tanggal Ambil <span class="text-danger">*</span></label>
                                        <input type="date" name="tgl_ambil" id="tgl_ambil" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="tgl_kembali">Tanggal Kembali <span class="text-danger">*</span></label>
                                        <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="jam_ambil">Jam Ambil <span class="text-danger">*</span></label>
                                        <input type="time" name="jam_ambil" id="jam_ambil" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="jam_kembali">Jam Kembali <span class="text-danger">*</span></label>
                                        <input type="time" name="jam_kembali" id="jam_kembali" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="kategori_pemakaian">Kategori <span class="text-danger">*</span></label>
                                        <select name="kategori_pemakaian" id="kategori_pemakaian" class="form-select" required>
                                            <option value="">- Select -</option>
                                            <option value="LK">Lepas Kunci</option>
                                            <option value="DD">Dengan Driver</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="tujuan">Tujuan Pemakaian <span class="text-danger">*</span></label>
                                        <input type="text" name="tujuan" id="tujuan" class="form-control" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="jaminan">Jaminan <span class="text-danger">*</span></label>
                                        <input type="text" name="jaminan" id="jaminan" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3 mt-4">
                        <div class="card">
                            <h3 class="card-header">Pembayaran</h3>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="metode_pembayaran">Metode Pembayaran <span class="text-danger">*</span></label>
                                        <select name="metode_pembayaran" id="metode_pembayaran" class="form-control" required>
                                            <option value="">- Select -</option>
                                            <option value="TF">Transfer</option>
                                            <option value="CS">Cash</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="total">Total Pembayaran <span class="text-danger">*</span></label>
                                        <input type="number" name="total" id="total" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="bayar">Bayar | Panjar <span class="text-danger">*</span></label>
                                        <input type="number" name="bayar" id="bayar" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="sisa">Sisa Bayar</label>
                                        <input type="number" name="sisa" id="sisa" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="ket">Keterangan</label>
                                    <textarea name="ket" id="ket" class="form-control" cols="15" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="driver">
                        <div class="row">
                            <div class="col-lg-6 mb-3 mt-4">
                                <div class="card">
                                    <h3 class="card-header">Driver</h3>
                                    <div class="card-body">
                                        <div class="row">
                                            <input type="hidden" name="ktp" id="ktp">
                                            <div class="col-lg-6 mb-3">
                                                <label for="driver">Nama Lengkap <span class="text-danger">*</span></label>
                                                <select class="driver form-control " data-trigger name="driver" id="choices-single-default">
                                                    <option value="">This is a placeholder</option>
                                                    <?php $__currentLoopData = $data['pelanggan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($p->IDUser); ?>"><?php echo e($p->ktp); ?> | <?php echo e($p->fullname); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label for="notelp_driver">No. Telephone <span class="text-danger">*</span></label>
                                                <input type="text" name="notelp_driver" id="notelp_driver" class="form-control">
                                            </div>
                                        </div>
                                        <button type="button" onclick="" class="btn btn-sm btn-success">
                                            <i class="mdi mdi-content-save"></i>
                                            <span>Simpan</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3 mt-4">
                                <div class="card">
                                    <h3 class="card-header">List Driver</h3>
                                    <div class="card-body">
                                        <ul id="output_driver"></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3" style="">
                        <button type="submit" class="btn btn-success">
                            <i class="mdi mdi-content-save-all"></i>
                            <span>Simpan</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>
    <div id="addPelanggan" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
         data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('db.master.pelanggan.storePenyewa')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="act" value="Store">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nik">NIK <span class="text-danger">*</span></label>
                                <input type="text" name="nik" id="nik" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fullname">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="fullname" id="fullname" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tmpt_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                                <input type="text" name="tmpt_lahir" id="tmpt_lahir" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tgl_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat">Alamat <span class="text-danger">*</span></label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="15" rows="5" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="notelp">No. Telephone <span class="text-danger">*</span></label>
                                <input type="text" name="notelp" id="notelp" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="notelp_kerabat">No. Telephone kerabat <span class="text-danger">*</span></label>
                                <input type="text" name="notelp_kerabat" id="notelp_kerabat" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="foto_ktp">Foto KTP <span class="text-danger">*</span></label>
                            <input type="file" name="foto_ktp" id="foto_ktp" class="form-control" required>
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

<?php $__env->startSection('js'); ?>
    <script>
        // range date
        function hitungJarakTanggal(tanggalAwal, tanggalAkhir) {
            let awal = new Date(tanggalAwal);
            let akhir = new Date(tanggalAkhir);

            // Menghitung selisih dalam milidetik
            let selisih = akhir.getTime() - awal.getTime();

            // Menghitung jumlah hari dari selisih waktu
            let jarakHari = Math.floor(selisih / (1000 * 3600 * 24));

            return jarakHari;
        }

        // end range datae

        $(document).ready(function () {
            let driver = $('#driver');

            // get data pelanggan
            $('.nik').change(function () {
                let id = $(".nik").val();

                $.ajax({
                    type: 'GET',
                    url: '/ax/pelanggan/' + id,
                    success: function (data) {
                        $('#fullname').val(data.fullname);
                        $('#tmpt_lahir').val(data.tmpt_lahir);
                        $('#tgl_lahir').val(data.tgl_lahir);
                        $('#alamat').val(data.alamat);
                        $('#ktp').val(data.ktp);
                        $('#pekerjaan').val(data.pekerjaan);
                        $('#email').val(data.email);
                        $('#notelp').val(data.notelp);
                        $('#notelp_kerabat').val(data.notelp_kerabat);
                    }
                });

                $.ajax({
                    type: 'GET',
                    url: '/ax/tagihan/' + id,
                    success: function (data) {
                        console.log(data);
                        if (data > 0) {
                            if (window.confirm(`Pelanggan memiliki tunggakan ${data}, ingin lanjutkan?`)) {
                                alert("Silahkan lanjutkan pengisian SPK..!!!");
                            } else {
                                window.location.href = "<?php echo e(route('db.spk.penyewaan')); ?>";
                            }
                        }
                    }
                });
            })
            // end get data pelanggan
            // get data car
            $('.cars').change(function () {
                let id = $(".cars").val();

                // console.log(id);
                $.ajax({
                    type: 'GET',
                    url: '/ax/car/' + id,
                    success: function (data) {
                        $('#plat').val(data.plat);
                        $('#uuid_mobil').val(data.uuid);
                        $('#merk_mobil').val(data.brand_name);
                        $('#jns_mobil').val(data.name);
                        $('#hrg_sewa').val(data.harga);
                    }
                })
            })
            // end get data car
            // menghitung total pembayaran by kategori
            $('#kategori_pemakaian').change(function () {
                let harga = $('#hrg_sewa').val();
                let awal = $('#tgl_ambil').val();
                let akhir = $('#tgl_kembali').val();
                let bayar = $('#bayar').val();
                let total = $('#total').val();
                let kategori = $('#kategori_pemakaian').val();

                let durasi = hitungJarakTanggal(awal, akhir);

                let vBayar = bayar == '' ? 0 : bayar;

                let totalPembayaran = harga * durasi;

                let vTotal = total == '' ? totalPembayaran : totalPembayaran;

                let sisaPembayaran = vTotal - vBayar;

                if (kategori == 'DD') {
                    driver.css('display', 'block');
                } else {
                    driver.css('display', 'none');
                }

                $('#total').val(vTotal);
                $('#sisa').val(sisaPembayaran);
                // console.log(totalPembayaran);
            });
            // end menghitung total pembayaran by kategori

            // sisa pembayaran by Bayar
            const bayar = document.getElementById('bayar');
            const total = document.getElementById('total');
            const sisa = document.getElementById('sisa');
            bayar.addEventListener('input', function () {
                const vBayar = bayar.value;
                const vTotal = total.value;
                const hasil = vTotal - vBayar;

                sisa.value = hasil;
            })
            // end sisa pembayaranby Bayar

            // sisa pembayaran by Total
            total.addEventListener('input', function () {
                const vBayar = bayar.value;
                const vTotal = total.value;
                const hasil = vTotal - vBayar;

                sisa.value = hasil;
            })
            // end sisa pembayaran by Total
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/spk/penyewaan/add.blade.php ENDPATH**/ ?>