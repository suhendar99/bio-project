@extends('Admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Data Ruang</h2>
                <div class="page-breadcrumb">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">                            
                <div class="card-body">
                    <a href="{{ route('add.kirim') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>E Mail</th>
                                    <th>Type Pengiriman</th>
                                    <th>Waktu Pengiriman</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach( $setkirim as $r)
                            <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $r->operator->email }}</td>
                                    <td>{{ $r->status_kirim }}</td>
                                    <td>{{ $r->waktu_kirim }}</td>
                                    <td>
                                        <a href="/edit_kirim/{{ $r->id }}" class="btn btn-primary">Edit</a>
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
        formDelete.action = '/delete_kirim/'+id
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
                'Ruangan berhasil di hapus',
                'success'
                )
            }
        })
    }
</script>            
@endsection