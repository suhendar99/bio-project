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
                    @if(Auth::user()->level == "Admin")
                    {{-- <a href="{{ route('data_ruang.create') }}" class="btn btn-primary">Tambah ruangan</a> --}}
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Ruang</th>
                                    <th>Foto</th>
                                    <th>Nama Ruang</th>
                                    <th>Set point Suhu</th>
                                    <th>Set point Kelembapan</th>
                                    <th>Set point Tekanan</th>
                                    @if(Auth::user()->level == "Admin")
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach( $data as $r)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $r->id }}</td>
                                    <td>
                                        @if($r->foto == null)
                                        <img src="https://images.unsplash.com/photo-1558882224-dda166733046?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=749&q=80" alt="" srcset="" style="width:100px; height:100px; object-fit:scale-down;">
                                        @else
                                        <img src="{{ $r->foto }}" alt="" srcset="" style="width:100px; height:100px; object-fit:scale-down;">
                                        @endif
                                    </td>
                                    <td>{{ $r->nama }}</td>
                                    <td>Max : {{$r->smax}}<br>Min : {{$r->smin}}</td>
                                    <td>Max : {{$r->kmax}}<br>Min : {{$r->kmin}}</td>
                                    <td>Max : {{$r->tmax}}<br>Min : {{$r->tmin}}</td>
                                    @if(Auth::user()->level == "Admin")
                                    <td>
                                        <a href="{{ route('data_ruang.edit', $r->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                        {{-- <button onclick="deletes({{ $r->id }})" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button> --}}
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


<form action="" id="formDelete" method="get">
    @csrf

</form>

<script src="/assets/vendor/sweetalert/sweetalert.min.js"></script>

<script>
     function deletes(id){
        const formDelete = document.getElementById('formDelete')
        formDelete.action = '/data_ruang/delete/'+id
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
                'Data berhasil di hapus',
                'success'
                )
            }
        })
    }
</script>
@endsection
