<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .hero-section {
            background-color: #3187e9;
            color: white;
            padding: 50px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 2.5rem;
        }

        .card {
            margin-top: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .footer {
            margin-top: 50px;
            padding: 20px 0;
            background-color: #f8f9fa;
            text-align: center;
        }

        .footer p {
            margin: 0;
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">{{ $judul }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-6 mb-2">{{ $judul }}</h1>
            <p class="lead mb-0">Detail data persil tanah yang tersimpan dalam sistem.</p>
        </div>
    </section>

    <!-- Content Section -->
    <section id="content" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Card Detail Persil -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Detail Persil</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped align-middle">
                                <tbody>
                                    <tr>
                                        <th scope="row">ID Persil</th>
                                        <td>{{ $persil['persil_id'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kode Persil</th>
                                        <td>{{ $persil['kode_persil'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pemilik Warga ID</th>
                                        <td>{{ $persil['pemilik_warga_id'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Luas (m²)</th>
                                        <td><span class="badge text-bg-success">{{ $persil['luas_m2'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Penggunaan</th>
                                        <td>{{ $persil['penggunaan'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Lahan</th>
                                        <td>{{ $persil['alamat_lahan'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>RT / RW</th>
                                        <td>{{ $persil['rt'] }} / {{ $persil['rw'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="#" class="btn btn-primary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Sistem Pertanahan. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
