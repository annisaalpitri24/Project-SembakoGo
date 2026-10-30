@extends('admin.layouts.app')

@section('title', 'Kelola Kategori')

@section('content')

<div class="heading">
    <h1>Kelola Kategori Sembako</h1>
    <p>Kelola daftar kategori produk yang tersedia di SembakoGo.</p>
</div>

@if ($errors->any())
<div class="alert alert-error">
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif

<div class="card">

    <div class="card-heading">
        <div>
            <h2>Daftar Kategori</h2>
            <p class="muted">Kategori produk yang tersedia di sistem.</p>
        </div>

        <a href="{{ route('admin.kategori.create') }}"
            class="btn btn-primary">
            + Tambah Kategori
        </a>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th>Jumlah Produk</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($categories as $kategori)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <strong>{{ $kategori->nama_kategori }}</strong>
                    </td>

                    <td>{{ $kategori->deskripsi ?: '-' }}</td>

                    <td>{{ $kategori->products_count }}</td>

                    <td>
                        <a href="{{ route('admin.kategori.edit', $kategori) }}"
                            class="btn btn-secondary">
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.kategori.destroy', $kategori) }}"
                            method="POST"
                            style="display: inline;"
                            onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

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
                    <td colspan="5" style="text-align: center; padding: 30px;">
                        Belum ada kategori. Silakan tambah kategori.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection