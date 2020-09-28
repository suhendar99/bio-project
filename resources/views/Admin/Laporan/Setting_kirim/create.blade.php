@extends('Admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-block" id="basicform">
                <h3 class="section-title">Tambah Pengaturan Kirim Laporan</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <a href="/set_kirim_laporan" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <form action="{{ route('aksi.add') }}" method="post" enctype="multipart/form-data">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                        @csrf
                        <div class="form-group">
                            <label for="inputEmail">Email Tujuan</label>
                            <select class="form-control @error('email') is-invalid @enderror" name="email">
                                @foreach($operator as $i)
                                    <option value="{{ $i->id }}">{{ $i->email }}</option>
                                @endforeach
                            </select>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">frekuensi Pengiriman</label>
                            <select name="status" id="" class="form-control">
                                <option value="daily">Daily</option>
                                {{-- <option value="weekly">Weekly</option> --}}
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah <i class="fas fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
