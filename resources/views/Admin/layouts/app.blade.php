<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('concept/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('concept/assets/vendor/fonts/circular-std/style.css') }}">
    <link rel="stylesheet" href="{{ asset('concept/assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('concept/assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('concept/assets/vendor/charts/chartist-bundle/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('concept/assets/vendor/charts/morris-bundle/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('concept/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('concept/assets/vendor/charts/c3charts/c3.css') }}">
    <link rel="stylesheet" href="{{ asset('concept/assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('concept/assets/vendor/datatables/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('concept/assets/vendor/datatables/css/buttons.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('concept/assets/vendor/datatables/css/select.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('concept/assets/vendor/datatables/css/fixedHeader.bootstrap4.css') }}">
    <title>| B I O F A R M A | </title>
    <script src="{{ asset('concept/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
                <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="#">B I O F A R M A</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="#" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">Nama</h5>
                                    <span class="status"></span><span class="ml-2">Achtive</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting Account</a>
                                <form id="logout-form" action="#" method="POST">
                                    @csrf
                                    <center><button class="btn btn-primary col-12"><i class="fas fa-power-off mr-2"></i>Logout</button></center>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('dashboard') }}"  aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-user"></i>Data Master</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('operator') }}">Data Operator</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('data.perangkat') }}">Data Perangkat</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('data.ruang') }}">Data Ruang</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('data.satuan') }}">Data Satuan</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#monitoring" aria-controls="monitoring"><i class="fa fa-fw fa-rocket"></i>Data Monitoring</a>
                                <div id="monitoring" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="{{ route('monitoring') }}">Raw Data</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('setting.monitoring') }}">Pengaturan Monitoring</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#laporan" aria-controls="laporan"><i class="fa fa-fw fa-rocket"></i>Laporan</a>
                                <div id="laporan" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('cetak.laporan') }}">Cetak Laporan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('setting.laporan') }}">Pengaturan Laporan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('setting.kirim.laporan') }}">Pengaturan Pengiriman Laporan</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#setting" aria-controls="setting"><i class="fa fa-fw fa-rocket"></i>Pengaturan</a>
                                <div id="setting" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('pengaturan.app') }}"  aria-controls="submenu-1">App</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('pengaturan.mqtt') }}"  aria-controls="submenu-1">MQTT</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                         Copyright © 2018 Concept. All rights reserved.
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- Optional JavaScript -->
    
    <!-- jquery 3.3.1 -->
    <script src="{{ asset('concept/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('concept/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('concept/assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('concept/assets/libs/js/main-js.js') }}"></script>
    <!-- chart chartist js -->
    <!-- <script src="{{ asset('concept/assets/vendor/charts/chartist-bundle/chartist.min.js') }}"></script> -->
    <!-- sparkline js -->
    <script src="{{ asset('concept/assets/vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
    <!-- morris js -->
    <script src="{{ asset('concept/assets/vendor/charts/morris-bundle/raphael.min.js') }}"></script>
    <!-- <script src="{{ asset('concept/assets/vendor/charts/morris-bundle/morris.js') }}"></script> -->
    <!-- chart c3 js -->
    <script src="{{ asset('concept/assets/vendor/charts/c3charts/c3.min.js') }}"></script>
    <script src="{{ asset('concept/assets/vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>
    <script src="{{ asset('concept/assets/vendor/charts/c3charts/C3chartjs.js') }}"></script>
    <script src="{{ asset('concept/assets/libs/js/dashboard-ecommerce.js') }}"></script>
    <script src="{{ asset('concept/assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('concept/assets/vendor/gauge/gauge.min.js') }}"></script>
    <script src="{{ asset('concept/assets/vendor/gauge/gauge.js') }}"></script>
    <script src="{{ asset('concept/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('concept/assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('concept/assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('concept/assets/libs/js/main-js.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('concept/assets/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('concept/assets/vendor/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('concept/assets/vendor/datatables/js/data-table.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>

</body>
 
</html>