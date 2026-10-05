<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterPenjualController extends Controller
{
    public function create()
    {
        return view('auth.register-penjual');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // Data pemilik
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'no_hp' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',

            // Data toko
            'nama_toko' => 'required|string|max:255',
            'alamat_toko' => 'required|string',
            'no_hp_toko' => 'required|string|max:20',
            'deskripsi' => 'nullable|string',
        ]);

        // Membuat akun penjual
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'no_hp' => $validated['no_hp'],
            'password' => Hash::make($validated['password']),
            'role' => 'penjual',
            'status' => 'pending',
        ]);

        // Membuat data toko
        Store::create([
            'user_id' => $user->id,
            'nama_toko' => $validated['nama_toko'],
            'alamat_toko' => $validated['alamat_toko'],
            'no_hp_toko' => $validated['no_hp_toko'],
            'deskripsi' => $validated['deskripsi'] ?? null,
        ]);

        return redirect('/login')->with(
            'success',
            'Pendaftaran berhasil. Silakan menunggu persetujuan admin sebelum login sebagai penjual.'
        );
    }
}