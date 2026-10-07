<h1>➕ Tambah Order Detail</h1>

<form action="/orderdetail" method="POST">

    @csrf

    <p>
        <label>Order:</label><br>

        <select name="id_order" required>

            <option value="">
                -- Pilih Order --
            </option>

            @foreach ($orders as $order)

                <option value="{{ $order->id_order }}">
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

            <option value="">
                -- Pilih Spare Part --
            </option>

            @foreach ($spareParts as $sparePart)

                <option value="{{ $sparePart->id_sparepart }}">
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
            required
        >
    </p>

    <p>
        <label>Harga:</label><br>

        <input
            type="number"
            name="harga"
            min="0"
            required
        >
    </p>

    <button type="submit">
        💾 Simpan
    </button>

</form>

<br>

<a href="/orderdetail">
    ⬅️ Kembali
</a>