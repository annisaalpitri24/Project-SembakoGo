@extends('penjual.layouts.app')

@section('title', 'Kategori Produk')

@section('content')
<div class="page-heading">
    <div>
        <h1>Kategori Produk</h1>
        <p>Lihat kategori produk yang tersedia untuk tokomu.</p>
    </div>
</div>

<div class="card">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th>Jumlah Produk</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($categories as $kategori)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td>{{ $kategori->deskripsi ?: '-' }}</td>
                    <td>{{ $kategori->products_count }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align:center;padding:30px;">
                        Belum ada kategori yang tersedia.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection