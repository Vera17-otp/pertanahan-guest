@extends('layouts.guest.app')

@section('content')
    <!-- Header -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url('{{ asset('img/carousel-1.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">Tambah Persil</h1>
            </div>
        </div>
    </div>

    <!-- Form Tambah Persil -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm p-4 rounded-3 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="text-center text-primary text-uppercase fw-bold mb-4">
                            Form Tambah Persil
                        </h5>

                        <form action="{{ route('persil.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row g-3">

                                <!-- Kode Persil -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="kode_persil" required>
                                        <label>Kode Persil</label>
                                    </div>
                                </div>

                                <!-- Pemilik (FK ke tabel warga) -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="pemilik_warga_id" required>
                                            <option value="" disabled selected>Pilih Pemilik</option>
                                            @foreach ($warga as $item)
                                                <option value="{{ $item->warga_id }}">
                                                    {{ $item->nama_lengkap }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label>Pemilik Warga</label>
                                    </div>
                                </div>

                                <!-- Luas -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="luas_m2" required>
                                        <label>Luas (m²)</label>
                                    </div>
                                </div>

                                <!-- Penggunaan -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="penggunaan" required>
                                            <option value="" disabled selected>Pilih Penggunaan</option>
                                            <option value="permukiman">Permukiman</option>
                                            <option value="kebun">Kebun</option>
                                            <option value="sawah">Sawah</option>
                                            <option value="kosong">Lahan Kosong</option>
                                        </select>
                                        <label>Penggunaan</label>
                                    </div>
                                </div>

                                <!-- Alamat Lahan -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="alamat_lahan" required>
                                        <label>Alamat Lahan</label>
                                    </div>
                                </div>

                                <!-- RT -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="rt" required>
                                        <label>RT</label>
                                    </div>
                                </div>

                                <!-- RW -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="rw" required>
                                        <label>RW</label>
                                    </div>
                                </div>

                                <!-- Upload Foto Bidang -->
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Upload Foto Bidang (Opsional)</label>
                                    <input type="file" class="form-control" name="persil[]" accept="image/*" multiple>
                                </div>

                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary w-100 py-3" type="submit">
                                        <i class="fa fa-save me-2"></i> Simpan Persil
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
