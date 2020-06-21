@extends('Admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Data Satuan </h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Setting</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Satuan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- ============================================================== -->
    <!-- basic table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <a href="{{ route('tambahSatuan') }}" class="btn btn-primary">
              Tambah Data 
          </a>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Parameter</th>
                                <th>Satuan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach($data as $o)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $o->parameter }}</td>
                                <td>{{ $o->satuan }}</td>
                                <td>
                                    <a class="btn btn-primary" href="editSatuan/{{$o->id}}"><i class="fa fa-edit"> Edit</i></a>
                                    <a class="btn btn-danger" href="deleteSauan/{{$o->id}}}"><i class="fa fa-trash"> Delete</i></a>
                                </td>
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
@endsection