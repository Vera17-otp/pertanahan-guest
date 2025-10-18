<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Pertanahan</title>
  <link rel="stylesheet" href="{{ asset('assets/guest/css/style.css') }}">
<script src="{{ asset('assets/guest/js/bootstrap.bundle.min.js') }}"></script>


</head>
<body>
  <header class="bg-success text-white text-center py-3">
    <h2>Sistem Informasi Pertanahan</h2>
  </header>

  <div class="container py-5 text-center">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h4>Selamat datang di halaman Guest Pertanahan!</h4>
    <p>Di sini nanti kamu bisa menampilkan data tanah, lokasi, dan informasi publik.</p>
    <a href="{{ route('auth.index') }}" class="btn btn-danger mt-3">Logout</a>
  </div>

  <footer class="bg-dark text-white text-center py-2">
    <small>© 2025 Sistem Pertanahan. All Rights Reserved.</small>
  </footer>
</body>
</html>
