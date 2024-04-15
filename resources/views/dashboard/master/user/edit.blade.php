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
                    <h4 class="mb-sm-0 font-size-18">Edit User</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-lg-6">
            <div class="card">
                <form action="{{ route('db.master.user.update') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="act" value="Update">
                    <input type="hidden" name="IDUser" value="{{ $data->IDUser }}">
                    <input type="hidden" name="IDBio" value="{{ $data->IDBio }}">
                    <input type="hidden" name="old_image" value="{{ $data->profile }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="fullname">Nama Lengakap</label>
                                <input type="text" name="fullname" id="fullname" value="{{ $data->fullname }}"
                                    class="form-control">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" value="{{ $data->username }}"
                                    class="form-control">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" value="{{ $data->email }}"
                                    class="form-control">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="notelp">No. Whatsapp</label>
                                <input type="text" name="notelp" id="notelp" value="{{ $data->notelp }}"
                                    class="form-control">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" value="{{ $data->alamat }}"
                                    cols="30" rows="5">{{ $data->alamat }}</textarea>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-select">
                                    <option value="">- Pilih -</option>
                                    <option value="2" {{ $data->role == 2 ? 'selected' : '' }}>Super Admin</option>
                                    <option value="3" {{ $data->role == 3 ? 'selected' : '' }}>Admin</option>
                                    <option value="4" {{ $data->role == 4 ? 'selected' : '' }}>Driver</option>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="image">Foto</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i>
                            <span>Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection