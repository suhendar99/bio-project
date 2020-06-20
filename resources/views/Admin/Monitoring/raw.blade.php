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
                    <table class="table" id="monitorTable" >
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js"></script>
<script type="text/javascript">

      //area ini untuk topic yang ada di broker mqtt
      function onConnect()
      {
        // Fetch the MQTT topic from the form
        topic = "room1";
        console.log('koneksi_berhasil');
        client.subscribe(topic);
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

        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours()+":"+today.getMinutes()+":"+today.getSeconds();

        var raw = '<tr id="'+data.id+'">';
        raw += '<td>' + date + '</td>';
        raw += '<td>' + time + '</td>';
        raw += '<td>' + data.perangkat_id + '</td>';
        raw += '<td>' + data.ruangan_id + '</td>';
        raw += '<td>' + data.suhu + '</td>';
        raw += '<td>' + data.tekanan + '</td>';
        raw += '<td>' + data.kelembapan + '</td>';
        raw += '<td>' + data.alarm + '</td>';
        raw += '</tr>';
        $('#monitorTable tbody').prepend(raw);
          
          
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

      var clientId = "ws" + Math.random();
      // Create a client instance
      var client = new Paho.MQTT.Client("m15.cloudmqtt.com", 32472, clientId);
      
      // set callback handlers
      client.onConnectionLost = onConnectionLost;
      client.onMessageArrived = onMessageArrived;
      
      // connect the client
      client.connect({
        useSSL: true,
        userName: 'aqeiblzz',
        password: 'vzbr4DnPz1Af',
        onSuccess: onConnect,
        onFailure: onFailure
      });
</script>
@endsection