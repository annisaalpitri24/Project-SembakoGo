@extends('penjual.layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="page-heading">
    <div>
        <h1>Edit Kategori</h1>
        <p>Perbarui informasi kategori produk tokomu.</p>
    </div>

    <a href="{{ route('penjual.kategori.index') }}"
        class="btn btn-secondary">
        ← Kembali
    </a>
</div>

<div class="card" style="max-width: 750px;">

    <h2 style="margin-top: 0; margin-bottom: 8px;">
        Informasi Kategori
    </h2>

    <p style="color: #64748b; margin-bottom: 25px;">
        Ubah nama atau deskripsi kategori sesuai kebutuhan.
    </p>

    @if ($errors->any())
    <div class="alert alert-error">
        <strong>Periksa kembali data yang kamu masukkan:</strong>

        <ul style="margin-bottom: 0;">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form
        action="{{ route('penjual.kategori.update', $kategori) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>

            <input
                type="text"
                id="nama_kategori"
                name="nama_kategori"
                value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                placeholder="Contoh: Sayuran"
                maxlength="255"
                required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi Kategori</label>

            <textarea
                id="deskripsi"
                name="deskripsi"
                placeholder="Masukkan deskripsi kategori (opsional)">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>

            <small style="color: #64748b;">
                Deskripsi boleh dikosongkan.
            </small>
        </div>

        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>

            <a href="{{ route('penjual.kategori.index') }}"
                class="btn btn-secondary">
                Batal
            </a>
        </div>

    </form>
</div>
@endsection