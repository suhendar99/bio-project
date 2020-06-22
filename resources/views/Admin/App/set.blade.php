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
                                    <img src="{{asset('foto/app/'.$data->icon)}}" alt="placeholder+image" style="align-items: center; width: 250px;">
                            </center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Nama
                        </div>
                        <div class="col-6">
                            <input type="text" name="nama_apps" class="form-control @error('nama_apps') is-invalid @enderror" required  placeholder="Nama Aplikasi" value="{{$data->nama_apps}}">
                        </div>
                        @error('nama_apps')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Overview
                        </div>
                        <div class="col-6">
                            <textarea name="overview" class="form-control @error('overview') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" value="{{$data->overview}}" required placeholder="Overview Aplikasi">
                                
                            </textarea>
                        </div>
                        @error('oveview')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Icon Aplikasi
                        </div>
                        <div class="col-6">
                            <input type="file" class="form-control @error('icon') is-invalid @enderror" required name="icon" value="{{$data->icon}}">
                        </div>
                        @error('icon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                        <a href="/" class="btn btn-primary" style="margin-right: 370px;">Back</a>
                        <button type="submit" class="btn btn-primary" style="margin-left: 420px;"><i class="fa fa-edit"></i>Edit Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection