@extends('Admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Data Perangkat</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Perangkat</li>
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
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Series</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Status</th>
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