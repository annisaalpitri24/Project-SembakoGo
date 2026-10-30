@extends('admin.layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

<div class="heading">
    <h1>Tambah Kategori</h1>
    <p>Buat kategori baru untuk mengelompokkan produk SembakoGo.</p>
</div>

<div class="card" style="max-width: 750px;">

    <div class="card-heading">
        <div>
            <h2>Informasi Kategori</h2>
            <p class="muted">
                Masukkan nama dan deskripsi kategori produk.
            </p>
        </div>

        <a href="{{ route('admin.kategori.index') }}"
            class="btn btn-secondary">
            ← Kembali
        </a>
    </div>

    @if ($errors->any())
    <div class="alert alert-error">
        <strong>Terjadi kesalahan:</strong>

        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.kategori.store') }}"
        method="POST">

        @csrf

        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>

            <input
                type="text"
                id="nama_kategori"
                name="nama_kategori"
                value="{{ old('nama_kategori') }}"
                placeholder="Contoh: Sayuran"
                maxlength="255"
                required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi Kategori</label>

            <textarea
                id="deskripsi"
                name="deskripsi"
                placeholder="Contoh: Aneka sayuran segar untuk kebutuhan sehari-hari.">{{ old('deskripsi') }}</textarea>

            <small class="muted">
                Deskripsi bersifat opsional dan boleh dikosongkan.
            </small>
        </div>

        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            <button type="submit" class="btn btn-primary">
                Simpan Kategori
            </button>

            <a href="{{ route('admin.kategori.index') }}"
                class="btn btn-secondary">
                Batal
            </a>
        </div>

    </form>
</div>

@endsection