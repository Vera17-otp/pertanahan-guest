@extends('guest.layouts.app')

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
    <form action="{{ route('guest.user.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Masukkan nama lengkap">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Masukkan email">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('guest.user.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
