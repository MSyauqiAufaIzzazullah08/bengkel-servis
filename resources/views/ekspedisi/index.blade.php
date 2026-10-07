<h1>🚚 DATA EKSPEDISI</h1>

<a href="/ekspedisi/create">
    ➕ Tambah Ekspedisi
</a>

<hr>

<h2>Jumlah Data Ekspedisi: {{ $ekspedisi->count() }}</h2>

@foreach ($ekspedisi as $item)

    <hr>

    <h2>
        🚚 Ekspedisi #{{ $item->id_ekspedisi }}
    </h2>

    <h3>📦 Data Ekspedisi</h3>

    <p>
        <strong>Nama Ekspedisi:</strong>
        {{ $item->nama_ekspedisi }}
    </p>

    <p>
        <strong>Kontak:</strong>
        {{ $item->kontak ?? '-' }}
    </p>

    <h3>🚚 Pengiriman</h3>

    @if ($item->pengiriman->count() > 0)

        <ul>

            @foreach ($item->pengiriman as $pengiriman)

                <li>
                    Pengiriman #{{ $pengiriman->id_pengiriman }}
                    -
                    Resi: {{ $pengiriman->no_resi }}
                    -
                    Status: {{ $pengiriman->status }}
                </li>

            @endforeach

        </ul>

    @else

        <p>
            Belum ada pengiriman.
        </p>

    @endif

    <p>
        <strong>Jumlah Pengiriman:</strong>
        {{ $item->pengiriman->count() }}
    </p>

    <br>

    <a href="/ekspedisi/{{ $item->id_ekspedisi }}/edit">
        ✏️ Edit
    </a>

    <form
        action="/ekspedisi/{{ $item->id_ekspedisi }}"
        method="POST"
        style="display:inline;"
    >
        @csrf
        @method('DELETE')

        <button type="submit">
            🗑️ Hapus
        </button>
    </form>

@endforeach