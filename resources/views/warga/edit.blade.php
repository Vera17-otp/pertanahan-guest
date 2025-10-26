@extends('guest.layouts.guest.app')

@section('content')
    <!-- Navbar -->
    <div class="container-fluid bg-dark px-0">
        <div class="row gx-0">
            <x-navbar />
        </div>
    </div>

    <!-- Header -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url('{{ asset('img/carousel-1.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">Edit Data Warga</h1>
            </div>
        </div>
    </div>

    <!-- Form Edit Warga -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm p-4 rounded-3 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="text-center text-primary text-uppercase fw-bold mb-4">
                            Form Edit Data Warga
                        </h5>

                        @if($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="nama_lengkap"
                                               value="{{ old('nama_lengkap', $warga->nama_lengkap) }}" required>
                                        <label>Nama Lengkap</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="nik"
                                               value="{{ old('nik', $warga->nik) }}" required>
                                        <label>NIK</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="no_kk"
                                               value="{{ old('no_kk', $warga->no_kk) }}">
                                        <label>Nomor KK</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="jenis_kelamin" required>
                                            <option value="" disabled>Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        <label>Jenis Kelamin</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="tempat_lahir"
                                               value="{{ old('tempat_lahir', $warga->tempat_lahir) }}" required>
                                        <label>Tempat Lahir</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="alamat_lengkap" style="height: 100px" required>{{ old('alamat_lengkap', $warga->alamat_lengkap) }}</textarea>
                                        <label>Alamat Lengkap</label>
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary w-100 py-3" type="submit">
                                        <i class="fa fa-save me-2"></i> Update Data
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
