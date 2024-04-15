@extends('dashboard.layouts.master')

@section('mm.db.master.user', 'mm-active')
@section('db.master.user', 'active')

@section('btn.nav')
<a href="{{ route('db.master.user') }}" class="btn btn-secondary waves-effect waves-light">
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
                    <h4 class="mb-sm-0 font-size-18">Detail User</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-4">
                <center>
                    <img src="{{ asset('img') }}/user/{{ $data->profile }}" alt="Tidak ada gambar" width="85%"
                        style="border-radius: 25px;">
                </center>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="fullname">Nama Lengakap</label>
                                <input type="text" name="fullname" id="fullname" class="form-control" value="{{ $data->fullname }}" readonly>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    value="{{ $data->username }}" readonly>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="email">Email</label>
                                <input type="email" value="{{ $data->email }}" name="email" id="email"
                                    class="form-control" readonly>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="notelp">No. Whatsapp</label><br>
                                <a href="https://wa.me/62{{ substr($data->notelp, 1) }}"
                                    target="_blank">{{$data->notelp}}</a>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5"
                                    readonly>{{ $data->alamat }}</textarea>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="role">Role</label><br>
                                <span>{{ $data->role == 2 ? 'Super Admin' : ($data->role == 3 ? 'Admin' : ($data->role
                                    == 4 ?
                                    'Driver' : '')) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection