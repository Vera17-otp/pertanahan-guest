@extends('layouts.guest.app')

@section('content')

<!-- Header -->
<div class="container-fluid page-header mb-5 p-0"
    style="background-image: url('{{ asset('assets/img/user2.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center pb-5">
            <h1 class="display-5 text-white mb-3 fw-bold animated slideInDown">Data User</h1>
        </div>
    </div>
</div>
    {{-- Form Edit --}}
    <div class="container mt-5">
        <h3 class="mb-4 text-center">Edit User (Guest)</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('guest.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4 mb-4">
                    <!-- Foto Profil Preview -->
                    <div class="text-center">
                        <div class="mb-3">
                            <img id="profileImagePreview" 
                                 src="{{ $user->profile_image_url }}" 
                                 class="img-thumbnail rounded-circle" 
                                 alt="Foto Profil"
                                 style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Ubah Foto Profil</label>
                            <input type="file" 
                                   name="profile_image" 
                                   id="profile_image" 
                                   class="form-control" 
                                   accept="image/*"
                                   onchange="previewImage(this)">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah</small>
                        </div>
                        
                        @if($user->profileImage)
                        <div class="mt-2">
                            <button type="button" 
                                    class="btn btn-sm btn-outline-danger" 
                                    onclick="if(confirm('Yakin ingin menghapus foto profil?')) window.location.href='{{ route('user.delete.profile', $user->id) }}'">
                                <i class="fa fa-trash"></i> Hapus Foto
                            </button>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password <small class="text-muted">(kosongkan jika tidak diubah)</small></label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>
                                User
                            </option>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
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
            }
        }
    </script>
@endsection