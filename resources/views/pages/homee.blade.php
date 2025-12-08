<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home - Pertanahan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
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
                                <a href="{{ url('homee') }}" class="nav-item nav-link active">Home</a>
                                <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
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


        <!-- Hero / Home Header -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url('{{ asset('assets/img/carousel-1.jpg') }}');">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Selamat Datang</h1>
                    <p class="text-white fs-5">Sistem Informasi Pertanahan – Akses data tanah modern, aman, dan transparan.</p>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Deskripsi Pertanahan -->
        <section class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h2 class="fw-bold mb-3 text-primary text-uppercase">Tentang Pertanahan</h2>
                    <p class="fs-5" style="line-height: 1.8;">
                        Sistem Informasi Pertanahan ini dirancang untuk membantu proses pengelolaan data pertanahan,
                        termasuk informasi persil, dokumen penting, peta wilayah, serta layanan administrasi terkait.
                        Platform modern ini memberikan kemudahan kepada masyarakat maupun petugas untuk mengakses
                        informasi secara cepat, akurat, dan transparan dalam mendukung tata kelola pertanahan yang lebih baik.
                    </p>
                </div>
            </div>
        </section>


        <!-- Footer Start -->
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
