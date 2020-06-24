@extends('Admin.layouts.app')

@section('content')
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header">
                                    <h2 class="pageheader-title">Cetak Laporan</h2>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Cetak Laporan</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- select options  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="/downloadLaporan" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="input-select">Tanggal Awal</label>
                                                        <input type="date" name="awal" class="form-control  @error('awal') is-invalid @enderror">
                                                        @error('awal')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="input-select">Tanggal Akhir</label>
                                                        <input type="date" name="akhir" class="form-control @error('akhir') is-invalid @enderror">
                                                        @error('akhir')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Create PDF</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end select options  -->
                        <!-- ============================================================== -->
@endsection