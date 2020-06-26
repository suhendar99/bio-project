@extends('Admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform">
                <h3 class="section-title">Edit Data Operator</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <a href="/set_kirim_laporan" class="btn btn-primary col-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>                                        
                    @endif
                    <form action="/aksi_edit/{{ $setkirim->id }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                            <label for="inputEmail">Email Operator</label>
                            <select class="form-control" name="email">
                                @foreach($operator as $i)
                                    <option value="{{ $i->id }}" <?php if($i->email == $setkirim->operator->email){ echo "selected"; }  ?> >{{ $i->email }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Type Pengiriman</label>
                            <select name="status" id="" class="form-control" >
                                <option value="Email" <?php if($setkirim->status_kirim == 'Email'){ echo "selected"; }  ?>>Email</option>
                                
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Waktu Pengiriman</label>
                            <select name="waktu" id="" class="form-control">
                                <option value="daily"<?php if($setkirim->waktu_kirim == 'daily'){ echo "selected"; }  ?>>Daily</option>
                                <option value="weekly"<?php if($setkirim->waktu_kirim == 'weekly'){ echo "selected"; }  ?>>Weekly</option>
                                <option value="mounthly"<?php if($setkirim->waktu_kirim == 'mountly'){ echo "selected"; }  ?>>Mounthly</option>
                            </select>
                            @error('waktu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection