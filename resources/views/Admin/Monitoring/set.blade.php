@extends('Admin.layouts.app')

@section('content')
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Setting Monitoring</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Setting Monitoring</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
             
                <div class="row">
                    <div class="col-xl-12 col-lg-4 col-md-6 col-sm-12 col-12">
                        <!-- ============================================================== -->
                        <!-- flush list  -->
                        <!-- ============================================================== -->
                        <div class="card">
                            <h5 class="card-header"></h5>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Suhu(°C) <br>
                                        Max : <br>
                                        Min :
                                    </li>
                                    <li class="list-group-item">Kelembapan(%) <br>
                                        Max : <br>
                                        Min :
                                    </li>
                                    <li class="list-group-item">Tekanan(Pa) <br>
                                        Max : <br>
                                        Min :
                                    </li>
                                    <a href="#" class="btn btn-primary">Edit Data</a>
                                </ul>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end flush list -->
                            <!-- ============================================================== -->
                        </div>
                    </div>
                </div>
@endsection