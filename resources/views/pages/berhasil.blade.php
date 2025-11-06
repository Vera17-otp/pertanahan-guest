<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5 text-center">

    <div class="alert alert-success">
        <h2>Selamat Datang, {{ $username }} 🎉</h2>
        <p>Login Anda berhasil dilakukan.</p>
    </div>

    <a href="{{ url('/auth') }}" class="btn btn-primary">Kembali ke Login</a>

</body>
</html>
