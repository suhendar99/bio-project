@extends('Admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>                                        
            @endif
            <div class="section-block" id="basicform">
                <h3 class="section-title">Pengaturan Laporan</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="/storeSetlaporan" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-6">
                            Header Laporan
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="file" name="header_img" class="form-control @error('header_img') is-invalid @enderror">
                                @error('header_img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Icon Laporan
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror" >
                                @error('icon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Footer Laporan
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="file" name="footer" class="form-control @error('footer') is-invalid @enderror">
                                @error('footer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                        <a href="/" class="btn btn-primary" style="margin-right: 370px;">Back</a>
                        <button type="submit" class="btn btn-primary" style="margin-left: 420px;"><i class="fa fa-edit"></i>Edit Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection