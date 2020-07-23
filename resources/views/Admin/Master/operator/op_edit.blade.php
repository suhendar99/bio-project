@extends('Admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform">
                <h3 class="section-title">Edit Data Operator</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <a href="/operator" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    @if (session()->has('success'))
                    <div class="form-group">
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>              
                    </div>                          
                    @endif
                    <form action="/op_edit/{{ $operator->id }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Nama Operator</label>
                            <input id="inputText3" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Operator" name="nama" value="{{ $operator->name }}">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">E-mail</label>
                            <input id="inputEmail" type="email" placeholder="name@example.com" class="form-control @error('email') is-invalid @enderror" name="email"value="{{ $operator->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">Password *password default : 123456</label>
                                <input id="inputText3" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" name="password"value="123456" readonly>
                            </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">NIK</label>
                            <input id="inputText3" type="text" class="form-control @error('nik') is-invalid @enderror" placeholder="NIK" name="nik"value="{{ $operator->nik }}">
                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">No Handphone</label>
                            <input id="inputText3" type="text" class="form-control @error('hp') is-invalid @enderror" placeholder="Number Handphone" name="hp"value="{{ $operator->no_hp }}">
                            @error('hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="customFile">Foto</label>
                            <input type="file" class="form-control" value="{{ $operator->foto }}" id="customFile" name="foto">
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary"> Edit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection