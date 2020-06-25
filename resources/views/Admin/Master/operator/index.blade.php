@extends('Admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Data Operator</h2>
                <div class="page-breadcrumb">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    @if(Auth::user()->level == "Admin")
                    <a href="{{ route('tambah.data.op') }}" class="btn btn-primary">
                        <i class="fas fa-user-plus"></i> Tambah Data 
                    </a>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>E Mail</th>
                                    <th>NIK</th>
                                    <th>No Handphone</th>
                                    @if(Auth::user()->level == "Admin")
                                    <th>Action</th>
                                    @endif
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
                                    @if($o->foto == "")
                                        <i class="fa fa-user fa-5x" style="margin-bottom: 20px;"></i>
                                    @else
                                    <img  src="{{ asset('foto/'.$o->foto) }}" keight="70px"width="70px">
                                    @endif
                                    </td>
                                    <td>{{ $o->name }}</td>
                                    <td>{{ $o->email }}</td>
                                    <td>{{ $o->nik }}</td>
                                    <td>{{ $o->no_hp }}</td>
                                    @if(Auth::user()->level == "Admin")
                                    <td>
                                        <a href="/operator_edit/{{$o->id}}" class="btn btn-primary"><i class=" fas fa-edit"></i> Edit</a>
                                        <button onclick="deletes({{ $o->id }})" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                                    </td>
                                    @endif
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
            formDelete.action = '/operator_delete/'+id
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
                    'Operator berhasil di hapus',
                    'success'
                    )
                }
            })
        }
        </script>            
@endsection