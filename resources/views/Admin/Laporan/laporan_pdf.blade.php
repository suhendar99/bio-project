@php
	$count = $data->count();
	$smax = $data->max('suhu');
	$smin = $data->min('suhu');
	$savg = $data->avg('suhu');

	$kmax = $data->max('kelembapan');
	$kmin = $data->min('kelembapan');
	$kavg = $data->avg('kelembapan');

	$tmax = $data->max('tekanan');
	$tmin = $data->min('tekanan');
	$tavg = $data->avg('tekanan');

    $date = date("d M Y");
    $ruanganAir = App\Ruangan::where('nama','Airlock')->first();
    $ruanganDres = App\Ruangan::where('nama','Dressing')->first();
    $ruanganSamp = App\Ruangan::where('nama','Sample')->first();
    $ruanganUji = App\Ruangan::where('nama','Uji')->first();
    $ruanganVest = App\Ruangan::where('nama','Vestibule')->first();

@endphp

<!DOCTYPE html>
<html>
<head>
	<title>Laporan Monitoring</title>
	<style>
		#customers {
		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		border-collapse: collapse;
		width: 100%;
		}

		#customers td, #customers th {
		border: 1px solid #ddd;
		padding: 8px;
		}

		#customers tr:nth-child(even){background-color: #ddd;}

		#customers tr:hover {background-color: #ddd;}

		#customers th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #8a8a8a;
		color: white;
		}

		*{
			font-family:sans-serif;
		}
		table {
			width: 100%;
			padding: 5px;
		}
		table, th, tr, td {
			border: 1px black;
			text-align: center;
		}
		#header,
		#footer {
		  position: fixed;
		  left: 0;
			right: 0;
			color: #aaa;
			font-size: 0.9em;
		}
		#header {
		  top: 0;
			border-bottom: 0.1pt solid #aaa;
		}
		#footer {
		  bottom: 0;
		  border-top: 0.1pt solid #aaa;
		}
		.page-number:before {
		  content: "Page " counter(page);
		}
	</style>
