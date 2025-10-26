@extends('guest.layouts.guest.app')

@section('content')
<div class="container-xxl bg-white p-0">

    <!-- Navbar -->
    <div class="container-fluid bg-dark px-0">
        <div class="row gx-0">
            <x-navbar />
        </div>
    </div>

    <!-- Header -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url('img/carousel-1.jpg'); background-size: cover;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">Data Dokumen Persil</h1>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container-xxl py-5">
        <div class="container">

            <!-- Judul Halaman -->
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Manajemen Data</h6>
                <h1 class="mb-4">Dokumen <span class="text-primary text-uppercase">Persil</span></h1>
            </div>

            <!-- Alert Sukses -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (Auth::check())
                <!-- Tombol Tambah Dokumen -->
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('pertanahanguest.create') }}" class="btn btn-primary shadow-sm wow fadeInRight" data-wow-delay="0.2s">
                        <i class="fa fa-plus me-2"></i> Tambah Dokumen
                    </a>
                </div>

                <!-- Tabel Data -->
                <div class="table-responsive wow fadeInUp" data-wow-delay="0.3s">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="bg-dark text-white text-center">
                            <tr>
                                <th style="width: 60px;">ID</th>
                                <th>Persil ID</th>
                                <th>Jenis Dokumen</th>
                                <th>Nomor</th>
                                <th>Keterangan</th>
                                <th>Dokumen File</th>
                                <th style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($dokumen as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->persil_id }}</td>
                                    <td>{{ $item->jenis_dokumen }}</td>
                                    <td>{{ $item->nomor ?? '-' }}</td>
                                    <td>{{ $item->keterangan ?? '-' }}</td>
                                    <td>
                                        @if ($item->file_dokumen)
                                            @php
                                                $ext = pathinfo($item->file_dokumen, PATHINFO_EXTENSION);
                                                $icon = match(strtolower($ext)) {
                                                    'pdf' => 'fa-file-pdf text-danger',
                                                    'doc', 'docx' => 'fa-file-word text-primary',
                                                    'xls', 'xlsx' => 'fa-file-excel text-success',
                                                    'jpg', 'jpeg', 'png', 'gif' => 'fa-file-image text-warning',
                                                    default => 'fa-file text-secondary',
                                                };
                                            @endphp
                                            <a href="{{ asset('storage/' . $item->file_dokumen) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="fa {{ $icon }} me-1"></i> Lihat
                                            </a>
                                        @else
                                            <span class="text-muted">Tidak ada file</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('pertanahanguest.edit', $item->dokumen_id) }}" class="btn btn-sm btn-warning mb-1">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <form action="{{route('pertanahanguest.destroy', $item->dokumen_id)}}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-muted py-4">
                                        <i class="fa fa-folder-open fa-2x mb-2 text-secondary"></i><br>
                                        Tidak ada data dokumen persil yang tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @else
                <!-- Card View untuk Guest -->
                <div class="row g-4">
                    @forelse ($dokumen as $item)
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm wow fadeInUp" data-wow-delay="0.1s">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->jenis_dokumen }}</h5>
                                    <p class="card-text"><strong>Persil ID:</strong> {{ $item->persil_id }}</p>
                                    <p class="card-text"><strong>Nomor:</strong> {{ $item->nomor ?? '-' }}</p>
                                    <p class="card-text"><strong>Keterangan:</strong> {{ $item->keterangan ?? '-' }}</p>
                                    @if ($item->file_dokumen)
                                        @php
                                            $ext = pathinfo($item->file_dokumen, PATHINFO_EXTENSION);
                                            $icon = match(strtolower($ext)) {
                                                'pdf' => 'fa-file-pdf text-danger',
                                                'doc', 'docx' => 'fa-file-word text-primary',
                                                'xls', 'xlsx' => 'fa-file-excel text-success',
                                                'jpg', 'jpeg', 'png', 'gif' => 'fa-file-image text-warning',
                                                default => 'fa-file text-secondary',
                                            };
                                        @endphp
                                        <a href="{{ asset('storage/' . $item->file_dokumen) }}" target="_blank" class="btn btn-outline-primary btn-sm mt-2">
                                            <i class="fa {{ $icon }} me-1"></i> Lihat File
                                        </a>
                                    @else
                                        <span class="text-muted mt-2 d-block">Tidak ada file</span>
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
            @endif

        </div>
    </div>
</div>
@endsection
