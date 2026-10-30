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
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>

                    <td>
                        @if ($product->foto)
                        <img
                            src="{{ asset('storage/' . $product->foto) }}"
                            alt="{{ $product->nama_produk }}"
                            width="70">
                        @else
                        -
                        @endif
                    </td>

                    <td>{{ $product->nama_produk }}</td>

                    <td>{{ $product->category->nama_kategori ?? '-' }}</td>

                    <td>Rp{{ number_format($product->harga, 0, ',', '.') }}</td>

                    <td>{{ $product->satuan }}</td>

                    <td>{{ $product->stok }}</td>

                    <td>
                        <a href="{{ route('penjual.produk.edit', $product->id) }}"
                            class="btn btn-secondary">
                            Edit
                        </a>

                        <form
                            action="{{ route('penjual.produk.destroy', $product->id) }}"
                            method="POST"
                            style="display: inline;"
                            onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align: center;">
                        Belum ada produk.
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