<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 🔹 Tampilkan halaman login
    public function index()
    {
        // if (Auth::check()) {
        //     //Redirect ke halaman dashboard
        //     return redirect()->route('pertanahanguest.index');
        // }
        // //Redirect ke halaman login
        return view('pages.login-form');
    }

    // 🔹 Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|string',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/', // minimal ada huruf kapital
            ],
        ], [
            'email.required'    => 'Email atau nama pengguna wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 3 karakter.',
            'password.regex'    => 'Password harus mengandung minimal satu huruf kapital.',
        ]);

        // Bisa login pakai email atau nama
        $loginValue = $request->input('email');
        $fieldType  = filter_var($loginValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $user = User::where($fieldType, strtolower($loginValue))->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->route('home')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'loginError' => 'Login gagal! Email/nama atau password salah.',
        ])->withInput();
    }

    // 🔹 Logout user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.index')->with('success', 'Anda telah logout.');

    }
}
