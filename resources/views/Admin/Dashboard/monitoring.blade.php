@php
    $mqtt = \App\Mqtt::where('id',1)->first();
    $app = \App\Setapp::where('id',1)->first();

    $suhu = \App\Satuan::where('parameter','suhu' )->first();
    $kelembapan = \App\Satuan::where('parameter','kelembapan')->first();
    $tekanan = \App\Satuan::where('parameter','tekanan')->first();
    $ruangan = App\Ruangan::where('id', $id)->first();
    $monitoring = \App\Monitoring::where('ruangan_id', $id)->orderBy('created_at','desc')->limit(10)->orderBy('created_at','asc')->get();
    // dd($monitoring);
    $gauge = \App\Monitoring::where('ruangan_id', $id)->orderBy('created_at','desc')->first();
@endphp

<?php
        $topic = $mqtt->topic;
        $username = $mqtt->username;
        $password = $mqtt->password;
        $url_broker = $mqtt->url_broker;
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="{{ asset('foto/app/'.$app->icon) }}">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/vendor/fonts/circular-std/style.css" rel="stylesheet') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/charts/chartist-bundle/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/charts/morris-bundle/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/charts/c3charts/c3.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    <title>{{ $app->nama_apps }}</title>
    <link href="{{ asset('apex/assets/samples/styles.css') }}" rel="stylesheet" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<style>

    #chart {
      max-width: 1500px;
      margin: 35px auto;
    }

    .card {
        padding: 2rem;
    }

</style>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</head>

<body class="bg-dark">

    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-dark text-white fixed-top">
            <div class="container">
                <a class="btn btn-danger rounded" href="{{ route('dashboard') }}"><i class="fas fa-arrow-left"></i> Back</a>
                <div class="container">
                    <center>
                        <h3 class="text-white">{{ $ruangan->nama }}</h3>
                    </center>
                </div>
                <div class="btn btn-default rounded ml-auto">
                    <i class="fas fa-clock"></i><div id="waktu"></div>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row" style="margin-top:100px;">
            <div class="col-xl-4">
                <div class="card bg-dark">
                <div class="card-body bg-dark text-white rounded">
                    <div class="row">
                        <div class="col-md-6">
                            <center>
                                <!-- <img src="{{ asset('svg/suhu.svg') }}" alt="" height="100px" width="100px" style="margin-bottom:20px;"> -->
                                <div id="chart_div"></div>
                            </center>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <center>Max</center>
                                    <div class="card bg-danger">
                                        <center>{{$room->smax}} C</center>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <center>Min</center>
                                    <div class="card bg-primary">
                                        <center>{{$room->smin}} C</center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-dark text-white">
                    <div class="row">
                        <div class="col-6 border-right">
                           <center>Suhu</center>
                        </div>
                        <div class="col-6">
                            <center>
                                Set Point
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card bg-dark">
                <div class="card-body bg-dark text-white rounded">
                    <div class="row">
                        <div class="col-md-6">
                            <center>
                                <!-- <img src="{{ asset('svg/kelembaban.svg') }}" alt="" height="100px" width="100px" style="margin-bottom:20px;"> -->
                                <div id="chart_div2" style="width: 100%;"></div>
                            </center>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <center>Max</center>
                                    <div class="card bg-danger">
                                        <center>{{$room->kmax}} %</center>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <center>Min</center>
                                    <div class="card bg-primary">
                                        <center>{{$room->kmin}} %</center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-dark text-white">
                    <div class="row">
                        <div class="col-6 border-right">
                           <center>Kelembapan</center>
                        </div>
                        <div class="col-6">
                            <center>
                                Set Point
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card bg-dark">
                <div class="card-body bg-dark text-white rounded">
                    <div class="row">
                        <div class="col-md-6">
                            <center>
                                <!-- <img src="{{ asset('svg/tekanan.svg') }}" alt="" height="100px" width="100px" style="margin-bottom:20px;"> -->
                                <div id="chart_div3" style="width: 100%;"></div>
                            </center>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <center>Max</center>
                                    <div class="card bg-danger">
                                        <center>{{$room->tmax}} Pa</center>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <center>Min</center>
                                    <div class="card bg-primary">
                                        <center>{{$room->tmin}} Pa</center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-dark text-white">
                    <div class="row">
                        <div class="col-6 border-right">
                           <center>Tekanan</center>
                        </div>
                        <div class="col-6">
                            <center>
                                Set Point
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <!-- <div class="col-6">
                <h4 class="text-white">Dari Tanggal </h4>
                    <select name="" id="" class="form-control bg-dark text-white">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                    </select>
            </div>
            <div class="col-6">
                <h4 class="text-white">Sampai Tanggal </h4>
                    <select name="" id="" class="form-control bg-dark text-white">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                    </select>
            </div>
        </div> -->
    <!--  -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="chartSuhu" style="width: 100%"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="chartTekanan" style="width: 100%"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="chartKelembapan" style="width: 100%"></div>
        </div>
    </div>

