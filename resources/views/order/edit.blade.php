<!DOCTYPE html>
<html>
<head>
    <title>Edit Order Spare Part</title>
</head>
<body>

    <h1>✏️ EDIT ORDER SPARE PART</h1>

    <hr>

    <form
        action="/order/{{ $order->id_order }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <p>
            <label>
                <strong>Pelanggan</strong>
            </label>
            <br>

            <select name="id_pelanggan" required>

                @foreach ($pelanggan as $item)

                    <option
                        value="{{ $item->id_pelanggan }}"
                        {{ $order->id_pelanggan == $item->id_pelanggan ? 'selected' : '' }}
                    >
                        {{ $item->nama }}
                    </option>

                @endforeach

            </select>
        </p>

        <p>
            <label>
                <strong>Tanggal Order</strong>
            </label>
            <br>

            <input
                type="datetime-local"
                name="tanggal_order"
                value="{{ date('Y-m-d\TH:i', strtotime($order->tanggal_order)) }}"
                required
            >
        </p>

        <p>
            <label>
                <strong>Status</strong>
            </label>
            <br>

            <input
                type="text"
                name="status"
                value="{{ $order->status }}"
                required
            >
        </p>

        <p>
            <label>
                <strong>Total Harga</strong>
            </label>
            <br>

            <input
                type="number"
                name="total_harga"
                value="{{ $order->total_harga }}"
                min="0"
                required
            >
        </p>

        <p>
            <label>
                <strong>Alamat Pengiriman</strong>
            </label>
            <br>

            <textarea
                name="alamat_pengiriman"
                rows="4"
                cols="50"
                required
            >{{ $order->alamat_pengiriman }}</textarea>
        </p>

        <button type="submit">
            💾 Update
        </button>

    </form>

    <br>

    <a href="/order">
        ← Kembali
    </a>

</body>
</html>