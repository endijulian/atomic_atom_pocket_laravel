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
    Dompet Keluar
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
                                        <li class="active">Dompet Keluar</li>
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
                <a href="{{ route('dompetkeluar.create') }}" class="float-right btn btn-primary">Buat Baru</a>
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
                    <strong class="card-title">Dompet Keluar</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Kode</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Nilai</th>
                                <th>Dompet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($transaksiKeluar as $valTransaksi)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $valTransaksi->tanggal }}</td>
                                    <td>{{ $valTransaksi->kode }}</td>
                                    <td>{{ $valTransaksi->deskripsi }}</td>
                                    <td>{{ $valTransaksi->kategori->nama }}</td>
                                    <td>(-) {{ $valTransaksi->nilai }}</td>
                                    <td>{{ $valTransaksi->dompet->nama }}</td>
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

@push('script-custom')
    <script src="{{ asset('Template-Admin/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('Template-Admin/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('Template-Admin/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('Template-Admin/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('Template-Admin/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('Template-Admin/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('Template-Admin/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('Template-Admin/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('Template-Admin/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('Template-Admin/assets/js/init/datatables-init.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    } );
    </script>
@endpush
