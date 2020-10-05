@php
$airlock = \App\Monitoring::where('ruangan_id',1)->latest()->first();
// dd($airlock);
$vestibule = \App\Monitoring::where('ruangan_id',2)->latest()->first();
$dressing = \App\Monitoring::where('ruangan_id',3)->latest()->first();
$sample = \App\Monitoring::where('ruangan_id',4)->latest()->first();
$uji = \App\Monitoring::where('ruangan_id',5)->latest()->first();
@endphp
<style type="text/css">
    .ahu-outer {
        padding: 1rem;
        height: auto;
    }

    .ruji {
        height: 50vh;
    }

    .airlock {
        height: 25vh;
    }

    .sample {
        height: 25vh;
    }

    .dr {
        height: 30vh;
    }

    .vest {
        height: 20vh;
    }

    .room-ahu {
        padding: 1rem;
        border: 1px solid;
    }

    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: auto;
    }

    .btn-block {
        border-radius: 0 !important;
    }
</style>
 <div class="row ahu-outer">
    <div class="col-4 ruji room-ahu wrapper">
        <div class="row">
            <div class="col-12 wrapper">
                <h4>Ruang Uji</h4>
            </div>
            <div class="col-4 my-2 px-4">
                <div class="row wrapper">
                    <span>Suhu</span>
                </div>
                <div class="row wrapper">
                    <button class="btn btn-sm btn-block btn-danger"><span id="uji-suhu">{{$uji->suhu}}</span> °C</button>
                </div>
            </div>
            <div class="col-4 my-2 px-4">
                <div class="row wrapper">
                    <span>Kelembapan</span>
                </div>
                <div class="row wrapper">
                    <button class="btn btn-sm btn-block btn-danger"><span id="uji-kelembapan">{{$uji->kelembapan}}</span> %</button>
                </div>
            </div>
            <div class="col-4 my-2 px-4">
                <div class="row wrapper">
                    <span>Tekanan</span>
                </div>
                <div class="row wrapper">
                    <button class="btn btn-sm btn-block btn-danger"><span id="uji-tekanan">{{$uji->tekanan}}</span> Pa</button>
                </div>
            </div>
            <div class="col-6 my-2 px-4">
                <div class="row wrapper">
                    <span>CVC</span>
                </div>
                <div class="row wrapper">
                    <button class="btn btn-sm btn-block btn-danger"><span id="uji-cvc">{{$uji->cvc}}</span> CMH</button>
                </div>
            </div>
            <div class="col-6 my-2 px-4">
                <div class="row wrapper">
                    <span>VVC</span>
                </div>
                <div class="row wrapper">
                    <button class="btn btn-sm btn-block btn-danger"><span id="uji-vvc">{{$uji->vvc}}</span> CMH</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-12 airlock room-ahu wrapper">
                        <div class="row">
                            <div class="col-12 wrapper">
                                <h4>Ruang Airlock</h4>
                            </div>
                            <div class="col-4 my-2 px-4">
                                <div class="row wrapper">
                                    <span>Suhu</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="airlock-suhu">{{$airlock->suhu}}</span> °C</button>
                                </div>
                            </div>
                            <div class="col-4 my-2 px-4">
                                <div class="row wrapper">
                                    <span>Kelembapan</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="airlock-kelembapan">{{$airlock->kelembapan}}</span> %</button>
                                </div>
                            </div>
                            <div class="col-4 my-2 px-4">
                                <div class="row wrapper">
                                    <span>Tekanan</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="airlock-tekanan">{{$airlock->tekanan}}</span> Pa</button>
                                </div>
                            </div>
                            <div class="col-6 my-2 px-4">
                                <div class="row wrapper">
                                    <span>CVC</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="airlock-cvc">{{$airlock->cvc}}</span> CMH</button>
                                </div>
                            </div>
                            <div class="col-6 my-2 px-4">
                                <div class="row wrapper">
                                    <span>VVC</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="airlock-vvc">{{$airlock->vvc}}</span> CMH</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 sample room-ahu wrapper">
                        <div class="row">
                            <div class="col-12 wrapper">
                                <h4>Ruang Sample</h4>
                            </div>
                            <div class="col-4 my-2 px-4">
                                <div class="row wrapper">
                                    <span>Suhu</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="sample-suhu">{{$sample->suhu}}</span> °C</button>
                                </div>
                            </div>
                            <div class="col-4 my-2 px-4">
                                <div class="row wrapper">
                                    <span>Kelembapan</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="sample-kelembapan">{{$sample->kelembapan}}</span> %</button>
                                </div>
                            </div>
                            <div class="col-4 my-2 px-4">
                                <div class="row wrapper">
                                    <span>Tekanan</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="sample-tekanan">{{$sample->tekanan}}</span> Pa</button>
                                </div>
                            </div>
                            <div class="col-6 my-2 px-4">
                                <div class="row wrapper">
                                    <span>CVC</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="sample-cvc">{{$sample->cvc}}</span> CMH</button>
                                </div>
                            </div>
                            <div class="col-6 my-2 px-4">
                                <div class="row wrapper">
                                    <span>VVC</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="sample-vvc">{{$sample->vvc}}</span> CMH</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12 dr room-ahu wrapper">
                        <div class="row">
                            <div class="col-12 wrapper">
                                <h4>Ruang Dressing</h4>
                            </div>
                            <div class="col-4 my-2 px-4">
                                <div class="row wrapper">
                                    <span>Suhu</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="dressing-suhu">{{$dressing->suhu}}</span> °C</button>
                                </div>
                            </div>
                            <div class="col-4 my-2 px-4">
                                <div class="row wrapper">
                                    <span>Kelembapan</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="dressing-kelembapan">{{$dressing->kelembapan}}</span> %</button>
                                </div>
                            </div>
                            <div class="col-4 my-2 px-4">
                                <div class="row wrapper">
                                    <span>Tekanan</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="dressing-tekanan">{{$dressing->tekanan}}</span> Pa</button>
                                </div>
                            </div>
                            <div class="col-6 my-2 px-4">
                                <div class="row wrapper">
                                    <span>CVC</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="dressing-cvc">{{$dressing->cvc}}</span> CMH</button>
                                </div>
                            </div>
                            <div class="col-6 my-2 px-4">
                                <div class="row wrapper">
                                    <span>VVC</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="dressing-vvc">{{$dressing->vvc}}</span> CMH</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 vest room-ahu wrapper">
                        <div class="row">
                            <div class="col-12 wrapper">
                                <h4>Ruang Vestibule</h4>
                            </div>
                            <div class="col-4 my-2 px-4">
                                <div class="row wrapper">
                                    <span>Suhu</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="vestibule-suhu">{{$vestibule->suhu}}</span> °C</button>
                                </div>
                            </div>
                            <div class="col-4 my-2 px-4">
                                <div class="row wrapper">
                                    <span>Kelembapan</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="vestibule-kelembapan">{{$vestibule->kelembapan}}</span> %</button>
                                </div>
                            </div>
                            <div class="col-4 my-2 px-4">
                                <div class="row wrapper">
                                    <span>Tekanan</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="vestibule-tekanan">{{$vestibule->tekanan}}</span> Pa</button>
                                </div>
                            </div>
                            <div class="col-6 my-2 px-4">
                                <div class="row wrapper">
                                    <span>CVC</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="vestibule-cvc">{{$vestibule->cvc}}</span> CMH</button>
                                </div>
                            </div>
                            <div class="col-6 my-2 px-4">
                                <div class="row wrapper">
                                    <span>VVC</span>
                                </div>
                                <div class="row wrapper">
                                    <button class="btn btn-sm btn-block btn-danger"><span id="vestibule-vvc">{{$vestibule->vvc}}</span> CMH</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- @foreach($data as $d)
    <div class="col-xl-4 col-md-12"  style="width:20rem;">
        <div class="card bg-dark">
            <div class="card-header bg-dark text-white">
                <h3 style="color: white;">
                    <center>{{$d->nama}}</center>
                </h3>
            </div>
            <div class="card-body bg-dark text-white rounded">
                <div class="row">
                    <div class="col-4">
                        <center>
                            <small>Suhu(C)</small>
                        </center> 
                    </div>
                    <div class="col-4">
                        <center>
                            <small>Kelempan(%)</small>
                        </center> 
                    </div>
                    <div class="col-4">
                        <center>
                            <small>Tekanan(Pa)</small>
                        </center> 
                     </div>
                </div>
                <div class="row">
                    <div class="col-4 border-right" id="suhuRoom">
                        <center> {{$d->monitoring? $d->monitoring->suhu:"0"}} {{$suhu->satuan}}
                        </center>
                    </div>
                    <div class="col-4" id="suhuRoom">
                         <center> {{$d->monitoring? $d->monitoring->kelembapan:"0"}} {{$kelembapan->satuan}}
                        </center>
                    </div>
                    <div class="col-4 border-left" id="suhuRoom">
                        <center> {{$d->monitoring? $d->monitoring->tekanan:"0"}} {{$tekanan->satuan}}
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <center>
                            <small>CVC</small>
                        </center> 
                    </div>
                    <div class="col-6">
                        <center>
                            <small>VVC </small>
                        </center> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 border-right">
                        <center> {{$d->monitoring? $d->monitoring->cvc:"0"}} %
                        </center>
                    </div>
                    <div class="col-6">
                        <center> {{$d->monitoring ? $d->monitoring->vvc:"0"}} %
                        </center>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center bg-dark">
                
            </div>
        </div>
    </div>
<!-- $ruangan->monitoring->suhu()->id; -->
@endforeach --}}
</div>
