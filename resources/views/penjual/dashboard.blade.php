<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Penjual - SembakoGo</title>
</head>

<body>

    <h1>Dashboard Penjual</h1>

    <p>
        Selamat datang, {{ auth()->user()->name }}!
    </p>

    <p>
        Toko:
        {{ auth()->user()->store->nama_toko ?? '-' }}
    </p>

    <p>
        Status akun:
        {{ auth()->user()->status }}
    </p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>