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
            background-color: #f2efe6; /* warna krem tanah */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            max-width: 500px;
            margin: 80px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .login-header {
            background: url("https://i.ibb.co/wgVvYyV/land.jpg") center/cover no-repeat;
            height: 150px;
            border-radius: 12px 12px 0 0;
        }

        .login-container h2 {
            color: #6b4226; /* warna coklat tanah */
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
        }

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

        .form-control {
            border-radius: 8px;
            padding: 10px;
        }

        .alert {
            font-size: 0.9rem;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="login-header"></div>
        <h2>Login Pertanahan</h2>
        @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('login.process')}}" method="POST" class="mt-3">
            @csrf
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="Masukkan username">
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
