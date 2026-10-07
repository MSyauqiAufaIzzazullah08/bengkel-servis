<!DOCTYPE html>
<html>
<head>
    <title>Data Penugasan Teknisi</title>
</head>
<body>

    <h1>🔧 DATA PENUGASAN TEKNISI</h1>

    <p>
        <a href="/penugasan/create">
            ➕ Tambah Penugasan
        </a>
    </p>

    <hr>

    <h2>
        Jumlah Data Penugasan: {{ $penugasan->count() }}
    </h2>

    @foreach ($penugasan as $item)

        <hr>

        <h2>
            🔧 Penugasan #{{ $item->id_penugasan }}
        </h2>

        <h3>📋 Booking Servis</h3>

        <p>
            <strong>ID Booking:</strong>
            {{ $item->bookingServis->id_booking ?? '-' }}
        </p>

        <p>
            <strong>Pelanggan:</strong>
            {{ $item->bookingServis->pelanggan->nama ?? '-' }}
        </p>

        <p>
            <strong>Kendaraan:</strong>
            {{ $item->bookingServis->kendaraan->merk ?? '-' }}
            {{ $item->bookingServis->kendaraan->model ?? '' }}
        </p>

        <p>
            <strong>Nopol:</strong>
            {{ $item->bookingServis->kendaraan->nopol ?? '-' }}
        </p>

        <h3>👨‍🔧 Teknisi</h3>

        <p>
            <strong>Nama:</strong>
            {{ $item->teknisi->nama ?? '-' }}
        </p>

        <p>
            <strong>Keahlian:</strong>
            {{ $item->teknisi->keahlian ?? '-' }}
        </p>

        <h3>📅 Tanggal</h3>

        <p>
            {{ $item->tanggal }}
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

            <a href="/penugasan/{{ $item->id_penugasan }}/edit">
                ✏️ Edit
            </a>

            <form
                action="/penugasan/{{ $item->id_penugasan }}"
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