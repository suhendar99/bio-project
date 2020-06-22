@extends('Admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Pengaturan Laporan</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pengaturan Laporan</li>
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
                                <th>Icon</th>
                                <th>Footer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach($laporan as $o)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                    <a class="thumbnail" href="#">
                                    <img class="img-thumbnail" src="{{ asset('foto/'.$o->header_img) }}">
                                    </a>
                                </div>
                                </td>
                                <td>{{ $o->icon }}</td>
                                <td>{{ $o->footer }}</td>
                                <td>
                                    <a href="/operator_edit/{{$o->id}}" class="btn btn-primary">Edit</a>
                                    <button onclick="deletes({{ $o->id }})" class="btn btn-danger">Delete</button>
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
<form action="" id="formDelete" method="POST">
    @csrf
    @method('DELETE')

</form>

<script src="/assets/vendor/sweetalert/sweetalert.min.js"></script>

<script>
     function deletes(id){
        const formDelete = document.getElementById('formDelete')
        formDelete.action = '/operator_delete/'+id
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                formDelete.submit();
                Swal.fire(
                'Deleted!',
                'Operator berhasil di hapus',
                'success'
                )
            }
        })
    }
</script>            
@endsection