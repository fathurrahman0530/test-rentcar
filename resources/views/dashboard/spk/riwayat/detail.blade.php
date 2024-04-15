@extends('dashboard.layouts.master')

@section('mm.db.spk.riwayat.penyewaan', 'mm-active')
@section('db.spk.riwayat.penyewaan', 'active')

@section('btn.nav')
    <a href="{{ route('db.spk.riwayat.penyewaan') }}" class="btn btn-secondary" style="margin-right: 10px;">
        <i class="mdi mdi-arrow-left-bold-circle"></i>
        <span>Kembali</span>
    </a>
    {{-- modal pembayaran --}}
    <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#pembayaran">
        <i class="mdi mdi-cash"></i>
    </button>
    {{-- end modal pembayaran --}}
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Detail Riwayat J{{ $data->no_spk }}</h4>
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
                                            @php
                                                $car = App\Models\Car::select('b.name as nbrand', 'cars.*')->join('brands as b', 'cars.uuid_brand', '=', 'b.uuid')->where('cars.uuid', $data->uuid_unit)->get();
                                                $i = 1;
                                            @endphp
                                            @foreach ( $car as $c )
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $c->nbrand }}</td>
                                                    <td>{{ $c->name }}</td>
                                                    <td>{{ $c->plat }}</td>
                                                    <td>Rp. {{ number_format($c->harga, 0,',','.') }}</td>
                                                </tr>
                                            @endforeach
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
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="tgl_ambil">Tanggal Ambil</label>
                                                <input type="date" name="tgl_ambil" value="{{ $data->tgl_ambil }}" id="tgl_ambil"
                                                       class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="tgl_kembali">Tanggal Kembali</label>
                                                <input type="date" name="tgl_kembali" value="{{ $data->tgl_kembali }}"
                                                       id="tgl_kembali" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="jam_ambil">Jam Ambil</label>
                                                <input type="time" name="jam_ambil" value="{{ $data->jam_ambil }}" id="jam_ambil"
                                                       class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="jam_kembali">Jam Kembali</label>
                                                <input type="time" name="jam_kembali" value="{{ $data->jam_kembali }}"
                                                       id="jam_kembali" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="kategori_pemakaian">Kategori</label>
                                                <input type="text" name="kategori_pemakaian" id="kategori_pemakaian"
                                                       class="form-control" value="{{ $data->kat_pemakaian == 'LK' ? " Lepas Kunci"
                                                                : "Dengan Drive" }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="tujuan">Tujuan Pemakaian</label>
                                                <input type="text" name="tujuan" id="tujuan" value="{{ $data->tujuan }}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="jaminan">Jaminan</label>
                                                <input type="text" name="jaminan" value="{{ $data->jaminan }}" id="jaminan"
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <h3 class="card-header">Data Penyewa</h3>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="nik">NIK</label>
                                                <input type="text" value="{{ $data->ktp }}" name="nik" id="nik" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="fullname">Nama Lengkap</label>
                                                <input type="text" value="{{ $data->fullname }}" name="fullname" id="fullname"
                                                       class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="tmpt_lahir">Tempat Lahir</label>
                                                <input type="text" value="{{ $data->tmpt_lahir }}" name="tmpt_lahir" id="tmpt_lahir"
                                                       class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="tgl_lahir">Tanggal Lahir</label>
                                                <input type="date" value="{{ $data->tgl_lahir }}" name="tgl_lahir" id="tgl_lahir"
                                                       class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="alamat">Alamat</label>
                                                <textarea name="alamat" id="alamat" class="form-control" cols="15" rows="5"
                                                          readonly>{{ $data->alamat }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="pekerjaan">Pekerjaan</label>
                                                <input type="text" name="pekerjaan" value="{{ $data->pekerjaan }}" id="pekerjaan"
                                                       class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" value="{{ $data->email }}" id="email"
                                                       class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="notelp">No. Telephone</label><br>
                                                <a href="https://wa.me/62{{ substr($data->notelp, 1) }}"
                                                   target="_blank">{{$data->notelp}}</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="notelp_kerabat">No. Telephone Kerabat</label><br>
                                                <a href="https://wa.me/62{{ substr($data->notelp_kerabat, 1) }}"
                                                   target="_blank">{{$data->notelp_kerabat}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    <div id="pembayaran" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Peringatan...!!!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('db.spk.riwayat.penyewaan.tagihan') }}" method="POST">
                    @csrf
                    <input type="hidden" name="act" value="Pembayaran">
                    <input type="hidden" name="uuid" value="{{ $data->idSpks }}">
                    <input type="hidden" name="old_store" value="{{ $data->store_payment }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="tot_tagihan">Total Tagihan</label>
                                <input type="number" name="tot_tagihan" id="tot_tagihan" class="form-control" value="{{ $data->total_payment - $data->store_payment }}" readonly>
                            </div>
                            <div class="col-lg-6">
                                <label for="pembayaran_tagihan">Pembayaran Tagihan</label>
                                <input type="number" name="pembayaran_tagihan" id="pembayaran_tagihan" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <label for="sisa_tagihan">Sisa Tagihan</label>
                                <input type="number" name="sisa_tagihan" id="sisa_tagihan" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Bayar</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            const totTagihan = document.getElementById('tot_tagihan');
            const pemTagihan = document.getElementById('pembayaran_tagihan');
            const sisaTagihan = document.getElementById('sisa_tagihan');

            pemTagihan.addEventListener('input', function () {
                const vTotTagihan = totTagihan.value;
                const vPemTagihan = pemTagihan.value;
                const vSisaTagihan = vTotTagihan - vPemTagihan;

                sisaTagihan.value = vSisaTagihan;
            });
        });
    </script>
@endsection
