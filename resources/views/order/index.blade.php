<!DOCTYPE html>
<html>
<head>
    <title>Data Order Spare Part</title>
</head>
<body>

    <h1>🛒 DATA ORDER SPARE PART</h1>

    <p>
        <a href="/order/create">
            ➕ Tambah Order
        </a>
    </p>

    <hr>

    <h2>
        Jumlah Data Order: {{ $order->count() }}
    </h2>

    @foreach ($order as $item)

        <hr>

        <h2>
            🛒 Order #{{ $item->id_order }}
        </h2>

        <h3>👤 Pelanggan</h3>

        <p>
            <strong>Nama:</strong>
            {{ $item->pelanggan->nama ?? '-' }}
        </p>

        <h3>📅 Tanggal Order</h3>

        <p>
            {{ $item->tanggal_order }}
        </p>

        <h3>📌 Status</h3>

        <p>
            <strong>{{ $item->status }}</strong>
        </p>

        <h3>💰 Total Harga</h3>

        <p>
            <strong>
                Rp {{ number_format($item->total_harga, 0, ',', '.') }}
            </strong>
        </p>

        <h3>📍 Alamat Pengiriman</h3>

        <p>
            {{ $item->alamat_pengiriman }}
        </p>

        <h3>🔧 Detail Spare Part</h3>

        @if ($item->orderDetail->count() > 0)

            @foreach ($item->orderDetail as $detail)

                <p>
                    <strong>Spare Part:</strong>
                    {{ $detail->sparePart->nama ?? '-' }}
                    <br>

                    <strong>Jumlah:</strong>
                    {{ $detail->jumlah }}
                    <br>

                    <strong>Harga:</strong>
                    Rp {{ number_format($detail->harga, 0, ',', '.') }}
                </p>

            @endforeach

        @else

            <p>
                Belum ada detail spare part.
            </p>

        @endif

        <h3>🚚 Pengiriman</h3>

        <p>
            <strong>Ekspedisi:</strong>
            {{ $item->pengiriman->ekspedisi->nama_ekspedisi ?? '-' }}
        </p>

        <p>
            <strong>No. Resi:</strong>
            {{ $item->pengiriman->no_resi ?? '-' }}
        </p>

        <p>
            <strong>Status Pengiriman:</strong>
            {{ $item->pengiriman->status ?? '-' }}
        </p>

        <p>
            <a href="/order/{{ $item->id_order }}/edit">
                ✏️ Edit
            </a>

            <form
                action="/order/{{ $item->id_order }}"
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