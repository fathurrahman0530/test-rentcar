@extends('dashboard.layouts.master')

@section('mm.db.master.mobil', 'mm-active')
@section('db.master.mobil', 'active')

@section('btn.nav')
<a href="{{ route('db.master.mobil.add') }}" class="btn btn-secondary waves-effect waves-light">
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
                    <h4 class="mb-sm-0 font-size-18">Data Mobil</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive w-100">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Brand</th>
                                <th>Merk</th>
                                <th>Tahun</th>
                                <th>No. Polisi</th>
                                <th>Harga Sewa</th>
                                <th>Kondisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $data as $key => $d )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $d->brand_name }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->tahun }}</td>
                                <td>{{ $d->plat }}</td>
                                <td>Rp. {{ number_format($d->harga, 0, ',', '.') }}</td>
                                <td>{{ $d->kondisi == 'B' ? 'Baik' : ($d->kondisi == 'S' ? 'Service' : '') }}</td>
                                <td>
                                    <a href="{{ route('db.master.mobil.detail', ['id' => $d->uuid]) }}"
                                        class="btn btn-sm btn-info waves-effect waves-light">
                                        <i class="mdi mdi-eye"></i>
                                        <span>Detail</span>
                                    </a>
                                    @if ($d->status == 'BK')
                                    {{-- modal ready --}}
                                    <button type="button" class="btn btn-sm btn-success waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target="#ready-{{ $d->id }}">
                                        <i class="mdi mdi-check-circle"></i>
                                        <span>Ready</span>
                                    </button>
                                    <div id="ready-{{ $d->id }}" class="modal fade" tabindex="-1"
                                        aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Warning...!!!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('db.master.mobil.update') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="act" value="Ready">
                                                    <input type="hidden" name="uuid" value="{{ $d->uuid }}">
                                                    <input type="hidden" name="status" value="RD">
                                                    <div class="modal-body">
                                                        yakin unit ini ready...!!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect"
                                                            data-bs-dismiss="modal">
                                                            Batal
                                                        </button>
                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light">Ready</button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                                    {{-- end modal ready --}}
                                    @else
                                    {{-- modal booking --}}
                                    <button type="button" class="btn btn-sm btn-secondary waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target="#booking-{{ $d->id }}">
                                        <i class="mdi mdi-close-circle"></i>
                                        <span>Booking</span>
                                    </button>
                                    <div id="booking-{{ $d->id }}" class="modal fade" tabindex="-1"
                                        aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Warning...!!!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('db.master.mobil.update') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="act" value="Booking">
                                                    <input type="hidden" name="uuid" value="{{ $d->uuid }}">
                                                    <input type="hidden" name="status" value="BK">
                                                    <div class="modal-body">
                                                        yakin unit ini diboking...!!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect"
                                                            data-bs-dismiss="modal">
                                                            Batal
                                                        </button>
                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light">Booking</button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                                    {{-- end modal booking --}}
                                    @endif
                                    @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                                        <a href="{{ route('db.master.mobil.edit', ['id' => $d->uuid]) }}"
                                           class="btn btn-sm btn-warning waves-effect waves-light">
                                            <i class="mdi mdi-text-box-edit"></i>
                                            <span>Edit</span>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target="#deleteMerk-{{ $d->id }}">
                                            <i class="mdi mdi-trash-can"></i>
                                            <span>Hapus</span>
                                        </button>
                                        <div id="deleteMerk-{{ $d->id }}" class="modal fade" tabindex="-1"
                                             aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel">Delete Brand</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('db.master.mobil.destroy') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="act" value="Destroy">
                                                        <input type="hidden" name="uuid" value="{{ $d->uuid }}">
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
