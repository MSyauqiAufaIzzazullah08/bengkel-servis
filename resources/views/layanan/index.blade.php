<!DOCTYPE html>
<html>
<head>
    <title>Data Layanan Servis</title>
</head>
<body>

    <h1>🔧 DATA LAYANAN SERVIS</h1>

    <p>
        <a href="/layanan/create">
            ➕ Tambah Layanan
        </a>
    </p>

    <hr>

    <h2>
        Jumlah Data Layanan: {{ $layanan->count() }}
    </h2>

    @foreach ($layanan as $item)

        <hr>

        <h2>
            🔧 Layanan #{{ $item->id_layanan }}
        </h2>

        <h3>🛠️ Nama Layanan</h3>

        <p>
            <strong>{{ $item->nama_layanan }}</strong>
        </p>

        <h3>📂 Kategori</h3>

        <p>
            {{ $item->kategori }}
        </p>

        <h3>💰 Harga</h3>

        <p>
            <strong>
                Rp {{ number_format($item->harga, 0, ',', '.') }}
            </strong>
        </p>

        <h3>⏱️ Estimasi Waktu</h3>

        <p>
            {{ $item->estimasi_waktu }}
        </p>

        <h3>📝 Deskripsi</h3>

        <p>
            {{ $item->deskripsi ?? '-' }}
        </p>

        <h3>📋 Jumlah Booking</h3>

        <p>
            {{ $item->bookingServis->count() }} booking
        </p>

        <h3>🔧 Jumlah Detail Servis</h3>

        <p>
            {{ $item->detailServis->count() }} detail servis
        </p>

        <p>

            <a href="/layanan/{{ $item->id_layanan }}/edit">
                ✏️ Edit
            </a>

            <form
                action="/layanan/{{ $item->id_layanan }}"
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