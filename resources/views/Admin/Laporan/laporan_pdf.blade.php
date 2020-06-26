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
	</style>
</head>
<body>
	<img src="{{$set->icon}}" style="float: left;" width="50px" height="50px">  
	<h3 style=" margin-top: 30px; margin-right:20px;">
		{{$set->header_img}}
	</h3> 

	<div class="container">
	<style type="text/css">
		table tr td{
			text-align: center;
		},
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
	<center>
		<h3>Data Monitoring</h3><br>
	</center>
	
	<h6 style="text-align: left;">Sumber Data :</h6>
	<h6 style="text-align: right;">Waktu : {{$awal}} s.d. {{$akhir}}</h6>
	<table width="100%" style="margin-bottom: 30px; " id="customers">
		<thead>
			<tr>
				<th>No</th>
				<th>Waktu</th>
				<th>Suhu</th>
				<th>Kelembapan</th>
				<th>Tekanan</th>
				<th>Alarm</th>
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
				<td>{{$p->alarm}}</td>
				<td>{{$p->ruangan->nama}}</td>
				<td>{{$p->perangkat->no_seri}}</td>
			</tr>
			@endforeach
		</tbody>
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
</body>
</html>