@php

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
	<img src="{{$set->icon}}" style="float: left;" width="50px" height="50px">  
	<h3 style=" margin-top: 30px; margin-right:20px;">
		{{$set->header_img}}
	</h3> 

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
	<center>
		<h3>Data Monitoring</h3><br>
	</center>
	<table style="margin-bottom:-10px;">
		<tr>
			<td rowspan="2" style="text-align:left; font-size:13px;">
				
			</td>
			<td rowspan="2" style="text-align:right; font-size:13px;">
				Waktu : {{$awal}} s.d. {{$akhir}}
			</td>
		</tr>
	</table>
	<table width="100%" style="margin-bottom: 10px; " id="customers">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Akses</th>
				<th>Dekripsi</th>
				<th>Waktu</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->operator->name}}</td>
				<td>{{$p->operator}}</td>
				<td>{{$p->description}}</td>
				<td>{{$p->created_at}}</td>
			</tr>
			@endforeach
		</tbody>
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