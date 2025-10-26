<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
                'regex:/[A-Z]/'
            ],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
            'password.regex' => 'Password harus mengandung minimal satu huruf kapital.',
        ]);
        $name = strtolower($request->username);
        $email = User::where('email', $request->email)->first();
        $user = User::where('name', $name)->first();

        if($email || $user && Hash::check($request->password, $user->password)){
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('datapertanahan')->with('success', 'Login berhasil!');
        }
        return back()->withErrors([
            'loginError'=>'Login gagal! password atau username salah.'
        ])->withInput();
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->back()->with('success', 'Anda telah logout.');
    }
}
