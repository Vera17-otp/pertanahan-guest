@extends('layouts.guest.app')

@section('content')
    <!-- Navbar -->

    <!-- Header -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url('{{ asset('img/carousel-1.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">Tambah Dokumen</h1>
            </div>
        </div>
    </div>

    <!-- Form Tambah Dokumen -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm p-4 rounded-3 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="text-center text-primary text-uppercase fw-bold mb-4">
                            Form Tambah Dokumen
                        </h5>

                        <form action="{{ route('pertanahanguest.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="persil_id" placeholder="Persil ID" required>
                                        <label>Persil ID</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="jenis_dokumen" placeholder="Jenis Dokumen" required>
                                        <label>Jenis Dokumen</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="nomor" placeholder="Nomor Dokumen">
                                        <label>Nomor Dokumen</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                                        <label>Keterangan</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="file_dokumen" class="form-label fw-semibold">Upload Dokumen</label>
                                    <input type="file" name="file_dokumen" class="form-control" required>
                                </div>

                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary w-100 py-3" type="submit">
                                        <i class="fa fa-save me-2"></i> Simpan Dokumen
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
