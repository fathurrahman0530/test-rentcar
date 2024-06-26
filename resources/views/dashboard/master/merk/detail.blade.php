@extends('dashboard.layouts.master')

@section('mm.db.master.merk', 'mm-active')
@section('db.master.merk', 'active')

@section('btn.nav')
    <a href="{{ route('db.master.merk') }}" class="btn btn-secondary waves-effect waves-light">
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
                        <h4 class="mb-sm-0 font-size-18">Detail Brand</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <table cellspacing="20px">
                            <tr>
                                <th width="65%">Brand</th>
                                <td width="20px">:</td>
                                <td>Toyota</td>
                            </tr>
                            <tr>
                                <th width="20%">Total Unit</th>
                                <td>:</td>
                                <td>5 Unit</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if(Auth::user()->role == 1)
                            <table id="datatable" class="table table-bordered dt-responsive w-100">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Merk</th>
                                    <th>Tahun</th>
                                    <th>No. Polisi</th>
                                    <th>Harga Sewa</th>
                                    <th>Kondisi</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Fortuner</td>
                                    <td>2022</td>
                                    <td>B 1311 KJL</td>
                                    <td>Rp. 800.000</td>
                                    <td>Baik</td>
                                    <td>
                                        <a href="{{ route('db.master.mobil.detail', ['id' => 1]) }}" class="btn btn-info waves-effect waves-light">
                                            <i class="mdi mdi-eye"></i>
                                            <span>Detail</span>
                                        </a>
                                        <a href="{{ route('db.master.mobil.edit', ['id' => 1]) }}" class="btn btn-warning waves-effect waves-light">
                                            <i class="mdi mdi-text-box-edit"></i>
                                            <span>Edit</span>
                                        </a>
                                        <a href="#" class="btn btn-danger waves-effect waves-light">
                                            <i class="mdi mdi-trash-can"></i>
                                            <span>Hapus</span>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        @else
                            <center>
                                <h2>Coming Soon</h2>
                            </center>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
