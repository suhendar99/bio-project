<!-- <div class="row">
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
</div> -->
<div class="row">

@foreach($data as $d)
    <div class="col-xl-4 col-md-12"  style="width:20rem;">
        <div class="card bg-dark">
            <div class="card-header bg-dark text-white">
                <h3 style="color: white;">
                    <center>{{$d->nama}}</center>
                </h3>
            </div>
            <div class="card-body bg-dark text-white rounded">
                <div class="row">
                    <div class="col-8">
                        Suhu
                    </div>
                    <div class="col-4">
                        {{-- : {{$d->monitoring->suhu}} --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        Kelembapan
                    </div>
                    <div class="col-4">
                        {{-- : {{$d->monitoring->kelembapan}} --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        Tekanan
                    </div>
                    <div class="col-4">
                        {{-- : {{$d->monitoring->tekanan}} --}}
                    </div> 
                </div>
            </div>
            <div class="d-flex justify-content-center bg-dark">
                <a href="{{ route('room.monitor') }}" class="btn btn-primary col-md-9 btn-sm" style="margin-bottom:12px;">
                    Monitoring
                </a>
            </div>
        </div>
    </div>
@endforeach
</div>

<!-- $ruangan->monitoring->suhu()->id; -->
