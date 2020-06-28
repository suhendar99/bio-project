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
                <h3 class="section-title">Ganti Password</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="/updatePassword/{{$data->id}}" enctype="multipart/form-data">
                    @csrf
                    <center>
                        @if($data->foto == "")
                            <i class="fa fa-user fa-7x" style="margin-bottom: 20px;"></i>
                        @else
                            <img src="{{asset('foto/'.$data->foto)}}" alt="placeholder+image" style="width: 200px;">
                        @endif
                            
                    </center>
                    <input type="hidden" name="name" value="{{$data->name}}">
                    <input type="hidden" name="nik" value="{{$data->nik}}">
                    <input type="hidden" name="no_hp" value="{{$data->no_hp}}">
                    <input type="hidden" name="email" value="{{$data->email}}">
                    <input type="hidden" name="foto" value="{{$data->foto}}">
                    <div class="row">
                        <div class="col-6">
                            New Password
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"  required name="password" placeholder="Password Baru">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Password Confirmation
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" required  name="password_confirmation" placeholder="Konfirmasi Password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-10">
                            <a href="/" class="btn btn-primary float-left" >Back</a>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary float-right"><i class="fa fa-edit"></i>Simpan</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection