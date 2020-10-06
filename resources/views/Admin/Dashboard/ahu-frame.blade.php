{{-- <div class="card-body"> --}}
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
        height: 100%;
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
        margin: 5px;
    }

    .wrap {
        position: absolute;
        z-index: 1000;
        display: flex;
        justify-content: center;
        align-items: center;
        /*transform: scale(.7,.7);*/
        width: 100px;
        height: 50px;
    }

    .wrap-uji-title {
        left: 7rem;
        top: 18rem;
        width: 16.5rem;
    }

    .wrap-uji-suhu {
        left: 7rem;
        top: 22rem;
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
        top: 22rem;
    }

    .wrap-uji-kelembapan::before {
        position: absolute;
        content: 'Kelembapan';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }

    .wrap-uji-tekanan {
        left: 17rem;
        top: 22rem;
    }

    .wrap-uji-tekanan::before {
        position: absolute;
        content: 'Kelembapan';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }

    .wrap-uji-cvc {
        left: 9rem;
        top: 26rem;
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
        top: 26rem;
    }

    .wrap-uji-vvc::before {
        position: absolute;
        content: 'VVC';
        z-index: 1001;
        top: -1rem;
        text-align: center;
    }


    @media only screen and (max-width: 680px) {
        
        .ahu-outer {
            /*transform: scale(.5,.5);
            transform: rotate(90deg);*/
        }

        .ahu-wrapper {
            /*transform: rotate(90deg);*/
        }

        .img-ahu {
            position: relative;
        }
    }
</style>
    <div class="row">
        <iframe src="/ahu"></iframe>        
    </div>
