<h1>💰 DATA PEMBAYARAN</h1>

<a href="/pembayaran/create">
    ➕ Tambah Pembayaran
</a>

<hr>

<h2>Jumlah Data Pembayaran: {{ $pembayaran->count() }}</h2>

@foreach ($pembayaran as $item)

    <hr>

    <h2>
        💰 Pembayaran #{{ $item->id_pembayaran }}
    </h2>

    <h3>📋 Sumber Transaksi</h3>

    @if ($item->id_booking)

        <p>
            <strong>Jenis:</strong>
            Booking Servis
        </p>

        <p>
            <strong>ID Booking:</strong>
            {{ $item->id_booking }}
        </p>

        <p>
            <strong>Pelanggan:</strong>
            {{ $item->bookingServis->pelanggan->nama ?? '-' }}
        </p>

    @elseif ($item->id_order)

        <p>
            <strong>Jenis:</strong>
            Order Spare Part
        </p>

        <p>
            <strong>ID Order:</strong>
            {{ $item->id_order }}
        </p>

        <p>
            <strong>Pelanggan:</strong>
            {{ $item->orderSparePart->pelanggan->nama ?? '-' }}
        </p>

    @else

        <p>
            <strong>Jenis:</strong>
            Tidak ada transaksi
        </p>

    @endif

    <h3>💳 Data Pembayaran</h3>

    <p>
        <strong>Promo:</strong>
        {{ $item->promo->kode_promo ?? '-' }}
    </p>

    <p>
        <strong>Metode:</strong>
        {{ $item->metodePembayaran->nama_metode ?? '-' }}
    </p>

    <p>
        <strong>Jumlah:</strong>
        Rp {{ number_format($item->jumlah, 0, ',', '.') }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ $item->status }}
    </p>

    <p>
        <strong>Tanggal Bayar:</strong>
        {{ $item->tanggal_bayar ?? '-' }}
    </p>

    <p>
        <strong>Bukti Pembayaran:</strong>
        {{ $item->bukti_pembayaran ?? '-' }}
    </p>

    <br>

    <a href="/pembayaran/{{ $item->id_pembayaran }}/edit">
        ✏️ Edit
    </a>

    <form
        action="/pembayaran/{{ $item->id_pembayaran }}"
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