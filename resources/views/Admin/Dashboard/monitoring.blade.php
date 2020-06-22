<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="{{ asset('foto/app/'.$app->icon) }}">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>{{ $app->nama_apps }}</title>
    <link href="{{ Asset('apex/assets/samples/styles.css') }}" rel="stylesheet" />

<style>
  
    #chart {
  max-width: 1500px;
  margin: 35px auto;
}
  
</style>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


<script>
</script>
</head>

<body class="bg-dark">

    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-dark text-white fixed-top">
            <div class="container">
                <a class="btn btn-danger rounded" href="{{ route('dashboard') }}"><i class="fas fa-arrow-left"></i> Back</a>
                <div class="btn btn-default rounded ml-auto">
                    <i class="fas fa-clock"></i><div id="waktu"></div>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row" style="margin-top:100px;">
            <div class="col-xl-4 col-md-12"  style="width:20rem;">
                <div class="card bg-dark">
                    <div class="card-header bg-dark text-white">
                        Suhu
                    </div>
                <div class="card-body bg-dark text-white rounded">
                    <div class="row">
                        <div class="col-md-6">
                            <center>
                                <img src="{{ asset('svg/suhu.svg') }}" alt="" height="100px" width="100px" style="margin-bottom:20px;">
                            </center>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <center>Max</center>
                                    <div class="card bg-danger">
                                        <center>50 C</center>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <center>Min</center>
                                    <div class="card bg-primary">
                                        <center>50 C</center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12"  style="width:20rem;">
            <div class="card bg-dark">
                <div class="card-header bg-dark text-white">
                    Kelembaban
                </div>
                <div class="card-body bg-dark text-white rounded">
                    <div class="row">
                        <div class="col-md-6">
                            <center>
                                <img src="{{ asset('svg/kelembaban.svg') }}" alt="" height="100px" width="100px" style="margin-bottom:20px;">
                            </center>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <center>Max</center>
                                    <div class="card bg-danger">
                                        <center>50 %</center>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <center>Min</center>
                                    <div class="card bg-primary">
                                        <center>50 %</center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12"  style="width:20rem;">
            <div class="card bg-dark">
                <div class="card-header bg-dark text-white">
                    Tekanan
                </div>
                <div class="card-body bg-dark text-white rounded">
                    <div class="row">
                        <div class="col-md-6">
                            <center>
                                <img src="{{ asset('svg/tekanan.svg') }}" alt="" height="100px" width="100px" style="margin-bottom:20px;">
                            </center>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <center>Max</center>
                                    <div class="card bg-danger">
                                        <center>50 Pa</center>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <center>Min</center>
                                    <div class="card bg-primary">
                                        <center>50 Pa</center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- <div class="row">
            <div class="col-6">
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
    <div class="row" style="margin-top:15px; ">
        <div class="col-3">
            
        </div>
        <div class="col-2">
            <div class="row text-white">
                <input type="checkbox" name="suhu" id="" value="suhu" checked>Suhu<br>
            </div>
        </div>
        <div class="col-2">
            <div class="row text-white">
                <input type="checkbox" name="kelembapan" id="" value="kelembapan" checked>Kelembapan<br>
            </div>
        </div>
        <div class="col-2">
            <div class="row text-white">
                    <input type="checkbox" name="tekanan" id="" value="tekanan" checked>Tekanan<br>
            </div>
        </div>
        <div class="col-3">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="chart" style="width: 100%"></div>
        </div>
    </div>
</div>
    
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <!-- <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script> -->
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <!-- <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script> -->
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
	<!-- <script src="assets/libs/js/dashboard-ecommerce.js"></script> -->
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
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
  var lastDate = 0;
  var data = []
  var TICKINTERVAL = 86400000
  let XAXISRANGE = 777600000
  function getDayWiseTimeSeries(baseval, count, yrange) {
    var i = 0;
    while (i < count) {
      var x = baseval;
      var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
  
      data.push({
        x, y
      });
      lastDate = baseval
      baseval += TICKINTERVAL;
      i++;
    }
  }
  
  getDayWiseTimeSeries(new Date('11 Feb 2017 GMT').getTime(), 10, {
    min: 10,
    max: 90
  })
  
  function getNewSeries(baseval, yrange) {
    var newDate = baseval + TICKINTERVAL;
    lastDate = newDate
  
    for(var i = 0; i< data.length - 10; i++) {
      // IMPORTANT
      // we reset the x and y of the data which is out of drawing area
      // to prevent memory leaks
      data[i].x = newDate - XAXISRANGE - TICKINTERVAL
      data[i].y = 0
    }
  
    data.push({
      x: newDate,
      y: Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min
    })
  }
  
  function resetData(){
    // Alternatively, you can also reset the data at certain intervals to prevent creating a huge series 
    data = data.slice(data.length - 10, data.length);
  }
  </script>
 

    <script>
      
        var options = {
          series: [{
          data: data.slice()
        }],
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
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        title: {
          text: 'Dynamic Updating Chart',
          align: 'left'
        },
        markers: {
          size: 0
        },
        xaxis: {
          type: 'datetime',
          range: XAXISRANGE,
        },
        yaxis: {
          max: 100
        },
        legend: {
          show: false
        },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
      
        window.setInterval(function () {
        getNewSeries(lastDate, {
          min: 10,
          max: 90
        })
      
        chart.updateSeries([{
          data: data
        }])
      }, 1000)
      
    </script>
</body>
 
</html>