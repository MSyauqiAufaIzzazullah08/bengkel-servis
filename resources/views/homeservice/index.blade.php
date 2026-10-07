<!DOCTYPE html>
<html>
<head>
    <title>Data Home Servis</title>
</head>
<body>

    <h1>🏠 DATA HOME SERVIS</h1>

    <p>
        <a href="/homeservice/create">
            ➕ Tambah Home Servis
        </a>
    </p>

    <hr>

    <h2>Jumlah Data Home Servis: {{ $homeServis->count() }}</h2>

    @foreach ($homeServis as $item)

        <hr>

        <h2>🏠 Home Servis #{{ $item->id_home_service }}</h2>

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

        <h3>🔧 Montir Lapangan</h3>
        <p>
            <strong>Nama:</strong>
            {{ $item->montirLapangan->nama ?? '-' }}
        </p>

        <h3>📍 Alamat</h3>
        <p>
            {{ $item->alamat }}
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
            <a href="/homeservice/{{ $item->id_home_service }}/edit">
                ✏️ Edit
            </a>

            <form
                action="/homeservice/{{ $item->id_home_service }}"
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