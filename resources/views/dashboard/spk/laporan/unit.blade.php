@extends('dashboard.layouts.master')

@section('mm.db.spk.laporan.penyewaan', 'mm-active')
@section('db.spk.laporan.penyewaan', 'active')

@section('btn.nav')
    <a href="{{ route('db.spk.laporan.penyewaan.detail', ['id' => 1]) }}" class="btn btn-secondary">
        <i class="mdi mdi-arrow-left-bold-circle"></i>
        <span>Kembali</span>
    </a>
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Detail Laporan Merk</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered dt-responsive w-100">
                            <tr>
                                <th width="125px">Brand</th>
                                <td width="50px">:</td>
                                <td>Toyota</td>
                            </tr>
                            <tr>
                                <th>Merk</th>
                                <td>:</td>
                                <td>Fortuner</td>
                            </tr>
                            <tr>
                                <th>Tahun</th>
                                <td>:</td>
                                <td>2022</td>
                            </tr>
                            <tr>
                                <th>No. Polisi</th>
                                <td>:</td>
                                <td>B 1311 KJL</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive w-100">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Penyewa</th>
                                <th>Tanggal Sewa</th>
                                <th>Jam Sewa</th>
                                <th>Pendapatan</th>
                                <th>Penanggung Jawab</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>7306083005990008</td>
                                <td>Fathur Rahman Abdullah</td>
                                <td>25/02/2024 - 29/02/2024</td>
                                <td>17.30 - 17.30</td>
                                <td>Rp. 1.600.000</td>
                                <td>Fathur Rahman Abdullah</td>
                                <td>
                                    <a href="{{ route('db.spk.laporan.penyewaan.detail.unit', ['id' => 1]) }}" class="btn btn-info">
                                        <i class="mdi mdi-eye-circle"></i>
                                        <span>Detail</span>
                                    </a>
                                    <a href="#" class="btn btn-dark">
                                        <i class="mdi mdi-printer"></i>
                                        <span>Cetak</span>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
