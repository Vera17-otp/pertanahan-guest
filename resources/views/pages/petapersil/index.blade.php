@extends('layouts.guest.app')

@section('content')
<div class="container-xxl bg-white p-0">

    <!-- HEADER -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url('{{ asset('img/peta.jpg') }}'); background-size: cover;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">
                    Data Peta Persil
                </h1>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">

            <!-- JUDUL -->
            <div class="text-center mb-4">
                <h6 class="section-title text-center text-primary text-uppercase">Manajemen Data</h6>
                <h1 class="mb-4">Peta <span class="text-primary text-uppercase">Persil</span></h1>
            </div>

            <!-- SEARCH -->
            <form method="GET" class="row mb-4">
                <div class="col-md-8">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="Cari berdasarkan Persil ID...">
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
            <div class="row g-3">
                @forelse ($peta as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm border-0">

                            <!-- FOTO PETA -->
                            @php
                                $media = $item->media->first();
                                $placeholder = asset('assets/img/peta.jpg');

                                if ($media && str_contains($media->mime_type, 'image')) {
                                    $imagePath = asset('uploads/peta_persil/' . $media->file_name);
                                } else {
                                    $imagePath = $placeholder;
                                }
                            @endphp

                            <img src="{{ $imagePath }}"
                                 class="card-img-top"
                                 style="height: 180px; object-fit: cover;"
                                 alt="Peta Persil">

                            <div class="card-body text-center">

                                <h6 class="fw-bold mb-1">
                                    Persil ID: {{ $item->persil_id }}
                                </h6>

                                <p class="mb-1">
                                    <small><strong>Panjang:</strong> {{ $item->panjang_m ?? '-' }} m</small>
                                </p>

                                <p class="mb-1">
                                    <small><strong>Lebar:</strong> {{ $item->lebar_m ?? '-' }} m</small>
                                </p>

                                <p class="mb-2">
                                    <small><strong>Koordinat:</strong> {{ Str::limit($item->geojson, 20) ?? '-' }}</small>
                                </p>

                                <!-- AKSI -->
                                @if (Auth::check())
                                    <div class="d-flex justify-content-center gap-2 mt-2">

                                        <a href="{{ route('peta_persil.edit', $item->peta_id) }}"
                                           class="btn btn-sm btn-warning text-white">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <button class="btn btn-sm btn-info text-white"
                                                data-bs-toggle="modal"
                                                data-bs-target="#detailModal{{ $item->peta_id }}">
                                            <i class="fa fa-eye"></i>
                                        </button>

                                        <form action="{{ route('peta_persil.destroy', $item->peta_id) }}"
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
                        Tidak ada data peta persil.
                    </div>

                @endforelse
            </div>

            <!-- MODAL DETAIL -->
            @foreach ($peta as $item)
                <div class="modal fade" id="detailModal{{ $item->peta_id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">
                                    Detail Peta Persil – Persil ID: {{ $item->persil_id }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                <h6 class="fw-bold mb-2">Informasi Peta</h6>

                                <table class="table table-bordered">
                                    <tr>
                                        <th>Persil ID</th>
                                        <td>{{ $item->persil_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Panjang</th>
                                        <td>{{ $item->panjang_m }} m</td>
                                    </tr>
                                    <tr>
                                        <th>Lebar</th>
                                        <td>{{ $item->lebar_m }} m</td>
                                    </tr>
                                    <tr>
                                        <th>GeoJSON</th>
                                        <td><small>{{ $item->geojson }}</small></td>
                                    </tr>
                                </table>

                                <hr>

                                <h6 class="fw-bold mb-2">Foto / Media Peta Persil</h6>

                                <div class="row">
                                    @forelse ($item->media as $m)
                                        <div class="col-md-4 mb-3">
                                            <div class="card shadow-sm">

                                                @if (str_contains($m->mime_type, 'image'))
                                                    <img src="{{ asset('uploads/peta_persil/' . $m->file_name) }}"
                                                         class="card-img-top rounded" 
                                                         alt="Peta"
                                                         style="height: 150px; object-fit: cover;">
                                                @else
                                                    <div class="p-3 text-center">
                                                        <a href="{{ asset('uploads/peta_persil/' . $m->file_name) }}"
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
                {{ $peta->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>

</div>
@endsection