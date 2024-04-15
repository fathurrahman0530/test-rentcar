<!doctype html>
<!--suppress CssInvalidPropertyValue -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Surat Pernyataan Sewa Kendaraan</title>
    <style>
        @page {
            size: legal portrait;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .thead {
            display: table-header-group;
        }

        .tbody {
            display: table-row-group;
        }

        .tr {
            page-break-inside: auto;
        }

        body {
            margin: 80px 20px 20px;
            /* Memberi margin untuk menghindari tumpang tindih dengan header */
            font-family: Arial, sans-serif;
        }

        .pb {
            page-break-before: always;
        }

        .f14 {
            font-size: 14pt;
        }

        .f12 {
            font-size: 12pt;
        }

        .f11 {
            font-size: 11pt;
        }

        .f10 {
            font-size: 10pt;
        }

        #header {
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            height: 150px;
            text-align: center;
        }

        /* #header .page:after {
            content: counter(page, upper-roman);
        } */
    </style>
</head>

<body>
    <?php
    $car = $data['spk']->uuid_unit;
    $penyewa = \App\Models\Biodata::where('uuid_user', $data['spk']->uuid_penyewa)->first();
    $company = $data['company'];
    $request = $data['request'];
    $proses = \App\Models\Biodata::where('uuid_user', Auth::user()->uuid)->first();
