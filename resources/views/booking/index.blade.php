<!DOCTYPE html>
<html>
<head>
    <title>Data Booking Servis</title>
</head>
<body>

    <h1>📋 DATA BOOKING SERVIS</h1>

    <p>
        <a href="/booking/create">
            ➕ Tambah Booking
        </a>
    </p>

    <hr>

    <h2>
        Jumlah Data Booking: {{ $booking->count() }}
    </h2>

    @foreach ($booking as $item)

        <hr>

        <h2>
            📋 Booking #{{ $item->id_booking }}
        </h2>

        <h3>👤 Pelanggan</h3>

        <p>
            <strong>Nama:</strong>
            {{ $item->pelanggan->nama ?? '-' }}
        </p>

        <h3>🚗 Kendaraan</h3>

        <p>
            <strong>Merk:</strong>
            {{ $item->kendaraan->merk ?? '-' }}
        </p>

        <p>
            <strong>Model:</strong>
            {{ $item->kendaraan->model ?? '-' }}
        </p>

        <p>
            <strong>Nopol:</strong>
            {{ $item->kendaraan->nopol ?? '-' }}
        </p>

        <h3>🏢 Cabang</h3>

        <p>
            <strong>Nama Cabang:</strong>
            {{ $item->cabang->nama_cabang ?? '-' }}
        </p>

        <h3>🔧 Layanan Servis</h3>

        <p>
            <strong>Layanan:</strong>
            {{ $item->layananServis->nama_layanan ?? '-' }}
        </p>

        <p>
            <strong>Harga:</strong>
            Rp {{ number_format($item->layananServis->harga ?? 0, 0, ',', '.') }}
        </p>

        <h3>📅 Jadwal</h3>

        <p>
            <strong>Tanggal:</strong>
            {{ $item->tanggal_booking }}
        </p>

        <p>
            <strong>Waktu:</strong>
            {{ $item->waktu_booking }}
        </p>

        <h3>📌 Status</h3>

        <p>
            <strong>{{ $item->status }}</strong>
        </p>

        <h3>📝 Catatan</h3>

        <p>
            {{ $item->catatan ?? '-' }}
        </p>

        <p>
            <a href="/booking/{{ $item->id_booking }}/edit">
                ✏️ Edit
            </a>

            <form
                action="/booking/{{ $item->id_booking }}"
                method="POST"
                style="display:inline;"
            >
                @csrf
                @method('DELETE')

                <button type="submit">
                    🗑️ Hapus
                </button>
            </form>
        </p>

    @endforeach

</body>
</html>