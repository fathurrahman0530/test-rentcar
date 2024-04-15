@extends('dashboard.layouts.master')

@section('mm.db.spk.riwayat.penyewaan', 'mm-active')
@section('db.spk.riwayat.penyewaan', 'active')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Riwayat Penyewaan</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row mt-4">
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
                                    <th>Penanggung Jawab</th>
                                    <th>Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $key => $i )
                                    @php
                                        $penyewa = App\Models\User::select('b.*')->join('biodatas as b', 'b.uuid_user', '=',
                                        'users.uuid')->where('users.uuid', $i->uuid_penyewa)->first();
                                        $car = \App\Models\Car::join('brands', 'cars.uuid_brand', '=', 'brands.uuid')
                                                ->select('cars.*', 'brands.name as brand_name')
                                                ->where('cars.uuid', $i->uuid_unit)
                                                ->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>J{{ $i->no_spk }}</td>
                                        <td>{{ $car->brand_name }} | {{ $car->name }} | {{ $car->plat }}</td>
                                        <td>{{ isset($penyewa->fullname) ? $penyewa->fullname : '' }}</td>
                                        <td><a href="https://wa.me/62{{ substr($i->notelp, 1) }}" target="_blank">{{
                                            isset($penyewa->notelp) ? $penyewa->notelp : '' }}</a></td>
                                        <td>{{ date('d/m/Y', strtotime($i->tgl_ambil)) }} <br>{{ date('d/m/Y', strtotime($i->tgl_kembali)) }}</td>
                                        <td>{{ $i->jam_ambil }} <br> {{ $i->jam_kembali}}</td>
                                        <td>Rp. {{ number_format($i->total_payment - $i->store_payment, 0, ',', '.') }}</td>
                                        <td>{{ $i->fullname }}</td>
                                        <td>
                                            @if ($i->total_payment - $i->store_payment == 0)
                                                <span class="text-success">Lunas</span>
                                            @else
                                                <span class="text-danger">Belum Lunas</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('db.spk.riwayat.penyewaan.detail', ['id' => $i->idSpks]) }}"
                                               class="btn btn-sm btn-info">
                                                <i class="mdi mdi-eye-circle"></i>
                                                {{--<span>Detail</span>--}}
                                            </a>
                                            {{-- modal cetak --}}
                                            <button type="button" class="btn btn-sm btn-dark waves-effect waves-light" data-bs-toggle="modal"
                                                    data-bs-target="#cetakSPK-{{ $i->idSpks }}">
                                                <i class="mdi mdi-printer"></i>
                                            </button>
                                            <div id="cetakSPK-{{ $i->idSpks }}" class="modal fade" tabindex="-1"
                                                 aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Peringatan...!!!</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('db.spk.penyewaan.cetak', ['id' => $i->idSpks]) }}" method="get" target="_blank">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <label for="km_ambil">Km. Awal</label>
                                                                        <input type="number" name="km_ambil" id="km_ambil" class="form-control"
                                                                               value="{{ $i->km_awal != null ? $i->km_awal : '' }}" required>
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
                                            {{-- end modal cetak --}}
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
