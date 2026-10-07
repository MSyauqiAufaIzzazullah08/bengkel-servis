<h1>📋 DATA ORDER DETAIL</h1>

<a href="/orderdetail/create">
    ➕ Tambah Order Detail
</a>

<hr>

<h2>Jumlah Data Order Detail: {{ $orderDetails->count() }}</h2>

@foreach ($orderDetails as $detail)

    <hr>

    <h2>
        📋 Order Detail #{{ $detail->id_detail_order }}
    </h2>

    <h3>🛒 Data Order</h3>

    <p>
        <strong>ID Order:</strong>
        {{ $detail->id_order }}
    </p>

    <p>
        <strong>Pelanggan:</strong>
        {{ $detail->orderSparePart->pelanggan->nama ?? '-' }}
    </p>

    <h3>🔧 Spare Part</h3>

    <p>
        <strong>Nama:</strong>
        {{ $detail->sparePart->nama ?? '-' }}
    </p>

    <p>
        <strong>Jumlah:</strong>
        {{ $detail->jumlah }}
    </p>

    <p>
        <strong>Harga:</strong>
        Rp {{ number_format($detail->harga, 0, ',', '.') }}
    </p>

    <p>
        <strong>Total:</strong>
        Rp {{ number_format($detail->harga * $detail->jumlah, 0, ',', '.') }}
    </p>

    <br>

    <a href="/orderdetail/{{ $detail->id_detail_order }}/edit">
        ✏️ Edit
    </a>

    <form
        action="/orderdetail/{{ $detail->id_detail_order }}"
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