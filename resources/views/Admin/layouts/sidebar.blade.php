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
                            <li class="nav-link">
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
                                            <a class="nav-link" href="{{ route('monitoring') }}">Raw Data</a>
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