</div>

    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- jquery 3.3.1 -->
    <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/libs/js/main-js.js') }}"></script>
    <!-- chart chartist js -->
    <!-- <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script> -->
    <!-- sparkline js -->
    <script src="{{ asset('assets/vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
    <!-- morris js -->
    <!-- <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script> -->
    <!-- chart c3 js -->
    <script src="{{ asset('assets/vendor/charts/c3charts/c3.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/charts/c3charts/C3chartjs.js') }}"></script>
	<!-- <script src="assets/libs/js/dashboard-ecommerce.js"></script> -->

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        // console.log(`ID : {{$id}}`);
        function showTime() {
		    var a_p = "";
		    var today = new Date();
		    var jam = today.getHours();
		    var menit = today.getMinutes();
		    var detik = today.getSeconds();
		    if (jam < 12) {
		        a_p = "AM";
		    } else {
		        a_p = "PM";
		    }
		    if (jam == 0) {
		        jam = 12;
		    }
		    if (jam > 12) {
		        jam = jam - 12;
		    }
		    jam = checkTime(jam);
		    menit = checkTime(menit);
		    detik = checkTime(detik);
		 document.getElementById('waktu').innerHTML=jam + ":" + menit + ":" + detik + " " + a_p;
		    }

		function checkTime(i) {
		    if (i < 10) {
		        i = "0" + i;
		    }
		    return i;
		}
		setInterval(showTime, 500);

    </script>
    <style>

        #chart {
      max-width: 100%;
      margin: 35px auto;
    }

    </style>

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


    <script>
        // console.log(`ID : {{$id}}`);
        let monitoring = '@json($monitoring)'
        let suhuMaxs = '{{ $room->smax }}'
        let suhuMins = '{{ $room->smin }}'
        let kelembapanMaxs = '{{ $room->kmax }}'
        let kelembapanMins = '{{ $room->kmin }}'
        let tekananMaxs = '{{ $room->tmax }}'
        let tekananMins = '{{ $room->tmin }}'
          console.log(monitoring)
        var suhu = []
        var suhuMax = []
        var suhuMin = []
        var kelembapan = []
        var kelembapanMax = []
        var kelembapanMin = []
        var tekanan = []
        var tekananMax = []
        var tekananMin = []

        let dates = 0
        const months = ["Jan", "Feb", "Mar","Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
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
            suhuMax.push({
              x: element.time,
              y: suhuMaxs
            })
            suhuMin.push({
              x: element.time,
              y: suhuMins
            })
            kelembapan.push({
              x: element.time,
              y: element.kelembapan
            })
            kelembapanMax.push({
              x: element.time,
              y: kelembapanMaxs
            })
            kelembapanMin.push({
              x: element.time,
              y: kelembapanMins
            })
            tekanan.push({
              x: element.time,
              y: element.tekanan
            })
             tekananMax.push({
              x: element.time,
              y: tekananMaxs
            })
            tekananMin.push({
              x: element.time,
              y: tekananMins
            })

        });
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var sgauge = {{$gauge->suhu}};
        var kgauge = {{$gauge->kelembapan}};
        var tgauge = {{$gauge->tekanan}};
        console.log(sgauge,kgauge,tgauge);
        var data1 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['', sgauge],
        ]);

        var options1 = {
          width: 400, height: 120,
          redFrom: 70, redTo: 100,
          yellowFrom: 40, yellowTo: 70,
          greenFrom: 0, greenTo: 40,
          minorTicks: 5,
          animation:{
                duration: 1000,
                easing: 'out',
            },
        };

        var data2 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['', kgauge],
        ]);

        var options2 = {
          width: 400, height: 120,
          redFrom: 70, redTo: 100,
          yellowFrom: 40, yellowTo: 70,
          greenFrom: 0, greenTo: 40,
          minorTicks: 5,
          animation:{
                duration: 1000,
                easing: 'out',
            },
        };

        var data3 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['', tgauge],
        ]);

        var options3 = {
          width: 400, height: 120,
          redFrom: 70, redTo: 100,
          yellowFrom: 40, yellowTo: 70,
          greenFrom: 0, greenTo: 40,
          minorTicks: 5,
          animation:{
            duration: 1000,
            easing: 'out',
          },
        };

        var chart1 = new google.visualization.Gauge(document.getElementById('chart_div'));
        var chart2 = new google.visualization.Gauge(document.getElementById('chart_div2'));
        var chart3 = new google.visualization.Gauge(document.getElementById('chart_div3'));
        chart1.draw(data1, options1);
        chart2.draw(data2, options2);
        chart3.draw(data3, options3);

        {{-- setInterval(function() {
          data1.setValue(0, 1, 40 + Math.round(60 * Math.random()));
          chart1.draw(data1, options1);
        }, 3000); --}}
      }
    </script>
    <script type="text/javascript">
         console.log(suhu);

        var optionsSuhu = {

          series: [
            {
              data  : suhuMax,
              name: "Suhu Max"
            },
            {
                data: suhu,
                name: "Suhu"
            },
            {
              data  : suhuMin,
              name: "Suhu Min"
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
            text: 'Monitoring Suhu',
            align: 'left'
          },
          markers: {
            size: 0
          },
          xaxis: {
          },
          yaxis: {
            max: parseInt(suhuMaxs) + 30,
            min: parseInt(suhuMins) - 30,
          },
          legend: {
            show: true
          },
        colors: ['#ff0000', '#26a0fc' ,'#546E7A']
        };

        var chartSuhu = new ApexCharts(document.querySelector("#chartSuhu"), optionsSuhu);
        chartSuhu.render();

        var optionsKelembapan = {

          series: [
            {
              data  : kelembapanMax,
              name: "Kelembapan Max"
            },
            {
                data: kelembapan,
                name: "Kelembapan"
            },
            {
              data  : kelembapanMin,
              name: "Kelembapan Min"
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
            text: 'Monitoring Kelembapan',
            align: 'left'
          },
          markers: {
            size: 0
          },
          xaxis: {
          },
          yaxis: {
            max: parseInt(kelembapanMaxs) + 30,
            min: parseInt(kelembapanMins) - 30,
          },
          legend: {
            show: true
          },
          colors: ['#ff0000', '#26a0fc' ,'#546E7A']
        };

        var chartKelembapan = new ApexCharts(document.querySelector("#chartKelembapan"), optionsKelembapan);
        chartKelembapan.render();

        var optionsTekanan = {

          series: [
             {
              data  : tekananMax,
              name: "Tekanan Max"
            },
            {
                data: tekanan,
                name: "Tekanan"
            },
            {
              data  : tekananMin,
              name: "Tekanan Min"
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
            text: 'Monitoring Tekanan',
            align: 'left'
          },
          markers: {
            size: 0
          },
          xaxis: {
          },
          yaxis: {
            max: parseInt(tekananMaxs) + 30,
            min: parseInt(tekananMins) - 30,
          },
          legend: {
            show: true
          },
          colors: ['#ff0000', '#26a0fc' ,'#546E7A']
        };

        var chartTekanan = new ApexCharts(document.querySelector("#chartTekanan"), optionsTekanan);
        chartTekanan.render();


    //     window.setInterval(function () {
    //     getNewSeries(lastDate, {
    //       min: 10,
    //       max: 90
    //     })

    //     chart.updateSeries([{
    //       data: data
    //     }])
    //   }, 1000)
      let lalstsuhu = suhu
      let lastekanan = tekanan
      let lastkelembapan = kelembapan

      $('#suhu').on('change', function(e) {
          if (this.checked) {
              suhu = lastsuhu
            }else{
                lastsuhu = suhu
                suhu = []
            }
            console.log(lastsuhu);

         chart.updateSeries([
            {
                data: suhu
            },
            {
                data: tekanan
            },
            {
                data: kelembapan
            }
        ])
    })

      $('#tekanan').on('change', function(e) {
        if (this.checked) {
            tekanan = lastekanan
        }else{
            lastekanan = tekanan
            tekanan = []
        }

         chart.updateSeries([
            {
                data: suhu
            },
            {
                data: tekanan
            },
            {
                data: kelembapan
            }
        ])
    })

      $('#kelembapan').on('change', function(e) {
        if (this.checked) {
            kelembapan = lastkelembapan
        }else{
            lastkelembapan = kelembapan
            kelembapan = []
        }



         chart.updateSeries([
            {
                data: suhu
            },
            {
                data: tekanan
            },
            {
                data: kelembapan
            }
        ])
    })
      //area ini untuk topic yang ada di broker mqtt
      function onConnect()
      {
        // Fetch the MQTT topic from the form
        console.log('koneksi_berhasil');
        client.subscribe('{{ $topic }}');
      }

      function onFailure()
      {
          console.log('KONEKSI_GAGAL!!!!!')
      }

      function onConnectionLost(responseObject) {
          console.log(responseObject)
      }

      function onMessageArrived(message) {

         var data = JSON.parse(message.payloadString);
        console.log(data);
        console.log("MQTT Triggered");
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url:'/api/checkSeri',
          method:'GET',
          data:{
            id_ruangan : `{{$id}}`,
            no_seri : `Dc234Zz`,
          },
          dataType:'JSON',
          success:function(response){
            console.log("Pemanggilan Berhasil");
            console.log(response.chart);
            if (response.status == 1) {
                var today = new Date();
                var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                var time = today.getHours()+":"+today.getMinutes()+":"+today.getSeconds();
                
                if (suhu.length > 9) {
                    suhu.splice(0,1)
                    tekanan.splice(0,1)
                    kelembapan.splice(0,1)        
                }

                
                // lastsuhu.splice(0,1)

                if (response.chart.ruangan_id == {{$id}}) {
                suhu.push({
                  x: time,
                  y: response.chart.suhu
                })
                tekanan.push({
                  x: time,
                  y: response.chart.tekanan
                })
                kelembapan.push({
                  x: time,
                  y: response.chart.kelembapan
                })
                console.log(suhu);
                chartSuhu.updateSeries([
                    {
                        data: suhuMax
                    },
                    {
                        data: suhu
                    },
                    {
                        data: suhuMin
                    },
                ])

                chartKelembapan.updateSeries([
                    {
                        data: kelembapanMax
                    },
                    {
                        data: kelembapan
                    },
                    {
                        data: kelembapanMin
                    },
                ])

                chartTekanan.updateSeries([           
                    {
                        data: tekananMax
                    },
                    {
                        data: tekanan
                    },
                    {
                        data: tekananMin
                    },
                ])

                var data1 = google.visualization.arrayToDataTable([
                  ['Label', 'Value'],
                  ['', 80],
                ]);

                var options1 = {
                  width: 400, height: 120,
                  redFrom: 70, redTo: 100,
                  yellowFrom: 40, yellowTo: 70,
                  greenFrom: 0, greenTo: 40,
                  minorTicks: 5,
                  animation:{
                        duration: 1000,
                        easing: 'out',
                    },
                };

                var data2 = google.visualization.arrayToDataTable([
                  ['Label', 'Value'],
                  ['', 80],
                ]);

                var options2 = {  
                  width: 400, height: 120,
                  redFrom: 70, redTo: 100,
                  yellowFrom: 40, yellowTo: 70,
                  greenFrom: 0, greenTo: 40,
                  minorTicks: 5,
                  animation:{
                        duration: 1000,
                        easing: 'out',
                    },
                };

                var data3 = google.visualization.arrayToDataTable([
                  ['Label', 'Value'],
                  ['', 80],
                ]);

                var options3 = {
                  width: 400, height: 120,
                  redFrom: 70, redTo: 100,
                  yellowFrom: 40, yellowTo: 70,
                  greenFrom: 0, greenTo: 40,
                  minorTicks: 5,
                  animation:{
                        duration: 1000,
                        easing: 'out',
                    },
                };

                var chart1 = new google.visualization.Gauge(document.getElementById('chart_div'));
                var chart2 = new google.visualization.Gauge(document.getElementById('chart_div2'));
                var chart3 = new google.visualization.Gauge(document.getElementById('chart_div3'));

                  try {
                    data1.setValue(0,1,response.chart.suhu);
                    chart1.draw(data1, options1)
                    ;
                    data2.setValue(0,1,response.chart.kelembapan);
                    chart2.draw(data2, options2);

                    data3.setValue(0,1,response.chart.tekanan);
                    chart3.draw(data3, options3);

                  } catch(e) {
                      // statements
                      console.log(e);
                  }
                }
                // insert_data(data);
            } else {
                Swal.fire({
                    title: 'No Seri Harus Sesuai',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                })
            }
          },
          error : function(e) {
            console.log(e)
          }
        });


      }

      // function insert_data(data) {
      //   var today = new Date();
      //   var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
      //   var time = today.getHours()+":"+today.getMinutes()+":"+today.getSeconds();
      //   let url = "{{ url('api/monitoringStore') }}";
      //   $.ajaxSetup({
      //       headers: {
      //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //       }
      //   });
      //   $.ajax({
      //     url:url,
      //     method:'POST',
      //     data:{date:date,time:time,suhu:data.suhu,tekanan:data.tekanan,kelembapan:data.kelembapan,alarm:data.alarm,perangkat_id:data.perangkat_id,ruangan_id:data.ruangan_id,cvc:data.cvc,vvc:data.vvc},
      //     dataType:'JSON',
      //     success:function(){
      //       console.log('BERHASILLL');
      //     },
      //     error : function(e) {
      //       console.log(e)
      //     }
      //   });
      // }

      const url = "{{ $url_broker }}"
      var clientId = "ws" + Math.random();
      // Create a client instance
      var client = new Paho.MQTT.Client(url.replace(/(^\w+:|^)\/\//, ''), 32472, clientId);

      // set callback handlers
      client.onConnectionLost = onConnectionLost;
      client.onMessageArrived = onMessageArrived;

      // connect the client
      client.connect({
        useSSL: true,
        userName: '{{ $username }}',
        password: '{{ $password }}',
        onSuccess: onConnect,
        onFailure: onFailure
      });
    </script>

</body>

</html>
