@extends('Admin.layouts.app')

@section('content')
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Data Perangkat</h2>
                            <div class="page-breadcrumb">
                                
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
                                @if(Auth::user()->level == 'Admin')
                                <a href="{{ route('tambah.data.per') }}" class="btn btn-primary">Tambah Data</a>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Series</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Status</th>
                                                <th>Tanggal Aktivasi</th>
                                                @if(Auth::user()->level == 'Admin')
                                                <th>Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $no =1;
                                        ?>
                                        @foreach($perangkat as $p)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $p->no_seri }}</td>
                                                <td>{{ $p->latitude }}</td>
                                                <td>{{ $p->longitude }}</td>
                                                <td>{{ $p->status }}</td>
                                                <td>{{ $p->tgl_aktivasi }}</td>
                                                @if(Auth::user()->level == 'Admin')
                                                <td>
                                                    <a href="/edit_per/{{ $p->id }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                                    <button onclick="deletes({{ $p->id }})" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
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
        formDelete.action = '/per_delete/'+id
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
                'Perangkat berhasil di hapus',
                'success'
                )
            }
        })
    }
</script>
@endsection