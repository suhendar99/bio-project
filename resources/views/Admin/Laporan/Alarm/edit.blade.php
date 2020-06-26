@extends('Admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform">
                <h3 class="section-title">Edit Pengaturan Pengiriman Alarm</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <a href="/set_kirim_laporan" class="btn btn-primary col-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>                                        
                    @endif
                    <form action="/aksi_edit_alarm/{{ $kirimalarm->id }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                            <label for="inputEmail">Email Tujuan</label>
                            <select class="form-control" name="email">
                                @foreach($operator as $i)
                                    <option value="{{ $i->id }}" <?php if($i->email == $kirimalarm->operator->email){ echo "selected"; }  ?> >{{ $i->email }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Frekuensi Pengiriman</label>
                            <textarea name="custom" id="" cols="30" rows="10" class="form-control @error('custom') is-invalid @enderror">{{ $kirimalarm->custom_teks }}</textarea>
                            @error('custom')
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