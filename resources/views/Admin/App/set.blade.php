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
                <h3 class="section-title">Pengaturan Aplikasi</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="/updateApp/{{$data->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-12">
                            <center>
                        @if($data->icon == "")
                            <i class="fa fa-user fa-7x" style="margin-bottom: 20px;"></i>
                        @else
                            <img src="{{asset('foto/app/'.$data->icon)}}" alt="placeholder+image" style="width: 200px;">
                        @endif
                            </center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Nama Aplikasi
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" name="nama_apps" class="form-control @error('nama_apps') is-invalid @enderror"  placeholder="Nama Aplikasi" value="{{$data->nama_apps}}">
                                @error('nama_apps')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Tab Browser
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" name="tab" class="form-control @error('tab') is-invalid @enderror"  placeholder="Nama Tab Aplikasi" value="{{$data->tab}}">
                                @error('tab')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Deskripsi Aplikasi
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <textarea name="overview" class="form-control @error('overview') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" placeholder="Overview Aplikasi">{{$data->overview}}</textarea>
                                @error('oveview')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Icon Aplikasi
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="file" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{$data->icon}}">
                                @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span>*Icon Aplikasi(jpeg,jpg,png,maksimal 1 mb)</span>
                            </div>
                        </div>
                    </div>
                        <a href="/" class="btn btn-primary float-left">Back</a>
                        <button type="submit" class="btn btn-primary float-right"><i class="fa fa-edit"></i>Edit Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection