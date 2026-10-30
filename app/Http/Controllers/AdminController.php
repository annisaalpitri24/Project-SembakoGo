<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('admin.login');
        }

        // Mengambil SEMUA penjual, apa pun statusnya
        $semuaPenjual = User::where('role', 'penjual')
            ->with('store')
            ->latest()
            ->get();

        // Menghitung jumlah penjual berdasarkan status
        $jumlahPenjual = User::where('role', 'penjual')->count();

        $jumlahPenjualAktif = User::where('role', 'penjual')
            ->where('status', 'active')
            ->count();

        $jumlahPenjualMenunggu = User::where('role', 'penjual')
            ->where('status', 'pending')
            ->count();

        $jumlahPenjualDitolak = User::where('role', 'penjual')
            ->where('status', 'rejected')
            ->count();

        $jumlahProduk = Product::count();

        $jumlahKategori = Category::count();

        $kategori = Category::withCount('products')
            ->orderBy('nama_kategori')
            ->get();

        return view('admin.dashboard', compact(
            'semuaPenjual',
            'jumlahPenjual',
            'jumlahPenjualAktif',
            'jumlahPenjualMenunggu',
            'jumlahPenjualDitolak',
            'jumlahProduk',
            'jumlahKategori',
            'kategori'
        ));
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
