@extends('penjual.layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="page-heading">
    <div>
        <h1>Tambah Produk</h1>
        <p>Masukkan informasi produk yang akan dijual.</p>
    </div>

    <a href="{{ route('penjual.produk.index') }}" class="btn btn-secondary">
        ← Kembali
    </a>
</div>

<div class="card" style="max-width: 800px;">
    @if ($errors->any())
    <div class="alert alert-error">
        <strong>Periksa kembali data berikut:</strong>
        <ul style="margin-bottom: 0;">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form
        action="{{ route('penjual.produk.store') }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input
                type="text"
                id="nama_produk"
                name="nama_produk"
                value="{{ old('nama_produk') }}"
                placeholder="Contoh: Beras Premium 5 Kg"
                maxlength="255"
                required>
        </div>

        <div class="form-group">
            <label for="category_id">Kategori Produk</label>
            <select id="category_id" name="category_id" required>
                <option value="">-- Pilih Kategori --</option>

                @foreach ($categories as $category)
                <option
                    value="{{ $category->id }}"
                    @selected(old('category_id')==$category->id)
                    >
                    {{ $category->nama_kategori }}
                </option>
                @endforeach
            </select>

            @if ($categories->isEmpty())
            <small style="color: #dc2626;">
                Kamu belum memiliki kategori. Buat kategori terlebih dahulu
                sebelum menambahkan produk.
            </small>
            @endif
        </div>

        <div class="form-group">
            <label for="foto">Foto Produk</label>
            <input
                type="file"
                id="foto"
                name="foto"
                accept=".jpg,.jpeg,.png,.webp">
            <small style="color: #64748b;">
                Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
            </small>
        </div>

        <div class="form-group">
            <label for="harga">Harga Produk (Rp)</label>
            <input
                type="number"
                id="harga"
                name="harga"
                value="{{ old('harga') }}"
                placeholder="Contoh: 75000"
                min="0"
                step="0.01"
                required>
        </div>

        <div class="form-group">
            <label for="stok">Stok Produk</label>
            <input
                type="number"
                id="stok"
                name="stok"
                value="{{ old('stok', 0) }}"
                min="0"
                step="1"
                required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi Produk</label>
            <textarea
                id="deskripsi"
                name="deskripsi"
                placeholder="Jelaskan kualitas, ukuran, atau informasi produk.">{{ old('deskripsi') }}</textarea>
        </div>

        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            <button type="submit" class="btn btn-primary">
                Simpan Produk
            </button>

            <a href="{{ route('penjual.produk.index') }}" class="btn btn-secondary">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection