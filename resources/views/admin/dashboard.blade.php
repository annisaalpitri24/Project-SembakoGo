@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<div class="heading">
    <h1>Dashboard Admin</h1>
    <p>Kelola penjual dan kategori produk SembakoGo dari satu tempat.</p>
</div>

<div class="stats">
    <div class="stat-card">
        <p>Total Penjual</p>
        <div class="stat-number">{{ $jumlahPenjual }}</div>
    </div>

    <div class="stat-card">
        <p>Penjual Aktif</p>
        <div class="stat-number">{{ $jumlahPenjualAktif }}</div>
    </div>

    <div class="stat-card">
        <p>Total Kategori</p>
        <div class="stat-number">{{ $jumlahKategori }}</div>
    </div>
</div>

{{-- PENGELOLAAN KATEGORI --}}
<div class="card" id="validasi">

    <div class="card-heading">
        <div>
            <h2>Validasi Akun Penjual</h2>
            <p class="muted">
                Periksa dan kelola seluruh akun penjual SembakoGo.
            </p>
        </div>

        <span class="status">
            {{ $semuaPenjual->count() }} penjual
        </span>
    </div>

    {{-- RINGKASAN STATUS --}}
    <div style="display:flex; gap:12px; flex-wrap:wrap; margin-bottom:20px;">

        <span style="background:#fff3cd; color:#946200; padding:8px 14px; border-radius:20px; font-size:13px;">
            Menunggu: {{ $jumlahPenjualMenunggu }}
        </span>

        <span style="background:#d1fae5; color:#047857; padding:8px 14px; border-radius:20px; font-size:13px;">
            Aktif: {{ $jumlahPenjualAktif }}
        </span>

        <span style="background:#fee2e2; color:#b91c1c; padding:8px 14px; border-radius:20px; font-size:13px;">
            Ditolak: {{ $jumlahPenjualDitolak }}
        </span>

    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pemilik</th>
                    <th>Email</th>
                    <th>Nama Toko</th>
                    <th>Alamat Toko</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($semuaPenjual as $penjual)

                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $penjual->name }}</td>

                    <td>{{ $penjual->email }}</td>

                    <td>
                        {{ $penjual->store->nama_toko ?? '-' }}
                    </td>

                    <td>
                        {{ $penjual->store->alamat_toko ?? '-' }}
                    </td>

                    {{-- STATUS PENJUAL --}}
                    <td>

                        @if ($penjual->status === 'pending')

                        <span style="background:#fff3cd; color:#946200; padding:7px 12px; border-radius:20px; font-size:12px; font-weight:bold;">
                            Menunggu
                        </span>

                        @elseif ($penjual->status === 'active')

                        <span style="background:#d1fae5; color:#047857; padding:7px 12px; border-radius:20px; font-size:12px; font-weight:bold;">
                            Aktif
                        </span>

                        @elseif ($penjual->status === 'rejected')

                        <span style="background:#fee2e2; color:#b91c1c; padding:7px 12px; border-radius:20px; font-size:12px; font-weight:bold;">
                            Ditolak
                        </span>

                        @else

                        <span class="status">
                            {{ ucfirst($penjual->status ?? 'Tidak diketahui') }}
                        </span>

                        @endif

                    </td>

                    {{-- AKSI ADMIN --}}
                    <td>

                        @if ($penjual->status === 'pending')

                        <form
                            action="{{ route('admin.seller.approve', $penjual->id) }}"
                            method="POST"
                            onsubmit="return confirm('Setujui akun penjual ini?')">

                            @csrf

                            <button type="submit" class="btn btn-primary">
                                Setujui
                            </button>

                        </form>

                        @elseif ($penjual->status === 'rejected')

                        <form
                            action="{{ route('admin.seller.approve', $penjual->id) }}"
                            method="POST"
                            onsubmit="return confirm('Aktifkan kembali akun penjual ini?')">

                            @csrf

                            <button type="submit" class="btn btn-primary">
                                Aktifkan Kembali
                            </button>

                        </form>

                        @elseif ($penjual->status === 'active')

                        <span class="muted">
                            Akun sudah aktif
                        </span>

                        @endif

                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="7" class="empty">
                        Belum ada penjual yang mendaftar.
                    </td>
                </tr>

                @endforelse

            </tbody>
        </table>
    </div>

</div>


{{-- PENGELOLAAN KATEGORI --}}
<div class="card" id="kategori">
    <div class="card-heading">
        <div>
            <h2>Pengelolaan Kategori</h2>
            <p class="muted">
                Kelola kategori global yang dapat digunakan oleh semua penjual.
            </p>
        </div>

        <a class="btn btn-primary"
            href="{{ route('admin.kategori.create') }}">
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
                @forelse ($kategori as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_kategori }}</td>
                    <td>{{ $item->deskripsi ?: '-' }}</td>
                    <td>{{ $item->products_count }}</td>
                    <td>
                        <a class="btn"
                            href="{{ route('admin.kategori.edit', $item->id) }}"
                            style="background:#eafbf4;color:#007d5a;">
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.kategori.destroy', $item->id) }}"
                            method="POST"
                            style="display:inline;"
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
                    <td colspan="5" class="empty">
                        Belum ada kategori. Silakan tambah kategori.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection