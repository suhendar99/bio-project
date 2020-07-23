@extends('Admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Pengaturan Pengiriman Laporan</h2>
            <div class="page-breadcrumb">
            </div>
        </div>
    </div>
</div>
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
                                <a class="nav-link active" id="home-tab-justify" data-toggle="tab" href="#home-justify" role="tab" aria-controls="home" aria-selected="true">Laporan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab-justify" data-toggle="tab" href="#contact-justify" role="tab" aria-controls="contact" aria-selected="false">Alarm</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent7" bg-dark>
                            <div class="tab-pane fade show active" id="home-justify" role="tabpanel" aria-labelledby="home-tab-justify">
                            @include('Admin.Laporan.Setting_kirim.index')
                            </div>

                            <div class="tab-pane fade" id="contact-justify" role="tabpanel" aria-labelledby="contact-tab-justify">
                            @include('Admin.Laporan.Alarm.alarm')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
