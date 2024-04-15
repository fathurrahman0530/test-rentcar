<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

/* ================================== */
/* | Controller Dashboard           | */
/* ================================== */
use App\Http\Controllers\Dashboard\HomeController as DBHomeController;
use App\Http\Controllers\Dashboard\SPK\LaporanController as DBLaporanPenyewaanController;
use App\Http\Controllers\Dashboard\SPK\PenyewaanController as DBPenyewaanController;
use App\Http\Controllers\Dashboard\SPK\RequestController as DBRequestController;
use App\Http\Controllers\Dashboard\SPK\RiwayatController as DBRiwayatPenyewaanController;
use App\Http\Controllers\Dashboard\Master\MobilController as DBMobilController;
use App\Http\Controllers\Dashboard\Master\PelangganController as DBPelangganController;
use App\Http\Controllers\Dashboard\Master\UserController as DBUserController;
use App\Http\Controllers\Dashboard\Master\MerkController as DBMerkController;
use App\Http\Controllers\Dashboard\Master\LogController as DBLogController;
use App\Http\Controllers\Setting\CompanyController as DBCompanyController;
/* ================================== */
/* | End Controller Dashboard       | */
/* ================================== */

/* ================================== */
/* | Group Service                  | */
/* ================================== */
/* group installation application */

Route::get('/install', [InstallController::class, 'index'])->name('install.apps');
Route::get('/payment/{$id}', [InstallController::class, 'payment'])->name('payment.app');
Route::get('/verify/{id}', [InstallController::class, 'verify'])->name('verify.app');
Route::get('/perpanjang/{id}', [InstallController::class, 'refound'])->name('refound.app');
Route::get('/selesai', [InstallController::class, 'success'])->name('success.install');

Route::post('/install', [InstallController::class, 'store'])->name('install.apps');
Route::post('/verify', [InstallController::class, 'update'])->name('verify.apps');
/* end group installation application */

/* group service system */
Route::get('/xyz/expired', [ServiceController::class, 'index']);
/* end group service system */

/* group ajax */
Route::get('/ax/pelanggan/{id}', [ServiceController::class, 'getPelanggan']);
Route::get('/ax/car/{id}', [ServiceController::class, 'getMobil']);
Route::get('/ax/cek-book/{id}', [ServiceController::class, 'cekBook']);
Route::get('/ax/tagihan/{id}', [ServiceController::class, 'getTagihan']);
Route::get('/ax/mobil', [ServiceController::class, 'getBookingMobil'])->name('getMobil');
/* end group ajax */

/* ================================== */
/* | End Group Service              | */
/* ================================== */

Auth::routes();

