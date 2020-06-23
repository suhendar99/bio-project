@extends('Admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Setting Monitoring</h2>
                <div class="page-breadcrumb">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('tambah.set.monitor') }}" class="btn btn-primary">
                        Tambah Data 
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ruangan</th>
                                    <th>Parameter</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                @foreach($monitor as $o)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $o->ruangan->nama }}</td>
                                    <td>{{ $o->parameter }}</td>
                                    <td>{{ $o->max }}</td>
                                    <td>{{ $o->min }}</td>
                                    <td>
                                        <a href="/set_edit_monitor/{{ $o->id }}" class="btn btn-primary">Edit</a>
                                        <!-- <button onclick="deletes({{ $o->id }})" class="btn btn-danger">Delete</button> -->
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
    
    <form action="" id="formDelete" method="POST">
        @csrf
        @method('DELETE')

    </form>

    <script src="/assets/vendor/sweetalert/sweetalert.min.js"></script>

    <script>
        function deletes(id){
            const formDelete = document.getElementById('formDelete')
            formDelete.action = '/delete_monitor/'+id
            Swal.fire({
            title: 'Are you sure ?',
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
                    'Data berhasil di hapus',
                    'success'
                    )
                }
            })
        }
        </script>            
@endsection