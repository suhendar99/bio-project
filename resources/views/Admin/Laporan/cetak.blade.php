@extends('Admin.layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- pageheader  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Cetak Laporan</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cetak Laporan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end pageheader  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- select options  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>                                        
                @endif
                @if (session()->has('failed'))
                    <div class="alert alert-danger">
                        {{ session()->get('failed') }}
                    </div>                                        
                @endif
                <form action="/downloadLaporan" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="input-select">Tanggal Awal</label>
                                <input type="date" name="awal" class="form-control  @error('awal') is-invalid @enderror">
                                @error('awal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="input-select">Tanggal Akhir</label>
                                <input type="date" name="akhir" class="form-control @error('akhir') is-invalid @enderror">
                                @error('akhir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">Ruangan</label>
                                <select name="ruang" id="" class="form-control">
                                    <option value="all">Semua ruangan</option>}
                                    @foreach($ruang as $f)
                                        <option value="{{ $f->id }}">{{ $f->nama }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- <div class="col-6">
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">Parameter</label>
                                <select name="satuan" id="" class="form-control">
                                    <option value="allpar">Semua Parameter</option>}
                                    @foreach($satuan as $s)
                                        <option value="{{ $s->parameter }}">{{ $s->parameter }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->
                    </div>
                    <button class="btn btn-primary" type="submit">Cetak Laporan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end select options  -->
<!-- ============================================================== -->
@endsection
