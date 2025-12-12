@extends('layouts.guest.app')

@section('content')
<div class="container-xxl bg-white p-0">

    <!-- =============================== -->
    <!--           HEADER                -->
    <!-- =============================== -->
    <div class="container-fluid page-header mb-5 p-0"
         style="background-image: url('{{ asset('img/carousel-2.jpg') }}'); background-size: cover;">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">
                    Kontak Pertanahan
                </h1>
            </div>
        </div>
    </div>

    <!-- =============================== -->
    <!--        CONTACT CONTENT           -->
    <!-- =============================== -->
    <div class="container-xxl py-5">
        <div class="container">

            <!-- TITLE -->
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-primary text-uppercase">Informasi Kontak</h6>
                <h1 class="mb-4">
                    Hubungi <span class="text-primary text-uppercase">Kami</span>
                </h1>
            </div>

            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">

                <!-- CONTACT INFORMATION BOX -->
                <div class="col-lg-6">
                    <div class="bg-light p-4 rounded shadow-sm h-100">

                        <h4 class="fw-bold text-primary mb-3">Kantor Pertanahan Desa</h4>

                        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>
                            Bandung, Cianjur, Jl.Selajambek
                        </p>

                        <p class="mb-2"><i class="fa fa-phone-alt text-primary me-2"></i>
                            (021) 8899-1122
                        </p>

                        <p class="mb-2"><i class="fa fa-envelope text-primary me-2"></i>
                            pertanahan@desa.go.id
                        </p>

                        <p class="mb-4"><i class="fa fa-clock text-primary me-2"></i>
                            Senin – Jumat : 08.00 – 16.00 WIB
                        </p>

                        <h5 class="fw-bold mt-4 mb-3 text-primary">Layanan yang Bisa Dihubungi</h5>
                        <ul class="text-muted">
                            <li>Konsultasi data persil</li>
                            <li>Informasi jenis penggunaan tanah</li>
                            <li>Pengecekan dokumen pertanahan</li>
                            <li>Bantuan pengajuan administrasi</li>
                        </ul>

                    </div>
                </div>

                <!-- CONTACT FORM -->
                <div class="col-lg-6">
                    <div class="bg-light p-4 rounded shadow-sm h-100">

                        <h4 class="fw-bold text-primary mb-3">Kirim Pesan</h4>

                        <form>
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Nama lengkap" required>
                                </div>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Email" required>
                                </div>

                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Subjek pesan" required>
                                </div>

                                <div class="col-12">
                                    <textarea class="form-control" rows="5" placeholder="Tulis pesan Anda..." required></textarea>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-2">
                                        <i class="fa fa-paper-plane me-2"></i> Kirim Pesan
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection
