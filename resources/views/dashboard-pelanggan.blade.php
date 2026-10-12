<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelanggan - BengkelServis</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f3ee;
            color: #172b4d;
        }

        header {
            background: #142747;
            color: white;
            padding: 24px 7%;
        }

        header h2 {
            margin: 0 0 8px;
        }

        header p {
            margin-bottom: 0;
        }

        nav {
            background: white;
            padding: 18px 7%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 22px;
            box-shadow: 0 2px 8px #0001;
        }

        a {
            color: #244575;
            text-decoration: none;
        }

        nav a {
            font-size: 14px;
            font-weight: bold;
        }

        nav a:hover,
        .card a:hover {
            color: #b77b4b;
        }

        main {
            padding: 32px 7%;
        }

        .welcome {
            background: #142747;
            color: white;
            padding: 30px;
            border-radius: 14px;
            margin-bottom: 25px;
        }

        .welcome h1 {
            font-size: 26px;
        }

        .welcome p {
            line-height: 1.6;
        }

        .button {
            display: inline-block;
            background: #d7b18c;
            color: #172b4d;
            padding: 12px 18px;
            border-radius: 8px;
            font-weight: bold;
            margin-top: 10px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            border: 1px solid #e5e1d8;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 16px #0001;
        }

        .card h3 {
            margin-top: 0;
        }

        .card p {
            color: #667085;
            line-height: 1.6;
        }

        .card a {
            font-weight: bold;
        }

        .logout-form {
            margin-left: auto;
        }

        .logout-button {
            background: #f5e8df;
            color: #7b342b;
            border: none;
            padding: 9px 15px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
        }

        footer {
            text-align: center;
            color: #667085;
            padding: 25px;
        }

        @media (max-width: 600px) {
            nav {
                gap: 14px;
            }

            main {
                padding: 22px 5%;
            }

            .welcome {
                padding: 22px;
            }

            .welcome h1 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
    <header>
        <h2>BengkelServis</h2>
        <p>Portal Pelanggan</p>
    </header>

    <nav>
        <a href="{{ url('/dashboard-pelanggan') }}">Beranda</a>
        <a href="{{ url('/layanan-pelanggan') }}">Layanan Servis</a>
        <a href="{{ url('/booking-pelanggan') }}">Booking Servis</a>
        <a href="{{ url('/kendaraan-pelanggan') }}">Kendaraan Saya</a>
        <a href="{{ url('/order-pelanggan') }}">Pesanan Spare Part</a>
        <a href="{{ url('/rating-pelanggan') }}">Rating & Ulasan</a>

        <form class="logout-form" action="{{ url('/logout') }}" method="POST">
            @csrf
            <button class="logout-button" type="submit">Keluar</button>
        </form>
    </nav>

    <main>
        <section class="welcome">
            <h1>
                Selamat datang,
                {{ session('user_nama', 'Pelanggan') }}! 👋
            </h1>

            <p>
                Selamat datang di portal pelanggan BengkelServis.
                Kamu bisa melihat layanan servis, membuat booking,
                mengelola kendaraan, dan memantau pesananmu.
            </p>

            <a class="button" href="{{ url('/booking-pelanggan/create') }}">
                + Booking Servis
            </a>
        </section>

        <div class="cards">
            <section class="card">
                <h3>🔧 Layanan Servis</h3>
                <p>Lihat layanan perawatan dan perbaikan kendaraan.</p>
                <a href="{{ url('/layanan-pelanggan') }}">
                    Lihat Layanan →
                </a>
            </section>

            <section class="card">
                <h3>📅 Booking Servis</h3>
                <p>Buat jadwal servis dan pantau status booking.</p>
                <a href="{{ url('/booking-pelanggan') }}">
                    Lihat Booking →
                </a>
            </section>

            <section class="card">
                <h3>🚗 Kendaraan Saya</h3>
                <p>Lihat informasi kendaraan yang terdaftar.</p>
                <a href="{{ url('/kendaraan-pelanggan') }}">
                    Lihat Kendaraan →
                </a>
            </section>

            <section class="card">
                <h3>🛒 Pesanan Spare Part</h3>
                <p>Lihat informasi pesanan suku cadang.</p>
                <a href="{{ url('/order-pelanggan') }}">
                    Lihat Pesanan →
                </a>
            </section>

            <section class="card">
                <h3>💳 Pembayaran</h3>
                <p>Periksa informasi pembayaran transaksi.</p>
                <a href="{{ url('/pembayaran-pelanggan') }}">
                    Lihat Pembayaran →
                </a>
            </section>

            <section class="card">
                <h3>⭐ Rating & Ulasan</h3>
                <p>Berikan penilaian terhadap pelayanan bengkel.</p>
                <a href="{{ url('/rating-pelanggan') }}">
                    Lihat Rating →
                </a>
            </section>
        </div>
    </main>

    <footer>
        &copy; {{ date('Y') }} BengkelServis — Portal Pelanggan
    </footer>
</body>
</html>
```