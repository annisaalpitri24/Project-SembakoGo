@extends('penjual.layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="page-heading">
    <div>
        <h1>Edit Produk</h1>
        <p>Perbarui informasi produk dan stok toko kamu.</p>
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
        action="{{ route('penjual.produk.update', $product->id) }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input
                type="text"
                id="nama_produk"
                name="nama_produk"
                value="{{ old('nama_produk', $product->nama_produk) }}"
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
                    @selected(old('category_id', $product->category_id) == $category->id)
                    >
                    {{ $category->nama_kategori }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Foto Produk Saat Ini</label>

            @if ($product->foto)
            <div style="margin-bottom: 12px;">
                <img
                    src="{{ asset('storage/' . $product->foto) }}"
                    alt="{{ $product->nama_produk }}"
                    style="width: 150px; height: 150px; object-fit: cover; border-radius: 10px;">
            </div>
            @else
            <p style="color: #64748b;">Belum ada foto produk.</p>
            @endif

            <label for="foto">Ganti Foto Produk (opsional)</label>
            <input
                type="file"
                id="foto"
                name="foto"
                accept=".jpg,.jpeg,.png,.webp">
            <small style="color: #64748b;">
                JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                Kosongkan jika tidak ingin mengganti foto.
            </small>
        </div>

        <div class="form-group">
            <label for="harga">Harga Produk (Rp)</label>
            <input
                type="number"
                id="harga"
                name="harga"
                value="{{ old('harga', $product->harga) }}"
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
                value="{{ old('stok', $product->stok) }}"
                min="0"
                step="1"
                required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi Produk</label>
            <textarea
                id="deskripsi"
                name="deskripsi"
                placeholder="Jelaskan informasi produk.">{{ old('deskripsi', $product->deskripsi) }}</textarea>
        </div>

        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>

            <a href="{{ route('penjual.produk.index') }}" class="btn btn-secondary">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection