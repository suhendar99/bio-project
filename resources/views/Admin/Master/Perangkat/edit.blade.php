@extends('Admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform">
                <h3 class="section-title">Edit Data Perangkat</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <a href="/dataper" class="btn btn-primary col-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>                                        
                    @endif
                    <form action="/per_edit/{{ $perangkat->id }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">No Seri</label>
                            <input id="inputText3" type="text" class="form-control @error('seri') is-invalid @enderror" placeholder="No Seri Perangkat" name="seri" value="{{ $perangkat->no_seri }}">
                            @error('seri')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Latitude</label>
                            <input id="inputText3" type="text" class="form-control @error('latitude') is-invalid @enderror" placeholder="Latitude" name="latitude" value="{{ $perangkat->latitude }}">
                            @error('latitude')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Longitude</label>
                            <input id="inputText3" type="text" class="form-control @error('longitude') is-invalid @enderror" placeholder="longitude" name="longitude"value="{{ $perangkat->longitude }}">
                            @error('longitude')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Tanggal Aktivasi</label>
                            <input id="inputText3" type="date" class="form-control @error('aktivasi') is-invalid @enderror" placeholder="Tanggal Aktivasi" name="aktivasi"value="{{ $perangkat->tgl_aktivasi }}">
                            @error('instansi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Status</label>
                            <select name="status" id="" class="form-control" value="{{ $perangkat->status }}">
                                <option value="aktif">Aktif</option>
                                <option value="off">Non Aktif</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-redo"></i> Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection