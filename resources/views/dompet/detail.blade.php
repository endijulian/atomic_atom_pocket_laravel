@extends('layouts.template_default')

<style>
    .clearfix{
        min-height: 550px;
    }

    .my-active span{
        background-color: #01C292 !important;
        color: white !important;
        border-color: #01C292 !important;
    }

    table thead tr th{
        background-color: rgb(15, 15, 145);
        color: white;
    }

</style>

@push('style-custom')
    <link rel="stylesheet" href="{{ asset('Template-Admin/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
@endpush

@section('title')
    Dompet Detail
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Dashboard</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                                        <li class="active">Dompet Detail</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">

            @if (session('status'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <span class="badge badge-pill badge-success">Success</span>
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Dompet Detail</strong>
                    <a href="{{ route('dompet.index') }}" class="float-right btn btn-primary">Kembali</a>
                </div>
                <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-1"><label  class="form-control-label">Nama</label></div>
                            <div class="col col-md-1"> <b>:</b> </div>
                            <div class="col-12 col-md-8">{{ $dompet->nama }}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-1"><label class=" form-control-label">Referensi</label></div>
                            <div class="col col-md-1"> <b>:</b> </div>
                            <div class="col-12 col-md-8">{{ $dompet->referensi }}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-1"><label class=" form-control-label">Deskripsi</label></div>
                            <div class="col col-md-1"> <b>:</b> </div>
                            <div class="col-12 col-md-8">{{ $dompet->deskripsi }}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-1"><label class=" form-control-label">Status</label></div>
                            <div class="col col-md-1"> <b>:</b> </div>
                            <div class="col-12 col-md-8">{{ $dompet->status->nama }}</div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection