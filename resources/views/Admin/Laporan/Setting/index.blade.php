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
                    <div class="row">
                        <div class="col-4">
                            <h3>Preview Setting laporan</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Icon laporan
                        </div>
                        <div class="col-6">
                            @if($data->icon == "")
                                <i class="fa fa-picture-o" style="margin-bottom: 20px;"></i>
                            @else
                                <img src="{{asset($data->icon)}}" alt="placeholder+image" style="width:50%">
                            @endif
                        </div>
                    </div>
                    <form action="/updateSetlaporan/{{$data->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                Icon Laporan
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror">
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
                                Header Laporan
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" name="header_img" class="form-control @error('header_img') is-invalid @enderror"  placeholder="Header laporan" value="{{$data->header_img}}"  required>
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
                                Footer Laporan
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" name="footer" class="form-control @error('footer') is-invalid @enderror" placeholder="Footer" value="{{$data->footer}}" required>
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