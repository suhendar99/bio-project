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
                    <form action="/edit_monitor/{{ $satuan->id }}" method="post">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>                                        
                        @endif
                        @csrf
                        {{ method_field('PUT') }}
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
                            <input type="text" name="parameter" id="" class="form-control @error('parameter') is-invalid @enderror" value="{{ $satuan->parameter }}" readonly>
                            @error('parameter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Satuan</label>
                            <input type="text"value="{{ $satuan->satuan }}" name="satuan" id=""class="form-control @error('satuan') is-invalid @enderror" readonly>
                            <span>* Example(Suhu = C, Kelembapan = %, Tekanan = Pa)</span>
                            @error('satuan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Max</label>
                            <input id="inputText3" type="text" class="form-control @error('max') is-invalid @enderror" name="max" placeholder="Max" value="{{ $satuan->max }}">
                            @error('max')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Min</label>
                            <input id="inputText3" type="text" class="form-control @error('min') is-invalid @enderror" placeholder="Min" name="min" value="{{ $satuan->min }}">
                            @error('min')
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