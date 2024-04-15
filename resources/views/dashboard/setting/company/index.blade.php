@extends('dashboard.layouts.master')

@section('mm.db.setting.company', 'mm-active')
@section('db.setting.company', 'active')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Data Perusahaan</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-4">
                <center>
                    <img src="{{ asset('img') }}/logo/{{ $data->logo }}" alt="Logo Perusahaan" style="width: 85%">
                </center>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <form action="{{ route('db.setting.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="act" value="Update">
                        <input type="hidden" name="uuid" value="{{ $data->uuid }}">
                        <input type="hidden" name="old_icon" value="{{ $data->icon }}">
                        <input type="hidden" name="old_logo" value="{{ $data->logo }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">name</label>
                                    <input type="text" value="{{ $data->name }}" name="name" id="name"
                                        class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="telp">No. Telephone</label>
                                    <input type="text" value="{{ $data->telp }}" name="telp" id="telp"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fax">Fax</label>
                                    <input type="text" value="{{ $data->fax }}" name="fax" id="fax"
                                        class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" value="{{ $data->email }}" name="email" id="email"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" cols="15"
                                    rows="5">{{ $data->alamat }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="mobile_1">Mobile 1</label>
                                    <input type="text" name="mobile_1" value="{{ $data->mobile_1 }}" id="mobile_1"
                                        class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="mobile_2">Mobile 2</label>
                                    <input type="mobile_2" name="mobile_2" value="{{ $data->mobile_2 }}" id="email"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="maps">Maps</label>
                                    <input type="text" name="maps" value="{{ $data->maps }}" id="maps"
                                        class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="zona">Zona</label>
                                    {{-- <input type="file" name="zona" id="icon" class="form-control"> --}}
                                    <select name="zona" id="zona" class="form-control">
                                        <option value="">-- Silahkan Pilih --</option>
                                        <option value="WIT" {{ $data->zona == 'WIT' ? 'selected' : '' }}>WIT</option>
                                        <option value="WIB" {{ $data->zona == 'WIB' ? 'selected' : '' }}>WIB</option>
                                        <option value="WITA" {{ $data->zona == 'WITA' ? 'selected' : '' }}>WITA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="icon">Icon</label>
                                    <input type="file" name="icon" id="icon" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="logo">Logo</label>
                                    <input type="file" name="logo" id="icon" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">
                                <i class="mdi mdi-content-save-all"></i>
                                <span>Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
