@extends('Admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Raw Data Monitoring</h2>
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
                    <table class="table table-striped table-bordered" id="monitorTable" >
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Perangkat</th>
                                <th>Ruangan</th>
                                <th>Suhu</th>
                                <th>Tekanan</th>
                                <th>Kelembapan</th>
                                <th>Alarm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{ $d->date}}</td>
                                <td>{{ $d->time}}</td>
                                <td>{{ $d->perangkat_id}}</td>
                                <td>{{ $d->ruangan_id}}</td>
                                <td>{{ $d->suhu }}</td>
                                <td>{{ $d->tekanan }}</td>
                                <td>{{ $d->kelembapan }}</td>
                                <td>{{ $d->alarm}}</td>
                            </tr>
                            @endforeach
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
@endsection