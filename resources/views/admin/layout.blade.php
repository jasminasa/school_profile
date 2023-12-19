<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../../assets/admin/css/styles.css" rel="stylesheet" />
        <!-- CKeditor -->
        <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
        <link rel="stylesheet" type="text/css" href="../../assets/dist/trix.css">
        <script type="text/javascript" src="../../assets/dist/trix.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                    <form class="nav-link" method="POST" action="/logout">
                    @csrf
                    <a class="dropdown-item" href="route('logout')"onclick="event.preventDefault();this.closest('form').submit();" >
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                    </a>
                    </form>
                </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                        <!-- Superadmin -->
                        @if (auth()->user()->role == 'superadmin')
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Visitor
                            </a>
                            <div class="sb-sidenav-menu-heading">Dashboard</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ url('major') }}">Major</a>
                                        <a class="nav-link" href="{{ url('tutor') }}">Tutor</a>
                                        <a class="nav-link" href="{{ url('event') }}">Event</a>
                                        <a class="nav-link" href="{{ url('slider') }}">Slider</a>
                                        <a class="nav-link" href="{{ url('gallery') }}">Gallery</a>
                                        <a class="nav-link" href="{{ url('testimonial') }}">Testimonial</a>
                                        <a class="nav-link" href="{{ url('blog') }}">Blog</a>
                                        <a class="nav-link" href="{{ url('category') }}">Category</a>
                            </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link" href="/about">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                About Us
                            </a>
                            <a class="nav-link" href="/contact">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Contact Us
                            </a><a class="nav-link" href="/akun">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Account
                            </a>
                            <a class="nav-link" href="/why">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Why Us
                            </a>
                            <a class="nav-link" href="/formcontact">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Form
                            </a>
                            <a class="nav-link" href="/config">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Configuration
                            </a>
                            <a class="nav-link" href="/metadata">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Meta Data
                            </a>

                            <!-- Admin -->
                            @elseif (auth()->user()->role == 'admin')
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Visitor
                            </a>
                            <div class="sb-sidenav-menu-heading">Dashboard</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ url('major') }}">Major</a>
                                        <a class="nav-link" href="{{ url('tutor') }}">Tutor</a>
                                        <a class="nav-link" href="{{ url('event') }}">Event</a>
                                        <a class="nav-link" href="{{ url('slider') }}">Slider</a>
                                        <a class="nav-link" href="{{ url('gallery') }}">Gallery</a>
                                        <a class="nav-link" href="{{ url('testimonial') }}">Testimonial</a>
                                        <a class="nav-link" href="{{ url('blog') }}">Blog</a>
                                        <a class="nav-link" href="{{ url('category') }}">Category</a>
                            </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link" href="/about">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                About Us
                            </a>
                            <a class="nav-link" href="/contact">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Contact Us
                            </a>
                            <a class="nav-link" href="/why">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Why Us
                            </a>
                            <a class="nav-link" href="/formcontact">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Form
                            </a>

                            <!-- OPerator -->
                            @elseif(auth()->user()->role == 'operator')
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Visistor
                            </a>
                            <div class="sb-sidenav-menu-heading">Dashboard</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ url('major') }}">Major</a>
                                        <a class="nav-link" href="{{ url('tutor') }}">Tutor</a>
                                        <a class="nav-link" href="{{ url('event') }}">Event</a>
                                        <a class="nav-link" href="{{ url('slider') }}">Slider</a>
                                        <a class="nav-link" href="{{ url('gallery') }}">Gallery</a>
                                        <a class="nav-link" href="{{ url('testimonial') }}">Testimonial</a>
                                        <a class="nav-link" href="{{ url('blog') }}">Blog</a>
                                        <a class="nav-link" href="{{ url('category') }}">Category</a>
                            </nav>
                            </div>
                        @endif
                        </div>
                    </div>
                   
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <br>
                    @yield('content')
                </main>
            </div>
        </div>
        <!-- <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                    </div>
                        </div>
                    </div>
                </footer> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../assets/admin/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../../assets/admin/assets/demo/chart-area-demo.js"></script>
        <script src="../../assets/admin/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../../assets/admin/js/datatables-simple-demo.js"></script>
    </body>
</html>
