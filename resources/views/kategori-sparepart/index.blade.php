<h1>🏷️ DATA KATEGORI SPARE PART</h1>

<a href="/kategori-sparepart/create">
    ➕ Tambah Kategori
</a>

<hr>

<h2>Jumlah Data Kategori: {{ $kategori->count() }}</h2>

@foreach ($kategori as $item)

    <hr>

    <h2>
        🏷️ Kategori #{{ $item->id_kategori }}
    </h2>

    <h3>📦 Data Kategori</h3>

    <p>
        <strong>Nama Kategori:</strong>
        {{ $item->nama_kategori }}
    </p>

    <p>
        <strong>Deskripsi:</strong>
        {{ $item->deskripsi ?? '-' }}
    </p>

    <h3>🔧 Spare Part</h3>

    @if ($item->sparePart->count() > 0)

        <ul>

            @foreach ($item->sparePart as $sparePart)

                <li>
                    {{ $sparePart->nama }}
                    — Rp {{ number_format($sparePart->harga, 0, ',', '.') }}
                    — Stok: {{ $sparePart->stok }}
                </li>

            @endforeach

        </ul>

    @else

        <p>
            Belum ada spare part dalam kategori ini.
        </p>

    @endif

    <p>
        <strong>Jumlah Spare Part:</strong>
        {{ $item->sparePart->count() }}
    </p>

    <br>

    <a href="/kategori-sparepart/{{ $item->id_kategori }}/edit">
        ✏️ Edit
    </a>

    <form
        action="/kategori-sparepart/{{ $item->id_kategori }}"
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