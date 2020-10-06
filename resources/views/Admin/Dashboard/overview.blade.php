<div class="row">

@foreach($data as $d)
    <div class="col-xl-4 col-md-12" style="padding: .5rem 2rem .5rem 2rem;">
        <div class="card bg-dark">
            <div class="card-header bg-dark text-white">
                <h3 style="color: white;">
                    <center>{{$d->nama}}</center>
                </h3>
            </div>
            <div class="card-body bg-dark text-white rounded">
                <div class="row">
                    <div class="col-6 border-right">
                        {{$suhu->parameter}}
                    </div>
                    <div class="col-3" id="suhuRoom">
                         {{$d->monitoring ? $d->monitoring->suhu:"0"}}
                    </div>
                    <div class="col-3">
                        {{$suhu->satuan}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 border-right">
                        {{$kelembapan->parameter}}
                    </div>
                    <div class="col-3">
                         {{$d->monitoring ? $d->monitoring->kelembapan:"0"}}
                    </div>
                    <div class="col-3">
                        {{$kelembapan->satuan}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 border-right">
                        {{$tekanan->parameter}}
                    </div>
                    <div class="col-3">
                         {{$d->monitoring ? $d->monitoring->tekanan:"0"}}
                    </div>
                    <div class="col-3">
                        {{$tekanan->satuan}}
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center bg-dark">
                <a href="/room/{{$d->id}}" class="btn btn-primary col-md-8 btn-sm" style="margin-bottom:12px;">
                    Monitoring
                </a>
            </div>
        </div>
    </div>
<!-- $ruangan->monitoring->suhu()->id; -->
@endforeach
<div class="col-4">
    <div id="calendar" ></div>
</div>
</div>
