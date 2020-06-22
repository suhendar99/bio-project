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
                <h3 class="section-title">My Profile</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="/updateProfile/{{$data->id}}" enctype="multipart/form-data">
                    @csrf
                    <center>
                            <img src="{{asset('foto/'.$data->icon)}}" alt="placeholder+image" style="width: 200px;">
                    </center>
                    <div class="row">
                        <div class="col-6">
                            Foto
                        </div>
                        <div class="col-6">
                            <input type="file" class="form-control" value="{{$data->foto}}" name="foto">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Nama
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="{{$data->name}}" placeholder="Nama" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            NIK
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="{{$data->nik}}" placeholder="NIK" name="nik">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            No HP
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="{{$data->no_hp}}" placeholder="Nomor HP" name="no_hp">
                        </div>
                    </div>
                    <input type="hidden" value="{{$data->level}}"  name="level">
                    <div class="row">
                        <div class="col-6">
                            Email
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="{{$data->email}}" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <a href="/" class="btn btn-primary" >Back</a>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary" ><i class="fa fa-edit"></i>Simpan</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection