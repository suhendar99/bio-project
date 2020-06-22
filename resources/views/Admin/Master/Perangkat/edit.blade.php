@extends('Admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform">
                <h3 class="section-title">Edit Data Perangkat</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <a href="/dataper" class="btn btn-primary col-1">Back</a>
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
                            <input id="inputText3" type="text" class="form-control" placeholder="No Seri Perangkat" name="seri" value="{{ $perangkat->no_seri }}">
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Latitude</label>
                            <input id="inputText3" type="text" class="form-control" placeholder="Latitude" name="latitude" value="{{ $perangkat->latitude }}">
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Longitude</label>
                            <input id="inputText3" type="text" class="form-control" placeholder="longitude" name="longitude"value="{{ $perangkat->longitude }}">
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Tanggal Aktivasi</label>
                            <input id="inputText3" type="date" class="form-control" placeholder="Tanggal Aktivasi" name="aktivasi"value="{{ $perangkat->tgl_aktivasi }}">
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Status</label>
                            <input id="inputText3" type="text" class="form-control" placeholder="Status" name="status"value="{{ $perangkat->status }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection