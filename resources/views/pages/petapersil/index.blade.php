@extends('layouts.guest.app')

@section('content')
<div class="container-xxl bg-white p-0">

    <!-- HEADER -->
    <div class="container-fluid page-header mb-5 p-0"
         style="background-image: url('{{ asset('img/carousel-1.jpg') }}'); background-size: cover;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">Data Peta Persil</h1>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">

            <!-- JUDUL -->
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Manajemen Data</h6>
                <h1 class="mb-4">Peta <span class="text-primary text-uppercase">Persil</span></h1>
            </div>

            <!-- SEARCH -->
            <form method="GET" class="row mb-4">
                <div class="col-md-8">
                    <input type="text" name="search" value="{{ request('search') }}"
                           class="form-control" placeholder="Cari berdasarkan Persil ID...">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary w-100">Cari</button>
                </div>
            </form>

            <!-- TOMBOL TAMBAH -->
            @if (Auth::check())
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('peta_persil.create') }}" class="btn btn-primary shadow-sm">
                        <i class="fa fa-plus me-2"></i> Tambah Peta Persil
                    </a>
                </div>
            @endif

            <!-- GRID CARD -->
            <div class="row g-3 wow fadeInUp" data-wow-delay="0.3s">
                @forelse ($peta as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body text-center">

                                <i class="fa fa-map fa-3x text-primary mb-2"></i>

                                <h6 class="fw-bold mb-1">Persil ID: {{ $item->persil_id }}</h6>
                                <p class="mb-1"><small><strong>Panjang:</strong> {{ $item->panjang_m ?? '-' }} m</small></p>
                                <p class="mb-2"><small><strong>Lebar:</strong> {{ $item->lebar_m ?? '-' }} m</small></p>

                                <!-- TOMBOL LIHAT FILE -->
                                @if ($item->file_peta)
                                    <a href="{{ asset('storage/' . $item->file_peta) }}" target="_blank"
                                       class="btn btn-outline-primary btn-sm w-100 mb-2">
                                        <i class="fa fa-image me-1"></i> Lihat Peta
                                    </a>
                                @else
                                    <span class="text-muted d-block mb-2">Tidak ada file</span>
                                @endif

                                <!-- AKSI ADMIN -->
                                @if (Auth::check())
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('peta_persil.edit', $item->peta_id) }}"
                                           class="btn btn-sm btn-warning text-white">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="{{ route('peta_persil.destroy', $item->peta_id) }}"
                                              method="POST">
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
                        Tidak ada data peta persil yang tersedia.
                    </div>
                @endforelse
            </div>

            <!-- PAGINATION -->
            <div class="d-flex justify-content-center mt-4">
                {{ $peta->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>

</div>
@endsection
