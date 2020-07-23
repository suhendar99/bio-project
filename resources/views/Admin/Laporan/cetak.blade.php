@php
    $monitoring = \App\Monitoring::whereDate('date',now())->orderBy('time','desc')->limit(10)->orderBy('time','asc')->get();
    $data = [];

@endphp
@extends('Admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Cetak Laporan</h2>
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
                                <a class="nav-link active" id="home-tab-justify" data-toggle="tab" href="#home-justify" role="tab" aria-controls="home" aria-selected="true">Cetak Laporan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab-justify" data-toggle="tab" href="#profile-justify" role="tab" aria-controls="profile" aria-selected="false">View Chart</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent7" bg-dark>
                            <div class="tab-pane fade show active" id="home-justify" role="tabpanel" aria-labelledby="home-tab-justify">
                            @if (session()->has('alert'))
                                <div class="alert alert-danger">
                                    {{ session()->get('alert') }}
                                </div>
                            @endif
                            @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                            @endif
                            @if (session()->has('failed'))
                                <div class="alert alert-danger">
                                    {{ session()->get('failed') }}
                                </div>
                            @endif
                            <form action="/downloadLaporan" method="post" id="formqq">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="input-select">Tanggal Awal</label>
                                            <input type="date" name="awal" class="form-control  @error('awal') is-invalid @enderror" >
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
                                            <input type="date" name="akhir" class="form-control @error('akhir') is-invalid @enderror" >
                                            @error('akhir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Ruangan</label>
                                            <select name="ruang" class="form-control">
                                                <option value="all">Semua ruangan</option>
                                                @foreach($ruang as $f)
                                                    <option value="{{ $f->id }}">{{ $f->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Parameter</label>
                                            <select name="satuan" class="form-control">
                                                <option value="allper">Semua parameter</option>

                                                <option value="suhu">Suhu</option>}
                                                <option value="kelembapan">Kelembapan</option>}
                                                <option value="tekanan">Tekanan</option>}
                                                option
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="checkPdf">
                                            <label class="form-check-label" for="checkPdf">
                                                PDF
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="checkExcel">
                                            <label class="form-check-label" for="checkExcel">
                                                Excel
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                    <button class="btn btn-primary" type="submit" name="btpdf">Cetak Laporan</button>
                                    </div>
                                </div>
                            </form>

                            </div>
                            <div class="tab-pane fade" id="profile-justify" role="tabpanel" aria-labelledby="profile-tab-justify">
                            @include('Admin.Laporan.chartView')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/assets/vendor/sweetalert/sweetalert.min.js"></script>

<script>

    const formExcel = ()=>{
        const pdf = document.querySelector("#checkPdf");
        const excel = document.querySelector("#checkExcel");
        const actionForm = document.querySelector("#formqq");

        pdf.checked = true;

        pdf.addEventListener('click', e=>{
            if(excel.checked == true){
                excel.checked = false;
            }
            actionForm.action = "http://localhost:8000/downloadLaporan";
        });
        excel.addEventListener('click', e=>{
            if(pdf.checked == true){
                pdf.checked = false;
            }
            actionForm.action = "{{ route('download.excel') }}";
        });
    }

    formExcel();

</script>

<!-- ============================================================== -->
<!-- end select options  -->
<!-- ============================================================== -->
@endsection

