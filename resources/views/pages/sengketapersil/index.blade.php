@extends('layouts.guest.app')

@section('content')

<div class="container-xxl bg-white p-0">

    <!-- HEADER -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url('{{ asset('img/carousel-1.jpg') }}'); background-size: cover;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">
                    Data Sengketa Persil
                </h1>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">

            <!-- JUDUL -->
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Manajemen Data</h6>
                <h1 class="mb-4">Sengketa <span class="text-primary text-uppercase">Persil</span></h1>
            </div>

            <!-- SEARCH & FILTER -->
            <form method="GET" class="row mb-4">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control"
                           placeholder="Cari persil / pihak...">
                </div>

                <div class="col-md-4">
                    <select name="filter" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="Berlangsung">Berlangsung</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <button class="btn btn-primary w-100">Cari</button>
                </div>
            </form>

            <!-- TOMBOL TAMBAH -->
            @if(Auth::check())
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('sengketapersil.create') }}" class="btn btn-primary shadow-sm">
                    <i class="fa fa-plus me-2"></i> Tambah Sengketa
                </a>
            </div>
            @endif

            <!-- CARD LIST -->
            <div class="row g-3 wow fadeInUp" data-wow-delay="0.3s">

                @forelse($data as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body">

                                <h6 class="fw-bold mb-2">
                                    Persil ID: {{ $item->persil_id }}
                                </h6>

                                <p class="mb-1"><strong>Pihak 1:</strong> {{ $item->pihak_1 }}</p>
                                <p class="mb-1"><strong>Pihak 2:</strong> {{ $item->pihak_2 }}</p>

                                <p class="mb-1">
                                    <strong>Status:</strong>
                                    <span class="badge bg-{{ $item->status == 'Selesai' ? 'success':'warning' }}">
                                        {{ $item->status }}
                                    </span>
                                </p>

                                <p class="mb-2">
                                    <strong>Kronologi:</strong>
                                    {{ Str::limit($item->kronologi, 60) }}
                                </p>

                                <div class="d-flex justify-content-center gap-2 mt-3">

                                    <a href="{{ route('sengketapersil.edit', $item->sengketa_id) }}"
                                       class="btn btn-warning btn-sm text-white">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('sengketapersil.destroy', $item->sengketa_id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-12 text-center text-muted py-4">
                        <i class="fa fa-folder-open fa-2x mb-2"></i><br>
                        Tidak ada data sengketa persil.
                    </div>
                @endforelse

            </div>

            <!-- PAGINATION -->
            <div class="d-flex justify-content-center mt-4">
                {{ $data->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>

</div>

@endsection
