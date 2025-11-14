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

                        <form action="{{ route('persil.update', $persil->persil_id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <!-- Kode Persil -->
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text"
                                               class="form-control"
                                               name="kode_persil"
                                               placeholder="Kode Persil"
                                               value="{{ old('kode_persil', $persil->kode_persil) }}"
                                               required>
                                        <label>Kode Persil</label>
                                    </div>
                                </div>

                                <!-- Pemilik Warga ID -->
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="number"
                                               class="form-control"
                                               name="pemilik_warga_id"
                                               placeholder="Pemilik Warga ID"
                                               value="{{ old('pemilik_warga_id', $persil->pemilik_warga_id) }}">
                                        <label>Pemilik Warga ID</label>
                                    </div>
                                </div>

                                <!-- Luas -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number"
                                               class="form-control"
                                               name="luas_m2"
                                               placeholder="Luas (m2)"
                                               value="{{ old('luas_m2', $persil->luas_m2) }}">
                                        <label>Luas (m²)</label>
                                    </div>
                                </div>

                                <!-- Penggunaan -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text"
                                               class="form-control"
                                               name="penggunaan"
                                               placeholder="Penggunaan"
                                               value="{{ old('penggunaan', $persil->penggunaan) }}">
                                        <label>Penggunaan</label>
                                    </div>
                                </div>

                                <!-- Alamat -->
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text"
                                               class="form-control"
                                               name="alamat_lahan"
                                               placeholder="Alamat Lahan"
                                               value="{{ old('alamat_lahan', $persil->alamat_lahan) }}">
                                        <label>Alamat Lahan</label>
                                    </div>
                                </div>

                                <!-- RT -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text"
                                               class="form-control"
                                               name="rt"
                                               placeholder="RT"
                                               value="{{ old('rt', $persil->rt) }}">
                                        <label>RT</label>
                                    </div>
                                </div>

                                <!-- RW -->
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text"
                                               class="form-control"
                                               name="rw"
                                               placeholder="RW"
                                               value="{{ old('rw', $persil->rw) }}">
                                        <label>RW</label>
                                    </div>
                                </div>

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
