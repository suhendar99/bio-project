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
        /*transform: scale(.5,.5);*/
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

    .img-ahu {
        width: 100%;
        height: auto;
        object-fit: scale-down;
    }

    .tab-content{
        padding: 0 !important;
    }

    .text-dyn {
        border: 1px solid;
        padding: 5px 10px 5px 10px;
        width: 100%;
        height: auto;
        text-align: center;
        /* margin: 5px; */
        background: white;
    }

    .wrap {
        position: absolute;
        z-index: 1000;
        display: flex;
        justify-content: center;
        align-items: center;
        transform: scale(.8,.8);
        width: 100px;
        height: 50px;
    }

    /*START UJI POSTION*/

    .wrap-uji-title {
        left: 7rem;
        top: 12rem;
        width: 16.5rem;
    }

    .wrap-uji-suhu {
        left: 6rem;
        top: 15.5rem;
    }

    .wrap-uji-suhu::before {
        position: absolute;
        content: 'Suhu';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }

    .wrap-uji-kelembapan {
        left: 12rem;
        top: 15.5rem;
    }

    .wrap-uji-kelembapan::before {
        position: absolute;
        content: 'Kelembapan';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }

    .wrap-uji-tekanan {
        left: 18rem;
        top: 15.5rem;
    }

    .wrap-uji-tekanan:before{
        position: absolute;
        content: 'Kelembapan';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }

    .wrap-uji-cvc {
        left: 9rem;
        top: 19rem;
    }

    .wrap-uji-cvc::before {
        position: absolute;
        content: 'CVC';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }

    .wrap-uji-vvc {
        left: 15rem;
        top: 19rem;
    }

    .wrap-uji-vvc::before {
        position: absolute;
        content: 'VVC';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }

    /*END UJI POSTION*/

    /*START AIRLOCK POSITION*/

    .wrap-airlock-title {
        left: 25.5rem;
        top: 6rem;
        width: 16.5rem;
    }
    .wrap-airlock-suhu {
        left: 27rem;
        top: 12.5rem;
    }
    .wrap-airlock-suhu::before {
        position: absolute;
        content: 'Suhu';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }
    .wrap-airlock-kelembapan {
        left: 27rem;    
        top: 16rem;
    }
    .wrap-airlock-kelembapan::before {
        position: absolute;
        content: 'Kelembapan';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }
    .wrap-airlock-tekanan {
        left: 27rem;
        top: 19rem;
    }
    .wrap-airlock-tekanan::before {
        position: absolute;
        content: 'Tekanan';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }
    .wrap-airlock-cvc {
        left: 33rem;
        top: 12.5rem;
    }
    .wrap-airlock-cvc::before {
        position: absolute;
        content: 'CVC';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }
    .wrap-airlock-vvc {
        left: 33rem;   
        top: 16rem;
    }
    .wrap-airlock-vvc::before {
        position: absolute;
        content: 'VVC';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }

    /*END AIRLOCK POSITION*/

    /*START sample POSITION*/

    .wrap-sample-title {
        left: 22rem;
        top: 23.5rem;
        width: 16.5rem;
    }
    .wrap-sample-suhu {
        left: 24.5rem;
        top: 28.5rem;
    }
    .wrap-sample-suhu::before {
        position: absolute;
        content: 'Suhu';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }
    .wrap-sample-kelembapan {
        left: 24.5rem;
        top: 31.5rem;
    }
    .wrap-sample-kelembapan::before {
        position: absolute;
        content: 'Kelembapan';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }
    .wrap-sample-tekanan {
        left: 24.5rem;
        top: 34.5rem;
    }
    .wrap-sample-tekanan::before {
        position: absolute;
        content: 'Tekanan';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }
    .wrap-sample-cvc {
        left: 30rem;
        top: 28.5rem;
    }
    .wrap-sample-cvc::before {
        position: absolute;
        content: 'CVC';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }
    .wrap-sample-vvc {
        left: 30rem;
        top: 31.5rem;
    }
    .wrap-sample-vvc::before {
        position: absolute;
        content: 'VVC';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }

    /*END sample POSITION*/

    /*START dressing POSITION*/

    .wrap-dressing-title {
        left: 42rem;
        top: 6rem;
        width: 16.5rem;
    }
    .wrap-dressing-suhu {
        left: 44rem;
        top: 13rem;
    }
    .wrap-dressing-suhu::before {
        position: absolute;
        content: 'Suhu';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }
    .wrap-dressing-kelembapan {
        left: 44rem;
        top: 16rem;
    }
    .wrap-dressing-kelembapan::before {
        position: absolute;
        content: 'Kelembapan';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }
    .wrap-dressing-tekanan {
        left: 44rem;
        top: 19rem;
    }
    .wrap-dressing-tekanan::before {
        position: absolute;
        content: 'Tekanan';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }
    .wrap-dressing-cvc {
        left: 51rem;
        top: 13rem;
    }
    .wrap-dressing-cvc::before {
        position: absolute;
        content: 'CVC';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }
    .wrap-dressing-vvc {
        left: 51rem;
        top: 16rem;
    }
    .wrap-dressing-vvc::before {
        position: absolute;
        content: 'VVC';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }

    /*END dressing POSITION*/

    /*START vestibule POSITION*/

    .wrap-vestibule-title {
        left: 38rem;
        top: 23rem;
        width: 16.5rem;
    }
    .wrap-vestibule-suhu {
        left: 37rem;
        top: 28.5rem;
    }
    .wrap-vestibule-suhu::before {
        position: absolute;
        content: 'Suhu';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }
    .wrap-vestibule-kelembapan {
        left: 43rem;
        top: 28.5rem;
    }
    .wrap-vestibule-kelembapan::before {
        position: absolute;
        content: 'Kelembapan';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }
    .wrap-vestibule-tekanan {
        left: 49rem;
        top: 28.5rem;
    }
    .wrap-vestibule-tekanan::before {
        position: absolute;
        content: 'Tekanan';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }
    .wrap-vestibule-cvc {
        left: 40rem;
        top: 32rem;
    }
    .wrap-vestibule-cvc::before {
        position: absolute;
        content: 'CVC';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }
    .wrap-vestibule-vvc {
        left: 46rem;
        top: 32rem;
    }
    .wrap-vestibule-vvc::before {
        position: absolute;
        content: 'VVC';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }

    /*END vestibule POSITION*/


    @media only screen and (max-width: 680px) {
        
        .ahu-outer {
            /*transform: scale(.5,.5);
            transform: rotate(90deg);*/
        }

        .ahu-wrapper {
            overflow: scroll;
            /*transform: rotate(90deg);*/
        }

        .img-ahu {
            width: 1020px;
            height: 667px;
            object-fit: scale-down;
        }

        .ahu-row {
            margin: 0 !important;
        }

        .wrap-uji-suhu::before {
            position: absolute;
            content: 'Suhu';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-uji-kelembapan::before {
            position: absolute;
            content: 'Kelembapan';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-uji-tekanan:before{
            position: absolute;
            content: 'Kelembapan';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-uji-cvc::before {
            position: absolute;
            content: 'CVC';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-uji-vvc::before {
            position: absolute;
            content: 'VVC';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-airlock-suhu::before {
            position: absolute;
            content: 'Suhu';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-airlock-kelembapan::before {
            position: absolute;
            content: 'Kelembapan';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-airlock-tekanan::before {
            position: absolute;
            content: 'Tekanan';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-airlock-cvc::before {
            position: absolute;
            content: 'CVC';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-airlock-vvc::before {
            position: absolute;
            content: 'VVC';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-sample-suhu::before {
            position: absolute;
            content: 'Suhu';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-sample-kelembapan::before {
            position: absolute;
            content: 'Kelembapan';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-sample-tekanan::before {
            position: absolute;
            content: 'Tekanan';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-sample-cvc::before {
            position: absolute;
            content: 'CVC';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-sample-vvc::before {
            position: absolute;
            content: 'VVC';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-dressing-suhu::before {
            position: absolute;
            content: 'Suhu';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-dressing-kelembapan::before {
            position: absolute;
            content: 'Kelembapan';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-dressing-tekanan::before {
            position: absolute;
            content: 'Tekanan';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-dressing-cvc::before {
            position: absolute;
            content: 'CVC';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-dressing-vvc::before {
            position: absolute;
            content: 'VVC';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-vestibule-suhu::before {
            position: absolute;
            content: 'Suhu';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-vestibule-kelembapan::before {
            position: absolute;
            content: 'Kelembapan';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-vestibule-tekanan::before {
            position: absolute;
            content: 'Tekanan';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-vestibule-cvc::before {
            position: absolute;
            content: 'CVC';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
        .wrap-vestibule-vvc::before {
            position: absolute;
            content: 'VVC';
            z-index: 1001;
            top: -.5rem;
            text-align: center;
        }
    }
</style>
{{-- <div class="card-body"> --}}
    <div class="row ahu-row">
        <div class="col-12 ahu-wrapper">
            <div class="wrap wrap-uji-title"><h3>Ruang Uji</h3></div>
            <div class="wrap wrap-uji-suhu"><div class="text-dyn"><span id="uji-suhu">{{$uji->suhu}}</span> °C <br></div></div>
            <div class="wrap wrap-uji-kelembapan"><div class="text-dyn"><span id="uji-kelembapan">{{$uji->kelembapan}}</span> % <br></div></div>
            <div class="wrap wrap-uji-tekanan"><div class="text-dyn"><span id="uji-tekanan">{{$uji->tekanan}}</span> Pa <br></div></div>
            <div class="wrap wrap-uji-cvc"><div class="text-dyn"><span id="uji-cvc">{{$uji->cvc}}</span> CMH <br></div></div>
            <div class="wrap wrap-uji-vvc"><div class="text-dyn"><span id="uji-vvc">{{$uji->vvc}}</span> CMH <br></div></div>

            <div class="wrap wrap-airlock-title"><h3>Ruang Airlock</h3></div>
            <div class="wrap wrap-airlock-suhu"><div class="text-dyn"><span id="airlock-suhu">{{$airlock->suhu}}</span> °C <br></div></div>
            <div class="wrap wrap-airlock-kelembapan"><div class="text-dyn"><span id="airlock-kelembapan">{{$airlock->kelembapan}}</span> % <br></div></div>
            <div class="wrap wrap-airlock-tekanan"><div class="text-dyn"><span id="airlock-tekanan">{{$airlock->tekanan}}</span> Pa <br></div></div>
            <div class="wrap wrap-airlock-cvc"><div class="text-dyn"><span id="airlock-cvc">{{$airlock->cvc}}</span> CMH <br></div></div>
            <div class="wrap wrap-airlock-vvc"><div class="text-dyn"><span id="airlock-vvc">{{$airlock->vvc}}</span> CMH <br></div></div>

            <div class="wrap wrap-sample-title"><h3>Ruang Sample</h3></div>
            <div class="wrap wrap-sample-suhu"><div class="text-dyn"><span id="sample-suhu">{{$sample->suhu}}</span> °C <br></div></div>
            <div class="wrap wrap-sample-kelembapan"><div class="text-dyn"><span id="sample-kelembapan">{{$sample->kelembapan}}</span> % <br></div></div>
            <div class="wrap wrap-sample-tekanan"><div class="text-dyn"><span id="sample-tekanan">{{$sample->tekanan}}</span> Pa <br></div></div>
            <div class="wrap wrap-sample-cvc"><div class="text-dyn"><span id="sample-cvc">{{$sample->cvc}}</span> CMH <br></div></div>
            <div class="wrap wrap-sample-vvc"><div class="text-dyn"><span id="sample-vvc">{{$sample->vvc}}</span> CMH <br></div></div>

            <div class="wrap wrap-dressing-title"><h3>Ruang Dressing</h3></div>
            <div class="wrap wrap-dressing-suhu"><div class="text-dyn"><span id="dressing-suhu">{{$dressing->suhu}}</span> °C <br></div></div>
            <div class="wrap wrap-dressing-kelembapan"><div class="text-dyn"><span id="dressing-kelembapan">{{$dressing->kelembapan}}</span> % <br></div></div>
            <div class="wrap wrap-dressing-tekanan"><div class="text-dyn"><span id="dressing-tekanan">{{$dressing->tekanan}}</span> Pa <br></div></div>
            <div class="wrap wrap-dressing-cvc"><div class="text-dyn"><span id="dressing-cvc">{{$dressing->cvc}}</span> CMH <br></div></div>
            <div class="wrap wrap-dressing-vvc"><div class="text-dyn"><span id="dressing-vvc">{{$dressing->vvc}}</span> CMH <br></div></div>

            <div class="wrap wrap-vestibule-title"><h3>Ruang Vestibule</h3></div>
            <div class="wrap wrap-vestibule-suhu"><div class="text-dyn"><span id="vestibule-suhu">{{$vestibule->suhu}}</span> °C <br></div></div>
            <div class="wrap wrap-vestibule-kelembapan"><div class="text-dyn"><span id="vestibule-kelembapan">{{$vestibule->kelembapan}}</span> % <br></div></div>
            <div class="wrap wrap-vestibule-tekanan"><div class="text-dyn"><span id="vestibule-tekanan">{{$vestibule->tekanan}}</span> Pa <br></div></div>
            <div class="wrap wrap-vestibule-cvc"><div class="text-dyn"><span id="vestibule-cvc">{{$vestibule->cvc}}</span> CMH <br></div></div>
            <div class="wrap wrap-vestibule-vvc"><div class="text-dyn"><span id="vestibule-vvc">{{$vestibule->vvc}}</span> CMH <br></div></div>
            <img class="img-ahu" src="{{asset('ahu.png')}}">
        </div>
    </div>
    {{-- <div class="row ahu-outer"> 
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
    </div> --}}
{{-- </div> --}}
