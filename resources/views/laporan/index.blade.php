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
    Laporan
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
                                        <li class="active">Laporan</li>
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

<div class="row">
    <div class="col-lg-12">
        <div class="card h-75">
            <div class="col-md-12 mt-3">
                <h3>Laporan Transaksi</h3>
            </div>
        </div>
    </div>
</div>

<div class="animated fadeIn">

    <div class="row">
        <div class="col-lg-12">

            @if (isset($errors))
                    <span class="badge badge-pill badge-danger">{{ $errors->first('start_date') }}</span>
                    <span class="badge badge-pill badge-danger">{{ $errors->first('status_id') }}</span>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('laporan.listfilter') }}" method="get" novalidate="novalidate" id="filter-form">
                        @csrf

                        <div class="card-body col-lg-3">
                            <div class="form-group">
                                <div class="form-group accordion">
                                    <label for="start_date" class="control-label mb-1">Tanggal Awal<span class="badge">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" type="date" name="start_date" id="start_date" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body col-lg-3">
                            <div class="form-group">
                                <div class="form-group accordion">
                                    <label for="end_date" class="control-label mb-1">Tanggal Akhir</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" type="date" name="end_date" id="end_date" required>
                                    </div>
                                    <p class="text-danger">{{ $errors->first('end_date') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="card-body col-lg-6">
                            <div class="form-group">
                                <div class="form-group accordion">
                                    <label for="end_date" class="control-label mb-1">Status</label>
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <label for="status_id" class="form-check-label ">
                                                <input type="checkbox" id="status_id" name="status_id[]" value="1" class="form-check-input">Tampilkan Uang Masuk
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="status_id" class="form-check-label ">
                                                <input type="checkbox" id="status_id" name="status_id[]" value="2" class="form-check-input">Tampilkan Uang Keluar
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body col-lg-3" style="margin-top: -30">
                            <div class="form-group">
                                <div class="form-group accordion">
                                    <label for="kategori_id" class="control-label mb-1">Kategori</label>
                                        <select name="kategori_id" id="kategori_id" class="form-control">
                                            @foreach ($kategori as $valCat)
                                                <option value="{{ $valCat->id }}">{{ $valCat->nama }}</option>
                                            @endforeach
                                        </select>
                                    <p class="text-danger">{{ $errors->first('kategori_id') }}</p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body col-lg-3" style="margin-top: -30">
                            <div class="form-group">
                                <div class="form-group accordion">
                                    <label for="dompet_id" class="control-label mb-1">Dompet</label>
                                        <select name="dompet_id" id="dompet_id" class="form-control">
                                            @foreach ($dompet as $valDom)
                                                <option value="{{ $valDom->id }}">{{ $valDom->nama }}</option>
                                            @endforeach
                                        </select>
                                    <p class="text-danger">{{ $errors->first('dompet_id') }}</p>
                                </div>
                                
                            </div>
                        </div>

                        <div class="card-body col-lg-12">
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-primary">Buat Laporan</button>
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection