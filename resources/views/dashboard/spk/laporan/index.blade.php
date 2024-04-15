@extends('dashboard.layouts.master')

@section('mm.db.spk.laporan.penyewaan', 'mm-active')
@section('db.spk.laporan.penyewaan', 'active')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Laporan Penyewaan</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Brand</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ( $data as $key => $b )
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $b->name }}</td>
                                    <td>
                                        <a href="{{ route('db.spk.laporan.penyewaan.detail', ['id' => $b->uuid]) }}"
                                            class="btn btn-info">
                                            <i class="mdi mdi-eye-circle"></i>
                                            <span>Detail</span>
                                        </a>
                                        <a href="#" class="btn btn-dark">
                                            <i class="mdi mdi-printer"></i>
                                            <span>Cetak</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection