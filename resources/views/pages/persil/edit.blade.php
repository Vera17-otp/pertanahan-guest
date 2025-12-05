@extends('layouts.guest.app')

@section('content')
    <!-- Header -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url('{{ asset('img/carousel-1.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">Edit Data Persil</h1>
            </div>
        </div>
    </div>

    <!-- Form Edit Persil -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm p-4 rounded-3 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="text-center text-primary text-uppercase fw-bold mb-4">
                            Form Edit Persil
                        </h5>

                        <form action="{{ route('persil.update', $persil->persil_id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <!-- Kode Persil -->
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="kode_persil"
                                            value="{{ old('kode_persil', $persil->kode_persil) }}" required>
                                        <label>Kode Persil</label>
                                    </div>
                                </div>

                                <!-- Pemilik Warga ID -->
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="pemilik_warga_id"
                                            value="{{ old('pemilik_warga_id', $persil->pemilik_warga_id) }}">
                                        <label>Pemilik Warga ID</label>
                                    </div>
                                </div>

                                <!-- Luas -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="luas_m2"
                                            value="{{ old('luas_m2', $persil->luas_m2) }}">
                                        <label>Luas (m²)</label>
                                    </div>
                                </div>

                                <!-- Penggunaan -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="penggunaan"
                                            value="{{ old('penggunaan', $persil->penggunaan) }}">
                                        <label>Penggunaan</label>
                                    </div>
                                </div>

                                <!-- Alamat -->
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="alamat_lahan"
                                            value="{{ old('alamat_lahan', $persil->alamat_lahan) }}">
                                        <label>Alamat Lahan</label>
                                    </div>
                                </div>

                                <!-- RT -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="rt"
                                            value="{{ old('rt', $persil->rt) }}">
                                        <label>RT</label>
                                    </div>
                                </div>

                                <!-- RW -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="rw"
                                            value="{{ old('rw', $persil->rw) }}">
                                        <label>RW</label>
                                    </div>
                                </div>

                                <!-- ===================== -->
                                <!-- Upload Foto Bidang    -->
                                <!-- ===================== -->
                                <div class="col-md-12 mt-4">
                                    <label class="form-label fw-semibold">Upload Foto Baru (Opsional)</label>
                                    <input type="file" class="form-control" name="persil[]" accept="image/*" multiple>
                                    <small class="text-muted">Anda dapat memilih lebih dari satu foto.</small>
                                </div>

                                <!-- ===================== -->
                                <!-- Tampilkan Foto Lama   -->
                                <!-- ===================== -->
                                @php
                                    $media = $persil->media ?? [];
                                @endphp

                                @if (count($media) > 0)
                                    <div class="col-12 mt-3">
                                        <h6 class="fw-bold mb-2">Foto Bidang Lama</h6>
                                        <div class="row">
                                            @foreach ($media as $m)
                                                <div class="col-md-4 mb-3">
                                                    <div class="card shadow-sm">
                                                        <img src="{{ asset('uploads/persil/' . $m->file_name) }}"
                                                            class="card-img-top rounded"
                                                            style="height: 180px; object-fit: cover;">

                                                        {{-- <div class="card-body p-2 text-center">
                                                            <small>{{ $m->caption }}</small>

                                                            <form action="{{ route('media.delete', $m->media_id) }}"
                                                                method="POST" class="mt-2">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm btn-danger w-100">
                                                                    Hapus Foto
                                                                </button>
                                                            </form>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Tombol Submit -->
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary w-100 py-3">
                                        <i class="fa fa-save me-2"></i>
                                        Perbarui Data Persil
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
