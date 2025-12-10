<!-- ======================= HEADER START ======================= -->
<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">

        <!-- LOGO KIRI (LAYAR BESAR) -->
        <div class="col-lg-3 bg-dark d-none d-lg-flex align-items-center justify-content-center">
            <a href="{{ url('/') }}" class="navbar-brand m-0 p-0 d-flex flex-column align-items-center">
                <img src="{{ asset('assets/img/logo_pertanahan.webp') }}"
                     alt="Logo Pertanahan" style="height:55px;">
                <h1 class="m-0 mt-2 text-primary text-uppercase">PERTANAHAN</h1>
            </a>
        </div>

        <div class="col-lg-9">

            <!-- Baris Info Kontak (Desktop) -->
            <div class="row gx-0 bg-white d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-envelope text-primary me-2"></i>
                        <p class="mb-0">info@pertanahan.go.id</p>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2">
                        <i class="fa fa-phone-alt text-primary me-2"></i>
                        <p class="mb-0">+62 812 3456 7890</p>
                    </div>
                </div>

                <!-- Sosial Media -->
                <div class="col-lg-5 px-5 text-end">
                    <div class="d-inline-flex align-items-center py-2">
                        <a class="me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="me-3" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="me-3" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="me-3" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="" href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <!-- ======================= NAVBAR ======================= -->
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">

                <!-- Logo di Mobile -->
                <a href="{{ url('/') }}" class="navbar-brand d-lg-none">
                    <img src="{{ asset('assets/img/logo_pertanahan.webp') }}"
                         alt="Logo Pertanahan" style="height:45px;">
                    <span class="text-primary text-uppercase ms-2">Pertanahan</span>
                </a>

                <!-- Toggle -->
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu -->
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

                    <div class="navbar-nav mr-auto py-0">
                     <a href="{{ route('about') }}" class="nav-item nav-link">About</a>

                        <a href="room.html" class="nav-item nav-link">Rooms</a


                        <!-- ======================= DROPDOWN DATA MASTER ======================= -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                Data Master
                            </a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a class="dropdown-item" href="{{ route('warga.index') }}">Warga</a>
                                <a class="dropdown-item" href="{{ route('user.index') }}">User</a>
                                <a class="dropdown-item" href="{{ route('pertanahanguest.index') }}">Dokumen Persil</a>
                                <a class="dropdown-item" href="{{ route('persil.index') }}">Persil</a>
                                <a class="dropdown-item" href="{{ route('peta_persil.index') }}">Peta Persil</a>
                                <a class="dropdown-item" href="{{ route('sengketapersil.index') }}">Sengketa Persil</a>
                                <a class="dropdown-item" href="{{ route('jenis_penggunaan.index') }}">Jenis Penggunaan</a>
                            </div>
                        </div>
                    </div>

                    <!-- LOGIN / LOGOUT -->
                    <div class="d-flex align-items-center">
                        @auth
                            <div class="dropdown">
                                <a class="btn btn-outline-light dropdown-toggle py-2 px-4" href="#"
                                   data-bs-toggle="dropdown">
                                    <i class="fa fa-user me-2"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end rounded-0">
                                    <li><a class="dropdown-item" href="{{ route('pertanahanguest.index') }}">Dashboard</a></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">@csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary rounded-0 py-2 px-4">Login</a>
                        @endauth
                    </div>

                </div>
            </nav>
            <!-- ======================= NAVBAR END ======================= -->

        </div>
    </div>
</div>
<!-- ======================= HEADER END ======================= -->
