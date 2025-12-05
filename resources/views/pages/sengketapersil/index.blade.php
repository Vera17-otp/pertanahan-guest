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
                        <input type="text" name="search" class="form-control" placeholder="Cari persil / pihak...">
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
                @if (Auth::check())
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
                                        <span class="badge bg-{{ $item->status == 'Selesai' ? 'success' : 'warning' }}">
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

                                        <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal"
                                            data-bs-target="#detailModal{{ $item->sengketa_id }}">
                                            <i class="fa fa-eye"></i>
                                        </button>

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
                @foreach ($data as $item)
                    <div class="modal fade" id="detailModal{{ $item->sengketa_id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Sengketa Persil - {{ $item->persil_id }}</h5>
                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">

                                    <h6 class="fw-bold mb-2">Informasi Sengketa</h6>

                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Persil ID</th>
                                            <td>{{ $item->persil_id }}</td>
                                        </tr>

                                        <tr>
                                            <th>Pihak 1</th>
                                            <td>{{ $item->pihak_1 }}</td>
                                        </tr>

                                        <tr>
                                            <th>Pihak 2</th>
                                            <td>{{ $item->pihak_2 ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Status</th>
                                            <td>{{ $item->status ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Kronologi</th>
                                            <td><small>{{ $item->kronologi ?? '-' }}</small></td>
                                        </tr>

                                        <tr>
                                            <th>Penyelesaian</th>
                                            <td><small>{{ $item->penyelesaian ?? '-' }}</small></td>
                                        </tr>
                                    </table>

                                    <hr>

                                    <h6 class="fw-bold mb-2">Foto / Media Sengketa</h6>

                                    <div class="row">
                                        @forelse ($item->media as $m)
                                            <div class="col-md-4 mb-3">
                                                <div class="card shadow-sm">

                                                    @if (str_contains($m->mime_type, 'image'))
                                                        <img src="{{ asset('uploads/sengketa/' . $m->file_name) }}"
                                                            class="card-img-top rounded" alt="Foto Sengketa">
                                                    @else
                                                        <div class="p-3 text-center">
                                                            <a href="{{ asset('uploads/sengketa/' . $m->file_name) }}"
                                                                target="_blank" class="btn btn-primary btn-sm">
                                                                Lihat Dokumen
                                                            </a>
                                                        </div>
                                                    @endif

                                                    <div class="card-body p-2 text-center">
                                                        <small>{{ $m->caption }}</small>
                                                    </div>

                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-muted">Tidak ada media diunggah.</p>
                                        @endforelse
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach


                <!-- PAGINATION -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $data->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>

    </div>
@endsection
