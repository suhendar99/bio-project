@php
    $monitoring = \App\Monitoring::whereDate('date',now())->orderBy('time','desc')->limit(10)->orderBy('time','asc')->get();
@endphp
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
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="inputText3" class="col-form-label">Ruangan</label>
                                                        <select name="ruang" id="" class="form-control">
                                                            <option value="all">Semua ruangan</option>
                                                            @foreach($ruang as $f)
                                                                <option value="{{ $f->id }}">{{ $f->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="inputText3" class="col-form-label">Parameter</label>
                                                        <select name="satuan" id="" class="form-control">
                                                            <option value="allper">Semua parameter</option>
                                                            
                                                            <option value="suhu">Suhu</option>}
                                                            <option value="kelembapan">Kelembapan</option>}
                                                            <option value="tekanan">Tekanan</option>}
                                                            option
                                                        </select>
                                                        @error('status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-6">
                                            <button class="btn btn-primary" type="submit">Cetak Laporan</button>
                                            </div>
                                                <div class="col-6">
                                <div class="btn btn-primary" style="text-align: right;" id="myBtn">Show Chart</div>
                            </div>
                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end select options  -->
                        <!-- ============================================================== -->


<script>
  window.Promise ||
    document.write(
      '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
    )
  window.Promise ||
    document.write(
      '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
    )
  window.Promise ||
    document.write(
      '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
    )
</script>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!-- ============================================================== -->
<!-- pageheader  -->
<!-- ============================================================== -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div id="chart"></div>
        </div>
    </div>
</div>



<script>
    

    let monitoring = '@json($monitoring)'
            
              
    var suhu = []
    var kelembapan = []
    var tekanan = []
  
    let dates = 0
    let formatted_date = "";
    let newMonitor = JSON.parse(monitoring).sort((a,b)=>{
      return a.time.localeCompare(b.time);
    });
    console.log(newMonitor);
    let monitor = newMonitor
    monitor.forEach(element => {
        dates = new Date(element.date+' '+element.time)
        suhu.push({
          x: element.time,
          y: element.suhu
        })
        tekanan.push({
          x: element.time,
          y: element.tekanan
        })
        kelembapan.push({
          x: element.time,
          y: element.kelembapan
        })
        
    });

     console.log(suhu);
        
        var options = {
          
          series: [
            {
                data: suhu,
                name: "Suhu"
            },
            {
                data: tekanan,
                name: "Tekanan"
            },
            {
                data: kelembapan,
                name: "Kelembapan"
            }
        ],
          chart: {
          id: 'realtime',
          height: 350,
          type: 'line',
          animations: {
            enabled: true,
            easing: 'linear',
            dynamicAnimation: {
              speed: 1000
            }
          },
          toolbar: {
            show: false
          },
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: true
        },
        stroke: {
          curve: 'smooth'
        },
        title: {
          text: 'Monitoring',
          align: 'left'
        },
        markers: {
          size: 0
        },
        xaxis: {
        },
        yaxis: {
          max: 200
        },
        legend: {
          show: true
        },
        };

        

        //////////////

    document.getElementById("myBtn").onclick = function() {render()};
    function render() {
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url:'api/getData',
          method:'GET',
          data:{
            startDate:$('#awal').val(),
            endDate:$('#akhir').val(),
          },
          dataType:'JSON',
          success:function(response){
            console.log(response);
          },
          error : function(e) {
            console.log(e)
          }
        });

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    }
    
    // $(document).ready(function () {  
    //     $('#dataTable').DataTable({  
    //         "ajax": {  
    //             "url": "/api/getBetween",  
    //             "type": "GET",  
    //             "datatype": "json"  
    //         },  
    //         "columns": [  
    //             { "data": "Name" },  
    //             { "data": "Position" },  
    //             { "data": "Office" },  
    //             { "data": "Age" },  
    //             { "data": "Salary" }  
    //         ]  
    //     });  
    // });
  
</script>

<!-- ============================================================== -->
<!-- end select options  -->
<!-- ============================================================== -->
@endsection

