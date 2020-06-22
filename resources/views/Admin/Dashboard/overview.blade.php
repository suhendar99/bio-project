
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
