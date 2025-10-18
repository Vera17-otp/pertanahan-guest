<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function index()
    {
        return view('login-form');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/' // harus ada huruf kapital
            ],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
            'password.regex' => 'Password harus mengandung minimal satu huruf kapital.',
        ]);

        $username = $request->input('username');

        // Kalau validasi berhasil → langsung ke halaman berhasil
        return redirect()->route('index', ['username' => $username]);
        // mengulang kembali untuk demokan github
    }
}
