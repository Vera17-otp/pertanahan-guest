@extends('layouts.guest.app')

@section('title', 'Tambah User')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Tambah User Baru</h2>

        {{-- Tampilkan error jika ada --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Tambah User --}}
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="profile_image" class="form-label">Foto Profil</label>
                        <div class="text-center mb-3">
                            <img id="profileImagePreview" 
                                 src="{{ asset('assets/img/user-placeholder.png') }}" 
                                 class="img-thumbnail rounded-circle" 
                                 alt="Preview Foto Profil"
                                 style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <input type="file" 
                               name="profile_image" 
                               id="profile_image" 
                               class="form-control" 
                               accept="image/*"
                               onchange="previewImage(this)">
                        <small class="text-muted">Format: JPG, PNG, GIF, WebP. Maksimal: 2MB</small>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                            placeholder="Masukkan email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password">
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password">
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-control">
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </form>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('profileImagePreview');
            const file = input.files[0];
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                
                reader.readAsDataURL(file);
            } else {
                preview.src = "{{ asset('assets/img/user-placeholder.png') }}";
            }
        }
    </script>
@endsection