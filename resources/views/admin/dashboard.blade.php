<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - SembakoGo</title>
</head>

<body>

    <h1>Dashboard Admin</h1>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <h2>Penjual Menunggu Validasi</h2>

    @forelse ($penjualMenunggu as $penjual)

        <div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 10px;">

            <p>
                <strong>Nama Pemilik:</strong>
                {{ $penjual->name }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ $penjual->email }}
            </p>

            <p>
                <strong>Nama Toko:</strong>
                {{ $penjual->store->nama_toko ?? '-' }}
            </p>

            <p>
                <strong>Alamat:</strong>
                {{ $penjual->store->alamat_toko ?? '-' }}
            </p>

            <p>
                <strong>Status:</strong>
                {{ $penjual->status }}
            </p>

            <form
                action="{{ route('admin.seller.approve', $penjual->id) }}"
                method="POST"
            >
                @csrf

                <button type="submit">
                    Setujui Penjual
                </button>
            </form>

        </div>

    @empty

        <p>Tidak ada penjual yang menunggu validasi.</p>

    @endforelse

</body>
</html>