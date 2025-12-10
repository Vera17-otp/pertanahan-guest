@extends('layouts.guest.app')

@section('content')
<div class="container-xxl bg-white p-0">

    <!-- HEADER -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url('{{ asset('img/bidang.jpg') }}'); background-size: cover;">
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
            <div class="text-center mb-4">
                <h6 class="section-title text-center text-primary text-uppercase">Manajemen Data</h6>
                <h1 class="mb-4">Sengketa <span class="text-primary text-uppercase">Persil</span></h1>
            </div>

            <!-- SEARCH & FILTER -->
            <form method="GET" class="row mb-4">
                <div class="col-md-4">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" 
                           placeholder="Cari persil / pihak...">
                </div>

                <div class="col-md-4">
                    <select name="filter" class="form-select" onchange="this.form.submit()">
                        <option value="" {{ request('filter') == '' ? 'selected' : '' }}>Semua Status</option>
                        <option value="Berlangsung" {{ request('filter') == 'Berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                        <option value="Selesai" {{ request('filter') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
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

            <!-- GRID CARD -->
            <div class="row g-3">
                @forelse ($data as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm border-0">

                            <!-- FOTO SENGKETA -->
                            @php
                                $media = $item->media->first();
                                $placeholder = asset('assets/img/bidang.jpg');

                                if ($media && str_contains($media->mime_type, 'image')) {
                                    $imagePath = asset('uploads/sengketa/' . $media->file_name);
                                } else {
                                    $imagePath = $placeholder;
                                }
                            @endphp

                            <img src="{{ $imagePath }}"
                                 class="card-img-top"
                                 style="height: 180px; object-fit: cover;"
                                 alt="Foto Sengketa">

                            <div class="card-body text-center">

                                <h6 class="fw-bold mb-1">
                                    Persil ID: {{ $item->persil_id }}
                                </h6>

                                <p class="mb-1">
                                    <small><strong>Pihak 1:</strong> {{ $item->pihak_1 }}</small>
                                </p>

                                <p class="mb-1">
                                    <small><strong>Pihak 2:</strong> {{ $item->pihak_2 ?? '-' }}</small>
                                </p>

                                <p class="mb-2">
                                    <small>
                                        <strong>Status:</strong>
                                        <span class="badge bg-{{ $item->status == 'Selesai' ? 'success' : 'warning' }}">
                                            {{ $item->status }}
                                        </span>
                                    </small>
                                </p>

                                <!-- AKSI -->
                                @if (Auth::check())
                                    <div class="d-flex justify-content-center gap-2 mt-2">

                                        <a href="{{ route('sengketapersil.edit', $item->sengketa_id) }}"
                                           class="btn btn-sm btn-warning text-white">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <button class="btn btn-sm btn-info text-white"
                                                data-bs-toggle="modal"
                                                data-bs-target="#detailModal{{ $item->sengketa_id }}">
                                            <i class="fa fa-eye"></i>
                                        </button>

                                        <form action="{{ route('sengketapersil.destroy', $item->sengketa_id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
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
                        Tidak ada data sengketa persil.
                    </div>

                @endforelse
            </div>

            <!-- MODAL DETAIL -->
            @foreach ($data as $item)
                <div class="modal fade" id="detailModal{{ $item->sengketa_id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">
                                    Detail Sengketa Persil – Persil ID: {{ $item->persil_id }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                <h6 class="fw-bold mb-2">Informasi Sengketa</h6>

                                <table class="table table-bordered">
                                    <tr>
                                        <th>Persil ID</th>
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
                                        <td>
                                            <span class="badge bg-{{ $item->status == 'Selesai' ? 'success' : 'warning' }}">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Kronologi</th>
                                        <td>{{ $item->kronologi ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Penyelesaian</th>
                                        <td>{{ $item->penyelesaian ?? '-' }}</td>
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
                                                         class="card-img-top rounded" 
                                                         alt="Foto Sengketa"
                                                         style="height: 150px; object-fit: cover;">
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