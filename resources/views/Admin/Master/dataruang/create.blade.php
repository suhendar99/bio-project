@extends('Admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Tambah Data Ruang</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">

                    </nav>
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
                    <form action="{{ route('data_ruang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama ruangan</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"  name="nama">

                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Foto ruangan</label>
                            <input type="file" class="form-control  @error('foto') is-invalid @enderror"   name="foto">

                             @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>       

                        <div class="form-group">
                            <label for="">Set point Suhu Maksimum</label>
                            <input type="number" class="form-control @error('smax') is-invalid @enderror"  name="smax" value="{{ old('smax') }}">

                            @error('smax')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Set point Suhu Minimum</label>
                            <input type="number" class="form-control @error('smin') is-invalid @enderror"  name="smin" value="{{ old('smin') }}">

                            @error('smin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>          
                        <div class="form-group">
                            <label for="">Set point Kelembapan Maksimum</label>
                            <input type="number" class="form-control @error('kmax') is-invalid @enderror"  name="kmax" value="{{ old('kmax') }}">

                            @error('kmax')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Set point Kelembapan Minimum</label>
                            <input type="number" class="form-control @error('kmin') is-invalid @enderror"  name="kmin" value="{{ old('kmin') }}">

                            @error('kmin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>          
                        <div class="form-group">
                            <label for="">Set point Tekanan Maksimum</label>
                            <input type="number" class="form-control @error('tmax') is-invalid @enderror"  name="tmax" value="{{ old('tmax') }}">

                            @error('tmax')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Set point Tekanan Minimum</label>
                            <input type="number" class="form-control @error('tmin') is-invalid @enderror"  name="tmin" value="{{ old('tmin') }}">

                            @error('tmin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>                                      
                        <div class="form-group">                                        
                            <button type="submit" class="btn btn-primary"> Simpan <i class="fas fa-arrow-right"></i></button>
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