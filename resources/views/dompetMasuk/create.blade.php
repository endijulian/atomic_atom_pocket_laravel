@extends('layouts.template_default')

<style>
    .clearfix{
        min-height: 550px;
    }

    .badge{
        color: red;
    }

    #plac ::-webkit-input-placeholder {
        text-align: right;
    }
    #plac :-moz-placeholder {
    text-align: right;
    }

    #plac input {
        text-align: right;
      }
</style>

@section('title')
    Tambah Dompet Masuk
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
                                        <li><a href="{{ route('dompetmasuk.index') }}">Dompet Masuk</a></li>
                                        <li class="active">Create Dompet Masuk</li>
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
                    <strong class="card-title">Tambah Dompet Masuk</strong>
                    <a href="{{ route('dompetmasuk.index') }}" class="float-right btn btn-primary"><i class="fa fa-chevron-circle-left"></i> Kelola Dompet Masuk</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('dompetmasuk.store') }}" method="post" novalidate="novalidate">
                        @csrf

                        <div class="card-body col-lg-3">
                            <div class="form-group">
                                <div class="form-group accordion">
                                    <label for="kode" class="control-label mb-1">Kode</label>
                                    <input id="kode" name="kode" type="text" class="form-control" readonly placeholder="WINxxxxx" aria-required="true" aria-invalid="false" value="{{ old('kode') }}">
                                    <p class="text-danger">{{ $errors->first('kode') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body col-lg-3">
                            <div class="form-group">
                                <div class="form-group accordion">
                                    <label for="tanggal" class="control-label mb-1">Tanggal</label>
                                    <input id="tanggal" name="tanggal" type="text" class="form-control" placeholder="Referensi" readonly aria-required="true" aria-invalid="false" value="{{ date('Y-m-d') }}">
                                    <p class="text-danger">{{ $errors->first('tanggal') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="card-body col-lg-3">
                            <div class="form-group">
                                <div class="form-group accordion">
                                    <label for="kategori_id" class="control-label mb-1">Kategori</label>
                                    <select name="kategori_id" id="kategori_id" class="form-control">
                                        @foreach ($kategori as $valueCategori)
                                            <option value="{{ $valueCategori->id }}">{{ $valueCategori->nama }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('kategori_id') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="card-body col-lg-3">
                            <div class="form-group">
                                <div class="form-group accordion">
                                    <label for="dompet_id" class="control-label mb-1">Dompet</label>
                                        <select name="dompet_id" id="dompet_id" class="form-control">
                                            @foreach ($dompet as $valDompet)
                                                <option value="{{ $valDompet->id }}">{{ $valDompet->nama }}</option>
                                            @endforeach
                                        </select>
                                    <p class="text-danger">{{ $errors->first('dompet_id') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="card-body col-lg-6" style="margin-top: -30">
                            <div class="form-group">
                                <div class="form-group accordion" id="plac">
                                    <label for="nilai" class="control-label mb-1">Nilai</label>
                                    <input id="nilai" name="nilai" type="text" class="form-control" placeholder="0" aria-required="true" aria-invalid="false" value="{{ old('nilai') }}">
                                    <p class="text-danger">{{ $errors->first('nilai') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="card-body col-lg-12" style="margin-top: -30">
                            <div class="form-group">
                                <div class="form-group accordion">
                                    <label for="deskripsi" class="control-label mb-1">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="3" placeholder="Deskripsi" class="form-control"></textarea>
                                    <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
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

<script>
    var nilai = document.getElementById('nilai');

    nilai.addEventListener('keyup', function(e){
        nilai.value = formatRupiah(this.value, '');
    });

    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }
</script>

@endsection