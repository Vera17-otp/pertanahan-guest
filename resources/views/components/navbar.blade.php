<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3 py-2 shadow-sm">
    <div class="container-fluid">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
            <i class="fa fa-landmark text-primary me-2 fs-5"></i>
            <h4 class="text-uppercase text-white fw-bold mb-0" style="font-size: 1.1rem;">Pertanahan</h4>
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                <li class="nav-item">
                    <a href="{{ route('warga.index') }}" class="nav-link {{ request()->is('warga') ? 'active' : '' }}">Warga</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link {{ request()->is('user') ? 'active' : '' }}">User</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('datapertanahan') }}" class="nav-link {{ request()->is('pertanahan') ? 'active' : '' }}">Pertanahan</a>
                </li>
                <li class="nav-item ms-lg-3">
                    @if (!Auth::check())
                        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm px-3">
                            <i class="fa fa-sign-in-alt me-1"></i> Login
                        </a>
                    @else
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm px-3">
                                <i class="fa fa-sign-out-alt me-1"></i> Logout
                            </button>
                        </form>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar End -->
