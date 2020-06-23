<!DOCTYPE html>
<html>
<head>
	<title>Laporan Monitoring</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<div class="row" style="margin-bottom: 50px;">
		<div class="col-8">
		</div>
		<div class="col-4">
		</div>
	</div>
	<center>
		<h3>Data Monitoring</h3><br>
		<h6>Dari {{$awal}} s.d. {{$akhir}}</h6>
	</center>
	

	<div class="row">
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>Waktu</th>
					<th>Suhu</th>
					<th>Kelembapan</th>
					<th>Tekanan</th>
					<th>Alarm</th>
					<th>Nama Ruangan</th>
					<th>No Seri Perngkat</th>
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
	</div>
	
	<div class="row">
		<div class="col-10">
			
		</div>
		<div class="col-2">
		</div>
	</div>
		
	</div>
</body>
</html>