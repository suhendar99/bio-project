@extends('Admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform">
                <h3 class="section-title">Tambah Data Perangkat</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <a href="/dataper" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <form action="{{ route('tambah.per') }}" method="post">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">No Seri</label>
                            <input id="inputText3" type="text" class="form-control @error('no_seri') is-invalid @enderror" placeholder="No Seri Perangkat" name="no_seri" value="{{ old('no_seri') }}">
                            @error('no_seri')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Kode Perangkat</label>
                            <input id="inputText3" type="text" class="form-control @error('kode') is-invalid @enderror" placeholder="kode Perangkat" name="kode" value="{{ old('kode') }}">
                            @error('kode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Latitude</label>
                            <input id="inputText3" type="text" placeholder="Example 78.9879" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{ old('latitude') }}">
                            @error('latitude')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Longitude</label>
                            <input id="inputText3" type="text" class="form-control @error('longitude') is-invalid @enderror" placeholder="Example -78.958" name="longitude" value="{{ old('longitude') }}">
                            @error('longitude')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Tanggal Aktivasi</label>
                            <input id="inputText3" type="date" class="form-control @error('aktivasi') is-invalid @enderror" placeholder="Tanggal Aktivasi Alat" name="aktivasi" value="{{ old('aktivasi') }}">
                            @error('instansi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="aktif">Aktif</option>
                                <option value="off">Non Aktif</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah <i class="fas fa-arrow-right"></i> </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
