<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard </title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href={{ url('css/styles.css') }} rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Dashboard Sipasan</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i> {{ Auth::user()->username }}</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ route('actionlogout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    @if(Auth::user()->id_role == "1")
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ route('index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="{{ route('perizinan') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                            perizinan
                        </a>
                        <div class="sb-sidenav-menu-heading">Master</div>
                        {{-- <a class="nav-link" href="{{ route('role') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-sitemap"></i></div>
                            Role
                        </a> --}}
                        <a class="nav-link" href="{{ route('showkelas') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                            Kelas
                        </a>
                        <a class="nav-link" href="{{ route('tampiltahunajaran') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                            Tahun Ajaran
                        </a>
                        <div class="sb-sidenav-menu-heading">USERS</div>
                        {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a> --}}

                        <a class="nav-link" href="{{ route('orangtua') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                            Orang Tua
                        </a>
                        <a class="nav-link" href="{{ route('santri') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>
                            Santri
                        </a>
                        <a class="nav-link" href="{{ route('user') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-key"></i></div>
                            Bag.Kesantrian
                        </a>
                        <div class="sb-sidenav-menu-heading">Report</div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Laporan
                        </a>
                        <div class="sb-sidenav-menu-heading">Settings</div>
                        <a class="nav-link" href="{{ route('kuotaizin') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-gear"></i></div>
                            Kuota Perizinan
                        </a>
                        {{-- <a class="nav-link" href="{{ route('role') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Ustadz
                        </a> --}}
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div>
                        {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a> --}}
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseError" aria-expanded="false"
                                    aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>

                    </div>
                    @elseif(Auth::user()->id_role == "2")


                    @elseif(Auth::user()->id_role == "3")
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ route('index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="{{ route('perizinan') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                            perizinan
                        </a>
                    </div>

                    @endif

                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    @if (Auth::user()->id_role == 1)
                        Administrator
                        
                    @elseif (Auth::user()->id_role ==2)
                        Bagian Kesantrian
                        
                    @elseif (Auth::user()->id_role ==3)
                        Orang Tua
                    @endif
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                @yield('isi')
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Yusuf Arjanto Sipasanti 2022</div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ url('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ url('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ url('js/datatables-simple-demo.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ url('js/dynamic-form.js') }}"></script>
</body>

</html>