/* ================================== */
/* | Group Dashboard                | */
/* ================================== */
Route::group(['middleware' => ['auth', 'role:1, 2, 3']], function () {
    /* route dashboard */
    Route::get('/', [DBHomeController::class, 'index'])->name('db.home');
    /* end route dashboard */

    /* groups spk */
    Route::group(['prefix' => 'spk'], function () {
        /* route penyewaan */
        Route::group(['prefix' => 'penyewaan'], function () {
            /* Get Data */
            Route::get('/', [DBPenyewaanController::class, 'index'])->name('db.spk.penyewaan');
            Route::get('/add', [DBPenyewaanController::class, 'add'])->name('db.spk.penyewaan.add');
            Route::get('/detail/{id}', [DBPenyewaanController::class, 'detail'])->name('db.spk.penyewaan.detail');
            Route::get('/cetak/{id}', [DBPenyewaanController::class, 'cetak'])->name('db.spk.penyewaan.cetak');
            /* End Get Data */

            /* Store Data */
            Route::post('/post', [DBPenyewaanController::class, 'store'])->name('db.spk.penyewaan.store');
            /* End Store Data */

            /* Update Data */
            Route::post('/update', [DBPenyewaanController::class, 'update'])->name('db.spk.penyewaan.update');
            Route::post('/penyelesaian', [DBPenyewaanController::class, 'finish'])->name('db.spk.penyewaan.penyelesaian');
            Route::post('/perpanjangan', [DBPenyewaanController::class, 'perpanjangan'])->name('db.spk.penyewaan.perpanjang');
            /* End Update Data */

            /* Destroy Data */
            /* End Destroy Data */
        });
        /* end route penyewaan */

        /* route riwayat penyewaan */
        Route::group(['prefix' => 'riwayat-penyewaan'], function () {
            /* Get Data */
            Route::get('/', [DBRiwayatPenyewaanController::class, 'index'])->name('db.spk.riwayat.penyewaan');
            Route::get('/detail/{id}', [DBRiwayatPenyewaanController::class, 'detail'])->name('db.spk.riwayat.penyewaan.detail');
            Route::get('/cetak/{id}', [DBRiwayatPenyewaanController::class, 'cetak'])->name('db.spk.riwayat.penyewaan.cetak');
            /* End Get Data */

            /* Store Data */
            /* End Store Data */

            /* Update Data */
            Route::post('/bayar-tagihan', [DBRiwayatPenyewaanController::class, 'tagihan'])->name('db.spk.riwayat.penyewaan.tagihan');
            /* End Update Data */

            /* Destroy Data */
            /* End Destroy Data */
        });
        /* end route riwayat penyewaan */
    });
    /* end group spk */

    /* group master */
    Route::group(['prefix' => 'master'], function () {
        /* route data mobil */
        Route::group(['prefix' => 'mobil'], function () {
            /* Get Data */
            Route::get('/', [DBMobilController::class, 'index'])->name('db.master.mobil');
            Route::get('/add', [DBMobilController::class, 'add'])->name('db.master.mobil.add');
            Route::get('/detail/{id}', [DBMobilController::class, 'detail'])->name('db.master.mobil.detail');
            Route::get('/edit/{id}', [DBMobilController::class, 'edit'])->name('db.master.mobil.edit');
            /* End Get Data */

            /* Store Data */
            Route::post('/insert', [DBMobilController::class, 'store'])->name('db.master.mobil.store');
            /* End Store Data */

            /* Update Data */
            Route::post('/update', [DBMobilController::class, 'update'])->name('db.master.mobil.update');
            /* End Update Data */

            /* Destroy Data */
            Route::post('/hapus', [DBMobilController::class, 'destroy'])->name('db.master.mobil.destroy');
            /* End Destroy Data */
        });
        /* end route data mobil */

        /* route data pelanggan */
        Route::group(['prefix' => 'pelanggan'], function () {
            /* Get Data */
            Route::get('/', [DBPelangganController::class, 'index'])->name('db.master.pelanggan');
            Route::get('/add', [DBPelangganController::class, 'add'])->name('db.master.pelanggan.add');
            Route::get('/detail/{id}', [DBPelangganController::class, 'detail'])->name('db.master.pelanggan.detail');
            Route::get('/edit/{id}', [DBPelangganController::class, 'edit'])->name('db.master.pelanggan.edit');
            /* End Get Data */

            /* Store Data */
            Route::post('/post', [DBPelangganController::class, 'store'])->name('db.master.pelanggan.store');
            Route::post('/post-penyawaan', [DBPelangganController::class, 'storePenyewa'])->name('db.master.pelanggan.storePenyewa');
            /* End Store Data */

            /* Update Data */
            Route::post('/update', [DBPelangganController::class, 'update'])->name('db.master.pelanggan.update');
            /* End Update Data */

            /* Destroy Data */
            Route::post('/delete', [DBPelangganController::class, 'destroy'])->name('db.master.pelanggan.destroy');
            /* End Destroy Data */
        });
        /* end route data pelanggan */

        /* route data user */
        Route::group(['prefix' => 'user'], function () {
            /* Get Data */
            Route::get('/', [DBUserController::class, 'index'])->name('db.master.user');
            Route::get('/add', [DBUserController::class, 'add'])->name('db.master.user.add');
            Route::get('/detail/{id}', [DBUserController::class, 'detail'])->name('db.master.user.detail');
            Route::get('/edit/{id}', [DBUserController::class, 'edit'])->name('db.master.user.edit');
            /* End Get Data */

            /* Store Data */
            Route::post('/post', [DBUserController::class, 'store'])->name('db.master.user.store');
            /* End Store Data */

            /* Update Data */
            Route::post('/update', [DBUserController::class, 'update'])->name('db.master.user.update');
            /* End Update Data */

            /* Destroy Data */
            Route::post('/delete', [DBUserController::class, 'destroy'])->name('db.master.user.destroy');
            /* End Destroy Data */
        });
        /* end route data user */

        /* route data merk */
        Route::group(['prefix' => 'merk'], function () {
            /* Get Data */
            Route::get('/', [DBMerkController::class, 'index'])->name('db.master.merk');
            Route::get('/detail/{id}', [DBMerkController::class, 'detail'])->name('db.master.merk.detail');
            /* End Get Data */

            /* Store Data */
            Route::post('/insert', [DBMerkController::class, 'store'])->name('db.master.merk.store');
            /* End Store Data */

            /* Update Data */
            Route::post('/update', [DBMerkController::class, 'update'])->name('db.master.merk.update');
            /* End Update Data */

            /* Destroy Data */
            Route::post('/delete', [DBMerkController::class, 'destroy'])->name('db.master.merk.destroy');
            /* End Destroy Data */
        });
        /* end route data merk */

        /* route log */
        Route::group(['prefix' => 'log'], function () {
            /* Get Data */
            Route::get('/', [DBLogController::class, 'index'])->name('db.master.log');
            Route::group(['prefix' => 'detail'], function () {
                Route::get('/{id}', [DBLogController::class, 'detail'])->name('db.master.log.detail');
                Route::get('/aksi/{id}', [DBLogController::class, 'action'])->name('db.master.log.detail.action');
            });
            /* End Get Data */

            /* Store Data */
            /* End Store Data */

            /* Update Data */
            /* End Update Data */

            /* Destroy Data */
            /* End Destroy Data */
        });
        /* end route log */
    });
    /* end group master */
});
/* ================================== */
/* | End Group Dashboard            | */
/* ================================== */
