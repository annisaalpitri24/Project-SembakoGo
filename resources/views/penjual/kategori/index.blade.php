@extends('penjual.layouts.app')

@section('title', 'Kategori Produk')

@section('content')
<div class="page-heading">
    <div>
        <h1>Kategori Produk</h1>
        <p>Kelola kategori produk untuk toko kamu.</p>
    </div>

    <a href="{{ route('penjual.kategori.create') }}"
        class="btn btn-primary">
        + Tambah Kategori
    </a>
</div>

<div class="card">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($categories as $kategori)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td>{{ $kategori->deskripsi ?: '-' }}</td>
                    <td>
                        <a class="btn btn-secondary"
                            href="{{ route('penjual.kategori.edit', $kategori->id) }}">
                            Edit
                        </a>

                        <form
                            action="{{ route('penjual.kategori.destroy', $kategori->id) }}"
                            method="POST"
                            style="display:inline-block;"
                            onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-primary"
                                style="background:#dc2626;"
                                type="submit">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align:center;padding:30px;">
                        Belum ada kategori. Klik Tambah Kategori untuk memulai.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection