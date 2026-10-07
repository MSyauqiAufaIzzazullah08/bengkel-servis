<!DOCTYPE html>
<html>
<head>
    <title>Data Promo</title>
</head>
<body>

    <h1>🎟️ DATA PROMO</h1>

    <p>
        <a href="/promo/create">
            ➕ Tambah Promo
        </a>
    </p>

    <hr>

    <h2>
        Jumlah Data Promo: {{ $promo->count() }}
    </h2>

    @foreach ($promo as $item)

        <hr>

        <h2>
            🎟️ Promo #{{ $item->id_promo }}
        </h2>

        <p>
            <strong>Kode Promo:</strong>
            {{ $item->kode_promo }}
        </p>

        <p>
            <strong>Jenis Diskon:</strong>
            {{ $item->jenis_diskon }}
        </p>

        <p>
            <strong>Nilai Diskon:</strong>
            {{ $item->nilai_diskon }}
            @if ($item->jenis_diskon == 'Persen')
                %
            @endif
        </p>

        <p>
            <strong>Minimal Transaksi:</strong>
            Rp {{ number_format($item->minimal_transaksi, 0, ',', '.') }}
        </p>

        <p>
            <strong>Periode:</strong>
            {{ $item->periode_mulai }}
            s/d
            {{ $item->periode_selesai }}
        </p>

        <p>
            <strong>Kuota:</strong>
            {{ $item->kuota }}
        </p>

        <p>
            <strong>Jumlah Pembayaran Menggunakan Promo:</strong>
            {{ $item->pembayarans->count() }}
        </p>

        <p>

            <a href="/promo/{{ $item->id_promo }}/edit">
                ✏️ Edit
            </a>

            <form
                action="/promo/{{ $item->id_promo }}"
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