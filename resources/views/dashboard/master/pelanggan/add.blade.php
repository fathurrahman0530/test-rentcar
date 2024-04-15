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
    @include('sweetalert::alert')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Tambah Pelanggan</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="col-lg-8">
                <div class="card">
                    <form action="{{ route('db.master.pelanggan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="act" value="Store">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nik">NIK <span class="text-danger">*</span></label>
                                    <input type="text" name="nik" id="nik" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="fullname">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" name="fullname" id="fullname" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tmpt_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                                    <input type="text" name="tmpt_lahir" id="tmpt_lahir" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tgl_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                <textarea name="alamat" id="alamat" class="form-control" cols="15" rows="5" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
                                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="notelp">No. Telephone <span class="text-danger">*</span></label>
                                    <input type="text" name="notelp" id="notelp" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="notelp_kerabat">No. Telephone kerabat <span class="text-danger">*</span></label>
                                    <input type="text" name="notelp_kerabat" id="notelp_kerabat" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="foto_ktp">Foto KTP</label>
                                <input type="file" name="foto_ktp" id="foto_ktp" class="form-control">
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
