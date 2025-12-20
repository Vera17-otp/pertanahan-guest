@extends('layouts.guest.app')

@section('content')
<div class="container-xxl bg-white p-0">

    <!-- =============================== -->
    <!--           HEADER                -->
    <!-- =============================== -->
    <div class="container-fluid page-header mb-5 p-0"
         style="background-image: url('{{ asset('assets/img/slideshow/land 2.jpg') }}'); background-size: cover;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">
                    Dashboard Pertanahan
                </h1>
            </div>
        </div>
    </div>

    <!-- =============================== -->
    <!--       DASHBOARD STATS           -->
    <!-- =============================== -->
    <div class="container-xxl py-5">
        <div class="container">

            <!-- STATS CARDS ROW 1 -->
            <div class="row g-4 mb-4 wow fadeInUp" data-wow-delay="0.1s">

                <!-- TOTAL PERSIL -->
                <div class="col-md-4 col-lg-3">
                    <div class="card border-0 h-100 shadow-sm text-center p-4">
                        <div class="mb-3">
                            <i class="fa fa-layer-group fa-3x text-primary"></i>
                        </div>
                        <h4 class="fw-bold">TOTAL PERSIL</h4>
                        <h2 class="text-primary mb-0">120</h2>
                        <p class="text-muted small">Data Persil Terdaftar</p>
                    </div>
                </div>

                <!-- TOTAL DOKUMEN -->
                <div class="col-md-4 col-lg-3">
                    <div class="card border-0 h-100 shadow-sm text-center p-4">
                        <div class="mb-3">
                            <i class="fa fa-file-alt fa-3x text-success"></i>
                        </div>
                        <h4 class="fw-bold">TOTAL DOKUMEN</h4>
                        <h2 class="text-success mb-0">150</h2>
                        <p class="text-muted small">Dokumen Persil</p>
                    </div>
                </div>

                <!-- TOTAL WARGA -->
                <div class="col-md-4 col-lg-3">
                    <div class="card border-0 h-100 shadow-sm text-center p-4">
                        <div class="mb-3">
                            <i class="fa fa-users fa-3x text-warning"></i>
                        </div>
                        <h4 class="fw-bold">TOTAL WARGA</h4>
                        <h2 class="text-warning mb-0">167</h2>
                        <p class="text-muted small">Data Warga Terdaftar</p>
                    </div>
                </div>

                <!-- TOTAL PENGGUNA -->
                <div class="col-md-4 col-lg-3">
                    <div class="card border-0 h-100 shadow-sm text-center p-4">
                        <div class="mb-3">
                            <i class="fa fa-user-circle fa-3x text-info"></i>
                        </div>
                        <h4 class="fw-bold">TOTAL PENGGUNA</h4>
                        <h2 class="text-info mb-0">100</h2>
                        <p class="text-muted small">Admin & User</p>
                    </div>
                </div>

            </div>

            <!-- STATS CARDS ROW 2 -->
            <div class="row g-4 mb-5 wow fadeInUp" data-wow-delay="0.2s">

                <!-- DATA SENGKETA -->
                <div class="col-md-4 col-lg-3">
                    <div class="card border-0 h-100 shadow-sm text-center p-4">
                        <div class="mb-3">
                            <i class="fa fa-exclamation-triangle fa-3x text-danger"></i>
                        </div>
                        <h4 class="fw-bold">DATA SENGKETA</h4>
                        <h2 class="text-danger mb-0">112</h2>
                        <p class="text-muted small">Kasus Sengketa Persil</p>
                    </div>
                </div>

                <!-- PETA PERSIL -->
                <div class="col-md-4 col-lg-3">
                    <div class="card border-0 h-100 shadow-sm text-center p-4">
                        <div class="mb-3">
                            <i class="fa fa-map-marked-alt fa-3x text-primary"></i>
                        </div>
                        <h4 class="fw-bold">PETA PERSIL</h4>
                        <h2 class="text-primary mb-0">120</h2>
                        <p class="text-muted small">Persil Tersertifikasi</p>
                    </div>
                </div>

                <!-- JENIS PENGGUNAAN -->
                <div class="col-md-4 col-lg-3">
                    <div class="card border-0 h-100 shadow-sm text-center p-4">
                        <div class="mb-3">
                            <i class="fa fa-tags fa-3x text-success"></i>
                        </div>
                        <h4 class="fw-bold">JENIS PENGGUNAAN</h4>
                        <h2 class="text-success mb-0">120</h2>
                        <p class="text-muted small">Kategori Penggunaan</p>
                    </div>
                </div>

                
            </div>

            <!-- PENGEMBANG INFO -->
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-12">
                    <div class="bg-light p-4 rounded shadow-sm">

                        <h4 class="fw-bold text-primary mb-3">Informasi Pengembang</h4>

                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <h5 class="fw-bold mb-1">Tim Pengembang Sistem Pertanahan</h5>
                                <p class="text-muted mb-3">
                                    <i class="fa fa-calendar-alt me-2"></i>
                                    Mulai 24/07/2023
                                </p>
                                <p class="mb-3">
                                    Sistem Informasi Pertanahan untuk mendata persil tanah, warga, dokumen, 
                                    dan peta digital pertanahan di desa.
                                </p>
                                <p class="mb-0">
                                    <i class="fa fa-tasks me-2"></i>
                                    Fitur: Data Warga, Persil, Dokumen, Peta Digital, Sengketa
                                </p>
                            </div>
                            <div class="col-lg-4 text-center">
                                <div class="bg-primary text-white p-4 rounded">
                                    <i class="fa fa-code fa-4x mb-3"></i>
                                    <h5 class="fw-bold">Sistem Aktif</h5>
                                    <p class="small mb-0">Versi 1.0</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- FOOTER NOTE -->
            <div class="text-center mt-5 pt-4 border-top wow fadeInUp" data-wow-delay="0.4s">
                <p class="text-muted mb-0">
                    © 2025 Sistem Informasi Pertanahan Desa. All rights reserved.
                </p>
            </div>

        </div>
    </div>

</div>

<style>
    .card {
        transition: transform 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .card h2 {
        font-size: 2.5rem;
        font-weight: bold;
    }
    
    .card h4 {
        font-size: 1rem;
        margin-bottom: 10px;
    }
</style>
@endsection