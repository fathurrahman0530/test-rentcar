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
@include('sweetalert::alert')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Edit Data Mobil</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-8">
            <div class="card">
                <form action="{{ route('db.master.mobil.update') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="act" value="Update">
                    <input type="hidden" name="uuid" value="{{ $data['mobil']->uuid }}">
                    <input type="hidden" name="old_image" value="{{ $data['mobil']->image }}">
                    <input type="hidden" name="status" value="{{ $data['mobil']->status }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="brand">Brand</label>
                                <select name="brand" id="brand" class="form-select">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($data['brand'] as $b )
                                    <option value="{{ $b->uuid }}" {{ $b->uuid == $data['mobil']->uuid_brand ?
                                        'selected' : ''}}>{{ $b->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="merk">Merk</label>
                                <input type="text" name="merk" id="merk" class="form-control"
                                    value="{{ $data['mobil']->name }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="thn_mobil">Tahun Mobil</label>
                                <input type="number" name="thn_mobil" id="thn_mobil" value="{{ $data['mobil']->tahun }}"
                                    class="
                                    form-control">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="no_polisi">No. Polisi</label>
                                <input type="text" name="no_polisi" id="no_polisi" value="{{ $data['mobil']->plat }}"
                                    class="
                                    form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" value="{{ $data['mobil']->harga }}" id=" harga"
                                    class="form-control">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="kondisi">Kondisi</label>
                                <select name="kondisi" id="kondisi" class="form-select">
                                    <option value="">- Pilih -</option>
                                    <option value="B" {{ $data['mobil']->kondisi == 'B' ? 'selected' : '' }}>Baik
                                    </option>
                                    <option value="S" {{ $data['mobil']->kondisi == 'S' ? 'selected' : '' }}>Service
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="image">Gambar Mobil</label>
                            <input type="file" name="foto" id="image" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <i class="mdi mdi-content-save-all"></i>
                            <span>Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
