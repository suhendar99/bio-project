@extends('Admin.layouts.app')
@section('content')
<div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Data Satuan</h2>
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
                    <a href="{{ route('satuan.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                     @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>                                        
                    @endif
                    <form action="{{ route('satuan.update', $satuan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <input type="hidden" class="form-control @error('parameter') is-invalid @enderror" value="{{ $satuan->parameter }}" name="parameter">
                        <div class="form-group">
                            <label for="">Satuan</label>
                            <input type="text" class="form-control  @error('satuan') is-invalid @enderror" name="satuan" value="{{ $satuan->satuan }}">
                             @error('satuan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>                                    
                        <div class="form-group">                                        
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-redo"></i> Edit</button>
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