@extends('layouts.template_default')

<style>
    .clearfix{
        min-height: 550px;
    }

    .badge{
        color: red;
    }
</style>

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
                                        <li><a href="{{ route('dompet.index') }}">Category</a></li>
                                        <li class="active">Edit</li>
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
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Edit Category</strong>
                    <a href="{{ route('category.index') }}" class="float-right btn btn-primary"><i class="fa fa-chevron-circle-left"></i> Kelola Category</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update',$category->id) }}" method="post" novalidate="novalidate">
                        @method('PUT')
                        @csrf

                        <div class="card-body col-lg-6">
                            <div class="form-group">
                                <div class="form-group accordion">
                                    <label for="nama" class="control-label mb-1">Nama<span class="badge">*</span></label>
                                    <input id="nama" name="nama" type="text" class="form-control" placeholder="Nama" aria-required="true" aria-invalid="false" value="{{ $category->nama }}">
                                    <p class="text-danger">{{ $errors->first('nama') }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body col-lg-12" style="margin-top: -30">
                            <div class="form-group">
                                <div class="form-group accordion">
                                    <label for="deskripsi" class="control-label mb-1">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="3" placeholder="Deskripsi" class="form-control">{{ $category->deskripsi }}</textarea>
                                    <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="card-body col-lg-3" style="margin-top: -30">
                            <div class="form-group">
                                <div class="form-group accordion">
                                    <label for="status_id" class="control-label mb-1">Status</label>
                                        <select name="status_id" id="status_id" class="form-control">
                                            @foreach ($dompetStatus as $status)
                                                <option value="{{ $status->id }}" @if ($status->id == $category->status_id) selected @endif>{{ $status->nama }}</option>
                                            @endforeach
                                        </select>
                                    <p class="text-danger">{{ $errors->first('status_id') }}</p>
                                </div>
                                
                            </div>
                        </div>

                        <div class="card-body col-lg-12">
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-square"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection