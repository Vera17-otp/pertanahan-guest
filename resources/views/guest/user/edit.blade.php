@extends('layouts.guest.app')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4 text-center">Edit User (Guest)</h3>

    <form action="{{ route('guest.user.update', $user->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Password (kosongkan jika tidak diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
