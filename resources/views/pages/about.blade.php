@extends('layouts.guest.app')

@section('content')
<div class="container-xxl bg-white p-0">

    <!-- =============================== -->
    <!--    HEADER (PAGE HEADER)         -->
    <!-- =============================== -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url('{{ asset('img/carousel-1.jpg') }}'); background-size: cover;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">
                    Tentang Pertanahan
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
                    Informasi Umum
                </h6>

                <h1 class="mb-4">
                    Tentang <span class="text-primary text-uppercase">Pertanahan</span>
                </h1>
            </div>

            <!-- ABOUT CONTENT -->
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-12">
                    <div class="p-4 bg-light rounded shadow-sm">

                        <h4 class="fw-bold mb-3 text-primary">Apa itu Pertanahan?</h4>
                        <p class="text-muted">
                            Pertanahan adalah sektor yang mengatur pengelolaan, penggunaan,
                            pemanfaatan, dan administrasi data tanah dalam suatu wilayah.
                            Pengelolaan pertanahan menjadi penting untuk menjaga ketertiban,
                            kepastian hukum, dan transparansi informasi tanah masyarakat.
                        </p>

                        <h4 class="fw-bold mt-4 mb-3 text-primary">Tujuan Pengelolaan Pertanahan</h4>
                        <ul class="text-muted">
                            <li>Memberikan kepastian hukum kepemilikan tanah.</li>
                            <li>Mengelola data persil dan informasi penggunaan tanah.</li>
                            <li>Mendukung pembangunan desa melalui tata ruang yang tertib.</li>
                            <li>Menyediakan data yang akurat untuk masyarakat dan pemerintah.</li>
                        </ul>

                        <h4 class="fw-bold mt-4 mb-3 text-primary">Manfaat Bagi Masyarakat</h4>
                        <p class="text-muted">
                            Dengan adanya sistem pertanahan yang terstruktur, masyarakat dapat
                            dengan mudah mengakses informasi tentang tanah, dokumen persil,
                            jenis penggunaan, serta proses administrasi terkait.
                        </p>

                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
