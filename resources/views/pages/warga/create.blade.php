@extends('layouts.guest.app')

@section('content')
    <!-- Navbar -->

    <!-- Header -->
<div class="container-fluid page-header mb-5 p-0"
    style="background-image: url('{{ asset('assets/img/warga2.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center pb-5">
            <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">Tambah Data Warga</h1>
        </div>
    </div>
</div>
    <!-- Form Tambah Warga -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm p-4 rounded-3 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="text-center text-primary text-uppercase fw-bold mb-4">
                            Form Tambah Data Warga
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
                        <form action="{{ route('warga.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required>
                                        <label>Nama Lengkap</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="nik" placeholder="NIK" required>
                                        <label>NIK</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="no_kk" placeholder="Nomor KK" required>
                                        <label>Nomor KK</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="jenis_kelamin" required>
                                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <label>Jenis Kelamin</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required>
                                        <label>Tempat Lahir</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="alamat_lengkap" placeholder="Alamat Lengkap" style="height: 100px" required></textarea>
                                        <label>Alamat Lengkap</label>
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary w-100 py-3" type="submit">
                                        <i class="fa fa-save me-2"></i> Simpan Data
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
