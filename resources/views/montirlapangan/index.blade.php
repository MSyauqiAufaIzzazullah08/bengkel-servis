<!DOCTYPE html>
<html>
<head>
    <title>Data Montir Lapangan</title>
</head>
<body>

    <h1>🔧 DATA MONTIR LAPANGAN</h1>

    <p>
        <a href="/montirlapangan/create">
            ➕ Tambah Montir Lapangan
        </a>
    </p>

    <hr>

    <h2>
        Jumlah Data Montir Lapangan: {{ $montir->count() }}
    </h2>

    @foreach ($montir as $item)

        <hr>

        <h2>
            🔧 Montir Lapangan #{{ $item->id_montir }}
        </h2>

        <p>
            <strong>User:</strong>
            {{ $item->user->nama ?? '-' }}
        </p>

        <p>
            <strong>Email User:</strong>
            {{ $item->user->email ?? '-' }}
        </p>

        <p>
            <strong>Nama Montir:</strong>
            {{ $item->nama }}
        </p>

        <p>
            <strong>No. HP:</strong>
            {{ $item->no_hp }}
        </p>

        <p>
            <strong>Area Tugas:</strong>
            {{ $item->area_tugas }}
        </p>

        <p>
            <strong>Status:</strong>
            {{ $item->status }}
        </p>

        <p>
            <strong>Jumlah Home Servis:</strong>
            {{ $item->homeServis->count() }}
        </p>

        <p>

            <a href="/montirlapangan/{{ $item->id_montir }}/edit">
                ✏️ Edit
            </a>

            <form
                action="/montirlapangan/{{ $item->id_montir }}"
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