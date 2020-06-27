@php
    $apps = \App\Aktivasi::all();
@endphp
@extends('Admin.layouts.app')

@section('content')

@if(Auth::user()->level == "Admin")
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Log Pengguna</h2>
        </div>
    </div>
</div>
<div class="row">
<!--     <form action="/pdfLog" method="post">
    @csrf
    <div class="col-6">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="input-select">Tanggal Awal</label>
                    <input type="date" name="awal" class="form-control  @error('awal') is-invalid @enderror" id="awal">
                    @error('awal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="input-select">Tanggal Akhir</label>
                    <input type="date" name="akhir" class="form-control  @error('akhir') is-invalid @enderror" id="akhir">
                    @error('akhir')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
    </div> -->
    <div class="col-6 ">
        <a href="/pdfLog" class="btn btn-primary" style="margin-right: 20px;">
            <i class="fa fa-file-pdf-o"></i>
        </a>
        <a href="/excelLog" class="btn btn-primary">
            <i class="fa fa-file-excel-o"></i>
        </a>
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
                    <table class="table table-striped table-bordered" id="logTable" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengguna</th>
                                <th>Level</th>
                                <th>Aktivitas</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1 @endphp
                            @foreach($aktivasi as $a)                
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$a->operator->name}}</td>
                                <td>{{$a->operator->level}}</td>
                                <td>{{$a->description}}</td>
                                <td>{{$a->created_at}}</td>
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
 
@else
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="ecommerce-widget">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                    <div class="section-block">
                    </div>
                    <div class="tab-regular">
                        <ul class="nav nav-tabs nav-fill" id="myTab7" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab-justify" data-toggle="tab" href="#home-justify" role="tab" aria-controls="home" aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab-justify" data-toggle="tab" href="#profile-justify" role="tab" aria-controls="profile" aria-selected="false">AHU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab-justify" data-toggle="tab" href="#contact-justify" role="tab" aria-controls="contact" aria-selected="false">Alarm</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent7" bg-dark>
                            <div class="tab-pane fade show active" id="home-justify" role="tabpanel" aria-labelledby="home-tab-justify">
                            @include('Admin.Dashboard.overview')
                            </div>
                            <div class="tab-pane fade" id="profile-justify" role="tabpanel" aria-labelledby="profile-tab-justify">
                            @include('Admin.Dashboard.ahu')
                            </div>
                            <div class="tab-pane fade" id="contact-justify" role="tabpanel" aria-labelledby="contact-tab-justify">
                            @include('Admin.Dashboard.alarm')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<script>
    // $.get(" route('aktivasi.data') ", function(data){
    // console.log(data);
    // act(data);
    // var record = JSON.parse(data);
    // let rec = JSON.parse(data).sort((a,b)=>{
    //   return a.localeCompare(b);
    // });
    // data.forEach( );
//     console.log(rec);
// });

    // const act =(activity)=>{
    //     var html='';
    //     console.log(activity);
    //         activity.forEach(row => {
    //         console.log(row.log_name);
    //         html+=`<tr>
    //             <td>${row.log_name}</td>
    //             <td>${row.description}</td>
    //             <td>${row.subject_id}</td>
    //             <td>${row.subject_type}</td>
    //             <td>${row.causer_id}</td>
    //             <td>${row.created_at}</td>
    //         </tr>`;
    //     }); 
    //     $('#tableLog tbody').html(html);
        
    // }
 </script>
@endsection