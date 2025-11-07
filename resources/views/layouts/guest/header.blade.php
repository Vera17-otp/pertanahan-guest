<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="{{ url('/') }}" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 text-primary text-uppercase">PERTANAHAN</h1>
            </a>
        </div>

        <div class="col-lg-9">
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

            <!-- 🔹 Navbar Start -->
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <a href="{{ url('/') }}" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 text-primary text-uppercase">Pertanahan</h1>
                </a>

                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                        <a href="service.html" class="nav-item nav-link">Services</a>
                        <a href="room.html" class="nav-item nav-link">Rooms</a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Data</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{ route('warga.index') }}" class="dropdown-item">Warga</a>
                                <a href="{{ route('user.index') }}" class="dropdown-item">User</a>
                                <a href="{{ route('pertanahanguest.index') }}" class="dropdown-item">Pertanahan</a>
                            </div>
                        </div>

                        <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                    </div>

                    <!-- 🔸 Bagian Login/Logout -->
                    <div class="d-flex align-items-center">
                        @auth
                            <div class="dropdown">
                                <a class="btn btn-outline-light dropdown-toggle py-2 px-4" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user me-2"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end rounded-0" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="{{ route('pertanahanguest.index') }}">Dashboard</a></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
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
            <!-- 🔹 Navbar End -->
        </div>
    </div>
</div>
<!-- Header End -->
