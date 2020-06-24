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
                    <div class="col-6 border-right">
                       <center>CVC</center> 
                    </div>
                    <div class="col-6">
                       <center>VVC</center> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 border-right">
                        <center> {{$d->monitoring? $d->monitoring->suhu:"0"}} {{$suhu->satuan}}
                        </center>
                    </div>
                    <div class="col-6" id="suhuRoom">
                        <center> {{$d->monitoring? $d->monitoring->suhu:"0"}} {{$suhu->satuan}}
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 border-right">
                        <center> {{$d->monitoring? $d->monitoring->kelembapan:"0"}} {{$kelembapan->satuan}}
                        </center>
                    </div>
                    <div class="col-6" id="suhuRoom">
                         <center> {{$d->monitoring? $d->monitoring->kelembapan:"0"}} {{$kelembapan->satuan}}
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 border-right">
                        <center> {{$d->monitoring? $d->monitoring->tekanan:"0"}} {{$tekanan->satuan}}
                        </center>
                    </div>
                    <div class="col-6" id="suhuRoom">
                        <center> {{$d->monitoring? $d->monitoring->tekanan:"0"}} {{$tekanan->satuan}}
                        </center>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center bg-dark">
                
            </div>
        </div>
    </div>
<!-- $ruangan->monitoring->suhu()->id; -->
@endforeach
</div>
