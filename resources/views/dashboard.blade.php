<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Sistem Bengkel</title>
</head>
<body>

    <h1>🏠 DASHBOARD SISTEM BENGKEL</h1>

    <hr>

    <h2>
        Selamat datang,
        {{ session('user_nama') }}
    </h2>

    <p>
        Email:
        {{ session('user_email') }}
    </p>

    <p>
        Role ID:
        {{ session('role_id') }}
    </p>

    <hr>

    <h3>Menu</h3>

    <ul>
        <li>
            <a href="/pelanggan">Pelanggan</a>
        </li>

        <li>
            <a href="/kendaraan">Kendaraan</a>
        </li>

        <li>
            <a href="/booking">Booking Servis</a>
        </li>

        <li>
            <a href="/layanan">Layanan Servis</a>
        </li>

        <li>
            <a href="/detailservis">Detail Servis</a>
        </li>

        <li>
            <a href="/sparepart">Spare Part</a>
        </li>

        <li>
            <a href="/order">Order Spare Part</a>
        </li>

        <li>
            <a href="/pembayaran">Pembayaran</a>
        </li>

        <li>
            <a href="/homeservice">Home Servis</a>
        </li>
    </ul>

    <hr>

    <form action="/logout" method="POST">

        @csrf

        <button type="submit">
            🚪 Logout
        </button>

    </form>

</body>
</html>