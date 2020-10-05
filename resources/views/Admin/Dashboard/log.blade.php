@php
    $apps = \App\Aktivasi::all();
@endphp
<div class="row" style="margin-top: 10px; margin-left: 20px;">
    <a href="/pdfLog" class="btn btn-primary" style="margin-right: 20px;">
        <i class="fa fa-file-pdf"> Export PDF</i>
    </a>
    <a href="/excelLog" class="btn btn-primary">
        <i class="fa fa-file-excel"> Export Excel</i>
    </a>
</div>
<div class="card-body">
    <!-- <a class="btn btn-warning col-2" style="margin-bottom:15px;" href="{{ route('export') }}">Export Log Aktivitas</a> -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="logTable" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>Level</th>
                    <th>Aktivitas</th>
                    <th>Menu</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1 @endphp
                @foreach($aktivasi as $a)                
                <tr>
                    <td>{{$no++}}</td>
                    @if($a->causer_id == null)
                    <td>Sistem</td>
                    <td>Administrator</td>
                    @else 
                    <td>{{$a->operator->name}}</td>
                    <td>{{$a->operator->level}}</td>
                    @endif
                    <td>{{$a->description}}</td>
                    <td>
                        @if($a->subject_type == "")
                            Auth
                        @elseif($a->subject_type == "App\Mqtt")
                            Pengaturan MQTT Broker
                        @elseif($a->subject_type == "App\Laporan")
                            Pengaturan Laporan
                        @elseif($a->subject_type == "App\Operator")
                            Data Operator
                        @elseif($a->subject_type == "App\Perangkat")
                            Data Perangkat
                        @elseif($a->subject_type == "App\Ruangan")
                            Data Ruangan                                    
                        @elseif($a->subject_type == "App\Satuan")
                            Data Satuan
                        @elseif($a->subject_type == "App\Setapp")
                            Pengaturan Aplikasi
                        @elseif($a->subject_type == "App\SetKirim")
                            Pengaturan Pengiriman Laporan
                        @elseif($a->subject_type == "App\KirimAlarm")
                            Pengaturan Pengiriman Alarm
                        @endif
                    </td>
                    <td>{{$a->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>