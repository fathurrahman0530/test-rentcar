@extends('dashboard.layouts.master')

@section('mm.db.master.mobil', 'mm-active')
@section('db.master.mobil', 'active')

@section('btn.nav')
<a href="{{ route('db.master.mobil') }}" class="btn btn-secondary waves-effect waves-light">
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
                    <h4 class="mb-sm-0 font-size-18">Detail Mobil</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-6">
                <center>
                    <img src="{{ asset('img') }}/car/{{ $data['mobil']->image }}" alt="" width="85%"
                        style="border-radius: 25px">
                </center>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-responsive dt-responsive w-100">
                            <tr>
                                <th width="15%">Brand</th>
                                <td width="25px">:</td>
                                <td>Toyota</td>
                            </tr>
                            <tr>
                                <th>Merk</th>
                                <td>:</td>
                                <td>"{{ $data['mobil']->name }}</td>
                            </tr>
                            <tr>
                                <th>Tahun</th>
                                <td>:</td>
                                <td>{{ $data['mobil']->tahun }}</td>
                            </tr>
                            <tr>
                                <th>No. Polisi</th>
                                <td>:</td>
                                <td>{{ $data['mobil']->plat }}</td>
                            </tr>
                            <tr>
                                <th>Harga Sewa</th>
                                <td>:</td>
                                <td>{{ $data['mobil']->harga }}</td>
                            </tr>
                            <tr>
                                <th>Kondisi</th>
                                <td>:</td>
                                <td>{{ $data['mobil']->kondisi == 'B' ? 'Baik' : ($data['mobil']->kondisi == 'S' ?
                                    'Service' : '') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection