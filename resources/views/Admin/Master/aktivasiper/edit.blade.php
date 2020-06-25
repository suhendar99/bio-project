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
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                    <a href="{{ route('aktivasiper.index') }}" class="btn btn-primary">Back</a>
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
                    <form action="{{ route('aktivasiper.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nomor Seri Perangkat</label>
                            <select class="form-control @error('id_perangkat') is-invalid @enderror" name="id_perangkat">
                                <option value="">Pilih No Seri Perangkat</option>
                                @foreach($perangkat as $p)
                                <option value="{{$p->id}}">{{$p->no_seri}}</option>
                                @endforeach
                            </select>
                            @error('id_perangkat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama Ruangan</label>
                            <select class="form-control @error('id_ruangan') is-invalid @enderror" name="id_ruangan">
                                <option value="">Pilih Ruangan</option>
                                @foreach($ruangan as $r)
                                <option value="{{$r->id}}">{{$r->nama}}</option>
                                @endforeach
                            </select>
                            @error('id_ruangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>                                   
                        <div class="form-group">                                        
                            <button type="submit" class="btn btn-primary">Simpan</button>
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