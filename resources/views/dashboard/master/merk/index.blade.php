@extends('dashboard.layouts.master')

@section('mm.db.master.merk', 'mm-active')
@section('db.master.merk', 'active')

@section('btn.nav')
<button type="button" class="btn btn-secondary waves-effect waves-light" data-bs-toggle="modal"
    data-bs-target="#addMerk">
    <i class="mdi mdi-plus-circle"></i>
    <span>Tambah Brand</span>
</button>
@endsection

@section('content')
<div class="page-content">
    @include('sweetalert::alert')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Data Brand</h4>
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
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($data as $b)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $b->name }}</td>
                                <td>
                                    <a href="{{ route('db.master.merk.detail', ['id' => $b->uuid]) }}"
                                        class="btn btn-info waves-effect waves-light">
                                        <i class="mdi mdi-eye"></i>
                                        <span>Detail</span>
                                    </a>
                                    @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                                        {{-- modal edit merk --}}
                                        <button type="button" class="btn btn-warning waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target="#editMerk-{{ $b->id }}">
                                            <i class="mdi mdi-text-box-edit"></i>
                                            <span>Edit</span>
                                        </button>
                                        <div id="editMerk-{{ $b->id }}" class="modal fade" tabindex="-1"
                                             aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel">Edit Brand</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('db.master.merk.update') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="act" value="Update">
                                                        <input type="hidden" name="uuid" value="{{ $b->uuid }}">
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="merk">Merk</label>
                                                                <input type="text" name="merk" id="merk"
                                                                       class="form-control" value="{{ $b->name }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect"
                                                                    data-bs-dismiss="modal">
                                                                Batal
                                                            </button>
                                                            <button type="submit"
                                                                    class="btn btn-primary waves-effect waves-light">Simpan
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                        {{-- end modal edit merk --}}
                                        {{-- modal delete --}}
                                        <button type="button" class="btn btn-danger waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target="#deleteMerk-{{ $b->id }}">
                                            <i class="mdi mdi-trash-can"></i>
                                            <span>Hapus</span>
                                        </button>
                                        <div id="deleteMerk-{{ $b->id }}" class="modal fade" tabindex="-1"
                                             aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel">Delete Brand</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('db.master.merk.destroy') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="act" value="Destroy">
                                                        <input type="hidden" name="uuid" value="{{ $b->uuid }}">
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
                                        {{-- end modal delete --}}
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

@section('modals')
<div id="addMerk" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    data-bs-scroll="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('db.master.merk.store') }}" method="post">
                @csrf
                <input type="hidden" name="act" value="Store">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="merk">Brand <span class="text-danger">*</span></label>
                        <input type="text" name="merk" id="merk" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endsection