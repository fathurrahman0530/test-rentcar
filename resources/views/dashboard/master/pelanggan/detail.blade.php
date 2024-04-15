@extends('dashboard.layouts.master')

@section('mm.db.master.pelanggan', 'mm-active')
@section('db.master.pelanggan', 'active')

@section('btn.nav')
<a href="{{ route('db.master.pelanggan') }}" class="btn btn-secondary waves-effect waves-light">
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
                    <h4 class="mb-sm-0 font-size-18">Detail Data Pelanggan</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-5">
                <center>
                    <img src="{{ asset('img') }}/cs/{{ $data['pelanggan']->foto_ktp }}" alt="Tidak ada gambar"
                        style="border-radius: 25px;" width="75%">
                </center>
            </div>
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control"
                                    value="{{ $data['pelanggan']->ktp }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fullname">Nama Lengkap</label>
                                <input type="text" name="fullname" id="fullname" class="form-control"
                                    value="{{ $data['pelanggan']->fullname }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tmpt_lahir">Tempat Lahir</label>
                                <input type="text" name="tmpt_lahir" id="tmpt_lahir" class="form-control"
                                    value="{{ $data['pelanggan']->tmpt_lahir }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" name="tmpt_lahir" id="tmpt_lahir" class="form-control"
                                    value="{{ $data['pelanggan']->tgl_lahir }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="15" rows="5"
                                readonly>{{ $data['pelanggan']->alamat }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
                                    value="{{ $data['pelanggan']->pekerjaan }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ $data['pelanggan']->email }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="notelp">No. Telephone</label>
                                <input type="text" name="notelp" id="notelp" class="form-control"
                                    value="{{ $data['pelanggan']->notelp }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="notelp_kerabat">No. Telephone kerabat</label>
                                <input type="text" name="notelp_kerabat" id="notelp_kerabat"
                                    value="{{ $data['pelanggan']->notelp_kerabat }}" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <h3>Riwayat Penyewaan</h3>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Tgl. Sewa</th>
                                <th>Jam Sewa</th>
                                <th>Total Tagihan</th>
                                <th>Total Bayar</th>
                                <th>Sisa Tagihan</th>
                                <th>Status</th>
                                {{--<th>Aksi</th>--}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ( $data['spk'] as $key => $i )
                            @php
                            $tunggakan = $i->total_payment - $i->store_payment;
                            @endphp
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>J{{ $i->no_spk }}</td>
                                <td>{{ $i->tgl_ambil }} - {{ $i->tgl_kembali }}</td>
                                <td>{{ $i->jam_ambil }} - {{ $i->jam_kembali }}</td>
                                <td>Rp. {{ number_format($i->total_payment, 0,',','.') }}</td>
                                <td>Rp. {{ number_format($i->store_payment, 0,',','.') }}</td>
                                <td>Rp. {{ number_format($tunggakan, 0,',','.') }}</td>
                                <td>
                                    @if ($tunggakan == 0)
                                    <span class="text-success">Lunas</span>
                                    @else
                                    <span class="text-danger">Belum Lunas</span>
                                    @endif
                                </td>
                                {{--<td>
                                    <a href="{{ route('db.spk.penyewaan.detail', ['id' => 1]) }}" class="btn btn-info">
                                        <i class="mdi mdi-eye-circle"></i>
                                        <span>Detail</span>
                                    </a>
                                </td>--}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection