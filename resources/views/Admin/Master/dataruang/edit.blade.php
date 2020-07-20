@extends('Admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Data Ruang</h2>
                <div class="page-breadcrumb">

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
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
                    <a href="{{ route('data_ruang.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <form action="{{ route('data_ruang.update', ['id' => $ruangan->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nama ruangan</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ $ruangan->nama }}"  name="nama">

                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Foto ruangan (Optional)</label>
                            <input type="file" class="form-control  @error('foto') is-invalid @enderror" name="foto">

                             @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Set point Suhu Maksimum</label>
                            <input type="number" class="form-control @error('smax') is-invalid @enderror" value="{{ $ruangan->smax }}"  name="smax" id="suhuMax">

                            @error('smax')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Set point Suhu Minimum</label>
                            <input type="number" class="form-control @error('smin') is-invalid @enderror" value="{{ $ruangan->smin }}"  name="smin" id="suhuMin">

                            @error('smin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Set point Kelembapan Maksimum</label>
                            <input type="number" class="form-control @error('kmax') is-invalid @enderror" value="{{ $ruangan->kmax }}"  name="kmax" id="keMax">

                            @error('kmax')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Set point Kelembapan Minimum</label>
                            <input type="number" class="form-control @error('kmin') is-invalid @enderror" value="{{ $ruangan->kmin }}"  name="kmin" id="keMin">

                            @error('kmin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Set point Tekanan Maksimum</label>
                            <input type="number" class="form-control @error('tmax') is-invalid @enderror" value="{{ $ruangan->tmax }}"  name="tmax" id="teMax">

                            @error('tmax')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Set point Tekanan Minimum</label>
                            <input type="number" class="form-control @error('tmin') is-invalid @enderror" value="{{ $ruangan->tmin }}"  name="tmin" id="teMin">

                            @error('tmin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"> Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>
</div>
@endsection
