@extends('layouts.guest.app')

@section('content')
<div class="container-xxl bg-white p-0">

    <!-- HEADER -->
    <div class="container-fluid page-header mb-5 p-0"
         style="background-image: url('{{ asset('img/bidang.jpg') }}'); background-size: cover;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">Data Persil</h1>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">

            <!-- JUDUL -->
            <div class="text-center mb-4">
                <h6 class="section-title text-center text-primary text-uppercase">Manajemen Data</h6>
                <h1 class="mb-4">Data <span class="text-primary">Persil</span></h1>
            </div>

            <!-- SEARCH -->
            <form method="GET" class="row mb-4">
                <div class="col-md-8">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                           placeholder="Cari kode persil, alamat, penggunaan...">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary w-100">Cari</button>
                </div>
            </form>

            <!-- BUTTON TAMBAH -->
            @if (Auth::check())
                <div class="d-flex justify-content-end mb-4">
                    <a href="{{ route('persil.create') }}" class="btn btn-primary shadow-sm">
                        <i class="fa fa-plus me-2"></i> Tambah Persil
                    </a>
                </div>
            @endif

            <!-- GRID CARD PERSIL -->
            <div class="row g-3">

                @forelse ($persil as $item)

                    @php
                        // Placeholder default
                        $placeholder = asset('assets/img/pertanahan 5.jpg');

                        // Ambil media pertama
                        $media = $item->media->first();

                        if ($media && str_contains($media->mime_type, 'image')) {
                            $imagePath = asset('uploads/peta_persil/' . $media->file_name);

                            // Jika file tidak ada secara fisik → fallback ke placeholder
                            if (!file_exists(public_path('uploads/peta_persil/' . $media->file_name))) {
                                $imagePath = $placeholder;
                            }
                        } else {
                            $imagePath = $placeholder;
                        }
                    @endphp

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm">

                            <img src="{{ $imagePath }}"
                                class="card-img-top"
                                style="height: 180px; object-fit: cover;"
                                alt="Foto Peta Persil">

                            <div class="card-body">
                                <h5 class="card-title mb-1">
                                    {{ $item->kode_persil }}
                                </h5>

                                <!-- Info Pemilik -->
                                @if ($item->warga)
                                    <p class="mb-1">
                                        <strong>Pemilik:</strong> {{ $item->warga->nama_lengkap }}
                                    </p>
                                @else
                                    <p class="mb-1 text-muted">
                                        <strong>Pemilik:</strong> Belum ditentukan
                                    </p>
                                @endif

                                <p class="mb-1">
                                    <strong>Luas:</strong> {{ $item->luas_m2 }} m²
                                </p>

                                <p class="mb-1">
                                    <strong>Penggunaan:</strong> {{ $item->penggunaan }}
                                </p>

                                <p class="mb-1">
                                    <strong>Alamat:</strong> {{ $item->alamat_lahan }},
                                    RT {{ $item->rt }} / RW {{ $item->rw }}
                                </p>

                               

                                <!-- Tombol untuk buka modal detail pemilik -->
                                @if ($item->warga)
                                    <button class="btn btn-info btn-sm mt-2 w-100" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#detailModal{{ $item->warga->warga_id }}">
                                        Lihat Pemilik
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>

                @empty

                    <div class="col-12 text-center py-5">
                        <h5>Tidak ada data persil.</h5>
                    </div>

                @endforelse

            </div>

            <!-- MODAL DETAIL PEMILIK PERSIL -->
            @foreach ($persil as $item)
                @if ($item->warga)
                    <div class="modal fade" id="detailModal{{ $item->warga->warga_id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Pemilik - {{ $item->warga->nama_lengkap }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">

                                    <h6 class="fw-bold mb-2">Informasi Pemilik</h6>

                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <td>{{ $item->warga->nama_lengkap ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>NIK</th>
                                            <td>{{ $item->warga->nik ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ $item->warga->alamat ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td>{{ $item->warga->jenis_kelamin ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>No. Telepon</th>
                                            <td>{{ $item->warga->no_telp ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Persil yang Dimiliki</th>
                                            <td>{{ $item->kode_persil }} ({{ $item->penggunaan }})</td>
                                        </tr>
                                    </table>

                                    <hr>

                                    <h6 class="fw-bold mb-2">Foto Pemilik</h6>

                                    <div class="row">
                                        @forelse ($item->warga->media as $m)
                                            <div class="col-md-4 mb-3">
                                                <div class="card shadow-sm">
                                                    <img src="{{ asset('uploads/warga/' . $m->file_name) }}"
                                                         class="card-img-top rounded" alt="Foto Pemilik"
                                                         style="height: 150px; object-fit: cover;">

                                                    <div class="card-body p-2 text-center">
                                                        <small>{{ $m->caption ?? 'Foto Warga' }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <p class="text-muted">Tidak ada foto diunggah.</p>
                                            </div>
                                        @endforelse
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <!-- PAGINATION -->
            <div class="d-flex justify-content-center mt-4">
                {{ $persil->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
</div>
@endsection