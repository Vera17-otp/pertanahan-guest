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
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (Auth::check())
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('user.create') }}" class="btn btn-primary shadow-sm wow fadeInRight" data-wow-delay="0.2s">
                        <i class="fa fa-plus me-2"></i> Tambah User
                    </a>
                </div>

                <!-- ✅ Ubah Table Jadi Card Grid -->
                <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                    @forelse ($users as $user)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body text-center">
                                    <div class="mb-3">
                                        <i class="fa fa-user-circle fa-3x text-primary"></i>
                                    </div>
                                    <h6 class="card-title mb-1">{{ $user->name }}</h6>
                                    <p class="card-text mb-1"><small>{{ $user->email }}</small></p>
                                    <p class="text-muted mb-2"><small>Password: ********</small></p>
                                </div>
                                <div class="card-footer bg-light border-0 text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning text-white">
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
                <!-- ✅ Tampilan Guest Tetap -->
                <div class="row g-3">
                    @forelse ($users as $user)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100 shadow-sm p-3">
                                <div class="mb-2 text-center">
                                    <i class="fa fa-user fa-2x text-secondary"></i>
                                </div>
                                <div class="text-start">
                                    <h6 class="mb-1">{{ $user->name }}</h6>
                                    <p class="mb-1"><small><strong>Email:</strong> {{ $user->email }}</small></p>
                                    <p class="mb-0"><small><strong>Password:</strong> ********</small></p>
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
        </div>
    </div>
</div>

<!-- ✅ CSS bawaan tambahan ringan -->
<style>
.card:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}
</style>
@endsection
