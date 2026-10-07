<h1>🔧 DATA SPARE PART</h1>

<a href="/sparepart/create">➕ Tambah Spare Part</a>

<hr>

<h2>Jumlah Data Spare Part: {{ $spareParts->count() }}</h2>

@foreach ($spareParts as $sparePart)

    <hr>

    <h2>🔧 Spare Part #{{ $sparePart->id_sparepart }}</h2>

    <h3>📦 Data Spare Part</h3>

    <p>
        <strong>Nama:</strong>
        {{ $sparePart->nama }}
    </p>

    <p>
        <strong>Kategori:</strong>
        {{ $sparePart->kategori->nama_kategori ?? '-' }}
    </p>

    <p>
        <strong>Harga:</strong>
        Rp {{ number_format($sparePart->harga, 0, ',', '.') }}
    </p>

    <p>
        <strong>Stok:</strong>
        {{ $sparePart->stok }}
    </p>

    <p>
        <strong>Deskripsi:</strong>
        {{ $sparePart->deskripsi ?? '-' }}
    </p>

    <p>
        <strong>Gambar:</strong>
        {{ $sparePart->gambar ?? '-' }}
    </p>

    <h3>📋 Digunakan Dalam Order Detail</h3>

    <p>
        {{ $sparePart->orderDetail->count() }} detail order
    </p>

    <br>

    <a href="/sparepart/{{ $sparePart->id_sparepart }}/edit">
        ✏️ Edit
    </a>

    <form
        action="/sparepart/{{ $sparePart->id_sparepart }}"
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