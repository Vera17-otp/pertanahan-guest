@extends('layouts.guest.app')

@section('content')
    <!-- HEADER -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url('{{ asset('img/carousel-1.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">Tambah Sengketa</h1>
            </div>
        </div>
    </div>

    <!-- FORM TAMBAH -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm p-4 rounded-3 wow fadeInUp" data-wow-delay="0.2s">

                        <h5 class="text-center text-primary text-uppercase fw-bold mb-4">
                            Form Tambah Sengketa Persil
                        </h5>

                        <form action="{{ route('sengketapersil.store') }}" method="POST" enctype="multipart/form-data">
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

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" name="persil_id" class="form-control" placeholder="Persil ID"
                                            required>
                                        <label>Persil ID</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="pihak_1" class="form-control" placeholder="Pihak 1"
                                            required>
                                        <label>Pihak 1</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="pihak_2" class="form-control" placeholder="Pihak 2"
                                            required>
                                        <label>Pihak 2</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="kronologi" class="form-control" style="height: 120px" placeholder="Kronologi sengketa"></textarea>
                                        <label>Kronologi</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select name="status" class="form-select" required>
                                            <option value="">Pilih Status</option>
                                            <option value="Berlangsung">Berlangsung</option>
                                            <option value="Selesai">Selesai</option>
                                        </select>
                                        <label>Status Sengketa</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="penyelesaian" class="form-control"
                                            placeholder="Penyelesaian">
                                        <label>Penyelesaian</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-semibold">Foto Sengketa (Bisa Banyak)</label>
                                    <input type="file" class="form-control" name="foto_sengketa[]" accept="image/*"
                                        multiple>
                                </div>

                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary w-100 py-3" type="submit">
                                        <i class="fa fa-save me-2"></i> Simpan Sengketa
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
