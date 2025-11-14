@extends('layouts.guest.app')

@section('content')
<div class="container-xxl bg-white p-0">

    <!-- Header -->
    <div class="container-fluid page-header mb-5 p-0"
         style="background-image: url('{{ asset('img/carousel-1.jpg') }}'); background-size: cover;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">Data Persil</h1>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container-xxl py-5">
        <div class="container">

            <!-- Judul -->
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Manajemen Data</h6>
                <h1 class="mb-4">Daftar <span class="text-primary text-uppercase">Persil</span></h1>
            </div>

            <!-- Alert Sukses -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Tombol Tambah (jika login) -->
            @if (Auth::check())
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('persil.create') }}" class="btn btn-primary shadow-sm wow fadeInRight">
                        <i class="fa fa-plus me-2"></i> Tambah Persil
                    </a>
                </div>
            @endif

            <!-- CARD VIEW -->
            <div class="row g-3 wow fadeInUp">

                @forelse ($persil as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm border-0">

                            <div class="card-body text-start">

                                <!-- Icon Persil -->
                                <div class="text-center mb-3">
                                    <i class="fa fa-map fa-3x text-primary"></i>
                                </div>

                                <!-- Data Persil -->
                                <h6 class="fw-bold mb-1">Kode: {{ $item->kode_persil }}</h6>

                                <p class="mb-1">
                                    <small><strong>Pemilik:</strong> 
                                        {{ $item->pemilik_warga_id ?? '-' }}
                                    </small>
                                </p>

                                <p class="mb-1">
                                    <small><strong>Luas:</strong> 
                                        {{ $item->luas_m2 ? $item->luas_m2 . ' m²' : '-' }}
                                    </small>
                                </p>

                                <p class="mb-1">
                                    <small><strong>Penggunaan:</strong> 
                                        {{ $item->penggunaan ?? '-' }}
                                    </small>
                                </p>

                                <p class="mb-1">
                                    <small><strong>Alamat:</strong> 
                                        {{ $item->alamat_lahan ?? '-' }}
                                    </small>
                                </p>

                                <p class="mb-1">
                                    <small><strong>RT/RW:</strong> 
                                        {{ ($item->rt ?? '-') . '/' . ($item->rw ?? '-') }}
                                    </small>
                                </p>

                                <!-- Aksi -->
                                @if (Auth::check())
                                    <div class="d-flex justify-content-center gap-2 mt-2">
                                        <a href="{{ route('persil.edit', $item->persil_id) }}"
                                           class="btn btn-sm btn-warning text-white">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="{{ route('persil.destroy', $item->persil_id) }}" 
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                    class="btn btn-sm btn-danger">
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
                        Tidak ada data persil yang tersedia.
                    </div>
                @endforelse

            </div>

        </div>
    </div>
</div>
@endsection
