@extends('Admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Data Operator</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Operator</li>
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
                                <th>Photo</th>
                                <th>Name</th>
                                <th>NIK</th>
                                <th>Instansi</th>
                                <th>No Handphone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach($data as $o)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                    <a class="thumbnail" href="#">
                                    <img class="img-thumbnail" src="{{ asset('foto/'.$o->foto) }}">
                                    </a>
                                </div>
                                </td>
                                <td>{{ $o->name }}</td>
                                <td>{{ $o->nik }}</td>
                                <td>{{ $o->instansi }}</td>
                                <td>{{ $o->no_hp }}</td>
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
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script type="text/javascript">

var options = {
  chart: {
    height: 280,
    type: "radialBar",
  },
  series: [67],
  colors: ["#20E647"],
  plotOptions: {
    radialBar: {
      startAngle: -90,
      endAngle: 90,
      track: {
        background: '#333',
        startAngle: -90,
        endAngle: 90,
      },
      dataLabels: {
        name: {
          show: false,
        },
        value: {
          fontSize: "30px",
          show: true
        }
      }
    }
  },
  fill: {
    type: "gradient",
    gradient: {
      shade: "dark",
      type: "horizontal",
      gradientToColors: ["#87D4F9"],
      stops: [0, 100]
    }
  },
  stroke: {
    lineCap: "butt"
  },
  labels: ["Progress"]
};

new ApexCharts(document.querySelector("#gaugeChart"), options).render();

</script>
@endsection