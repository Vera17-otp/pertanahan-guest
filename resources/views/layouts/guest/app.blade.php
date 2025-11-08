<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pertanahan - Guest</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    

    @include('layouts.guest.css')
</head>


<body>

    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        @include('layouts.guest.header')

        @yield('content')

        <!-- Footer Start -->
        @include('layouts.guest.footer')
        <!-- Footer End -->


        <!-- Back to Top -->
         
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        <a href="https://wa.me/6281234567890"
   class="whatsapp-float"
   target="_blank"
   title="Hubungi Kami di WhatsApp">
  <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png"
       alt="WhatsApp"
       width="60"
       height="60">
</a>
    </div>
    

    <!-- JavaScript Libraries -->
@include('layouts.guest.js')

</body>

</html>
