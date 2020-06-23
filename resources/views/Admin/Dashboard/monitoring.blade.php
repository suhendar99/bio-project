@php
    $mqtt = \App\Mqtt::where('id',1)->first();
    $app = \App\Setapp::where('id',1)->first();

    $monitoring = \App\Monitoring::orderBy('id_monitoring', 'asc')->limit(10)->get();
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
        <div class="col-2" style="margin-left: 20px;">
            <div class="row text-white">
                <input type="checkbox" name="suhu" id="suhu" value="suhu" checked> Suhu<br>
            </div>
        </div>
        <div class="col-2">
            <div class="row text-white">
                <input type="checkbox" name="kelembapan" id="kelembapan" value="kelembapan" checked>Kelembapan<br>
            </div>
        </div>
        <div class="col-2">
            <div class="row text-white">
                    <input type="checkbox" name="tekanan" id="tekanan" value="tekanan" checked>Tekanan<br>
            </div>
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
        let monitoring = '@json($monitoring)'
        console.log(JSON.parse(monitoring));
          
  var suhu = []
  var kelembapan = []
  var tekanan = []
  
    let dates = 0
    const months = ["Jan", "Feb", "Mar","Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    let formatted_date = ""
    let monitor = JSON.parse(monitoring)
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

  
  </script>            
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js"></script>
    <script type="text/javascript">
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
          curve: 'straight'
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

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
      
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
        
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours()+":"+today.getMinutes()+":"+today.getSeconds();
        

        suhu.splice(0,1)
        tekanan.splice(0,1)
        kelembapan.splice(0,1)
        // lastsuhu.splice(0,1)

        suhu.push({
          x: time,
          y: data.suhu
        })
        tekanan.push({
          x: time,
          y: data.tekanan
        })
        kelembapan.push({
          x: time,
          y: data.kelembapan
        })

        // lastsuhu.push({
        //   x: time,
        //   y: data.suhu
        // })

        //  if($('#suhu').prop('checked')){
        //     suhu = lastsuhu
        //     console.log($('#suhu').prop('checked'));
            
        // }else{            
        //     suhu = []
        //     console.log($('#suhu').prop('checked'));

        // }

        // console.log(lastsuhu);
        

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

        
          
         //console.log('BLOK MQTT');
       
         insert_data(data);
         // console.log(html);
      }
      
      function insert_data(data) {
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours()+":"+today.getMinutes()+":"+today.getSeconds();
        let url = "{{ url('api/monitoringStore') }}";
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url:url,
          method:'POST',
          data:{date:date,time:time,suhu:data.suhu,tekanan:data.tekanan,kelembapan:data.kelembapan,alarm:data.alarm,perangkat_id:data.perangkat_id,ruangan_id:data.ruangan_id},
          dataType:'JSON',
          success:function(){
            console.log('BERHASILLL');
          },
          error : function(e) {
            console.log(e)
          }
        });
      }

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