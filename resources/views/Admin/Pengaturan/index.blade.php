@extends('Admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform">
                <h3 class="section-title">Pengaturan MQTT Broker</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>                                        
                    @endif
                    <form action="/set_mqtt_update/{{ $mqtt->id }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">URL Broker</label>
                            <input id="inputText3" type="url" class="form-control @error('broker') is-invalid @enderror" placeholder="URL Broker" name="broker" value="{{ $mqtt->url_broker }}">
                            @error('broker')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Username</label>
                            <input id="inputText3" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Usename" name="username" value="{{ $mqtt->username }}">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Password</label>
                            <input id="inputText3" type="text" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" value="{{ $mqtt->password }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Topic</label>
                            <input id="inputText3" type="text" class="form-control @error('topic') is-invalid @enderror" placeholder="Topic" name="topic" value="{{ $mqtt->topic }}">
                            @error('topic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label">QOS</label>
                            <select name="qos" id="" class="form-control">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Keep Alive</label>
                            <input id="inputText3" type="text" class="form-control @error('alive') is-invalid @enderror" placeholder="Keep Alive" name="alive" value="{{ $mqtt->keep_alive }}">
                            <span>*Satuan Detik </span>
                            @error('alive')
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