<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
public function store(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:pembeli,penjual,admin',
        ]);

        // Coba login
        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau password salah.',
                ])
                ->onlyInput('email');
        }

        // Regenerasi session setelah berhasil login
        $request->session()->regenerate();

        $user = Auth::user();

        // =========================
        // ADMIN
        // =========================
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        // =========================
        // PENJUAL
        // =========================
        if ($user->role === 'penjual') {

            // Penjual belum disetujui admin
            if ($user->status === 'pending') {

                Auth::logout();

                return redirect('/login')->withErrors([
                    'email' => 'Akun penjual kamu masih menunggu persetujuan admin.',
                ]);
            }

            // Penjual ditolak admin
            if ($user->status === 'rejected') {

                Auth::logout();

                return redirect('/login')->withErrors([
                    'email' => 'Pendaftaran toko kamu ditolak oleh admin.',
                ]);
            }

            // Penjual sudah aktif
            return redirect('/penjual/dashboard');
        }

        // =========================
        // PEMBELI
        // =========================
        if ($user->role === 'pembeli') {
            return redirect()->intended('/');
        }

        // Jika role tidak dikenali
        Auth::logout();

        return redirect('/login')->withErrors([
            'email' => 'Role akun tidak dikenali.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}