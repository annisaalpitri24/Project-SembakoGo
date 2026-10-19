@extends('penjual.layouts.app')

@section('title', 'Profil Toko')

@section('content')
<div class="page-heading">
    <div>
        <h1>Profil Toko</h1>
        <p>Informasi toko yang terdaftar di SembakoGo.</p>
    </div>
</div>

<div class="card">
    <div class="form-group">
        <label>Nama Toko</label>
        <input type="text"
            value="{{ $store->nama_toko }}"
            readonly>
    </div>

    <div class="form-group">
        <label>Alamat Toko</label>
        <textarea readonly>{{ $store->alamat_toko }}</textarea>
    </div>

    <div class="form-group">
        <label>Nomor HP Toko</label>
        <input type="text"
            value="{{ $store->no_hp_toko }}"
            readonly>
    </div>

    <div class="form-group">
        <label>Deskripsi Toko</label>
        <textarea readonly>{{ $store->deskripsi }}</textarea>
    </div>

    <p style="color:#64748b;">
        Untuk sementara, halaman ini hanya menampilkan data toko.
        Fitur edit profil bisa ditambahkan berikutnya.
    </p>
</div>
@endsection