@extends('Admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform">
                <h3 class="section-title">Tambah Data Operator</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Nama Operator</label>
                            <input id="inputText3" type="text" class="form-control" placeholder="Nama Operator" name="name">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email address</label>
                            <input id="inputEmail" type="email" placeholder="name@example.com" class="form-control" name="email">
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
                            <label for="inputText3" class="col-form-label">Jabatan</label>
                            <input id="inputText3" type="text" class="form-control" placeholder="Jabatan" name="jabatan">
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">No Handphone</label>
                            <input id="inputText3" type="text" class="form-control" placeholder="Number Handphone" name="hp">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="customFile">Foto</label>
                            <input type="file" class="form-control" id="customFile">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection