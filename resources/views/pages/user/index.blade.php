@extends('layouts.guest.app')

@section('content')
    <div class="container-xxl bg-white p-0">

        <div class="container-fluid page-header mb-5 p-0"
            style="background-image: url('{{ asset('img/carousel-1.jpg') }}'); background-size: cover;">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">Data User</h1>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Manajemen Pengguna</h6>
                    <h1 class="mb-4">Data <span class="text-primary text-uppercase">User</span></h1>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- 🔍 SEARCH + FILTER -->
                <div class="row mb-4 justify-content-between">

                    <!-- SEARCH -->
                    <div class="col-md-6">
                        <form method="GET" action="{{ route('user.index') }}">
                            <div class="input-group">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Cari nama atau email..." class="form-control">

                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>

                                @if (request('search'))
                                    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary" id="clear-search">
                                        Clear
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>

                    <!-- FILTER (opsional) -->
                    <div class="col-md-3">
                        <form method="GET" action="{{ route('user.index') }}">
                            <select name="role" class="form-select" onchange="this.form.submit()">
                                <option value="">-- Filter Role --</option>
                                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                        </form>
                    </div>

                </div>

                @if (Auth::check())
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('user.create') }}" class="btn btn-primary shadow-sm wow fadeInRight"
                            data-wow-delay="0.2s">
                            <i class="fa fa-plus me-2"></i> Tambah User
                        </a>
                    </div>

                    <!-- Card Grid Admin -->
                    <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                        @forelse ($users as $user)
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body text-center p-3">
                                        <!-- Foto Profil -->
                                        <div class="mb-3">
                                            @if($user->profileImage)
                                                <img src="{{ asset('storage/' . $user->profileImage->file_name) }}" 
                                                     class="profile-img rounded-circle" 
                                                     alt="{{ $user->name }}">
                                            @else
                                                <img src="{{ asset('assets/img/user-placeholder.png') }}" 
                                                     class="profile-img rounded-circle" 
                                                     alt="{{ $user->name }}">
                                            @endif
                                        </div>
                                        
                                        <h6 class="card-title mb-1 text-truncate" title="{{ $user->name }}">
                                            {{ $user->name }}
                                        </h6>
                                        
                                        <p class="card-text mb-1 text-truncate" title="{{ $user->email }}">
                                            <small>{{ $user->email }}</small>
                                        </p>

                                        <!-- 🔥 BADGE ROLE -->
                                        @if ($user->role == 'admin')
                                            <span class="badge bg-success mb-2">Admin</span>
                                        @else
                                            <span class="badge bg-primary mb-2">User</span>
                                        @endif

                                        <p class="text-muted mb-2"><small><i class="fa fa-lock me-1"></i>Password: ********</small></p>

                                    </div>
                                    <div class="card-footer bg-light border-0 text-center p-2">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-sm btn-warning text-white">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center text-muted py-4">
                                <i class="fa fa-folder-open fa-2x mb-2 text-secondary"></i><br>
                                Belum ada data user untuk ditampilkan.
                            </div>
                        @endforelse
                    </div>
                @else
                    <!-- Card Grid Guest -->
                    <div class="row g-3">
                        @forelse ($users as $user)
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body p-3 text-center">
                                        <!-- Foto Profil untuk Guest -->
                                        <div class="mb-3">
                                            @if($user->profileImage)
                                                <img src="{{ asset('storage/' . $user->profileImage->file_name) }}" 
                                                     class="profile-img-sm rounded-circle" 
                                                     alt="{{ $user->name }}">
                                            @else
                                                <img src="{{ asset('assets/img/user-placeholder.png') }}" 
                                                     class="profile-img-sm rounded-circle" 
                                                     alt="{{ $user->name }}">
                                            @endif
                                        </div>
                                        
                                        <div class="text-center">
                                            <h6 class="mb-1 text-truncate" title="{{ $user->name }}">
                                                {{ $user->name }}
                                            </h6>
                                            
                                            <p class="mb-1 text-truncate" title="{{ $user->email }}">
                                                <small>{{ $user->email }}</small>
                                            </p>

                                            <!-- 🔥 BADGE ROLE -->
                                            @if ($user->role == 'admin')
                                                <span class="badge bg-success mb-1">Admin</span>
                                            @else
                                                <span class="badge bg-primary mb-1">User</span>
                                            @endif

                                            <p class="mb-0"><small><i class="fa fa-lock me-1"></i>Password: ********</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center text-muted py-4">
                                <i class="fa fa-folder-open fa-2x mb-2 text-secondary"></i><br>
                                Belum ada data user untuk ditampilkan.
                            </div>
                        @endforelse
                    </div>
                @endif

                <!-- PAGINATION -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>

    <style>
        .card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        
        .profile-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border: 3px solid #f8f9fa;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .profile-img-sm {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border: 2px solid #f8f9fa;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .card-body {
            padding: 1rem !important;
        }
        
        .text-truncate {
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .card-title {
            font-size: 0.95rem;
            font-weight: 600;
        }
        
        .card-text small {
            font-size: 0.8rem;
        }
        
        .badge {
            font-size: 0.7rem;
            padding: 0.25rem 0.5rem;
        }
    </style>

@endsection