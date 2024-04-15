@extends('dashboard.layouts.master')

@section('mm.db.master.pelanggan', 'mm-active')
@section('db.master.pelanggan', 'active')

@section('btn.nav')
    <a href="{{ route('db.master.pelanggan.add') }}" class="btn btn-secondary waves-effect waves-light">
        <i class="mdi mdi-plus-circle"></i>
        <span>Tambah</span>
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
                        <h4 class="mb-sm-0 font-size-18">Data Pelanggan</h4>
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
                                <th>NIK</th>
                                <th>Nama Pelanggan</th>
                                <th>Email</th>
                                <th>No. Telephone</th>
                                <th>Total Tunggakan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $response as $key => $r )
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $r->ktp }}</td>
                                    <td>{{ $r->fullname }}</td>
                                    <td>{{ $r->email }}</td>
                                    <td>
                                        <a href="https://wa.me/62{{ substr($r->notelp, 1) }}" target="_blank">{{ $r->notelp
                                        }}</a>
                                    </td>
                                    @if ($r->total_payment == null && $r->store_payment == null)
                                        @php
                                            $tunggakan = 0;
                                        @endphp
                                    @else
                                        @php
                                            $tunggakan = $r->total_payment - $r->store_payment;
                                        @endphp
                                    @endif
                                    <td>Rp. {{ number_format($tunggakan, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('db.master.pelanggan.detail', ['id' => $r->IDUser]) }}"
                                           class="btn btn-info waves-effect waves-light">
                                            <i class="mdi mdi-eye"></i>
                                            <span>Detail</span>
                                        </a>
                                        @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                                            <a href="{{ route('db.master.pelanggan.edit', ['id' => $r->IDUser]) }}"
                                               class="btn btn-warning waves-effect waves-light">
                                                <i class="mdi mdi-text-box-edit"></i>
                                                <span>Edit</span>
                                            </a>
                                            <button type="button" class="btn btn-danger waves-effect waves-light"
                                                    data-bs-toggle="modal" data-bs-target="#deleteMerk-{{ $r->IDUser }}">
                                                <i class="mdi mdi-trash-can"></i>
                                                <span>Hapus</span>
                                            </button>
                                            <div id="deleteMerk-{{ $r->IDUser }}" class="modal fade" tabindex="-1"
                                                 aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Delete Brand</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('db.master.pelanggan.destroy') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="act" value="Destroy">
                                                            <input type="hidden" name="uuid_bio" value="{{ $r->IDBio }}">
                                                            <input type="hidden" name="uuid_user" value="{{ $r->IDUser }}">
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
