@extends('Admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Data Operator</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Operator</li>
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
<<<<<<< HEAD
        <div class="card">
          <a href="{{ route('tambah.data.op') }}" class="btn btn-primary">
              Tambah Data 
          </a>
=======
        <div class="card">          
>>>>>>> d1b6433a4eb6948840a1cb1553d11736ec509cfb
            <div class="card-body">
                <a href="{{ route('tambah.data.op') }}" class="btn btn-primary">
                    Tambah Data 
                </a>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>E Mail</th>
                                <th>NIK</th>
                                <th>Instansi</th>
                                <th>No Handphone</th>
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
                                <td>
                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                    <a class="thumbnail" href="#">
                                    <img class="img-thumbnail" src="{{ asset('foto/'.$o->foto) }}">
                                    </a>
                                </div>
                                </td>
                                <td>{{ $o->name }}</td>
                                <td>{{ $o->email }}</td>
                                <td>{{ $o->nik }}</td>
                                <td>{{ $o->instansi }}</td>
                                <td>{{ $o->no_hp }}</td>
<<<<<<< HEAD
=======

>>>>>>> 45bb24e2dd2ce9d93d3cf5ecdba7fc05fa46bcd5
                                <td>
                                    <a href="/operator_edit/{{$o->id}}" class="btn btn-primary">Edit</a>
                                    <a href="/operator_delete/{{$o->id}}" class="btn btn-danger">Delete</a>
                                </td>
<<<<<<< HEAD
=======


>>>>>>> 45bb24e2dd2ce9d93d3cf5ecdba7fc05fa46bcd5
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