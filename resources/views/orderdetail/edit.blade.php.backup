<h1>✏️ Edit Order Detail</h1>

<form
    action="/orderdetail/{{ $orderDetail->id_detail_order }}"
    method="POST"
>

    @csrf
    @method('PUT')

    <p>
        <label>Order:</label><br>

        <select name="id_order" required>

            @foreach ($orders as $order)

                <option
                    value="{{ $order->id_order }}"
                    {{ $orderDetail->id_order == $order->id_order ? 'selected' : '' }}
                >
                    Order #{{ $order->id_order }}
                    -
                    {{ $order->pelanggan->nama ?? 'Tanpa Pelanggan' }}
                </option>

            @endforeach

        </select>
    </p>

    <p>
        <label>Spare Part:</label><br>

        <select name="id_sparepart" required>

            @foreach ($spareParts as $sparePart)

                <option
                    value="{{ $sparePart->id_sparepart }}"
                    {{ $orderDetail->id_sparepart == $sparePart->id_sparepart ? 'selected' : '' }}
                >
                    {{ $sparePart->nama }}
                    -
                    Rp {{ number_format($sparePart->harga, 0, ',', '.') }}
                </option>

            @endforeach

        </select>
    </p>

    <p>
        <label>Jumlah:</label><br>

        <input
            type="number"
            name="jumlah"
            min="1"
            value="{{ $orderDetail->jumlah }}"
            required
        >
    </p>

    <p>
        <label>Harga:</label><br>

        <input
            type="number"
            name="harga"
            min="0"
            value="{{ $orderDetail->harga }}"
            required
        >
    </p>

    <button type="submit">
        💾 Update
    </button>

</form>

<br>

<a href="/orderdetail">
    ⬅️ Kembali
</a>