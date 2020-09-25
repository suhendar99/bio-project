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
                    <table class="table table-striped table-bordered" id="monitoring" >
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Perangkat</th>
                                <th>Ruangan</th>
                                <th>Suhu</th>
                                <th>Kelembapan</th>
                                <th>Tekanan</th>
                                <th>CVC</th>
                                <th>VVC</th>
                            </tr>
                        </thead>
                        <tbody>

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
@push('script')
 <script>
    $.get("{{ route('monitoring.data') }}", function(data){
        data_monitoring=data;
        console.log(data_monitoring);

        rew();
    });
 </script>
@endpush
