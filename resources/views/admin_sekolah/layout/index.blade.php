<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Web - Go School</title>
        @yield('css')
        <link href="/admin_sekolah/css/cdn_style.min.css" rel="stylesheet" />
        <link href="/admin_sekolah/css/styles.css" rel="stylesheet" />
        <script src="/admin_sekolah/js/fontawesome.all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/swall/swall.css">
        <script src="/swall/swall.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="/admin/sekolah"><b>@yield('head_identitas')</b></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/home">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="/admin/sekolah/profile">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                                Profile
                            </a>
                            <div class="sb-sidenav-menu-heading">Siswa</div>
                            <a class="nav-link" href="/admin/sekolah/jurusan">
                                <div class="sb-nav-link-icon"><i class="fas fa-filter"></i></div>
                                Jurusan
                            </a>
                            <a class="nav-link" href="/admin/sekolah/kelas">
                                <div class="sb-nav-link-icon"><i class="fas fa-braille"></i></div>
                                Kelas
                            </a>
                            <a class="nav-link" href="/admin/sekolah/daftar_siswa">
                                <div class="sb-nav-link-icon"><i class="fas fa-server"></i></div>
                                Daftar Siswa
                            </a>
                            <a class="nav-link" href="/admin/sekolah/penerimaan_siswa">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-in"></i></div>
                                Penerimaan Siswa
                            </a>
                            <div class="sb-sidenav-menu-heading">Guru</div>
                            <a class="nav-link" href="/admin/sekolah/pengelolaan_guru">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Pengelolaan Mapel
                            </a>
                            <a class="nav-link" href="/admin/sekolah/akreditas_sekolah">
                                <div class="sb-nav-link-icon"><i class="fas fa-sort-amount-desc"></i></div>
                                Akreditasi Sekolah
                            </a>
                            <div class="sb-sidenav-menu-heading">Sekolah</div>
                            <a class="nav-link" href="/admin/profile/sekolah">
                                <div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>
                                Profile Sekolah
                            </a>
                            <a class="nav-link" href="/admin/fasilitas">
                                <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                                Fasilitas
                            </a>
                            <a class="nav-link" href="/admin/daftar/guru">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Daftar Guru
                            </a>
                            <a class="nav-link" href="/admin/jadwal/pelajaran">
                                <div class="sb-nav-link-icon"><i class="fas fa-bar-chart"></i></div>
                                Jadwal Pelajaran
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Go School
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div style="padding: 2%;">
                        @yield('konten')
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; GoSchool</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        @yield('js')
        <script src="/admin_sekolah/js/cdn_bootstrab.min.js" crossorigin="anonymous"></script>
        <script src="/admin_sekolah/js/scripts.js"></script>
        <script src="/admin_sekolah/js/cdn_chart.min.js" crossorigin="anonymous"></script>
        <script src="/admin_sekolah/assets/demo/chart-area-demo.js"></script>
        <script src="/admin_sekolah/assets/demo/chart-bar-demo.js"></script>
        <script src="/admin_sekolah/js/simpletable.min.js" crossorigin="anonymous"></script>
        <script src="/admin_sekolah/js/datatables-simple-demo.js"></script>
    </body>
</html>
