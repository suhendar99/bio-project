@extends('Admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform">
                <h3 class="section-title">Tambah Data Operator</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <a href="/operator" class="btn btn-primary col-2">Back</a>
                    <form action="{{ route('tambah.op') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Nama Operator</label>
                            <input id="inputText3" type="text" class="form-control" placeholder="Nama Operator" name="name">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email address</label>
                            <input id="inputEmail" type="email" placeholder="name@example.com" class="form-control" name="email">
                        </div>
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">Password *password default : 123456 </label>
                                <input id="inputText3" type="password" class="form-control" placeholder="password" name="password" value="123456" readonly>
                            </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">NIK</label>
                            <input id="inputText3" type="text" class="form-control" placeholder="NIK" name="nik">
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Instansi</label>
                            <input id="inputText3" type="text" class="form-control" placeholder="Instansi" name="instansi">
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">No Handphone</label>
                            <input id="inputText3" type="text" class="form-control" placeholder="Number Handphone" name="hp">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="customFile">Foto</label>
                            <input type="file" class="form-control" id="customFile" name="foto">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection