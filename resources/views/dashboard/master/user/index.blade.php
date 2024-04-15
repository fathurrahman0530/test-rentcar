@extends('dashboard.layouts.master')

@section('mm.db.master.user', 'mm-active')
@section('db.master.user', 'active')

@section('btn.nav')
    <a href="{{ route('db.master.user.add') }}" class="btn btn-secondary waves-effect waves-light">
        <i class="mdi mdi-plus-circle"></i>
        <span>Tambah</span>
    </a>
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data User</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive w-100">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama User</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>No. Telephone</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $response as $key => $d )
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $d->fullname }}</td>
                                    <td>{{ $d->username }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>
                                        <a href="https://wa.me/62{{ substr($d->notelp, 1) }}" target="_blank">{{ $d->notelp
                                        }}</a>
                                    </td>
                                    <td>{{ $d->role == 2 ? 'Super Admin' : ($d->role == 3 ? 'Admin' : ($d->role == 4 ?
                                    'Driver' : '')) }}</td>
                                    <td>
                                        <a href="{{ route('db.master.user.detail', ['id' => $d->IDUser]) }}"
                                           class="btn btn-info waves-effect waves-light">
                                            <i class="mdi mdi-eye"></i>
                                            <span>Detail</span>
                                        </a>
                                        @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                                            <a href="{{ route('db.master.user.edit', ['id' => $d->IDUser]) }}"
                                               class="btn btn-warning waves-effect waves-light">
                                                <i class="mdi mdi-text-box-edit"></i>
                                                <span>Edit</span>
                                            </a>
                                            @if($d->IDUser != Auth::user()->uuid)
                                                <button type="button" class="btn btn-danger waves-effect waves-light"
                                                        data-bs-toggle="modal" data-bs-target="#deleteMerk-{{ $d->IDUser }}">
                                                    <i class="mdi mdi-trash-can"></i>
                                                    <span>Hapus</span>
                                                </button>
                                                <div id="deleteMerk-{{ $d->IDUser }}" class="modal fade" tabindex="-1"
                                                     aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel">Delete Brand</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('db.master.user.destroy') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="act" value="Destroy">
                                                                <input type="hidden" name="uuid_bio" value="{{ $d->IDBio }}">
                                                                <input type="hidden" name="uuid_user" value="{{ $d->IDUser }}">
                                                                <div class="modal-body">
                                                                    yakin ingin dihapus
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary waves-effect"
                                                                            data-bs-dismiss="modal">
                                                                        Batal
                                                                    </button>
                                                                    <button type="submit"
                                                                            class="btn btn-primary waves-effect waves-light">Hapus
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div>
                                            @endif
                                        @endif
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
@endsection