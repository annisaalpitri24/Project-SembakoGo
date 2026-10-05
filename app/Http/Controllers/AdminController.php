<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // =========================
    // HALAMAN LOGIN ADMIN
    // =========================

    public function login()
    {
        return view('admin.login');
    }


    // =========================
    // PROSES LOGIN ADMIN
    // =========================

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Hanya akun dengan role admin dan status active
        // yang boleh masuk
        $loginData = [
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'role' => 'admin',
            'status' => 'active',
        ];

        if (!Auth::attempt($loginData)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau password admin salah.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }


    // =========================
    // DASHBOARD ADMIN
    // =========================

    public function dashboard()
    {
        // Pastikan yang mengakses adalah admin
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('admin.login');
        }

        $penjualMenunggu = User::where('role', 'penjual')
            ->where('status', 'pending')
            ->with('store')
            ->get();

        return view('admin.dashboard', compact('penjualMenunggu'));
    }


    // =========================
    // SETUJUI PENJUAL
    // =========================

    public function approveSeller(User $user)
    {
        // Pastikan yang melakukan adalah admin
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('admin.login');
        }

        if ($user->role !== 'penjual') {
            abort(404);
        }

        $user->update([
            'status' => 'active',
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Penjual berhasil disetujui.');
    }
}