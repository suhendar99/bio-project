@extends('Admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform">
                <h3 class="section-title">Tambah Setting Monitor</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <a href="/set_monitoring" class="btn btn-primary col-2">Back</a>
                    <form action="{{ route('tambah.monitor') }}" method="post">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>                                        
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Nama Ruangan</label>
                            <select class="form-control" name="nama">
                            @foreach($ruangan as $i)
                                <option value="{{ $i->id }}">{{ $i->nama }}</option>
                            @endforeach
                        </select>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Parameter</label>
                            <select name="parameter" id="" class="form-control @error('parameter') is-invalid @enderror">
                                <option value="Suhu">Suhu</option>
                                <option value="Kelembapan">Kelembapan</option>
                                <option value="Tekanan">Tekanan</option>
                            </select>
                            @error('parameter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Satuan</label>
                            <select name="satuan" id=""class="form-control @error('satuan') is-invalid @enderror">
                                <option value="C">C</option>
                                <option value="%">%</option>
                                <option value="Pa">Pa</option>
                            </select>
                            <span>* Example(Suhu = C, Kelembapan = %, Tekanan = Pa)</span>
                            @error('satuan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Max</label>
                            <input id="inputText3" type="text" class="form-control @error('max') is-invalid @enderror" name="max" placeholder="Max" value="{{ old('max') }}">
                            @error('max')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if (session()->has('maxmin'))
                            <div class="alert">
                                {{ session()->get('maxmin') }}
                            </div>                                        
                        @endif
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Min</label>
                            <input id="inputText3" type="text" class="form-control @error('min') is-invalid @enderror" placeholder="Min" name="min" value="{{ old('min') }}">
                            @error('min')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>                        
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection