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
                    Tentang Sistem Manajemen User
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
                    Tentang <span class="text-primary text-uppercase">Modul User</span>
                </h1>
            </div>

            <!-- ABOUT CONTENT -->
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-12">
                    <div class="p-4 bg-light rounded shadow-sm">

                        <!-- INTRO SECTION WITH IMAGE -->
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3 text-primary">Apa itu Modul User?</h4>
                                <p class="text-muted mb-4">
                                    Modul User adalah sistem manajemen pengguna yang berfungsi untuk mengelola 
                                    data pengguna (user) dalam aplikasi. Modul ini memungkinkan administrator 
                                    untuk menambah, mengedit, menghapus, dan mengelola hak akses pengguna 
                                    dengan mudah dan efisien.
                                </p>
                                <p class="text-muted">
                                    Sistem ini dirancang dengan antarmuka yang user-friendly dan fitur-fitur 
                                    lengkap untuk mendukung operasional administrasi pengguna.
                                </p>
                            </div>
                            <div class="col-lg-6 text-center">
                                <img src="{{ asset('assets/img/pertanahan 4.jpg') }}" 
                                     alt="User Management Illustration" 
                                     class="img-fluid rounded shadow"
                                     style="max-height: 300px;">
                            </div>
                        </div>

                        <!-- TUJUAN SECTION -->
                        <h4 class="fw-bold mt-5 mb-3 text-primary">Tujuan Modul User</h4>
                        <div class="row mb-4">
                            <div class="col-md-4 mb-3">
                                <div class="card border-0 h-100 shadow-sm">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <i class="fa fa-users fa-3x text-primary"></i>
                                        </div>
                                        <h5 class="fw-bold">Manajemen Pengguna</h5>
                                        <p class="text-muted small">
                                            Mengelola data pengguna secara terpusat dan terstruktur
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
                                            Menjamin keamanan dan kerahasiaan data pengguna
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
                                        <h5 class="fw-bold">Efisiensi Operasional</h5>
                                        <p class="text-muted small">
                                            Meningkatkan efisiensi dalam pengelolaan pengguna
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ALUR KERJA SECTION WITH IMAGE -->
                        <h4 class="fw-bold mt-5 mb-3 text-primary">Alur Kerja Modul User</h4>
                        <div class="row align-items-center mb-4">
                            <div class="col-lg-6">
                                <div class="timeline-steps">
                                    <div class="timeline-step mb-4">
                                        <div class="timeline-step-icon bg-primary">
                                            <i class="fa fa-user-plus"></i>
                                        </div>
                                        <h6 class="fw-bold"> 1. Tambah User</h6>
                                        <p class="text-muted small">Admin menambahkan pengguna baru dengan data lengkap</p>
                                    </div>
                                    <div class="timeline-step mb-4">
                                        <div class="timeline-step-icon bg-success">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <h6 class="fw-bold"> 2. Kelola Data</h6>
                                        <p class="text-muted small">Edit dan update data pengguna sesuai kebutuhan</p>
                                    </div>
                                    <div class="timeline-step mb-4">
                                        <div class="timeline-step-icon bg-warning">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        <h6 class="fw-bold"> 3. Atur Hak Akses</h6>
                                        <p class="text-muted small">Mengatur role dan permission untuk setiap pengguna</p>
                                    </div>
                                    <div class="timeline-step">
                                        <div class="timeline-step-icon bg-info">
                                            <i class="fa fa-chart-bar"></i>
                                        </div>
                                        <h6 class="fw-bold"> 4. Monitoring</h6>
                                        <p class="text-muted small">Memantau aktivitas dan data pengguna secara real-time</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center">
                                <img src="{{ asset('assets/img/slideshow/land 1.jpg') }}" 
                                     alt="Workflow Illustration" 
                                     class="img-fluid rounded shadow"
                                     style="max-height: 350px;">
                            </div>
                        </div>

                        <!-- FITUR UTAMA SECTION -->
                        <h4 class="fw-bold mt-5 mb-3 text-primary">Fitur Utama Modul User</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fa fa-check-circle text-success fa-2x me-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold">CRUD Operations</h6>
                                        <p class="text-muted small">Create, Read, Update, Delete data pengguna</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fa fa-check-circle text-success fa-2x me-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold">Role Management</h6>
                                        <p class="text-muted small">Pengelolaan role (Admin, User, Client)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fa fa-check-circle text-success fa-2x me-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold">Search & Filter</h6>
                                        <p class="text-muted small">Pencarian dan filter data pengguna</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fa fa-check-circle text-success fa-2x me-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold">Photo Profile</h6>
                                        <p class="text-muted small">Upload dan kelola foto profil pengguna</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fa fa-check-circle text-success fa-2x me-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold">Pagination</h6>
                                        <p class="text-muted small">Navigasi halaman untuk data yang banyak</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fa fa-check-circle text-success fa-2x me-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold">Responsive Design</h6>
                                        <p class="text-muted small">Tampilan yang optimal di semua perangkat</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- MANFAAT SECTION -->
                        <h4 class="fw-bold mt-5 mb-3 text-primary">Manfaat Bagi Pengguna</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="alert alert-success" role="alert">
                                    <h6 class="alert-heading fw-bold"><i class="fa fa-user-check me-2"></i>Bagi Admin</h6>
                                    <p class="mb-0 small">Memudahkan pengelolaan data pengguna secara efisien</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-info" role="alert">
                                    <h6 class="alert-heading fw-bold"><i class="fa fa-users me-2"></i>Bagi User</h6>
                                    <p class="mb-0 small">Akses informasi yang cepat dan transparan</p>
                                </div>
                            </div>
                        </div>

                        <!-- CALL TO ACTION -->
                        <div class="text-center mt-5 pt-4 border-top">
                            <h5 class="fw-bold text-primary mb-3">Mulai Gunakan Modul User</h5>
                            <p class="text-muted mb-4">
                                Sistem ini siap membantu Anda dalam mengelola data pengguna dengan lebih baik
                            </p>
                            <a href="{{ route('user.index') }}" class="btn btn-primary btn-lg px-4">
                                <i class="fa fa-users me-2"></i> Lihat Data User
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
    }
    
    .alert-success {
        border-left-color: #198754;
    }
    
    .alert-info {
        border-left-color: #0dcaf0;
    }
</style>
@endsection