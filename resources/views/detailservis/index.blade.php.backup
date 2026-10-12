<!DOCTYPE html>
<html>
<head>
    <title>Data Detail Servis</title>
</head>
<body>

    <h1>🔧 DATA DETAIL SERVIS</h1>

    <p>
        <a href="/detailservis/create">
            ➕ Tambah Detail Servis
        </a>
    </p>

    <hr>

    <h2>
        Jumlah Data Detail Servis: {{ $detail->count() }}
    </h2>

    @foreach ($detail as $item)

        <hr>

        <h2>
            🔧 Detail Servis #{{ $item->id_detail }}
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

        <h3>🛠️ Layanan Servis</h3>

        <p>
            <strong>Nama Layanan:</strong>
            {{ $item->layananServis->nama_layanan ?? '-' }}
        </p>

        <h3>🔩 Spare Part</h3>

        <p>
            <strong>Nama:</strong>
            {{ $item->sparePart->nama ?? '-' }}
        </p>

        <h3>💰 Harga</h3>

        <p>
            <strong>
                Rp {{ number_format($item->harga, 0, ',', '.') }}
            </strong>
        </p>

        <h3>📝 Catatan</h3>

        <p>
            {{ $item->catatan ?? '-' }}
        </p>

        <p>

            <a href="/detailservis/{{ $item->id_detail }}/edit">
                ✏️ Edit
            </a>

            <form
                action="/detailservis/{{ $item->id_detail }}"
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