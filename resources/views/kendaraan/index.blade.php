<!DOCTYPE html>
<html>
<head>
    <title>Data Kendaraan</title>
</head>
<body>

    <h1>🚗 DATA KENDARAAN</h1>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p>
        <a href="/kendaraan/create">
            ➕ Tambah Kendaraan
        </a>
    </p>

    <hr>

    <h2>Jumlah Kendaraan: {{ $kendaraan->count() }}</h2>

    @foreach ($kendaraan as $item)

        <hr>

        <h2>
            🚗 Kendaraan #{{ $item->id_kendaraan }}
        </h2>

        <p>
            <strong>Merk:</strong>
            {{ $item->merk }}
        </p>

        <p>
            <strong>Model:</strong>
            {{ $item->model }}
        </p>

        <p>
            <strong>Tahun:</strong>
            {{ $item->tahun }}
        </p>

        <p>
            <strong>No Polisi:</strong>
            {{ $item->nopol }}
        </p>

        <h3>👤 Pemilik</h3>

        @if ($item->pelanggan)

            <p>
                <strong>Nama:</strong>
                {{ $item->pelanggan->nama }}
            </p>

            <p>
                <strong>No HP:</strong>
                {{ $item->pelanggan->no_hp }}
            </p>

        @else

            <p>Data pelanggan tidak tersedia.</p>

        @endif

        <p>
            <strong>Jumlah Booking:</strong>
            {{ $item->bookingServis->count() }}
        </p>

        <p>
            <strong>Jumlah Home Service:</strong>
            {{ $item->homeServis->count() }}
        </p>

        <p>
            <a href="/kendaraan/{{ $item->id_kendaraan }}/edit">
                ✏️ Edit
            </a>
        </p>

        <form
            action="/kendaraan/{{ $item->id_kendaraan }}"
            method="POST"
        >
            @csrf
            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm('Yakin ingin menghapus kendaraan ini?')"
            >
                🗑️ Hapus
            </button>
        </form>

    @endforeach

</body>
</html>