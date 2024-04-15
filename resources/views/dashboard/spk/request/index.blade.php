@extends('dashboard.layouts.master')

@section('mm.db.spk.request', 'mm-active')
@section('db.spk.request', 'active')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Riwayat Penyewaan</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Penyewa</th>
                                    <th>No. Telephone</th>
                                    <th>Email</th>
                                    <th>Mobil</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $key => $i )
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $i->name }}</td>
                                    <td>{{ $i->notelp }}</td>
                                    <td>{{ $i->email }}</td>
                                    <td>{{ $i->unit }}</td>
                                    <td>
                                        @if ($i->status == "F")
                                        <span class="text-danger">Belum Diproses</span>
                                        @else
                                        <span class="text-success">Sudah Diproses</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($i->status == "F")
                                        <button type="button" class="btn btn-info waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target="#deleteMerk-{{ $i->id }}">
                                            <i class="mdi mdi-reload"></i>
                                            <span>Proses</span>
                                        </button>
                                        <div id="deleteMerk-{{ $i->id }}" class="modal fade" tabindex="-1"
                                            aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel">Peringatan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('db.spk.request.update') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="act" value="Update">
                                                        <input type="hidden" name="uuid" value="{{ $i->uuid }}">
                                                        <div class="modal-body">
                                                            Yakin ingin memproses
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect"
                                                                data-bs-dismiss="modal">
                                                                Batal
                                                            </button>
                                                            <button type="submit"
                                                                class="btn btn-primary waves-effect waves-light">Proses</button>
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
</div>
@endsection
