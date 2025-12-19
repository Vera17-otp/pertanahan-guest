@extends('layouts.guest.app')

@section('content')
<div class="container-xxl bg-white p-0">

    <!-- =============================== -->
    <!-- PAGE HEADER / HERO SECTION -->
    <!-- =============================== -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url('{{ asset('assets/img/slideshow/land 1.jpg') }}'); background-size: cover;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-4 text-white fw-bold animated slideInDown">
                    Sistem Informasi Pertanahan
                </h1>
                <p class="text-white fs-5 mt-3">
                    Pengelolaan data tanah yang aman, transparan, dan terintegrasi
                </p>
                <a href="#fitur" class="btn btn-primary btn-lg mt-3 px-4">
                    Jelajahi Sistem
                </a>
            </div>
        </div>
    </div>

    <!-- =============================== -->
    <!-- SECTION: PENGENALAN -->
    <!-- =============================== -->
    <div class="container-xxl py-5">
        <div class="container">

            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-primary text-uppercase">
                    Beranda
                </h6>
                <h1 class="mb-4">
                    Selamat Datang di <span class="text-primary">Sistem Pertanahan</span>
                </h1>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <h4 class="fw-bold text-primary mb-3">
                        Apa itu Sistem Informasi Pertanahan?
                    </h4>
                    <p class="text-muted">
                        Sistem Informasi Pertanahan adalah aplikasi yang digunakan untuk
                        mengelola data tanah, pemilik, sertifikat, dan dokumen pertanahan
                        secara digital dan terpusat.
                    </p>
                    <p class="text-muted">
                        Sistem ini dirancang untuk meningkatkan efisiensi administrasi,
                        mengurangi kesalahan data, serta mendukung transparansi
                        pengelolaan pertanahan.
                    </p>
                </div>
                <div class="col-lg-6 text-center wow fadeInRight" data-wow-delay="0.2s">
                    <img src="{{ asset('assets/img/pertanahan 4.jpg') }}"
                         class="img-fluid rounded shadow"
                         style="max-height: 320px;">
                </div>
            </div>

        </div>
    </div>

    <!-- =============================== -->
    <!-- SECTION: FITUR UTAMA -->
    <!-- =============================== -->
    <div id="fitur" class="container-xxl py-5 bg-light">
        <div class="container">

            <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-primary text-uppercase">
                    Fitur Sistem
                </h6>
                <h1>
                    Fitur Utama <span class="text-primary">Pertanahan</span>
                </h1>
            </div>

            <div class="row g-4">

                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card border-0 shadow h-100 text-center p-4">
                        <i class="fa fa-map-marked-alt fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold">Data Bidang Tanah</h5>
                        <p class="text-muted small">
                            Pengelolaan data bidang tanah lengkap dengan lokasi dan luas
                        </p>
                    </div>
                </div>

                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="card border-0 shadow h-100 text-center p-4">
                        <i class="fa fa-file-alt fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold">Dokumen & Sertifikat</h5>
                        <p class="text-muted small">
                            Penyimpanan data sertifikat dan dokumen tanah secara digital
                        </p>
                    </div>
                </div>

                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="card border-0 shadow h-100 text-center p-4">
                        <i class="fa fa-users fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold">Manajemen Pemilik</h5>
                        <p class="text-muted small">
                            Data pemilik tanah terstruktur dan mudah dicari
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- =============================== -->
    <!-- SECTION: ALUR SISTEM -->
    <!-- =============================== -->
    <div class="container-xxl py-5">
        <div class="container">

            <div class="text-center mb-5 wow fadeInUp">
                <h6 class="section-title text-primary text-uppercase">
                    Alur Kerja
                </h6>
                <h1>
                    Cara Kerja <span class="text-primary">Sistem</span>
                </h1>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="timeline-steps">
                        <div class="timeline-step">
                            <div class="timeline-step-icon bg-primary">
                                <i class="fa fa-plus"></i>
                            </div>
                            <h6 class="fw-bold">Input Data</h6>
                            <p class="small text-muted">
                                Petugas menginput data tanah dan pemilik
                            </p>
                        </div>

                        <div class="timeline-step">
                            <div class="timeline-step-icon bg-success">
                                <i class="fa fa-edit"></i>
                            </div>
                            <h6 class="fw-bold">Verifikasi</h6>
                            <p class="small text-muted">
                                Data diverifikasi untuk memastikan keabsahan
                            </p>
                        </div>

                        <div class="timeline-step">
                            <div class="timeline-step-icon bg-info">
                                <i class="fa fa-database"></i>
                            </div>
                            <h6 class="fw-bold">Penyimpanan</h6>
                            <p class="small text-muted">
                                Data tersimpan aman dalam sistem
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 text-center">
                    <img src="{{ asset('assets/img/hutan1.jpg') }}"
                         class="img-fluid rounded shadow"
                         style="max-height: 340px;">
                </div>
            </div>

        </div>
    </div>

    <!-- =============================== -->
    <!-- SECTION: PENJELASAN PENUTUP -->
    <!-- =============================== -->
    <div class="container-xxl py-5 bg-primary text-white text-center">
        <h3 class="fw-bold mb-3">
            Sistem Pendukung Pengelolaan Pertanahan
        </h3>
        <p class="mb-3 px-lg-5">
            Sistem Informasi Pertanahan ini dikembangkan sebagai sarana pendukung
            dalam pengelolaan data tanah secara terstruktur dan terdokumentasi.
            Informasi pertanahan disajikan secara sistematis untuk mendukung
            kegiatan administrasi dan pengambilan keputusan.
        </p>
        <p class="mb-0 px-lg-5">
            Melalui sistem ini, diharapkan proses pendataan tanah dapat dilakukan
            secara lebih efektif, akurat, dan transparan sehingga mampu menunjang
            pengelolaan pertanahan yang tertib dan berkelanjutan.
        </p>
    </div>

</div>

<style>
.timeline-steps {
    position: relative;
    padding-left: 30px;
}
.timeline-step {
    position: relative;
    margin-bottom: 30px;
}
.timeline-step-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    left: -30px;
    top: 0;
}
.card {
    transition: transform .3s;
}
.card:hover {
    transform: translateY(-5px);
}
</style>
@endsection