//     dd($proses);
    $dCar = App\Models\Car::select('b.name as nbrand', 'cars.*')->join('brands as b',
    'cars.uuid_brand', '=', 'b.uuid')->where('cars.uuid', $car)->get();
    ?>
    <?php $__currentLoopData = $dCar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="page-1" style="page-break-after: always">
        <div id="header">
            <center>
                <table width="75%" style="margin-left: -165px">
                    <tr>
                        <td rowspan="5" width="30%" style="text-align: center"><img src="<?php echo e(asset('img')); ?>/logo/<?php echo e($company->logo); ?>" alt="" width="65%"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center" width="70%"><?php echo e($company->name); ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: center" width="70%"><?php echo e($company->alamat); ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: center" width="70%">Tlp( 0411 )<?php echo e($company->telp); ?>, Mobile : <?php echo e($company->mobile_1); ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: center" width="70%">Email : <?php echo e($company->email); ?></td>
                    </tr>
                </table>

                <hr style="height: 3px; color: black; background-color: black">
            </center>
        </div>
        <div class="content" style="margin-top: 120px">
            <center>
                <b><u>SURAT PERNYATAAN SEWA KENDARAAN</u></b><br>
                <b>No. SPK : J<?php echo e($data['spk']->no_spk); ?></b>
            </center>
            <br>
            <table cellpadding="5px">
                <tr>
                    <td width="55%">Yang Bertanda Tangan Dibawah Ini</td>
                    <td width="5px">:</td>
                    <td></td>
                </tr>
            </table>
            <br>
            <table cellpadding="5px" style="margin-top: -20px">
                <tr>
                    <td width="55%">NIK</td>
                    <td width="5px">:</td>
                    <td><?php echo e($penyewa->ktp); ?></td>
                </tr>
                <tr>
                    <td width="55%">Nama</td>
                    <td width="5px">:</td>
                    <td><?php echo e($penyewa->fullname); ?></td>
                </tr>
                <tr>
                    <td width="55%">Tempat / Tanggal Lahir</td>
                    <td width="5px">:</td>
                    <td><?php echo e($penyewa->tmpt_lahir); ?> / <?php echo e($penyewa->tgl_lahir); ?></td>
                </tr>
                <tr>
                    <td width="55%">Pekerjaan</td>
                    <td width="5px">:</td>
                    <td><?php echo e($penyewa->pekerjaan); ?></td>
                </tr>
                <tr>
                    <td width="55%">Alamat</td>
                    <td width="5px">:</td>
                    <td><?php echo e($penyewa->alamat); ?></td>
                </tr>
                <tr>
                    <td width="55%">No. Hp</td>
                    <td width="5px">:</td>
                    <td><?php echo e($penyewa->notelp); ?></td>
                </tr>
                <tr>
                    <td width="55%">No. Hp Kerabat</td>
                    <td width="5px">:</td>
                    <td><?php echo e($penyewa->notelp_kerabat); ?></td>
                </tr>
            </table>
            <p style="text-align: justify">
                <b>Dengan ini menyatakan bahwa pihak rental menitipkan kendaraan sewa kepada saya dengan spesifikasi
                    kendaraan sebagai berikut :</b>
            </p>
            <table cellpadding="5px">
                <tr>
                    <td width="210px">Jenis Kendaraan</td>
                    <td width="5px">:</td>
                    <td><?php echo e($value->name); ?></td>
                    <td>No. Polisi : <u><?php echo e($value->plat); ?></u></td>
                    <td>Tahun : <u><?php echo e($value->tahun); ?></u></td>
                </tr>
                <tr>
                    <?php
                    $ambil = new DateTime($data['spk']->tgl_ambil);
                    $kembali = new DateTime($data['spk']->tgl_kembali);
                    $selisi = $ambil->diff($kembali);
                    ?>
                    <td width="210px">Nilai Sewa</td>
                    <td width="5px">:</td>
                    <td>Rp. <?php echo e(number_format(intval($data['spk']->total_payment) / intval($selisi->format("%d")), 0,',','.')); ?> / Hari</td>
                    <td colspan="2">Keluar &nbsp;&nbsp;&nbsp;: <u><?php echo e(date('d/m/Y', strtotime($data['spk']->tgl_ambil))); ?> <?php echo e($data['spk']->jam_ambil); ?> <?php echo e($company->zona); ?></u></td>
                </tr>
                <tr>
                    <td width="210px">Masa Sewa</td>
                    <td>:</td>
                    <td><?php echo e($selisi->format("%d")); ?> Hari</td>
                    <td colspan="2">Kembali : <u><?php echo e(date('d/m/Y', strtotime($data['spk']->tgl_kembali))); ?> <?php echo e($data['spk']->jam_kembali); ?> <?php echo e($company->zona); ?></u>
                    </td>
                </tr>
                <tr>
                    <td width="210px">Tujuan Penyewaan</td>
                    <td width="5px">:</td>
                    <td><?php echo e($data['spk']->tujuan); ?></td>
                    <td colspan="2">Kategori Penyewaan : <u><?php echo e($data['spk']->kat_pemakaian == 'LK' ? " Lepas Kunci"
                            : "Dengan Drive"); ?></u></td>
                </tr>
                <tr>
                    <td width="210px">Jaminan Penyewaan</td>
                    <td width="5px">:</td>
                    <td colspan="3"><?php echo e($data['spk']->jaminan); ?></td>
                </tr>
            </table>
            <p><b>Ket.</b></p>
            <ul>
                <li>Apabila penyewa akan memperpanjang sewa kendaraan maka harus di konfirmasi ke pihak rental.</li>
                <li>Jika penyewa terlamabat mengembalikan mobil dalam waktu yang di tentukan maka akan di kenakan biaya
                    over time 10% per jam darai harga sewa per harinya
                </li>
                <li>Apa bila pemakain sewa kendaraan tidak sesuai dengan Tujuan penyewa yang di tentukan penyewa, maka
                    akan di kenakan biaya tambahan sesuai dengan zona-zona yang berlaku.
                </li>
            </ul>
            <p><b>Penyewa bersedia menyanggupi syarat dan ketentuan penyewa kendaraan di bawah ini :</b></p>
            <ul>
                <li>Bertanggung jawab segala kerusakan, kehilangan kendaraan atau bagian-bagiannya</li>
                <li>Kendaraan tersebut tidak dapat digadaikan atau merubah bentuk aslinya</li>
                <li>Pemilik tidak bertanggung jawab atas kegiatan operasionalpenyewa kendaraan</li>
                <li>Penyewa tidak di benarkan membawa kendaraan selain tujuan diatas</li>
                <li>Melunasi sewa mobil dan segala bentuk tagihan jika terjadi kerusakan dan biaya kerugian selama di
                    bengkel.</li>
                <li>Penyewa bersedia dituntut pidana apabila melanggar poin-poin diatas</li>
            </ul>
            <table width="100%" cellpadding="5px" style="border-collapse: collapse; border: 1px solid #000;">
                <thead>
                    <tr style="border: 1px solid #000;">
                        <th style="border: 1px solid #000;">Total Pembayaran</th>
                        <th style="border: 1px solid #000;">Bayar / Panjar</th>
                        <th style="border: 1px solid #000;">Sisa</th>
                        <th style="border: 1px solid #000;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border: 1px solid #000;">
                        <td style="border: 1px solid #000;">Rp. <?php echo e(number_format($data['spk']->total_payment, 0,',','.')); ?></td>
                        <td style="border: 1px solid #000;">Rp. <?php echo e(number_format($data['spk']->store_payment, 0,',','.')); ?></td>
                        <td style="border: 1px solid #000;">Rp. <?php echo e(number_format($data['spk']->total_payment - $data['spk']->store_payment, 0,',','.')); ?>

                        </td>
                        <td style="border: 1px solid #000;"><?php echo e($data['spk']->total_payment - $data['spk']->store_payment == 0 ?
                            "Lunas" : "Belum Lunas"); ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table width="100%" cellpadding="5px">
                <tr>
                    <td width="33.3%" align="center"><?php echo e($company->name); ?> <br> Diketahui,</td>
                    <td width="33.3%"></td>
                    <td width="33.3%" align="center">Gowa, Tanggal <?php echo e(date('d/m/Y', strtotime($request['tgl_pesan']))); ?><br>Yang Pembuat Pernyataan</td>
                </tr>
                <tr>
                    <td width="33.3%" height="25px"></td>
                    <td width="33.3%"></td>
                    <td width="33.3%"></td>
                </tr>
                <tr>
                    <td width="33.3%" height="25px"></td>
                    <td width="33.3%"></td>
                    <td width="33.3%"></td>
                </tr>
                <tr>
                    <td width="33.3%" align="center">( <?php echo e($proses->fullname); ?> )</td>
                    <td width="33.3%" align="center">(...............................)</td>
                    <td width="33.3%" align="center">( <?php echo e($penyewa->fullname); ?> )</td>
                </tr>
                <tr>
                    <td width="33.3%" align="center">Yang menyerahkan kendaraan</td>
                    <td width="33.3%" align="center">Saksi</td>
                    <td width="33.3%" align="center">Penyewa kendaraan</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="page-2" style="page-break-before: always">
        <div class="content" style="margin-top: 120px">
            <center>
                <b><u>CEKLIST UNIT DAN KELENGKAPAN KENDARAAN</u></b><br>
                <b>No. SPK : J<?php echo e($data['spk']->no_spk); ?></b>
            </center>
            <br>
            <table width="100%" cellpadding="5px">
                <tr>
                    <td width="36%"><b>Kendaraan</b> : <?php echo e($value->name); ?></td>
                    <td width="30%"><b>No. Polisi</b> : <?php echo e($value->plat); ?></td>
                    <td width="34%"><b>Tanggal</b> : Gowa, <?php echo e(date('d/m/Y', strtotime($request['tgl_pesan']))); ?></td>
                </tr>
            </table>
            <table width="100%" style="border-collapse: collapse; border: 1px solid #000;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #000;">Body Kendaraan</th>
                        <th style="border: 1px solid #000;">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #000;" align="center" width="50px" rowspan="7">
                            <img src="<?php echo e(asset('img')); ?>/bahan_spk/depan.jpg" alt="" width="75%">
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td align="center">Bagian Depan</td>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;" align="center" width="50px" rowspan="7">
                            <img src="<?php echo e(asset('img')); ?>/bahan_spk/belakang.jpg" alt="" width="75%">
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td align="center">Bagian Belakang</td>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;" align="center" width="50px" rowspan="7">
                            <img src="<?php echo e(asset('img')); ?>/bahan_spk/kanan.jpg" alt="" width="75%" height="150px">
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td align="center">Bagian Kanan</td>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;" align="center" width="250px" rowspan="7">
                            <img src="<?php echo e(asset('img')); ?>/bahan_spk/kiri.jpg" alt="" width="75%" height="150px">
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td align="center">Bagian Kiri</td>
                        <td style="border: 1px solid #000;"></td>
                    </tr>
                </tbody>
            </table>
            <table width="100%" cellpadding="4px" style="border-collapse: collapse; border: 1px solid #000;">
                <tr>
                    <td style="border: 1px solid #000;" align="center" rowspan="2" width="25%"><b>Jenis Kelengkapan
                            Kendaraan</b></td>
                    <td style="border: 1px solid #000;" align="center" colspan="2" width="25%"><b>Status</b></td>
                    <td style="border: 1px solid #000;" align="center" rowspan="2" width="22%"><b>Keterangan</b></td>
                    <td style="border: 1px solid #000;" align="center" rowspan="5" width="28%">
                        <img src="<?php echo e(asset('img')); ?>/bahan_spk/indikator_fuel.jpg" alt="" width="75%">
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;" align="center"><b>Ada</b></td>
                    <td style="border: 1px solid #000;" align="center"><b>Tidak Ada</b></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">STNK</td>
                    <td style="border: 1px solid #000;" align="center"></td>
                    <td style="border: 1px solid #000;" align="center"></td>
                    <td style="border: 1px solid #000;" align="center"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">Dongkrak</td>
                    <td style="border: 1px solid #000;" align="center"></td>
                    <td style="border: 1px solid #000;" align="center"></td>
                    <td style="border: 1px solid #000;" align="center"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">Kotak P3K</td>
                    <td style="border: 1px solid #000;" align="center"></td>
                    <td style="border: 1px solid #000;" align="center"></td>
                    <td style="border: 1px solid #000;" align="center"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">Segitiga Pengaman</td>
                    <td style="border: 1px solid #000;" align="center"></td>
                    <td style="border: 1px solid #000;" align="center"></td>
                    <td style="border: 1px solid #000;" align="center"></td>
                    <td style="border: 1px solid #000;">Posisi Jarum BBM</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">Kunci Roda</td>
                    <td style="border: 1px solid #000;" align="center"></td>
                    <td style="border: 1px solid #000;" align="center"></td>
                    <td style="border: 1px solid #000;" align="center"></td>
                    <td style="border: 1px solid #000;">Km. Ambil : <?php echo e($request['km_ambil']); ?></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">Ban Cadangan</td>
                    <td style="border: 1px solid #000;" align="center"></td>
                    <td style="border: 1px solid #000;" align="center"></td>
                    <td style="border: 1px solid #000;" align="center"></td>
                    <td style="border: 1px solid #000;">Km. Kembali : </td>
                </tr>
            </table>
            <br><br><br><br>
            <table width="100%" cellpadding="5px">
                <tr>
                    <td align="center" width="50%">( <?php echo e($proses->fullname); ?> )</td>
                    <td align="center" width="50%">( <?php echo e($penyewa->fullname); ?> )</td>
                </tr>
                <tr>
                    <td align="center" width="50%">Pemeriksa</td>
                    <td align="center" width="50%">Penyewa</td>
                </tr>
            </table>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <script>
        window.print();
    </script>
</body>

</html>
<?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/dashboard/spk/cetak.blade.php ENDPATH**/ ?>