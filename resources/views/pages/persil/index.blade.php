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

                <!-- Judul Halaman -->
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Manajemen Data</h6>
                    <h1 class="mb-4">Data <span class="text-primary text-uppercase">Persil</span></h1>
                </div>

                <!-- Alert Sukses -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- 🔍 SEARCH + FILTER -->
                <div class="row mb-4 justify-content-center">

                    <!-- SEARCH -->
                    <div class="col-md-5">
                        <form method="GET" action="{{ route('persil.index') }}">
                            <div class="input-group shadow-sm">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Cari kode, alamat, penggunaan..." value="{{ request('search') }}">

                                <button type="submit" class="btn btn-primary">Cari</button>

                                @if (request('search'))
                                    <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                        class="btn btn-outline-secondary">
                                        Clear
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>

                    <!-- FILTER PEMILIK -->
                    <div class="col-md-3 mt-2 mt-md-0">
                        <form method="GET" action="{{ route('persil.index') }}">
                            <select name="pemilik_warga_id" class="form-select shadow-sm" onchange="this.form.submit()">
                                <option value="">Filter: Pemilik</option>
                                @foreach (App\Models\Warga::all() as $w)
                                    <option value="{{ $w->id }}"
                                        {{ request('pemilik_warga_id') == $w->id ? 'selected' : '' }}>
                                        {{ $w->nama ?? 'Warga #' . $w->id }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>

                </div>

                <!-- Tombol Tambah -->
                @if (Auth::check())
                    <div class="d-flex justify-content-end mb-4">
                        <a href="{{ route('persil.create') }}" class="btn btn-primary shadow-sm">
                            <i class="fa fa-plus me-2"></i> Tambah Persil
                        </a>
                    </div>
                @endif

                <!-- CARD VIEW -->
                <div class="row g-3 wow fadeInUp" data-wow-delay="0.3s">

                    @forelse ($persil as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100 shadow-sm border-0">

                                <div class="card-body text-center">

                                    <div class="mb-2">
                                        <i class="fa fa-map fa-2x text-primary"></i>
                                    </div>

                                    <h6 class="fw-bold mb-1">{{ $item->kode_persil }}</h6>

                                    <p class="mb-1"><small><strong>Pemilik:</strong>
                                            {{ $item->pemilik_warga_id ?? '-' }}</small></p>
                                    <p class="mb-1"><small><strong>Luas:</strong>
                                            {{ $item->luas_m2 ? $item->luas_m2 . ' m²' : '-' }}</small></p>
                                    <p class="mb-1"><small><strong>Penggunaan:</strong>
                                            {{ $item->penggunaan ?? '-' }}</small></p>
                                    <p class="mb-1"><small><strong>Alamat:</strong>
                                            {{ Str::limit($item->alamat_lahan, 40) }}</small></p>
                                    <p class="mb-1"><small><strong>RT/RW:</strong>
                                            {{ ($item->rt ?? '-') . '/' . ($item->rw ?? '-') }}</small></p>

                                    @if (Auth::check())
                                        <div class="d-flex justify-content-center gap-2 mt-3">
                                            <a href="{{ route('persil.edit', $item->persil_id) }}"
                                                class="btn btn-sm btn-warning text-white">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal"
                                                data-bs-target="#detailModal{{ $item->persil_id }}">
                                                <i class="fa fa-eye"></i>
                                            </button>

                                            <form action="{{ route('persil.destroy', $item->persil_id) }}" method="POST">
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
                            Tidak ada data persil tersedia.
                        </div>
                    @endforelse

                </div>

                @foreach ($persil as $item)
                    <div class="modal fade" id="detailModal{{ $item->persil_id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Persil - {{ $item->kode_persil }}</h5>
                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">

                                    <h6 class="fw-bold mb-2">Informasi Persil</h6>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Kode Persil</th>
                                            <td>{{ $item->kode_persil }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pemilik</th>
                                            <td>{{ $item->pemilik_warga_id ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Luas</th>
                                            <td>{{ $item->luas_m2 ? $item->luas_m2 . ' m²' : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Penggunaan</th>
                                            <td>{{ $item->penggunaan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ $item->alamat_lahan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>RT/RW</th>
                                            <td>{{ ($item->rt ?? '-') . '/' . ($item->rw ?? '-') }}</td>
                                        </tr>
                                    </table>

                                    <hr>

                                    <h6 class="fw-bold mb-2">Foto Bidang</h6>

                                    <div class="row">
                                        @php
                                            $media = \App\Models\Media::where('ref_table', 'persil')
                                                ->where('ref_id', $item->persil_id)
                                                ->orderBy('sort_order')
                                                ->get();
                                        @endphp

                                        @forelse($media as $m)
                                            <div class="col-md-4 mb-3">
                                                <div class="card shadow-sm">
                                                    <img src="{{ asset('uploads/persil/' . $m->file_name) }}"
                                                        class="card-img-top rounded" alt="Foto">
                                                    <div class="card-body p-2 text-center">
                                                        <small>{{ $m->caption }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-muted">Tidak ada foto diunggah.</p>
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

                <!-- PAGINATION (RAPIH & TENGAH) -->
                <div class="mt-4 d-flex justify-content-center">
                    {{ $persil->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>
@endsection
