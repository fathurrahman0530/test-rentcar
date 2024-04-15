@extends('dashboard.layouts.master')

@section('mm.db.master.log', 'mm-active')
@section('db.master.log', 'active')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Log</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive w-100">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Fullname</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Testing User</td>
                                <td>testing_user</td>
                                <td>Super Admin</td>
                                <td>
                                    <a href="{{ route('db.master.log.detail', ['id' => 1]) }}"
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
