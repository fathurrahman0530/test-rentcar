@extends('dashboard.layouts.master')

@section('mm.db.master.log', 'mm-active')
@section('db.master.log', 'active')

@section('btn.nav')
    <a href="{{ route('db.master.log') }}" class="btn btn-secondary waves-effect waves-light">
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
                        <h4 class="mb-sm-0 font-size-18">Detail Log</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <table>
                            <tr>
                                <th width="60%">Nama Lengkap</th>
                                <td width="15px">:</td>
                                <td>Testing User</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>:</td>
                                <td>testing_user</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td>user@gmail.com</td>
                            </tr>
                            <tr>
                                <th>No. Telephone</th>
                                <td>:</td>
                                <td>
                                    <a href="https://wa.me/6289123098321" target="_blank">089123098321</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td>:</td>
                                <td>Super Admin</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive w-100">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Jenis</th>
                                <th>Waktu</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>SPK</td>
                                <td>25/02/2024 14.45</td>
                                <td>Melakukan SPK sebanyak 3 Unit selama 4 hari</td>
                                <td>
                                    <a href="{{ route('db.master.log.detail.action', ['id' => 1]) }}"
                                       class="btn btn-info waves-effect waves-light">
                                        <i class="mdi mdi-eye"></i>
                                        <span>Detail</span>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
