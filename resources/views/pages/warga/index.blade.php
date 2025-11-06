@extends('layouts.guest.app')

@section('content')
<div class="container-xxl bg-white p-0">

    <!-- Navbar -->

    <!-- Header -->
    <div class="container-fluid page-header mb-5 p-0"
         style="background-image: url('{{ asset('img/carousel-1.jpg') }}'); background-size: cover;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">Data Warga</h1>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container-xxl py-5">
        <div class="container">

            <!-- Judul Halaman -->
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Manajemen Data</h6>
                <h1 class="mb-4">Data <span class="text-primary text-uppercase">Warga</span></h1>
            </div>

            <!-- Alert Sukses -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Tombol Tambah Warga (jika login) -->
            @if (Auth::check())
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('warga.create') }}" class="btn btn-primary shadow-sm wow fadeInRight" data-wow-delay="0.2s">
                        <i class="fa fa-plus me-2"></i> Tambah Warga
                    </a>
                </div>
            @endif

            <!-- CARD VIEW -->
            <div class="row g-3 wow fadeInUp" data-wow-delay="0.3s">
                @forelse ($warga as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body text-center">
                                <!-- Icon -->
                                <div class="mb-2">
                                    <i class="fa fa-user fa-2x {{ $item->jenis_kelamin == 'Laki-laki' ? 'text-primary' : 'text-danger' }}"></i>
                                </div>
                                <!-- Info -->
                                <h6 class="card-title mb-1 fw-bold">{{ $item->nama_lengkap }}</h6>
                                <p class="mb-1"><small><strong>NIK:</strong> {{ $item->nik }}</small></p>
                                <p class="mb-1"><small><strong>KK:</strong> {{ $item->no_kk }}</small></p>
                                <p class="mb-1"><small><strong>Jenis Kelamin:</strong> {{ $item->jenis_kelamin }}</small></p>
                                <p class="mb-1"><small><strong>Tempat Lahir:</strong> {{ $item->tempat_lahir }}</small></p>
                                <p class="mb-2"><small><strong>Alamat:</strong> {{ Str::limit($item->alamat_lengkap, 40) }}</small></p>

                                <!-- Tombol Aksi (hanya untuk admin login) -->
                                @if (Auth::check())
                                    <div class="d-flex justify-content-center gap-2 mt-2">
                                        <a href="{{ route('warga.edit', $item->warga_id) }}" class="btn btn-sm btn-warning text-white">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-4">
                        <i class="fa fa-folder-open fa-2x mb-2 text-secondary"></i><br>
                        Belum ada data warga untuk ditampilkan.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</div>
@endsection
