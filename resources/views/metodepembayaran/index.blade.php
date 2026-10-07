<!DOCTYPE html>
<html>
<head>
    <title>Data Metode Pembayaran</title>
</head>
<body>

    <h1>💳 DATA METODE PEMBAYARAN</h1>

    <p>
        <a href="/metodepembayaran/create">
            ➕ Tambah Metode Pembayaran
        </a>
    </p>

    <hr>

    <h2>
        Jumlah Data Metode Pembayaran: {{ $metode->count() }}
    </h2>

    @foreach ($metode as $item)

        <hr>

        <h2>
            💳 Metode Pembayaran #{{ $item->id_metode }}
        </h2>

        <p>
            <strong>Nama Metode:</strong>
            {{ $item->nama_metode }}
        </p>

        <p>
            <strong>Deskripsi:</strong>
            {{ $item->deskripsi ?? '-' }}
        </p>

        <p>
            <strong>Jumlah Pembayaran:</strong>
            {{ $item->pembayarans->count() }}
        </p>

        <p>

            <a href="/metodepembayaran/{{ $item->id_metode }}/edit">
                ✏️ Edit
            </a>

            <form
                action="/metodepembayaran/{{ $item->id_metode }}"
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