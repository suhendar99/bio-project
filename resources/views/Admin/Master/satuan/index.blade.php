@extends('Admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Data Satuan</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Satuan</li>
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
                    <a class="btn btn-primary" href="{{route('satuan.create')}}">Tambah Data</a>
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
                            <?php $no = 1; ?>
                            @foreach( $data as $r)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $r->parameter}}</td>
                                    <td>{{ $r->satuan }}</td>
                                    <td>
                                        <a href="{{ route('satuan.edit', $r->id) }}" class="btn btn-primary">Edit</a>
                                        <button onclick="deletes({{ $r->id }})" class="btn btn-danger">Delete</button>
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
</div>

<form action="" id="formDelete" method="POST">
    @csrf
    @method('DELETE')

</form>

<script src="/assets/vendor/sweetalert/sweetalert.min.js"></script>

<script>
     function deletes(id){
        const formDelete = document.getElementById('formDelete')
        formDelete.action = '/satuan/'+id
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
                'Satuan berhasil di hapus',
                'success'
                )
            }
        })
    }
</script>
@endsection