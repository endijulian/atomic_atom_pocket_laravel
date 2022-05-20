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
    Category
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
                                        <li class="active">Category</li>
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
                <div class="btn-group float-right">
                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-primary">Filter</button>
                    <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                        <a href="{{ route('dompet.index') }}" type="button" tabindex="0" class="dropdown-item">Semua</a>
                        @foreach ($dompetStatus as $item)
                            <a href="{{ route('dompet.getStatus', $item->id) }}" type="button" tabindex="0" class="dropdown-item">{{ $item->nama }}</a>
                        @endforeach
                    </div>
                </div>
                <a href="{{ route('category.create') }}" class="float-right btn text-white" style="background-color: #1552B6;">Buat Baru</a>
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
                    <strong class="card-title">Category</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $category->nama }}</td>
                                    <td>{{ $category->deskripsi }}</td>
                                    <td>{{ $category->status->nama }}</td>
                                    <td>
                                        <div class="input-group-btn">
                                            <div class="btn-group">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-primary"></button>
                                                <div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                                    <button type="button" tabindex="0" class="dropdown-item">Dompet Utama</button><hr>
                                                    <a href="{{ route('category.show',$category->id) }}" class="dropdown-item"><i class="fa fa-search mr-2"></i> Detail</a>
                                                    <a href="{{ route('category.edit', $category->id) }}" class="dropdown-item"><i class="fa fa-pencil mr-2"></i> Ubah</a>
                                                    @if ($category->status_id == 1)
                                                        <form action="{{ route('category.inActive', $category->id) }}" method="POST">
                                                            @csrf
                                                            <input name="status_id" type="hidden" value="2">
                                                            <button type="submit" tabindex="0" class="dropdown-item"><i class="fa fa-power-off mr-2"></i> Tidak Aktif</button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('category.Active', $category->id) }}" method="POST">
                                                            @csrf
                                                            <input name="status_id" type="hidden" value="1">
                                                            <button type="submit" tabindex="0" class="dropdown-item"><i class="fa fa-check mr-2"></i> Aktif</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
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
