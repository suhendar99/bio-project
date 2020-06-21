@extends('Admin.layouts.app')
@section('content')
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Data Ruang</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item" aria-current="page">Data Ruang</li>
                                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                                    </ol>
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
                                <a href="{{ route('data_ruang.index') }}" class="btn btn-primary">Back</a>
                                 @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>                                        
                                @endif
                                <form action="{{ route('data_ruang.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Nama ruangan</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('nama') }}" required  name="nama">

                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Foto ruangan</label>
                                        <input type="file" class="form-control  @error('foto') is-invalid @enderror"  required  name="foto">

                                         @error('foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                                    
                                    <div class="form-group">                                        
                                        <button type="submit" class="btn btn-success">Simpan</button>
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