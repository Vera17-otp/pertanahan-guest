@extends('layouts.guest.app')

@section('content')
    <!-- Navbar -->


    <!-- Header -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url('{{ asset('img/carousel-1.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">Edit Dokumen</h1>
            </div>
        </div>
    </div>

    <!-- Form Edit Dokumen -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm p-4 rounded-3 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="text-center text-primary text-uppercase fw-bold mb-4">
                            Form Edit Dokumen
                        </h5>

                        <form action="{{ route('pertanahanguest.update', $dokumen_persil->dokumen_id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="persil_id"
                                            value="{{ old('persil_id', $dokumen_persil->persil_id) }}" required>
                                        <label>Persil ID</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="jenis_dokumen"
                                            value="{{ old('jenis_dokumen', $dokumen_persil->jenis_dokumen) }}" required>
                                        <label>Jenis Dokumen</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="nomor"
                                            value="{{ old('nomor', $dokumen_persil->nomor) }}">
                                        <label>Nomor Dokumen</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="keterangan"
                                            value="{{ old('keterangan', $dokumen_persil->keterangan) }}">
                                        <label>Keterangan</label>
                                    </div>
                                </div>

                                <!-- =======================
                 FILE YANG SUDAH DIUPLOAD
                 ======================= -->
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Dokumen Saat Ini</label>

                                    @php
                                        $media = \App\Models\Media::where('ref_table', 'dokumen_persil')
                                            ->where('ref_id', $dokumen_persil->dokumen_id)
                                            ->orderBy('sort_order')
                                            ->get();
                                    @endphp

                                    @if ($media->count() > 0)
                                        <div class="row">
                                            @foreach ($media as $m)
                                                <div class="col-md-4 mb-3">

                                                    <div class="card p-2 shadow-sm text-center">

                                                        @if (str_contains($m->mime_type, 'image'))
                                                            <img src="{{ asset('uploads/dokumen_persil/' . $m->file_name) }}"
                                                                class="img-fluid rounded mb-2" alt="">
                                                        @else
                                                            <i class="fa fa-file-pdf fa-3x text-danger mb-2"></i>
                                                        @endif

                                                        <small>{{ $m->caption }}</small>
                                                        <br>

                                                        <a href="{{ asset('uploads/dokumen_persil/' . $m->file_name) }}"
                                                            target="_blank"
                                                            class="btn btn-outline-primary btn-sm w-100 mt-2">
                                                            Lihat File
                                                        </a>

                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-muted">Belum ada dokumen yang diupload.</p>
                                    @endif
                                </div>

                                <!-- =======================
                 TAMBAH FILE BARU
                 ======================= -->
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Upload Dokumen Baru (Opsional)</label>
                                    <input type="file" name="dokumen_persil[]" class="form-control" multiple>
                                    <small class="text-muted">Anda dapat upload lebih dari satu file.</small>
                                </div>

                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary w-100 py-3">
                                        <i class="fa fa-save me-2"></i> Perbarui Dokumen
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
