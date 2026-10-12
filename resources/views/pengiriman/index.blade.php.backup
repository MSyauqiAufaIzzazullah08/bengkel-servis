<h1>🚚 DATA PENGIRIMAN</h1>

<a href="/pengiriman/create">
    ➕ Tambah Pengiriman
</a>

<hr>

<h2>Jumlah Data Pengiriman: {{ $pengiriman->count() }}</h2>

@foreach ($pengiriman as $item)

    <hr>

    <h2>
        🚚 Pengiriman #{{ $item->id_pengiriman }}
    </h2>

    <h3>🛒 Data Order</h3>

    <p>
        <strong>ID Order:</strong>
        {{ $item->id_order }}
    </p>

    <p>
        <strong>Pelanggan:</strong>
        {{ $item->orderSparePart->pelanggan->nama ?? '-' }}
    </p>

    <h3>🚚 Data Pengiriman</h3>

    <p>
        <strong>Ekspedisi:</strong>
        {{ $item->ekspedisi->nama_ekspedisi ?? '-' }}
    </p>

    <p>
        <strong>Kurir:</strong>
        {{ $item->kurir }}
    </p>

    <p>
        <strong>No. Resi:</strong>
        {{ $item->no_resi }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ $item->status }}
    </p>

    <p>
        <strong>Estimasi Tiba:</strong>
        {{ $item->estimasi_tiba ?? '-' }}
    </p>

    <p>
        <strong>Tanggal Kirim:</strong>
        {{ $item->tanggal_kirim ?? '-' }}
    </p>

    <br>

    <a href="/pengiriman/{{ $item->id_pengiriman }}/edit">
        ✏️ Edit
    </a>

    <form
        action="/pengiriman/{{ $item->id_pengiriman }}"
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