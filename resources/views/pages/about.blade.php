@extends('layouts.guest.app')

@section('content')
<div class="container-xxl bg-white p-0">

    <!-- =============================== -->
    <!--    HEADER (PAGE HEADER)         -->
    <!-- =============================== -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url('{{ asset('assets/img/hutan1.jpg') }}'); background-size: cover;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">
                     Sistem Pertanahan
                </h1>
            </div>
        </div>
    </div>

    <!-- =============================== -->
    <!--     MAIN CONTENT SECTION         -->
    <!-- =============================== -->
    <div class="container-xxl py-5">
        <div class="container">

            <!-- SECTION TITLE -->
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">
                    Informasi Sistem
                </h6>

                <h1 class="mb-4">
                    Tentang <span class="text-primary text-uppercase">Sistem Pertanahan</span>
                </h1>
            </div>

            <!-- ABOUT CONTENT -->
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-12">
                    <div class="p-4 bg-light rounded shadow-sm">

                        <!-- INTRO SECTION WITH IMAGE -->
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3 text-primary">Apa itu Sistem Manajemen Pertanahan?</h4>
                                <p class="text-muted mb-4">
                                    Sistem Manajemen Pertanahan adalah sebuah platform digital yang dirancang untuk 
                                    mengelola data kepemilikan, penggunaan, dan administrasi tanah secara terintegrasi. 
                                    Sistem ini membantu dalam pendataan, pemantauan, dan pengelolaan aset tanah 
                                    dengan lebih efisien dan transparan.
                                </p>
                                <p class="text-muted">
                                    Dengan sistem ini, proses administrasi pertanahan menjadi lebih terstruktur, 
                                    akurat, dan mudah diakses oleh pihak yang berwenang.
                                </p>
                            </div>
                            <div class="col-lg-6 text-center">
                                <img src="{{ asset('assets/img/pertanahan 4.jpg') }}" 
                                     alt="Sistem Pertanahan Illustration" 
                                     class="img-fluid rounded shadow"
                                     style="max-height: 300px;">
                            </div>
                        </div>

                        <!-- TUJUAN SISTEM SECTION -->
                        <h4 class="fw-bold mt-5 mb-3 text-primary">Tujuan Sistem Pertanahan</h4>
                        <div class="row mb-4">
                            <div class="col-md-4 mb-3">
                                <div class="card border-0 h-100 shadow-sm">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <i class="fa fa-database fa-3x text-primary"></i>
                                        </div>
                                        <h5 class="fw-bold">Digitalisasi Data</h5>
                                        <p class="text-muted small">
                                            Mengubah data fisik tanah menjadi digital untuk kemudahan akses
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card border-0 h-100 shadow-sm">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <i class="fa fa-shield-alt fa-3x text-primary"></i>
                                        </div>
                                        <h5 class="fw-bold">Keamanan Data</h5>
                                        <p class="text-muted small">
                                            Menjamin keamanan dan keabsahan data kepemilikan tanah
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card border-0 h-100 shadow-sm">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                                        </div>
                                        <h5 class="fw-bold">Efisiensi Administrasi</h5>
                                        <p class="text-muted small">
                                            Mempercepat proses administrasi pertanahan dan perizinan
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ALUR KERJA SECTION WITH IMAGE -->
                        <h4 class="fw-bold mt-5 mb-3 text-primary">Alur Kerja Sistem</h4>
                        <div class="row align-items-center mb-4">
                            <div class="col-lg-6">
                                <div class="timeline-steps">
                                    <div class="timeline-step mb-4">
                                        <div class="timeline-step-icon bg-primary">
                                            <i class="fa fa-map-marked-alt"></i>
                                        </div>
                                        <h6 class="fw-bold"> 1. Pendataan Tanah</h6>
                                        <p class="text-muted small">Input data tanah meliputi lokasi, luas, dan kepemilikan</p>
                                    </div>
                                    <div class="timeline-step mb-4">
                                        <div class="timeline-step-icon bg-success">
                                            <i class="fa fa-file-contract"></i>
                                        </div>
                                        <h6 class="fw-bold"> 2. Verifikasi Data</h6>
                                        <p class="text-muted small">Verifikasi kebenaran data oleh pihak berwenang</p>
                                    </div>
                                    <div class="timeline-step mb-4">
                                        <div class="timeline-step-icon bg-warning">
                                            <i class="fa fa-certificate"></i>
                                        </div>
                                        <h6 class="fw-bold"> 3. Penerbitan Sertifikat</h6>
                                        <p class="text-muted small">Penerbitan sertifikat kepemilikan tanah digital</p>
                                    </div>
                                    <div class="timeline-step">
                                        <div class="timeline-step-icon bg-info">
                                            <i class="fa fa-chart-bar"></i>
                                        </div>
                                        <h6 class="fw-bold"> 4. Monitoring & Laporan</h6>
                                        <p class="text-muted small">Pemantauan penggunaan tanah dan laporan periodik</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center">
                                <img src="{{ asset('assets/img/slideshow/land 1.jpg') }}" 
                                     alt="Workflow Pertanahan" 
                                     class="img-fluid rounded shadow"
                                     style="max-height: 350px;">
                            </div>
                        </div>

                        <!-- FITUR UTAMA SECTION -->
                        <h4 class="fw-bold mt-5 mb-3 text-primary">Fitur Utama Sistem</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fa fa-check-circle text-success fa-2x me-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold">Manajemen Data Tanah</h6>
                                        <p class="text-muted small">CRUD data tanah, lokasi, dan kepemilikan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fa fa-check-circle text-success fa-2x me-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold">Peta Digital</h6>
                                        <p class="text-muted small">Visualisasi tanah dalam peta digital interaktif</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fa fa-check-circle text-success fa-2x me-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold">Sertifikat Digital</h6>
                                        <p class="text-muted small">Penerbitan dan pengelolaan sertifikat tanah digital</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fa fa-check-circle text-success fa-2x me-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold">Laporan & Statistik</h6>
                                        <p class="text-muted small">Generasi laporan dan analisis data pertanahan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fa fa-check-circle text-success fa-2x me-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold">Perizinan Tanah</h6>
                                        <p class="text-muted small">Pengelolaan perizinan penggunaan tanah</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fa fa-check-circle text-success fa-2x me-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold">Notifikasi & Reminder</h6>
                                        <p class="text-muted small">Pengingat masa berlaku sertifikat dan perizinan</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- MANFAAT SISTEM SECTION -->
                        <h4 class="fw-bold mt-5 mb-3 text-primary">Manfaat Sistem Pertanahan</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="alert alert-success" role="alert">
                                    <h6 class="alert-heading fw-bold"><i class="fa fa-gem me-2"></i>Bagi Pemerintah</h6>
                                    <p class="mb-0 small">Meningkatkan transparansi dan akuntabilitas pengelolaan tanah</p>
                                    <p class="mb-0 small">Memudahkan perencanaan tata ruang dan pembangunan</p>
                                    <p class="mb-0 small">Mengurangi konflik tanah melalui data yang terverifikasi</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="alert alert-info" role="alert">
                                    <h6 class="alert-heading fw-bold"><i class="fa fa-user-tie me-2"></i>Bagi Masyarakat</h6>
                                    <p class="mb-0 small">Kepastian hukum atas kepemilikan tanah</p>
                                    <p class="mb-0 small">Kemudahan akses informasi tanah secara online</p>
                                    <p class="mb-0 small">Proses administrasi yang lebih cepat dan efisien</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="alert alert-warning" role="alert">
                                    <h6 class="alert-heading fw-bold"><i class="fa fa-building me-2"></i>Bagi Investor</h6>
                                    <p class="mb-0 small">Data tanah yang akurat untuk analisis investasi</p>
                                    <p class="mb-0 small">Transparansi dalam proses pengadaan tanah</p>
                                    <p class="mb-0 small">Pengurangan risiko sengketa kepemilikan</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="alert alert-primary" role="alert">
                                    <h6 class="alert-heading fw-bold"><i class="fa fa-leaf me-2"></i>Bagi Lingkungan</h6>
                                    <p class="mb-0 small">Monitoring penggunaan tanah berkelanjutan</p>
                                    <p class="mb-0 small">Pengendalian alih fungsi lahan</p>
                                    <p class="mb-0 small">Data pendukung kebijakan konservasi</p>
                                </div>
                            </div>
                        </div>

                        <!-- CALL TO ACTION -->
                        <div class="text-center mt-5 pt-4 border-top">
                            <h5 class="fw-bold text-primary mb-3">Tertarik Menggunakan Sistem?</h5>
                            <p class="text-muted mb-4">
                                Sistem Manajemen Pertanahan siap membantu pengelolaan tanah yang lebih baik
                            </p>
                           
                            <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg px-4 ms-2">
                                <i class="fa fa-envelope me-2"></i> Hubungi Kami
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<style>
    .timeline-steps {
        position: relative;
        padding-left: 30px;
    }
    
    .timeline-step {
        position: relative;
        margin-bottom: 20px;
    }
    
    .timeline-step:not(:last-child):after {
        content: '';
        position: absolute;
        left: 20px;
        top: 40px;
        bottom: -40px;
        width: 2px;
        background-color: #e9ecef;
    }
    
    .timeline-step-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        position: absolute;
        left: -30px;
        top: 0;
    }
    
    .card {
        transition: transform 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    .alert {
        border-left: 4px solid;
        height: 100%;
    }
    
    .alert-success {
        border-left-color: #198754;
    }
    
    .alert-info {
        border-left-color: #0dcaf0;
    }
    
    .alert-warning {
        border-left-color: #ffc107;
    }
    
    .alert-primary {
        border-left-color: #0d6efd;
    }
</style>
@endsection