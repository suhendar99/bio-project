@php
    $mqtt = \App\Mqtt::where('id',1)->first();
    $app = \App\Setapp::where('id',1)->first();
@endphp
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="{{ asset('foto/app/'.$app->icon) }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('concept/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('concept/assets/vendor/fonts/circular-std/style.css') }}">
    <link rel="stylesheet" href="{{ asset('concept/assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('concept/assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('concept/assets/vendor/charts/chartist-bundle/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('concept/assets/vendor/charts/morris-bundle/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('concept/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('concept/assets/vendor/charts/c3charts/c3.css') }}">
    <link rel="stylesheet" href="{{ asset('concept/assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('concept/assets/vendor/datatables/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('concept/assets/vendor/datatables/css/buttons.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('concept/assets/vendor/datatables/css/select.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('concept/assets/vendor/datatables/css/fixedHeader.bootstrap4.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.6.1/fullcalendar.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.6.1/fullcalendar.print.css">
    <title>{{ $app->tab }}</title>
    <script src="{{ asset('concept/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <style>
        .dashboard-wrapper {
            min-height: 0px !important;
        }
        .fixed-bottom {
            z-index: -1 !important;
        }
    </style>
</head>


<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
                <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-md bg-white fixed-top">
                <a class="navbar-brand" style="text-transform:none;" href="#">{{ $app->nama_apps }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-user"></i></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(Auth::user()->foto == "")
                                <i class="fa fa-user"></i>
                            @else
                                <img src="{{asset('foto/'.Auth::user()->foto)}}" alt="user" style="width: 40px;">
                            @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->name }}</h5>
                                </div>
                                <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}"><i class="fas fa-cog mr-2"></i> My Profile </a>
                                <a class="dropdown-item" href="/editPassword/{{ Auth::user()->id }}"><i class="fas fa-key mr-2"></i> Ganti Password </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <center><button class="btn btn-primary col-12"><i class="fas fa-power-off mr-2"></i>Logout</button></center>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link {{ Request::is('/') ? 'active' : false }}" href="{{ route('dashboard') }}"  aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link
                                {{ Request::is('operator*') ? 'active' : false }}
                                {{ Request::is('dataper*') ? 'active' : false }}
                                {{ Request::is('data_ruang*') ? 'active' : false }}
                                {{ Request::is('data_satuan*') ? 'active' : false }}
                                "
                                href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-user"></i>Data Master</a>
                                <div id="submenu-2" class="collapse submenu
                                {{ Request::is('operator*') ? 'show' : false }}
                                {{ Request::is('dataper*') ? 'show' : false }}
                                {{ Request::is('data_ruang*') ? 'show' : false }}
                                {{ Request::is('satuan*') ? 'show' : false }}
                                {{ Request::is('aktivasiper*') ? 'show' : false }}"
                                >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link {{ Request::is('operator*') ? 'active' : false }}" href="{{ route('operator') }}">Data Operator</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ Request::is('dataper*') ? 'active' : false }}" href="{{ route('data.perangkat') }}">Data Perangkat</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link {{ Request::is('aktivasiper*') ? 'active' : false }}" href="{{ route('aktivasiper.index') }}">Data Aktivasi Perangkat</a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link {{ Request::is('data_ruang*') ? 'active' : false }}" href="{{ route('data_ruang.index') }}">Data Ruang</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ Request::is('satuan*') ? 'active' : false }}" href="{{ route('satuan.index') }}">Data Satuan</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link
                                    {{ Request::is('monitoring*') ? 'active' : false }}
                                    {{ Request::is('set_monitoring*') ? 'active' : false }}"
                                href="#" data-toggle="collapse" aria-expanded="false" data-target="#monitoring" aria-controls="monitoring"><i class="fas fa-fw fa-laptop"></i>Data Monitoring</a>
                                <div id="monitoring" class="collapse submenu
                                    {{ Request::is('monitoring*') ? 'show' : false }}
                                    {{ Request::is('set_monitoring*') ? 'show' : false }}"
                                     style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link  {{ Request::is('monitoring*') ? 'active' : false }}" href="{{ route('monitoring') }}">Raw Data</a>
                                        </li>
                                        @if(Auth::user()->level == "Admin")
                                        <!-- <li class="nav-item">
                                            <a class="nav-link {{ Request::is('set_monitoring*') ? 'active' : false }}" href="{{ route('setting.monitoring') }}">Pengaturan Monitoring</a>
                                        </li> -->
                                        @endif
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link
                                   {{ Request::is('cetak_laporan*') ? 'active' : false }}
                                 {{ Request::is('set_laporan*') ? 'active' : false }}
                                 {{ Request::is('set_kirim_laporan*') ? 'active' : false }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#laporan" aria-controls="laporan"><i class=" fas fa-fw fa-book"></i>Laporan</a>
                                <div id="laporan" class="collapse submenu
                                {{ Request::is('cetak_laporan*') ? 'show' : false }}
                                 {{ Request::is('set_laporan*') ? 'show' : false }}
                                 {{ Request::is('set_kirim_laporan*') ? 'show' : false }}" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link {{ Request::is('cetak_laporan*') ? 'active' : false }}" href="{{ route('cetak.laporan') }}">Cetak Laporan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ Request::is('set_laporan*') ? 'active' : false }}" href="{{ route('setting.laporan') }}">Pengaturan Laporan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ Request::is('set_kirim_laporan*') ? 'active' : false }}" href="{{ route('setting.kirim.laporan') }}">Pengaturan Pengiriman Laporan</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link
                                  {{ Request::is('set_app*') ? 'active' : false }}
                                  {{ Request::is('set_mqtt*') ? 'active' : false }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#setting" aria-controls="setting"><i class="fas fa-fw fa-cog"></i>Pengaturan</a>
                                <div id="setting" class="collapse submenu
                                  {{ Request::is('set_app*') ? 'show' : false }}
                                  {{ Request::is('set_mqtt*') ? 'show' : false }}" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item ">
                                            <a class="nav-link {{ Request::is('set_app*') ? 'active' : false }}" href="{{ route('pengaturan.app') }}"  aria-controls="submenu-1">Aplikasi</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link {{ Request::is('set_mqtt*') ? 'active' : false }}" href="{{ route('pengaturan.mqtt',1) }}"  aria-controls="submenu-1">MQTT Broker</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    @yield('content')
                </div>
            </div>
            <div class="footer fixed-bottom">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-right">
                             Copyright © 2020 Makerindo. All rights reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- Optional JavaScript -->
    <?php
        $topic = $mqtt->topic;
        $username = $mqtt->username;
        $password = $mqtt->password;
        $url_broker = $mqtt->url_broker;
    ?>

    <!-- jquery 3.3.1 -->
    <script src="{{ asset('concept/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('concept/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('concept/assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('concept/assets/libs/js/main-js.js') }}"></script>
    <!-- chart chartist js -->
    <!-- <script src="{{ asset('concept/assets/vendor/charts/chartist-bundle/chartist.min.js') }}"></script> -->
    <!-- sparkline js -->
    <script src="{{ asset('concept/assets/vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
    <!-- morris js -->
    <script src="{{ asset('concept/assets/vendor/charts/morris-bundle/raphael.min.js') }}"></script>
    <!-- <script src="{{ asset('concept/assets/vendor/charts/morris-bundle/morris.js') }}"></script> -->
    <!-- chart c3 js -->
    <script src="{{ asset('concept/assets/vendor/charts/c3charts/c3.min.js') }}"></script>
    <script src="{{ asset('concept/assets/vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>
    <script src="{{ asset('concept/assets/vendor/charts/c3charts/C3chartjs.js') }}"></script>
    <!-- <script src="{{ asset('concept/assets/libs/js/dashboard-ecommerce.js') }}"></script> -->
    <script src="{{ asset('concept/assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- <script src="{{ asset('concept/assets/vendor/gauge/gauge.min.js') }}"></script>
    <script src="{{ asset('concept/assets/vendor/gauge/gauge.js') }}"></script> -->
    <script src="{{ asset('concept/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('concept/assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('concept/assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('concept/assets/libs/js/main-js.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('concept/assets/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('concept/assets/vendor/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('concept/assets/vendor/datatables/js/data-table.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="></script>
    <script src="http://momentjs.com/downloads/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.6.1/fullcalendar.min.js"></script>

<script src="/assets/vendor/sweetalert/sweetalert.min.js"></script>

   {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js"></script> --}}
    <script src="{{ asset('js/paho.js') }}"></script>
   {{-- <script src="{!! mix('js/app.js') !!}"></script> --}}
<script type="text/javascript">
    var data_monitoring = [1];

    const on = "ON";
    const off = "OFF";

    const rew = ()=>{
        var html='';
            data_monitoring.forEach((row) => {
            html+=`<tr>
                <td>${row.date}</td>
                <td>${row.time}</td>
                <td>${row.perangkat_id}</td>
                <td>${row.ruangan_id}</td>
                <td>${row.suhu}</td>
                <td>${row.kelembapan}</td>
                <td>${row.tekanan}</td>
                <td>${row.cvc}</td>
                <td>${row.vvc}</td>
                <td id="alertff">${row.alarm}</td>
            </tr>`;
        });
        $('#monitoring tbody').html(html);

        alp();
    }

    const alp = ()=>{
        const alrm = document.querySelectorAll("#alertff");

        alrm.forEach(r =>{
            if(r.innerHTML == 1){
                r.innerHTML = on;
            }else{
                r.innerHTML = off;
            }
        })
    }

      //area ini untuk topic yang ada di broker mqtt
      function onConnect()
      {
        // Fetch the MQTT topic from the form
        console.log('koneksi_berhasil');
        client.subscribe('{{ $topic }}');
        // rew();
      }
      function onFailure(xhr)
      {
          console.log(xhr);

          console.log('KONEKSI_GAGAL!!!!!')
      }
      function onConnectionLost(responseObject) {
          console.log(responseObject)
      }

      function onMessageArrived(message) {

        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        // var date = today.getFullYear()+'-'+("0" + today.getMonth()).slice(-2)+'-'+today.getDate();
        console.log(date);
        var time = today.getHours()+":"+today.getMinutes()+":"+today.getSeconds();
        const perangkat = "Dc234Zz"

        // console.log(message.payloadString);
        var data = JSON.parse(message.payloadString + "");

        let percobaan = [];
        let object1 = {};
        let plus = "";

        console.log(data);
        
        $(`
            <tr>
                <td>${date}</td>
                <td>${time}</td>
                <td>${perangkat}</td>
                <td>Airlock</td>
                <td>${data.temp_airlock}</td>
                <td>${data.rh_airlock}</td>
                <td>${data.scaling_airlock}</td>
                <td>${data.cvc_airlock}</td>
                <td>${data.vvc_airlock}</td>
                <td>OFF</td>
            </tr>
        `).prependTo("#monitoring > tbody");

        $('#monitoring > tbody > tr').last().remove();

        $(`
            <tr>
                <td>${date}</td>
                <td>${time}</td>
                <td>${perangkat}</td>
                <td>dressing</td>
                <td>${data.temp_dressing}</td>
                <td>${data.rh_dressing}</td>
                <td>${data.scaling_dressing}</td>
                <td>${data.cvc_dressing}</td>
                <td>${data.vvc_dressing}</td>
                <td>OFF</td>
            </tr>
        `).prependTo("#monitoring > tbody");

        $('#monitoring > tbody > tr').last().remove();

        $(`
            <tr>
                <td>${date}</td>
                <td>${time}</td>
                <td>${perangkat}</td>
                <td>sample</td>
                <td>${data.temp_sample}</td>
                <td>${data.rh_sample}</td>
                <td>${data.scaling_sample}</td>
                <td>${data.cvc_sample}</td>
                <td>${data.vvc_sample}</td>
                <td>OFF</td>
            </tr>
        `).prependTo("#monitoring > tbody");

        $('#monitoring > tbody > tr').last().remove();

        $(`
            <tr>
                <td>${date}</td>
                <td>${time}</td>
                <td>${perangkat}</td>
                <td>Uji</td>
                <td>${data.temp_uji}</td>
                <td>${data.rh_uji}</td>
                <td>${data.scaling_uji}</td>
                <td>${data.cvc_uji}</td>
                <td>${data.vvc_uji}</td>
                <td>OFF</td>
            </tr>
        `).prependTo("#monitoring > tbody");

        $('#monitoring > tbody > tr').last().remove();

        $(`
            <tr>
                <td>${date}</td>
                <td>${time}</td>
                <td>${perangkat}</td>
                <td>vest</td>
                <td>${data.temp_vest}</td>
                <td>${data.rh_vest}</td>
                <td>${data.scaling_vest}</td>
                <td>${data.cvc_vest}</td>
                <td>${data.vvc_vest}</td>
                <td>OFF</td>
            </tr>
        `).prependTo("#monitoring > tbody");

        $('#monitoring > tbody > tr').last().remove();

        // $('#monitoring tbody tr:first').before(plus);


        // for(const [key, value] of Object.entries(data)) {

        //     const reg = /airlock/g;

        //     console.log(key.search(reg));


        //     if((key.search(reg) != -1) && plus < 6){
        //         let word = key.split("_")

        //         Object.defineProperty(object1, key, {
        //             value: value
        //         });
        //         percobaan.push(object1)

        //         console.log(percobaan);

        //         plus++
        //         // $('#monitoring tbody').html(`
        //         //     <tr>
        //         //         <td>${date}</td>
        //         //         <td>${time}</td>
        //         //         <td>${perangkat}</td>
        //         //         <td>Airlock</td>
        //         //         <td>${temp_airlock}</td>
        //         //         <td>${date}</td>
        //         //     </tr>
        //         // `);
        //     }
        // }


        // if (data.ruangan_id == 1 || data.ruangan_id == 2 ||data.ruangan_id == 3 ||data.ruangan_id == 4 ||data.ruangan_id == 5) {


        // }

        // $.ajaxSetup({
        //     headers: {
        //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        // $.ajax({
        //   url:'api/checkSeri',
        //   method:'GET',
        //   data:{
        //     no_seri:data.perangkat_id,
        //   },
        //   dataType:'JSON',
        //   success:function(response){
        //     console.log(response.status)
        //     if (response.status == 1) {
        //         data.date=date;
        //         data.time=time;
        //         data_monitoring.unshift(data);
        //         data_monitoring.pop();
        //         //  console.log(data_monitoring);
        //         // //  raw();
        //         rew();
        //         insert_data(data);
        //     } else {
        //         Swal.fire({
        //             title: 'No Seri Harus Sesuai',
        //             icon: 'warning',
        //             confirmButtonColor: '#3085d6',
        //             cancelButtonColor: '#d33',
        //         })
        //     }
        //   },
        //   error : function(e) {
        //     console.log(e)
        //   }
        // });




        // // var raw = '<tr id="'+data.id+'">';
        // // raw += '<td>' + date + '</td>';
        // // raw += '<td>' + time + '</td>';
        // // raw += '<td>' + data.perangkat_id + '</td>';
        // // raw += '<td>' + data.ruangan_id + '</td>';
        // // raw += '<td>' + data.suhu + '</td>';
        // // raw += '<td>' + data.tekanan + '</td>';
        // // raw += '<td>' + data.kelembapan + '</td>';
        // // raw += '<td>' + data.alarm + '</td>';
        // // raw += '</tr>';
        // // $('#monitorTable tbody').prepend(raw);

        // var over = data.suhu;
        // $('#suhuRoom').text(over);

        // if (data.alarm == 1 ) {
        //     var alarm = '<div class="cd-timeline__block js-cd-block">' ;
        //     alarm += '<div class="cd-timeline__img cd-timeline__img--movie js-cd-img">';
        //     alarm += '<img src="{asset('svg/alarm.svg')" alt="Movie" width="40px" height="40px">';
        //     alarm += '</div>';
        //     alarm += '<div class="cd-timeline__content js-cd-content">';
        //     alarm += '<h3>Alarm 1</h3>';
        //     alarm += '<p>Alarm ON :' + time + '</p>';
        //     alarm += '<span class="cd-timeline__date">' + date + '</span>';
        //     alarm += '</div>';
        //     alarm += '</div>';

        //     $('#alarmReal').prepend(alarm);
        // } else {

        // }


         //console.log('BLOK MQTT');

         // insert_data(data);
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
          data:{date:date,time:time,suhu:data.suhu,tekanan:data.tekanan,kelembapan:data.kelembapan,alarm:data.alarm,perangkat_id:data.perangkat_id,ruangan_id:data.ruangan_id,vvc:data.vvc,cvc:data.cvc},
          dataType:'JSON',
          success:function(response){
            console.log(response);
          },
          error : function(e) {
            console.log(e)
          }
        });
      }


      const url = "{{ $url_broker }}";
      var clientId = "ws" + Math.random();
      // Create a client instance
      var client = new Paho.MQTT.Client(url.replace(/(^\w+:|^)\/\//, ''), 8888, clientId);

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
@stack('script')
</body>
https://github.com/suhendar99/bio-project
</html>