</head>
<body>
	{{-- <img src="{{$set->icon}}" style="float: left;" width="50px" height="50px"> --}}

	<div class="container">
        <style type="text/css">
		table tr td{
			text-align: center;
		}
		table tr th{
			text-align: center;
		}
		table {
		  border-collapse: collapse;
		  width: 100%;
		}

		th, td {
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even) {background-color: #f2f2f2;}
	</style>
    <div style="font-size: 13px;margin-left: 10px;">
        <div style="font-weight: 900;font-size: 20px;">
            {{$set->header_img}}
        </div>
        <div style="color: blue; margin-bottom: -15px;">
            @if ($sumber == 'Suhu & Airlock')
                SETPOINT ({{ $ruanganAir->smin }} s.d {{ $ruanganAir->smax }})
            @endif
           @if ($sumber == 'Kelembapan & Airlock')
                SETPOINT ({{ $ruanganAir->kmin }} s.d {{ $ruanganAir->kmax}} )
           @endif
           @if ($sumber == 'Tekanan & Airlock')
               SETPOINT ({{ $ruanganAir->tmin }} s.d {{ $ruanganAir->tmax }})
           @endif
           @if ($sumber == 'Suhu & Vestibule')
                SETPOINT ({{ $ruanganVest->smin }} s.d {{ $ruanganVest->smax }})
            @endif
           @if ($sumber == 'Kelembapan & Vestibule')
                SETPOINT ({{ $ruanganVest->kmin }} s.d {{ $ruanganVest->kmax}} )
           @endif
           @if ($sumber == 'Tekanan & Vestibule')
               SETPOINT ({{ $ruanganVest->tmin }} s.d {{ $ruanganVest->tmax }})
           @endif
           @if ($sumber == 'Suhu & Dressing')
                SETPOINT ({{ $ruanganDres->smin }} s.d {{ $ruanganDres->smax }})
            @endif
           @if ($sumber == 'Kelembapan & Dressing')
                SETPOINT ({{ $ruanganDres->kmin }} s.d {{ $ruanganDres->kmax}} )
           @endif
           @if ($sumber == 'Tekanan & Dressing')
               SETPOINT ({{ $ruanganDres->tmin }} s.d {{ $ruanganDres->tmax }})
           @endif
           @if ($sumber == 'Suhu & Sample')
                SETPOINT ({{ $ruanganSamp->smin }} s.d {{ $ruanganSamp->smax }})
            @endif
           @if ($sumber == 'Kelembapan & Sample')
                SETPOINT ({{ $ruanganSamp->kmin }} s.d {{ $ruanganSamp->kmax}} )
           @endif
           @if ($sumber == 'Tekanan & Sample')
               SETPOINT ({{ $ruanganSamp->tmin }} s.d {{ $ruanganSamp->tmax }})
           @endif
           @if ($sumber == 'Suhu & Uji')
                SETPOINT ({{ $ruanganUji->smin }} s.d {{ $ruanganUji->smax }})
            @endif
           @if ($sumber == 'Kelembapan & Uji')
                SETPOINT ({{ $ruanganUji->kmin }} s.d {{ $ruanganUji->kmax}} )
           @endif
           @if ($sumber == 'Tekanan & Uji')
               SETPOINT ({{ $ruanganUji->tmin }} s.d {{ $ruanganUji->tmax }})
           @endif
        </div>
    <br>
        Sumber Data : {{ $sumber }}
    <br>
        Waktu : {{$awal}} s.d. {{$akhir}}
    </div>
	<table width="100%" style="margin-bottom: -10px; " id="customers">
		@if($pos == 'Parameter')
		<thead>
			<tr>
				<th>No</th>
				<th>{{$parameter}}</th>
				{{-- <th>Alarm</th> --}}
				<th>Nama Ruangan</th>
				<th>No Seri Perangkat</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data as $p)
			<tr>
				<td>{{ $i++ }}</td>
				@if($parameter == 'Suhu')
				<td>{{ $p->suhu }}</td>
				@elseif($parameter == 'Kelembapan')
				<td>{{ $p->kelembapan }}</td>
				@elseif($parameter == 'Tekanan')
				<td>{{ $p->tekanan }}</td>
				@endif
				{{-- @if($p->alarm > 0)
					<td id="alertff">ON</td>
				@else
					<td id="alertff">OFF</td>
				@endif --}}
				<td>{{$p->ruangan->nama}}</td>
				<td>{{$p->perangkat->no_seri}}</td>
			</tr>
			@endforeach
		</tbody>
		@else
		<thead>
			<tr>
				<th>No</th>
				<th>Waktu</th>
				<th>Suhu</th>
				<th>Kelembapan</th>
				<th>Tekanan</th>
				{{-- <th>Alarm</th> --}}
				<th>Nama Ruangan</th>
				<th>No Seri Perangkat</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->time}}</td>
				<td>{{$p->suhu}}</td>
				<td>{{$p->kelembapan}}</td>
				<td>{{$p->tekanan}}</td>
				{{-- @if($p->alarm > 0)
					<td id="alertff">ON</td>
				@else
					<td id="alertff">OFF</td>
				@endif --}}
				<td>{{$p->ruangan->nama}}</td>
				<td>{{$p->perangkat->no_seri}}</td>
			</tr>
			@endforeach
		</tbody>
		@endif
	</table>

	<table style="text-align: left !important; margin-bottom: 50px;" id="customers">
		<tr>
			<td>Jumlah Data</td>
			<td style="text-align: right !important;">{{$count}}</td>
		</tr>
		<tr>
			<td>Suhu Tertinggi</td>
			<td style="text-align: right !important;">{{$smin}}</td>
		</tr>
		<tr>
			<td>Suhu Terendah</td>
			<td style="text-align: right !important;">{{$smax}}</td>
		</tr>
		<tr>
			<td>Suhu Rata Rata</td>
			<td style="text-align: right !important;">{{$savg}}</td>
		</tr>
		<tr>
			<td>Kelembapan Tertinggi</td>
			<td style="text-align: right !important;">{{$kmax}}</td>
		</tr>
		<tr>
			<td>Kelembapan Terendah</td>
			<td style="text-align: right !important;">{{$kmin}}</td>
		</tr>
		<tr>
			<td>Kelembapan Rata Rata</td>
			<td style="text-align: right !important;">{{$kavg}}</td>
		</tr>
		<tr>
			<td>Tekanan Tertinggi</td>
			<td style="text-align: right !important;">{{$tmax}}</td>
		</tr>
		<tr>
			<td>Tekanan Terendah</td>
			<td style="text-align: right !important;">{{$tmin}}</td>
		</tr>
		<tr>
			<td>Tekanan Rata Rata</td>
			<td style="text-align: right !important;">{{$tavg}}</td>
		</tr>
	</table>

	<div style="float: right;">
		{{$set->footer}},  {{$date}}<br>
		{{Auth::user()->name}}
	</div>
	<div id="footer">
	  <div class="page-number"></div>
	</div>

<script>

	const rero = ()=>{
        const alrm = document.querySelectorAll("#alertff");
    	const on = "ON";
    	const off = "OFF";
        alrm.forEach(r =>{
            if(r.innerHTML == 1){
                r.innerHTML = on;
            }else{
                r.innerHTML = off;
            }
        })
    }
    console.log('hai');
    rero();
</script>
</body>
</html>
