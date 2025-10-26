@extends('guest.layouts.guest.app')

@section('content')
    {{-- Navbar --}}
    <div class="row gx-0">
        <x-navbar />
    </div>

    {{-- Form Edit --}}
    <div class="container mt-5">
        <h3 class="mb-4 text-center">Edit User (Guest)</h3>

        <form action="{{ route('guest.user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $user->name) }}"
                    class="form-control"
                >
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email', $user->email) }}"
                    class="form-control"
                >
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password <small class="text-muted">(kosongkan jika tidak diubah)</small></label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                >
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="form-control"
                >
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
