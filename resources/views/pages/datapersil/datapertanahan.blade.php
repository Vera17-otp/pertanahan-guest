@extends('layouts.guest.app')

@section('content')
    <div class="container-xxl bg-white p-0">

        <!-- HEADER -->
        <div class="container-fluid page-header mb-5 p-0"
            style="background-image: url('{{ asset('img/carousel-1.jpg') }}'); background-size: cover;">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">Data Dokumen Persil</h1>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5">
            <div class="container">

                <!-- JUDUL -->
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Manajemen Data</h6>
                    <h1 class="mb-4">Dokumen <span class="text-primary text-uppercase">Persil</span></h1>
                </div>

                <!-- SEARCH & FILTER -->
                <form method="GET" class="row mb-4">
                    <div class="col-md-4">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Cari dokumen...">
                    </div>

                    <div class="col-md-4">
                        <select name="filter" class="form-select" onchange="this.form.submit()">
                            <option value="">Semua Jenis Dokumen</option>
                            <option value="Sertifikat" {{ request('filter') == 'Sertifikat' ? 'selected' : '' }}>Sertifikat
                            </option>
                            <option value="Gambar" {{ request('filter') == 'Gambar' ? 'selected' : '' }}>Gambar</option>
                            <option value="Surat" {{ request('filter') == 'Surat' ? 'selected' : '' }}>Surat</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <button class="btn btn-primary w-100">Cari</button>
                    </div>
                </form>

                <!-- TOMBOL TAMBAH (LOGIN SAJA) -->
                @if (Auth::check())
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('pertanahanguest.create') }}" class="btn btn-primary shadow-sm">
                            <i class="fa fa-plus me-2"></i> Tambah Dokumen
                        </a>
                    </div>
                @endif

                <!-- GRID CARD | MIRIP VIEW WARGA -->
                <div class="row g-3 wow fadeInUp" data-wow-delay="0.3s">
                    @forelse ($dokumen as $item)
                        @php
                            $ext = pathinfo($item->file_dokumen, PATHINFO_EXTENSION);
                            $icon = match (strtolower($ext)) {
                                'pdf' => 'fa-file-pdf text-danger',
                                'doc', 'docx' => 'fa-file-word text-primary',
                                'xls', 'xlsx' => 'fa-file-excel text-success',
                                'jpg', 'jpeg', 'png' => 'fa-file-image text-warning',
                                default => 'fa-file text-secondary',
                            };
                        @endphp

                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="card-body text-center">

                                    <!-- ICON FILE -->
                                    <div class="mb-2">
                                        <i class="fa {{ $icon }} fa-3x"></i>
                                    </div>

                                    <!-- INFO UTAMA -->
                                    <h6 class="fw-bold mb-1">{{ $item->jenis_dokumen }}</h6>
                                    <p class="mb-1"><small><strong>Nomor:</strong> {{ $item->nomor ?? '-' }}</small></p>
                                    <p class="mb-2"><small><strong>Keterangan:</strong>
                                            {{ Str::limit($item->keterangan, 45) ?? '-' }}</small></p>

                                    <!-- AKSI UNTUK ADMIN -->
                                    @if (Auth::check())
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('pertanahanguest.edit', $item->dokumen_id) }}"
                                                class="btn btn-sm btn-warning text-white">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal"
                                                data-bs-target="#detailModal{{ $item->dokumen_id }}">
                                                <i class="fa fa-eye"></i>
                                            </button>

                                            <form action="{{ route('pertanahanguest.destroy', $item->dokumen_id) }}"
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
                            Tidak ada data dokumen persil yang tersedia.
                        </div>
                    @endforelse
                </div>

                @foreach ($dokumen as $item)
                    <div class="modal fade" id="detailModal{{ $item->dokumen_id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Dokumen Persil - {{ $item->jenis_dokumen }}</h5>
                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">

                                    <h6 class="fw-bold mb-2">Informasi Dokumen</h6>

                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Jenis Dokumen</th>
                                            <td>{{ $item->jenis_dokumen }}</td>
                                        </tr>

                                        <tr>
                                            <th>Nomor</th>
                                            <td>{{ $item->nomor ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Keterangan</th>
                                            <td>{{ $item->keterangan ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>ID Persil</th>
                                            <td>{{ $item->persil_id }}</td>
                                        </tr>
                                    </table>

                                    <hr>

                                    <h6 class="fw-bold mb-2">Lampiran Dokumen / Foto</h6>

                                    <div class="row">
                                        @forelse ($item->media as $m)
                                            <div class="col-md-4 mb-3">
                                                <div class="card shadow-sm">

                                                    @if (str_contains($m->mime_type, 'image'))
                                                        <img src="{{ asset('uploads/dokumen_persil/' . $m->file_name) }}"
                                                            class="card-img-top rounded" alt="Foto">
                                                    @else
                                                        <div class="p-3 text-center">
                                                            <a href="{{ asset('uploads/dokumen_persil/' . $m->file_name) }}"
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
                                            <p class="text-muted">Tidak ada dokumen atau foto diunggah.</p>
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
                    {{ $dokumen->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>

    </div>
@endsection
