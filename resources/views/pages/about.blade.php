<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>About - Pertanahan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">

        <!-- Header Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="{{ url('/') }}" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-uppercase">PERTANAHAN</h1>
                    </a>
                </div>

                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="{{ url('/') }}" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 text-primary text-uppercase">Pertanahan</h1>
                        </a>

                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">

                                <a href="{{ url('/') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                                <a href="{{ route('about') }}" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">About</a>
                                <a href="#" class="nav-item nav-link">Services</a>
                                <a href="#" class="nav-item nav-link">Rooms</a>

                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">DATA</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="{{ route('warga.index') }}" class="dropdown-item">Warga</a>
                                        <a href="{{ route('user.index') }}" class="dropdown-item">User</a>
                                        <a href="{{ route('pertanahanguest.index') }}" class="dropdown-item">DokumenPersil</a>
                                        <a href="{{ route('persil.index') }}" class="dropdown-item">Persil</a>
                                        <a href="{{ route('peta_persil.index') }}" class="dropdown-item">PetaPersil</a>
                                        <a href="{{ route('sengketapersil.index') }}" class="dropdown-item">SengketaPersil</a>
                                    </div>
                                </div>

                                <a href="#" class="nav-item nav-link">Contact</a>
                            </div>

                            <div class="d-flex align-items-center ms-auto">
                                <a href="{{ route('login') }}" class="btn btn-primary py-2 px-4 ms-3">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url('{{ asset('assets/img/carousel-1.jpg') }}');">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">

                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">About Us</h6>
                        <h1 class="mb-4">Welcome to <span class="text-primary text-uppercase">Pertanahan</span></h1>
                        <p class="mb-4">
                            Sistem Informasi Pertanahan ini dibuat untuk mempermudah masyarakat mengakses data tanah secara digital, aman, transparan, dan efisien.
                        </p>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="#">Explore More</a>
                    </div>

                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-12 text-center">
                                <img class="img-fluid rounded wow zoomIn" data-wow-delay="0.1s" src="{{ asset('assets/img/pertanahan 4.jpg') }}">
                            </div>
                            <div class="col-12 text-center">
                                <img class="img-fluid rounded wow zoomIn" data-wow-delay="0.3s" src="{{ asset('assets/img/pertanahan 5.jpg') }}">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Footer Start (SUDAH DIPERKECIL) -->
        <div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s" style="padding-top: 30px; padding-bottom: 20px;">
            <div class="container pb-3">
                <div class="row g-4">

                    <div class="col-md-6 col-lg-4">
                        <div class="bg-primary rounded p-3">
                            <a href="{{ url('/') }}"><h1 class="text-white text-uppercase mb-2">Pertanahan</h1></a>
                            <p class="text-white mb-0">Sistem ini mendukung digitalisasi data pertanahan dan pelayanan publik.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <h6 class="section-title text-start text-primary text-uppercase mb-3">Contact</h6>
                        <p class="mb-1"><i class="fa fa-map-marker-alt me-3"></i>Pekanbaru, Indonesia</p>
                        <p class="mb-1"><i class="fa fa-envelope me-3"></i>info@pertanahan.go.id</p>
                    </div>

                </div>
            </div>
        </div>
        <!-- Footer End -->


        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
