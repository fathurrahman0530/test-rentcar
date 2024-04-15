@extends('dashboard.layouts.master')

@section('mm.db.master.log', 'mm-active')
@section('db.master.log', 'active')

@section('btn.nav')
    <a href="{{ route('db.master.log.detail', ['id' => 1]) }}" class="btn btn-secondary waves-effect waves-light">
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
                        <h4 class="mb-sm-0 font-size-18">Detail Log Action</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


        </div>
    </div>
@endsection
