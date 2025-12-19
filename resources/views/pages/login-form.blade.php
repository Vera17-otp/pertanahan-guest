<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Pertanahan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow: hidden;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* LAYER SLIDESHOW BACKGROUND */
        .bg-slideshow {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-size: cover;
            background-position: center;
            animation: slideShow 20s infinite;
            filter: brightness(70%);
        }

        /* ANIMASI SLIDESHOW */
        @keyframes slideShow {
            0%   { background-image: url('{{ asset("assets/img/slideshow/land 1.jpg") }}'); }
            25%  { background-image: url('{{ asset("assets/img/slideshow/land 2.jpg") }}'); }
            50%  { background-image: url('{{ asset("assets/img/slideshow/land 3.jpg") }}'); }
            75%  { background-image: url('{{ asset("assets/img/slideshow/land 4.jpg") }}'); }
            100% { background-image: url('{{ asset("assets/img/slideshow/land 1.jpg") }}'); }
        }

        /* LOGIN CARD */
        .login-container {
            width: 100%;
            max-width: 500px;
            padding: 0;
            background-color: rgba(242, 203, 203, 0.9);
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 10;
        }

        /* LOGO BOX */
        .login-header {
            height: 170px;
            border-radius: 12px 12px 0 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
        }

        .login-header img {
            max-height: 130px;
            object-fit: contain;
        }

        /* TITLE */
        .login-container h2 {
            color: #6b4226;
            font-weight: bold;
            text-align: center;
            padding: 20px 0 10px 0;
            margin: 0;
        }

        /* BUTTON */
        .btn-primary {
            background-color: #6b4226;
            border: none;
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #4e2e1b;
        }

        /* INPUT */
        .form-control {
            border-radius: 8px;
            padding: 10px;
        }

        /* ALERT ERRORS */
        .alert {
            font-size: 0.9rem;
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <!-- BACKGROUND SLIDESHOW -->
    <div class="bg-slideshow"></div>

    <!-- LOGIN CARD -->
    <div class="login-container">

        <!-- LOGO -->
        <div class="login-header">
            <img src="{{ asset('assets/img/logo_pertanahan.jpg') }}" alt="Logo Pertanahan">
        </div>

        <h2>Login Pertanahan</h2>

        @if($errors->any())
            <div class="alert alert-danger mt-3 mx-4">
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST" class="p-4">
            @csrf

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Masukkan username">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password">
            </div>

            <button class="btn btn-primary">Login</button>
        </form>

    </div>

</body>
</html>