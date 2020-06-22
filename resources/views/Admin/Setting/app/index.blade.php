@extends('Admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform">
                <h3 class="section-title">My Profile</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{asset('app/'.$data->id)}}" alt="placeholder+image">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Nama
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" readonly placeholder="{{$data->name}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Email
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" readonly placeholder="{{$data->email}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            NIK
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" readonly placeholder="{{$data->nik}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            No HP
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" readonly placeholder="{{$data->no_hp}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Level
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" readonly placeholder="{{$data->level}}">
                        </div>
                    </div>
                        <a href="/dashboard" class="btn btn-primary" style="margin-right: 370px;">Back</a>
                        <a href="/editProfile/{{$data->id}}" class="btn btn-primary" style="margin-left: 400px;"><i class="fa fa-edit"></i>Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
@endsection