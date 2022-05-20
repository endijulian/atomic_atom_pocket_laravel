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
        background-color: rgb(71, 71, 255);
        color: white;
    }

</style>

@push('style-custom')
    <link rel="stylesheet" href="{{ asset('Template-Admin/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
@endpush

@section('title')
    Result
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
                                        <li class="active">Halaman Result</li>
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
                <input type="button" class="float-left btn btn-primary mr-1" onclick="printableDiv('printableArea')" value="Print" />
                <a href="{{ route('laporan.index') }}" class="float-left btn text-white" style="background-color: #1552B6;">Close</a>
            </div>
        </div>
    </div>
</div>

<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">

            <div class="card" id="printableArea">
                <div class="card-header">
                    <div class="page-title">
                        <p class="text-center">RIWAYAT TRANSAKSI</p>
                        <p class="text-center text-small">{{ $start_date}} - {{ $end_date }}</p>
                    </div>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Kode</th>
                                <th>Deskripsi</th>
                                <th>Dompet</th>
                                <th>Kategori</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($transaksi) <= 0)
                                <tr>
                                    <td colspan="7" style="text-align: center;">Data tidak ditemukan</td>
                                </tr>
                            @else
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($transaksi as $valTransaksi)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $valTransaksi->tanggal }}</td>
                                        <td>{{ $valTransaksi->kode }}</td>
                                        <td>{{ $valTransaksi->deskripsi }}</td>
                                        <td>{{ $valTransaksi->dompet->nama }}</td>
                                        <td>{{ $valTransaksi->kategori->nama }}</td>
                                        @if ($valTransaksi->status_id == 1)
                                            <td>(+) {{ $valTransaksi->nilai }}</td>
                                        @else
                                            <td>(-) {{ $valTransaksi->nilai }}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    function printableDiv(printableAreaDivId) {
     var printContents = document.getElementById(printableAreaDivId).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

</script>
@endsection
