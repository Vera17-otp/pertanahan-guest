@extends('layouts.guest.app')

@section('content')

    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url('{{ asset('img/carousel-1.jpg') }}'); background-size: cover;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">Edit Peta Persil</h1>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">

                    <div class="card border-0 shadow-sm p-4 rounded-3">
                        <h5 class="text-center text-primary text-uppercase fw-bold mb-4">
                            Form Edit Peta Persil
                        </h5>

                        <form action="{{ route('peta_persil.update', $peta->peta_id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="persil_id"
                                            value="{{ $peta->persil_id }}" required>
                                        <label>Persil ID</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="geojson"
                                            value="{{ $peta->geojson }}">
                                        <label>GeoJSON</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" step="0.01" class="form-control" name="panjang_m"
                                            value="{{ $peta->panjang_m }}">
                                        <label>Panjang (m)</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" step="0.01" class="form-control" name="lebar_m"
                                            value="{{ $peta->lebar_m }}">
                                        <label>Lebar (m)</label>
                                    </div>
                                </div>

                                {{-- ===== UPLOAD FOTO BARU ===== --}}
                                <div class="col-12 mt-3">
                                    <label class="form-label fw-semibold">Upload Peta Baru (Multiple)</label>
                                    <input type="file" name="peta_persil[]" class="form-control" multiple>
                                </div>

                                {{-- ===== TAMPILKAN FOTO LAMA ===== --}}
                                @if ($peta->media->count() > 0)
                                    <div class="col-12 mt-3">
                                        <label class="fw-semibold">File Peta Sebelumnya:</label>

                                        <div class="row g-3">
                                            @foreach ($peta->media as $m)
                                                <div class="col-4 text-center">

                                                    @if (in_array($m->mime_type, ['image/png', 'image/jpeg', 'image/jpg']))
                                                        <img src="{{ asset('uploads/peta_persil/' . $m->file_name) }}"
                                                            class="img-thumbnail mb-2"
                                                            style="height:120px; object-fit:cover;">
                                                    @else
                                                        <a href="{{ asset('uploads/peta_persil/' . $m->file_name) }}"
                                                            target="_blank" class="btn btn-sm btn-secondary">
                                                            Lihat File (PDF)
                                                        </a>
                                                    @endif

                                                    {{-- <div>
                                                        <input type="checkbox" name="delete_media[]"
                                                            value="{{ $m->id }}">
                                                        <label class="small text-danger">Hapus</label>
                                                    </div> --}}

                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary w-100 py-3">
                                        <i class="fa fa-save me-2"></i> Perbarui Data
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
