@extends('penjual.layouts.app')

@section('title', 'Beranda Penjual')

@section('content')
<div class="page-heading">
    <div>
        <p style="color:#00845f;margin-bottom:12px;">
            Dashboard SembakoGo
        </p>

        <h1>Selamat datang, {{ auth()->user()->name }}!</h1>

        <p>Kelola toko dan kategori produkmu dari halaman ini.</p>
    </div>

    <a href="{{ route('penjual.kategori.create') }}"
        class="btn btn-primary">
        + Tambah Kategori
    </a>
</div>

<div class="stats">
    <div class="card">
        <div class="stat-label">Nama Toko</div>
        <div class="stat-number" style="font-size:22px;">
            {{ auth()->user()->store->nama_toko ?? 'Belum diatur' }}
        </div>
    </div>

    <div class="card">
        <div class="stat-label">Total Kategori</div>
        <div class="stat-number">
            {{ \App\Models\Category::where(
                    'store_id',
                    auth()->user()->store->id ?? 0
                )->count() }}
        </div>
    </div>

    <div class="card">
        <div class="stat-label">Status Akun</div>
        <div class="stat-number" style="font-size:22px;">
            {{ ucfirst(auth()->user()->status ?? 'active') }}
        </div>
    </div>
</div>

<div class="card">
    <h2>Mulai Kelola Toko</h2>
    <p style="color:#64748b;">
        Lengkapi profil toko dan buat kategori untuk mengelompokkan
        produk sembako yang akan dijual.
    </p>

    <a href="{{ route('penjual.profil') }}"
        class="btn btn-secondary">
        Lihat Profil Toko
    </a>

    <a href="{{ route('penjual.kategori.index') }}"
        class="btn btn-primary">
        Kelola Kategori
    </a>
</div>
@endsection