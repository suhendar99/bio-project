@extends('Admin.layouts.app')

@section('content')
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Data Satuan</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Satuan</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Parameter</th>
                                                <th>Satuan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<<<<<<< HEAD
                                        <?php $no = 1; ?>
                                        @foreach($data as $s)
                                            <tr>
                                                <td>$no++</td>
                                                <td>{{ $s->Parameter }}</td>
                                                <td>{{ $s->satuan }}</td>
                                            </tr>
                                        @endforeach
=======
                                            @foreach($data as $s)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $s->parameter }}</td>
                                                <td>{{ $s->satuan }}</td>
                                            </tr>
                                            @endforeach
>>>>>>> 7a5bed8a655cdccc7284664be210aed2d6e450c7
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>
                </div>
@endsection