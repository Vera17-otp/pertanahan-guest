@extends('layouts.guest.app')

@section('content')
<div class="container-xxl bg-white p-0">

    <!-- HEADER -->
    <div class="container-fluid page-header mb-5 p=0"
         style="background-image: url('{{ asset('img/warga.jpg') }}'); background-size: cover;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">Data Warga</h1>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">

            <!-- JUDUL -->
            <div class="text-center mb-4">
                <h6 class="section-title text-center text-primary text-uppercase">Manajemen Data</h6>
                <h1 class="mb-4">Data <span class="text-primary text-uppercase">Warga</span></h1>
            </div>

            <!-- SEARCH -->
            <form method="GET" class="row mb-4">
                <div class="col-md-8">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="Cari nama / NIK / alamat...">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary w-100">Cari</button>
                </div>
            </form>

            <!-- TOMBOL TAMBAH -->
            @if (Auth::check())
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('warga.create') }}" class="btn btn-primary shadow-sm">
                        <i class="fa fa-plus me-2"></i> Tambah Warga
                    </a>
                </div>
            @endif



            <!-- GRID CARD -->
            <div class="row g-3">

                @php
                    $defaultImage = asset('assets/img/warga.jpg');
                @endphp

                @forelse ($warga as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm border-0">

                            <!-- FOTO WARGA -->
                            @php
                                $media = $item->media->first();

                                if ($media && str_contains($media->mime_type, 'image')) {
                                    $imagePath = asset('uploads/warga/' . $media->file_name);
                                } else {
                                    $imagePath = $defaultImage;
                                }
                            @endphp

                            <img src="{{ $imagePath }}"
                                 class="card-img-top"
                                 style="height: 180px; object-fit: cover;"
                                 alt="Foto Warga">

                            <div class="card-body text-center">

                                <h6 class="fw-bold mb-1">{{ $item->nama_lengkap }}</h6>
                                <p class="mb-1"><small><strong>NIK:</strong> {{ $item->nik }}</small></p>
                                <p class="mb-1"><small><strong>No. KK:</strong> {{ $item->no_kk }}</small></p>
                                <p class="mb-1"><small><strong>Jenis Kelamin:</strong> {{ $item->jenis_kelamin }}</small></p>
                                <p class="mb-2"><small><strong>Alamat:</strong> {{ Str::limit($item->alamat_lengkap, 40) }}</small></p>

                                @if (Auth::check())
                                    <div class="d-flex justify-content-center gap-2 mt-2">

                                        <a href="{{ route('warga.edit', $item->warga_id) }}"
                                           class="btn btn-sm btn-warning text-white">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <button class="btn btn-sm btn-info text-white"
                                                data-bs-toggle="modal"
                                                data-bs-target="#detailModal{{ $item->warga_id }}">
                                            <i class="fa fa-eye"></i>
                                        </button>

                                        <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST">
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
                        Tidak ada data warga yang tersedia.
                    </div>
                @endforelse
            </div>



            <!-- MODAL DETAIL -->
            @foreach ($warga as $item)
                <div class="modal fade" id="detailModal{{ $item->warga_id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Detail Warga - {{ $item->nama_lengkap }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                <h6 class="fw-bold mb-2">Informasi Warga</h6>

                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">Nama</th>
                                        <td>{{ $item->nama_lengkap }}</td>
                                    </tr>
                                    <tr>
                                        <th>NIK</th>
                                        <td>{{ $item->nik }}</td>
                                    </tr>
                                    <tr>
                                        <th>No. KK</th>
                                        <td>{{ $item->no_kk }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat, Tgl Lahir</th>
                                        <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $item->alamat_lengkap }}</td>
                                    </tr>
                                </table>

                                <hr>

                                <h6 class="fw-bold mb-2">Foto / Media</h6>

                                <div class="row">
                                    @forelse ($item->media as $m)
                                        <div class="col-md-4 mb-3">
                                            <div class="card shadow-sm">

                                                @if (str_contains($m->mime_type, 'image'))
                                                    <img src="{{ asset('uploads/warga/' . $m->file_name) }}"
                                                         class="card-img-top rounded" alt="Foto">
                                                @else
                                                    <div class="p-3 text-center">
                                                        <a href="{{ asset('uploads/warga/' . $m->file_name) }}"
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
                {{ $warga->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
</div>
@endsection
