@extends('layouts.guest.app')

@section('content')

<div class="container-fluid page-header mb-5 p-0"
     style="background-image: url('{{ asset('img/carousel-1.jpg') }}'); background-size: cover;">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center pb-5">
            <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">
                Tambah Jenis Penggunaan
            </h1>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">

                <div class="card border-0 shadow-sm p-4 rounded-3">
                    <h5 class="text-center text-primary text-uppercase fw-bold mb-4">
                        Form Tambah Jenis Penggunaan
                    </h5>

                    <form action="{{ route('jenis_penggunaan.store') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="nama_penggunaan"
                                           placeholder="Nama Penggunaan" required>
                                    <label>Nama Penggunaan</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="keterangan"
                                              placeholder="Keterangan" style="height:120px"></textarea>
                                    <label>Keterangan</label>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <button class="btn btn-primary w-100 py-3">
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
