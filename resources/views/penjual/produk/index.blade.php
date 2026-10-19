@extends('penjual.layouts.app')

@section('title', 'Manajemen Produk')

@section('content')
<div class="page-heading">
    <div>
        <h1>Manajemen Produk</h1>
        <p>Kelola produk, harga, foto, dan stok toko kamu.</p>
    </div>

    <a href="{{ route('penjual.produk.create') }}" class="btn btn-primary">
        + Tambah Produk
    </a>
</div>

<div class="card">
    <h2 style="margin-top: 0;">Daftar Produk</h2>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-error">
        <ul style="margin: 0;">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td>
                        {{ $products->firstItem() + $loop->index }}
                    </td>

                    <td>
                        @if ($product->foto)
                        <img
                            src="{{ asset('storage/' . $product->foto) }}"
                            alt="{{ $product->nama_produk }}"
                            style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                        @else
                        <div style="width: 60px; height: 60px; background: #f1f5f9; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <span style="font-size: 24px;">📦</span>
                        </div>
                        @endif
                    </td>

                    <td>{{ $product->nama_produk }}</td>

                    <td>
                        {{ $product->category?->nama_kategori ?? '-' }}
                    </td>

                    <td>
                        Rp{{ number_format((float) $product->harga, 0, ',', '.') }}
                    </td>

                    <td>
                        {{ $product->stok }}
                    </td>

                    <td>
                        <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                            <a
                                href="{{ route('penjual.produk.edit', $product->id) }}"
                                class="btn btn-secondary">
                                Edit
                            </a>

                            <form
                                action="{{ route('penjual.produk.destroy', $product->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 35px;">
                        <div style="font-size: 32px; margin-bottom: 8px;">📦</div>
                        <strong>Belum ada produk</strong>
                        <p style="color: #64748b; margin-bottom: 15px;">
                            Tambahkan produk pertama untuk mulai mengelola stok toko.
                        </p>
                        <a href="{{ route('penjual.produk.create') }}" class="btn btn-primary">
                            Tambah Produk
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;">
        {{ $products->links() }}
    </div>
</div>
@endsection